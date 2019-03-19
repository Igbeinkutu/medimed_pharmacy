<?php
include "../include.php";

session_start();
$no=$_SESSION['Log'];


$ErrorMsg='';



$sql=mysqli_query($con, "SELECT * from administrators") or die ("error in selecting database ".mysqli_error($con));
$row=mysqli_fetch_array($sql);
$pass=$row['admin_password'];


if(isset($_POST['Submit']))
{
  $old=md5($_POST['txtold']);
  $new=$_POST['txtnew'];
  $confirm=$_POST['txtconfirmation'];
  
 
   
  if ($pass==$old)
  {
    if ($new==$confirm and $new!=null and $confirm!=null)
    {
		
		$f_new=md5($confirm);
       $sql=mysqli_query($con, "update administrators set admin_password='$f_new'") or die ("error in adding ".mysqli_error($con));

	echo "<script language='JavaScript'>
			  alert ('Password Has Been Changed !');
      </script>";
	  
	  echo "<script language='JavaScript'>
             document.location='OrdersManagment.php';
        </script>";

    
	}
    else
    {
echo "<script language='JavaScript'>
			  alert ('Passwords Does Not Match !');
      </script>";    
	  }}
	  else
	  {
		  echo "<script language='JavaScript'>
			  alert ('Administrator\'s Old Password is Not Correct !');
      </script>";
	  }
  }


echo"
<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN'
'http://www.w3.org/TR/html4/loose.dtd'>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
<style type='text/css'>
<!--
.style1 {font-family: Tahoma}
-->
</style>


</head>

<body>
<form name='newad' method='post' enctype='multipart/form-data' action='Admin_ChangePassword.php'>

<div align='center'>

  <h3><p align='center'>Administration Change Password</p></h3>

  <table width='349' height='178' border='1'>
   
    <tr>
          <td width='185'><div align='center'><span class='style1'>Old Password</span></div></td>

      <td width='160'><div align='center'><span class='style1'>
      <input name='txtold' type='password' id='txtold4'> *
</span></div></td>
    </tr>
    <tr>
          <td><div align='center'><span class='style1'>New Password</span></div></td>

      <td><div align='center'><span class='style1'>
      <input name='txtnew' type='password' id='txtold22'> *
</span></div></td>
    </tr>
    <tr>
          <td><div align='center'><span class='style1'>Confirm New Password </span></div></td>

      <td><div align='center'><span class='style1'>
      <input name='txtconfirmation' type='password' id='txtold32'> *
</span></div></td>
    </tr>
    <tr>
      <td colspan='2'><div align='center'><span class='style1'>
        <input type='submit' name='Submit' value='Change Password'>
      </span></div></td>
    </tr>
    <tr>
      <td colspan='2'><div align='center'><span class='style1'>$ErrorMsg</span></div></td>
    </tr>
  </table>
</div>
</form>
</body>
</html>

";


?>
