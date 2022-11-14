  $(".menubarButton").mouseenter(function () {
    $(this).css("color", "#fff");
    $(this).css("background-color", "#0000004d");
    $(this).children('a').css("color", "#fff");
  });

  $(".menubarButton").mouseleave(function () {
    $(this).css("color", "#6c6c6c");
    $(this).css("background", "transparent");
    $(this).children('a').css("color", "#6c6c6c");
  });