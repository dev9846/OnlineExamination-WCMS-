<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<?php
  //Buffer larger content areas like the main page content
  ob_start();
?>
<html>
    <head>
        <title> Subjects </title>
        <link href="CSS/LoginStyle.css" rel="stylesheet" type="text/css" />
          <script type="text/javascript" language="javascript" src="JavaScripts/insertSub.js"></script>
    </head>
<em>Subject Form
<?php
session_start();
	$hostname = "localhost"; 
//connection to the database
$dbhandle = mysql_connect($hostname,"dev","dev") 
  or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";


//select a database to work with
mysql_select_db("OnlineExam",$dbhandle) 
  or die("Could not select user_profile");
  //echo "connected to user database";
	
	$result = mysql_query("SELECT ES.SubjectId, ES.SubjectName, ES.UserId, EU.FirstName, EU.LastName FROM ExamSubject ES, ExamUser EU WHERE ES.UserId = EU.UserId ",$dbhandle);
	
		
	$dyn_table = '<div><table border="1" cellpadding="10">';
	$dyn_table .= '<tr> <th> Subject  </th> <th> Faculty </th> </tr>';
	
	
	
	while ($row = mysql_fetch_array($result)) {
			$uId =$row['UserId'];
			$fn = $row['FirstName'];
			$ln = $row['LastName'];
			$sn = $row['SubjectName'];
		$dyn_table .= '<tr> <td> '. $sn .'</td><td> ' . $fn  .' '. $ln .'</td></tr>';
			
	}
	$dyn_table .= "</table></div>";
	 echo $dyn_table;
         $btn = '<form> <input type = "button" name="btn" value="Add Subject" id="sub" onclick="addSubject();" /> </form>';
	$RegSub = '<form> <input type = "button" name="RS" value=Endrole Subject" id="RS" onclick="regSubject();" /> </form>';
        echo $btn ;
        echo $RegSub;
        
        ?>

<div id="myDiv">
    
</div>
</em>


</html>
<?php

 //Assign all Page Specific variables
  $pagemaincontent = ob_get_contents();
  ob_end_clean();
include("TryMaster.php")
?>

