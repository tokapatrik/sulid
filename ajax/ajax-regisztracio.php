<?php
include_once('ajax-top.php');
sleep(1);
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
                <a class="btn btn-primary" id="prev" >Prev</a>
                <a class="btn btn-primary" id="next" >Next</a>
            </div>
            <h1 >Regiszrálja oktatási intézményét még ma!</h1>
            <p>Fontos, hogy csak akkor kezdje meg a regisztrációt, ha az intézmény igazgatója<br>vagy jogosult regisztálni iskoláját a Sulid.hu rendszerébe</p>
            <div class="btn btn-primary startbutton" href="/regisztracio"">Elkezdem a regisztrációt</div>
            <div class="link-dark" href="/" alt="Try Free">Mégsem</div>
            <script src="/js/progressbar.js" ></script>';
}else{
    //Hiba van
}

echo json_encode($retArr);
?> 