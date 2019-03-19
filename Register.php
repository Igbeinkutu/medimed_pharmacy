<?php
include "include.php";

global $error;
function verify_email($email){

    if(!preg_match('/^[_A-z0-9-]+((\.|\+)[_A-z0-9-]+)*@[A-z0-9-]+(\.[A-z0-9-]+)*(\.[A-z]{2,4})$/',$email)){
        return false;
    } else {
        return $email;
    }
}

function verify_name($fName){

	  if(preg_match("#^[-A-Za-z' ]*$#",$fName)) {
	  return $fName;
	}else {
	  return false;
	}  
}

if(isset($_POST['SubmitReg']))
{
$fName= trim($_POST['fName']);
$lName= trim($_POST['lName']);
$gender = trim($_POST['gender']);
$phone123 = trim($_POST['phone']);
$email123= trim($_POST['email']);
$Password11= md5($_POST['Password']);
$Password1= trim($Password11);
$address= trim($_POST['address']);
$repword1 = md5($_POST['re_pword']);
$repword = trim($repword1);
$dob = $_POST['dob'];
$bloodGroup = $_POST['bloodgrp'];
$allergies = $_POST['allergies'];

$username = trim($_POST['username']);


$error="";

if (isValid()==true)
{
$sql=mysqli_query($con, "insert Into patients (patient_fname, patient_lname, patient_gender, phone_no, patient_email, patient_address, DOB, Blood_Group, patient_password, allergies, username) values('$fName','$lName','$gender','$phone123', '$email123', '$address', '$dob', '$bloodGroup', '$Password1', '$allergies', '$username') ") or die (mysqli_error($con));

$sql=mysqli_query($con, "SELECT * from patients where patient_email='$email123' OR phone_no = '$phone123' OR username = '$username' ") or die ("Error In Select ".mysqli_error($con));
$row=mysqli_fetch_array($sql);

$No=$row['patient_id'];


echo "<script language='JavaScript'>
alert ('Registration successful !');
              document.location='index.php';
        </script>";
}

}

function isValid()
{
global $fName;
global $email123;
global $Password1;
global $phone123;
global $address;
global $error;
global $check;
global $repword;
global $username;

/*if  (strlen($Password1)<6 )
{
   $error= "<div align='center'><strong>Please Must Be At Least 6 Character </strong>";
   
echo "<script language='JavaScript'>
			  alert ('Check The Password, It Should Be At Least 6 Character !');
      </script>";   
   
return false;
}

else */if ( $Password1 != $repword){
	
	$error= "<div align='center'><strong>Passwords do not match !</strong>";

echo "<script language='JavaScript'>
			  alert ('Passwords do not match!');
      </script>";
return false;
}

 if (!verify_name($fName))
{
$error= "<div align='center' style='color:#F00'><strong>Please Check Your Name Syntax !</strong>";

echo "<script language='JavaScript'>
			  alert ('Please Check Your Name Syntax !');
      </script>";
	  
return false;

}
global $con;
$q1 = "SELECT * from patients where patient_email='$email123' OR phone_no = '$phone123' OR username = '$username'";

$sql123=mysqli_query($con, $q1) or die (mysqli_error($con));

if (mysqli_num_rows($sql123)<0)
{
    $error= "<div align='center'><strong>This Email or Phone Already Exists !</strong></div>";
	
echo "<script language='JavaScript'>
			  alert ('This email or phone already exists!');
      </script>";	
	
return false;

}
else 
	return true;
}

?>

<html>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>

<style type="text/css">
<!--
.style3 {color: #000000}
.style9 {font-family: Tahoma}
-->
</style>

<body >
<form name="newad" method="post" enctype="multipart/form-data" action="index.php?main=reg">
<div align="center">
  <table width="100%" border="0" cellpadding="3" cellspacing="20">
    <tr bgcolor="#25AEDE">
      <td  colspan="3" class="style3">&nbsp;</td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="1" height="161">&nbsp;</td>
      <td width="796" align="right" valign="middle">
        <div align="center">
          <table id ="table_register" border="0" cellpadding="3" cellspacing="0">
            <tr>
              <td>
                First Name: </td>
				<td>
                  <input type="text" name="fName" value="" required/> <strong style="color:red">*</strong>  
				</td>
            </tr>
            
            <tr>
              <td>
                Last Name: </td>
				<td>
                  <input type="text" name="lName" value="" required/> <strong style="color:red">*</strong>  
				</td>
            </tr>
			
			<tr>
				<td>
					Gender:
				</td>
				<td>
					<select name = "gender">
						<option value = "">-- select gender --</option>
						<option value = "Male"> Male </option>
						<option value = "Female"> Female </option>
					</select>
				</td>
			
			</tr>
			
            <tr>
              <td>
                Email: </td>
				<td>
                  <input type="email" name="email" value=""/>  
				</td>
            </tr>
             
             <tr>
              <td>
                Phone: </td>
				<td>
                  <input type="tel" name="phone" value=""/> <strong style="color:red">*</strong>  
				</td>
            </tr>

            <td>
                Name and Phone: </td>
        <td>
                  <input type="text" name="username" value="" title="Enter name and phone as username" />  
        </td>
            </tr>
			
             <tr>
              <td>
				Address:
			  </td>
              <td>
				<textarea name="address" id="address" cols="25" rows="2"/></textarea> <strong style="color:red">*</strong>
              </td>
            </tr>
			
			<tr>
              <td width="187">
                Date of Birth: </td>
				<td width="222">
                  <input type="date" name="dob" value=""> 
				</td>
            </tr>
			
			<tr>
              <td width="187">
                Blood Group: </td>
				<td width="222">
              <select name="bloodgrp">
                <option value = "">-- Select blood group --</option>
                <option value = "A+">A+ </option>
                <option value = "B+">B+ </option>
                <option value = "AB+">AB+ </option>
                <option value = "O+">O+ </option>
                <option value = "A-">A- </option>
                <option value = "B-">B- </option>
                <option value = "AB-">AB- </option>
                <option value = "O-">O- </option>

              </select>
                  
				</td>
            </tr>
			
			<tr>
              <td width="187">
                Password: </td>
				<td width="222">
                  <input type="password" name="Password"  required/> <strong style="color:red">*</strong>  
				</td>
            </tr>
			
			<tr>
              <td width="187">
                Re-Enter Password: </td>
				<td width="222">
                  <input type="password" name="re_pword" required/> <strong style="color:red">*</strong>  
				</td>
            </tr>
			
            <tr>
              <td colspan="2"><div align="center" class="style9"><?php echo $error;?></div></td>
              </tr>
              <tr>
              <td>Allergies</td>
              <td>
                  <textarea name = 'allergies'></textarea><br></td>
            </tr>
            <tr>
              <td colspan="2"><div align="center">
              <p><strong style="color:red">Note :</strong> Please Fill All The Fields That Have <strong style="color:red">( * )</strong> Behind Them !.</p>
                <p> <br>
                <input name="SubmitReg" type="submit" id="SubmitReg" value="<?php echo $lang['Sign_Up']; ?>">
              </div></td>
            </tr>
          </table>
        </div></td>
      <td width="1"><div align="right"></div></td>
    </tr>
    <tr bgcolor="#25AEDE" >
      <td height="21" colspan="3"><div align="center" name="foo" id="foo"></div></td>
    </tr>
  </table>
</div>
</form>
</body>
</html>
