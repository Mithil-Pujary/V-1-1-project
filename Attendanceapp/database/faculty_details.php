<?php
$path=$_SERVER['DOCUMENT_ROOT'];
require_once $path."/attendanceapp/database/database.php";
class faculty_Details
{
    public function verifyuser($dbobj,$un,$pw)
    {
        $rv=["fac_id"=>-1,"status"=>"ERROR"];
        $c="select fac_id,password from Faculty_Details where username:un";
        $s=$dbobj->conn->prepare($c);
        try{
            $s->execute([":un"=>$un]);
            if($s->rowCount()>0)
            {
                $result=$s->fetchAll(PDO::FETCH_ASSOC)[0];
                if($result['password']==$pw)
                {
                    //all OK
                    $rv=["fac_id"=>$result['fac_id'],"status"=>"ALL OK"];
                }
                else{
                    $rv=["fac_id"=>$result['fac_id'],"status"=> "WRONG PASSOWRD"];
                }
            }
            else{
                $rv=["fac_id"=>-1,"status"=> "USERNAME NOT EXISTS"];
            }
        }
        catch(PDOException $e){

        }
        return $rv;
    }
}
?>