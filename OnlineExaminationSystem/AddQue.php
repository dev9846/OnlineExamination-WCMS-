<?php

$ID = $_REQUEST["ID"];

include("ConnectDatabase.php");
$sql = "SELECT S.SubjectName from ExamPaper P, ExamSubject S\n"
    . "where P.SubjectId = S.SubjectId and P.PaperId = ". $ID ." LIMIT 0, 30 ";
    
$result1 = mysql_query($sql,$dbhandle);


$SubForm = " <div id='CenHold'><div id='formdiv'>";
    
    
    while($row = mysql_fetch_array($result1)){
        
    $sn = $row['SubjectName'];
        
    }
    $SubForm .= "<h2>ADD Questions  </h2> <p>".$sn."</p>";
    $SubForm .= "<form action='InsertExamQue.php' name='IEQ' id='form5' method='post' onsubmit='return validate(this)'>";

    $SubForm .= "<label>Question</label> <input type='textarea' name='TxtA' title='AddQue' cols='10' rows='5'><br />";
    $SubForm .= "<label>Type</label> <select name='SelT'> <option value 1> select </option><option value=2> True/False  </option>";
    $SubForm .= "<option value=3> MCQ  </option>";
    $SubForm .= "</select><br />";

 $response = $SubForm;
 echo $response;

?>