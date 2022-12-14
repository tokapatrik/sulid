$('.cards').hover(
    function(){
        $(this).addClass("cards-active");
        $(this).siblings().removeClass("cards-active");
    }
)

$('#loginModalClose').on("click", function() {
  $('#searchbar').val('');
  $('#loginModalResults').css( "text-align", "center" );
  $('#loginModalResults').html('');
});

$('#loginModalKereses').on("click", function() {
  $('#loginModalResults').css( "text-align", "center" );
  $('#loginModalResults').html('<div class="lds-ring"><div></div><div></div><div></div><div></div></div>');
  $('#loginModal').modal('handleUpdate');
  $.ajax({
    type: "post",
    url: "/ajax/ajax-login-kereses.php", 
    data: $("#loginSearchForm").serialize(),
    dataType: "json",
    success: function(retArray){
      if(retArray.retCode==5)
      {
        $('#loginModalResults').css( "text-align", "left" );
        $('#loginModalResults').html(retArray.retData);
        $('#loginModal').modal('handleUpdate');
      }
      if(retArray.retCode==6)
      {
        $('#loginModalResults').css( "text-align", "center" );
        $('#loginModalResults').html(retArray.retData);
        $('#loginModal').modal('handleUpdate');
      }
      if(retArray.retCode==9)
      {
        $('#loginModalResults').css( "text-align", "left" );
        $('#loginModalResults').html(retArray.retMsg);
        $('#loginModal').modal('handleUpdate');
      }
    }
  });
});

$('loginKeresesCard').on("click", function() {
  console.log("asd");
  $('loginKeresesCard').addClass( "loginKeresesCardSelected" );
});

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
  $("#intezmenyRovidNeve").keyup(function() {
    $("#attekintesIntezmenyRovidNeve").val($('#intezmenyRovidNeve').val());
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
        $("#intezmenyRovidNeve").val().length>0  &&
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
            if( $("#intezmenyRovidNeve").val().length == 0){
              $('#intezmenyRovidNeve').effect("pulsate", {times:1}, 500);
              $( "label[for='intezmenyRovidNeve']" ).effect("pulsate", {times:1}, 500);
              $( "label[for='intezmenyRovidNeve']" ).addClass("text-danger");
              setTimeout(function() {$( "label[for='intezmenyRovidNeve']" ).removeClass("text-danger");}, 2000);
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
        title: '</b>V??gleges??ti a regisztr??ci??t?</b>',
        content: 'A regisztr??ci?? r??gz??t??s??hez kattintson a <b>V??gleges??t??s</b> gombra',
        typeAnimated: true,
        buttons:
        {
          aktival:
          {
            text: "V??gleges??t??s",
            btnClass: "btn-primary",
            action: function()
            { 
              $.ajax({
                type: "post",
                url: "/ajax/ajax-regisztracio.php", 
                data: $("#regisztracio-form").serialize(),
                dataType: "json",
                success: function(retArray){
                  if(retArray.retCode==5)
                  {
                    $('#pageNumber').val("99");
                    $("#regisztracio-form").submit();
                  }
                  else
                  {
                    $.confirm({
                      title: '<b>Hib??s adat!</b>',
                      content: retArray.retMsg,
                      type: 'red',
                      typeAnimated: true,
                      buttons: {
                          Bezar: {
                              text: 'Bez??r',
                              action: function(){
                              }
                          }
                      }
                    });
                  }
                }
              });
            }
          },
          cancel:
          {
            text: "M??gsem",
            btnClass: "btn-light",
            action: function(){ }
          },
        }
      })
  });

  