<?php

include ('include.php');

$No=$_GET['ID'];
$Name = $_GET["Name"];

$sqldelete=mysqli_query($con, "delete from mycart where Customer_ID='$No' and Products_ID='$Name'");


echo "<script language='JavaScript'>
			  alert ('Your Item Has Been Deleted Successfully !');
      </script>";

echo '
        <script language="JavaScript">
            document.location="index.php?main=MyCart";
        </script>';

?>