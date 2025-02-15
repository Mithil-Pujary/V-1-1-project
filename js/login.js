function trylogin()
{
    let un=$("#username").val();
    let pw=$("#password").val();
    if(un.trim()!=="" && pw.trim()!="")
    {
        $.ajax({
            url: "ajaxhandler/loginAjax.php",
            type: "POST",
            dataType: "json",
            data: { username :un, password :pw, action: "verifyuser" },
            
            beforeSend: function() {
                //alert("About to send request...");
                $("#diverror").removeClass("applyerrordiv");
                $("#lockscreen").addClass("applylockscreen");
                
                //$("#errormessage").text("");
            },
            
            success: function(rv) {
                // rv is the return value
                $("#lockscreen").removeClass("applylockscreen");
                if (rv['status'] == "ALL OK") {
                    document.location.replace("attendance.php");
                } else {
                    //alert(rv['status']);
                    $("#diverror").addClass("applyerrordiv");
                    $("#errormessage").text(rv['status']);
                }
            },
            
            error: function() {
                console.error("Error:", error); // Log the error for debugging
                alert("OOPS EVERYTHING WENT WRONG");
            }
        });
        
    }
}
// do everything  only when the doument is loded
$(function(e){
    //capture the keyup event
    $(document).on("keyup","input",function(e){
        $("#diverror").removeClass("applyerrordiv");
        //$("#errormessage").text("");
        let un=$("#username").val();
        let pw=$("#password").val();
        if(un.trim()!=="" && pw.trim()!=="")
        {
            $("#btllogin").removeClass("inactivecolor");
            $("#btllogin").addClass("activecolor");
        }
        else{
            $("#btllogin").removeClass("activecolor");
            $("#btllogin").addClass("inactivecolor");
        }
    });
    $(document).on("click","#btllogin",function(e){
        trylogin();
    });
});function trylogin()
{
    let un=$("#username").val();
    let pw=$("#password").val();
    if(un.trim()!=="" && pw.trim()!="")
    {
        $.ajax({
            url: "ajaxhandler/loginAjax.php",
            type: "POST",
            dataType: "json",
            data: { username :un, password :pw, action: "verifyuser" },
            
            beforeSend: function() {
                //alert("About to send request...");
                $("#diverror").removeClass("applyerrordiv");
                $("#lockscreen").addClass("applylockscreen");
                
                //$("#errormessage").text("");
            },
            
            success: function(rv) {
                // rv is the return value
                $("#lockscreen").removeClass("applylockscreen");
                if (rv['status'] == "ALL OK") {
                    document.location.replace("attendance.php");
                } else {
                    //alert(rv['status']);
                    $("#diverror").addClass("applyerrordiv");
                    $("#errormessage").text(rv['status']);
                }
            },
            
            error: function() {
                console.error("Error:", error); // Log the error for debugging
                alert("OOPS EVERYTHING WENT WRONG");
            }
        });
        
    }
}
// do everything  only when the doument is loded
$(function(e){
    //capture the keyup event
    $(document).on("keyup","input",function(e){
        $("#diverror").removeClass("applyerrordiv");
        //$("#errormessage").text("");
        let un=$("#username").val();
        let pw=$("#password").val();
        if(un.trim()!=="" && pw.trim()!=="")
        {
            $("#btllogin").removeClass("inactivecolor");
            $("#btllogin").addClass("activecolor");
        }
        else{
            $("#btllogin").removeClass("activecolor");
            $("#btllogin").addClass("inactivecolor");
        }
    });
    $(document).on("click","#btllogin",function(e){
        trylogin();
    });
});