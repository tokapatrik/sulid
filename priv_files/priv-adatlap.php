<?
$userClassPtr = new User();
$misc = new Misc;

$userClassPtr->userLogdIn();

$color=$misc->stringToColorCode($_SESSION["user"]["usr_nev"]);
$monogram=substr($_SESSION["userTipusAdatok"][$_SESSION["user"]["usr_tipus"]."_nev_vezetek"],0,1).substr($_SESSION["userTipusAdatok"][$_SESSION["user"]["usr_tipus"]."_nev_kereszt"],0,1);

$prefix=$userClassPtr->getUserPrefix();

include('priv-site-top.php');
?>
<div class="bg-light pt-3">


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

        <div class="col ms-5 mb-3 me-5">
            <div>
                <h5 class="float-start">Személyes adatok:</h5>
                <i class="fas fa-edit float-end fa-lg"></i>
            </div>
            <table class="table table-sm table-hover">
                <tr>
                    <td colspan="2"class="fw-bolder" style="background-color:#212529; background:rgba(0, 0, 0, 0.075);">Név:</td>
                </tr>
                <tr>
                    <td class="ps-3">-Vezetéknév:</td>
                    <td><?echo $_SESSION["userTipusAdatok"][$prefix."_nev_vezetek"];?></td>
                </tr>
                <tr>
                    <td class="ps-3">-Keresztnév:</td>
                    <td><?echo $_SESSION["userTipusAdatok"][$prefix."_nev_kereszt"];?></td>
                </tr>
                <tr>
                    <td colspan="2"class="fw-bolder" style="background-color:#212529; background:rgba(0, 0, 0, 0.075);">Születési adatok:</td>
                </tr>
                <tr>
                    <td class="ps-3">-Idő:</td>
                    <td><?if($_SESSION["userTipusAdatok"][$prefix."_szul_ido"]>''){echo $_SESSION["userTipusAdatok"][$prefix."_szul_ido"];}else{echo "---";}?></td>
                </tr>
                <tr>
                    <td class="ps-3">-Hely:</td>
                    <td><?if($_SESSION["userTipusAdatok"][$prefix."_szul_hely"]>''){echo $_SESSION["userTipusAdatok"][$prefix."_szul_hely"];}else{echo "---";}?></td>
                </tr>
                <tr>
                    <td colspan="2"class="fw-bolder" style="background-color:#212529; background:rgba(0, 0, 0, 0.075);">Anyja adatok:</td>
                </tr>
                <tr>
                    <td class="ps-3">-Név:</td>
                    <td><?if($_SESSION["userTipusAdatok"][$prefix."_anyja_neve"]>''){echo $_SESSION["userTipusAdatok"][$prefix."_anyja_neve"];}else{echo "---";}?></td>
                </tr>
                <tr>
                    <td colspan="2"class="fw-bolder" style="background-color:#212529; background:rgba(0, 0, 0, 0.075);">Lakcím adatok:</td>
                </tr>
                <tr>
                    <td class="ps-3" id="szemelyesLegszelesebb">-Irányítószám, város:</td>
                    <td><?if($_SESSION["userTipusAdatok"][$prefix."_irsz"]>'') {echo $_SESSION["userTipusAdatok"][$prefix."_irsz"].", ".$_SESSION["userTipusAdatok"][$prefix."_varos"];}else{echo "---";}?></td>
                </tr>
                <tr>
                    <td class="ps-3">-Cím:</td>
                    <td><?if($_SESSION["userTipusAdatok"][$prefix."_cim"]>''){echo $_SESSION["userTipusAdatok"][$prefix."_cim"];}else{echo "---";};?></td>
                </tr>
            </table>
        </div>

        <div class="col ms-5 me-5 mb-3">
            <div>
                <h5 class="float-start">Elérhetőségi adatok:</h5>
                <i class="fas fa-edit float-end fa-lg"></i>
            </div>
            <table class="table table-sm table-hover">
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
                    <textarea class="form-control" disabled style="resize: none;" rows="8"></textarea>
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