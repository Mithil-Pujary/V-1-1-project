<?php
$path=$_SERVER['DOCUMENT_ROOT'];
require_once $path."/attendanceapp/database/database.php";
require_once $path."/attendanceapp/database/facultydetails.php";
$action=$_REQUEST["action"];

if(!empty($action))
{
    if($action=="verifyuser")
    {
        //retrieve what was sent
        $un=$_POST["username"];
        $pw=$_POST["password"];

        $dbobj=new Database();

        $fdo=new faculty_Details();																		

        $rv=$fdo->verifyuser($dbobj,$un,$pw);

        if($rv['status']=="ALL OK")
        {
            session_start();
            $_SESSION['current_user']=$rv['id'];
        }
        for($i= 0;$i<100000;$i++){
            for($j= 0;$j< 1000;$j++){

            }
        }
            echo json_encode($rv);
        
    }
}
?>