<?php  
$path=$_SERVER['DOCUMENT_ROOT'];
require_once $path."/attendanceapp/database/database.php";
require_once $path."/attendanceapp/database/sessiondetails.php";
require_once $path."/attendanceapp/database/facultydetails.php";
require_once $path."/attendanceapp/database/courseRegisterationDetails.php";
//courseRegisterationDetails.php
if(isset($_REQUEST['action']))
{
    $action=$_REQUEST['action'];
    if($action=="getSession")
    {
        $dbobj=new Database();
        $sobj=new SessionDetails();
        $rv=$sobj->getSession($dbobj);
        //$rv=["2024 WINTER","2025 SUMMER"];
        echo json_encode($rv);
    }
    // data: {facid:facid,sessionid:sessionid,action:"getFacultyCourses"},
    if($action=="getFacultyCourses")
    {
        $facid=$_POST['facid'];
        $sessionid=$_POST['sessionid'];
        $dbobj=new Database();
        $fo=new faculty_Details();
        $rv=$fo->getCoursesInASession($dbobj, $sessionid,$facid);
        //$rv=[];
        echo json_encode($rv);
    }
    //data: {sessionid:sessionid,classid:classid,
    //action:"fetchStudentList"},
    if($action=="getStudentList")
    {
        $classid=$_POST['classid'];
        $sessionid=$_POST['sessionid'];
        $dbobj=new Database();
        $crgo=new CourseRegisterationDetails();
        $rv=$crgo->getResgisteredCourses($dbobj,$sessionid,$classid);
        echo json_encode($rv);
    }
} 
?>
