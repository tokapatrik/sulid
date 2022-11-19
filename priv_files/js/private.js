  $(".menubarButtonMain, .menubarButtonSub").mouseenter(function () {
    $(this).css("color", "#fff");
    $(this).css("background-color", "#0000004d");
    $(this).children('a').css("color", "#fff");
  });

  $(".menubarButtonMain, .menubarButtonSub").mouseleave(function () {
    $(this).css("color", "#6c6c6c");
    $(this).css("background", "transparent");
    $(this).children('a').css("color", "#6c6c6c");
  });

  $("#mainIskola").click(function(){
    closeAll("#subIskola");
    $("#subIskola").slideToggle(400);
  });
  $("#mainTanarok").click(function(){
    closeAll("#subTanarok");
    $("#subTanarok").slideToggle(400);
  });
  $("#mainTanulok").click(function(){
    closeAll("#subTanulok");
    $("#subTanulok").slideToggle(400);
  });
  $("#mainVaezetoseg").click(function(){
    closeAll("#subVaezetoseg");
    $("#subVaezetoseg").slideToggle(400);
  });

  function closeAll(objString)
  {
    if ($("#subIskola").is(":visible")) {
      if (objString!="#subIskola") {
        $("#subIskola").slideToggle(400);
      }
    }
    if ($("#subTanarok").is(":visible")) {
      if (objString!="#subTanarok") {
        $("#subTanarok").slideToggle(400);
      }
    }
    if ($("#subTanulok").is(":visible")) {
      if (objString!="#subTanulok") {
        $("#subTanulok").slideToggle(400);
      }
    }
    if ($("#subVaezetoseg").is(":visible")) {
      if (objString!="#subVaezetoseg") {
        $("#subVaezetoseg").slideToggle(400);
      }
    }
  }

  $("#editSzemelyesAdatok").on("click", function() {
    $("#szemelyesAdatokForm").addClass("border");
    $("#szemelyesAdatokForm").addClass("shadow");
    $(".szemelyesAdatok").hide();
    $(".szemelyesAdatokHidden").prop("type", "text");
    $("#szulido").prop("type", "date");
    $(".szemelyesButton").removeAttr("hidden");
  });

  $("#saveMegse").on("click", function() {
    $("#szemelyesAdatokForm").removeClass("border");
    $("#szemelyesAdatokForm").removeClass("shadow");
    $(".szemelyesAdatokHidden").prop("type", "hidden");
    $(".szemelyesAdatok").show();
    $(".szemelyesButton").prop('hidden', true);
  });

  $("#editintezmenyAdatok").on("click", function() {
    $("#intezmenyAdatokForm").addClass("border");
    $("#intezmenyAdatokForm").addClass("shadow");
    $(".intezmenyAdatok").hide();
    $(".intezmenyAdatokHidden").prop("type", "text");
    $("#szulido").prop("type", "date");
    $(".szemelyesButton").removeAttr("hidden");
  });

  $("#saveMegse").on("click", function() {
    $("#intezmenyAdatokForm").removeClass("border");
    $("#intezmenyAdatokForm").removeClass("shadow");
    $(".intezmenyAdatokHidden").prop("type", "hidden");
    $(".intezmenyAdatok").show();
    $(".szemelyesButton").prop('hidden', true);
  });

  $("#editintezmenyElerhetosegiAdatok").on("click", function() {
    $("#intezmenyElerhetosegiAdatokForm").addClass("border");
    $("#intezmenyElerhetosegiAdatokForm").addClass("shadow");
    $(".intezmenyElerhetosegiAdatok").hide();
    $(".intezmenyElerhetosegiAdatokHidden").prop("type", "text");
    $(".intezmenyElerhetosegiButton").removeAttr("hidden");
  });

  $("#intezmenyElerhetosegiSaveMegse").on("click", function() {
    $("#intezmenyElerhetosegiAdatokForm").removeClass("border");
    $("#intezmenyElerhetosegiAdatokForm").removeClass("shadow");
    $(".intezmenyElerhetosegiAdatokHidden").prop("type", "hidden");
    $(".intezmenyElerhetosegiAdatok").show();
    $(".intezmenyElerhetosegiButton").prop('hidden', true);
  });

  $("#editIntezmenyLeiras").on("click", function() {
    $("#intezmenyLeirasForm").addClass("border");
    $("#intezmenyLeirasForm").addClass("shadow");
    $("#intezmenyLeiras").removeAttr("disabled");
    $(".intezmenyLeirasButton").removeAttr("hidden");
  });

  $("#intezmenyLeirasSaveMegse").on("click", function() {
    $("#intezmenyLeirasForm").removeClass("border");
    $("#intezmenyLeirasForm").removeClass("shadow");
    $("#intezmenyLeiras").prop('disabled', true);
    $(".intezmenyLeirasButton").prop('hidden', true);
  });





  $('.listaCheckbox').ready(function() {
    if($('.listaChecked').length>0 && $('.listaSelectMenu').is(":hidden"))
      {
        $("#listaSelectCounter").html("Kijelölve: " + $('.listaChecked').length + " fő");
        $('.listaSelectMenu').show();
      }
  });

  $('.listaCheckbox').change(function() {
    if(!$(this).parents("tr").hasClass("listaChecked"))
    {
      $(this).parents("tr").addClass("listaChecked");
    }else{
      $(this).parents("tr").removeClass("listaChecked");
    }

    checkTanuloListaSelectMenu();
    saveKijeltekToSession($(this).attr("id"),$(this).is(":checked"));
});

$('#listaCheckboxAll').change(function() {
  if($("#listaCheckboxAll").is(':checked'))
  {
    $('tr').addClass("listaChecked");
    $('#listaHeader').removeClass("listaChecked");
    
    $('.listaCheckbox').prop('checked', true);
  }else{
    $('tr').removeClass("listaChecked");
    $('.listaCheckbox').prop('checked', false);
  }
  checkTanuloListaSelectMenu();
  $('.listaCheckbox').each(function(i, obj) {
    var value=false;
    if(obj.checked)
    {
      value=true;
    }
    saveKijeltekToSession(obj.getAttribute('id'),value);
  });
});

function checkTanuloListaSelectMenu()
{
  $("#listaSelectCounter").html("Kijelölve: " + $('.listaChecked').length + " fő");
  if($('.listaChecked').length>0){
    if($('.listaChecked').length==1 && $('.listaSelectMenu').is(":hidden"))
    {
      $('.listaSelectMenu').slideToggle(400);
    }
  }
  else{
    if($('.listaSelectMenu').is(":visible"))
    {
      $('.listaSelectMenu').slideToggle(400);
    }
  }
}
function saveKijeltekToSession(element, value)
{
  $.ajax({
    url: '/../priv_files/ajax/ajax-kijeloltek-session.php',
    data: {"checkbox":element,"value":value},
    type: 'post',
    success:function(asd){
      console.log(asd);
  }
 });
}

$(document).ready(function() {
  console.log("asd");
  $("#oldalOverflow").scrollTop();
});

$("#tovabbiAdatok").on("click", function() {
  $('#tovabbiAdatokDiv').slideToggle(400);
});