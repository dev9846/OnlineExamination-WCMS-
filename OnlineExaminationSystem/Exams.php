<!-- $sql = "INSERT INTO `OnlineExam`.`ExamPaper` (`PaperId`, `SubjectId`, `PaperTotalQue`, `PaperMarksPerQue`, `PaperNegativeMarks`, `PaperDate`, `PaperTime`)
VALUES (NULL, \'1\', \'10\', \'2\', \'0.25\', \'2013-02-16\', \'20\');";-->

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<?php
  //Buffer larger content areas like the main page content
  ob_start();
?>
<html>
    <head>
        <title> Exams </title>
        <link href="CSS/ExamStyle.css" rel="stylesheet" type="text/css" />
          <script type="text/javascript" language="javascript" src="JavaScripts/insertSub.js"></script>
    </head>

<em>Exams


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
	
	$result = mysql_query("SELECT p.PaperId, p.SubjectId, p.PaperTotalQue, p.PaperMarksPerQue, p.PaperNegativeMarks, p.PaperDate, p.PaperTime, s.SubjectName FROM ExamPaper p, ExamSubject s where s.SubjectId = p.SubjectId  ",$dbhandle);
	
		
	$dyn_table = '<div><table border="1" cellpadding="10">';
	$dyn_table .= '<tr> <th> SubjectName </th> <th> Total Que </th> <th> Marks per Que </th> <th> NegativeMarks</th> <th>Date</th> <th>Time</th></tr>';
	
	
	
	while ($row = mysql_fetch_array($result)) {
			$sn =$row['SubjectName'];
			$tq = $row['PaperTotalQue'];
			$mpq = $row['PaperMarksPerQue'];
			$nm = $row['PaperNegativeMarks'];
                        $da = $row['PaperDate'];
                        $ti = $row['PaperTime'];
		$dyn_table .= '<tr> <td> '. $sn .'</td><td>'. $tq .'</td><td>'. $mpq .'</td><td>'. $nm .'</td><td>'. $da .'</td><td>'. $ti .'</td></tr>';
			
	}
	$dyn_table .= "</table></div>";
	 echo $dyn_table;
         
            $AddExam = '<form> <input type = "button" name="addEx" value="Add Exam" id="AE" onclick="addExam();"/> </form>';
            echo $AddExam;
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
