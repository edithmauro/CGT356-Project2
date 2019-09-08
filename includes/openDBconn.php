<?php
//variables for host, username, password, and database
$servername = "localhost";
//104.248.228.6   *** this has the correct tables

$username = "emauro";
$password = "Converse<3";
$dbname = "Project2";



//Julia's info: 165.227.139.97 "admin"; "a291a2f810f6efe8274b30a6539e255c9106521e25516c8c";

$conn = new mysqli($servername, $username, $password, $dbname); 
/*variable for connection: host, username, passowrd, database name, port, socket*/

//if the connection fails, an error will appear
if ($conn->connect_error){
    die("connection failed:".$conn->connect_error);
}

?>