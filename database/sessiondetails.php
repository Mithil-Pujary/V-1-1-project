<?php
$path=$_SERVER['DOCUMENT_ROOT'];
require_once $path."/attendanceapp/database/database.php";
class SessionDetails
{
    public function getSession($dbobj)
    {
        $rv=[];
        $c="select * from session_details";
        $s=$dbobj->conn->prepare($c);  
        try{
            $s->execute();
            $rv = $s->fetchAll(PDO::FETCH_ASSOC);
        } 
        catch(Exception $e){

        }
        return $rv;
    }
}
?>  