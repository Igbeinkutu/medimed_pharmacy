<?php
include "../include.php";

if(isset($_GET['main']) && isset($_GET['id'] )){
$op=$_GET['main'];
$ID=$_GET['id'];

if($op=='delete')
{

$sql=mysqli_query($con, "select * from orders  where Order_ID=$ID ");
$upadtevalue=mysqli_fetch_array($sql);

$ID=$upadtevalue['Order_ID'];

echo "
<form action='OrdersManagment.php?id=$ID' method='POST' class='style2' >

<div align='right' dir='ltr'>
  <table width='100%'  border='0'>
    <tr bgcolor='#fff'>
      <td colspan='2'>
	        <div align='center' class='style3 style4 style1'>Delete Order</div>        
	  </td>
    </tr>
   
    <tr valign='middle'>
      <td colspan='2'><div align='center'></div>
<div align='center' class='style1'><img src='images/trash_full.png' width='39' height='35'>Are you sure you want to delete ?</div>
	  </td>
    </tr>
    <tr bgcolor='#fff'>
      <td colspan='2'><div align='center'>
	   	<input type='submit' name='SubmitDelete' value=Delete >
        <input type='submit' name='SubmitNo' value=Back>
      </div>
	  </td>
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
<title>Orders Managment</title>
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
<div align='right'>
  <h3><p align='center'>Orders Management</p></h3>
  <table width='100%' border='1'>
    <tr bgcolor='#fff'>
      <td ><div align='center' class='style3 style4'>Order Number</div></td>
      <td ><div align='center'><span class='style6'><strong>Customer First name</strong></span></div></td>
	  <td ><div align='center'><span class='style6'><strong>Customer Surname</strong></span></div></td>
      <td ><div align='center'><span class='style6'><strong>Order Total Price</strong></span></div></td>
	  <td ><div align='center'><span class='style6'><strong>Order Area</strong></span></div></td>
      <td ><div align='center' class='style6'><strong>Order Payment Type</strong></div></td>
      <td ><div align='center' class='style6'><strong>Order Payment Status</strong></div></td>
	  <td ><div align='center' class='style6'><strong>Order Products</strong></div></td>
	  	  	  <td ><div align='center' class='style6'><strong>Order Date</strong></div></td>

      <td ><div align='center' class='style6'><strong>Delete Order</strong></div></td>
    </tr>");


    $q=mysqli_query ($con, "select * from orders");
	
	while($result=mysqli_fetch_array($q))
	{
	$id=$result['Order_ID'];
	$CID=$result['Customer_ID'];
	$fName=$result['Order_C_Fname'];
	$lName=$result['Order_C_Lname'];
	$Email=$result['Order_C_Email'];
	$Phone=$result['Order_C_Phone'];
	$Address=$result['Order_C_Address'];
	$TP=$result['Order_Total_Price'];
	$Area=$result['Order_Area'];
	$PM=$result['Order_Payment_Method'];
	$PS=$result['Order_Payment_Status'];	
	$Title=$result['Order_Products'];
		$Date=$result['Order_Date'];


	echo "

<tr>
      <td><div align='center' class='style3'>$id</div></td>
      <td><div align='center' class='style3'>$fName</div></td>
	  <td><div align='center' class='style3'>$lName</div></td>
      <td><div align='center' class='style3'>$TP</div></td>
      <td><div align='center' class='style3'>$Area</div></td>
      <td><div align='center' class='style3'>$PM</div></td>
      <td><div align='center' class='style3'>$PS</div></td>
	  <td><div align='center' class='style3'>$Title</div></td>
	  	  <td><div align='center' class='style3'>$Date</div></td>

      <td><div align='center'><a href='OrdersManagment.php?main=delete&id=$id'><img src='images/delete.png' width='18' height='15' 	  border='0'></a></div></td>
</tr>";
	}    
}

if (isset($_POST['SubmitDelete']))
{

$sqlupadte=mysqli_query($con, "delete from orders where Order_ID='$id' ");

echo "<script language='JavaScript'>
			  alert ('Order Has Been Deleted !');
      </script>";

echo "<script language='JavaScript'>
              document.location='OrdersManagment.php';
      </script>";
}

if (isset($_POST['SubmitNo']))
{
echo "<script language='JavaScript'>
              document.location='OrdersManagment.php';
        </script>";
}
?>