<?php
//starts session
session_start();

echo("<?xml version=\"1.0\" encoding=\"UTF-8\"?>");

//blocks users and redirects them to the index page
/*if(empty($_SESSION["username"]))
{
	$_SESSION["errorMessage"]="You are not permitted to view this page!";
	header("Location:index.php");
	exit;
}*/
?>
<!DOCTYPE html>
<html xmls = "http://wwww.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; UTF-8" />
<title>README</title>

<link rel="stylesheet" type="text/css" href="MASTER.css">
</head>


<body>
    <div class="content">
        <?php 
            include("includes/openDBconn.php");
            include("includes/menu-alt.php"); ?>        
        <div class="content-main">
				<img style = "width: 100%;" src = "header/README.jpg" alt = "header">
				<a style="text-decoration: none; display: block; margin-left: auto; margin-right:auto;" href="index.php"><button class="BTN">Return to Index</button></a>
	
			<div style="margin-left: 40px; margin-right: 40px;" >
				<h1>Julia Johnson and Edith Mauro</h1>
				<h2 style = "text-align: center;">CGT 356 Project 2</h2>
				<p style = "text-transform: none; margin: 0;">For this project, we successfully implemented almost all features required for this assignment.  In order to explore this site, an account must be created (even for the user account type functions). To see all created features developed, use the default account login: username: cox password: php.  This account is a super admin.</p>
						<br>
				<p style = "text-transform: none; margin: 0;">Some 'above and beyond' extras that we did include implementing advanced CSS styling in order for the user experience to be pleasant. A flexbox side nav bar was developed to appear on all relevant pages and different image categories were given their own 'tab' so the user can navigate easily to their desired page. </p>
        	
			</div>

        </div>

    </div>
</body>

</html>