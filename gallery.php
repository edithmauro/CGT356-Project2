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
        <?php include("includes/menu-alt.php"); 
        
        include("includes/openDBconn.php");
        ?>        
        <div class="content-main">
            <img style = "width: 100%;" src = "header/TRAVEL.jpg" alt = "header">

        <div class="tab">
            <button class="tablinks" onclick="openCity(event, 'Paris')" id="defaultOpen">Paris</button>
            <button class="tablinks" onclick="openCity(event, 'ChiangMai')">Chiang Mai</button>
            <button class="tablinks" onclick="openCity(event, 'Colorado')">Colorado</button>
            <button class="tablinks" onclick="openCity(event, 'HongKong')">Hong Kong</button>
            <button class="tablinks" onclick="openCity(event, 'Greece')">Greece</button>
        </div>


<!-- !!!! TAB ONE -->
<div>
<div id="Paris" class="tabcontent">
    <?php

    if($_SESSION["accountType"] == "paris") {?>
        <h2>You are a category admin for Paris</h2>
    <?php } else {} 
    if($_SESSION["accountType"] == 2) {?>
    <div style="width: 700px;" class="button-container">
            <a style="text-decoration: none;" href="modifyUsers.php"><button class="button-default">Modify Admins</button></a>
            <!--<a style="text-decoration: none;" href="modifyUsers.php"><button class="button-default">Delete Category</button></a>-->
            <a style="text-decoration: none;" href="modifyPhotos.php"><button class="button-default">Modify Posts</button></a>
    </div>
    <?php }  else{ }?>

    <div class="row"> 
        <?php 
            $sql = "SELECT * FROM Images WHERE accountType ='Paris'"; //makes only the pics in each category show
            
            // $result = mysqli_query($conn, $sql);
            $result = $conn->query($sql); // I think this is the correct usage for sqli

                if(empty($result)){
                    $num_results = 0;
                } 
                else {
                        $num_results = mysqli_num_rows($result);
                }

                for ($i = 0; $i<$num_results; $i++){
                    $row = mysqli_fetch_array($result);
                
                        ?>
                    <div class="allimages">

                        <div class="imagepopup">
                            <p style="color: white;"><?php echo $row["ImgDes"]; ?> </p>
                        </div>
                        <br/>
                        <a href = "<?php echo("upload/".$row["uniqueIDPhoto"]); ?>" download>download</a>
                        <a href = "http://165.227.139.97/Project2/<?php echo("upload/".$row["uniqueIDPhoto"]); ?>" target="_blank">view</a>
                        <!-- <a href = "viewImage.php?id=<?php //echo(trim($row["uniqueIDPhoto"]));?>">view</a> -->
                            <?php
                            if($_SESSION["accountType"] == "paris" || $_SESSION["accountType"] == 2) {?>
                            
                            <a href = "galleryEditImage.php?id=<?php echo(trim($row["uniqueIDPhoto"]));?>">edit</a>
                            <a href = "galleryImageDeleteDo.php?id=<?php echo(trim($row["uniqueIDPhoto"]));?>">delete</a>
                            <?php } else {} ?>
                        <br/>

                        <img class="hover-shadow" style="width:300px;  height: 210px;" src="<?php echo("upload/".$row["uniqueIDPhoto"]); ?>">
                                <!--onclick = openModal();-->
                    </div>
                    <!-- lightbox
                    <div id = "myModal" class="modal">
                        <span class="close" onclick="closeModal()">&times;</span>
                            <div class="modal-content">
                                    <div class="mySlides">
                                        <img src="<?//php echo("upload/".$row["uniqueIDPhoto"]);?>" style="width:50%; display:block; margin-left:auto; margin-right: auto;">
                                    </div>
                            </div>
                    </div> -->

        <?php }?>
    
    </div>

</div>


<!-- !!!! TAB TWO-->
<div id="ChiangMai" class="tabcontent">
        <?php
         if($_SESSION["accountType"] == "chiangmai") {?>
             <h2>You are a category admin for Chiang Mai</h2>
         <?php } else {} 
                if($_SESSION["accountType"] == 2) {?>
                    <div style="width: 700px;" class="button-container">
                        <a style="text-decoration: none;" href="modifyUsers.php"><button class="button-default">Modify Admins</button></a>
                        <!--<a style="text-decoration: none;" href="modifyUsers.php"><button class="button-default">Delete Category</button></a>-->
                        <a style="text-decoration: none;" href="modifyPhotos.php"><button class="button-default">Modify Posts</button></a>
                </div>
                <?php }  else{ }?>

        <div class="row"> 
                    <?php 
                        $sql = "SELECT * FROM Images WHERE accountType ='ChiangMai'"; //makes only the pics in each category show
                        
                        // $result = mysqli_query($conn, $sql);
                        $result = $conn->query($sql); // I think this is the correct usage for sqli

                            if(empty($result)){
                                $num_results = 0;
                            } else {
                                    $num_results = mysqli_num_rows($result);
                            }

                            for ($i = 0; $i<$num_results; $i++){
                                $row = mysqli_fetch_array($result);
                        ?>
                        <div class="allimages">
                            <div class="imagepopup">
                        
                            <p style="color: white;"><?php echo $row["ImgDes"]; ?> </p>
                            </div>

                            <br/>
                            <a href = "<?php echo("upload/".$row["uniqueIDPhoto"]); ?>" download>download</a>
                        <a href = "http://165.227.139.97/Project2/<?php echo("upload/".$row["uniqueIDPhoto"]); ?>" target="_blank">view</a>

                            <?php
                            if($_SESSION["accountType"] == "chiangmai" || $_SESSION["accountType"] == 2) {?>
                            
                            <a href = "galleryEditImage.php?id=<?php echo(trim($row["uniqueIDPhoto"]));?>">edit</a>
                            <a href = "galleryImageDeleteDo.php?id=<?php echo(trim($row["uniqueIDPhoto"]));?>">delete</a>
                            <?php } else {} ?>
                            <br/>

                            <img class="hover-shadow" style="width:300px;  height: 210px;" src="<?php echo("upload/".$row["uniqueIDPhoto"]); ?>">
                        </div>

                        <?php }?>
            

        </div>



</div>




<!-- !!!! TAB THREE -->
<div id="Colorado" class="tabcontent">
            
    <?php
        if($_SESSION["accountType"] == "colorado") {?>
            <h2>You are a category admin for Colorado</h2>
        <?php } else {} 


            if($_SESSION["accountType"] == 2) {?>
                <div style="width: 700px;" class="button-container">
                    <a style="text-decoration: none;" href="modifyUsers.php"><button class="button-default">Modify Admins</button></a>
                   <!-- <a style="text-decoration: none;" href="modifyUsers.php"><button class="button-default">Delete Category</button></a>-->
                    <a style="text-decoration: none;" href="modifyPhotos.php"><button class="button-default">Modify Posts</button></a>
                </div>
            <?php }  
            else{ }?>

    <div class="row"> 
                <?php 
                    $sql = "SELECT * FROM Images WHERE accountType ='Colorado'"; //makes only the pics in each category show
                    
                    // $result = mysqli_query($conn, $sql);
                    $result = $conn->query($sql); // I think this is the correct usage for sqli

                        if(empty($result)){
                            $num_results = 0;
                        } 
                        else {
                                $num_results = mysqli_num_rows($result);
                        }

                        for ($i = 0; $i<$num_results; $i++){
                            $row = mysqli_fetch_array($result);
                        ?>
                <div class="allimages">
                    <div class="imagepopup">
                        <p style="color: white;"><?php echo $row["ImgDes"]; ?> </p>
                    </div>
                    
                        <br/>
                        <a href = "<?php echo("upload/".$row["uniqueIDPhoto"]); ?>" download>download</a>
                        <a href = "http://165.227.139.97/Project2/<?php echo("upload/".$row["uniqueIDPhoto"]); ?>" target="_blank">view</a>

                        <?php
                        if($_SESSION["accountType"] == "colorado" || $_SESSION["accountType"] == 2) {?>
                            
                            <a href = "galleryEditImage.php?id=<?php echo(trim($row["uniqueIDPhoto"]));?>">edit</a>
                            <a href = "galleryImageDeleteDo.php?id=<?php echo(trim($row["uniqueIDPhoto"]));?>">delete</a>
                        <?php } 
                        else {} ?>
                        <br/>

                    <img class="hover-shadow" style="width:300px;  height: 210px;" src="<?php echo("upload/".$row["uniqueIDPhoto"]); ?>">
                </div>


        <?php }?>

    </div>

        
</div>



<!-- !!!! TAB FOUR -->
<div id="HongKong" class="tabcontent">
        <?php
            if($_SESSION["accountType"] == "hongkong") {?>
                <h2>You are a category admin for Hong Kong</h2>
            <?php } else {} 
                if($_SESSION["accountType"] == 2) {?>
                    <div style="width: 700px;" class="button-container">
                        <a style="text-decoration: none;" href="modifyUsers.php"><button class="button-default">Modify Admins</button></a>
                       <!-- <a style="text-decoration: none;" href="modifyUsers.php"><button class="button-default">Delete Category</button></a>-->
                        <a style="text-decoration: none;" href="modifyPhotos.php"><button class="button-default">Modify Posts</button></a>
                </div>
                <?php }  else{ }?>

                <div class="row"> 
                    <?php 
                        $sql = "SELECT * FROM Images WHERE accountType ='HongKong'"; //makes only the pics in each category show
                        
                        // $result = mysqli_query($conn, $sql);
                        $result = $conn->query($sql); // I think this is the correct usage for sqli

                            if(empty($result)){
                                $num_results = 0;
                            } else {
                                    $num_results = mysqli_num_rows($result);
                            }

                            for ($i = 0; $i<$num_results; $i++){
                                $row = mysqli_fetch_array($result);
                            ?>
            <div class="allimages">
 
                    <div class="imagepopup">

                        <p style="color: white;"><?php echo $row["ImgDes"]; ?> </p>
                    </div>

                        <br/>
                        <a href = "<?php echo("upload/".$row["uniqueIDPhoto"]); ?>" download>download</a>
                        <a href = "http://165.227.139.97/Project2/<?php echo("upload/".$row["uniqueIDPhoto"]); ?>" target="_blank">view</a>

                        <?php
                        if($_SESSION["accountType"] == "hongkong" || $_SESSION["accountType"] == 2) {?>
                            
                            <a href = "galleryEditImage.php?id=<?php echo(trim($row["uniqueIDPhoto"]));?>">edit</a>
                            <a href = "galleryImageDeleteDo.php?id=<?php echo(trim($row["uniqueIDPhoto"]));?>">delete</a>
                        <?php } else {} ?>
                        <br/>

                <img class="hover-shadow" style="width:300px;  height: 210px;" src="<?php echo("upload/".$row["uniqueIDPhoto"]); ?>">
                    </div>


                    <?php }?>
            
            </div>



    </div>
        



<!-- !!!! TAB FIVE -->
        <div id="Greece" class="tabcontent">
        <?php

                if($_SESSION["accountType"] == "greece"){?>
                    <h2>You are able to edit these images.</h2>
                <?php } else {} 
                if($_SESSION["accountType"] == 2) {?>
                    <div style="width: 700px;" class="button-container">
                        <a style="text-decoration: none;" href="modifyUsers.php"><button class="button-default">Modify Admins</button></a>
                        <!--<a style="text-decoration: none;" href="modifyUsers.php"><button class="button-default">Delete Category</button></a>-->
                        <a style="text-decoration: none;" href="modifyPhotos.php"><button class="button-default">Modify Posts</button></a>
                </div>
                <?php }  else{ }?>

                <div class="row"> 
                    <?php 
                        $sql = "SELECT * FROM Images WHERE accountType ='Greece'"; //makes only the pics in each category show
                        
                        // $result = mysqli_query($conn, $sql);
                        $result = $conn->query($sql); // I think this is the correct usage for sqli

                            if(empty($result)){
                                $num_results = 0;
                            } else {
                                    $num_results = mysqli_num_rows($result);
                            }

                            for ($i = 0; $i<$num_results; $i++){
                                $row = mysqli_fetch_array($result);
                            ?>
                <div class="allimages">
                <div class="imagepopup">
                        <p style="color: white;"><?php echo $row["ImgDes"]; ?> </p>
                </div>

                        <br/>
                        <a href = "<?php echo("upload/".$row["uniqueIDPhoto"]); ?>" download>download</a>
                        <a href = "http://165.227.139.97/Project2/<?php echo("upload/".$row["uniqueIDPhoto"]); ?>" target="_blank">view</a>

                        <?php
                        if($_SESSION["accountType"] == "greece" || $_SESSION["accountType"] == 2) {?>
                          <a href = "galleryEditImage.php?id=<?php echo(trim($row["uniqueIDPhoto"]));?>">edit</a>
                            <a href = "galleryImageDeleteDo.php?id=<?php echo(trim($row["uniqueIDPhoto"]));?>">delete</a>
                        <?php } else {} ?>
                        <br/>

                <img class="hover-shadow" style="width:300px;  height: 210px;" src="<?php echo("upload/".$row["uniqueIDPhoto"]); ?>">
                    </div>

                    <?php }?>  
            
                </div>

        </div>

</div>
</div>

<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

    document.getElementById("defaultOpen").click();


</script>

	<?php
		include("includes/closeDBconn.php");
	?>	

</body>

</html>