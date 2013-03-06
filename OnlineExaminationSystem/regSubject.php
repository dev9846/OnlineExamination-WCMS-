<?php

include("ConnectDatabase.php");

$result1 = mysql_query("SELECT SubjectId, SubjectName FROM ExamSubject ",$dbhandle);

 $SubForm = " <div id='CenHold'> <center> <div id='formdiv'>";
    $SubForm .= "<h2>Subject Endrole</h2> <p> Select subject name to register</p>";
    $SubForm .= "<form action='InsertStuSub.php' name='RegStuSub' id='form4' method='post' onsubmit='return validate(this)'>";
     $SubForm .= "<label>Subjects </label>";
    $SubForm .= "<select name='SelSub'>";
    
    while($row = mysql_fetch_array($result1)){
    
        $sId = $row['SubjectId'];
        $sn = $row['SubjectName'];
        $SubForm .= "<option value='$sId'>". $sn ." </option>";
    }
      $SubForm .= "</select><br />";
    

  $result = mysql_query("SELECT UserId,FirstName,LastName FROM ExamUser where RoleId = 3",$dbhandle);

 $SubForm .= "<label>Students </label>";
    $SubForm .= "<select name='SelStu'>";
    while ($row = mysql_fetch_array($result)) {
			$uId =$row['UserId'];
			$fn = $row['FirstName'];
			$ln = $row['LastName'];
		$SubForm .= "<option value='$uId'>". $fn ." ". $ln." </option>";
    }
    $SubForm .= "</select><br />";
    
    $SubForm .= "<button type='submit' title='Submit'>Submit</button><button type='reset' title='Reset Fields'>Clear</button> ";
    $SubForm .="</form></div></center></div>";   



 $response = $SubForm;
 echo $response;
?>