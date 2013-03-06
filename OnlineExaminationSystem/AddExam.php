<?php

include("ConnectDatabase.php");
$result1 = mysql_query("SELECT SubjectId, SubjectName FROM ExamSubject ",$dbhandle);

$SubForm = " <div id='CenHold'><div id='formdiv'>";
    $SubForm .= "<h2>Exam Form </h2> <p>Enter the exam details to register</p>";
    $SubForm .= "<form action='InsertExam.php' name='IE' id='form4' method='post' onsubmit='return validate(this)'>";
    $SubForm .= "<label>Subject </label>";
    $SubForm .= "<select name='SelSub'>";
    
    while($row = mysql_fetch_array($result1)){
    
        $sId = $row['SubjectId'];
        $sn = $row['SubjectName'];
        $SubForm .= "<option value='$sId'>". $sn ." </option>";
    }
      $SubForm .= "</select><br /><br />";
        $SubForm .= "<label>Total Ques</label> <input type='text' name='TQ' title='Total Questions' placeholder='Total Questions'/><br />";
        $SubForm .= "<label>Marks P/Q  </label><input type='text' name='MPQ' title='Enter Marks per question' placeholder='Enter Marks per question'/><br />";
        $SubForm .= "<label>Negative marks </label><input type='text' name='NM' title='Negative Marks p/Q' placeholder='Negative marks per que'/><br />";
        $SubForm .= "<label>Time Limit</label><input type='text' name='TL' title='Enter Time Limit' placeholder='Enter Time Limit'/><br />";
        $SubForm .= "<label>Date </label><input type='text' name='ED' title='Enter Date' placeholder='date'/><br />";
        
        $SubForm .= "<button type='submit' title='Submit'>Submit</button><button type='reset' title='Reset Fields'>Clear</button> ";
    $SubForm .="</form></div></div>";   




 $response = $SubForm;
 echo $response;

?>