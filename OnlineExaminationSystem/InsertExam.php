<?php

$sId = $_POST['SelSub'];
$TQ = $_POST['TQ'];
$MPQ1 = $_POST['MPQ'];
$NM = $_POST['NM'];
$TL = $_POST['TL'];
$ED = $_POST['ED'];


include("ConnectDatabase.php");


mysql_query("INSERT INTO ExamPaper(PaperId, SubjectId, PaperTotalQue, PaperMarksPerQue, PaperNegativeMarks, PaperDate, PaperTime)
            VALUES (null,$sId,$TQ,$MPQ1,$NM,'$ED',$TL)")
or die("SQL error");
mysql_close($dbhandle);
header("location:ExamDetails.php");

?>