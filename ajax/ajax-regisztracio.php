<?php
include_once('ajax-top.php');

$retArray=array(
    'retCode' => 0,  //0=unset, 5=success, 9=error
    'retMsg' => '',  //Error esetén az üzenet
    'retData' => ''  //Success esetén az adat
);

/*
$_REQUEST['vezetekNev'] ='Tóka';
$_REQUEST['keresztNev'] ='Patrik';
$_REQUEST['emailCim'] ='asd@asd.hu';
$_REQUEST['jelszo1'] ='1234Cubix1';
$_REQUEST['jelszo2'] ='1234Cubix1';
$_REQUEST['intezmenyNeve'] ='Jedlik';
$_REQUEST['intezmenyRovidNeve'] ='JedDIk';
$_REQUEST['intezmenyOm'] ='123';
$_REQUEST['intezmenyIrsz'] ='123';
$_REQUEST['intezmenyVaros'] ='123';
$_REQUEST['intezmenyUtca'] ='123';
*/

//Minden adat megvan?
if($_REQUEST["vezetekNev"]=='' || $_REQUEST["keresztNev"]=='' || $_REQUEST["emailCim"]=='' || $_REQUEST["jelszo1"]=='' || $_REQUEST["jelszo2"]=='' || $_REQUEST["intezmenyNeve"]=='' || $_REQUEST["intezmenyRovidNeve"]=='' || $_REQUEST["intezmenyOm"]=='' || $_REQUEST["intezmenyIrsz"]=='' || $_REQUEST["intezmenyVaros"]=='' || $_REQUEST["intezmenyUtca"] =='')
{
    $retArray["retCode"]=9;
    $retArray["retMsg"]="Hiányzó adatok!";
}
else
{
    //Intézményi adatok ellenőrzése
    
    //Intézmény neve
    $_REQUEST["intezmenyNeve"]=ucwords($_REQUEST["intezmenyNeve"]);
    $rs= getSQL("SELECT * FROM iskola WHERE isk_nev='".$_REQUEST["intezmenyNeve"]."'");
    if(count($rs)==0 || true)
    {
        //Intézmény Rövid neve
        $_REQUEST["intezmenyRovidNeve"]=strtolower($_REQUEST["intezmenyRovidNeve"]);
        $rs= getSQL("SELECT * FROM iskola WHERE isk_rovid_nev='".$_REQUEST["intezmenyRovidNeve"]."'");
        if(count($rs)==0 || strlen($_REQUEST["intezmenyRovidNeve"])<16)
        {
            //Intézmény OM
            $rs= getSQL("SELECT * FROM iskola WHERE isk_om='".$_REQUEST["intezmenyOm"]."'");
            if(count($rs)==0)
            {
                //Felhasználói adatok ellenőrzése

                //Felhasználónév
                $_REQUEST["vezetekNev"]=ucfirst($_REQUEST["vezetekNev"]);
                $_REQUEST["keresztNev"]=ucfirst($_REQUEST["keresztNev"]);
                $usr_nev=$_REQUEST["vezetekNev"]." ".$_REQUEST["keresztNev"];

                //Email
                $rs= getSQL("SELECT * FROM user WHERE usr_email='".$_REQUEST["emailCim"]."'");
                if(count($rs)==0)
                {

                    //Jelszó
                    if(strlen($_REQUEST["jelszo1"])>=8 && strlen($_REQUEST["jelszo1"])<=20 && preg_match('~[0-9]+~', $_REQUEST["jelszo1"]) && preg_match('/[A-Z]/', $_REQUEST["jelszo1"]) && preg_match('/[a-z]/', $_REQUEST["jelszo1"])) //Elég az egyik jelszóra mert egyezni fognak a frontend miatt, ha nem így járt
                    {
                        //intézmény beszúr
                        $rs = setSQL("    INSERT INTO iskola (isk_nev, isk_rovid_nev , isk_om, isk_irsz, isk_varos, isk_cim)
                                            VALUES ('".$_REQUEST["intezmenyNeve"]."','".$_REQUEST["intezmenyRovidNeve"]."', '".$_REQUEST["intezmenyOm"]."', '".$_REQUEST["intezmenyIrsz"]."', '".$_REQUEST["intezmenyVaros"]."', '".$_REQUEST["intezmenyUtca"]."');");
                        $iskId= getSQL("SELECT isk_id FROM iskola WHERE isk_nev='".$_REQUEST["intezmenyNeve"]."' AND isk_om='".$_REQUEST["intezmenyOm"]."'")[0]["isk_id"];

                        $hash = password_hash($_REQUEST["jelszo1"].HASH_SALT, PASSWORD_DEFAULT);

                        //user beszúr
                        $rs = setSQL("    INSERT INTO user (usr_isk_id, usr_nev, usr_tipus, usr_email, usr_jelszo)
                                            VALUES ('".$iskId."', '".$usr_nev."', 'vez', '".$_REQUEST["emailCim"]."', '".$hash."');");
                        
                        $usrId= getSQL("SELECT usr_id FROM user WHERE usr_email='".$_REQUEST["emailCim"]."'")[0]["usr_id"];

                        //Vezetőségi tag beszúr
                        $rs = setSQL("    INSERT INTO vezetoseg (vez_usr_id, vez_isk_id, vez_nev, vez_nev_vezetek, vez_nev_kereszt, vez_email)
                                            VALUES ('".$usrId."', '".$iskId."', '".$usr_nev."', '".$_REQUEST["vezetekNev"]."', '".$_REQUEST["keresztNev"]."', '".$_REQUEST["emailCim"]."');");
                        

                        $retArray["retCode"]=5;
                        $retArray["retMsg"]='';
                    }
                    else
                    {
                        $retArray["retCode"]=9;
                        $retArray["retMsg"]="A jelszónak 8-20 karakter hosszúnak kell lennie és tartalmazni kell számot és kis- és nagy betűt!";
                    }
                }
                else
                {
                    $retArray["retCode"]=9;
                    $retArray["retMsg"]="A megadott e-mail cím már használatban van!";
                }
            }
            else
            {
                $retArray["retCode"]=9;
                $retArray["retMsg"]="A megadott intézmény OM kód már szerepel a Sulid.hu nyilvántartásában!";
            }
        }
        else
        {
            $retArray["retCode"]=9;
            $retArray["retMsg"]="A megadott intézmény rövid név már szerepel a Sulid.hu nyilvántartásában vagy túl hosszú rövid névet adott meg!";
        }
        
    }
    else
    {
        $retArray["retCode"]=9;
        $retArray["retMsg"]="A megadott intézmény név már szerepel a Sulid.hu nyilvántartásában!";
    }
}

echo json_encode($retArray);
?> 