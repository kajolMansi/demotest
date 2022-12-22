<?php
$ServerName= "localhost";
$UserName="root";
$password="";
$dbName="student";
$con = mysqli_connect($ServerName,$UserName,$password,"$dbName");


if (!$con) {

	echo "connection error";
	//$sql = mysqli_query($conn,"CREATE DATABASE abc");

}

?>