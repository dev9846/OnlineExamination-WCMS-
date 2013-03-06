<?php
$role =  $_POST['role'] ;


if($role == true)
{
    if($role == 'fac')
    {
        $RId = 2;
    }
    else
    {
        $RId = 3;
    }
    
   
}
else
{
     die ("dont know role");
}


include("ConnectDatabase.php");
	
     

$fn =  $_POST["fname"] ;

$ln = $_POST["lname"] ;
$un =  $_POST["username"] ;

$up =  $_POST["password"] ;

echo $fn." ".$ln." ". $un." ". $up ;


mysql_query("INSERT INTO ExamUser(UserId, UserName, UserPass, RoleId, FirstName, LastName) VALUES (null,'$un','$up',$RId,'$fn','$ln');",$dbhandle)
or die ("sql error");



                    

mysql_close($dbhandle);

 header("location:LoginPage.php");

?>