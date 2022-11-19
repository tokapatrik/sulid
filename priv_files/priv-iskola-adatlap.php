<?
$misc = new Misc;

if(count($_REQUEST)>1)
{
    //Jogosultság vizsgálat
    if($_SESSION["user"]["usr_tipus"]=="vez")
    {
        $keys=[];
        foreach ($_REQUEST as $key => $value) {
            if($value!=''){ $keys[]=$key; }
        }
        array_shift($keys); //Kivesszük az első elemet

        $buildSQLUpdate="UPDATE iskola ";
        $buildSQLValue = "SET ";
        for ($i=0; $i < count($keys); $i++)
        { 
            $buildSQLValue.=$keys[$i]."='".$_REQUEST[$keys[$i]]."'";
            if($i+1!=count($keys))
            {
                $buildSQLValue.=", ";
            }
        }
        $buildSQLWhere="WHERE isk_id=".$_SESSION["iskola"]["isk_id"];
        $buildSQL=$buildSQLUpdate.$buildSQLValue.$buildSQLWhere;
        setSQL($buildSQL);
        $misc->updateSessionFromDB("iskola","iskola");
    }
}

include('priv-site-top.php');
?>
<div class="pt-3 pb-5">

    <div class="card shadow ms-5 me-5 pb-3">

        <div class=" ms-5 me-5 mt-3 mb-3" style="border-bottom:dashed 3px #e1e1e1">
            <div class="d-flex align-items-center">
                <h3 class="mb-1"><?echo $_SESSION["iskola"]["isk_nev"]?></h3>
                <div class="position-absolute end-0 me-5 d-flex flex-column justify-content-center">
                    <h5 class="mb-1">#<?echo $_SESSION["iskola"]["isk_id"]?></h5>
                </div>
            </div>
        </div>

        <div class="row" style="--bs-gutter-x:0px;">

            <form method="post" class="col ms-5 ps-2 pb-3 me-3 pe-2 pt-2" id="intezmenyAdatokForm">
                <div>
                    <h5 class="float-start">Intézmény adatok:</h5>
                    <?if($_SESSION["user"]["usr_tipus"]=="vez"){echo '<i class="fas fa-edit float-end fa-lg" id="editintezmenyAdatok"></i>';}?>
                </div>
                <table class="table align-middle table-sm table-hover">
                    <tr>
                        <td colspan="2"class="fw-bolder" style="background-color:#212529; background:rgba(0, 0, 0, 0.075);">Név:</td>
                    </tr>
                    <tr>
                        <td class="ps-3">-Teljes név:</td>
                        <td>
                            <div class="intezmenyAdatok"><?echo $_SESSION["iskola"]["isk_nev"];?></div>
                            <div class="d-flex" ><input class="form-control me-3 intezmenyAdatokHidden" type="hidden"<?echo 'name="isk_nev" value="'.$_SESSION["iskola"]["isk_nev"].'"';?>></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-3">-Rövid név:</td>
                        <td>
                            <div class="intezmenyAdatok"><?echo $_SESSION["iskola"]["isk_rovid_nev"];?></div>
                            <div class="d-flex" ><input class="form-control me-3 intezmenyAdatokHidden" type="hidden"<?echo 'name="isk_rovid_nev" value="'.$_SESSION["iskola"]["isk_rovid_nev"].'"';?>></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"class="fw-bolder" style="background-color:#212529; background:rgba(0, 0, 0, 0.075);">Oktatási azonosító:</td>
                    </tr>
                    <tr>
                        <td class="ps-3">-OM Kód:</td>
                        <td>
                            <div class="intezmenyAdatok"><?echo $_SESSION["iskola"]["isk_om"];?></div>
                            <div class="d-flex" ><input class="form-control me-3 intezmenyAdatokHidden" type="hidden"<?echo 'name="isk_om" value="'.$_SESSION["iskola"]["isk_om"].'"';?>></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"class="fw-bolder" style="background-color:#212529; background:rgba(0, 0, 0, 0.075);">Cím adatok:</td>
                    </tr>
                    <tr>
                        <td class="ps-3">-Irányítószám, város:</td>
                        <td>
                            <div class="intezmenyAdatok"><?if($_SESSION["iskola"]["isk_irsz"]>'') {echo $_SESSION["iskola"]["isk_irsz"].", ".$_SESSION["iskola"]["isk_varos"];}else{echo "---";}?></div>
                            <div class="d-flex">
                                <input class="form-control me-3 intezmenyAdatokHidden" type="hidden"<?echo 'name="isk_irsz" value="'.(($_SESSION["iskola"]["isk_irsz"]>'')? $_SESSION["iskola"]["isk_irsz"] : "").'"';?>>
                                <input class="form-control me-3 intezmenyAdatokHidden" type="hidden"<?echo 'name="isk_varos" value="'.(($_SESSION["iskola"]["isk_varos"]>'')? $_SESSION["iskola"]["isk_varos"] : "").'"';?>>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-3">-Cím:</td>
                        <td>
                            <div class="intezmenyAdatok"><?if($_SESSION["iskola"]["isk_cim"]>''){echo $_SESSION["iskola"]["isk_cim"];}else{echo "---";};?></div>
                            <div class="d-flex" ><input class="form-control me-3 intezmenyAdatokHidden" type="hidden"<?echo 'name="isk_cim" value="'.(($_SESSION["iskola"]["isk_cim"]>'')? $_SESSION["iskola"]["isk_cim"] : "").'"';?>></div>
                        </td>
                    </tr>
                </table>
                <button type="submit" class="btn btn-success float-end szemelyesButton" hidden>Mentés</button>
                <div class="btn btn-secondary float-end me-3 szemelyesButton" hidden id="saveMegse">Mégse</div>
            </form>
            <div class="col ms-5 me-3">
                <form class="ps-2 pb-3 pe-2 pt-2" id="intezmenyElerhetosegiAdatokForm">
                    <div>
                        <h5 class="float-start">Elérhetőségi adatok:</h5>
                        <?if($_SESSION["user"]["usr_tipus"]=="vez"){echo '<i class="fas fa-edit float-end fa-lg" id="editintezmenyElerhetosegiAdatok"></i>';}?>
                    </div>
                    <table class="table table-sm table-hover mb-3">
                        <tr>
                            <td colspan="2"class="fw-bolder" style="background-color:#212529; background:rgba(0, 0, 0, 0.075);">Elérhetőség:</td>
                        </tr>
                        <tr>
                            <td class="ps-3">-E-mail:</td>
                            <td>
                                <div class="intezmenyElerhetosegiAdatok"><?if($_SESSION["iskola"]["isk_email"]>''){echo $_SESSION["iskola"]["isk_email"];}else{echo "---";}?></div>
                                <div class="d-flex" ><input class="form-control me-3 intezmenyElerhetosegiAdatokHidden" type="hidden"<?echo 'name="isk_email" value="'.$_SESSION["iskola"]["isk_email"].'"';?>></div>
                            </td>
                        </tr>
                        <tr>
                            <td class="ps-3">-Telefon:</td>
                            <td>
                                <div class="intezmenyElerhetosegiAdatok"><?if($_SESSION["iskola"]["isk_tel"]>''){echo $_SESSION["iskola"]["isk_tel"];}else{echo "---";}?></div>
                                <div class="d-flex" ><input class="form-control me-3 intezmenyElerhetosegiAdatokHidden" type="hidden"<?echo 'name="isk_tel" value="'.$_SESSION["iskola"]["isk_tel"].'"';?>></div>
                            </td>
                        </tr>
                    </table>
                    <div class="d-flex justify-content-end">
                        <div class="btn btn-secondary me-3 intezmenyElerhetosegiButton me-3" hidden id="intezmenyElerhetosegiSaveMegse">Mégse</div>
                        <button type="submit" class="btn btn-success intezmenyElerhetosegiButton" hidden >Mentés</button>
                    </div>
                </form>
                <form class="mt-2 ps-2 pb-3 pe-2 pt-2" id="intezmenyLeirasForm">
                    <div>
                        <h5 class="float-start">Leírás:</h5>
                        <?if($_SESSION["user"]["usr_tipus"]=="vez"){echo '<i class="fas fa-edit float-end fa-lg" id="editIntezmenyLeiras"></i>';}?>
                    </div>
                    <textarea class="form-control me-3 mb-3" id="intezmenyLeiras" disabled name="isk_leiras" style="resize: none;" rows="4"><?echo $_SESSION["iskola"]["isk_leiras"]?></textarea>
                    <div class="d-flex justify-content-end">
                        <div class="btn btn-secondary me-3 intezmenyLeirasButton me-3" hidden id="intezmenyLeirasSaveMegse">Mégse</div>
                        <button type="submit" class="btn btn-success intezmenyLeirasButton" hidden >Mentés</button>
                    </div>
                </form>
            </div>
        </div>
        
    </div>

</div>
<?
include('priv-site-bottom.php');  
?>