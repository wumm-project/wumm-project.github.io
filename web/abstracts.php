<?php
require_once 'lib/EasyRdf.php';
require_once 'helper.php';

function getAbstractsAutoren($node) 
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

function abstracts($atts) 
{
    $src=$atts['source'];
    EasyRdf_Namespace::set('od', 'http://opendiscovery.org/rdf/Model#');
    EasyRdf_Namespace::set('dcterms', 'http://purl.org/dc/terms/');
    EasyRdf_Namespace::set('swc', 'http://data.semanticweb.org/ns/swc/ontology#');
    $graph = new EasyRdf_Graph('http://opendiscovery.org/rdf/Conferences/TRIZ-Summit-2019/');
    $graph->parseFile('/home/graebe/git/WUMM/RDFData/Conferences/a.rdf');
    // $graph->parseFile('http://www.leibniz-institut.de/rdf/'.$src.'.rdf');
    $out='<h3>Beiträge</h3><div class="talks">';
    $res = $graph->allOfType('od:Talk');
    foreach ($res as $talk) {
        $autoren=getAbstractsAutoren($talk);
        $presenter=$talk->get("lifis:presentedBy");
        $titel=$talk->get("dcterms:title");
        $abstract=join("<br/>",$talk->all("dcterms:abstract"));
        $section=$talk->get("swc:relatedToEvent");
        $urlPaper=$talk->get("lifis:urlPaper");
        $urlSlides=$talk->get("lifis:urlSlides");
        $out.='
<div itemscope itemtype="http://schema.org/CreativeWork" class="talk">
  <h4 itemprop="title" class="talktitle">'.$titel.'</h4>
  <div class="referent"><p><strong>Autor(en):</strong> '. $autoren.'</p></div>';
        if ($presenter) { 
            $out.='
  <div class="presenter"><p><strong>Präsentiert von:</strong> <span itemprop="creator">'
            . $presenter->get("foaf:name") .'</span></p></div>';
        }
        if ($section) { 
            $out.='
  <div class="section"><p><strong>Thema:</strong> '
            . $section->get("rdfs:label") .'</p></div>';
        }
        if ($urlSlides) { 
            $out.='
  <div class="slides"> <img alt="" src="https://www.leibniz-institut.de/images/13_icon_pdf.gif"'
            .' width="18px"/>&nbsp;<a href="'.$urlSlides.'">Vortragsfolien</a> </div>';
        } 
        if ($urlPaper) { 
            $out.='
  <div class="paper"> <img alt="" src="https://www.leibniz-institut.de/images/13_icon_pdf.gif"'
            .' width="18px"/>&nbsp;<a href="'.$urlPaper.'">Aufsatz</a> </div>';
        } 
        if ($abstract) { 
            $out.='
  <div itemprop="description" class="abstract"><p><strong>Abstract:</strong> '
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
    $out.='<h3>Referenten</h3>
<div class="people">
'.join("\n", $a).'
</div> <!-- end class people -->';
    return fixEncoding($out);
}

echo htmlEnv(abstracts($s)); // for testing

?>
