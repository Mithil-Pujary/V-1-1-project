<?php
$path=$_SERVER['DOCUMENT_ROOT'];
require_once $path."/attendancapp/database/database.php";
class Sessiondetails
{
    public function getSessions($dbobj)
    {
        $rv=[];
        $c="select * from Session_Details";
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