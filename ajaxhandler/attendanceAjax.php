<?php  
$path=$_SERVER['DOCUMENT_ROOT'];
require_once $path."/attendancapp/database/database.php";
require_once $path."/attendancapp/database/sessiondetails.php";
if(isset($_REQUEST['action']))
{
    $action = $_REQUEST['action'];
    if($action =='getSession')
    {
        $dbobj=new Database();
        $sobj=new Sessiondetails();
        $rv=$sobj->getSessions($dbobj);
        //$rv=["2024 WINTER","2025 SUMMER"];
        echo json_encode($rv);
    }
}
?>