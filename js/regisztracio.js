$(document).ready(function () 
{
    $("#next").click(function() {
        console.log("send...");
        $.ajax({
            type: "post",
            url: "/ajax/ajax-regisztracio.php", 
            data: $("#regisztracio-form").serialize(),
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
