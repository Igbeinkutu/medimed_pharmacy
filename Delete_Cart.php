	<?php

$No1=$_GET['ID'];
$CI = $_GET["CI"];

$sqldelete=mysqli_query($con, "delete from mycart where Customer_ID='$No1' ");


echo "<script language='JavaScript'>
			  alert ('Your Cart Has Been Deleted Successfully !');
      </script>";

echo '
        <script language="JavaScript">
            document.location="index.php";
        </script>';

?>