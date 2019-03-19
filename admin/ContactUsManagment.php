<?php
include "../include.php";

if(isset ($_GET['main']) && isset($_GET['id'])){

$op=$_GET['main'];
$ID=$_GET['id'];

if ($op=='read')
{
$sql= mysqli_query($con, "select * from contact_us where CU_ID='$ID' ");
$updatevalue=mysqli_fetch_array($sql);

$fname=$updatevalue['CU_Fname'];
$lname=$updatevalue['CU_Lname'];
$description=$updatevalue['CU_Description'];
$phone=$updatevalue['CU_Phone'];

$description=nl2br($description);

echo "
<style type='text/css'>
<!--
.style1 {font-family: Tahoma}
-->
</style>

<div align='left'>
  <table width='100%'  border='0'>
    <tr bgcolor='#CCCCCC' >
      <td colspan='2'><div align='center' class='style3 style4 style1' >Read Sender Message</div>        </td>
  </tr>
    <tr>
	      <td colspan='-2' bgcolor='#CCCCCC' style='text-align:left'><span class='style1'>First Name</span></td>

      <td>
        <div align='center' class='style1'>
          <input name='txttitle1' type='text' id='txttitle1' value='$fname' size='60' style='text-align:left' readonly>
      </div></td>
    </tr>
	<tr>
	      <td colspan='-2' bgcolor='#CCCCCC' style='text-align:left'><span class='style1'>Last Name</span></td>

      <td>
        <div align='center' class='style1'>
          <input name='txttitle1' type='text' id='txttitle1' value='$lname' size='60' style='text-align:left' readonly>
      </div></td>
    </tr>
    <tr>
	      <td colspan='-2' bgcolor='#CCCCCC' style='text-align:left'><span class='style1'>Phone Number</span></td>

      <td>
        <div align='center' class='style1'>

          <input name='txtdetails1' type='text' id='txtdetails1' value='$phone' size='60' style='text-align:left' readonly>

      </div></td>
    </tr>
	
	<tr>
	      <td colspan='-2' bgcolor='#CCCCCC' style='text-align:left'><span class='style1'>The Message</span></td>

      <td>
        <div align='center' class='style1'>

	<textarea cols='27' rows='2' readonly>$description</textarea> 	

      </div></td>
    </tr>		
  </table>
</div> ";
}
elseif($op=='delete')
{

$sql=mysqli_query($con, "select * from contact_us  where CU_ID=$ID ") or die('Cannot select '. mysqli_error($con));
$updatevalue=mysqli_fetch_array($sql);

$fname=$updatevalue['CU_Fname'];
$lname=$updatevalue['CU_Lname'];


echo "

<style type='text/css'>
<!--
.style1 {font-family: Tahoma}
-->
</style>
<form action='ContactUsManagment.php?id=$ID' method='POST' class='style2' >
<div align='right' dir='ltr'>
  <table width='100%'  border='0'>
    <tr bgcolor='#CCCCCC'>
      <td colspan='2'><div align='center' class='style3 style4 style1' >Delete Contact Us Sender Message</div>        </td>
  </tr>
    <tr>
	      <td  bgcolor='#CCCCCC' style='size:10'><span class='style1'>Sender First Name</span></td>

      <td >
        <div align='center' class='style1'>
          <input name='txttitle' type='text' id='txttitle' value='$fname' style='text-align:left'>
      </div></td>
    </tr>
	<tr>
	      <td  bgcolor='#CCCCCC' style='size:10'><span class='style1'>Sender Last Name</span></td>

      <td >
        <div align='center' class='style1'>
          <input name='txttitle' type='text' id='txttitle' value='$lname' style='text-align:left'>
      </div></td>
    </tr>
    <tr valign='middle'>
      <td colspan='2'><div align='center'></div>
        <div align='center' class='style1'><img src='images/trash_full.png' width='39' height='35'>Are you sure you want to delete the sender message ?</div></td>
    </tr>
    <tr bgcolor='#CCCCCC'>
      <td colspan='2'><div align='center'>
	          <input type='submit' name='SubmitDelete' value='Delete'>
        <input type='submit' name='SubmitNo' value='Back'>

      </div></td>
    </tr>
  </table>
</div>
</form>

";
}
}

else
{
echo ("<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN'
'http://www.w3.org/TR/html4/loose.dtd'>
<html>
<head>

<script type='text/javascript'>
function confirmMsg()
{
return confirm('Are you sure you want delete the message ?');
}

function confirmReject()
{
return confirm('Are you sure you want approve');
}


function confirmApproval()
{
return confirm('Are you sure you want approve');
}
</script>


<title>Untitled Document</title>
<meta http-equiv='Content-Type' content='text/html; charset=windows-1256'>

</head>
<body>
<div align='right'>
  <h3><p align='center'>Contact Us Management Information</p></h3>
  <table width='100%' border='1'>

    <tr bgcolor='#fff'>

      <td><div align='center'>Sender IP Address</div></td>
      <td><div align='center'>Message Date & Time</div></td>
      <td><div align='center'>Sender Email</div></td>
      <td><div align='center'>Sender Phone Number</div></td>
      <td><div align='center'>Message Type</div></td>
      <td><div align='center'>Sender Name</div></td>
      <td><div align='center'>Read Message</div></td>
      <td><div align='center'>Delete</div></td>
    </tr>

");

 $q=mysqli_query ($con, "select * from contact_us ");
	while($result=mysqli_fetch_array($q))
	{
	$id=$result['CU_ID'];
	$fname=$result['CU_Fname'];
	$lname=$result['CU_Lname'];
	$type=$result['CU_Type'];
	$phone=$result['CU_Phone'];
	$email=$result['CU_Email'];
	$date1=$result['CU_Date_Time'];
	$ip=$result['CU_IPAddress'];

	echo "
    <tr>

      <td><div align='center'>$ip</div></td>
      <td><div align='center'>$date1</div></td>
      <td><div align='center'>$email</div></td>
      <td><div align='center'>$phone</div></td>
      <td><div align='center'>$type</div></td>
      <td><div align='center'>$fname $lname</div></td>

      <td><div align='center'><a href='ContactUsManagment.php?main=read&id=$id'><img src='images/read.jpeg' width='30' height='32' border='0'></a></div></td>
	  
      <td><div align='center'><a href='ContactUsManagment.php?main=delete&id=$id'><img src='images/delete.png' width='18' height='18' border='0'></a></div></td>	  
    </tr>";
}
  echo "</table></div>";

}

if (isset($_POST['SubmitDelete']))
{

$sqlupadte=mysqli_query($con, "delete from contact_us where CU_ID='$id' ");

echo "<script language='JavaScript'>
			  alert ('User Contact Information Has Been Deleted !');
      </script>";
echo "<script language='JavaScript'>
              document.location='ContactUsManagment.php';
        </script>";
}

if (isset($_POST['SubmitNo']))
{

echo "<script language='JavaScript'>
              document.location='ContactUsManagment.php';
        </script>";
}

?>