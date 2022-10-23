<?php
if (!isset($_URL)) {header('Location:/');} //ha ugy hívja a pub oldalakat, hogy sulid.loc/pub-mainpage.php
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
            <div class="col-7 text-left">
                <h3>Kinek segít a szoftver?</h3>
                <div class="underline"></div>
                <p>A <b>diákok</b> gyorsan és egyszerűen tájékozódhatnak jegyeikről vagy tanulmányi átlagukról. Egy helyen láthatják a soron következő teendőiket, beadandó feladatik határidejét vagy a soron következő dolgozatokat. </p>
                <p>A <b>tanárok</b> listába rendezve láthatják az oktatott diákjaikat, egyszerűen kereshetnek a diákok jegyei és adatai között. Szűrhetnek azok adatai, jegyei vagy tanulmányi átlag alapján.</p>
                <p>A <b>szülők</b> betekintést nyerhetnek a gyerekeik iskolai életébe, a rendszer segítségével a szülők is értesítést kapnak a tanulók jegyeiről.</p>
                <a href="/" class="link-dark">Tovább a vélemények megtekintéséhez</a>
            </div>
            <div class="col-5">
                <div class="desc-image-left"></div>
            </div>
        </div>
    </div>
</div>

<div class="desc">
    <div class="container">
        <div class="row">
            <div class="col-5">
                <div class="desc-image-right"></div>
            </div>
            <div class="col-7">
                
                <h3 class="desc-right">Milyen funkciók érhetőek el?</h3>
                <div class="underline ms-auto"></div>
                <p>Az <b>adminisztrációs modul</b> hatalmas segítséget nyújtanak az intézmény oktatóinak. Összegyűjtve láthatják az oktatott tanulók, megtekinthetik elérhetőségeiket és érdemjegyeiket. Kimutatásokat és listákat készíthetnek.</p>
                <p>Az <b>e-napló modul</b>szorosan együttműködik az adminisztrációs oldalakkal. A modul segítségével az oktatók rögzíthetik a tanulók érdemjegyeit elektronikus módon. A tanulók és a megjelölt kapcsolattartók értesítést kapnak érdemjegyek rögzítése esetén.</p>
                <p>A <b>naptár modul</b> biztosítja, hogy a tanulók és az oktatók is összegyűjtve lássák soron következő teendőiket és feladataikat.</p>
                <a href="/" class="link-dark">Tovább a funkciók megtekintéséhez</a>
            </div>
        </div>
    </div>
</div>

<div class="promo">
    <div class="container">
        <h2>Próbáld ki most!</h2>
        <h5>Most 30 napig ingyenesen használhatod a Sulid.hu rendszerét</h5>
        <a href="" class="btn btn-primary">Kipróbálom most</a>
    </div>
</div>

<?php
include('pub-site-bottom.php');  
?>