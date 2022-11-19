<?
include_once('ajax-top.php');
session_name('SessionName');
session_set_cookie_params(10800,ini_get('session.cookie_path'),'.sulid.loc');
session_start();

$val=array_values($_POST);
if(count($_SESSION["kijeloltek"])>0)
{
    $keys=array_keys($_SESSION["kijeloltek"]);
    if(in_array($val[0], $keys) && ($val[1]=='false'))
    {
        unset($_SESSION["kijeloltek"][$val[0]]);
    }
    else
    {
        $_SESSION["kijeloltek"][$val[0]]=$val[1];
    }
}
else
{
    $_SESSION["kijeloltek"][$val[0]]=$val[1];
}
?>