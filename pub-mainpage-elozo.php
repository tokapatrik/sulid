<?php 
include('pub-site-top.php');  
?>



<div class="hero shadow">
    <div class="hero-box animate__animated animate__fadeInUp" >
        <h1 class="hero-heading h-light">Digatializáld velünk az oktatást!</h1>
        <p class="hero-desc">Elektronikus napló megoldás általános és közép iskolák részére</p>
        <a href="#" id="hero-box-button"class="btn btn-primary shadow">Bővebben</a>
    </div>
</div>

<div class="home1">
    <div class="card-holder">   
       <div class="flip-card">
           <div class="flip-card-inner">
               <div class="flip-card-front shadow">
                   <span class="card-icon fa-stack fa-lg fa-3x">
                       <i class="fa fa-square fa-stack-2x"></i>
                       <i class="fa fa-list fa-stack-1x fa-inverse"></i>
                   </span>
                   <h4 class="card-h4">Teljeskörű nyilvántartás</h4> 
               </div>
               <div class="flip-card-back">
                   <h5>Adminisztrációs rendszer, amely talmazza mindazon adatokat, amelyeket egy iskolának tárolnia kell alkalmazottairól, osztályairól, diákjairól.</h5>
               </div>
           </div>
       </div>
       <div class="flip-card">
           <div class="flip-card-inner">
               <div class="flip-card-front shadow">
                   <span class="card-icon fa-stack fa-lg fa-3x">
                       <i class="fa fa-square fa-stack-2x"></i>
                       <i class="fa fa-book fa-stack-1x fa-inverse"></i>
                   </span>
                   <h4 class="card-h4">Elektronikus <br> napló</h4> 
               </div>
               <div class="flip-card-back">
                   <h5>Az elektronikus ellenőrző a szülőknek és tanulóknak nyújt segítséget a tanulmányok alatti naprakész információhoz jutásban.</h5>
               </div>
           </div>
       </div>
       <div class="flip-card">
           <div class="flip-card-inner">
               <div class="flip-card-front shadow">
                   <span class="card-icon fa-stack fa-lg fa-3x">
                       <i class="fa fa-square fa-stack-2x"></i>
                       <i class="fa fa-cloud fa-stack-1x fa-inverse"></i>
                   </span>
                   <h4 class="card-h4">Felhő alapú <br>szoftver</h4>
               </div>
               <div class="flip-card-back">
                   <h5>Felhő alapú online szoftver, melyet nem szükséges telepíteni és a webes alkalmazásnak köszönhetően bárhol, bármikor elérhető.</h5>
               </div>
           </div>
        </div>
        <div class="flip-card">
           <div class="flip-card-inner shadow">
               <div class="flip-card-front">
                   <span class="card-icon fa-stack fa-lg fa-3x">
                       <i class="fa fa-square fa-stack-2x"></i>
                       <i class="fa fa-hourglass-half fa-stack-1x fa-inverse"></i>
                   </span>
                   <h4 class="card-h4">Átlátható <br>működés</h4> 
               </div>
               <div class="flip-card-back">
                   <h5>A gyors és egyszerű használatnak köszönhetően időt és engergát spórolhat a szoftver használatával.</h5>
               </div>
           </div>
        </div>
    </div>
</div>

<div class="home2"></div>
<div class="home3"></div>
<?php 

for ($i=0; $i < 10; $i++) { 
    echo '<div style="height:200px;">asdasd</div>';
}

include('pub-site-bottom.php');  
?>