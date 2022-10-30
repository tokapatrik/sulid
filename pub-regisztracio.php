<?php 
include('pub-site-top.php');

if($_REQUEST["pageNumber"]=="99")
{
    echo "<br><br><br><br><br><br><br>Sikeres regisztráció";
}
else
{

?>
<form id="regisztracio-form" method="post">
    <div class="border shadow regisztracio-box " id="regisztracio-start">
        <input type="hidden" name="pageNumber" value="0">
        <div class="regisztracio-header alert alert-warning">
            <h5>Figyelem a regisztráció csak az iskolák részére vonatkazik<br>amennyiben tanulóként szeretne regisztrálni keressel fel oktatási intézményét!</h5>
        </div>
        <h1 >Regiszrálja oktatási intézményét még ma!</h1>
        <p>Fontos, hogy csak akkor kezdje meg a regisztrációt, ha ön az intézmény igazgatója<br>vagy jogosult regisztálni iskoláját a Sulid.hu rendszerébe</p>
        <div class="btn btn-primary startbutton" id="start">Elkezdem a regisztrációt</div>
        <a class="link-dark" href="/" alt="Try Free">Mégsem</a>
    </div>

    <div class="border shadow regisztracio-box regisztracio-hide" id="regisztracio-main">
        <div class="regisztracio-header">
            <div class="progrss-container">
                <div class="progrssbar" id="progressbar"></div>
                <div class="circle activec"><h4>1</h4></div>
                <div class="circle "><h4>2</h4></div>
                <div class="circle "><h4>3</h4></div>
                <div class="circle "><h4>4</h4></div>
            </div>
            <div class="progrss-labels">
                <div class="progress-label "><p class="label-text">Adatkezelési Tájékoztató</p></div>
                <div class="progress-label "><p class="label-text">Felhasználói adatok</p></div>
                <div class="progress-label "><p class="label-text">Intézményi adatok</p></div>
                <div class="progress-label "><p class="label-text">Áttekintés</p></div>
            </div>
            <a href="/" class="close"><i class="fas fa-times fa-lg"></i></a>
        </div>

        <div class="regisztracio-body" id="regisztracio-body1">
            <div class="aszf-container border shadow-sm"><?echo ASZF?></div>
            <input type="hidden" id="pageNumber" name="pageNumber" value="1">
            <div class="form-container1">
                <div>
                    <input class="form-check-input" type="checkbox" id="checkAszf" name="checkAszf">
                    <label class="form-check-label" for="checkAszf" >Elolvastam és elfogadom az Általános Szerződési Feltételeket.</label>
                </div>
                <div>
                    <input class="form-check-input" type="checkbox" id="checkAdat" name="checkAdat">
                    <label class="form-check-label" for="checkAdat">Hozzájárulok, hogy adataimat a Sulid.hu rendszer tárolja és kezelje.</label>
                </div>
            </div>
            <div class="btn btn-primary next" id="next">Tovább</div>
        </div>

        <div class="regisztracio-body" id="regisztracio-body2">
            <div class="data-container">

                <label for="vezetekNev" class="form-label">Felhasználónév:</label>
                <div class="row g-3 mt-0 mb-3" id="felhasznalonev">
                    <div class="col mt-0">
                        <div class="form-floating">
                            <input type="text" class="form-control" placeholder="Vezetéknév" aria-label="Vezeteknev" id="vezetekNev" name="vezetekNev">
                            <label for="vezetekNev" style="opacity: 0.65;">Vezetéknév</label>
                        </div>
                    </div>
                    <div class="col mt-0">
                        <div class="form-floating">
                            <input type="text" class="form-control" placeholder="Keresztnév" aria-label="Keresztnev" id="keresztNev" name="keresztNev">
                            <label for="keresztNev" style="opacity: 0.65;">Keresztnév</label>
                        </div>
                    </div>
                    <div id="felhasznalonev" class="form-text">A regisztrációt követően ezzel a felhasználónévvel fog szerepelni a Sulid.hu rendszerében</div>
                </div>


                <div class="mb-3">
                    <label for="emailCim" class="form-label">E-mail cím:</label>
                    <input type="email" class="form-control big-padding" id="emailCim" placeholder="pl: demo@mail.hu" name="emailCim">
                    <div id="emailCim" class="form-text">A véglegesítést követően a rendszer a megadott címre megerősítő e-mail fog küldeni</div>
                </div>

                <label for="jelszo1" class="form-label">Jelszó:</label>
                <div class="row g-3 mt-0 mb-3" id="jelszo">
                    <div class="col mt-0">
                        <div class="form-floating">
                            <input type="password" class="form-control" placeholder="jelszo" aria-label="jelszo" id="jelszo1" name="jelszo1">
                            <label for="jelszo1" style="opacity: 0.65;">Jelszó</label>
                        </div>
                    </div>
                    <div class="col mt-0">
                        <div class="form-floating">
                            <input type="password" class="form-control" placeholder="jelszo" aria-label="jelszo" id="jelszo2" name="jelszo2">
                            <label for="jelszo2" style="opacity: 0.65;">jelszó megerősítés</label>
                        </div>
                    </div>
                    <div id="jelszo" class="form-text">A jelszónak 8-20 karakterből kell állnia és tartalmazni kell kis- és nagybetűt illetve számot is</div>
                </div>

            </div>
            <div class="btn btn-primary prev" id="prev">Vissza</div>
            <div class="btn btn-primary next" id="next">Tovább</div>
        </div>

        <div class="regisztracio-body" id="regisztracio-body3">
            <div class="data-container">

                <label for="intezmenyNeve" class="form-label">Intézmény neve:</label>
                <div class="form-floating">
                    <input type="text" class="form-control" id="intezmenyNeve" placeholder="intezmenyneve" aria-label="Vezeteknev" name="intezmenyNeve">
                    <label for="intezmenyNeve" class="form-label" style="opacity: 0.65;">Név</label>
                </div>
                <div id="intezmenyNeve" class="form-text mb-3">A nyilvántartásba ezzel a névvel fogjuk rögzíteni az oktatási intézményt</div>


                <label for="intezmenyOm" class="form-label">Intézmény OM kód:</label>
                <div class="form-floating">
                    <input type="text" class="form-control" id="intezmenyOm" placeholder="intezmeny om" aria-label="intezmeny om" name="intezmenyOm">
                    <label for="intezmenyOm" class="form-label" style="opacity: 0.65;" >Azonosító</label>
                </div>
                <div id="intezmenyOm" class="form-text mb-3">Nagyon fontos, hogy az OM kód azonosítót megfelelően rögzítsük, mert később az intézményt ezzel tudjuk beazonosítani</div>

                <label for="intezmenyIrsz" class="form-label">Intézmény címe:</label>
                <div class="row g-3 mt-0 mb-3" id="cim">
                    <div class="col mt-0">
                        <div class="form-floating">
                            <input type="number" class="form-control" placeholder="iranyitoszam" aria-label="iranyitoszam" id="intezmenyIrsz" name="intezmenyIrsz">
                            <label for="intezmenyIrsz" style="opacity: 0.65;">Irányítószám</label>
                        </div>
                    </div>
                    <div class="col mt-0">
                        <div class="form-floating">
                            <input type="text" class="form-control" placeholder="varos" aria-label="varos" id="intezmenyVaros" name="intezmenyVaros">
                            <label for="intezmenyVaros" style="opacity: 0.65;">Város</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-floating">
                            <input type="text" class="form-control" placeholder="intezmenyUtca" aria-label="intezmenyUtca" id="intezmenyUtca" name="intezmenyUtca">
                            <label for="intezmenyUtca" style="opacity: 0.65;">Utca, házszám</label>
                        </div>
                    </div>
                </div>
                    <div id="intezmenyUtca" class="form-text">Kérjük ügyeljen a címadatok helyes megadására</div>
                </div>

            <div class="btn btn-primary prev" id="prev">Vissza</div>
            <div class="btn btn-primary next" id="next">Tovább</div>
        </div>

        <div class="regisztracio-body" id="regisztracio-body4">
            <div class="row row-cols-2 attekintes">
                <div class="col">
                    <fieldset disabled>
                        <h5 class="text-dark mb-3">Felhasználói adatok</h5>
                        <label for="attekintVezetekNev" class="form-label">Felhasználónév:</label>
                        <div class="row g-3 mt-0 mb-3" id="felhasznalonev">
                            <div class="col mt-0">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="Vezetéknév" aria-label="Vezeteknev" id="attekintesVezetekNev">
                                    <label for="attekintVezetekNev" style="opacity: 0.65;">Vezetéknév</label>
                                </div>
                            </div>
                            <div class="col mt-0">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="Keresztnév" aria-label="Keresztnev" id="attekintesKeresztNev">
                                    <label for="attekintesKeresztNev" style="opacity: 0.65;">Keresztnév</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="attekintesEmailCim" class="form-label">E-mail cím:</label>
                            <input type="email" class="form-control big-padding" id="attekintesEmailCim" placeholder="pl: demo@mail.hu" >
                        </div>
                        <label for="attekintesJelszo1" class="form-label">Jelszó:</label>
                        <div class="row g-3 mt-0 mb-3" id="jelszo">
                            <div class="col mt-0">
                                <div class="form-floating">
                                    <input type="password" class="form-control" placeholder="jelszo" aria-label="jelszo" id="attekintesJelszo1">
                                    <label for="attekintesJelszo1" style="opacity: 0.65;">Jelszó</label>
                                </div>
                            </div>
                            <div class="col mt-0">
                                <div class="form-floating">
                                    <input type="password" class="form-control" placeholder="jelszo" aria-label="jelszo" id="attekintesJelszo2">
                                    <label for="attekintesJelszo2" style="opacity: 0.65;">jelszó megerősítés</label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="col">
                    <fieldset disabled>
                        <h5 class="text-dark mb-3">Intézményi adatok</h5>

                        <label for="attekintesIntezmenyNeve" class="form-label">Intézmény neve:</label>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="attekintesIntezmenyNeve" placeholder="intezmenyneve" aria-label="Vezeteknev">
                            <label for="attekintesIntezmenyNeve" class="form-label" style="opacity: 0.65;">Név</label>
                        </div>

                        <label for="attekintesIntezmenyOm" class="form-label mt-3">Intézmény OM kód:</label>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="attekintesIntezmenyOm" placeholder="intezmeny om" aria-label="intezmeny om">
                            <label for="attekintesIntezmenyOm" class="form-label" style="opacity: 0.65;">Azonosító</label>
                        </div>

                        <label for="attekintesIntezmenyIrsz" class="form-label mt-3">Intézmény címe:</label>
                        <div class="row row-cols-2 g-3 mt-0 mb-3" id="cim">
                            <div class="col mt-0">
                                <div class="form-floating">
                                    <input type="number" class="form-control" placeholder="iranyitoszam" aria-label="iranyitoszam" id="attekintesIntezmenyIrsz">
                                    <label for="attekintesIntezmenyIrsz" style="opacity: 0.65;">Irányítószám</label>
                                </div>
                            </div>
                            <div class="col mt-0">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="varos" aria-label="varos" id="attekintesIntezmenyVaros">
                                    <label for="attekintesIntezmenyVaros" style="opacity: 0.65;">Város</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="intezmenyUtca" aria-label="intezmenyUtca" id="attekintesIntezmenyUtca">
                                    <label for="attekintesIntezmenyUtca" style="opacity: 0.65;">Utca, házszám</label>
                                </div>
                            </div>
                        </div>

                    </fieldset>
                </div>
            </div>
            <div class="btn btn-primary prev" id="prev">Vissza</div>
            <div class="btn btn-primary next" id="next">Regisztráció</div>
        </div>
    </div>
</form>

<?}?>

<?
include('pub-site-bottom.php');  
?>