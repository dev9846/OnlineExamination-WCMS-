<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
    <title>Master Page</title>
     <link href="CSS/TryStyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
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
			<div class="nav-main-title"></div>
                        <div class="nav-main-body">
                                                        </div>
                </div>
                        
            </div>
    </div>
     
    <div id="content">
        
         <div class="contentClass">
	
		<div class="content-main">				
			<div class="content-main-title">  </div>
			<div class="content-main-body">
                            <?php
                        echo $pagemaincontent;
        ?> 
            
            				
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
