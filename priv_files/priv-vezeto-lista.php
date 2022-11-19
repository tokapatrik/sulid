<?
$misc = new Misc;

if($_SESSION["user"]["usr_tipus"]=='vez')
{
    //vezetosegArray felépítése, vez szemel, tehát az iskola összes vezetőségi tagja
    if($_REQUEST["kereses"]>'')
    {
        //Nevre
        $rsForName=getSQL("SELECT * FROM vezetoseg WHERE vez_isk_id='".$_SESSION["iskola"]["isk_id"]."' AND vez_nev LIKE '%".$_REQUEST["kereses"]."%' ORDER BY vez_id DESC");

        //Email
        $rsForEmail=getSQL("SELECT * FROM vezetoseg WHERE vez_isk_id='".$_SESSION["iskola"]["isk_id"]."' AND vez_email LIKE '%".$_REQUEST["kereses"]."%' ORDER BY vez_id DESC");
        $vezetosegArray=array_unique(array_merge($rsForName, $rsForEmail), SORT_REGULAR);

    }else
    {
        $rs = getSQL("SELECT * FROM vezetoseg WHERE vez_isk_id='".$_SESSION["iskola"]["isk_id"]."' ORDER BY vez_id DESC");
        $vezetosegArray=$rs;
    }
}



include('priv-site-top.php');
?>
<div class="pt-3 pb-3 ps-4 pe-4">
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <i class="fas fa-graduation-cap fa-1x"></i>
            <h5 class="m-0 ms-2">Vezetőségi tagok listája - <?echo count($rs)?> tag</h5>
        </div>
        <form method="post" class="card-body d-flex align-items-center w-50">
            <input type="text" class="form-control" id="exampleFormControlInput1" name="kereses" value="<?echo $_REQUEST["kereses"]?>" placeholder="Keresés: név, e-mail...">
            <button class="btn btn-primary ms-2 d-flex align-items-center"><i class="fas fa-search me-2"></i>Keresés</button>
            <a class="listClose" href=""><i class="fas fa-times ms-3"></i></a>
            <a href="/priv/vezeto-rogzites" class=" btn btn-primary me-3 position-absolute" style="right: 0;"><i class="fas fa-plus pe-2"></i>Új vezetőségi tag</a>
        </form>
    </div>
    <div class="mt-3 ms-4 me-4">
        <table class="table">
        <thead>
            <tr id="listaHeader" style="background-color:#212529; background:rgba(0, 0, 0, 0.075);">
                <th class="text-center" scope="col">#</th>
                <th scope="col">Vezetőségi tag neve</th>
                <th scope="col">E-mail cím</th>
                <th scope="col">Telefonszám</th>
                <th scope="col">Leírás</th>
            </tr>
        </thead>
        <tbody>
            <div class="listaSelectMenu" colspan="6" style="background-color: #1271ff76; display:none;">
                <div class="d-flex align-items-center">
                    <input class="form-check-input mt-3 mb-3 ms-2 me-2" id="listaCheckboxAll" <?if($misc->getNumberOfSelectedUser("vez")==count($vezetosegArray)) {echo "checked";}?> type="checkbox">
                    <div class="fw-bold" id="listaSelectCounter"></div>
                </div>
            </div>
                <?
                if(count($vezetosegArray)>0)
                {
                    foreach ($vezetosegArray as $vezeto) {
                        $color=$misc->stringToColorCode($vezeto["vez_nev"]);
                        $monogram=mb_substr($vezeto["vez_nev_vezetek"],0,1).mb_substr($vezeto["vez_nev_kereszt"],0,1);
                        echo '<tr class="tanuloListaSor '.(($_SESSION["kijeloltek"]['vez_checkbox_'.$vezeto["vez_id"]]=="true")? "listaChecked" : "").'">';
                        echo '<td><input class="form-check-input listaCheckbox" type="checkbox" id="vez_checkbox_'.$vezeto["vez_id"].'" '.(($_SESSION["kijeloltek"]['vez_checkbox_'.$vezeto["vez_id"]]=="true")? "checked" : "").'></td>';
                        echo '<th><div class="d-flex align-items-center justify-content-center float-start me-2" style="height:30px;width:30px;background: #'.$color.';border-radius: 5px;">'.$monogram.'</div><div class="d-flex align-items-center" style="height:30px;"">'.$vezeto["vez_nev"].'</div></th>';
                        echo '<td>'.$vezeto["vez_email"].'</td>';
                        echo '<td>'.(($vezeto["vez_tel"]!='')? $vezeto["vez_tel"] : "---").'</td>';
                        echo '<td>'.(($vezeto["vez_leiras"]!='')? $vezeto["vez_leiras"] : "---").'</td>';
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
include('priv-site-bottom.php');  
?>