<head>
<link rel="stylesheet" type="text/css" href="MASTER.css">
</head>

<body>
<div class="sidebar">
<p>
    <a href = "home.php"><img style="width: 50px;" src="icons/house.png"></a> 
    <a href = "gallery.php"><img style="width: 50px;" src="icons/gallery.png"></a> 
    <?php
    if($_SESSION["accountType"] != "0" || $_SESSION["accountType"] != "0") {?>
     <a href = "upload.php"><img style="width: 50px;" src="icons/upload.png"></a> 
    <?php
    } else{ }?>
</p>
<a style="margin-bottom: 30px; position: absolute; text-align: center;" class="logout" href = "readme.php">README</a> 
<a style="position: absolute; text-align: center;" class="logout" href = "logout.php">LOGOUT</a> 
</div>
</body>