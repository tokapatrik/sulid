$('.cards').hover(
    function(){
        $(this).addClass("cards-active");
        $(this).siblings().removeClass("cards-active");
    }
)

  $("#vezetekNev").keyup(function() {
    $("#attekintesVezetekNev").val($('#vezetekNev').val());
  });
  
  $("#keresztNev").keyup(function() {
    $("#attekintesKeresztNev").val($('#keresztNev').val());
  });

  $("#emailCim").keyup(function() {
    $("#attekintesEmailCim").val($('#emailCim').val());
  });

  $("#jelszo1").keyup(function() {
    $("#attekintesJelszo1").val($('#jelszo1').val());
  });

  $("#jelszo2").keyup(function() {
    $("#attekintesJelszo2").val($('#jelszo2').val());
  });

  $("#intezmenyNeve").keyup(function() {
    $("#attekintesIntezmenyNeve").val($('#intezmenyNeve').val());
  });
  
  $("#intezmenyOm").keyup(function() {
    $("#attekintesIntezmenyOm").val($('#intezmenyOm').val());
  });

  $("#intezmenyIrsz").keyup(function() {
    $("#attekintesIntezmenyIrsz").val($('#intezmenyIrsz').val());
  });

  $("#intezmenyVaros").keyup(function() {
    $("#attekintesIntezmenyVaros").val($('#intezmenyVaros').val());
  });

  $("#intezmenyUtca").keyup(function() {
    $("#attekintesIntezmenyUtca").val($('#intezmenyUtca').val());
  });


  $('#regisztracio-body1 > #next').on("click", function() {
    if($("#checkAszf").is(":checked") && $("#checkAdat").is(":checked"))
    {
        $(".next").addClass("ok");
    }
    else
    {
        $(".next").removeClass("ok");
        if($("#checkAszf").is(":checked")==false){
            $('#checkAszf').effect("pulsate", {times:1}, 500);
            $( "label[for='checkAszf']" ).effect("pulsate", {times:1}, 500);
            $( "label[for='checkAszf']" ).addClass("text-danger");
            setTimeout(function() {$( "label[for='checkAszf']" ).removeClass("text-danger");}, 2000);
        }
        if($("#checkAdat").is(":checked")==false){
            $('#checkAdat').effect("pulsate", {times:1}, 500);
            $( "label[for='checkAdat']" ).effect("pulsate", {times:1}, 500);
            $( "label[for='checkAdat']" ).addClass("text-danger");
            setTimeout(function() {$( "label[for='checkAdat']" ).removeClass("text-danger");}, 2000);
        }
    }
  });

  $('#regisztracio-body2 > #next').on("click", function() {
    if(
        $("#vezetekNev").val().length>0  &&
        $("#keresztNev").val().length>0  &&
        $("#emailCim").val().length>0    &&
        $("#jelszo1").val().length>0 &&
        $("#jelszo2").val().length>0)
        {
            $(".next").addClass("ok");
        }
        else
        {
            $(".next").removeClass("ok");

            if( $("#vezetekNev").val().length == 0){
                console.log("asd");
                $('#vezetekNev').effect("pulsate", {times:1}, 500);
                $( "label[for='vezetekNev']" ).effect("pulsate", {times:1}, 500);
                $( "label[for='vezetekNev']" ).addClass("text-danger");
                setTimeout(function() {$( "label[for='vezetekNev']" ).removeClass("text-danger");}, 2000);
            }
            if($("#keresztNev").val().length==0){
                console.log("asd");
                $('#keresztNev').effect("pulsate", {times:1}, 500);
                $( "label[for='keresztNev']" ).effect("pulsate", {times:1}, 500);
                $( "label[for='keresztNev']" ).addClass("text-danger");
                setTimeout(function() {$( "label[for='keresztNev']" ).removeClass("text-danger");}, 2000);
            }
            if($("#emailCim").val().length==0){
                console.log("asd");
                $('#emailCim').effect("pulsate", {times:1}, 500);
                $( "label[for='emailCim']" ).effect("pulsate", {times:1}, 500);
                $( "label[for='emailCim']" ).addClass("text-danger");
                setTimeout(function() {$( "label[for='emailCim']" ).removeClass("text-danger");}, 2000);
            }
            if($("#jelszo1").val().length==0){
                console.log("asd");
                $('#jelszo1').effect("pulsate", {times:1}, 500);
                $( "label[for='jelszo1']" ).effect("pulsate", {times:1}, 500);
                $( "label[for='jelszo1']" ).addClass("text-danger");
                setTimeout(function() {$( "label[for='jelszo1']" ).removeClass("text-danger");}, 2000);
            }
            if($("#jelszo2").val().length==0){
                console.log("asd");
                $('#jelszo2').effect("pulsate", {times:1}, 500);
                $( "label[for='jelszo2']" ).effect("pulsate", {times:1}, 500);
                $( "label[for='jelszo2']" ).addClass("text-danger");
                setTimeout(function() {$( "label[for='jelszo2']" ).removeClass("text-danger");}, 2000);
            }
        }
  });

  $('#regisztracio-body3 > #next').on("click", function() {
    if(
        $("#intezmenyNeve").val().length>0  &&
        $("#intezmenyOm").val().length>0  &&
        $("#intezmenyIrsz").val().length>0    &&
        $("#intezmenyVaros").val().length>0 &&
        $("#intezmenyUtca").val().length>0)
        {
            $(".next").addClass("ok");
        }
        else
        {
            $(".next").removeClass("ok");
            if( $("#intezmenyNeve").val().length == 0){
                $('#intezmenyNeve').effect("pulsate", {times:1}, 500);
                $( "label[for='intezmenyNeve']" ).effect("pulsate", {times:1}, 500);
                $( "label[for='intezmenyNeve']" ).addClass("text-danger");
                setTimeout(function() {$( "label[for='intezmenyNeve']" ).removeClass("text-danger");}, 2000);
            }
            if($("#intezmenyOm").val().length==0){
                $('#intezmenyOm').effect("pulsate", {times:1}, 500);
                $( "label[for='intezmenyOm']" ).effect("pulsate", {times:1}, 500);
                $( "label[for='intezmenyOm']" ).addClass("text-danger");
                setTimeout(function() {$( "label[for='intezmenyOm']" ).removeClass("text-danger");}, 2000);
            }
            if($("#intezmenyIrsz").val().length==0){
                $('#intezmenyIrsz').effect("pulsate", {times:1}, 500);
                $( "label[for='intezmenyIrsz']" ).effect("pulsate", {times:1}, 500);
                $( "label[for='intezmenyIrsz']" ).addClass("text-danger");
                setTimeout(function() {$( "label[for='intezmenyIrsz']" ).removeClass("text-danger");}, 2000);
            }
            if($("#intezmenyVaros").val().length==0){
                $('#intezmenyVaros').effect("pulsate", {times:1}, 500);
                $( "label[for='intezmenyVaros']" ).effect("pulsate", {times:1}, 500);
                $( "label[for='intezmenyVaros']" ).addClass("text-danger");
                setTimeout(function() {$( "label[for='intezmenyVaros']" ).removeClass("text-danger");}, 2000);
            }
            if($("#intezmenyUtca").val().length==0){
                $('#intezmenyUtca').effect("pulsate", {times:1}, 500);
                $( "label[for='intezmenyUtca']" ).effect("pulsate", {times:1}, 500);
                $( "label[for='intezmenyUtca']" ).addClass("text-danger");
                setTimeout(function() {$( "label[for='intezmenyUtca']" ).removeClass("text-danger");}, 2000);
            }
        }
  });

  $('#regisztracio-body4 > #next').on("click", function() {
    $.confirm(
      {
        title: '</b>Véglegesíti a regisztrációt?</b>',
        content: 'A regisztráció rögzítéséhez kattintson a <b>Véglegesítés</b> gombra',
        buttons:
        {
          aktival:
          {
            text: "Véglegesítés",
            btnClass: "btn-primary",
            action: function()
            { 
              $.ajax({
                type: "post",
                url: "/ajax/ajax-regisztracio.php", 
                data: $("#regisztracio-form").serialize(),
                dataType: "json",
                success: function(retArray){
                  console.log(retArray.retData);
                  alert(retArray.retData);
                }
              });
            }
          },
          cancel:
          {
            text: "Mégsem",
            btnClass: "btn-light",
            action: function(){ }
          },
        }
      })
  });

  