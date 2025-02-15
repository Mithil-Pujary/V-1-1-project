<?php
$path=$_SERVER['DOCUMENT_ROOT'];
require_once $path."/attendanceapp/database/database.php";
class faculty_Details
{
    public function verifyuser($dbobj,$un,$pw)
    {
        $rv=["id"=>-1,"status"=>"ERROR"];
        $c="select fac_id,password from Faculty_Details where username = :un";
        $s=$dbobj->conn->prepare($c);
        try{
            $s->execute([":un"=>$un]);
            if($s->rowCount()>0)
            {
                $result=$s->fetchAll(PDO::FETCH_ASSOC)[0];
                if($result['password']==$pw)
                {
                    //all OK
                    $rv=["id"=>$result['fac_id'],"status"=>"ALL OK"];
                }
                else{												
                    $rv=["id"=>$result['fac_id'],"status"=> "WRONG PASSOWRD"];
                }
            }
            else{
                $rv=["id"=>-1,"status"=> "USERNAME NOT EXISTS"];
            }
        }
        catch(PDOException $e){

        }
        return $rv;
    }

    public function getCoursesInASession($dbobj,$sessionid,$facid){
        $rv=[];
        $c="select cd.id,cd.code,cd.title from
        course_allotment as ca,course_details as cd 
        where ca.course_id=cd.id and faculty_id=:facid 
        and session_id=:sessionid;";
        $s=$dbobj->conn->prepare($c);
        try{
            $s->execute([":facid"=>$facid,":sessionid"=>$sessionid]);
            $rv=$s->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){

        }
        return $rv;
    }
}//bro you :sob:
?>