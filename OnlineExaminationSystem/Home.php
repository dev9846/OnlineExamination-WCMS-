<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<?php
session_start();


  //Buffer larger content areas like the main page content
  ob_start();
?>
<em>Home Page</em>

<?php 
 
 	// Check if session is not registered , redirect back to main page.
if(!isset($_SESSION['name']) || !isset($_SESSION['role'])){
  $un = "No session, what the hell !! ";
  $role = "NO Role for u ";
}
//echo "session is on for ".$_SESSION['name']." ".$_SESSION['id'] ;
$uId = $_SESSION['id'];
$un = $_SESSION['name'];
$role = $_SESSION['role'];



echo "welcome , ". $un ."uid = " .$uId ;

	$hostname = "localhost"; 
//connection to the database
$dbhandle = mysql_connect($hostname,"dev","dev") 
  or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";


//select a database to work with
mysql_select_db("OnlineExam",$dbhandle) 
  or die("Could not select user_profile");
  //echo "connected to user database";
  $sql = "SELECT ES.SubjectId, ES.SubjectName, EU.FirstName, EU.LastName FROM ExamSubject ES, ExamUser EU, ExamStudentSubject ESS WHERE EU.UserId = ".$uId. " and ESS.UserId = EU.UserId and ESS.SubjectId = ES.SubjectId LIMIT 0, 30 ";
  $result = mysql_query($sql,$dbhandle);
    
  
  	$dyn_table = '<div> ' ;
      
        
        $dyn_table .= '<br /><table border="1" cellpadding="10">';
        $dyn_table .= '<tr> <th colspan ="2"> My Subjects </th></tr>';
	$dyn_table .= '<tr> <th> Subject </th> <th> Faculty </th> </tr>';
        
        while ($row = mysql_fetch_array($result)) {
    $fn = $row['FirstName'];
			$ln = $row['LastName'];
			$sn = $row['SubjectName'];
		$dyn_table .= '<tr> <td> '. $sn .'</td><td> ' . $fn  .' '. $ln .'</td></tr>';
			
	}
	$dyn_table .= "</table></div>";
	 echo $dyn_table;

?>

<?php



 //Assign all Page Specific variables
  $pagemaincontent = ob_get_contents();
  ob_end_clean();
include("TryMaster.php");

?>

