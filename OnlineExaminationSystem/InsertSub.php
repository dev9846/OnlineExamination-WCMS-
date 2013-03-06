<?php
$uId = $_POST["mydd"];
$sn =  $_POST["sname"];

include("ConnectDatabase.php");

mysql_query("INSERT INTO ExamSubject(SubjectId, SubjectName, UserId) VALUES (null,'$sn',$uId);")
or die("sql error");

mysql_close($dbhandle);
 header("location:Subjects.php");

?>