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
            $sql = "SELECT * FROM Accounts WHERE username = '".$id."'";
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
        <legend>Update Account Information</legend>
        <ul>
            <li> <label title="username" for="username">Username<span>*</span></label> <input type="text" name="username" id="username" size="30" maxlength="30" value = "<?php if ($result->num_rows != 0){echo(trim($row["username"]));}?>"/></li>

            <li> <label title="passcode" for="passcode">Password<span>*</span></label> <input type="password" name="passcode" id="passcode" size="30" maxlength="30" value = "<?php if ($result->num_rows != 0){echo(trim($row["passcode"]));}?>"/></li>

            <li> <label title="accountType" for="accountType">Account Type<span>*</span></label>

            <!--<input type="text" name="accountType" id="accountType" size="30" maxlength="30" value = "<?php// if ($result->num_rows != 0){echo(trim($row["accountType"]));}?>"/>-->

                <select name="accountType" id="accountType">
                    <option value="0">User</option> 
                    <option value="paris">Category Admin: Paris</option>
                    <option value="chiangmai">Category Admin: Chiang Mai</option>
                    <option value="colorado">Category Admin: Colorado</option>
                    <option value="hongkong">Category Admin: Hong Kong</option>
                    <option value="greece">Category Admin: Greece</option>
                    <option value="2">Super Admin</option>
				</select>
            </li>

        </ul>

            <button class = "button-default" id="backButton" name="backButton" type="submit" formaction="modifyUsers.php">< Back</button>
 
            <button class = "button-default" id="updateButton" name="editImageDo" type="submit" formaction="editUsersDo.php">Update</button>


        </div>
    </fieldset>
        <?php 
            include("includes/closedDBconn.php");
        
        ?>

        <script type = "text/javascript">
            document.getElementByID("username").focus();
        <script>
        </form>
    </div>
</body>

</html>