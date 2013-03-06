<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<?php
  //Buffer larger content areas like the main page content
  ob_start();
?>
<em>Student Form



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
	
	$result = mysql_query("SELECT UserId,UserName,FirstName,LastName FROM ExamUser where RoleId = 3",$dbhandle);
	
		
	$dyn_table = '<div><table border="1" cellpadding="10">';
	$dyn_table .= '<tr> <th> FirstName </th> <th> LastName </th> <th> UserName </th></tr>';
	
	
	
	while ($row = mysql_fetch_array($result)) {
			$uId =$row['UserId'];
			$fn = $row['FirstName'];
			$ln = $row['LastName'];
			$un = $row['UserName'];
		$dyn_table .= '<tr> <td> '. $fn .'</td><td>'. $ln .'</td><td>'. $un .'</td></tr>';
			
	}
	$dyn_table .= "</table></div>";
	 echo $dyn_table; 
	?>


</em>

<?php

 //Assign all Page Specific variables
  $pagemaincontent = ob_get_contents();
  ob_end_clean();
include("TryMaster.php")
?>

