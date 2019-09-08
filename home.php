<?php
//starts session
session_start();

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
        <?php include("includes/menu-alt.php"); ?>        
        <div class="content-main">
<img style = "width: 100%;" src = "header/WELCOME.jpg" alt = "header">
            
        <h1 style = "margin-top: 40px; text-align:center; font-size: 60px; color: black; padding: 10px 20px 20px 10px;"> Hi, <?php echo $_SESSION["username"]; ?> ! </h1>
      
           
            <?php
                if($_SESSION["accountType"] == 2){ //&& $_SESSION["accountType"] != 1) {?>
                <p style="margin-bottom: 40px; margin-top: 0; text-transform: none;">You are registered as a Super Admin and have the ability to modify users and photos</p>
                
                <div class="button-container">
                <a style="text-decoration: none;" href="modifyUsers.php"><button class="button-default">Modify Users</button></a>
                <a style="text-decoration: none;" href="modifyPhotos.php"><button class="button-default">Modify Posts</button></a>

                </div>
                <?php } else if($_SESSION["accountType"] == "paris" || $_SESSION["accountType"] == "chiangmai" || $_SESSION["accountType"] == "colorado" || $_SESSION["accountType"] == "hongkong" || $_SESSION["accountType"] == "greece") { ?> 
                <p style="margin-bottom: 40px; margin-top: 0; text-transform: none;"> You are registered as a Category Admin and have the ability to modify photos within your category.</p>
                <div style="width: 200px;" class="button-container">
                <a style="text-decoration: none;" href="idk.com"><button class="button-default">Modify Posts</button></a>
                </div>
                <?php } else{  ?>
                <br/> <p style="margin-bottom: 40px; margin-top: 0; text-transform: none;">You are a standard user, visit the gallery and check out some pictures!</p>
                <?php }?>
        </div>
        
</div>
</body>

</html>