<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<?php
  //Buffer larger content areas like the main page content
  ob_start();
?>
<html>
    <head>
       <link href="CSS/regStyle.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" language="javascript" src="JavaScripts/validateReg.js"></script>
    </head>
    
    <body>
        <?php $role = $_REQUEST["role"];
           
        ?>
        
        <div id="CenHold">
            <center> <div id="formdiv">
                
                <h2>Basic Information</h2>
            <p>Enter the below details to register</p>
            
            <form action="InsertUser.php" name="Regform" class="dev" id="form2" method="post" onsubmit="return validate(this)">
                  <input type="hidden" name="role" value="<?php echo $role ?>" class="dev" />
                <label>First Name </label> <input type="text" name="fname" title="Enter Your First Name" placeholder="enter First Name"/><br />
                <label>Last Name </label> <input type="text" name="lname" title="Enter Your Last Name" placeholder="enter Last Name"/><br />
        <label>Username </label> <input type="text" name="username" title="Enter Your Username" placeholder="enter username"/><br />
        <label>Password </label> <input type="password" name="password" title="Enter Your Password" placeholder="enter password"/>
              
<br/>
<button type="submit" title="Login">Submit</button>
<button type="reset" title="Reset Fields">Clear</button>
</form>
                
            </div>
            </center>
        </div>
        
    </body>
 </html>
   
<?php

 //Assign all Page Specific variables
  $pagemaincontent = ob_get_contents();
  ob_end_clean();
include("LoginMaster.php");
?>

 
