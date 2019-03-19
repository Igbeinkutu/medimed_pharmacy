<?php
$host='localhost';
$name='root';
$pass='';
$db='philips_pharmacy';


$con = mysqli_connect($host,$name,$pass, $db) or die ("error in connection");
mysqli_select_db($con, $db);
?>
