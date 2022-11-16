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
        <div class="col-2 m-0 p-0 position-relative menubar" style="background: #282f3d;">
            <div class="nameBox m-3 pb-3">
                <?echo '<div class="nameBoxLogo m-0 p-0" style="background: #'.$misc->stringToColorCode($_SESSION["user"]["usr_nev"]).';">'.substr($_SESSION["userTipusAdatok"][$_SESSION["user"]["usr_tipus"]."_nev_vezetek"],0,1).substr($_SESSION["userTipusAdatok"][$_SESSION["user"]["usr_tipus"]."_nev_kereszt"],0,1).'</div>';?>
                <?echo '<div class="ms-2">'.$_SESSION["user"]["usr_nev"].'</div>'?>
            </div>

            <div class="menubarButtonContainer mb-2">
                <div class="menubarButtonMain" id=mainAdatlapom>
                    <i class="fas fa-fw fa-tachometer-alt ms-4 me-3" style="float: left;"></i>
                    <a href="/priv" >Kezdőlap</a>
                </div>
            </div>

            <div class="menubarButtonContainer mb-2">
                <div class="menubarButtonMain" id=mainAdatlapom>
                    <i class="fas fa-fw fa-user-alt ms-4 me-3" style="float: left;"></i>
                    <a href="/priv/adatlap" >Adatlapom</a>
                </div>
            </div>

            <div class="menubarButtonContainer mb-2">
                <div class="menubarButtonMain" id=mainIskola>
                    <i class="fas fa-fw fa-school ms-4 me-3"></i>
                    <a >Iskola</a>
                </div>
                <div class="menubarButtonSubContainer" id="subIskola">
                    <div class="menubarButtonSub">
                        <i class="fas fa-fw fa-clipboard ms-4 me-3"></i>
                        <a href="" >Adatlap</a>
                    </div>
                    <?
                    if($_SESSION["user"]["usr_tipus"]=="vez") //Vezetőségi tag jog
                    {
                        echo
                        '
                            <div class="menubarButtonSub">
                                <i class="fas fa-fw fa-chalkboard-teacher  ms-4 me-3"></i>
                                <a href="" >Osztályok</a>
                            </div>
                            <div class="menubarButtonSub">
                                <i class="fas fa-fw fa-book ms-4 me-3"></i>
                                <a href="" >Tantárgyak</a>
                            </div>
                        ';
                    }
                    ?>
                </div>
            </div>
            <?
            if($_SESSION["user"]["usr_tipus"]=="okt")
            {
                if($_SESSION["userTipusAdatok"]["okt_osztalyfonok"]>'')
                {
                    echo
                    '
                    <div class="menubarButtonContainer mb-2">
                        <div class="menubarButtonMain" id=mainOsztalyom>
                            <i class="fas fa-fw fa-chalkboard-teacher ms-4 me-3" style="float: left;"></i>
                            <a href="" >Osztályom</a>
                        </div>
                    </div>
                    ';
                }
                echo
                '
                <div class="menubarButtonContainer mb-2">
                    <div class="menubarButtonMain" id=mainIskola>
                        <i class="fas fa-fw fa-book ms-4 me-3"></i>
                        <a href="">Tantárgyaim</a>
                    </div>
                </div>
                <div class="menubarButtonContainer mb-2">
                        <div class="menubarButtonMain" id=mainEnaplo>
                            <i class="fas fa-fw fa-book-open ms-4 me-3" style="float: left;"></i>
                            <a href="" >E-napló</a>
                        </div>
                    </div>
                ';
            }
            if($_SESSION["user"]["usr_tipus"]=="vez")
            {
                echo
                '
                    <div class="menubarButtonContainer mb-2">
                        <div class="menubarButtonMain" id=mainTanarok>
                            <i class="fas fa-fw fa-chalkboard-teacher ms-4 me-3" style="float: left;"></i>
                            <a >Tanárok</a>
                        </div>
                        <div class="menubarButtonSubContainer" id="subTanarok">
                            <div class="menubarButtonSub">
                                <i class="fas fa-fw fa-list  ms-4 me-3"></i>
                                <a href="" >Tanárok listája</a>
                            </div>
                            <div class="menubarButtonSub">
                                <i class="fas fa-fw fa-plus  ms-4 me-3"></i>
                                <a href="" >Tanárok rögzítése</a>
                            </div>
                        </div>
                    </div>
                ';
                echo
                '
                    <div class="menubarButtonContainer mb-2">
                        <div class="menubarButtonMain" id=mainTanulok>
                            <i class="fas fa-fw fa-graduation-cap ms-4 me-3" style="float: left;"></i>
                            <a >Tanulók</a>
                        </div>
                        <div class="menubarButtonSubContainer" id="subTanulok">
                            <div class="menubarButtonSub">
                                <i class="fas fa-fw fa-list  ms-4 me-3"></i>
                                <a href="" >Tanulók listája</a>
                            </div>
                            <div class="menubarButtonSub">
                                <i class="fas fa-fw fa-plus  ms-4 me-3"></i>
                                <a href="" >Tanuló rögzítése</a>
                            </div>
                        </div>
                    </div>
                ';
                echo
                '
                    <div class="menubarButtonContainer mb-2">
                        <div class="menubarButtonMain" id=mainVaezetoseg>
                            <i class="fas fa-fw fa-street-view ms-4 me-3" style="float: left;"></i>
                            <a >Vezetőségi tagok</a>
                        </div>
                        <div class="menubarButtonSubContainer" id="subVaezetoseg">
                            <div class="menubarButtonSub">
                                <i class="fas fa-fw fa-list  ms-4 me-3"></i>
                                <a href="" >Vezetőségi tagok listája</a>
                            </div>
                            <div class="menubarButtonSub">
                                <i class="fas fa-fw fa-plus  ms-4 me-3"></i>
                                <a href="" >Vezetőségi tagok rögzítése</a>
                            </div>
                        </div>
                    </div>
                ';
            }
            if($_SESSION["user"]["usr_tipus"]=="tan")
            {
                echo '

                    <div class="menubarButtonContainer mb-2">
                        <div class="menubarButtonMain" id=mainOsztalyom>
                            <i class="fas fa-fw fa-chalkboard-teacher ms-4 me-3" style="float: left;"></i>
                            <a href="" >Osztályom</a>
                        </div>
                    </div>                    
                    <div class="menubarButtonContainer mb-2">
                        <div class="menubarButtonMain" id=mainEnaplo>
                            <i class="fas fa-fw fa-book-open ms-4 me-3" style="float: left;"></i>
                            <a href="" >E-napló</a>
                        </div>
                    </div>
            ';
            }
            ?>

            <div class="menubarBottom">
                <div class="ms-3 me-3 mb-1"style="border-top: solid 3px #4d5360;"></div>

                <div class="menubarButtonContainer">
                    <div class="menubarButtonMain" id=mainFiok>
                        <i class="fas fa-fw fa-cogs ms-4 me-3" style="float: left;"></i>
                        <a href="" >Fiók</a>
                    </div>
                </div>

                <div class="menubarButtonContainer">
                    <div class="menubarButtonMain" id=mainKijelentkezes>
                        <i class="fas fa-fw fa-sign-out-alt ms-4 me-3" style="float: left;"></i>
                        <a href="/logout" >Kijelentkezés</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-10 m-0 p-0" style="">
            <div class="privSiteTop border" style="height:40px;">
                <img class="ms-2 me-3" style="float:left; height:100%;" src="/images/siteImages/fullLogo.png" alt="Suild.hu">
                <?echo '<div>'.$_SESSION["iskola"]["isk_nev"].'</div>';?>
            </div>
