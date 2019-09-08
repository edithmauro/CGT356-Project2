<?php
session_start();

include("includes/openDBconn.php");

//variables from newLogin
$uniqueID=addslashes("NULL");
$username=addslashes($_POST["username"]);
$passcode=addslashes($_POST["passcode"]);
$accountType=addslashes($_POST["accountType"]);


//checks for blanks
if(($username == "") || ($passcode == "") || ($accountType == ""))
{
	$_SESSION["errorMessage2"]="You must enter a value for all boxes!";
	header("Location:newLogin.php");
	exit;
}
else
{
	$_SESSION["errorMessage2"]="";
}

//is username in the database??????
$sql="SELECT username FROM Accounts WHERE username='".$username."'";

$result = $conn->query($sql);

//if yes - redirect back and user must try again
if($result->num_rows>0)
{
	$_SESSION["errorMessage2"]="This username is already used, try again";
	header("location:newLogin.php");
	exit;
}
else
{
	$_SESSION["errorMessage2"]="";
}

//inserts the new user into the sql table
$sql="INSERT INTO Accounts (uniqueID, username, passcode, accountType) VALUES (NULL,'".$username."', '".$passcode."', '".$accountType."')";

//echo($sql);

$result = $conn->query($sql);

include("includes/closeDBconn.php");

$_SESSION["errorMessage2"]="Your account has been created!!! Try logging in!";
header("Location:newLogin.php");

?>