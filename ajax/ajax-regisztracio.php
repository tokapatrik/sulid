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
    $retArray["retCode"]=5;
    $retArray["retData"]="success";
}

echo json_encode($retArray);
?> 