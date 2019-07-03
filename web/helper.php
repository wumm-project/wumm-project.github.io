<?php

function htmlEnv($out) 
{
    return '
<HTML>
<HEAD>
  <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
</HEAD><BODY>
'.$out.'
</BODY></HTML>
';
}

function fixEncoding($out) 
{
    return str_replace(
        array("„","“","–"), array("&#8222","&#8221","&ndash;"), $out
    );
}

function getFile($fn) 
{
    if (! defined('ABSPATH') ) {
        return $fn; 
    } else {
        return plugin_dir_path(__FILE__).$fn; 
    } 
}
