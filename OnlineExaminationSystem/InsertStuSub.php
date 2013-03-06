<?php
$subId = $_POST["SelSub"];
$stuId = $_POST["SelStu"];

include("ConnectDatabase.php");

mysql_query("INSERT INTO ExamStudentSubject(StudentSubjectId, SubjectId, UserId)VALUES (null,$subId,$stuId)");

mysql_close($dbhandle);
 header("location:Home.php");