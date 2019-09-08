<?php
//starts the session
session_start();

include("includes/openDBconn.php");

//username and password from the initial login page
$username=addslashes($_POST["username"]);
$passcode=addslashes($_POST["passcode"]);
$accountType=addslashes($_POST["accountType"]);


//if the username n password are in database, redirect to welcome page
$sql="SELECT * FROM Accounts WHERE username='".$username."' AND passcode='".$passcode."'";

$result = $conn->query($sql);

if($result->num_rows==1)
{
	$_SESSION["errorMessage"]="";

	while ($row = $result->fetch_assoc()){ //pulls info from database
		$_SESSION['username'] = $row["username"];
		$_SESSION['password'] = $row["password"];
		$_SESSION['accountType'] = $row["accountType"];
	}
	
	header("location:home.php");
}
else
{
	$addrs = $_SERVER['REMOTE_ADDR'];
	$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
	$attemptDate = date("Y/m/d");
	$attemptTime = date("h:i:s");
	$userAgent = $_SERVER['HTTP_USER_AGENT'];

	$sql = "INSERT INTO Logging (addrs, host, attemptDate, attemptTime, userID, userAgent, success) VALUES ('".$addrs."', '".$hostname."', '".$attemptDate."' , '".$attemptTime."', '".$a."', '".$userAgent."', '".$_SESSION["logged"]."')";

	$_SESSION["errorMessage"]="Your username/password is incorrect, please try again";
	header("location:index.php"); //if user or password are incorrect, redirect back to index page
	exit;
}

include("includes/closeDBconn.php");
?>