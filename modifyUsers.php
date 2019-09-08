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
        <?php 
            include("includes/openDBconn.php");
            include("includes/menu-alt.php"); ?>        
        <div class="content-main">
<img style = "width: 100%;" src = "header/USERS.jpg" alt = "header">
            <?php
                if($_SESSION["accountType"] != 0 && $_SESSION["accountType"] != 1) {?>
                <div class="button-container">
                <a style="text-decoration: none;" href="modifyUsers.php"><button class="button-default">Modify Users</button></a>
                <a style="text-decoration: none;" href="modifyPhotos.php"><button class="button-default">Modify Posts</button></a>
                </div>
                <?php } else if($_SESSION["accountType"] != 0) { ?> 
                <a style="text-decoration: none;" href="idk.com"><button class="button-default">Modify Posts</button></a>
                <?php } else{ }?>

<?php
	
		
		//select user's information
		$sql= "SELECT * FROM Accounts";
		
		$result=$conn->query($sql);
		?>
	
	<!--form to update billing information-->
		<form style="width: 560px; height: auto;" id="form0" name="form0" method="post" action="modifyPhotosDo.php">
			<fieldset id="modifyPhotos">
				<legend>Modify Users</legend>

				<table style="margin-top: 50px; margin-left: auto; margin-right: auto;">
        <tr>
                        <td style="border: 3px solid #5BC3EB; padding: 10px; background-color: white;">Username</td>
                        <td style="border: 3px solid #5BC3EB;padding: 10px; background-color: white;">Account Type</td>
                        <td style="border: 3px solid #5BC3EB;padding: 10px; background-color: white;"> </td>
                        <td style="border: 3px solid #5BC3EB;padding: 10px; background-color: white;"> </td>

                        </tr>
            <?php
                  if ($result->num_rows>0){
                    while ($row = $result->fetch_assoc()){
                    ?>
                    
                        <tr>
                        <td style="border: 3px solid #5BC3EB; text-align: center; padding: 10px; background-color: white;"><?php echo(trim($row["username"]));   ?></td>
                        <td style="border: 3px solid #5BC3EB; text-align: center; padding: 10px; background-color: white;"><?php echo(trim($row["accountType"]));   ?></td>

                        <td style="border: 3px solid #5BC3EB; text-align: center; padding: 10px; background-color: white;">
                        <a href = "editUsers.php?id=<?php echo(trim($row["username"]));?>"><img style="width: 20px;" src="icons/edit.png"></td></a>

                        <td style="border: 3px solid #5BC3EB; text-align: center; padding: 10px; background-color: white;">
                        <a href = "usersDeleteDo.php?id=<?php echo(trim($row["username"]));?>">
                        <img style="width: 20px;" src="icons/trash.png"></td> <!--this sets the id used in the delete do page equal to the username-->
                        </a>
                        </tr>
                    <?php
                    }
                } else{
                    ?> 

                        <tr>
                        <td style="border: 3px solid #5BC3EB; text-align: center; padding: 10px; background-color: white;"> - </td>
                        <td style="border: 3px solid #5BC3EB; text-align: center; padding: 10px; background-color: white;"> - </td>
                        <td style="border: 3px solid #5BC3EB; text-align: center; padding: 10px; background-color: white;"> - </td>
                        <td style="border: 3px solid #5BC3EB; text-align: center; padding: 10px; background-color: white;"> - </td>
                        <td style="border: 3px solid #5BC3EB; text-align: center; padding: 10px; background-color: white;"> - </td>
                        <td style="border: 3px solid #5BC3EB; text-align: center; padding: 10px; background-color: white;"> - </td>
                        </tr>
                        <?php
                }
            ?>
        </table>
		<br>
			</fieldset>
            
	
			<?php
				$_SESSION["errorMessage"]="";
			?>
	



        </div>
        

    	<script type="text/javascript">
        	document.getElementByID("accountType").focus();
    	</script>

	</form>



    </div>
</body>

</html>