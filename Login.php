<?php
session_start();

include "include.php";


if ($_SERVER["REQUEST_METHOD"] == "POST")
{

$Username=trim($_POST['Username']);
$Password= trim(md5($_POST['Password']));

$sql=mysqli_query($con, "SELECT * from administrators where admin_username ='$Username' and admin_password= '$Password' AND status = 'available'") or die ("Error".mysql_error($con));

if (mysqli_num_rows($sql)>0)
{

$row=mysqli_fetch_array($sql);
$ID=$row['admin_id'];
$role = $row['role'];
if($role == 'Super Admin'){

   $_SESSION['Sadmin'] = $ID;
 
}
$_SESSION['Log'] = $ID;

echo 'Redirecting ...
        <script language="JavaScript">
            document.location="admin/index.php";
        </script>';
}
else
{

echo '<script language="JavaScript">
	  alert ("Error ... Please Check Your Username Or Password !"+"text ");
      </script>';

}

}
?>
 


<html>
<head>
<title>Pharmacy Systems - 
Administration System Login</title>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />
<link rel="shortcut icon" href="css/icon.jpg"/>



<style type='text/css'>
.style1 {
	direction: rtl;
	background-color: #fff;
}
.style2 {
	font-family: Tahoma;
}
.style3 {
	font-size: 11pt;
}
.style4 {
	text-align: center;
}
.style6 {
	text-decoration: none;
}
a {
	color: #000000;
}
.style5 {
	color: #C0C0C0;
	font-family: Verdana;
	font-size: 10pt;
}
body {
	background-image: url(images/top-bg.gif);
	background-repeat: no-repeat;
}
</style>
</head>
<body style='background-color: #f5f4f0'>
<script language="javascript">
<!--
function memloginvalidate()
{
   if(document.LoginForm.Username.value == "")
     {
        alert("Please Enter User Name !");
        document.LoginForm.Username.focus();
        return false;
     }
   if(document.LoginForm.Password.value == "")
     {
        alert("Please Enter Password !");
        document.LoginForm.Password.focus();
        return false;
     }
	 
}

//-->
</script>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<center><h2>Pharmacy Systems - Administration Login</h2></center>
<p>&nbsp;</p>

<center>

<form action ='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' id="LoginForm" method='POST' onSubmit="return memloginvalidate()" >

UserName : <input id='Username' placeholder="Username" name='Username' type='text' required style='width: 231px'/ style="text-align:right">
<br>
<br>
<br>
Password : <input id='Password' placeholder="Password" name='Password' type='password' style='width: 231px' required/>
<br>
<br>
<br>
<input name='action' type='submit' value='Login' style='width: 150px; padding-left: 5px;' />

</form>

</center>

</body>
</html>