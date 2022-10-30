<?php
include_once('ajax-top.php');

$retArray=array(
    'retCode' => 0,  //0=unset, 5=success, 9=error
    'retMsg' => '',  //Error esetén az üzenet
    'retData' => ''  //Success esetén az adat
);

/*
if($_REQUEST['vezetekNev'] ==''){$retArray["retData"]=1;}
if($_REQUEST['keresztNev'] ==''){$retArray["retData"]=2;}
if($_REQUEST['emailCim'] ==''){$retArray["retData"]=3;}
if($_REQUEST['jelszo1'] ==''){$retArray["retData"]=4;}
if($_REQUEST['jelszo2'] ==''){$retArray["retData"]=5;}
if($_REQUEST['intezmenyNeve'] ==''){$retArray["retData"]=6;}
if($_REQUEST['intezmenyOm'] ==''){$retArray["retData"]=7;}
if($_REQUEST['intezmenyIrsz'] ==''){$retArray["retData"]=8;}
if($_REQUEST['intezmenyVaros'] ==''){$retArray["retData"]=9;}
if($_REQUEST['intezmenyUtca'] ==''){$retArray["retData"]=10;}
*/

//Minden adat megvan?
if($_REQUEST["vezetekNev"]=='' || $_REQUEST["keresztNev"]=='' || $_REQUEST["emailCim"]=='' || $_REQUEST["jelszo1"]=='' || $_REQUEST["jelszo2"]=='' || $_REQUEST["intezmenyNeve"]=='' || $_REQUEST["intezmenyOm"]=='' || $_REQUEST["intezmenyIrsz"]=='' || $_REQUEST["intezmenyVaros"]=='' || $_REQUEST["intezmenyUtca"] =='')
{
    $retArray["retCode"]=9;
    $retArray["retMsg"]="Hiányzó adatok!";
}
else
{
    //Intézményi adatok ellenőrzése
    
    //Intézmény neve
    $_REQUEST["intezmenyNeve"]=ucwords($_REQUEST["intezmenyNeve"]);
    $rs= getQuery("SELECT * FROM iskola WHERE isk_nev='".$_REQUEST["intezmenyNeve"]."'");
    if(count($rs)==0)
    {
        //Intézmény OM
        $rs= getQuery("SELECT * FROM iskola WHERE isk_om='".$_REQUEST["intezmenyOm"]."'");
        if(count($rs)==0)
        {
            //Felhasználói adatok ellenőrzése

            //Felhasználónév
            $_REQUEST["vezetekNev"]=ucfirst($_REQUEST["vezetekNev"]);
            $_REQUEST["keresztNev"]=ucfirst($_REQUEST["keresztNev"]);
            $usr_nev=$_REQUEST["vezetekNev"]." ".$_REQUEST["keresztNev"];

            //Email
            $rs= getQuery("SELECT * FROM user WHERE usr_email='".$_REQUEST["emailCim"]."'");
            if(count($rs)==0)
            {

                //Jelszó
                if(strlen($_REQUEST["jelszo1"])>=8 && strlen($_REQUEST["jelszo1"])<=20 && preg_match('~[0-9]+~', $_REQUEST["jelszo1"]) && preg_match('/[A-Z]/', $_REQUEST["jelszo1"]) && preg_match('/[a-z]/', $_REQUEST["jelszo1"])) //Elég az egyik jelszóra mert egyezni fognak a frontend miatt, ha nem így járt
                {
                    //intézmény beszúr
                    $rs = setQuery("  INSERT INTO iskola (isk_nev, isk_om, isk_irsz, isk_varos, isk_cim)
                    VALUES ('".$_REQUEST["intezmenyNeve"]."', '".$_REQUEST["intezmenyOm"]."', '".$_REQUEST["intezmenyIrsz"]."', '".$_REQUEST["intezmenyVaros"]."', '".$_REQUEST["intezmenyUtca"]."');");
                    $iskId= getQuery("SELECT isk_id FROM iskola WHERE isk_nev='".$_REQUEST["intezmenyNeve"]."' AND isk_om='".$_REQUEST["intezmenyOm"]."'")[0]["isk_id"];
                    if($rs<>true)
                    {
                        $retArray["retCode"]=9;
                        $retArray["retMsg"]="Hiba az intézmény rögzítése során!";
                    }

                    //Mehet be a user
                    if($iskId!='')
                    {
                        $rs = setQuery(" INSERT INTO user (usr_isk_id, usr_nev, usr_nev_vezetek, usr_nev_kereszt, usr_email)
                                        VALUES ('".$iskId."', '".$usr_nev."', '".$_REQUEST["vezetekNev"]."', '".$_REQUEST["keresztNev"]."', '".$_REQUEST["emailCim"]."');");
                        $usrId= getQuery("SELECT usr_id FROM user WHERE usr_email='".$_REQUEST["emailCim"]."'")[0]["isk_id"];
                        $retArray["retCode"]=5;
                        $retArray["retMsg"]='';
                        if($rs<>true)
                        {
                            setQuery("DELETE FROM iskola WHERE isk_id='".$iskId."';"); //Mert ha nem tudjuk rögzíteni az igazgatót iskola se maradjon bent
                            $retArray["retCode"]=9;
                            $retArray["retMsg"]="Hiba a felhasználó rögzítése során!";
                        }
                    }
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
        $retArray["retMsg"]="A megadott intézmény név már szerepel a Sulid.hu nyilvántartásában!";
    }
}

echo json_encode($retArray);
?> 