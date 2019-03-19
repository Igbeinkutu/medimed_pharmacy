<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Categories Management</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style1 {color: #000}
Div {font-family:Tahoma}
-->
</style>
</head>

<body>
  <h3><p align='center'>Category Management</p></h3>
<div align="left"><a href="Add_New_Category.php">Add a New Category</a></div> 
<table width="100%"  border="1">
  <tr bgcolor="#fff">
  

    <td><div align="center" class="style1">Category Name</div></td>
    <td><div align="center" class="style1">Delete Category</div></td>
  
  </tr>

<?php
include "../include.php";
$query =mysqli_query($con, "select * from categories");
while ($result=mysqli_fetch_array($query))
{


$Name=$result['Category_Name'];
$No=$result['Category_ID'];



echo "
  <tr>
    
    <td bgcolor='#06F'><div align='center'>$Name</div></td>
	  <td bgcolor='#ccc'><div align='center'><a href='CategoryManagment.php?main=delete&No=$No'>Delete Category</a></div></td>
  </tr>";

}
?>
 
  
</table>
         

</body>
</html>

<?php

if(isset($_GET['No']) AND isset($_GET['main'])){



if($_GET['main']=="delete")
{
	$IDDelete=$_GET['No'];
	perform_delete($IDDelete);
	
}
}
if(isset($_POST['SubmitYes'])){
	
	$category_id = $_POST['cat_id'];
    $sqlUpdateCategory=mysqli_query($con, "delete from categories where Category_ID = '$category_id' ") or die ("Error".mysqli_error($con));
	
	
		echo "<script language='JavaScript'>
				  alert ('Category Has Been Deleted !');
		  </script>";
			
	echo '  <script language="JavaScript">
				document.location="CategoryManagment.php";
			</script>';

}
if(isset($_POST['SubmitNo'])){
	echo '  <script language="JavaScript">
            document.location="CategoryManagment.php";
        </script>';

}

function perform_delete($value){
	
	global $con;
	$query = mysqli_query($con, "SELECT * FROM categories WHERE Category_ID = '$value'");
	$row = mysqli_fetch_array($query);
	$Category_name = $row['Category_Name'];
	$cat_id = $row['Category_ID'];
	
	echo "Are you sure yo want to Delete this category : $Category_name ? <br/>";
	echo "<form action = 'CategoryManagment.php' method = 'POST'>";
	echo "<input type='hidden' name='cat_id' value='$cat_id' />  ";
	echo "<input type='submit' name='SubmitYes' value='Yes' >  ";
	echo "<input type='submit' name='SubmitNo' value='No' >";
	echo "</form>";
	
}
?>