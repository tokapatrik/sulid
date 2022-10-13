

$('.cards').hover(
    function(){
        $(this).addClass("cards-active");
        $(this).siblings().removeClass("cards-active");
    }
)
