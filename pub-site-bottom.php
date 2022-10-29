<?php 
//csak akkor kell a container ha valamilyen aloldal, mert főoldalra fullwidth
if (!($_URL['goURL']=="pub-mainpage.php"))
{ 
echo '      </div> <!--container-->
        </div> <!--page-container-->';
}
?>
    <div class="bottom-main">
        <div class="container">
            <div class=row>
                <div class="col-4">
                    <div class="row">
                        <a href="/"><img class="" src="/images/siteImages/fullLogo.png" alt="Suild.hu"></a>
                        <h5>Digitalizáld velünk az oktatást!</h5>
                    </div>
                    <div class="row">
                        <h3>Kapcsolat:</h3>
                        <span class="card-icon fa-stack fa-2x" style="margin-left:10px;">
                            <i class="fa fa-square fa-stack-2x"></i>
                            <i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
                        </span>
                        <span class="card-icon fa-stack fa-2x">
                            <i class="fa fa-square fa-stack-2x"></i>
                            <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                        </span>
                        <span class="card-icon fa-stack fa-2x">
                            <i class="fa fa-square fa-stack-2x"></i>
                            <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
                        </span>
                        <span class="card-icon fa-stack fa-2x">
                            <i class="fa fa-square fa-stack-2x"></i>
                            <i class="fab fa-youtube fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                </div>
                <div class="col-2 center menulinks">
                    <h5 class="menulinks-main">Miért a Sulid.hu?</h5>
                    <p>Adminisztrációs modul</p>
                    <p>e-Napló modul</p>
                    <p>Naptár modul</p>
                    <p>Üzenetkezelő modul</p>
                </div>
                <div class="col-2 center menulinks">
                    <h5 class="menulinks-main">Árak</h5>
                    <p>Díjcsomagok</p>
                    <p>Egyedi díjszabás</p>
                </div>
                <div class="col-2 center menulinks">
                    <h5 class="menulinks-main">Rólunk</h5>
                    <p>Bemutatkozás</p>
                    <p>Elérhetőségek</p>
                    <p>Rólunk írták</p>
                    <p>Referenciáink</p>
                </div>
                <div class="col-2 center my-auto">
                    <a href="" class="btn btn-primary-outline">Bejelentkezés</a>
                    <a href="" class="btn btn-primary">Regisztráció</a>
                </div>
            </div>
        </div>
    </div>




</body>
</html>

<script src="/js/jquery-3.6.1.min.js" ></script>
<script src="/js/jquery-ui.min.js" ></script>
<script src='/js/jquery.flip.min.js'></script>
<script src="/bootstrap-5.2.0-dist/js/bootstrap.bundle.js" ></script>
<script src='/js/animate.js'></script>
<script src='/js/public.js'></script>
<script src="/js/progressbar.js" ></script>