$(function(e)
{
    $(document).on("click","#btnlogout",function(ee)
    {
        $.ajax(
            {
            url: "ajaxhandler/logoutAjax.php",
            type: "POST",
            dataType: "json",
            data: { id:1 },
            
            beforeSend: function(e) {
                //alert("About to send request...");
            },
            
            success: function(e) {
                document.location.replace("login.php");
            },
            
            error: function() {
                alert("OOPS EVERYTHING WENT WRONG");
            }
        });
    });
});