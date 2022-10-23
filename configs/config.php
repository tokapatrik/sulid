<?php
define("VERSION", '000000');
define("LISTHOSSZ", 50);
define("HASH_SALT",'E45G67V01P89');

define("HOST_DEV",  'sulid.loc');
define("HOST_LIVE", 'some URL'); //Sose lesz

define("SMTP_HOST", 'some IP');
define("SMTP_USERNAME", 'asdasd');
define("SMTP_PASSWORD", 'asdasd');

if ($_SERVER["HTTP_HOST"] == HOST_DEV || substr($_SERVER["HTTP_HOST"],-4)=='.loc')
{
	//.loc oldalak 
    define("EO_DOMAIN", 'egyesuletonline.loc');
    define("DB_HOST", 'localhost');
	define("DB_DATABASE", 'egyesuletonline');
    define("DB_USERNAME", 'root');
	define("DB_PASSWORD", '');
    define("SMTP", false);

} else 
{
	//Éles oldalak, ami sose lesz
    define("EO_DOMAIN", 'Some URL');
    define("DB_HOST", 'Some mysql');
    define("DB_DATABASE", 'Some DB name');
	define("DB_USERNAME", 'Some USR name');
	define("DB_PASSWORD", 'Some PWD');
    define("SMTP", true);

}

?>