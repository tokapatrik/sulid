<?php
# SEF URL processing >> crate a $_SEFURL[] Array based on URL
include_once('classes/class.siteBuildingUtils.php');
$siteBuildingUtils = new siteBuildingUtils( $_SERVER["HTTP_HOST"] );
$file=$siteBuildingUtils->build_SEFURL_array();


require_once($file);

?>