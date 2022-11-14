<?php
class siteBuilder {

    
    public function __construct() {}
	public function build_URL_array()
	{
        $userClassPtr = new User();
        global $_URL;
        $_URL["host"] = str_replace('www.','',$_SERVER["HTTP_HOST"]);
        $_URL["hostPcs"] = explode('.',$_URL["host"]);
        if (count($_URL["hostPcs"]) > 2){
            $_URL["subdomain"] = $_URL["hostPcs"][0];
        }else{
            $_URL["subdomain"] = '';
        }

        if($_GET["file"]==''){
            //sulid.loc-ot hívott akkor pub-mainpage.php
            $_URL["website_path"]='';
            $_URL["php"]=array("pub","mainpage","php");
        }else{
            if(strrpos($_GET["file"],'/')!=false){
                //tehát almappa kell pl: priv
                $_URL["php"]=substr($_GET["file"], strrpos($_GET["file"],'/')+1, strlen($_GET["file"])-strrpos($_GET["file"],'/')-1);
                $_URL["website_path"]=str_replace($_URL["php"],'',$_GET["file"]);

                //$_URL["php"]=str_replace('-','.',$_URL["php"]);
                //$_URL["php"]=explode('.',$_URL["php"]);
            }else{
                //nincs almappa
                $_URL["website_path"]='';
                $_URL["php"]=$_GET["file"];
    
                //$_URL["php"]=str_replace('-','.',$_URL["php"]);
                //$_URL["php"]=explode('.',$_URL["php"]);
            }
        }
        //var_dump($_URL["website_path"]);
        //var_dump($_URL["php"]);

        //egyedi oldalak + kidolgozás alatt
        if ( $_URL["subdomain"] > '') 
        {
            $iskola = getQuery("SELECT * FROM iskola WHERE isk_rovid_nev='".$_URL["subdomain"]."'")[0];
            if($iskola["isk_id"]>0)
            {
                $_URL["php"]=array("pub","login","php");
            }
            else
            {
                header('location: //sulid.loc');
                exit();
            }
        }

        //üzemeltető oldalak + kidolgozás alatt
        if ($_URL["php"][0]=='admin') 
        {
            echo "Under construction!<br>";
            echo "üzemeltető oldalak";
        } 
        
        //pri oldalak
        if ($_URL["php"]=='priv' || $_URL["website_path"]=='priv/')  
        {
            $userClassPtr->userLogdIn();

            if($_URL["php"]=='priv')
            {
                $_URL["website_path"]="priv_files/";
                $_URL["php"]=array("priv","mainpage","php");
            }
            else
            {
                $_URL["php"]=array("priv",$_URL["php"],"php");
            }
        }
        
        //pub oldalak /regisztracio /login
        if (!is_array($_URL["php"])) // Ha be lett már állítva akkor tömb lesz
        {
            $_URL["php"]=array("pub",$_URL["php"],"php");
        }

        if(!file_exists($_URL["website_path"].$_URL["php"][0]."-".$_URL["php"][1].".".$_URL["php"][2])){
            $_URL["website_path"]='';
            $_URL["php"]=array("pub","mainpage","php");
        }
        $_URL["goURL"]=$_URL["website_path"].$_URL["php"][0]."-".$_URL["php"][1].".".$_URL["php"][2];

        return ($_URL["goURL"]);
    }
}
?>