<?php
$path=$_SERVER['DOCUMENT_ROOT'];
require_once $path."/attendanceapp/database/database.php";
class CourseRegisterationDetails{
    public function getResgisteredCourses($dbobj,$sessionid,$courseid){
            $rv=[];
            $c="select sd.std_id,sd.std_enrollment,sd.std_name from student_details as sd,
            course_registration as crg
             where crg.student_id=std_sd.id and 
             crg.session_id=:sessionid and 
             crg.course_id=:courseid";
            $s=$dbobj->conn->prepare($c);
            try{
            $s->execute([":sessionid"=>$sessionid,":courseid"=>$courseid]);
            $rv=$s->fetchAll(PDO::FETCH_ASSOC);
            }
            catch(Exception $e){

            }
            return $rv;
    }
}
?>