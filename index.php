<?php

include_once('include.php'); 

// ha van kiterjelsztés, és az nem .php, akkor letiltjuk
$uripcs = explode('.',explode('?',$_SERVER["REQUEST_URI"])[0]);
if (count($uripcs)>1 //van .php?
    && (end($uripcs)<>'php') //eltér a vége a .php-tól?
) {
    header('HTTP/1.1 404 Not Found');
    echo '404! File not found!';
    exit;
}

session_name('SessionName');
session_set_cookie_params(10800,ini_get('session.cookie_path'),'.sulid.loc');
session_start();

$siteBuilder = new siteBuilder();
$file=$siteBuilder->build_URL_array();

require_once($file);

?>