<link rel="stylesheet" type="text/css" href="datepickr.css" />

<?php

session_start();

include("../include.php");

if(!isset($_SESSION['Sadmin'])){

    echo "You are not Authorized to view this page!
        <script language='JavaScript'>
        alert('You are not Authorized to view this page');
            document.location='../error.php';
        </script>";
  }

if (isset($_GET['main']) AND isset($_GET['id'])){
	
$op=$_GET['main'];
$ID=$_GET['id'];


if ($op=='update')
{

$sql=mysqli_query($con, "select * from pharmacy_branch where Branch_id='$ID' ");
$upadtevalue=mysqli_fetch_array($sql);

	$location=$upadtevalue['location'];
	$phone_no=$upadtevalue['phone_no'];
	$opening_hour=$upadtevalue['opening_hour'];
	$closing_hour=$upadtevalue['closing_hour'];

echo "
<style type='text/css'>
<!--
.style1 {font-family: Tahoma}
-->
</style>
<form action='AreasManagment.php?id=$ID' method='POST' class='style2' >

<div align='right'>
  <table width='100%'  border='1' dir='ltr'>
    <tr bgcolor='#CCCCCC'>
      <td colspan='5'><div align='center' class='style3 style4 style1' >Update Branch Information</div>        </td>
  </tr>
    <tr>
	      <td width='30%' bgcolor='#CCCCCC'><span class='style1'>Location </span></td>

      <td colspan='4'>
        <div align='center' class='style1'>
          <input name='location' type='text' id='txttitle1' value='$location' size='60' style='text-align:left' required/>
      </div></td>
    </tr>
";

?>
 <?php
 echo"       
       
	<tr>
	      <td width='30%' bgcolor='#CCCCCC'><span class='style1'>Phone No</span></td>

      <td colspan='4'>
        <div align='center' class='style1'>
          <input name='phone_no' type='text' id='' value='$phone_no' size='60' style='text-align:left'>
      </div></td>
    </tr>
	
     <tr>
	      <td width='30%' bgcolor='#CCCCCC'><span class='style1'>Opening Hour</span></td>

      <td colspan='4'>
        <div align='center' class='style1'>
          <input name='opening_hour' type='time' id='' value='$opening_hour' size='60' style='text-align:left'>
      </div></td>
    </tr>
	
	<tr>
	      <td width='30%' bgcolor='#CCCCCC'><span class='style1'>Closing Hour</span></td>

      <td colspan='4'>
        <div align='center' class='style1'>
          <input name='closing_hour' type='time' id='' value='$closing_hour' size='60' style='text-align:left'>
      </div></td>
    </tr>

    <tr bgcolor='#CCCCCC'>
      <td colspan='5'><div align='center'>
        <input type='submit' name='SubmitUpdate' value='Update Branch Information'> <input type = 'hidden' value = '$ID' name = 'id'/>
      </div></td>

  </table>
</div>";
}
elseif($op=='delete')
{

$sql=mysqli_query($con, "select * from pharmacy_branch where Branch_id='$ID' ");
$upadtevalue=mysqli_fetch_array($sql);

	$location=$upadtevalue['location'];
	$phone_no=$upadtevalue['phone_no'];
	$opening_hour=$upadtevalue['opening_hour'];
	$closing_hour=$upadtevalue['closing_hour'];
	
echo "
<form action='AreasManagment.php?id=$ID' method='POST' class='style2' >
<style type='text/css'>
<!--
.style1 {font-family: Tahoma}
-->
</style>
<form action='index.php?module=talents' method='POST' class='style2' >
<div align='right'>
  <table width='100%'  border='1' dir='ltr'>
    <tr bgcolor='#06f'>
      <td colspan='2'><div align='center' class='style3 style4 style1' >Delete Branch</div>        </td>
  </tr>
    <tr>
	      <td width='30%' bgcolor='#CCCCCC' align='center'><span class='style1'>Branch Name</span></td>

      <td width='70%'>
        <div align='center' class='style1'>
$location      </div></td>
    </tr>
    
    <tr valign='middle'>
      <td colspan='2'><div align='center'></div>
        <div align='center' class='style1'><img src='images/trash_full.png' width='39' height='35'>Are you sure you want to delete this branch?</div></td>
    </tr>
    <tr bgcolor='#CCCCCC'>
      <td colspan='2'><div align='center'><input type = 'hidden' value = '$ID' name = 'id'/>
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
<title>Untitled Document</title>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
<style type='text/css'>



.style3 {font-family: Tahoma}
.style4 {
	color: #000;
	font-weight: bold;
}
.style6 {font-family: Tahoma; color: #000; }
</style>

</head>
<body>

  <h3><p align='center'>Branch Management</p></h3>

<div align='center'>
  <table width='100%'  border='1' >
    <tr bgcolor='#fff'>

      <td ><div align='center' class='style3 style4'>Branch Location</div></td>

		<td ><div align='center'><span class='style6'><strong>Phone No</strong></span></div></td>
		<td ><div align='center'><span class='style6'><strong>Opening Hour</strong></span></div></td>
		<td ><div align='center'><span class='style6'><strong>Closing Hour</strong></span></div></td>

      <td ><div align='center' class='style6'><strong>Edit Branch Information</strong></div></td>

  <td ><div align='center' class='style6'><strong>Delete Branch</strong></div></td>
    </tr>");


    $q=mysqli_query ($con, "select * from pharmacy_branch");
	while($result=mysqli_fetch_array($q))
	{
		$No=$result['Branch_id'];
	
	$location=$result['location'];
	$phone_no=$result['phone_no'];
	$opening_hour=$result['opening_hour'];
	$closing_hour=$result['closing_hour'];

	echo "

<tr>

      <td><div align='center' class='style3'>$location</div></td>
		<td><div align='center'>$phone_no</div></td>
		<td><div align='center'>$opening_hour</div></td>
		<td><div align='center'>$closing_hour</div></td>


      <td><div align='center'><a href='AreasManagment.php?main=update&id=$No'><img src='images/edit.png' width='18' height='15' border='0'></a></div></td>
	  
      <td><div align='center'><a href='AreasManagment.php?main=delete&id=$No'><img src='images/delete.png' width='18' height='15' border='0'></a></div></td>	  
	  
    </tr>";
	}



    echo ("
  </table>
  <div align='center' class='style3'><a href='Add_New_Area.php'>Add New Branch</a></div>


</div>");
}


if (isset($_POST['SubmitUpdate']))
{

	$location=$_POST['location'];
	$phone_no=$_POST['phone_no'];
	$opening_hour=$_POST['opening_hour'];
	$closing_hour=$_POST['closing_hour'];
  $lastId = $_POST['id'];



$sqlupadte=mysqli_query($con, "update pharmacy_branch set location='$location', phone_no='$phone_no', opening_hour = '$opening_hour', closing_hour = '$closing_hour' where Branch_id='$lastId' ") or die ("error".mysqli_error($con));

echo "<script language='JavaScript'>
			  alert ('Branch Information Has Been Updated !');
      </script>";

echo "<script language='JavaScript'>
            document.location='AreasManagment.php';
        </script>";

}


if (isset($_POST['SubmitDelete']))
{
    $lastId = $_POST['id'];

$sqlupadte=mysqli_query($con, "delete from pharmacy_branch where Branch_id='$lastId' ");

echo "<script language='JavaScript'>
			  alert ('Branch Has Been Deleted !');
      </script>";

echo "<script language='JavaScript'>
             document.location='AreasManagment.php';
        </script>";
}


if (isset($_POST['SubmitNo']))
{

echo "<script language='JavaScript'>
              document.location='AreasManagment.php';
        </script>";
}



?>
