<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "my_db";

$link = mysqli_connect($host,$username,$password,$database);

if(mysqli_connect_errno()){
	echo "failed to connect to MySql" . mysqli_connect_error();
}
?>