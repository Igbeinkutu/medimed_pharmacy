<?php
include "../include.php";



if(isset($_POST['Submit']))
{
	$location=$_POST['location'];
	$phone_no=$_POST['phone_no'];
	$opening_hour=$_POST['opening_hour'];
	$closing_hour=$_POST['closing_hour'];

	$add=mysqli_query($con, "insert into pharmacy_branch(location, phone_no, opening_hour, closing_hour) values ('$location','$phone_no', '$opening_hour', '$closing_hour') ")or die("Error in Adding branch ".mysqli_error($con));
	$Status=" Added....";

	echo "<script language='JavaScript'>
				  alert ('A New Branch Has Been Added !');
		  </script>";


	echo "<script language='JavaScript'>
				 document.location='AreasManagment.php';
			</script>";
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
		<link rel="stylesheet" type="text/css" href="datepickr.css" />

<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style1 {font-family: Tahoma}
-->
</style>
</head>

<body>
<form action="Add_New_Area.php" method="POST"  enctype="multipart/form-data" >
<div align="center">
  <table width="100%"  border="1">
    <tr bgcolor="#fff">
      <td colspan="2"><div align="center" class="style1"><strong>Add New Branch</strong></div></td>
    </tr>
    
    <tr bgcolor="#CCCCCC">
          <td><div align="center" class="style1">Location </div></td>

      <td><div align="center" class="style1">
        <input name="location" type="text" id="txtName" required/>
      </div></td>
    </tr>
    
    
    <tr bgcolor="#CCCCCC">
          <td><div align="center" class="style1">Phone No</div></td>

      <td><div align="center" class="style1">
        <input name="phone_no" type="tel" id="txtName">
      </div></td>
    </tr>
	 <tr bgcolor="#CCCCCC">
          <td><div align="center" class="style1">Opening Hour</div></td>

      <td><div align="center" class="style1">
        <input name="opening_hour" type="time" id="txtName"> 
      </div></td>
    </tr>
	 <tr bgcolor="#CCCCCC">
          <td><div align="center" class="style1">Closing Hour</div></td>

      <td><div align="center" class="style1">
        <input name="closing_hour" type="time" id="txtName"> 
      </div></td>
    </tr>
      
    <tr bgcolor="#06F">
      <td colspan="2"><div align="center" class="style1"></div>        <div align="center" class="style1">
        <input type="submit" name="Submit" value="Save">
      </div></td>
    </tr>
  </table>
</div>

</form>

</body>
</html>
