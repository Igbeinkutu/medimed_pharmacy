
<?php
include "include.php";



$c = $_GET['CI'];

global $error;
//global $CI;


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



if(isset($_POST['UpdateSubmit']))
{

$fName=$_POST['fName'];
$lName=$_POST['lName'];
//$No1=$_POST['patient_id'];
$Email=$_POST['Email'];
$Phone=$_POST['Phone'];
$Password=md5($_POST['Password']);
$C_Password = md5($_POST['C_Password']);
$Address=$_POST['Address'];
$DOB=$_POST['DOB'];
$BloodGroup=$_POST['BloodGroup'];
$Gender=$_POST['Gender'];
$allergies = $_POST['allergies'];


if (isValid()==true)
{
$sql=mysqli_query($con, "Update patients set patient_fname='$fName', patient_lname='$lName', patient_gender='$Gender', patient_email='$Email',phone_no='$Phone',patient_address='$Address', DOB='$DOB', Blood_Group='$BloodGroup', patient_password='$Password', allergies = '$allergies' where patient_id='$c' ") or die (mysqli_error($con));



//$No=$row['patient_id'];


echo "<script language='JavaScript'>
alert ('Your Information Has Been Updated !');
              document.location='index.php?CI=$c';
        </script>";



}

}


function isValid()
{
global $fName;
global $Email;
global $Password;
global $C_Password;
global $Address;
global $Phone;
global $error;
global $check;

if  (strlen($Password)<6 )
{
   
echo "<script language='JavaScript'>
			  alert ('Check The Password, It Should Be At Least 6 Character !');
      </script>";
	  
	  return false;
}

if  ($Password != $C_Password)
{
   
echo "<script language='JavaScript'>
			  alert ('Check The Password, It Should Be Matched !');
      </script>";
	  
	  return false;
}

if (!verify_email($Email))
{

echo "<script language='JavaScript'>
			  alert ('Please Check Your Email Syntax !');
      </script>";
return false;

}

if (!verify_name($fName))
{

echo "<script language='JavaScript'>
			  alert ('Please Check Your Name Syntax !');
      </script>";
	  
return false;

}

return true;

}

?>



<html>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>

<style type="text/css">
<!--
.style3 {color: #000000}
.style9 {font-family: Tahoma;
font-size:20px;}
-->


</style>



<body >


<?php
  $sq=mysqli_query($con, "SELECT * from patients where patient_id='$c'") or die("Cannot fetch customers data". mysqli_error($con));
while ($row1=mysqli_fetch_array($sq))
{
$fName=$row1['patient_fname'];
$lName=$row1['patient_lname'];
$No1=$row1['patient_id'];
$Email=$row1['patient_email'];
$Phone=$row1['phone_no'];
$Password=$row1['patient_password'];
$Address=$row1['patient_address'];
$DOB=$row1['DOB'];
$BloodGroup=$row1['Blood_Group'];
$Gender=$row1['patient_gender'];
$allergy = $row1['allergies'];

}
?>

<form name="newad" method="post" enctype="multipart/form-data" action="#">
<div align="center">
  <table width="100%">
    <tr bgcolor="#25AEDE">
      <td  colspan="3" class="style3">&nbsp;</td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="1" height="161">&nbsp;</td>
      <td width="796" align="right" valign="middle">
        <div align="center">
          <table width="454" height="165" border="1">
            <tr>
              <td colspan="2"><div align="center" class="style9"><strong>Your Account Information</strong><br><br><br></div></td>
              
              </tr>
              
            <tr>
              <td width="187">
              
                <div align="center">First Name</div></td>
              <td width="222"><div align="right" class="style9">
                <div align="center">
                  <input type="text" name="fName" value=<?php echo $fName; ?> >
                </div><br>
              </div></td>
            </tr>
			
			<tr>
              <td width="187">
              
                <div align="center">Last Name</div></td>
              <td width="222"><div align="right" class="style9">
                <div align="center">
                  <input type="text" name="lName" value=<?php echo $lName; ?> >
                </div><br>
              </div></td>
            </tr>
            
            <tr>
              <td>
                <div align="center">Email</div></td>
              <td><div align="right" class="style9">
                <div align="center">
                  <input type="text" name="Email" value=<?php echo $Email; ?> >
                </div><br>
              </div></td>
            </tr>
             <tr>
              <td>
                <div align="center">Phone</div></td>
              <td><div align="right" class="style9">
                <div align="center">
                  <input type="tel" name="Phone" value=<?php echo $Phone; ?> >
                </div><br>
              </div></td>
            </tr>
            <tr>
              <td colspan="2"><div align="center" class="style9"><?php echo $error;?></div></td>
              </tr>
              
             <tr>
              <td>
              <div align="center">Address</div>
                </td>
              <td><div align="right" class="style9">
                <div align="center">
                
<textarea name="Address" id="address" cols="27" rows="2" ><?php echo $Address; ?></textarea></div>
<br>
              </div>
              </td>
            </tr>
			<tr>
              <td width="187">
              
                <div align="center">Date of Birth</div></td>
              <td width="222"><div align="right" class="style9">
                <div align="center">
                  <input type="date" name="DOB" value=<?php echo $DOB; ?> >
                </div><br>
              </div></td>
            </tr>
			<tr>
              <td width="187">
              
                <div align="center">Gender</div></td>
              <td width="222"><div align="right" class="style9">
                <div align="center">
                 <select name = 'Gender'>
                  <option <?php if ($Gender == 'Male') echo 'selected'; ?> > Male</option>
                  <option <?php if ($Gender == 'Female') echo 'selected'; ?>> Female </option>
                </select>
                </div><br>
              </div></td>
            </tr>
			<tr>
              <td width="187">
              
                <div align="center">Blood Group</div></td>
              <td width="222"><div align="right" class="style9">
                <div align="center">
                  <select name = 'BloodGroup'>
                <option <?php if ($BloodGroup == 'A+') echo 'selected'; ?>>A+ </option>
                <option <?php if ($BloodGroup == 'B+') echo 'selected'; ?>>B+ </option>
                <option <?php if ($BloodGroup == 'AB+') echo 'selected'; ?>>AB+ </option>
                <option <?php if ($BloodGroup == 'O+') echo 'selected'; ?>>O+ </option>
                <option <?php if ($BloodGroup == 'A-') echo 'selected'; ?>>A- </option>
                <option <?php if ($BloodGroup == 'B-') echo 'selected'; ?>>B- </option>
                <option <?php if ($BloodGroup == 'AB-') echo 'selected'; ?>>AB- </option>
                <option <?php if ($BloodGroup == 'O-') echo 'selected'; ?>>O- </option>
            </select>
                </div><br>
              </div></td>
            </tr>
            <tr>
              <td colspan="2"><div align="center" class="style9"><?php echo $error;?></div></td>
              </tr>
            
               <tr>
              <td>
                <div align="center">Password</div></td>
              <td><div align="right" class="style9">
                <div align="center">
                  <input type="password" name="Password" value='' placeholder="*******">
                </div><br>
              </div></td>
            </tr>
            <br>
             <tr>
              <td>
                <div align="center">Confirm Password</div></td>
              <td><div align="right" class="style9">
                <div align="center">
                  <input type="password" name="C_Password" value='' placeholder="*******">
                </div><br>
              </div></td>
            </tr>
            <tr>
              <td>
                <div align="center">Allergies</div></td>
              <td><div align="right" class="style9">
                <div align="center">
                  <textarea name = 'allergies'> <?php echo $allergy; ?></textarea>
                </div><br>
              </div></td>
            </tr>
            <tr>
              <td colspan="2"><div align="center" class="style9"><?php echo $error;?></div></td>
              </tr>
            <tr>
              <td colspan="2"><div align="center">
              <br>
                <input name="UpdateSubmit" type="submit" id="SubmitReg" value="Update My Account Information">
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
