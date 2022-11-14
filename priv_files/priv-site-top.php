<?
$userClassPtr = new User();
$misc = new Misc;

$userClassPtr->userLogdIn();
?>
<!DOCTYPE html> 

<html style="margin: 0; padding: 0; height: 100%;">
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
    <link rel='stylesheet' href='/priv_files/css/private.css' type='text/css' media='all' />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,600,700,800|Roboto:400,500,700,900" rel="stylesheet">
</head>

<body style="margin: 0;padding: 0;height: 100%;max-height: 100%;float: left;width: 100%;">
    <div class="row p-0 m-0 h-100">
        <div class="col-2 m-0 p-0 position-relative menubar" style="width: 13%;background: #282f3d;">
            <div class="nameBox m-3 pb-3">
                <?echo '<div class="nameBoxLogo m-0 p-0" style="background: #'.$misc->stringToColorCode($_SESSION["user"]["usr_nev"]).';">'.substr($_SESSION["userTipusAdatok"][$_SESSION["user"]["usr_tipus"]."_nev_vezetek"],0,1).substr($_SESSION["userTipusAdatok"][$_SESSION["user"]["usr_tipus"]."_nev_kereszt"],0,1).'</div>';?>
                <?echo '<div class="ms-2">'.$_SESSION["user"]["usr_nev"].'</div>'?>
            </div>
            <div class="menubarButton mb-2">
                <i class="fas fa-user-alt ms-3 me-3" style="float: left;"></i>
                <a href="/logout" class="menubarButtonLink">Adatlapom</a>
            </div>
            <div class="menubarButton mb-2">
                <i class="fas fa-school ms-3 me-3" style="float: left;"></i>
                <a href="/logout" class="menubarButtonLink">Iskola</a>
            </div>
            <div class="menubarButton mb-2">
                <i class="fas fa-chalkboard-teacher ms-3 me-3" style="float: left;"></i>
                <a href="/logout" class="menubarButtonLink">Osztályom</a>
            </div>
            <div class="menubarButton mb-2">
                <i class="fas fa-book-open ms-3 me-3" style="float: left;"></i>
                <a href="/logout" class="menubarButtonLink">E-napló</a>
            </div>
            <div class="menubarBottom">
                <div class="ms-3 me-3 mb-1"style="border-top: solid 3px #4d5360;"></div>

                <div class="menubarButton">
                    <i class="fas fa-cogs ms-3 me-3" style="float: left;"></i>
                    <a href="/logout" class="menubarButtonLink">Fiók</a>
                </div>

                <div class="menubarButton">
                    <i class="fas fa-sign-out-alt ms-3 me-3" style="float: left;"></i>
                    <a href="/logout" class="menubarButtonLink">Kijelentkezés</a>
                </div>
            </div>
        </div>
        <div class="col-10 m-0 p-0" style="width: 87%">
            <div class="privSiteTop border" style="height:40px;">
                <img class="ms-2 me-3" style="float:left; height:100%;" src="/images/siteImages/fullLogo.png" alt="Suild.hu">
                <?echo '<div>'.$_SESSION["iskola"]["isk_nev"].'</div>';?>
            </div>
