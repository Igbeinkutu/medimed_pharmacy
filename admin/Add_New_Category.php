<?php
include "../include.php";

if(isset($_POST['Submit']) && !$errors)
{
$Name=$_POST['txtName'];

$add=mysqli_query($con, "insert into categories(Category_Name) values ('$Name') ")or die("Error in Add".mysqli_error($con));

echo "<script language='JavaScript'>
			  alert ('A New Category Has Been Created !');
      </script>";
	  
echo "<script language='JavaScript'>
             document.location='CategoryManagment.php';
        </script>";
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Add New Category</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style1 {font-family: Tahoma}
-->
</style>
</head>

<body>
<form action="Add_New_Category.php" method="POST"  enctype="multipart/form-data" >
<div align="center">
  <table width="100%"  border="1">
    <tr bgcolor="#fff">
      <td colspan="2"><div align="center" class="style1"><strong>Add A New Category</strong></div></td>
    </tr>
    <tr bgcolor="#CCCCCC">
          <td><div align="center" class="style1">Category Name</div></td>

      <td><div align="center" class="style1">
        <input name="txtName" type="text" id="txtName" required/> *
      </div></td>
    </tr>
   
    <tr bgcolor="#06f">
      <td colspan="2"><div align="center" class="style1"></div>        <div align="center" class="style1">
        <input type="submit" name="Submit" value="Save">
      </div></td>
    </tr>
  </table>
</div>
</form>
</body>
</html>
