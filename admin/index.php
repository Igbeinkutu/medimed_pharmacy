<?php
session_start();
include "../include.php";

$AdminNo=$_SESSION['Log'];

if (!isset($_SESSION['Log']))
echo '
<script language="JavaScript">
 document.location="../Login.php";
</script>';


if(isset($_GET["main"])){

	$rubrique = $_GET["main"];


switch ($rubrique){

case "logout";
unset($_SESSION["Log"]);
unset($_SESSION['Sadmin']);
 
echo '
        <script language="JavaScript">
            document.location="../Login.php";
        </script>';

break;

}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>

<head>
<meta charset="utf-8">
<meta http-equiv='Content-Type' content='text/html; charset=windows-1256'>

<link rel="stylesheet" type="text/css" href="css/default.css" media="screen"/>
	<title>Medi med Pharmacy - Administration</title>
<link rel="shortcut icon" href="css/icon.jpg"/>

<style type="text/css">
<!--
.style1 {font-family: Tahoma}
.style2 {
	font-weight: bold;
	font-size: 14px;
	color: #FFFFFF;
}
.style3 {
	font-family: Tahoma;
	font-weight: bold;
	font-size: 14px;
	color: #FFFFFF;
}
.style4 {color: #FFFFFF}
body {
	background-image: url(../images/top-bg.gif);
}
-->
</style>

</head>

<body bgcolor="#0066FF">

<div class="left">
<br />
<br />
<br />
<br />
	<div class="header">
		<h2>&nbsp;</h2>
		<h1>Pharmacy Systems<br />Administration Corner</h1>
 	</div>  
<br />
<br />
<br />
<br />

<div class="content">
		<iframe width="850px" height="246px" src="OrdersManagment.php" name="I1" frameborder="0">Administration Content</iframe>
</div>

</div>

<div class="right">


  	<div class="subnav">
		<h1 align="center" class="style1">Administration Menu</h1>
	    <ul>
		<li>
		<div align="center" class="style2"></div>         
		</li>

<li class="style2">
	    <div align="center"><span class="style1"><a href="../index.php" target="_blank"><span class="style15">Patient Area</span></a></span></div>
			</li>    
        
        
        <li class="style2">
	    <div align="center"><span class="style1"><a href="OrdersManagment.php" target="I1"><span class="style15">Orders Management</span></a></span></div>
			</li>
            
            
              
                
<li class="style2">
			  <div align="center"><span class="style1"><a href="CategoryManagment.php" target="I1"><span class="style15">Category Management</span></a></span></div>
	    </li>

<li class='style2'>
			  <div align='center'><span class='style1'><a href='ProductsManagment.php' target='I1'><span class='style15'>Products Management</span></a></span></div>
	    </li>
        
	    

<li class="style2">
	    <div align="center"><span class="style1"><a href="ContactUsManagment.php" target="I1"><span class="style15">Contact Us Management</span></a></span></div>
			</li>
        
<li class="style2">
	    <div align="center"><span class="style1"><a href="Admin_ChangePassword.php" target="I1"><span class="style15">Change Password</span></a></span></div>
			</li>
			<li class="style2">
	    <div align="center"><span class="style1"><a href="low_stock.php" target="I1"><span class="style15">Running out of stock</span></a></span></div>
			</li>

<li class="style2">
	    <div align="center"><span class="style1"><a href="FollowUpList.php" target="I1"><span class="style15">Follow ups</span></a></span></div>
			</li>

			<li class="style2">
	    <div align="center"><span class="style1"><a href="vaccine_schedule.php" target="I1"><span class="style15">Vaccination Schedule</span></a></span></div>
			</li>

        <?php if(isset($_SESSION['Sadmin'])){

        	echo"
		<li class='style2'>
			<div align='center'><span class='style1'><a href='CustomersManagment.php' target='I1'><span class='style15'>Patients Management</span></a></span></div>
	    </li>

        <li class='style2'>
	    	<div align='center'><span class='style1'><a href='AreasManagment.php' target='I1'><span class='style15'>Branch Management</span></a></span></div>
		</li>    
            
		<li class='style2' align='center'><a href='AdminManagement.php' class='nav6' target='I1'> Admin Management </a></li>
";
		  	}
		  	 ?>

<li class='style4'>
		<div align='center'><span class='style3'><a href='index.php?main=logout' target='_parent'>Log Out</a></span></div>
		  	</li> 
</ul>

  </div>

</div>
</body>

</html>