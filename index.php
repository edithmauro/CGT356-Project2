<?php 
session_start();
echo ("<?xml version = \"1.0\" encoding = \"UTF-8\"?>"); ?>
<!DOCTYPE html>
<html xmls = "http://wwww.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; UTF-8" />
<title>Login</title>


<script>
$(document).ready(function(){
  $('.BTN').hover(function() {
    $(this).addClass('hover');
  }, function() {
    $(this).removeClass('hover');
  })
});

</script>
<link rel="stylesheet" type="text/css" href="MASTER.css">
</head>

<body style="background-color: #EDEBD7;">


<div>
<!--initial form for the user to login-->
<img style = "width: 100%;" src = "header/TRAVEL.jpg" alt = "header">
	<form class="login-form" id="form0" name="form0" method="post" action="indexLoginDo.php">
	<a class = "BTN create" href="newLogin.php">Create Account</a> <!--redirects user to create new acct-->
    	<fieldset id="Login">
        	<legend>Account Login</legend>
        	<ul>
            	<li> <label title="Username" for="username">Username<span>*</span></label> <input type="text" name="username" id="username" size="30" maxlength="30" /></li>
				<li> <label title="Passcode" for="passcode">Passcode<span>*</span></label> <input type="password" name="passcode" id="passcode" size="30" maxlength="30" /></li>
       		</ul>
			
			<br><br><br>
			<span><?php echo $_SESSION["errorMessage"]; ?> </span>
			<br><br>
			<button style="transition-duration: 0;" class="button-default-login" name="submit" type="submit">Login</button>
			
<br><br>
    	</fieldset>

		<?php
			$_SESSION["errorMessage"]="Your username/password is incorrect, please try again";
		?>


    	<script type="text/javascript">
        	document.getElementByID("uniqueID").focus();
    	</script>
	<a class = "BTN create" href="readme.php">Read Me</a> <!--redirects user to read me page-->

	</form>
	<br>
<div>



</body>

</html>
