<?php
session_start();

//data from db

$uniqueIDPhoto=addslashes($_POST['uniqueIDPhoto']);
$ImgNum=addslashes($_POST['ImgNum']);
$ImgDes=addslashes($_POST['ImgDes']);
$accountType=addslashes($_SESSION['accountType']);

//is the box empty?
if($ImgDes == ""){
	$_SESSION["errorMessage"]="You cannot leave any box blank. Please try again!";
	header("Location:editImage.php");
	exit;
}
else
{
	$_SESSION["errorMessage"]="";
}

include("includes/openDBconn.php");


$sql = "UPDATE Images SET uniqueIDPhoto = '".$uniqueIDPhoto."', ImgNum = '".$ImgNum."', ImgDes = '".$ImgDes."', accountType = '".$accountType."' WHERE uniqueIDPhoto='".$uniqueIDPhoto."'";

$result = mysqli_query($conn, $sql);
//echo $sql;


include("includes/closeDBconn.php");

$_SESSION["errorMessage"]="Your information has been successfully updated";
header("Location:modifyPhotos.php");

?>