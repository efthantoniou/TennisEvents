<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "mydb";

$link = mysqli_connect($host,$username,$password,$database);

if(mysqli_connect_errno()){
	echo "failed to connect to MySql" . mysqli_connect_error();
}
?>