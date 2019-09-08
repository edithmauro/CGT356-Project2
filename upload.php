<?php
// create session
session_start();
echo("<?xlm version=\"1.0\" encoding=\"UTF-8\"?>");

if(empty($_SESSION["username"]))
{
	$_SESSION["errorMessage"]="You are not permitted to view this page!";
	header("Location:index.php");
	exit;}
?>
<!DOCTYPE html PUBLIC "=//W3c//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1-strict.dtd">
<html xmln="http://www.w3.org/1999/xhtml" xml:lang="en" l ang="en">
<head>
    <title>Upload Image</title>
    <meta http-equiv="Content-Type" content="text/html; UTF-8" />
    <style>
        ul{
            list-style: none;
            margin-top: 5px;
        }
        ul li {
            display: block;
            float: left;
            width: 100%;
            height: 1%;
        }
        ul li label {
            float: left; 
            padding: 7px; 
            color: #6666ff;
        }
        ul li input, ul li textarea, ul li select{
            float: right; margin-right: 10px; 
            border: 1px solid #ccc; 
            padding: 3px; 
            font-family: Georgia, Times New Roman, Times, serif;
            width: 60%;
        }
        li input: focus, li textarea:focus {
            border: 1px solid #666;
        }
        fieldset {
            height: auto;
            padding: 10px; 
            border: 1px solid #cc;
            width: 500px; 
            overflow: auto;
        }
        legend{
            color: #000099;
            margin: 0 10px 0 0; 
            padding: 0 5px; 
            text-align: center;
        }
        label span{
            color: #ff0000;
        }
        fieldset #info {
            position: absolute; 
            top: 100px; 
            left: 20px; 
            width: 460px;
        }
        fieldset#submit{
            top: 240px; 
            left: 20px; 
            width: auto;
            margin: 20px;
            text-align: center;
        }
        fieldset input#Submitbtn{
            background: #ESESES;
            color: #000099;
            border: 1px solid #ccc;
            padding: 5px; 
            width: 150px;
        }
        div#errorMsg {
            color: #ff0000;
            font-weight: bold; 
            font-size: 12pt;
            position: absolute; 
            top: 300px;
        }
        div#newLogin{
            color: #0000ff;
            font-size: 12pt; 
            position: abbsolute;
            top: 350px;
            left: 25px;
        }
    </style>
</head>
<body>

    <div class="content">
        <?php 
        include("includes/openDBconn.php");
        include("includes/menu-alt.php"); ?>        
        <div class="content-main">
<img style = "width: 100%;" src = "header/UPLOAD.jpg" alt = "header">

<?php include("includes/menu.php"); 
include("includes/openDBconn.php");
					$sql="SELECT accountType,catName FROM CategoryTable";
					$result=mysqli_query($conn, $sql);
					$num_results=mysqli_num_rows($result);
					?>
<!----Changed the action to the correct page.-------->
<form id="form0" method="post" action="doUploadResize.php" enctype="multipart/form-data"> 
    <fieldset id="info">
        <input type="hidden" name="src" value="uploadResize.php" />
        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
        <!--------Changed the Legend----->
        <legend>Upload and Resize File</legend>
        <ul>
            <li> <label title="category" for="category">Category <span>*</span></label>
	            <select name="category" id="category">
                <?php
                
                for($i=0; $i < $num_results; $i++){

					$row = mysqli_fetch_array($result); 
					
                 if(strtolower(trim($row["accountType"])) == $_SESSION["accountType"]) {?>)
                    <option value="<?php echo(trim($row["accountType"]));?>"> <?php echo(trim($row["catName"]));?></option>
                 <?php } else if($_SESSION["accountType"] == "2"){?>
                    <option value="<?php echo(trim($row["accountType"]));?>"> <?php echo(trim($row["catName"]));?></option>
                 <?php } else { }?>
                <?php
				} ?>

				</select>

				<?php 
				
				
				$sql = "SELECT accountType FROM Accounts WHERE username ='".$_SESSION["username"]."'"; 
				//grabs the category assigned from the category admin users

				$result = $conn->query($sql); 
				
				//checks to see if there are records in the result
				if (empty($result))
					$num_results = 0;
				
				else
					$num_results = mysqli_num_rows($result);
					
						$row=mysqli_fetch_array($result);

					//this will equal whatever is set as the superadmin
					if ($row["0"] == "superadmin"){
						while($row["0"] == "superadmin"){ //while the row is superadmin, we pull all category options

							//repeat so it's not only pulling superadmin
							$sql = "SELECT accountType, catName FROM CategoryTable WHERE accountType ='".$row["0"]."'";  //catid from account table
				//grabs the category assigned from the category admin users

							$result = mysqli_query($conn, $sql);
							
							//checks to see if there are records in the result
							if (empty($result))
								$num_results = 0;
							
							else
								$num_result = mysqli_num_rows($result);
								
									$row=mysqli_fetch_array($result);

				?>
                

			<?php	}
						}	
					
					else{ ?>

				<?php	} ?>

				</select>
            </li>
			<li> <label title="description" for="description">Description: <span>*</span></label> <input type="text" name="description" id="description" size="25" maxlength="100"/></li>
            <li> <label title="userfile" for="userfile">File: <span>*</span></label> <input type="file" name="userfile" id="userfile" size="25" /></li>
        </ul>
    </fieldset>
    <fieldset id="submit">
        <input style="padding: 10px;" type="submit" id="uploadFile" name="uploadFile" value="Upload File" />
    </fieldset>
</form>

<div id="errorMsg"><?php if(!empty($_SESSION["badFileType"])){echo($_SESSION["badFileType"]);} ?></div>

<script type="text/javascript">
	document.getElementById("category").focus();
</script>

<?php
$_SESSION["badFileType"] = "";
?>
        </div>

        </body>
        
</div>

</html>