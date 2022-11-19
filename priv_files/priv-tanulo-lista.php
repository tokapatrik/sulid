<?
$misc = new Misc;

if($_SESSION["user"]["usr_tipus"]=='vez')
{
    //tanulokArray felépítése, vez szemel, tehát az iskola összes tanulója
    if($_REQUEST["kereses"]>'')
    {
        //Nevre
        $rsForName=getSQL("SELECT * FROM tanulo WHERE tan_isk_id='".$_SESSION["iskola"]["isk_id"]."' AND tan_nev LIKE '%".$_REQUEST["kereses"]."%' ORDER BY tan_id DESC");
    
        //OM azonosítóra
        $rsForOM=getSQL("SELECT * FROM tanulo WHERE tan_isk_id='".$_SESSION["iskola"]["isk_id"]."' AND tan_om LIKE '%".$_REQUEST["kereses"]."%' ORDER BY tan_id DESC");

        //Email
        $rsForEmail=getSQL("SELECT * FROM tanulo WHERE tan_isk_id='".$_SESSION["iskola"]["isk_id"]."' AND tan_email LIKE '%".$_REQUEST["kereses"]."%' ORDER BY tan_id DESC");
        $tanulokArray=array_unique(array_merge($rsForName, $rsForOM, $rsForEmail), SORT_REGULAR);

    }else
    {
        $rs = getSQL("SELECT * FROM tanulo WHERE tan_isk_id='".$_SESSION["iskola"]["isk_id"]."' ORDER BY tan_id DESC");
        $tanulokArray=$rs;
    }
}



include('priv-site-top.php');
?>
<div class="pt-3 pb-3 ps-4 pe-4">
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <i class="fas fa-graduation-cap fa-1x"></i>
            <h5 class="m-0 ms-2">Tanulók listája - <?echo count($rs)?> tanuló</h5>
        </div>
        <form method="post" class="card-body d-flex align-items-center w-50">
            <input type="text" class="form-control" id="exampleFormControlInput1" name="kereses" value="<?echo $_REQUEST["kereses"]?>" placeholder="Keresés: név, om, e-mail...">
            <button class="btn btn-primary ms-2 d-flex align-items-center"><i class="fas fa-search me-2"></i>Keresés</button>
            <a class="listClose" href=""><i class="fas fa-times ms-3"></i></a>
            <a href="/priv/tanulo-rogzites" class=" btn btn-primary me-3 position-absolute" style="right: 0;"><i class="fas fa-plus pe-2"></i>Új tanuló</a>
        </form>
    </div>
    <div class="mt-3 ms-4 me-4">
        <table class="table">
        <thead>
            <tr id="listaHeader" style="background-color:#212529; background:rgba(0, 0, 0, 0.075);">
                <th class="text-center" scope="col">#</th>
                <th scope="col">Tanuló neve</th>
                <th scope="col">OM azonosító</th>
                <th scope="col">Osztály</th>
                <th scope="col">E-mail cím</th>
                <th scope="col">Tanulmányi átlag</th>
            </tr>
        </thead>
        <tbody>
            <div class="listaSelectMenu" colspan="6" style="background-color: #1271ff76; display:none;">
                <div class="d-flex align-items-center">
                    <input class="form-check-input mt-3 mb-3 ms-2 me-2" id="listaCheckboxAll" <?if($misc->getNumberOfSelectedUser("tan")==count($tanulokArray)) {echo "checked";}?> type="checkbox">
                    <div class="fw-bold" id="listaSelectCounter"></div>
                </div>
            </div>
                <?
                if(count($tanulokArray)>0)
                {
                    foreach ($tanulokArray as $tanulo) {
                        $color=$misc->stringToColorCode($tanulo["tan_nev"]);
                        $monogram=mb_substr($tanulo["tan_nev_vezetek"],0,1).mb_substr($tanulo["tan_nev_kereszt"],0,1);
                        echo '<tr class="tanuloListaSor '.(($_SESSION["kijeloltek"]['tan_checkbox_'.$tanulo["tan_id"]]=="true")? "listaChecked" : "").'">';
                        echo '<td><input class="form-check-input listaCheckbox" type="checkbox" id="tan_checkbox_'.$tanulo["tan_id"].'" '.(($_SESSION["kijeloltek"]['tan_checkbox_'.$tanulo["tan_id"]]=="true")? "checked" : "").'></td>';
                        echo '<th><div class="d-flex align-items-center justify-content-center float-start me-2" style="height:30px;width:30px;background: #'.$color.';border-radius: 5px;">'.$monogram.'</div><div class="d-flex align-items-center" style="height:30px;"">'.$tanulo["tan_nev"].'</div></th>';
                        echo '<td>'.$tanulo["tan_om"].'</td>';
                        echo '<td>'.(($tanulo["tan_osztaly"]!='')? $tanulo["tan_osztaly"] : "nincs osztály").'</td>';
                        echo '<td>'.$tanulo["tan_email"].'</td>';
                        echo '<td>'.(($tanulo["tan_atlag"]!='')? $tanulo["tan_atlag"] : "---").'</td>';
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