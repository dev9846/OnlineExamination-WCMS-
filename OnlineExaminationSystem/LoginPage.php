<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<?php
  //Buffer larger content areas like the main page content
  ob_start();
?>
<html>
    <head>
       <link href="CSS/LoginStyle.css" rel="stylesheet" type="text/css" />
       <script type="text/javascript" language="javascript" src="JavaScripts/validate.js"></script>
    </head>
    
   

<div id=CenHold>
 <center><!-- Start of login form code --> <div id="formdiv">
<h2>Login Form</h2>
<p>Enter the below details to login</p>
<form action="checkLogin.php" name="loginform" class="" id="form1" method="post" onsubmit="return validate(this)">
<label>Username </label> <input type="text" name="username" title="Enter Your Username" placeholder="enter username"/><br />
<label>Password </label> <input type="password" name="password" title="Enter Your Password" placeholder="enter password"/>
<br/>
<button type="submit" title="Login">Login</button>
<button type="reset" title="Reset Fields">Clear</button>
</form>
</div> <!-- End of login form code --> 


<div id="formdiv">
    <h2>Register</h2>
    <P> Select your role below</P>

    <a href=UserReg.php?role=stu ><h3> SIGN UP AS STUDENT</h3></a>
    
    
    <a href=UserReg.php?role=fac><H3> SIGN UP AS FACULTY</H3></a>
    
</div>
</center>
</div>
</html>
<?php

 //Assign all Page Specific variables
  $pagemaincontent = ob_get_contents();
  ob_end_clean();
include("LoginMaster.php");
?>

 