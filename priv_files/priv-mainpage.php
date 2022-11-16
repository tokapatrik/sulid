<?
$userClassPtr = new User();
$userClassPtr->userLogdIn();

include('priv-site-top.php');
?>
<div class="row row-cols-3 m-5">
    <div class="col mb-5">
        <div class="d-flex align-items-center ">
            <span class="fa-stack fa-3x ">
                <i class="fas fa-fw fa-circle fa-stack-2x" style="color: #80ff80;text-shadow: -2px 0 #00cc00, 0 2px #00cc00, 2px 0 #00cc00, 0 -2px #00cc00;"></i>
                <i class="fas fa-fw fa-user-alt fa-stack-1x fa-inverse"></i>
            </span>
            <div>
                <h4 class="mb-0 pb-0">Adatlapom</h4>
                <p class="text-muted mt-0 pt-0">A felhasználói adatlapom megtekintése</p>
            </div>
        </div>
    </div>
    <div class="col mb-5 ">
        <div class="d-flex align-items-center ">
            <span class="fa-stack fa-3x ">
                <i class="fas fa-fw fa-circle fa-stack-2x" style="color: #ff4d4d;text-shadow: -2px 0 #ff0000, 0 2px #ff0000, 2px 0 #ff0000, 0 -2px #ff0000;"></i>
                <i class="fas fa-fw fa-school fa-stack-1x fa-inverse"></i>
            </span>
            <div>
                <h4 class="mb-0 pb-0">Iskola</h4>
                <p class="text-muted mt-0 pt-0">Az iskolára vonatkozó beállítások</p>
            </div>
        </div>
    </div>
    <?
    if($_SESSION["user"]["usr_tipus"]=="vez")
    {
        echo'

    <div class="col mb-5 ">
        <div class="d-flex align-items-center ">
            <span class="fa-stack fa-3x ">
                <i class="fas fa-fw fa-circle fa-stack-2x" style="color: #668cff;text-shadow: -2px 0 #004d99, 0 2px #004d99, 2px 0 #004d99, 0 -2px #004d99;"></i>
                <i class="fas fa-fw fa-chalkboard-teacher fa-stack-1x fa-inverse"></i>
            </span>
            <div>
                <h4 class="mb-0 pb-0">Tanárok</h4>
                <p class="text-muted mt-0 pt-0">A tanárokra vonatkozó beállítások</p>
            </div>
        </div>
    </div>
    <div class="col mb-5 ">
        <div class="d-flex align-items-center ">
            <span class="fa-stack fa-3x ">
                <i class="fas fa-fw fa-circle fa-stack-2x" style="color: #b8b894;text-shadow: -2px 0 #4d4d33, 0 2px #4d4d33, 2px 0 #4d4d33, 0 -2px #4d4d33;"></i>
                <i class="fas fa-fw fa-graduation-cap fa-stack-1x fa-inverse"></i>
            </span>
            <div>
                <h4 class="mb-0 pb-0">Tanulók</h4>
                <p class="text-muted mt-0 pt-0">A tanulókra vonatkozó beállítások</p>
            </div>
        </div>
    </div>
    <div class="col mb-5 ">
        <div class="d-flex align-items-center ">
            <span class="fa-stack fa-3x ">
                <i class="fas fa-fw fa-circle fa-stack-2x" style="color: #db70b8;text-shadow: -2px 0 #b300b3, 0 2px #b300b3, 2px 0 #b300b3, 0 -2px #b300b3;"></i>
                <i class="fas fa-fw fa-street-view fa-stack-1x fa-inverse"></i>
            </span>
            <div>
                <h4 class="mb-0 pb-0">Vezetőségi tagok</h4>
                <p class="text-muted mt-0 pt-0">A vezetőségi tagokra vonatkozó beállítások</p>
            </div>
        </div>
    </div>
    ';
    }
    if($_SESSION["user"]["usr_tipus"]=="tan")
    {
        echo'

    <div class="col mb-5 ">
        <div class="d-flex align-items-center ">
            <span class="fa-stack fa-3x ">
                <i class="fas fa-fw fa-circle fa-stack-2x" style="color: #668cff;text-shadow: -2px 0 #004d99, 0 2px #004d99, 2px 0 #004d99, 0 -2px #004d99;"></i>
                <i class="fas fa-fw fa-chalkboard-teacher fa-stack-1x fa-inverse"></i>
            </span>
            <div>
                <h4 class="mb-0 pb-0">Osztályom</h4>
                <p class="text-muted mt-0 pt-0">Az iskolai osztályom megtekintése</p>
            </div>
        </div>
    </div>
    <div class="col mb-5 ">
        <div class="d-flex align-items-center ">
            <span class="fa-stack fa-3x ">
                <i class="fas fa-fw fa-circle fa-stack-2x" style="color: #db70b8;text-shadow: -2px 0 #b300b3, 0 2px #b300b3, 2px 0 #b300b3, 0 -2px #b300b3;"></i>
                <i class="fas fa-fw fa-book-open fa-stack-1x fa-inverse"></i>
            </span>
            <div>
                <h4 class="mb-0 pb-0">E-napló</h4>
                <p class="text-muted mt-0 pt-0">Az elektoronikus napló megtekintése</p>
            </div>
        </div>
    </div>
    ';
    }
    if($_SESSION["user"]["usr_tipus"]=="okt")
    {
        echo'

    <div class="col mb-5 ">
        <div class="d-flex align-items-center ">
            <span class="fa-stack fa-3x ">
                <i class="fas fa-fw fa-circle fa-stack-2x" style="color: #b8b894;text-shadow: -2px 0 #4d4d33, 0 2px #4d4d33, 2px 0 #4d4d33, 0 -2px #4d4d33;"></i>
                <i class="fas fa-fw fa-book fa-stack-1x fa-inverse"></i>
            </span>
            <div>
                <h4 class="mb-0 pb-0">Tantárgyaim</h4>
                <p class="text-muted mt-0 pt-0">Az oktatott tárgyaim megtekintése</p>
            </div>
        </div>
    </div>';
        if($_SESSION["userTipusAdatok"]["okt_osztalyfonok"]>'')
        {
        echo'

    <div class="col mb-5 ">
        <div class="d-flex align-items-center ">
            <span class="fa-stack fa-3x ">
                <i class="fas fa-fw fa-circle fa-stack-2x" style="color: #668cff;text-shadow: -2px 0 #004d99, 0 2px #004d99, 2px 0 #004d99, 0 -2px #004d99;"></i>
                <i class="fas fa-fw fa-chalkboard-teacher fa-stack-1x fa-inverse"></i>
            </span>
            <div>
                <h4 class="mb-0 pb-0">Osztályom</h4>
                <p class="text-muted mt-0 pt-0">Az iskolai osztályom megtekintése</p>
            </div>
        </div>
    </div>';
        }
        echo '
    <div class="col mb-5 ">
        <div class="d-flex align-items-center ">
            <span class="fa-stack fa-3x ">
                <i class="fas fa-fw fa-circle fa-stack-2x" style="color: #db70b8;text-shadow: -2px 0 #b300b3, 0 2px #b300b3, 2px 0 #b300b3, 0 -2px #b300b3;"></i>
                <i class="fas fa-fw fa-book-open fa-stack-1x fa-inverse"></i>
            </span>
            <div>
                <h4 class="mb-0 pb-0">E-napló</h4>
                <p class="text-muted mt-0 pt-0">Az elektoronikus napló megtekintése</p>
            </div>
        </div>
    </div>
    ';
    }
    ?>
    <div class="col mb-5 ">
        <div class="d-flex align-items-center ">
            <span class="fa-stack fa-3x ">
                <i class="fas fa-fw fa-circle fa-stack-2x" style="color: #c68c53;text-shadow: -2px 0 #663300, 0 2px #663300, 2px 0 #663300, 0 -2px #663300;"></i>
                <i class="fas fa-fw fa-cogs fa-stack-1x fa-inverse"></i>
            </span>
            <div>
                <h4 class="mb-0 pb-0">Fiók</h4>
                <p class="text-muted mt-0 pt-0">A fiók adatok módosítása</p>
            </div>
        </div>
    </div>
    <div class="col mb-5 ">
        <div class="d-flex align-items-center ">
            <span class="fa-stack fa-3x ">
                <i class="fas fa-fw fa-circle fa-stack-2x" style="color: #ff9933;text-shadow: -2px 0 #ff8000, 0 2px #ff8000, 2px 0 #ff8000, 0 -2px #ff8000;"></i>
                <i class="fas fa-fw fa-sign-out-alt fa-stack-1x fa-inverse"></i>
            </span>
            <div>
                <h4 class="mb-0 pb-0">Kijelentkezés</h4>
                <p class="text-muted mt-0 pt-0">Kijelentkezés a felhasználói fiókból</p>
            </div>
        </div>
    </div>
</div>
<?
include('priv-site-bottom.php');  
?>