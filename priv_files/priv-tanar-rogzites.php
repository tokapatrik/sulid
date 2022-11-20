<?
include('priv-site-top.php');

if (count($_REQUEST)>1) { //POST vizsgálat
    if($_REQUEST["vezeteknev"]<>'' && $_REQUEST["keresztnev"]<>'' && $_REQUEST["email"]<>'') { //Megvannak a legszükségesebb adatok?
        $emailek=getSQL("SELECT * FROM user WHERE usr_email='".$_REQUEST["email"]."'");
        if (count($emailek)==0) { //További feltételek
            //User beszúr
            $buildSQLForUserInsert="INSERT INTO user (usr_isk_id, usr_nev, usr_tipus, usr_email)";
            $buildSQLForUserValues=" VALUES ('".$_SESSION["iskola"]["isk_id"]."', '".ucfirst($_REQUEST["vezeteknev"])." ".ucfirst($_REQUEST["keresztnev"]."', 'okt', '").$_REQUEST["email"]."')";
            setSQL($buildSQLForUserInsert.$buildSQLForUserValues);
            $usrId=getSQL("SELECT usr_id FROM user WHERE usr_email='".$_REQUEST["email"]."'")[0]["usr_id"];

            //Tanár beszúr
            $buildSQLForTanarInsert="INSERT INTO oktato (okt_usr_id, okt_isk_id, okt_nev, okt_nev_vezetek, okt_nev_kereszt, okt_szul_ido, okt_szul_hely, okt_anyja_neve, okt_irsz, okt_varos, okt_cim, okt_email)";
            $buildSQLForTanarValues=" VALUES ('".$usrId."', '".$_SESSION["iskola"]["isk_id"]."', '".ucfirst($_REQUEST["vezeteknev"])." ".ucfirst($_REQUEST["keresztnev"])."', '".ucfirst($_REQUEST["vezeteknev"])."', '".ucfirst($_REQUEST["keresztnev"])."', '".$_REQUEST["szulido"]."', '".$_REQUEST["szulhely"]."', '".$_REQUEST["anyjaneve"]."', '".$_REQUEST["irsz"]."', '".$_REQUEST["varos"]."', '".$_REQUEST["cim"]."', '".$_REQUEST["email"]."' )";
            setSQL($buildSQLForTanarInsert.$buildSQLForTanarValues);
            echo '<div class="ms-5 me-5 mt-3 mb-3 alert alert-success">Tanár sikeresen rögzítve!</div>';
        }
        else
        {
            echo '<div class="ms-5 me-5 mt-3 mb-3 alert alert-danger">Már szerepel tanár a nyilvántartásban ezekkel az adatokkal!</div>';
        }
    }
    else
    {
        echo '<div class="ms-5 me-5 mt-3 mb-3 alert alert-danger"> Hiányzó adatok! </div>';
    }
}

?>
<div class="p-3 d-flex justify-content-center align-items-center">
    <div class="card shadow w-50">
        <div class="card-header d-flex align-items-center">
            <i class="fas fa-plus pe-2"></i>
            <h5 class="p-0 m-0">Új tanár rögzítése</h5>
        </div>
        <div class="card-body">
            <form method="post">

                <h5 class="mb-2" >Felhasználó adatok:</h5>
                <div class="ms-3">

                    <label class="mb-2" style="font-weight: 500;">Tanár neve:</label>
                    <div class="d-flex">
                        <div class="form-floating ms-1 me-2 w-100">
                            <input type="text" class="form-control" id="vezeteknev" name="vezeteknev" value="<?echo $_REQUEST["vezeteknev"];?>" placeholder="vezeteknev">
                            <label for="vezeteknev">Vezetéknév</label>
                                </div>
                        <div class="form-floating me-1 ms-2 w-100">
                            <input type="text" class="form-control" id="keresztnev" name="keresztnev" value="<?echo $_REQUEST["keresztnev"];?>" placeholder="keresztnev">
                            <label for="keresztnev">Keresztnév</label>
                        </div>
                    </div>
                    <div class="form-text me-1">A felhasználó nevének megadásakor ügyeljen a helyes formátumra</div>

                    <label class="mt-3 mb-2" style="font-weight: 500;">E-mail cím:</label>
                    <div class="form-floating ms-1 me-1 ">
                        <input type="email" class="form-control" id="email" name="email" value="<?echo $_REQUEST["email"];?>" placeholder="email">
                        <label for="email">E-mail</label>
                    </div>
                    <div class="form-text">Kérjük pontosan rögzítse a felhasználó e-mail címét</div>
 
                </div>

                <div class="mt-3 d-flex align-items-center tovabbiAdatok" id="tovabbiAdatok">További adatok megadása<i class="fas fa-sort-down ms-1"></i></div>
                <button type="submit" class="btn btn-success float-end position-absolute" style="z-index: 10;bottom: 1.25rem; right: 1.25rem;">Tanár rögzítése</button>

                <div id="tovabbiAdatokDiv" style="display:none;">
                    <h5 class="mt-3" >Személyes adatok:</h5>
                <div class="ms-3">

                    <label class="mb-2" style="font-weight: 500;">Anyja neve:</label>
                    <div class="form-floating ms-1 me-1 ">
                        <input type="text" class="form-control" id="anyjaneve" name="anyjaneve" value="<?echo $_REQUEST["anyjaneve"];?>" placeholder="anyjaneve">
                        <label for="anyjaneve">Név</label>
                    </div>

                    <label class="mb-2 mt-3" style="font-weight: 500;">Születési idő, hely:</label>
                    <div class="d-flex">
                        <div class="form-floating ms-1 me-2 w-100">
                            <input type="date" min="1111-01-01" max="9999-12-31" class="form-control" id="szulido" name="szulido" value="<?echo $_REQUEST["szulido"];?>" placeholder="szulido">
                            <label for="szulido">Idő</label>
                                </div>
                        <div class="form-floating me-1 ms-2 w-100">
                            <input type="text" class="form-control" id="szulhely" name="szulhely" value="<?echo $_REQUEST["szulhely"];?>" placeholder="szulhely">
                            <label for="szulhely">Hely</label>
                        </div>
                    </div>

                    <label class="mb-2 mt-3" style="font-weight: 500;">Cím adatok:</label>
                    <div class="d-flex">
                        <div class="form-floating ms-1 me-2 w-100">
                            <input type="number" class="form-control" id="irsz" name="irsz" value="<?echo $_REQUEST["irsz"];?>" placeholder="irsz">
                            <label for="irsz">Irányítószám</label>
                                </div>
                        <div class="form-floating me-1 ms-2 w-100">
                            <input type="text" class="form-control" id="varos" name="varos" value="<?echo $_REQUEST["varos"];?>" placeholder="varos">
                            <label for="varos">Város</label>
                        </div>
                    </div>
                    <div class="form-floating mt-2 ms-1 me-1 ">
                        <input type="text" class="form-control" id="cim" name="cim" value="<?echo $_REQUEST["cim"];?>" placeholder="cim">
                        <label for="cim">Utca, házszám</label>
                    </div>
                    
                    <div style="height: 8vh;"></div>
                </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div style="height:15vh;"></div>
<?
include('priv-site-bottom.php');  
?>