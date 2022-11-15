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