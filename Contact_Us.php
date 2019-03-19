<div class='center_title_bar'><?php echo $lang['Contact_Us']; ?>

<?php
include "include.php";

include_once 'lang/common.php';

if(isset($_POST['SubmitContact']))
{
$fName=$_POST['fName'];
$lName=$_POST['lName'];
$Email=$_POST['txtMail'];
$Phone=$_POST['txtNumber'];
$Date=date("d-m-Y");
$Area=$_POST['tarea'];
$Time=date('Y-m-d H:i:s');
$ip=$_SERVER['REMOTE_ADDR'];
$type=$_POST['select'];

$timeDate=$Date." ".$Time;

	if (isValid()==true){

$sql=mysqli_query($con, "Insert Into contact_us(CU_Fname, CU_Lname, CU_Email,CU_Type,CU_Description,CU_Date_Time,CU_IPAddress,CU_Phone) values ('$fName', '$lName', '$Email','$type','$Area','$Time','$ip','$Phone') ") or die (mysqli_error($con));


echo "<script language='JavaScript'>
alert ('Your Message Is Sent Successfully !');
        </script>";

	}
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function isValid()
{
	global $Email;

	$email = test_input($Email);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
	  echo "<script language='JavaScript'>
			  alert ($emailErr);
      </script>";
        return false;
    } else {
        return true;
    }
}
?>

<html>
<head>

<style type="text/css">
<!--
.stylecontact {font:Tahoma}
.style1 {font-family: Tahoma ; color:#000000}
.style2 {font-size: 14px}
.style3 {font-family: Tahoma; font-size: 16px; }
.style4 {font-family: Verdana, Arial, Helvetica, sans-serif}
-->
</style>
</head>
<body>
<div align='center' dir="rtl">
  <form name='frmContact' action="index.php?main=Contact_Us" method='POST'>
  <table width='100%' border='0' cellpadding="0" cellspacing="1">

    <tr>
<br>
    </tr>
    <tr>
    <td height="31"><div align='right' class="style1Contact">
	        <div align="left">
	          * <input type='text' name='fName' style='width: 200px' required/> 
            </div>
    </div></td>
      <td><div align='center' class="style2 style1">:<?php echo "First Name"; ?></div></td>

    </tr>
	
	 <tr>
    <td height="31"><div align='right' class="style1Contact">
	        <div align="left">
	          * <input type='text' name='lName' style='width: 200px' required/> 
            </div>
    </div></td>
      <td><div align='center' class="style2 style1">:<?php echo "Last Name"; ?></div></td>

    </tr>

    <tr>
    <td height="34"><div align='right' class="style1Contact">
      <div align="left">
        * <input type='text' name='txtNumber' style='width: 200px'> 
      </div>
    </div></td>
      <td><div align='center' class="style2 style1">:<?php echo $lang['Phone']; ?></div></td>

    </tr>

    <tr>
     <td height="43"><div class="style1Contact">
         <div align="left">
            * <select name="select" > 
               <option value="Inquiry" selected>Query </option>
               <option value="Report Abuse">Report</option>
               <option value="Report error ">Error in Site</option>
		       <option value="Service request ">Request Services</option>
		       <option value="Job Application ">Request Job 
               <option value="Other">Other</option>
               </option>
		       
       </select>
         </div>
     </div></td>
      <td><div align='center' class="style2 style1">:<?php echo $lang['Type']; ?></div></td>

    </tr>


    <tr valign="middle">
       <td height="37" align="center" valign="top"><div align='center'>
         <p align="left">
         * <input type='email' name='txtMail' style='width: 200px'> 
</p>
         </div></td>
      <td><div align='center' class="style2 style1">:<?php echo $lang['Email']; ?></div></td>

    </tr>



       <tr>
         <td>
           <div align="left">
                * <textarea name='tarea' style='width: 350px; height: 50px' required></textarea> 
           </div></td><td><div align='center' class="style2 style1">:<?php echo $lang['Your_Msg']; ?></div></td>

    </tr>

    <tr>
      <td colspan='2'><div align='center'>
        <input type='submit' name='SubmitContact' value='<?php echo $lang['Send']; ?>'>
      </div></td>
    </tr>
   <tr>
      <td colspan='2'><div align='center'>
      </div></td>
    </tr>
  </table>
  </form>
  <p class="style4">&nbsp;</p>
</div>
</div>
</body>