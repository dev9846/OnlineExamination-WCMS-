<?php
include("ConnectDatabase.php");

$result = mysql_query("SELECT UserId,FirstName,LastName FROM ExamUser where RoleId = 2",$dbhandle);




    $SubForm = " <div id='CenHold'> <center> <div id='formdiv'>";
    $SubForm .= "<h2>Subject Form</h2> <p>Enter the subject name to register</p>";
    $SubForm .= "<form action='InsertSub.php' name='RegSub' id='form3' method='post' onsubmit='return validate(this)'>";
    $SubForm .= "<label>Subject </label> <input type='text' name='sname' title='Enter Subject Name' placeholder='enter subject Name'/><br />";
    $SubForm .= "<label>Faculty </label>";
    $SubForm .= "<select name='mydd'>";
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