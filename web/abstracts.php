<?php
require_once 'lib/EasyRdf.php';
require_once 'helper.php';

function process($a,$sep) {
    $out='';
    $b=array();
    foreach($a as $v) {
        $l=$v->getLang();
        $b[]="$l: $v";
    }
    return join($sep,$b);
}

function getAutoren($node) 
{
    $s=array();
    foreach ($node->all("dcterms:creator") as $a) {
        $title=$a->get("foaf:title");
        $name=$a->get("foaf:name");
        if (!empty($title)) {
            $name="$title $name" ; 
        }
        array_push($s, '<span itemprop="creator">'.$name.'</span>');
    }
    return join(", ", $s);
}

function abstracts($src) 
{
    EasyRdf_Namespace::set('od', 'http://opendiscovery.org/rdf/Model#');
    EasyRdf_Namespace::set('dcterms', 'http://purl.org/dc/terms/');
    EasyRdf_Namespace::set('swc', 'http://data.semanticweb.org/ns/swc/ontology#');
    $graph = new EasyRdf_Graph('http://opendiscovery.org/rdf/Conferences/TRIZ-Summit-2019/');
    $graph->parseFile($src);
    $out='<h3>Contributions</h3><div class="talks">';
    $res = $graph->allOfType('od:Talk');
    foreach ($res as $talk) {
        $autoren=getAutoren($talk);
        $presenter=$talk->get("od:presentedBy");
        $titel=process($talk->all("dcterms:title"),"<br>");
        $abstract=process($talk->all("dcterms:abstract"),"<p>");
        $section=$talk->get("swc:relatedToEvent");
        $urlPaper=$talk->get("od:urlPaper");
        $urlSlides=$talk->get("od:urlSlides");
        $out.='<hr/>
<div itemscope itemtype="http://schema.org/CreativeWork" class="talk">
  <h4>
  <div itemprop="title" class="talktitle">'.$titel.'</div></h4>
  <div class="referent"><p><strong>Author(s):</strong> '. $autoren.'</p></div>';
        if ($presenter) { 
            $out.='
  <div class="presenter"><p><strong>Presented by:</strong> <span itemprop="creator">'
            . $presenter->get("foaf:name") .'</span></p></div>';
        }
        if ($section) { 
            $out.='
  <div class="section"><p><strong>Track:</strong> '
            . $section->get("rdfs:label") .'</p></div>';
        }
        if ($urlSlides) { 
            $out.='
  <div class="slides"> <img alt="" src="images/13_icon_pdf.gif"'
            .' width="18px"/>&nbsp;<a href="'.$urlSlides.'">Slides</a> </div>';
        } 
        if ($urlPaper) { 
            $out.='
  <div class="paper"> <img alt="" src="images/13_icon_pdf.gif"'
            .' width="18px"/>&nbsp;<a href="'.$urlPaper.'">Paper</a> </div>';
        } 
        if ($abstract) { 
            $out.='
  <div itemprop="description" class="abstract"><p><strong>Abstract:</strong><br/> '
            . $abstract .'</p></div>';
        }
        $out.='
</div> <!-- end class talk -->';
    }
    $out.='
</div> <!-- end class talks -->';
    $a=array();
    $res = $graph->allOfType('foaf:Person');
    foreach ($res as $autor) {
        $b=array();
        foreach ($autor->all("foaf:affil") as $affil) {
            $b[]='<span itemprop="affiliation" class="foaf:affil">'
                .$affil->getValue().'</span>';
        }
        $a[$autor->getUri()]='<div itemscope itemtype="http://schema.org/Person" class="creator">'
            .'<p><span itemprop="name" class="foaf:name">'
            .$autor->get("foaf:name").'</span><br/>'
            .join('<br/>',$b).'</p></div>';
    }
    ksort($a);
    $out.='<h3>Speakers</h3>
<div class="people">
'.join("\n", $a).'
</div> <!-- end class people -->';
    return fixEncoding($out);
}

echo htmlEnv(abstracts('../rdf/TRIZ-Summit-2019.rdf')); // for testing

?>
