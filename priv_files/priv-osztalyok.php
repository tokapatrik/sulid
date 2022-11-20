<?
$misc = new Misc;
include('priv-site-top.php');

if($_SESSION["user"]["usr_tipus"]=='vez')
{
    if ($_REQUEST["oszt_id"]>'')//Tehát POST van
    {
        //Kell ide még a vizsgálat
        $kijeloltOsztalyfonokId;
        foreach ($_SESSION["kijeloltek"] as $key => $value)
        {
            if($value=="true" && mb_substr($key,0,3)=="okt")
            {
                $kijeloltOsztalyfonokId=mb_substr($key, strrpos($key, "_")+1, strlen($key)-strrpos($key, "_"));
            }
        }
        setSQL("UPDATE osztaly SET oszt_nev='".$_REQUEST["oszt_nev"]."', oszt_osztalyfonok='".$kijeloltOsztalyfonokId."' WHERE oszt_id='".$_REQUEST["oszt_id"]."'");
        
        $kijeloltTanuloIdk;
        foreach ($_SESSION["kijeloltek"] as $key => $value)
        {
            if($value=="true" && mb_substr($key,0,3)=="tan")
            {
                $kijeloltTanuloIdk[]=mb_substr($key, strrpos($key, "_")+1, strlen($key)-strrpos($key, "_"));
            }
        }
        setSQL("UPDATE tanulo SET tan_oszt_id=NULL WHERE tan_oszt_id='".$_REQUEST["oszt_id"]."'");
        foreach ($kijeloltTanuloIdk as $value) {
            setSQL("UPDATE tanulo SET tan_oszt_id='".$_REQUEST["oszt_id"]."' WHERE tan_id='".$value."'");
        }
        $_SESSION["nyitva"]=array();
        $_SESSION["kijeloltek"]=array();
    }
    if ($_REQUEST["uj"]=="true") {
        setSQL("INSERT INTO osztaly (oszt_isk_id, oszt_nev) VALUES ('".$_SESSION["iskola"]["isk_id"]."', '".$_REQUEST["nev"]."')");
    }


    //oszalyArray felépítése, vez szemel, tehát az összes osztály
    if($_REQUEST["kereses"]>'')
    {
        //Nevre
        $osztalyArray = getSQL("SELECT * FROM osztaly LEFT JOIN oktato ON oszt_osztalyfonok=okt_id WHERE oszt_isk_id='".$_SESSION["iskola"]["isk_id"]."' AND oszt_nev LIKE '%".$_REQUEST["kereses"]."%' ORDER BY oszt_id DESC");

    }else
    {
        $osztalyArray = getSQL("SELECT * FROM osztaly LEFT JOIN oktato ON oszt_osztalyfonok=okt_id WHERE oszt_isk_id='".$_SESSION["iskola"]["isk_id"]."' ORDER BY oszt_id DESC");
    }

?>
<div class="pt-3 pb-3 ps-4 pe-4">
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <i class="fas fa-chalkboard-teacher fa-1x"></i>
            <h5 class="m-0 ms-2">Osztályok az iskolában</h5>
        </div>
        <form method="post" class="card-body d-flex align-items-center w-50">
            <input type="text" class="form-control" id="exampleFormControlInput1" name="kereses" value="<?echo $_REQUEST["kereses"]?>" placeholder="Keresés: osztály...">
            <button class="btn btn-primary ms-2 d-flex align-items-center"><i class="fas fa-search me-2"></i>Keresés</button>
            <a class="listClose" href=""><i class="fas fa-times ms-3"></i></a>
            <a class="btn btn-primary me-3 position-absolute" style="right:0;" id="ujSor" data-bs-toggle="modal" data-bs-target="#ujOsztalyModal"><i class="fas fa-plus pe-2"></i>Új osztály</a> 
        </form>
    </div>
    <div class="modal fade" id="ujOsztalyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form method="post" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus pe-2"></i>ÚJ oszály rögzítése</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="nev" name="uj" value="true" placeholder="nev">
                    <label class="mt-3 mb-2" style="font-weight: 500;">Osztály:</label>
                    <div class="form-floating ms-1 me-1 ">
                        <input type="text" class="form-control" id="nev" name="nev" value="" placeholder="nev">
                        <label for="nev">Név</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Mégse</button>
                    <button type="submit" class="btn btn-success">Osztály rögzítése</button>
                </div>
            </form>
        </div>
    </div>
    <div class="mt-3 ms-4 me-4">
        <table class="table" id="osztalytable">
        <thead>
            <tr id="listaHeader" style="background-color:#212529; background:rgba(0, 0, 0, 0.075);">
                <th scope="col">Osztály</th>
                <th scope="col">Osztályfőnök</th>
                <th scope="col">Tanulók</th>
                <th scope="col" style="max-width:65px;">Osztályátlag</th>
                <th scope="col">Tanulók</th>
            </tr>
        </thead>
        <tbody>
                <?
                if(count($osztalyArray)>0)
                {
                    foreach ($osztalyArray as $osztaly) {
                        ?>
                        <tr class="align-middle">
                            <form method="post">
                                <th style="max-width:65px;">
                                    <? echo "<div class='osztalyokShow'>".$osztaly["oszt_nev"]."</div>"; ?>
                                    <input type="hidden" class="form-control" name="oszt_id" value="<?echo $osztaly["oszt_id"]?>">
                                    <input type="text" class="form-control osztalyokHidden <?if($_SESSION["nyitva"]["nyitottSorOsztId_".$osztaly["oszt_id"]]=="true"){echo "canOpen";}?>" name="oszt_nev" value="<?echo $osztaly["oszt_nev"]?>">
                                </th>
                                <td>
                                    <? 
                                    if($osztaly["oszt_osztalyfonok"]<>'') 
                                    {
                                        echo "<div class='osztalyokShow'>".$osztaly["okt_nev"]."</div>";
                                    }else
                                    {
                                        echo "<div class='osztalyokShow'>nincs osztályfőnök megadva</div>"; 
                                    }
                                    echo "<div class='osztalyokHidden'>"; 
                                    if($osztaly["oszt_osztalyfonok"]<>'') 
                                    {
                                        echo "Korábbi: ".$osztaly["okt_nev"]."<br>";
                                    }else
                                    {
                                        echo "Korábbi: nincs osztályfőnök megadva<br>"; 
                                    }
                                    echo "Új: "; 
                                    $numberOfSelectedTanar=$misc->getNumberOfSelectedUser("okt");
                                    if ($numberOfSelectedTanar==0 || $numberOfSelectedTanar>1)
                                    {
                                        echo '<a class="text-danger" href="/priv/tanar-lista?pageFrom=osztalyok">'.$numberOfSelectedTanar.' tanár kijelölve (Kérjük 1 tanárt jelöljön ki)</a>';
                                    }
                                    else
                                    {
                                        foreach (array_keys($_SESSION["kijeloltek"]) as $kijelolt) {
                                            if(mb_substr($kijelolt, 0,3)=="okt") //Korábbi feltételből adódóan csak 1 lehet, tehát itt már ezt vizsgálni nem kell
                                            {
                                                $kijeloltTanarId=mb_substr($kijelolt, strrpos($kijelolt, "_")+1, strlen($kijelolt)-strrpos($kijelolt, "_"));
                                                $kijeloltTanar=getSQL("SELECT * FROM oktato WHERE okt_id='".$kijeloltTanarId."'")[0];
                                            }
                                        }
                                        echo '<a class="text-success" href="/priv/tanar-lista?pageFrom=osztalyok">'.$kijeloltTanar["okt_nev"].' kijelölve</a>';
                                    }
                                    echo "</div>"; 
                                    ?>
                                </td>
                                <td>
                                    <? 
                                    $tanulokOsztalyban=getSQl("SELECT * FROM tanulo WHERE tan_oszt_id='".$osztaly["oszt_id"]."'");
                                    $tanulokNevStr='';
                                    $j=1;
                                    foreach ($tanulokOsztalyban as $tanulo) {
                                        if ($j==count($tanulokOsztalyban)) {
                                            $tanulokNevStr.=$tanulo["tan_nev"];
                                        }
                                        else{
                                            $tanulokNevStr.=$tanulo["tan_nev"].", ";
                                        }

                                    }
                                    echo "<div class='osztalyokShow'>".count($tanulokOsztalyban)." fő (".((strlen($tanulokNevStr)>25)? mb_substr($tanulokNevStr,0,25)."..." : $tanulokNevStr).")"."</div>"; 
                                    echo "<div class='osztalyokHidden'>"; 
                                    if($osztaly["oszt_osztalyfonok"]<>'') 
                                    {
                                        echo "Korábbi: ".count($tanulokOsztalyban)." fő (".((strlen($tanulokNevStr)>25)? mb_substr($tanulokNevStr,0,25)."..." : $tanulokNevStr).")"."<br>";
                                    }else
                                    {
                                        echo "Korábbi: nincs osztályfőnök megadva<br>"; 
                                    }
                                    echo "Új: ";
                                    $numberOfSelectedTanulo=$misc->getNumberOfSelectedUser("tan");
                                    if ($numberOfSelectedTanulo==0)
                                    {
                                        echo '<a class="text-danger" href="/priv/tanulo-lista?pageFrom=osztalyok">'.$numberOfSelectedTanulo.' tanuló kijelölve (Kérjük jelölje ki a tanulókat)</a>';
                                    }
                                    else
                                    {
                                        $kijeloltTanulok=array();
                                        foreach (array_keys($_SESSION["kijeloltek"]) as $kijelolt) {
                                            if(mb_substr($kijelolt, 0,3)=="tan")
                                            {
                                                $kijeloltTanuloId=mb_substr($kijelolt, strrpos($kijelolt, "_")+1, strlen($kijelolt)-strrpos($kijelolt, "_"));
                                                $kijeloltTanulok[]=getSQL("SELECT * FROM tanulo WHERE tan_id='".$kijeloltTanuloId."'")[0];
                                            }
                                        }
                                        $tanulokNevStr='';
                                        $j=1;
                                        foreach ($kijeloltTanulok as $tanulo) {
                                            if ($j==count($kijeloltTanulok)) {
                                                $tanulokNevStr.=$tanulo["tan_nev"];
                                            }
                                            else{
                                                $tanulokNevStr.=$tanulo["tan_nev"].", ";
                                            }
                                            $j++;
                                        }
                                        //echo count($tanulokOsztalyban).' fő ('.((strlen($tanulokNevStr)>25)? mb_substr($tanulokNevStr,0,25).'...' : $tanulokNevStr).')';
                                        echo '<a class="text-success" href="/priv/tanulo-lista?pageFrom=osztalyok">'.count($kijeloltTanulok).' fő ('.((strlen($tanulokNevStr)>25)? mb_substr($tanulokNevStr,0,25).'...' : $tanulokNevStr).')'.'</a>';
                                    }
                                    echo "</div>"; 
                                    ?>
                                </td>
                                <td>
                                    <? echo (($osztaly["okt_atlag"]<>'')? $osztaly["okt_atlag"] : "---"); ?>
                                </td>
                                <td class="text-end">
                                    <i class="editOsztaly fas fa-edit"></i>
                                    <div class="osztalyButtons" value="<?echo $osztaly["oszt_id"]?>">
                                        <div class="d-flex flex-column">
                                            <div class="btn btn-secondary mb-1 osztlyButtonsMegsem">Mégsem</div>
                                            <button type="submit" class="btn btn-success">Mentés</button>
                                        </div>
                                    </div>
                                </td>
                            </form>
                        </tr>
                        <?
                    }
                }
                else
                {
                    echo '<tr><td colspan="6" class="fw-bold">Nincs találat</td></tr>';
                } 
                ?>
        </tbody>
        </table>   
    </div>
</div>
<?
}
else
{
    echo '<div class="alert alert-danger m-5 mt-3" role="alert">Nincs jogosultsága az oldal megtekintéséhez!</div>';
}
include('priv-site-bottom.php');  
?>