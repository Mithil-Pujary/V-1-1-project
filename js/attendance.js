/*
$.ajax({
        url: "ajaxhandler/attendanceAJAX.php",
        type: "POST",
        dataType: "json",
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
        url: "ajaxhandler/attendanceAJAX.php",
        type: "POST",
        dataType: "json",
        data: {action:"getSession"},
        
        beforeSend: function(e) {
            //alert("Loading");
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

function getCourseCardHTML(classlist){
    let x=``;
    x=``;
    let i=0;
    for(i=0;i<classlist.length;i++){
        let cc=classlist[i];
        x=x+`<div class="classcard" data-classobject='${JSON.stringify(cc)}'>${cc['code']}</div>`;
    }
    return x;
}

function fetchFacultyCourses(facid,sessionid){
    $.ajax({
        url: "ajaxhandler/attendanceAJAX.php",
        type: "POST",
        dataType: "json",
        data: {facid:facid,sessionid:sessionid,action:"getFacultyCourses"},
        
        beforeSend: function() {
            
        },
        
        success: function(rv) {
            //alert(JSON.stringify(rv));
            let x=getCourseCardHTML(rv);
            $("#classlistarea").html(x);
        },
        
        error: function() {
        }
    });
}
function getClassdetailsAreaHTML(classobject){
    let dbobj=new Date();
    let ondate=`2023-01-01`;
    let x=`<div class="classdetails">
                <div class="code-area">${classobject['code']}</div>
                <div class="title-area">${classobject['title']}</div>
                <div class="ondate-area">
                    <input type="date" value='$(ondate)'>
                </div>
            </div>`;
    return x;
}

function getStudentListHTML(studentList) {
    let x = `
        <div class="studentlist">
            <label>STUDENT LIST</label>
        </div>`;

    for (let i = 0; i < studentList.length; i++) {
        let cs = studentList[i];
        x =x+ `<div class="studentdetails">
            <div class="slno-area">${i + 1}</div>
            <div class="rollno-area">${cs['std_enrollment']}</div>
            <div class="name-area">${cs['std_name']}</div>
            <div class="checkbox-area">
                <input type="checkbox">
            </div>
        </div>`;
    }

    return x;
}

function fetchStudentList(sessionid,classid){
    $.ajax({
        url: "ajaxhandler/attendanceAJAX.php",
        type: "POST",
        dataType: "json",
        data: {sessionid:sessionid,classid:classid,action:"getStudentList"},
        
        beforeSend: function() {
        },
        
        success: function(rv) {
            //alert(JSON.stringify(rv));
            let x=getStudentListHTML(rv);
            $("#studentlistarea").html(x);
        },
        
        error: function() {
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
            //alert(si);
            let sessionid=si;
            let facid=$("#hiddenFacId").val();
            fetchFacultyCourses(facid,sessionid);
        }
    });
    $(document).on("click",".classcard",function(e){
        let classobject=$(this).data('classobject');
        //alert(JSON.stringify(s));
        let x=getClassdetailsAreaHTML(classobject);
        $("#classdetailsarea").html(x);
        let sessionid=$("#ddlclass").val();
        let classid=classobject['id'];
        if(sessionid!=-1){
            fetchStudentList(sessionid,classid);
        }
    });
});