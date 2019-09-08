<?php

//THIS IS FOR MODIFY PHOTOS

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
<title>Modify Image</title>

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
                $_SESSION["errorMessage"] = "THERE IS NO DATA";

            }
            else {
                $row=$result->fetch_assoc();
            }
            ?>

        <div class = "content-main">
        <form id = "form0" name = "form0" method = "post" action = editImageDo.php>
        <fieldset>
        <legend>Update Image Information</legend>
            <img class="hover-shadow" style = "width: 400px; display: block; margin-left: auto; margin-right: auto;"src="<?php echo("upload/".$row["uniqueIDPhoto"]); ?>">
            <br>
        <ul>
            <li> <label title="uniqueIDPhoto" for="uniqueIDPhoto">Image ID</label> <input readonly type="text" name="uniqueIDPhoto" id="uniqueIDPhoto" size="25" maxlength="100" value = "<?php if ($result->num_rows != 0){echo(trim($row["uniqueIDPhoto"]));}?>"/></li>

            <li> <label title="ImgNum" for="ImgNum">Image Number</label> <input readonly type="text" name="ImgNum" id="ImgNum" size="25" maxlength="100" value = "<?php if ($result->num_rows != 0){echo(trim($row["ImgNum"]));}?>"/></li>

            <li> <label title="ImgDes" for="ImgDes" style = "text-decoration: underline;">Edit Image Description *</label> <input type="text" name="ImgDes" id="ImgDes" size="25" maxlength="100" value = "<?php if ($result->num_rows != 0){echo(trim($row["ImgDes"]));}?>"/></li>

            <li> <label title="accountType" for="accountType">Account Type</label> <input readonly type="text" name="accountType" id="accountType" size="25" maxlength="100" value = "<?php if ($result->num_rows != 0){echo(trim($row["accountType"]));}?>"/></li>

        </ul>

            <button class = "button-default" id="backButton" name="backButton" type="submit" formaction="modifyPhotos.php">< Back</button>
 
            <button class = "button-default" id="updateButton" name="editImageDo" type="submit" formaction="editImageDo.php">Update</button>


        </div>
    </fieldset>
        <?php 
            include("includes/closedDBconn.php");
        
        ?>

        <script type = "text/javascript">
            document.getElementByID("ImgDes").focus();
        <script>
        </form>
    </div>
</body>

</html>