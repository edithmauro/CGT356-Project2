<?php
session_start();

//data from db
include("includes/openDBconn.php");

$username=addslashes($_POST['username']);
$passcode=addslashes($_POST['passcode']);
$accountType=addslashes($_POST['accountType']);

//sends an error message if any of the boxes are blank
if(($username == "") ||($passcode == "") || ($accountType == "")){
	$_SESSION["errorMessage"]="You cannot leave any boxes blank";
	header("Location:editUsers.php");
	exit;
}
else{
	$_SESSION["errorMessage"]="";
}





$sql = "UPDATE Accounts SET username = '".$username."', passcode = '".$passcode."', accountType = '".$accountType."' WHERE username='".$username."'";

$result = mysqli_query($conn, $sql);
//echo $sql;

include("includes/closeDBconn.php");

$_SESSION["errorMessage"]="Your information has been successfully updated";
header("Location:modifyUsers.php");

?>