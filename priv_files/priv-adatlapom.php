<?
$userClassPtr = new User();
$misc = new Misc;

$userClassPtr->userLogdIn();

$color=$misc->stringToColorCode($_SESSION["user"]["usr_nev"]);
$monogram=substr($_SESSION["userTipusAdatok"][$_SESSION["user"]["usr_tipus"]."_nev_vezetek"],0,1).substr($_SESSION["userTipusAdatok"][$_SESSION["user"]["usr_tipus"]."_nev_kereszt"],0,1);

$prefix=$userClassPtr->getUserPrefix();

if(count($_REQUEST)>1)
{
    if($_REQUEST[$prefix."_nev_vezetek"]>'' || $_REQUEST[$prefix."_nev_kereszt"]>'') {$_REQUEST[$prefix."_nev"]=$_REQUEST[$prefix."_nev_vezetek"]." ".$_REQUEST[$prefix."_nev_kereszt"];}
    $keys=[];
    foreach ($_REQUEST as $key => $value) {
        if($value!=''){ $keys[]=$key; }
    }
    array_shift($keys); //Kivesszük az első elemet

    //Update nem a user tábla hanem a 3 közül valamelyik
    $melyikTabla;
    if($prefix=="vez") {$melyikTabla="vezetoseg";}
    if($prefix=="okt") {$melyikTabla="oktato";}
    if($prefix=="tan") {$melyikTabla="tanulo";}

    $buildSQLUpdate="UPDATE ".$melyikTabla." ";
    $buildSQLValue = "SET ";
    for ($i=0; $i < count($keys); $i++)
    { 
        $buildSQLValue.=$keys[$i]."='".$_REQUEST[$keys[$i]]."'";
        if($i+1!=count($keys))
        {
            $buildSQLValue.=", ";
        }
    }
    $buildSQLWhere="WHERE ".$prefix."_id=".$_SESSION["userTipusAdatok"][$prefix."_id"];
    $buildSQL=$buildSQLUpdate.$buildSQLValue.$buildSQLWhere;
    setSQL($buildSQL);
    $misc->updateSessionFroDB("userTipusAdatok",$melyikTabla);

    //Update user tábla
    if($_REQUEST[$prefix."_nev"]>'')
    {
        setSQL("UPDATE user SET usr_nev='".$_REQUEST[$prefix."_nev"]."' WHERE usr_id='".$_SESSION["userTipusAdatok"][$prefix."_usr_id"]."'");
        $misc->updateSessionFroDB("user","user");
        $color=$misc->stringToColorCode($_SESSION["user"]["usr_nev"]);
    }
}

include('priv-site-top.php');
?>
<div class="bg-light pt-3 pb-5">


<div class="card shadow ms-5 me-5">

    <div class=" ms-5 me-5 mt-3 mb-3 pb-3" style="border-bottom:dashed 3px #e1e1e1">
        <div class="nameBoxLogoAdatlap me-3 p-0" style="background: #<?echo $color?>"><?echo $monogram?></div>

        <div class="d-flex flex-column h-100 justify-content-center">
            <h3 class="mb-1"><?echo $_SESSION["user"]["usr_nev"]?></h3>
            <h5 class="m-0 "><?echo $_SESSION["user"]["usr_email"]?></h5>
            <h5 class="m-0 "><?echo (($_SESSION["user"]["usr_tipus"])=='vez')? "Vezetőségi tag" : ((($_SESSION["user"]["usr_tipus"])=='okt')? "Tanár" : ((($_SESSION["user"]["usr_tipus"])=='tan')? "Tanuló" : ""))?></h5>
            <div class="position-absolute end-0 me-5 d-flex flex-column h-100 justify-content-center">
                <h5 class="mb-1">#<?echo $_SESSION["user"]["usr_id"]?></h5>
            </div>
        </div>
    </div>

    <div class="row" style="--bs-gutter-x:0px;">

        <form method="post" class="col ms-3 ps-2 mb-5 pb-3 me-3 pe-2 pt-2" id="szemelyesAdatokForm">
            <div>
                <h5 class="float-start">Személyes adatok:</h5>
                <i class="fas fa-edit float-end fa-lg" id="editSzemelyesAdatok"></i>
            </div>
            <table class="table align-middle table-sm table-hover">
                <tr>
                    <td colspan="2"class="fw-bolder" style="background-color:#212529; background:rgba(0, 0, 0, 0.075);">Név:</td>
                </tr>
                <tr>
                    <td class="ps-3">-Vezetéknév:</td>
                    <td>
                        <div class="szemelyesAdatok"><?echo $_SESSION["userTipusAdatok"][$prefix."_nev_vezetek"];?></div>
                        <div class="d-flex" ><input class="form-control me-3 szemelyesAdatokHidden" type="hidden"<?echo 'name="'.$prefix.'_nev_vezetek" value="'.$_SESSION["userTipusAdatok"][$prefix."_nev_vezetek"].'"';?>></div>
                    </td>
                </tr>
                <tr>
                    <td class="ps-3">-Keresztnév:</td>
                    <td>
                        <div class="szemelyesAdatok"><?echo $_SESSION["userTipusAdatok"][$prefix."_nev_kereszt"];?></div>
                        <div class="d-flex" ><input class="form-control me-3 szemelyesAdatokHidden" type="hidden"<?echo 'name="'.$prefix.'_nev_kereszt" value="'.$_SESSION["userTipusAdatok"][$prefix."_nev_kereszt"].'"';?>></div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"class="fw-bolder" style="background-color:#212529; background:rgba(0, 0, 0, 0.075);">Születési adatok:</td>
                </tr>
                <tr>
                    <td class="ps-3">-Idő:</td>
                    <td>
                        <div class="szemelyesAdatok"><?if($_SESSION["userTipusAdatok"][$prefix."_szul_ido"]>''){echo $_SESSION["userTipusAdatok"][$prefix."_szul_ido"];}else{echo "---";}?></div>
                        <div class="d-flex" ><input class="form-control me-3 szemelyesAdatokHidden" max='9999-12-31' id="szulido"type="hidden"<?echo 'name="'.$prefix.'_szul_ido" value="'.(($_SESSION["userTipusAdatok"][$prefix."_szul_ido"]>'')? $_SESSION["userTipusAdatok"][$prefix."_szul_ido"] : "").'"';?>></div>
                    </td>
                </tr>
                <tr>
                    <td class="ps-3">-Hely:</td>
                    <td>
                        <div class="szemelyesAdatok"><?if($_SESSION["userTipusAdatok"][$prefix."_szul_hely"]>''){echo $_SESSION["userTipusAdatok"][$prefix."_szul_hely"];}else{echo "---";}?></div>
                        <div class="d-flex" ><input class="form-control me-3 szemelyesAdatokHidden" type="hidden"<?echo 'name="'.$prefix.'_szul_hely" value="'.(($_SESSION["userTipusAdatok"][$prefix."_szul_hely"]>'')? $_SESSION["userTipusAdatok"][$prefix."_szul_hely"] : "").'"';?>></div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"class="fw-bolder" style="background-color:#212529; background:rgba(0, 0, 0, 0.075);">Anyja adatok:</td>
                </tr>
                <tr>
                    <td class="ps-3">-Név:</td>
                    <td>
                        <div class="szemelyesAdatok"><?if($_SESSION["userTipusAdatok"][$prefix."_anyja_neve"]>''){echo $_SESSION["userTipusAdatok"][$prefix."_anyja_neve"];}else{echo "---";}?></div>
                        <div class="d-flex" ><input class="form-control me-3 szemelyesAdatokHidden" type="hidden"<?echo 'name="'.$prefix.'_anyja_neve" value="'.(($_SESSION["userTipusAdatok"][$prefix."_anyja_neve"]>'')? $_SESSION["userTipusAdatok"][$prefix."_anyja_neve"] : "").'"';?>></div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"class="fw-bolder" style="background-color:#212529; background:rgba(0, 0, 0, 0.075);">Lakcím adatok:</td>
                </tr>
                <tr>
                    <td class="ps-3" id="szemelyesLegszelesebb">-Irányítószám, város:</td>
                    <td>
                        <div class="szemelyesAdatok"><?if($_SESSION["userTipusAdatok"][$prefix."_irsz"]>'') {echo $_SESSION["userTipusAdatok"][$prefix."_irsz"].", ".$_SESSION["userTipusAdatok"][$prefix."_varos"];}else{echo "---";}?></div>
                        <div class="d-flex">
                            <input class="form-control me-3 szemelyesAdatokHidden" type="hidden"<?echo 'name="'.$prefix.'_irsz" value="'.(($_SESSION["userTipusAdatok"][$prefix."_irsz"]>'')? $_SESSION["userTipusAdatok"][$prefix."_irsz"] : "").'"';?>>
                            <input class="form-control me-3 szemelyesAdatokHidden" type="hidden"<?echo 'name="'.$prefix.'_varos" value="'.(($_SESSION["userTipusAdatok"][$prefix."_varos"]>'')? $_SESSION["userTipusAdatok"][$prefix."_varos"] : "").'"';?>>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="ps-3">-Cím:</td>
                    <td>
                        <div class="szemelyesAdatok"><?if($_SESSION["userTipusAdatok"][$prefix."_cim"]>''){echo $_SESSION["userTipusAdatok"][$prefix."_cim"];}else{echo "---";};?></div>
                        <div class="d-flex" ><input class="form-control me-3 szemelyesAdatokHidden" type="hidden"<?echo 'name="'.$prefix.'_cim" value="'.(($_SESSION["userTipusAdatok"][$prefix."_cim"]>'')? $_SESSION["userTipusAdatok"][$prefix."_cim"] : "").'"';?>></div>
                    </td>
                </tr>
            </table>
            <button type="submit" class="btn btn-success float-end szemelyesButton" hidden>Mentés</button>
            <div class="btn btn-secondary float-end me-3 szemelyesButton" hidden id="saveMegse">Mégse</div>
        </form>

        <div class="col ms-5 me-5 mb-3 pt-2">
            <div>
                <h5 class="float-start">Elérhetőségi adatok:</h5>
                <i class="fas fa-edit float-end fa-lg"></i>
            </div>
            <table class="table table-sm table-hover mb-5">
                <tr>
                    <td colspan="2"class="fw-bolder" style="background-color:#212529; background:rgba(0, 0, 0, 0.075);">Elérhetőség:</td>
                </tr>
                <tr>
                    <td class="ps-3" id="elerhetosegEgyik">-E-mail:</td>
                    <td><?echo $_SESSION["userTipusAdatok"][$prefix."_email"];?></td>
                </tr>
                <tr>
                    <td class="ps-3">-Telefon:</td>
                    <td><?if($_SESSION["userTipusAdatok"][$prefix."_tel"]>''){echo $_SESSION["userTipusAdatok"][$prefix."_tel"];}else{echo "---";}?></td>
                </tr>
            </table>
            <?
            if($prefix=="vez")
            {
                echo '
                    <div>
                        <h5 class="float-start">Leírás:</h5>
                        <i class="fas fa-edit float-end fa-lg"></i>
                    </div>
                    <textarea class="form-control me-3" disabled style="resize: none;" rows="7"></textarea>
                ';
            }
            if($prefix=="tan")
            {
                echo '
                <div>
                    <h5 class="float-start">Kapcsolattartói adatok:</h5>
                    <i class="fas fa-edit float-end fa-lg"></i>
                </div>
                <table class="table table-sm table-hover">
                    <tr>
                        <td colspan="2"class="fw-bolder" style="background-color:#212529; background:rgba(0, 0, 0, 0.075);">Elérhetőség:</td>
                    </tr>
                    <tr>
                        <td class="ps-3" id="elerhetosegEgyik">-Szülő neve:</td>
                        <td>'.(($_SESSION["userTipusAdatok"][$prefix."_szul_nev"]>'')? $_SESSION["userTipusAdatok"][$prefix."_szul_email"] : "---").'</td>
                    </tr>
                    <tr>
                        <td class="ps-3" id="elerhetosegEgyik">-Szülő e-mail:</td>
                        <td>'.(($_SESSION["userTipusAdatok"][$prefix."_szul_email"]>'')? $_SESSION["userTipusAdatok"][$prefix."_szul_email"] : "---").'</td>
                    </tr>
                    <tr>
                        <td class="ps-3">-Szülő telefon:</td>
                        <td>'.(($_SESSION["userTipusAdatok"][$prefix."_szul_tel"]>'')? $_SESSION["userTipusAdatok"][$prefix."_szul_tel"] : "---").'</td>
                    </tr>
                </table>
                ';
            }
            ?>
        </div>

    </div>
    
</div>

</div>
<?
include('priv-site-bottom.php');  
?>