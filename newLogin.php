<?php
//connects to session
session_start();

//blank
if(empty($_SESSION["errorMessage2"]))
{
	$_SESSION["errorMessage2"]="";
}
echo("<?xml version=\"1.0\" encoding=\"UTF-8\"?>");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1-strickt.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; UTF-8" />
    <title>New Login</title>
	
	<script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous">
        </script>

<link rel="stylesheet" type="text/css" href="MASTER.css">

<script>
$(document).ready(function(){
  $('.BTN').hover(function() {
    $(this).addClass('hover');
  }, function() {
    $(this).removeClass('hover');
  })
});

</script>


</head>

<body style="background-color: #423E37;"> <!--added-->
<!--<img style = "width: 100%;" src = "https://steemitimages.com/DQmdXjWcK6k5D2eJQ8iWu1x3jk3EPcTnCkHxVj8Rs3TLahp/thin-header-1920x250.jpg" alt = "header">-->

<button class = "BTN button-over-image" ><a href = "index.php">Back to Login</a></button>
<!--BUTTON style="font-size: 10pt; position: absolute; top: 40px; left: 30px; text-align:center; background-color: #800000;"-->
<!-- A style = "color: #FFF; text-decoration: none;"-->


	<h1>New Account Login</h1>
	<!--style="text-align: center; color: #800000;"-->

<!--form for creating a new login-->
	<form id="form0" name="form0" method="post" action="newLoginDo.php">
	<br/>
    	<fieldset id="LOgin">
        	<legend>New Login Information</legend>
        	<ul>
            	<li> <label title="Username" for="username">Username<span>*</span></label> <input type="text" name="username" id="username" size="30" maxlength="30" /></li>
				<li> <label title="Passcode" for="passcode">Password<span>*</span></label> <input type="password" name="passcode" id="passcode" size="30" maxlength="30" /></li>
				<li><label title="AccountType" for="accountType">Account Type<span>*</span></label>
					<select name="accountType" id="accountType">
						<option value="0">User</option>
						<!--<option value="1">Category Admin</option>   we don't need a general category admin-->
						<option value="paris">Category Admin: Paris</option>
						<option value="chiangmai">Category Admin: Chiang Mai</option>
						<option value="colorado">Category Admin: Colorado</option>
						<option value="hongkong">Category Admin: Hong Kong</option>
						<option value="greece">Category Admin: Greece</option>
						<option value="2">Super Admin</option>
					</select>

				</li>
				<li><span><?php echo $_SESSION["errorMessage2"]; ?></span></li>
				<br>
				<li><button style="transition-duration: 0; margin-top: 0px;" class = "button-default-login" id="submit" name="submit" type="submit">Create New</button></li> 
       		</ul>
    	</fieldset>
		<?php
			$_SESSION["errorMessage2"]="";
		?>

    	<script type="text/javascript">
        	document.getElementByID("uniqueid").focus();
    	</script>

	</form>

</body>

</html>
