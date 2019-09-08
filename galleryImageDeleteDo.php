<?php
session_start();

$id = $_GET["id"];

include("includes/openDBconn.php");

//connects to the shipdelete from the shipDelete page

$sql="DELETE FROM Images WHERE uniqueIDPhoto='".$id."'"; //deletes info

$result = mysqli_query($conn, $sql);

include("includes/closeDBconn.php");

$_SESSION["errorMessage"]="Your information has been successfully deleted";
header("Location:gallery.php");

?>