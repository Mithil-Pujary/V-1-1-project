<?php
session_start();
    if(isset($_SESSION["current_user"]))
        {
          $facid=$_SESSION["current_user"];
        }
    else{
        header("location:"."/attendanceapp/login.php");
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/attendance.css">
    <title>Document</title>
</head>
<body>
    <!--<p>Hello</p>
    <button id="btnlogout">LOGOUT</button>-->

    <div class="page">
        <div class="header-area">
            <div class="logo-area"><h2 class="logo">ATTENDANCE APP</h2></div>
            <div class="logout-area"><button class="btnlogout" id="btnlogout">LOGOUT</button></div>
        </div>
        <div class="session-area">
            <div class="label-area"><label>SESSION</label></div>
            <div class="dropdown-area">
                <select class="ddlclass" id="ddlclass">
                    <!--<option value="">SELECT ONE</option>
                    <option value="">2023 AUTUMN</option>
                    <option value="">2023 SPRING</option>-->
                </select>
            </div>
        </div>
        <div class="classlist-area" id="classlistarea">
            <!--<div class="classcard">CS101</div>
            <div class="classcard">CS101</div>
            <div class="classcard">CS101</div>
            <div class="classcard">CS101</div>
            <div class="classcard">CS101</div>-->
        </div>
        <div class="classdetails-area" id="classdetailsarea">
            <!--<div class="classdetails">
                <div class="code-area">CS101</div>
                <div class="title-area">INTRODUCTION TO SCIENTIFIC COMPUTING</div>
                <div class="ondate-area">
                    <input type="date">
                </div>
            </div>-->
        </div>
        
        <div class="studentlist-area">
            <div class="studentlist"><label>STUDENT LIST</label></div>
            <div class="studentdetails">
                <div class="slno-area">001</div>
                <div class="rollno-area">202302100410010</div>
                <div class="name-area">student 1</div>
                <div class="checkbox-area">
                    <input type="checkbox">
                </div>
            </div>
            <div class="studentdetails">
                <div class="slno-area">001</div>
                <div class="rollno-area">202302100410010</div>
                <div class="name-area">student 1</div>
                <div class="checkbox-area">
                    <input type="checkbox">
                </div>
            </div>            
            <div class="studentdetails">
                <div class="slno-area">001</div>
                <div class="rollno-area">202302100410010</div>
                <div class="name-area">student 1</div>
                <div class="checkbox-area">
                    <input type="checkbox">
                </div>
            </div>
            <div class="studentdetails">
                <div class="slno-area">001</div>
                <div class="rollno-area">202302100410010</div>
                <div class="name-area">student 1</div>
                <div class="checkbox-area">
                    <input type="checkbox">
                </div>
            </div>
            <div class="studentdetails">
                <div class="slno-area">001</div>
                <div class="rollno-area">202302100410010</div>
                <div class="name-area">student 1</div>
                <div class="checkbox-area">
                    <input type="checkbox">
                </div>
            </div>
            <div class="studentdetails">
                <div class="slno-area">001</div>
                <div class="rollno-area">202302100410010</div>
                <div class="name-area">student 1</div>
                <div class="checkbox-area">
                    <input type="checkbox">
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="hiddenFacId" value=<?php echo($facid) ?>>
    <script src="js/jquery.js"></script>
    <script src="js/attendance.js"></script>
</body>
</html>