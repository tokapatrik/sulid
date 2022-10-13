<?php 
include('pub-site-top.php');  
?>

<div class="nav-spacer"></div>
<div class="hero">
    <div class="container">
        <div class="row">
            <div class="col hero-text">
                <h1>Digitális oktatás <br>Mindenki részére</h1>
                <div class="hero-h1-underline"></div>
                <p class="h5">A Sulid.hu rendszere elektronikus napló megoldást kínál általános és közép iskolák részére. Széles funkciókínálattal segítjük az oktatásban résztvevők mindennapi munkáját.</p>
                <p class="hero-button"><a class="btn btn-primary-outline " href="/tools/" id="swaggerToolsNewCta">Felfedezem a funkciókat</a></p>
            </div>
            <div class="col">
                <img src="/images/siteImages/hero2.png">
            </div>
        </div>
    </div>
</div>

<div class="cardholder">
    <div class="container">
        <div class="row">
            <div class="cards col">
                <span class="card-icon fa-stack fa-2x">
                    <i class="fa fa-square fa-stack-2x"></i>
                    <i class="fa fa-list fa-stack-1x fa-inverse"></i>
                </span>
                <h3>Teljeskörű nyilvántartás</h3> 
                <h5>Adminisztrációs rendszer, amely talmazza mindazon adatokat, amelyeket egy iskolának tárolnia kell alkalmazottairól, osztályairól, diákjairól</h5>
                <a class="btn btn-primary" href="/tools/">Bővebben</a>
            </div>
            <div class="cards col cards-active">
                <span class="card-icon fa-stack fa-2x">
                    <i class="fa fa-square fa-stack-2x"></i>
                    <i class="fa fa-book fa-stack-1x fa-inverse"></i>
                </span>
                <h3>Elektronikus napló</h3> 
                <h5>Az elektronikus ellenőrző a szülőknek és tanulóknak nyújt segítséget a tanulmányok alatti naprakész információhoz jutásban</h5>
                <a class="btn btn-primary" href="/tools/">Bővebben</a>
            </div>
            <div class="cards col">
                <span class="card-icon fa-stack fa-2x">
                    <i class="fa fa-square fa-stack-2x"></i>
                    <i class="fa fa-cloud fa-stack-1x fa-inverse"></i>
                </span>
                <h3>Felhő alapú szoftver</h3> 
                <h5>Felhő alapú online szoftver, melyet nem szükséges telepíteni és a webes alkalmazásnak köszönhetően bárhol, bármikor elérhető</h5>
                <a class="btn btn-primary" href="/tools/">Bővebben</a>
            </div>
        </div>
    </div>
</div>

<div class="desc">
    <div class="container">
        <div class="row">
            <div class="col-7 szoveg">
                <h3>Kinek segít a szoftver?</h3>
                <div class="underline"></div>
                <p>A diákok gyorsan és egyszerűen tájékozódhatnak jegyeikről vagy tanulmányi átlagukról. Egy helyen láthatják a soron következő teendőiket, beadandó feladatik határidejét vagy a soron következő dolgozatokat. </p>
                <p>A tanárok listába rendezve láthatják az oktatott diákjaikat, egyszerűen kereshetnek a diákok jegyei és adatai között. Szűrhetnek azok adatai, jegyei vagy tanulmányi átlag alapján.</p>
                <p>A szülők betekintést nyerhetnek a gyerekeik iskolai életébe, a rendszer segítségével a szülők is értesítést kapnak a tanulók jegyeiről.</p>
            </div>
            <div class="col-5">
                <img src="/images/siteImages/laptop.jpg">
                <div class="desc-image"></div>
            </div>
        </div>
    </div>
</div>



<?php

for ($i=0; $i < 10; $i++) { 
    echo '<div style="height:200px;"></div>';
}

include('pub-site-bottom.php');  
?>