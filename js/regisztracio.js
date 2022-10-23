const width = document.getElementById('regisztracio-box').clientWidth;
const takaro = document.getElementById('loading-page');
takaro.style.width = width +"px";

$(document).ready(function () 
{
    $("#startregisztracio").click(function() {

        $.ajax({
            type: "post",
            url: "/ajax/ajax-regisztracio.php", 
            data: $("#pageNumber-container").serialize(),
            dataType: "json",
            success: function(retObj){
                console.log(retObj);
                if (retObj.retCode == 5) {
                    $( ".regisztracio-box" ).html(retObj.retHtml);
                } else {
                    console.log("Ajax hiba");
                }
            }
        });
    });
})
