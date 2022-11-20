<?
$misc = new Misc;
include('priv-site-top.php');

if($_SESSION["user"]["usr_tipus"]=='vez')
{
    //oktatoArray felépítése, vez szemel, tehát az iskola összes tanára
    if($_REQUEST["kereses"]>'')
    {
        //Nevre
        $rsForName=getSQL("SELECT * FROM oktato WHERE okt_isk_id='".$_SESSION["iskola"]["isk_id"]."' AND okt_nev LIKE '%".$_REQUEST["kereses"]."%' ORDER BY okt_id DESC");

        //Email
        $rsForEmail=getSQL("SELECT * FROM oktato WHERE okt_isk_id='".$_SESSION["iskola"]["isk_id"]."' AND okt_email LIKE '%".$_REQUEST["kereses"]."%' ORDER BY okt_id DESC");
        
        $oktatoArray=array_unique(array_merge($rsForName, $rsForEmail), SORT_REGULAR);

    }else
    {
        $rs = getSQL("SELECT * FROM oktato WHERE okt_isk_id='".$_SESSION["iskola"]["isk_id"]."' ORDER BY okt_id DESC");
        $oktatoArray=$rs;
    }

?>
<div class="pt-3 pb-3 ps-4 pe-4">
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <i class="fas fa-chalkboard-teacher fa-1x"></i>
            <h5 class="m-0 ms-2">Tanárok listája - <?echo count($rs)?> tanár</h5>
        </div>
        <form method="post" class="card-body d-flex align-items-center w-50">
            <input type="text" class="form-control" id="exampleFormControlInput1" name="kereses" value="<?echo $_REQUEST["kereses"]?>" placeholder="Keresés: név, e-mail...">
            <button class="btn btn-primary ms-2 d-flex align-items-center"><i class="fas fa-search me-2"></i>Keresés</button>
            <a class="listClose" href=""><i class="fas fa-times ms-3"></i></a>
            <a href="/priv/tanar-rogzites" class=" btn btn-primary me-3 position-absolute" style="right: 0;"><i class="fas fa-plus pe-2"></i>Új tanár</a>
        </form>
    </div>
    <div class="mt-3 ms-4 me-4">
        <table class="table">
        <thead>
            <tr id="listaHeader" style="background-color:#212529; background:rgba(0, 0, 0, 0.075);">
                <th class="text-center" scope="col">#</th>
                <th scope="col">Tanár neve</th>
                <th scope="col">E-mail cím</th>
                <th scope="col">Telefonszám</th>
                <th scope="col">Osztályfőnök?</th>
                <th scope="col">Oktatott tárgyak</th>
            </tr>
        </thead>
        <tbody>
            <div class="listaSelectMenu" colspan="6" style="background-color: #1271ff76; display:none;">
                <div class="d-flex align-items-center">
                    <input class="form-check-input mt-3 mb-3 ms-2 me-2" id="listaCheckboxAll" <?if($misc->getNumberOfSelectedUser("okt")==count($oktatoArray)) {echo "checked";}?> type="checkbox">
                    <div class="fw-bold" id="listaSelectCounter"></div>
                    <?
                    if ($_GET["pageFrom"]=="osztalyok")
                    {
                        echo '<a class="ms-3 btn btn-primary" href="/priv/'.$_GET["pageFrom"].'" >Vissza az osztályokhoz </a>';
                    }
                    ?>
                </div>
            </div>
                <?
                if(count($oktatoArray)>0)
                {
                    foreach ($oktatoArray as $oktato) {
                        $color=$misc->stringToColorCode($oktato["okt_nev"]);
                        $monogram=mb_substr($oktato["okt_nev_vezetek"],0,1).mb_substr($oktato["okt_nev_kereszt"],0,1);
                        echo '<tr class="tanuloListaSor '.(($_SESSION["kijeloltek"]['okt_checkbox_'.$oktato["okt_id"]]=="true")? "listaChecked" : "").'">';
                        echo '<td><input class="form-check-input listaCheckbox" type="checkbox" id="okt_checkbox_'.$oktato["okt_id"].'" '.(($_SESSION["kijeloltek"]['okt_checkbox_'.$oktato["okt_id"]]=="true")? "checked" : "").'></td>';
                        echo '<th><div class="d-flex align-items-center justify-content-center float-start me-2" style="height:30px;width:30px;background: #'.$color.';border-radius: 5px;">'.$monogram.'</div><div class="d-flex align-items-center" style="height:30px;"">'.$oktato["okt_nev"].'</div></th>';
                        echo '<td>'.$oktato["okt_email"].'</td>';
                        echo '<td>'.$oktato["okt_om"].'</td>';
                        echo '<td>'.(($oktato["okt_osztalyfonok"]!='')? $oktato["okt_osztalyfonok"] : "nem osztályfőnök").'</td>';
                        echo '<td>'.(($oktato["okt_atlag"]!='')? $oktato["okt_atlag"] : "---").'</td>';
                        echo '</tr>';
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