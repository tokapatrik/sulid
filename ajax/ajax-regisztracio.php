<?php
include_once('ajax-top.php');

$errorArray;

$pages[]='  <div class="regisztracio-header">

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
                        <label class="form-check-label '.(($errorArray["checkAszf"]==true)?"text-danger":"").'">Elolvastam és elfogadom az Általános Szerződési Feltételeket.</label>
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

if($_REQUEST["pageNumber"]==0)
{
    //Mehet az 1. lap, még nem kell inputellenörzés
    echo $pages[0];
                        
}elseif($_REQUEST["pageNumber"]==1){
    if($_REQUEST["checkAszf"]!=true)
    {
        $errorArray["checkAszf"]=true;;
        echo $pages[0]; //Mert hibás 
    }
    else
    {
        echo '<div>asd</div>'; //Mehet a kövi
    }
}

?> 