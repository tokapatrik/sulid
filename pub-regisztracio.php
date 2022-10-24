<?php 
include('pub-site-top.php');  
?>

<div class="border shadow regisztracio-box" id="regisztracio-box">
<?
if($_GET["page"]==0)
{
?>

    <form id="regisztracio-form">
        <input type="hidden" id="pageNumber" name="pageNumber" value="0">
    </form>
    <div class="regisztracio-header alert alert-warning">
        <h5>Figyelem a regisztráció csak az iskolák részére vonatkazik<br>amennyiben tanulóként szeretne regisztrálni keressel fel oktatási intézményét!</h5>
    </div>
    <h1 >Regiszrálja oktatási intézményét még ma!</h1>
    <p>Fontos, hogy csak akkor kezdje meg a regisztrációt, ha ön az intézmény igazgatója<br>vagy jogosult regisztálni iskoláját a Sulid.hu rendszerébe</p>
    <div class="btn btn-primary startbutton" id="next">Elkezdem a regisztrációt</div>
    <a class="link-dark" href="/" alt="Try Free">Mégsem</a>


<?
}
?>

<?
if($_GET["page"]==1)
{
?>

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
    <div class="aszf-container border shadow-sm"><?echo $ASZF?></div>
    <form id ="regisztracio-form">
        <input type="hidden" id="pageNumber" name="pageNumber" value="1">
        <div class="form-container1">
            <div>
                <input class="form-check-input" type="checkbox" id="checkAszf">
                <label class="form-check-label" for="flexSwitchCheckDefault">Elolvastam és elfogadom az Általános Szerződési Feltételeket.</label>
            </div>
            <div>
                <input class="form-check-input" type="checkbox" id="checkAdat">
                <label class="form-check-label" for="flexSwitchCheckChecked">Hozzájárulok, hogy adataimat a Sulid.hu rendszer tárolja és kezelje.</label>
            </div>
        </div>
    </form>
    <a class="btn btn-primary prev"  id="prev" >Vissza</a>
    <a class="btn btn-primary next"  id="next" >Tovább</a>
    <script src="/js/progressbar.js" ></script>

<?
}
?>
</div>
<?php 
include('pub-site-bottom.php');  
?>