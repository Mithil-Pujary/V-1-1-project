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