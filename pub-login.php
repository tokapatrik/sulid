<?php
//Be van jelentkezve
if ($_SESSION["logd_in"]==true)
{
    header('location: http://sulid.loc/priv');
    exit();
}

//iskola adatai
$rs=getSQL("SELECT * FROM iskola WHERE isk_rovid_nev='".$_URL["subdomain"]."'");
$iskola=$rs[0];

$error;
//POST vizsgálat
if(isset($_REQUEST["email"]))
{
    //Megadott mindne adatot
    if($_REQUEST["email"]>'' && $_REQUEST["jelszo"]>'')
    {
        //Van ilyen user
        $rs=getSQL("SELECT * FROM user WHERE usr_email='".$_REQUEST["email"]."' AND usr_isk_id='".$iskola["isk_id"]."'");
        if(count($rs)>0)
        {
            $felhasznalo=$rs[0]; //itt még csak user adat

            if($felhasznalo["usr_tipus"]=='vez') {$melyikTablabolKerunkLe="vezetoseg";}
            elseif($felhasznalo["usr_tipus"]=='okt') {$melyikTablabolKerunkLe="oktato";}
            elseif($felhasznalo["usr_tipus"]=='tan') {$melyikTablabolKerunkLe="tanulo";}
            $rs=getSQL("SELECT * FROM ".$melyikTablabolKerunkLe." WHERE ".$felhasznalo["usr_tipus"]."_usr_id='".$felhasznalo["usr_id"]."'");
            $tipusadatok=$rs[0]; //itt már minden adat

            if($felhasznalo["usr_isk_id"]==$iskola["isk_id"])
            {
                //Jelszó vizsgálat
                if(password_verify($_REQUEST["jelszo"].HASH_SALT, $felhasznalo["usr_jelszo"]))
                {
                    $_SESSION["iskola"]=$iskola;
                    $_SESSION["user"]=$felhasznalo;
                    $_SESSION["userTipusAdatok"]=$tipusadatok;
                    $_SESSION["logd_in"]=true;
                    header('location: http://sulid.loc/priv');
                    exit();
                }
                else
                {
                    $error='<div class="alert alert-danger" role="alert">Hibás jelszó!</div>';
                }
            }
            else
            {
                $error='<div class="alert alert-danger" role="alert">Nem található felhasználó ilyen email címmel az iskola adatbázisában!</div>';
            }
        }
        else
        {
            $error='<div class="alert alert-danger" role="alert">Nem található felhasználó ilyen email címmel!</div>';
        }
    }
    else
    {
        $error='<div class="alert alert-danger" role="alert">Kérjük minden adatot adjon meg!</div>';
    }
}
?>
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
        <div calss="container"></div>
            <div class="row login mx-auto border shadow loginCard">
                <div class="col-6 h3conatiner" style="border-right: solid 1px #aaa;">
                    <h4><?echo $iskola["isk_nev"]?></h4>
                </div>
                <div class="col-6 px-5 pt-3">
                    <h3 class="mb-3">Bejelentkezés</h3>
                    <?if($error>'') {echo $error;} ?>
                    <form method="post">
                        <div class="loginForm mb-5">
                            <div class="mb-3">
                            <label class="form-label">Email cím</label>
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping"><i class="fas fa-users"></i></span>
                                    <input type="email" class="form-control" placeholder="email" aria-label="email" aria-describedby="addon-wrapping" name="email">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jelszó</label>
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping"><i class="fas fa-key"></i></span>
                                    <input type="password" class="form-control" placeholder="jelszó" aria-label="jelszó" aria-describedby="addon-wrapping" name="jelszo">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mb-3">Bejelentkezés</button>
                    </form>
                </div>
            </div>
        </div>
</body>
<script src="/js/jquery-3.6.1.min.js" ></script>
<script src="/js/jquery-ui.min.js" ></script>
<script src='/js/jquery.flip.min.js'></script>
<script src='/js/jquery-confirm.js'></script>
<script src="/bootstrap-5.2.0-dist/js/bootstrap.bundle.js" ></script>
<script src='/js/animate.js'></script>
<script src='/js/public.js'></script>
<script src="/js/progressbar.js" ></script>
</html>
<?
?>