<?php
class siteBuildingUtils {
    private $domain;
    
    public function __construct($f_domain) 
    {
        $domain = $f_domain;
    
    }
    
	public function build_SEFURL_array($defPHP = 'pub-mainpage.php')
	{
        global $_SEFURL;
        if (strpos($_SERVER["HTTP_HOST"], '/') !== false) {
            $_SEFURL = explode("/", $_GET['SEFURL']);
        }
        $host = str_replace('www.','',$_SERVER["HTTP_HOST"]);
        $hostPcs = explode('.',$host);
        $website_path = '';
        $php='';
   
        if (count($hostPcs) > 2) $subdomain = $hostPcs[0]; else $subdomain = '';
        
        //egyedi oldalak
        if ( $subdomain > '') 
        {
            //Ilyen lesz pl: jedlik.sulid.hu és akkor innen már jöhet a login
        }
        
        //üzemeltető oldalak
        if ($website_path == '' and $_SEFURL[0]=='admin' ) 
        {
            //Áttekintés jelsző váltás stb...
        } 
        
        //pri oldalak
        if ($website_path == '' and $_SEFURL[0]=='pri' )  
        {

        }
        
        # ha még mindig semmi
        if ($_SEFURL[0]>'')  
        {
            $php = 'pub-'.$_SEFURL[0];
        }

        # $_SEFURL['file'] beállítása
        # ###########################
        $_SEFURL['file'] = '';
        if ($php > '') {
            if (substr($php,-4)!='.php') $php .= '.php';
            $_SEFURL['file'] = $website_path.$php;    
        }
        if (($_SEFURL['file']=='') or !file_exists($_SEFURL['file'])) {
            $_SEFURL['file'] = $website_path.$defPHP;
        }
        return($_SEFURL['file']);
    }
}
?>