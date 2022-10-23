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
