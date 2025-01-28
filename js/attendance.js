/*
    $.ajax({
        url: "",
        type: "",
        dataType: "",
        data: { },
        
        beforeSend: function() {
        },
        
        success: function(rv) {
        },
        
        error: function() {
        }
    });
*/
function getsessionHTML(rv){
    let x=``;
    x =`<option value=-1>SELECT ONE</option>`;
    let i=0;
    for(i=0;i<rv.length;i++)
    {
        let cs=rv[i];
        x=x+`<option value=${cs['id']}>${cs['year']+" "+cs['term']}</option>`;
    }
    return x;
}

function loadSessions(){
    $.ajax({
        url: "ajaxhandler/attendanceAjax.php",
        type: "POST",
        dataType: "json",
        data: {action:"getSessions"},
        
        beforeSend: function(e) {
            alert("Loading");
        },
        
        success: function(rv) {
            //alert(JSON.stringify(rv));
            let x=getsessionHTML(rv);
            $("#ddlclass").html(x);
        },
        error: function(e) {
            alert("OOPS!!!!");
        }
    });
}

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
    loadSessions();
    $(document).on("change","#ddlclass",function(e)
    {
        let si=$("#ddlclass").val();
        if(si!=-1)
        {
            alert(si);
        }
    });
});