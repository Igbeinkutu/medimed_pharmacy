<link rel="stylesheet" type="text/css" href="css/datepicker.css" /> 
<script type="text/javascript" src="js/datepicker.js"></script>
<script type="text/javascript" src="js/timepicker.js"></script>

<?php
include("../include.php");
if (isset($_POST['SearchBTN']))
{
  $txtSearch=$_POST['searchMedicine'];
           
           echo "<script language='JavaScript'>
              document.location='searchMedicines.php?txt=$txtSearch';
        </script>";
}

if (isset($_GET['main']) AND isset($_GET['id'])){
$op=$_GET['main'];
$ID=$_GET['id'];



if ($op=='update')
{

$sql=mysqli_query($con, "select * from medicines where Medicine_ID='$ID' ");
$updatevalue=mysqli_fetch_array($sql);

$title1=$updatevalue['Medicine_Name'];
$Description=$updatevalue['Medicine_Description'];
$act=$updatevalue['Active'];
$pic=$updatevalue['Medicine_Picture'];
$Category=$updatevalue['Medicine_Category'];
$price=$updatevalue['Medicine_Price'];
$Add_Date=$updatevalue['Medicine_Add_Date'];
$Exp_Date=$updatevalue['Medicine_Exp_Date'];
$Qnt=$updatevalue['Medicine_Qnt'];




echo "
<style type='text/css'>
<!--
.style1 {font-family: Tahoma}
-->
</style>
<form action='ProductsManagment.php?id=$ID' method='POST' class='style2' >

<div align='right'>
  <table width='100%'  border='1' dir='ltr'>
    <tr bgcolor='#CCCCCC'>
      <td colspan='5'><div align='center' class='style3 style4 style1' >Update Medicine Information</div>        </td>
  </tr>
    <tr>
	

	      <td width='30%' bgcolor='#CCCCCC'><span class='style1'>Medicine Name</span></td>
		
	    <td>
        <div align='center' class='style1'>
<img src='$pic' width='100' height='100'/>      </div></td>
      <td colspan='4'>
        <div align='center' class='style1'>
          <input name='name' type='text' id='txttitle1' value='$title1' size='60' style='text-align:left' required/>
      </div></td>
    </tr>
	
	<tr>
	      <td width='30%' bgcolor='#CCCCCC'><span class='style1'>Medicine Category</span></td>

      <td colspan='4'>
        <div align='center' class='style1'>
";

?>
<?php

 echo "<select name='category'>";

							  
$sqluPDATE1=mysqli_query($con, "select * from categories ") or die ('error in select '.mysqli_error($con));
while ($row11=mysqli_fetch_array($sqluPDATE1))
{
$No=$row11['Category_ID'];
$Name=$row11['Category_Name'];

		 echo '<option value='."$No".'>'."$Name".'</option>';
	}							  

       echo "</select>";
		?>      
        
 <?php
 echo"       
        
        
        </div></td>
    </tr>
	<tr>
	      <td width='30%' bgcolor='#CCCCCC'><span class='style1'>Medicine Exp_Date</span></td>

      <td colspan='4'>
        <div align='center' class='style1'>
          <input id='start_dt' name='Exp_Date'  size='11' title='DD-MM-YYYY' type='date' value='$Exp_Date'  style='text-align:left' required/>
		  

      </div></td>
    </tr>
<tr>
      <td bgcolor='#CCCCCC'><span class='style1'>Medicine Descriptions</span></td>

      <td colspan='4'>
	 
        <div align='center' class='style1'>
          <textarea name='m_description' cols='50' rows='7' style='text-align:left'>$Description</textarea>
      </div></td>
    </tr>

  <tr>
        <td width='30%' bgcolor='#CCCCCC'><span class='style1'>Medicine Qnt</span></td>

      <td colspan='4'>
        <div align='center' class='style1'>
          <input name='Qnt' type='text' id='txtprice' value='$Qnt' size='60' style='text-align:left' required/>
      </div></td>
    </tr>
	
	    <tr>
		      <td width='30%' bgcolor='#CCCCCC'><span class='style1'>Medicine Price</span></td>

      <td colspan='4'>
        <div align='center' class='style1'>
          <input name='price' type='text' id='txtprice' value='$price' size='60' style='text-align:left' required/>
      </div></td>
    </tr>

	


    <tr bgcolor='#CCCCCC'>
      <td colspan='5'><div align='center'>
        <input type='submit' name='SubmitUpdate' value='Update Medicine Information'>
      </div></td>

  </table>
</div>";
}
elseif($op=='delete')
{

$sql=mysqli_query($con, "select * from medicines  where Medicine_ID='$ID' ");
$upadtevalue=mysqli_fetch_array($sql);

$Name=$upadtevalue['Medicine_Name'];
$Picture=$upadtevalue['Medicine_Picture'];

echo "
<form action='ProductsManagment.php?id=$ID' method='POST' class='style2' >
<style type='text/css'>
<!--
.style1 {font-family: Tahoma}
-->
</style>
<form action='index.php?module=talents' method='POST' class='style2' >
<div align='right'>
  <table width='100%'  border='1' dir='ltr'>
    <tr bgcolor='#06F'>
      <td colspan='2'><div align='center' class='style3 style4 style1' >Delete Medicine</div>        </td>
  </tr>
    <tr>
	      <td width='30%' bgcolor='#CCCCCC' align='center'><span class='style1'>Medicine Name</span></td>

      <td width='70%'>
        <div align='center' class='style1'>
$Name      </div></td>
    </tr>
	
    <tr>
	      <td bgcolor='#CCCCCC' align='center'><span class='style1'>Medicine Picture</span></td>

      <td>
        <div align='center' class='style1'>
<img src='$Picture' width='100' height='100'/>      </div></td>
    </tr>
    <tr valign='middle'>
      <td colspan='2'><div align='center'></div>
        <div align='center' class='style1'><img src='images/trash_full.png' width='39' height='35'>Are you sure you want to delete the medicine ?</div></td>
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
<div align='center'>
  <h3><p align='center'>Medicines Management</p></h3>

  <form action='ProductsManagment.php' method='post'>
        Search: <input type='text' name='searchMedicine' title='Search medicines'>
        <input type='submit' style='background-image:url(../images/search.gif) ; width:29px ; height:26px ; border:0; padding-bottom:10px; ' value=''   name='SearchBTN'/>
              </form>

<div align='left' class='style3'><a href='Add_New_Product.php'>Add New Medicine</a></div>
  <table width='100%'  border='1' >
    <tr bgcolor='#fff'>

      <td ><div align='center' class='style3 style4'>Medicine Name</div></td>
	  
	        <td ><div align='center' class='style3 style4'>Medicine Picture</div></td>


  <td ><div align='center'><span class='style6'><strong>Activate</strong></span></div></td>

	<td ><div align='center'><span class='style6'><strong>Deactivate</strong></span></div></td>

	    <td ><div align='center'><span class='style6'><strong>Medicine Status</strong></span></div></td>

	    <td ><div align='center'><span class='style6'><strong>Medicine Qnt</strong></span></div></td>
		
			    <td ><div align='center'><span class='style6'><strong>Medicine Price</strong></span></div></td>

		
			    <td ><div align='center'><span class='style6'><strong>Medicine Exp Date</strong></span></div></td>


      <td ><div align='center' class='style6'><strong>Edit Medicine Information</strong></div></td>

  <td ><div align='center' class='style6'><strong>Delete Medicine</strong></div></td>
    </tr>");


    $q=mysqli_query ($con, "select * from medicines");
	while($result=mysqli_fetch_array($q))
	{
	$id=$result['Medicine_ID'];
	$title=$result['Medicine_Name'];
	$m_pic=$result['Medicine_Picture'];
	$Qnt=$result['Medicine_Qnt'];
	$Exp_Date=$result['Medicine_Exp_Date'];
	$P=$result['Medicine_Price'];


		$active=$result['Active'];
		if ($active==0)
		$pic='images/inactive.png';
		else
		$pic='images/active.png';

	echo "

<tr>

      <td><div align='center' class='style3'>$title</div></td>
	   <td><div align='center'><img src='$m_pic' width='75' height='75' border='0'></div></td>
       <td><div align='center'><a href='ProductsManagment.php?main=active&id=$id' ><img src='images/new.png' width='20' height='20' border='0'></a></div></td>
	   <td><div align='center'><a href='ProductsManagment.php?main=inactive&id=$id' ><img src='images/inactive.png' width='20' height='20' border='0'></a></div></td>
	   
	   	  <td><div align='center'><img src=$pic width='20' height='20'/></div></td>


	        <td><div align='center'>$Qnt</div></td>
				        <td><div align='center'>$P</div></td>

			<td><div align='center'>$Exp_Date</div></td>

      <td><div align='center'><a href='ProductsManagment.php?main=update&id=$id'><img src='images/edit.png' width='18' height='15' border='0'></a></div></td>
	  
	  <td><div align='center'><a href='ProductsManagment.php?main=delete&id=$id'><img src='images/delete.png' width='18' height='15' border='0'></a></div></td>
	  
	  
    </tr>";
	}



    echo (" </table>
 


</div>");
}


if (isset($_POST['SubmitUpdate']))
{
$t0=$_POST['name'];
$tc=$_POST['category'];
$td=$_POST['m_description'];
$t3=$_POST['price'];
$t4=$_POST['Exp_Date'];
$t5=$_POST['Qnt'];

$ID=$_GET['id'];


$sqlupadte=mysqli_query($con, "update medicines set Medicine_Name='$t0',Medicine_Description='$td',Medicine_Category='$tc' ,Active='1' ,Medicine_Price='$t3',Medicine_Exp_Date='$t4',Medicine_Qnt='$t5' where Medicine_ID='$ID' ") or die ("error".mysqli_error($con));

echo "<script language='JavaScript'>
			  alert ('A Medicine Information Has Been Updated !');
      </script>";


echo "<script language='JavaScript'>
            document.location='ProductsManagment.php';
        </script>";

}

if (isset($_POST['SubmitDelete']))
{

$ID=$_GET['id'];

$sqlupadte=mysqli_query($con, "delete from medicines  where Medicine_ID='$ID' ");


echo "<script language='JavaScript'>
			  alert ('A Medicine Has Been Deleted !');
      </script>";

echo "<script language='JavaScript'>
             document.location='ProductsManagment.php';
        </script>";
}


if (isset($_POST['SubmitNo']))
{

echo "<script language='JavaScript'>
              document.location='ProductsManagment.php';
        </script>";
}

if (isset($_GET['main']) AND isset($_GET['id'])){

if ($op=='active')
{
$sqlupadte=mysqli_query($con, "update medicines set Active='1' where Medicine_ID='$ID' ");

echo "<script language='JavaScript'>
   document.location='ProductsManagment.php';
        </script>";

}

if ($op=='inactive')
{

$sqlupadte=mysqli_query($con, "update medicines set Active='0' where Medicine_ID='$ID' ");

echo "<script language='JavaScript'>
              document.location='ProductsManagment.php';
        </script>";

}
}
?>
<script type="text/javascript" src="datepickr.min.js"></script>
		<script type="text/javascript">
						
			new datepickr('datepick2', {
				'dateFormat': 'Y-m-d'
			});
			
		</script>