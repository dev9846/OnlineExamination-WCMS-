<?php
include("ConnectDatabase.php");

$un =mysql_real_escape_string($_POST["username"]);
$up = mysql_real_escape_string($_POST["password"]);


$sql="SELECT * FROM ExamUser WHERE UserName='$un' and UserPass='$up'";
$result=mysql_query($sql);

// Replace counting function based on database you are using.
$count=mysql_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1){
		$result_set = array();

while($row = mysql_fetch_array($result)) {
    $result_set[] = $row;
}
  // Register $myusername, id and redirect to file "home.php"
	echo "login done";
	session_start();
 $_SESSION['name'] =$un;
 $_SESSION['id'] = $result_set[0]['UserId'];
 $_SESSION['role']=$result_set[0]['RoleId'];
 
  //session_register("psw");
  header("location:Home.php");
} 
else {
  echo "Wrong Username or Password";
   header("location:LoginPage.php");
}


?>