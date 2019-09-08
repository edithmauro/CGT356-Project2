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
	header("Location:galleryEditImage.php");
	exit;
}
else
{
	$_SESSION["errorMessage"]="";
}

include("includes/openDBconn.php");

// //connects to the shipdelete from the shipDelete page
// $sql="SELECT uniqueIDPhoto FROM Images WHERE uniqueIDPhoto='".$uniqueIDPhoto."'"; 

// echo($sql);

// $result = mysqli_query($conn, $sql);


/* if ($result->num_rows == 0){
    $_SESSION["errorMessage"] = "There is no data found.";
    header("Location:editImage.php");
    exit;
}
else{
    $_SESSION["errorMessage"] = "";

} */


$sql = "UPDATE Images SET uniqueIDPhoto = '".$uniqueIDPhoto."', ImgNum = '".$ImgNum."', ImgDes = '".$ImgDes."', accountType = '".$accountType."' WHERE uniqueIDPhoto='".$uniqueIDPhoto."'";

$result = mysqli_query($conn, $sql);
//echo $sql;


include("includes/closeDBconn.php");

$_SESSION["errorMessage"]="Your information has been successfully updated";
header("Location:gallery.php");

?>