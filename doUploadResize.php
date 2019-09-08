<?php
session_start();

//THIS HAS BEEN EDITED ACCORDING TO THE VIDEO 

//make sure page doesnt time out - in case of large file
set_time_limit(300);

include("includes/openDBconn.php"); //connects to database

//SQL
$sql = "SELECT MAX(ImgNum) AS MaxNum FROM Images WHERE accountType = '".$_POST["category"]."'";   
// ='".$_POST["category"]."'";  //from images table - posted cat id from the previous page
    //grabs the category assigned from the category admin users

    $result = mysqli_query($conn, $sql); 
    
    //checks to see if there are records in the result
    if (empty($result))
        $nextnum = 1;
    
    else
        $row=mysqli_fetch_array($result);
        $nextnum = $row[0];
        $nextnum++; //image number counter
            

//make sure the submit button was pressed.
if($_POST["uploadFile"] != "")
{
	//Get the file extension
	$fileExt = strrchr($_FILES['userfile']['name'], ".");
	
	//if file extension is in this list, do not allow upload
	if( ($fileExt != ".jpg") && ($fileExt != ".gif") && ($fileExt != ".png") )
	{
		//set the session message in case of bad file type
		$_SESSION["badFileType"] = "You cannot upload a file of type ".$fileExt;
	}
    else
	{
		//Get the filename
		$fileName = $_FILES['userfile']['name'];
		
		// Make sure the file is uploaded (initially uploaded to the computers temp directory)
		// and ready for upload
		if(!is_uploaded_file($_FILES['userfile']['tmp_name']))
		{
			echo "Problem: possible file upload attack";
			exit;
		}
		
		// Get count from DB - we'll hard code it here
		//this number is different from your firstdoUpload
		
		// Name the file. This one includes the directory as well.
		$upfile = "upload/".$_POST["category"].$nextnum.".jpg"; //nextnum - increment everytime a file is uploaded
		
		// Need this for resizing - no directory
		$newFileName = $_POST["category"].$nextnum.".jpg";
		
		// copy the file into its location on the server
		if(!copy($_FILES['userfile']['tmp_name'], $upfile))
		{
			echo "Problem: Could not move file into directory";
			exit;
		}
		
		// set the session message
		$_SESSION["badFileType"] = "File Successfully Uploaded.";
		
	} // end filetype check
}
else
{
	$_SESSION["badFileType"] = "";
} // end form check

//imageID = the file name (defined above) - can be used as primary key for table
$sql2 = "INSERT INTO Images (uniqueID, uniqueIDPhoto, accountType, ImgNum, ImgDes) VALUES (NULL, '".$newFileName."', '".$_POST["category"]."', '".$nextnum."', '".$_POST["description"]."')";

//'".$_POST["category"]."'
echo $sql2;
$result = mysqli_query($conn, $sql2);

//////////////////////////////////////////////////////////
// RESIZE Image
//////////////////////////////////////////////////////////
$dir = "./upload/";
$middir = "./mid/";
$thdir = "./thumb/";
$img = $newFileName;

//You might need more logic here to accurately resize according to 
//aspect ratio - potrait vs landscape - or even an odd size

//Create mid image
//resizejpeg($dir, $middir, $img, 320, 240, 320, 240, "mid_");
resizejpeg($dir, $middir, $img, 480, 360, "mid_");

//create thumb image
resizejpeg($dir, $thdir, $img, 160, 120, "th_");

//append to the session message
$_SESSION["badFileType"] .="File successfully resized.";

//redirect to upload
//header("Location: uploadResize.php");

///////////////////////////////////////////////////////////
// function resizejpeg
//
//    creates a resized image based on the max width
//    specified as well as generates a thumbnail from
//    a rectangle cut from the middle of the image.
//
//    @dir    = directory image is stored in
//    @newdir = directory new image will be stored in
//    @img    = the image name
//    @max_w  = the max width of the resized image
//    @max_h  = the max height of the resized image
//    @prefix = the prefix of the resized image
//
///////////////////////////////////////////////////////////

//function resizejpeg
function resizejpeg($dir, $newdir, $img, $max_w, $max_h, $prefix)
{
   // set destination directory
   if (!$newdir) $newdir = $dir;

   // get original images width and height
   list($or_w, $or_h, $or_t) = getimagesize($dir.$img);

   // make sure image is a jpeg
   if ($or_t == 2) 
   {
   
       // obtain the image's ratio
       $ratio = ($or_h / $or_w);

       // original image
       $or_image = imagecreatefromjpeg($dir.$img);

       // resize image?
       if ($or_w > $max_w || $or_h > $max_h) {

           // resize by height, then width (height dominant)
           if ($max_h < $max_w) {
               $rs_h = $max_h;
               $rs_w = $rs_h / $ratio;
           }
           // resize by width, then height (width dominant)
           else {
               $rs_w = $max_w;
               $rs_h = $ratio * $rs_w;
           }

           // copy old image to new image
           $rs_image = imagecreatetruecolor($rs_w, $rs_h);
           imagecopyresampled($rs_image, $or_image, 0, 0, 0, 0, $rs_w, $rs_h, $or_w, $or_h);
       }
       // image requires no resizing
       else {
           $rs_w = $or_w;
           $rs_h = $or_h;

           $rs_image = $or_image;
       }

       // generate resized image
       imagejpeg($rs_image, $newdir.$prefix.$img, 100);

       return true;
   } 

   // Image type was not jpeg!
   else 
   {
       return false;
   }
}

header("Location: upload.php");

?>
