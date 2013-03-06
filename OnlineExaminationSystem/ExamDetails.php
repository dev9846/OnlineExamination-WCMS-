<?php
  //Buffer larger content areas like the main page content
  ob_start();

?>

<?php
        session_start();
        echo "Exam details"; ?>
        <em>
        <html>
            <head>
                 <link href="CSS/ExamStyle.css" rel="stylesheet" type="text/css" />
                 <script type="text/javascript" language="javascript" src="JavaScripts/addQues.js"></script>
            </head>
          
        
        <?php
        	$hostname = "localhost"; 
//connection to the database
$dbhandle = mysql_connect($hostname,"dev","dev") 
  or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";


//select a database to work with
mysql_select_db("OnlineExam",$dbhandle) 
  or die("Could not select user_profile");
  //echo "connected to user database";
  
  $sql ="select es.SubjectName, q.* from (select t.epaperId, t.PaperTotalQue, t.SubjectId, count(t.PaperId) as 'aq' from (SELECT ExamPaper.SubjectId,ExamPaper.PaperTotalQue, ExamPaper.PaperId as epaperId, ExamQue.* \n"
    . "FROM ExamPaper\n"
    . "LEFT JOIN ExamQue\n"
    . "ON ExamPaper.PaperId=ExamQue.PaperId) t\n"
    . "group by t.PaperId, t.SubjectId\n"
    . "order by t.epaperId ASC) q, ExamSubject es\n"
    . "where es.SubjectId = q.SubjectId";
  
  $result = mysql_query($sql) or die ("SQL Error");
  
  
  $dyn_table = '<div><table border="1" cellpadding="10">';
	$dyn_table .= '<tr> <th> Subject  </th> <th> TotalQues </th><th> AddedQues</th><th>Add More</th> </tr>';
        $dyn_table .= '<Form action = "#" name="quefrom">';
        
        
	while ($row = mysql_fetch_array($result)) {
			$PID = $row['epaperId'];
			$aq = $row['aq'];
			$tq = $row['PaperTotalQue'];
			$sn = $row['SubjectName'];
		$dyn_table .= '<tr> <td> '. $sn .'</td><td> ' . $tq .'</td><td>'. $aq .' </td> ';
                $dyn_table .= '<td><input type="Button" value="AddQue" name="add" id="'.$PID.'" onclick="AddQUES(this.id);" /></td></tr>';
        
	}
        
	$dyn_table .= "</form></table></div>";
	 echo $dyn_table;
        
        
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
