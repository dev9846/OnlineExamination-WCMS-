<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
    <title>Master Page</title>
     <link href="CSS/TryStyle.css" rel="stylesheet" type="text/css" />
</head>
<body >
    
    <!-- Insert your content here -->
    <div id="container">
    <div id="header">
        
        <div class="header-logo"> LOGO here</div>
         <div class="header-main">
        <div class="header-main-body">Online Examnation System</div>
         </div>
	 
    </div>
    
       <div id="sidebar">
            <div class="nav">
                <div class="nav-main">
			<div class="nav-main-title">Menu</div>
                        <div class="nav-main-body">
                                 <ul><hr>
					<li><a href="Students.php">Students </a></li>
					<li><a href="Faculty.php">Faculty</a></li>
					<li><a href="Subjects.php">Subjects</a></li>
					<li><a href="Exams.php">Exams</a></li>
					<li><a href="ExamDetails.php">ExamsDetails</a></li>
					<li><a href="Results.php">Results</a></li>
					<li><a href="Home.php">Return to Home</a></li>
				</ul>
                        </div>
                </div>
                        
            </div>
    </div>
     
    <div id="content">
        
         <div class="contentClass">
	    <?php
		 //   session_start();
 	// Check if session is not registered , redirect back to main page.
if(!isset($_SESSION['name'])){
  $un = "No session, what the hell !! ";
}
//echo "session is on for ".$_SESSION['name']." ".$_SESSION['id'] ;
$uId = $_SESSION['id'];
$un = $_SESSION['name'];
$role = $_SESSION['role'];

include("ConnectDatabase.php");
$result = mysql_query("SELECT u.FirstName,u.LastName,u.RoleId, r.RoleName FROM ExamUser u, ExamRole r where UserId= $uId and
		      u.RoleId=r.RoleId",$dbhandle) or die("SQL error");
while ($row = mysql_fetch_array($result)) {
			
			$fn = $row['FirstName'];
			$ln = $row['LastName'];
			$rn = $row['RoleName'];
			
}	
	    ?>
	
		<div class="content-main">	Welcome, <?php echo $rn ." - ". $fn ." ". $ln  ?>	<hr>	
			<div class="content-main-title">  </div>
			<div class="content-main-body">
                            <?php
                        echo $pagemaincontent;        ?> 
            
            				
			</div><!-- content-main-body -->		
		</div><!-- content-main -->	
	</div><!-- content -->
        
        
    </div>
    

    
    <div id="footer">
          <div class="footer">
		<div class="footer-title"></div>
		<div class="footer-body">
                    Copyright
                    </div>	
	</div><!-- footer -->
            
    </div>
</div>
    
    
</body>
</html>
