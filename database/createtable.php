<?php
    $path=$_SERVER['DOCUMENT_ROOT'];
    require_once $path."/attendanceapp/database/database.php";
    $dbobj = new Database();
    function cleartable($dbobj,$tablename) 
    {
        $c="Delete from :tablename";
        $s=$dbobj->conn->prepare($c);
        try{
            $s->execute([":tablename"=>$tablename]);
        }
        catch(PDOException $e){
        }
    }

    //TABLE FOR STUDENT
    $x="create table Student_Details
    (
        std_id int auto_increment primary key,
        std_enrollment varchar(50) unique,
        std_name varchar(50)
    )";
    $s=$dbobj->conn->prepare($x);
    try{
        $s->execute();
        echo("<br> Table is Created");
    }
    catch(PDOException $e) 
        {
            //echo "<br>Table not Created". $e->getMessage();
        }
    

    //TABLE FOR FACULTY
    $x="create table Faculty_Details
    (
        fac_id int auto_increment primary key,
        username varchar(50) unique,
        password varchar(50),
        fac_name varchar(50)
    )";
    $s=$dbobj->conn->prepare($x);
    try{
        $s->execute();
        echo("<br> Table is Created");
    }
    catch(PDOException $e) 
        {
            //echo "<br>Table not Created". $e->getMessage();
        }


    //TABLE FOR SESSION
    $x="create table session_details
    (
        id int auto_increment primary key,
        year int unique,
        term varchar(50) unique
    )";
    $s=$dbobj->conn->prepare($x);
    try{
        $s->execute();
        echo("<br> Table is Created");
    }
    catch(PDOException $e) 
        {
           //echo "<br>Table not Created". $e->getMessage();
        }

    
    //TABLE FOR COURSE
    $x="create table Course_Details
    (
        id int auto_increment primary key,
        code varchar(50) unique,
        title varchar(50),
        credit int
    )";
    $s=$dbobj->conn->prepare($x);
    try{
        $s->execute();
        echo("<br> Table is Created");
    }
    catch(PDOException $e) 
        {
            //echo "<br>Table not Created". $e->getMessage();
        }
    

    //TABLE FOR COURSE REGISTRATION
    $x="create table Course_Registration
    (
        student_id int,
        course_id int,
        session_id int,
        primary key(student_id,course_id,session_id)
    )";
    $s=$dbobj->conn->prepare($x);
    try{
        $s->execute();
        echo("<br> Table is Created");
    }
    catch(PDOException $e) 
        {
            //echo "<br>Table not Created". $e->getMessage();
        }


    //TABLE FOR COURSE ALLOTMENT
    $x="create table Course_allotment
    (
        faculty_id int,
        course_id int,
        session_id int,
        primary key(faculty_id,course_id,session_id)
    )";
    $s=$dbobj->conn->prepare($x);
    try{
        $s->execute();
        echo("<br> Table is Created");
    }
    catch(PDOException $e) 
        {
            //echo "<br>Table not Created". $e->getMessage();
        }


    //TABLE FOR ATTENDANCE SHEET
    $x="create table Attendance_sheet
    (
        faculty_id int,
        course_id int,
        session_id int,
        student_id int,
        on_date date,
        status varchar (50),
        primary key(faculty_id,course_id,session_id,student_id,on_date)
    )";

    $s=$dbobj->conn->prepare($x);
    try{
        $s->execute();
        echo("<br> Table is Created");
    }
    catch(PDOException $e) 
        {
            //echo "<br>Table not Created". $e->getMessage();
        }


    //VALUES FOR STUDENT TABLE
    $c="insert into Student_Details
    (std_id,std_enrollment,std_name)
    values
    (1, 'ENR2024001', 'John Doe'),
    (2, 'ENR2024002', 'Jane Smith'),
    (3, 'ENR2024003', 'Ali Khan'),
    (4, 'ENR2024004', 'Priya Sharma'),
    (5, 'ENR2024005', 'Chen Wei'),
    (6, 'ENR2024006', 'Maria Garcia'),
    (7, 'ENR2024007', 'Ahmed Hassan'),
    (8, 'ENR2024008', 'Emily Davis'),
    (9, 'ENR2024009', 'Raj Patel'),
    (10, 'ENR2024010', 'Sofia Lopez')";

    $s=$dbobj->conn->prepare($c);
    try{
        $s->execute();
    }
    catch(PDOException $e) 
        {
            echo "<br>ERROR!! Already Exists". $e->getMessage();
        }


    //VALUES FOR FACULTY TABLE
    $c="insert Faculty_Details
    (fac_id,username,password,fac_name)
    values
    (1, 'mit', '123', 'Mithil'),
    (2, 'nev', '123', 'Nevil'),
    (3, 'div', '123', 'Divya'),
    (4, 'nina_kapoor', '123', 'Nina Kapoor'),
    (5, 'wei_li', '123', 'Wei Li'),
    (6, 'carla_santos', '123', 'Carla Santos'),
    (7, 'omar_fahad', '123', 'Omar Fahad'),
    (8, 'laura_martin', '123', 'Laura Martin'),
    (9, 'krishna_iyer', '123', 'Krishna Iyer'),
    (10, 'linda_white', '123', 'Linda White')";

    $s=$dbobj->conn->prepare($c);
    try{
        $s->execute();
    }
    catch(PDOException $e) 
        {
            echo "<br>ERROR!! Already Exists". $e->getMessage();
        }


    //VALUES FOR SESSION TABLE
    $c="insert session_details
    (id,year,term)
    values
    (1, 2025,'SUMMER'),
    (2, 2024,'WINTER')";

    $s=$dbobj->conn->prepare($c);
    try{
        $s->execute();
    }
    catch(PDOException $e) 
        {
            echo "<br>ERROR!! Already Exists". $e->getMessage();
        }
        //bro you :sob:

    //VALUES FOR COURSE_DETAIL TABLE
    $c="insert Course_Details
    (id,code,title,credit)
    values
    (1, 'CS101', 'Introduction to Computer Science', 3),
    (2, 'MATH202', 'Calculus II', 4),
    (3, 'ENG305', 'Advanced English Literature', 3),
    (4, 'PHY210', 'Physics for Engineers', 4),
    (5, 'HIST110', 'World History', 3)";

    $s=$dbobj->conn->prepare($c);
    try{
        $s->execute();
    }
    catch(PDOException $e) 
        {
            echo "<br>ERROR!! Already Exists". $e->getMessage();
        }
    

    //VALUES FOR COURSE_REGISTRATION TABLE BY RANDOM
    cleartable($dbobj,"Course_Registration");
    $c= "insert into Course_Registration
    (student_id,course_id,session_id )
    values
    (:sid,:cid,:ses_id)";

    $s=$dbobj->conn->prepare($c);
    for($i= 1;$i< 10;$i++)
    {
        for($j= 0;$j< 3;$j++)
        {
            //FOR SESSION 1 COURSE_REGISTRATION
            $cid=rand(1,5);
            try{
                $s->execute([":sid"=>$i,":cid"=>$cid,":ses_id"=>1]);
            }
            catch(PDOException $e){
            }

            //FOR SESSION 2 COURSE_REGISTRATION
            $cid=rand(1,5);
            try{
                $s->execute([":sid"=>$i,":cid"=>$cid,":ses_id"=>2]);
            }
            catch(PDOException $e){
            }
        }
    }


    //VALUES FOR COURSE_ALLOTMENT TABLE BY RANDOM
    cleartable($dbobj,"Course_allotment");
    $c= "insert into Course_allotment
    (faculty_id,course_id,session_id)
    values
    (:fid,:cid,:ses_id)";

    $s=$dbobj->conn->prepare($c);
    for($i= 1;$i<10;$i++)
    {
        for($j= 0;$j< 2;$j++)
        {
            //FOR SESSION 1 COURSE_ALLOTMENT
            $cid=rand(1,5);
            try{
                $s->execute([":fid"=>$i,":cid"=>$cid,":ses_id"=>1]);
            }
            catch(PDOException $e){
            }

            //FOR SESSION 2 COURSE_ALLOTMENT
            $cid=rand(1,5);
            try{
                $s->execute([":fid"=>$i,":cid"=>$cid,":ses_id"=>2]);
            }
            catch(PDOException $e){
            }
        }
    }
?>
