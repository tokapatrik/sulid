<?
include_once('ajax-top.php');
session_name('SessionName');
session_set_cookie_params(10800,ini_get('session.cookie_path'),'.sulid.loc');
session_start();

$keys=array_keys($_POST);
$values=array_values($_POST);
$_SESSION["nyitva"][$keys[0]."_".$values[0]]=$values[1];
?>