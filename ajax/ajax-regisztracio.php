<?php
include_once('ajax-top.php');

$retArr = array("retCode","retMsg","retHtml");

if($_REQUEST["pageNumber"]==0)
{
    //Mehet az 1. lap
    $retArr["retCode"]='5';
    $retArr["retMsg"]='';
    $retArr["retHtml"]='
                        <div class="regisztracio-header">
                            <div class="progrss-container">
                                <div class="progrssbar" id="progressbar"></div>
                                <div class="circle activec"><h4>1</h4></div>
                                <div class="circle "><h4>2</h4></div>
                                <div class="circle "><h4>3</h4></div>
                                <div class="circle "><h4>4</h4></div>
                            </div>
                            <div class="progrss-labels">
                                <div class="progress-label "><p class="label-text">ÁSZF és Adatkezelési Tájékoztató</p></div>
                                <div class="progress-label "><p class="label-text">Felhasználói adatok</p></div>
                                <div class="progress-label "><p class="label-text">Intézményi adatok</p></div>
                                <div class="progress-label "><p class="label-text">Áttekintés</p></div>
                            </div>
                        </div>
                        <div class="aszf-container border shadow-sm">'.ASZF.'</div>
                        <form id ="regisztracio-form">
                            <input type="hidden" name="pageNumber" value="1">
                            <div class="form-container1">
                                <div>
                                    <input class="form-check-input" type="checkbox" id="checkAszf" name="checkAszf">
                                    <label class="form-check-label">Elolvastam és elfogadom az Általános Szerződési Feltételeket.</label>
                                </div>
                                <div>
                                    <input class="form-check-input" type="checkbox" id="checkAdat" name="checkAdat">
                                    <label class="form-check-label">Hozzájárulok, hogy adataimat a Sulid.hu rendszer tárolja és kezelje.</label>
                                </div>
                            </div>
                        </form>
                        <a class="btn btn-primary prev" id="prev" >Vissza</a>
                        <a class="btn btn-primary next" id="next" >Tovább</a>
                        <script src="/js/progressbar.js" ></script>
                        <script src="/js/regisztracio.js" ></script>';

}elseif($_REQUEST["pageNumber"]==1){
    //Mehet az 2. lap
    $retArr["retCode"]='5';
    $retArr["retMsg"]='';
    $debug_export = var_export($_REQUEST, true);
    $retArr["retHtml"]='<div>'.$debug_export.'</div>';
}

echo json_encode($retArr);
?> 