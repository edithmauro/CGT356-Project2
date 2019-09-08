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
<img style = "width: 100%;" src = "header/PHOTOS.jpg" alt = "header">
            <?php
                if($_SESSION["accountType"] != 0 && $_SESSION["accountType"] != 1) {?>
                <div class="button-container">
                <a style="text-decoration: none;" href="modifyUsers.php"><button class="button-default">Modify Users</button></a>
                <a style="text-decoration: none;" href="modifyPhotos.php"><button class="button-default">Modify Posts</button></a>
                </div>
                <?php } else if($_SESSION["accountType"] != 0) { ?> 
                <a style="text-decoration: none;" href="idk.com"><button class="button-default">Modify Posts</button></a>
                <?php } else{ }?>





<!--this code should be the same as 'update' pages from project 1-->
<?php
	
	//variables from Images
		$Submit = $_POST['modifyPhotos'];
		
		//select image's information
		$sql= "SELECT * FROM Images";
		
		$result=$conn->query($sql);
		?>
	
	<!--form to update image information-->
		<form style="width: 680px; height: auto;" id="form0" name="form0" method="post" action="modifyPhotosDo.php">
			<fieldset id="modifyPhotos">
				<legend>Modify Pictures</legend>

				<table style="margin-top: 20px; margin-left: auto; margin-right: auto;">
        <tr>
                        <td style="border: 3px solid #5BC3EB; padding: 10px; background-color: white;">Thumb</td>
                        <td style="border: 3px solid #5BC3EB;padding: 10px; background-color: white;">Unique ID</td>
                        <td style="border: 3px solid #5BC3EB;padding: 10px; background-color: white;">Photo Name</td>
                        <td style="border: 3px solid #5BC3EB;padding: 10px; background-color: white;">Category</td>
                        <td style="border: 3px solid #5BC3EB;padding: 10px; background-color: white;">Image Description</td>
						<td style="border: 3px solid #5BC3EB;padding: 10px; background-color: white;"></td>
						<td style="border: 3px solid #5BC3EB;padding: 10px; background-color: white;"></td>
                        </tr>
            <?php
                  if ($result->num_rows>0){
                    while ($row = $result->fetch_assoc()){
                    ?>
                    

                        <tr>
                        <td style="border: 3px solid #5BC3EB; text-align: center; padding: 10px; background-color: white;"><img class="hover-shadow" style="width:50px;  height: 30px;" src="<?php echo("upload/".$row["uniqueIDPhoto"]); ?>"></td>						
                        <td style="border: 3px solid #5BC3EB; text-align: center; padding: 10px; background-color: white;"><?php echo(trim($row["uniqueID"])); $id = trim($row["uniqueID"]);  ?></td>
                        <td style="border: 3px solid #5BC3EB; text-align: center; padding: 10px; background-color: white;"><?php echo(trim($row["uniqueIDPhoto"]));   ?></td>
                        <td style="border: 3px solid #5BC3EB; text-align: center; padding: 10px; background-color: white;"><?php echo(trim($row["accountType"]));   ?></td>
                        <td style="border: 3px solid #5BC3EB; text-align: center; padding: 10px; background-color: white;"><?php echo(trim($row["ImgDes"]));   ?></td>

                        <td style="border: 3px solid #5BC3EB; text-align: center; padding: 10px; background-color: white;">
                        
                        <a href = "editImage.php?id=<?php echo(trim($row["uniqueIDPhoto"]));?>"><img style="width: 20px;" src="icons/edit.png"></a></td>

                        <td style="border: 3px solid #5BC3EB; text-align: center; padding: 10px; background-color: white;">
                        <a href = "imageDeleteDo.php?id=<?php echo(trim($row["uniqueIDPhoto"]));?>"> <img style="width: 20px;" src="icons/trash.png"></a></td>

                        
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

    <?php /*function deleteimage() { 
                            $sql="DELETE FROM Images WHERE uniqueID=".$id; //deletes info

                            $result = $conn->query($sql);
                        }

                        if (isset($_GET['hello'])) {
                            deleteimage();
                          }*/
                        ?>
</body>

</html>