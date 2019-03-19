<link rel="stylesheet" type="text/css" href="css/datepicker.css" /> 
<script type="text/javascript" src="js/datepicker.js"></script>
<script type="text/javascript" src="js/timepicker.js"></script>


<?php
include "../include.php";


$pic;

define ("MAX_SIZE","90000");

function getExtension($str) {
$i = strrpos($str,".");
if (!$i) { return ""; }
$l = strlen($str) - $i;
$ext = substr($str,$i+1,$l);
return $ext;
}

$errors=0;
if(isset($_POST['Submit']))
{
$image=$_FILES['image']['name'];
if ($image)
{
$filename = stripslashes($_FILES['image']['name']);

$extension = getExtension($filename);
$extension = strtolower($extension);

if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif"))
{
echo '<h1>This extension is Not Allowed!</h1>';
$errors=1;
}
else
{
$size=filesize($_FILES['image']['tmp_name']);

if ($size > MAX_SIZE*1024)
{
echo '<h1>You have exceeded the size limit!</h1>';
$errors=1;
}

$image_name=time().'.'.$extension;
$newname="Medicines_Pictures/".$image_name;


$pic=$newname;

$copied = copy($_FILES['image']['tmp_name'], $newname);
if (!$copied)
{
echo '<h1>Copy unsuccessful!</h1>';
$errors=1;
}}}}

if(isset($_POST['Submit']) && !$errors)
{
$Name=$_POST['name'];
$Category=$_POST['category'];
$Desc=$_POST['desc'];
$Qnt=$_POST['qnt'];
$Price=$_POST['price'];
$Exp_Date=$_POST['Exp_Date'];
$Active=$_POST['active'];

if (isValid()==true){


$add=mysqli_query($con, "insert into medicines(Medicine_Name,Medicine_Picture,Medicine_Description,Medicine_Category,Medicine_Add_Date,Medicine_Exp_Date,Medicine_Price,Medicine_Qnt,Active) values ('$Name','$pic','$Desc','$Category',NOW(),'$Exp_Date','$Price','$Qnt','$Active') ")or die("Error in Add".mysqli_error($con));
$Status=" Added....";

echo "<script language='JavaScript'>
			  alert ('A New Medicine Has Been Created !');
      </script>";


echo '<script language="JavaScript">
document.location="ProductsManagment.php";

        </script>';
}
}

function isValid()
{
global $Name;
global $Category;
global $Desc;
global $Qnt;
global $Price;
global $Exp_Date;


if  ($Name =="" || $Category =="" || $Qnt =="" || $Price =="" || $Exp_Date =="")
{
  
echo "<script language='JavaScript'>
			  alert ('Please Fill All ( * ) Fields About Your Information !');
      </script>";
return false;
}
else{
	return true;
}
}
?>


<!DOCTYPE html>

<html>
<head>


<title>Add New Medicine</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">


<style type="text/css">
<!--
.style1 {font-family: Tahoma}
-->
</style>
</head>

<body>
<form action="Add_New_Product.php" method="POST"  enctype="multipart/form-data" >
<div align="center">
  <table width="100%"  border="1">
    <tr bgcolor="#fff">
      <td colspan="2"><div align="center" class="style1"><strong>Add New Medicine</strong></div></td>
    </tr>
    <tr bgcolor="#CCCCCC">
          <td><div align="center" class="style1">Category Name</div></td>

      <td><div align="center" class="style1">
        <select name="category"> *

 <?php
								  
$sqluPDATE1=mysqli_query($con, "select * from categories ") or die ("error in select ".mysqli_error($con));
while ($row11=mysqli_fetch_array($sqluPDATE1))
{
$No=$row11['Category_ID'];
$Name=$row11['Category_Name'];

		 echo " <option value='$No'>$Name</option>";
	}							  
 ?>
        
        </select>
      </div></td>
    </tr>
    <tr bgcolor="#CCCCCC">
          <td><div align="center" class="style1">Medicine Name</div></td>

      <td><div align="center" class="style1">
        <input name="name" type="text" id="txtName" required/> *
      </div></td>
    </tr>
    <tr bgcolor="#CCCCCC">
          <td><div align="center" class="style1">Medicine Image</div></td>

      <td><div align="center" class="style1">
        <input type="file" name="image">
</div></td>
    </tr>
    <tr bgcolor="#CCCCCC">
          <td><div align="center" class="style1">Medicine Description</div></td>

      <td><div align="center" class="style1">
<textarea name="desc" id="address" cols="27" rows="2" id="Shipperaddress"></textarea>  *    </div></td>
    </tr>
    <tr bgcolor="#CCCCCC">
          <td><div align="center" class="style1">Medicine Qnt</div></td>

      <td><div align="center" class="style1">
        <input name="qnt" type="text" id="txtName" required/> *
      </div></td>
    </tr>
    <tr bgcolor="#CCCCCC">
          <td><div align="center" class="style1">Medicine Exp_Date</div></td>

      <td><div align="center" class="style1">

    <input id="start_dt" name="Exp_Date" type = "date" min = <?php date("Y-m-d");  ?> required/> *
                   
	

      </div></td>
    </tr>
    <tr bgcolor="#CCCCCC">
          <td><div align="center" class="style1">Medicine Price</div></td>

      <td><div align="center" class="style1">
        <input name="price" type="text" id="txtName" required/> *
      </div></td>
    </tr>

    <tr bgcolor="#CCCCCC">
          <td><div align="center" class="style1">Activation Status</div></td>

      <td><div align="center">
              <input type="checkbox" name="active" value="1" />
      </div></td>
    </tr>

	
    
    <tr bgcolor="#06F">
      <td colspan="2"><div align="center" class="style1"></div>        <div align="center" class="style1">
        <input type="submit" name="Submit" value="Add Medicine">
      </div></td>
    </tr>
  </table>
</div>



</form>

</body>
</html>
