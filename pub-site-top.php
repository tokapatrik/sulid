<?
if(!isset($_URL['goURL']))
{
    header('location: /');
    exit();
}
?>

<!DOCTYPE html> 

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" lang="hu"/> 
        <link rel="shortcut icon" href="/images/siteImages/icon.ico" type="image/x-icon"/>
        <link rel="icon" href=/images/siteImages/icon.ico" type="image/x-icon"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>Sulid.hu</title>
        <meta name="description" content="Elektorinikus napló megoldás Általános és Középiskolák részére"/>
        <meta name="author" content="Sulid.hu"/>
        <link rel='stylesheet' href='/bootstrap-5.2.0-dist/css/bootstrap.css' type='text/css' media='all' />
        <link rel='stylesheet' href='/fontawesome-5.15.1/css/all.min.css' type='text/css'  media='all' />
        <link rel='stylesheet' href='/css/animate.css' type='text/css' media='all' />
        <link rel='stylesheet' href='/css/jquery-confirm.css' type='text/css' media='all' />
        <link rel='stylesheet' href='/css/public.css' type='text/css' media='all' />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,600,700,800|Roboto:400,500,700,900" rel="stylesheet">
    </head>
    
    <body>
        <header>
            <div class="nav-main shadow-sm">
                <div class="nav-container">
                    <nav class="">
                        <a href="/"><img class="navbar-brand" src="/images/siteImages/fullLogo.png" alt="Suild.hu"></a>
                        <ul class="nav">
                            <li class="nav-item dropdown ">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">Miért a Sulid.hu?</a>
                                <div class="dropdown-menu menu-single">
                                    <div class="dropdown-item">
                                        <table>
                                            <tr style="height: 30px;"><td><i style="width: 20px;" class="fas fa-clipboard"></i></td><td></div><a class="link-dark" href="/" >Adminisztrációs modul</a></td></tr>
                                            <tr style="height: 30px;"><td><i style="width: 20px;" class="fas fa-book"></i></td><td><a class="link-dark" href="/" >e-Napló modul</a></td></tr>
                                            <tr style="height: 30px;"><td><i style="width: 20px;" class="fas fa-calendar"></i></td><td><a class="link-dark" href="/" >Naptár modul</a></td></tr>
                                            <tr style="height: 30px;"><td><i style="width: 20px;" class="fas fa-comment-dots"></i></td><td><a class="link-dark" href="/" >Üzenetkezelő modul</a></td></tr>
                                            <tr style="height: 30px;"><td><i style="width: 20px;" class="fas fa-wrench"></i></td><td><a class="link-dark" href="/" >Folyamatos fejlődés</a></td></tr>
                                        </table>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown ">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">Árak</a>
                                <div class="dropdown-menu menu-single">
                                    <div class="dropdown-item">
                                        <table>
                                            <tr style="height: 30px;"><td><i style="width: 20px;" class="fas fa-clipboard"></i></td><td></div><a class="link-dark" href="/" >Adminisztrációs modul</a></td></tr>
                                            <tr style="height: 30px;"><td><i style="width: 20px;" class="fas fa-book"></i></td><td><a class="link-dark" href="/" >e-Napló modul</a></td></tr>
                                            <tr style="height: 30px;"><td><i style="width: 20px;" class="fas fa-calendar"></i></td><td><a class="link-dark" href="/" >Naptár modul</a></td></tr>
                                            <tr style="height: 30px;"><td><i style="width: 20px;" class="fas fa-comment-dots"></i></td><td><a class="link-dark" href="/" >Üzenetkezelő modul</a></td></tr>
                                            <tr style="height: 30px;"><td><i style="width: 20px;" class="fas fa-wrench"></i></td><td><a class="link-dark" href="/" >Folyamatos fejlődés</a></td></tr>
                                        </table>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown ">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">Rólunk</a>
                                <div class="dropdown-menu menu-single">
                                    <div class="dropdown-item">
                                        <table>
                                            <tr style="height: 30px;"><td><i style="width: 20px;" class="fas fa-clipboard"></i></td><td></div><a class="link-dark" href="/" >Adminisztrációs modul</a></td></tr>
                                            <tr style="height: 30px;"><td><i style="width: 20px;" class="fas fa-book"></i></td><td><a class="link-dark" href="/" >e-Napló modul</a></td></tr>
                                            <tr style="height: 30px;"><td><i style="width: 20px;" class="fas fa-calendar"></i></td><td><a class="link-dark" href="/" >Naptár modul</a></td></tr>
                                            <tr style="height: 30px;"><td><i style="width: 20px;" class="fas fa-comment-dots"></i></td><td><a class="link-dark" href="/" >Üzenetkezelő modul</a></td></tr>
                                            <tr style="height: 30px;"><td><i style="width: 20px;" class="fas fa-wrench"></i></td><td><a class="link-dark" href="/" >Folyamatos fejlődés</a></td></tr>
                                        </table>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="nav-buttons ms-auto">
                            <a class="btn btn-primary-outline" <? if($_SESSION["logd_in"]) {echo 'href="/priv"';}else{echo 'data-bs-toggle="modal" data-bs-target="#loginModal"';}?>><? if($_SESSION["logd_in"]) {echo $_SESSION["user"]["usr_nev"];}else{echo 'Bejelentkezés';}?></a>
                            <a class="btn btn-primary" href="/regisztracio" alt="Try Free">Regisztráció</a>
                        </div>
                    </nav>
                </div>
            </div>
        </header>

<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  loginModal">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalTitle" style="font-weight: 600;">Kérjük válassza ki oktatási intézményét</h5>
                <button type="button" id="loginModalClose" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3 mx-2 px-3 mt-1 shadow-sm border" id="loginSearchForm">
                    <label for="searchbar" class="form-label">Keresse meg iskoláját <b>neve</b> vagy <b>OM kódja</b> alapján</label>
                    <div class="col-10 mt-0">
                        <input type="text" class="form-control" id="searchbar" name="searchbar" aria-describedby="kereses" placeholder="Például: Demosuli vagy 1122334">
                    </div>
                    <div class="col-2 mt-0">
                        <div class="btn btn-primary mb-3" style="width: 100%" id="loginModalKereses">Keresés</div>
                    </div>
                </form>
                <div id="loginModalResults" class="loginModalResults mt-3">
                </div>
            </div>
        </div>
    </div>
</div>

<?php

//csak akkor kell a container ha valamilyen aloldal, mert főoldalra fullwidth
if (!($_URL['goURL']=="pub-mainpage.php"))
{ 
echo '<div class="page-container " >
	    <div class="container">';
}