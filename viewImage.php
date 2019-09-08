<?php
//starts session
session_start();

$id = $_GET["id"];

echo("<?xml version=\"1.0\" encoding=\"UTF-8\"?>");

//blocks users and redirects them to the index page
if(empty($_SESSION["username"]))
{
	$_SESSION["errorMessage"]="You are not permitted to view this page!";
	header("Location:index.php");
	exit;
}
?>
<!DOCTYPE html>
<html xmls = "http://wwww.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; UTF-8" />
<title>Welcome</title>

<link rel="stylesheet" type="text/css" href="MASTER.css">
</head>


<body>
    <div class="content">
    <!--<img style = "width: 100%;" src = "header/PHOTOS.jpg" alt = "header">  when header is in it is wonky-->
        <?php 
         
            include("includes/openDBconn.php");
            include("includes/menu-alt.php"); ?>        

            <?php
            $sql = "SELECT * FROM Images WHERE uniqueIDPhoto = '".$id."'";
            $result = mysqli_query($conn, $sql);

            if ($result->num_rows == 0){
                $_SESSION["errorMessage"] = "THERE IS AN ERROR";

            }
            else {
                $row=$result->fetch_assoc();
            }
            ?>
        <div class = "content-main">
            <img class="hover-shadow" style = "display: block; margin-left: auto; margin-right: auto;"src="<?php echo("upload/".$row["uniqueIDPhoto"]); ?>">
            <br>
            <div style = "text-align: center;">Image ID: <?php echo(trim($row["uniqueIDPhoto"])); ?></div> <br>
            <div style = "text-align: center;">Image Description: <?php echo(trim($row["ImgDes"]));?> </div>

            <?php 
                if ($result->num_rows>0){
                    while ($row=$result->fetch_assoc()){
                        ?>


                   <?php }
                }
                else {
                    echo("No Results");
                }

                mysqli_free_result($result);

            ?>

            <a style="text-decoration: none;" href="gallery.php"><button class="button-default">< Back</button></a>
        </div>
   
              
    </div>
</body>

</html>