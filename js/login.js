function trylogin()
{
    let un=$("#username").val();
    let pw=$("#password").val();
    if(un.trim()!=="" && pw.trim()!="")
    {
        $.ajax(
            {
                url:"ajaxhandler/loginAjax.php",
                type:"POST",
                dataType:"json",
                data:{username:un,password:pw,action:"verifyuser"},
                beforesend:function(){
                    //alert("About");
                },
                //rv is known as the return value 
                success:function(rv)
                {
                    //if the ajax call is successfull
                    //result will be in rv
                    //alert(JSON.stringify(rv));
                    if(rv['status']=="ALL OK")
                    {
                        document.location.replace("attendance.php");
                    }
                    else{
                        alert(rv['status']);
                    }
                },

                error:function(){
                    alert("OOPS EVERYTHING WENT WRONG");
                },
            });
    }
}
// do everything  only when the doument is loded
$(function(e){
    //capture the keyup event
    $(document).on("keyup","input",function(e){
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
});