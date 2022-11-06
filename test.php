<?php
include_once("include.php");
$hash = password_hash("1234Cubix1", PASSWORD_DEFAULT);
var_dump(gmdate('Y-m-d h:i:s \G\M\T', time()));

?>