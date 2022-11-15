<?php
include_once('ajax-top.php');

$retArray=array(
    'retCode' => 5,  //0=unset, 5=success,6=nincs talalat, 9=error
    'retMsg' => '',  //Error esetén az üzenet
    'retData' => ''  //Success esetén az adat
);

if(strlen($_REQUEST["searchbar"])>=3)
{
    //Keresünk névre
    $rsForNev = getSQL("SELECT * FROM iskola WHERE isk_nev LIKE '%".$_REQUEST["searchbar"]."%'");

    //Keresünk OM kódra (OMK)
    $rsForOMk = getSQL("SELECT * FROM iskola WHERE isk_om LIKE '%".$_REQUEST["searchbar"]."%'");

    $rs =array_merge($rsForNev, $rsForOMk);
    
    //Ha van találat
    if(count($rs)>0)
    {
        $output ;
        foreach($rs as $iskola)
        {
            $output.='  <div class="card mb-4 mx-5 loginKeresesCard">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-10">
                                        <h5 class="mb-0">'.$iskola["isk_nev"].'</h5>
                                    </div>
                                    <div class="col-2 my-auto">
                                            <a href="//'.$iskola["isk_rovid_nev"].'.sulid.loc" class="btn btn-primary">Tovább</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">

                                        <p class="mb-0">OM kód: '.$iskola["isk_om"].'<br>
                                        Cím:    '.$iskola["isk_irsz"].' '.$iskola["isk_varos"].', '.$iskola["isk_cim"].'<br>
                                        E-mail: '.(($iskola["isk_email"]>'')? $iskola["isk_email"] : '---').'</p>
                            </div>
                        </div>';

        }
        $retArray["retCode"]=5;
        $retArray["retMsg"]="Siker";
        $retArray["retData"]=$output;
    }
    else
    {
        $retArray["retCode"]=6;
        $retArray["retMsg"]="Nincs talalat";
        $retArray["retData"]='<i class="far fa-frown fa-5x mb-3 opacity-25 text-muted"></i><br><h5 class="mb-0">Nincs találat a Sulid.hu adatbázisában!</h5><p>Kérjük ellenőrizze a keresési kifejezést</p>';
    }
}
else
{
    $retArray["retCode"]=9;
    $retArray["retMsg"]="Kérjük pontosítsa a keresést!";
    $retArray["retData"]='';
}

echo json_encode($retArray);
?> 