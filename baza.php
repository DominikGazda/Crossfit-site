<?php
$username="root";
$password="";
$host="localhost";
$dbName="gazdom";

$polaczenie=mysqli_connect($host,$username,$password,$dbName);

if(!$polaczenie){
	echo "Brak polaczenia z baza <br>";
	exit;
}
?>