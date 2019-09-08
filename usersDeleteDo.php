<?php
session_start();

$id = $_GET["id"];

include("includes/openDBconn.php");

//connects to the accounts table from the modifyusers page

$sql="DELETE FROM Accounts WHERE username='".$id."'"; //deletes info

$result = mysqli_query($conn, $sql);

include("includes/closeDBconn.php");

$_SESSION["errorMessage"]="Your information has been successfully deleted";
header("Location:modifyUsers.php");

?>