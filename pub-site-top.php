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
        <link rel='stylesheet' href='/css/public.css' type='text/css' media='all' />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,600,700,800|Roboto:400,500,700,900" rel="stylesheet">
    </head>
    
    <body>
        <header class="navbar-header">
            <nav class="navbar shadow animate__animated animate__fadeInDown">
                <a href="/" class="navbar-logo"><img class="navbar-logo-img" src="/images/siteImages/fullLogo.png" alt="Suild.hu"></a>
                <div class="navbar-menu">
                    <div class="nav-element"><a href="#">Főoldal</a></div>
                    <div class="nav-element"><a href="#">Features</a></div>
                    <div class="nav-element"><a href="#">center</a></div>
                    <div class="nav-element"><a href="#">Pricing</a></div>
                    <div class="nav-element"><a href="#">Disabled</a></div>
                </div>
                <a href="#" class="navbar-button btn btn-primary">Regisztráció</a>
            </nav>  
        </header>

<?php 
if ($_SEFURL['file']!="pub-mainpage.php") { # azaz valamilyen aloldal, mert főoldalra nem kell a fullwidth miatt ?>
<div class="page-container " >
	<div class="container">
<?php } ?>