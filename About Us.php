
<?php

if(!isset($_SESSION['patient_id'])){

		echo "<script language='JavaScript'>
		alert ('Patient is not logged in!');
              document.location='index.php';
        </script>";

        }

	include("include.php");
	$memberNo=$_SESSION['patient_id'];

	$sq=mysqli_query($con, "SELECT * from patients where patient_id='$memberNo'") or die("Cannot fetch customers data". mysqli_error($con));
$row1=mysqli_fetch_array($sq);

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

echo "<Table width= '100%' style='padding: 15px;'> 
	<tr bgcolor='#25AEDE'> <th colspan='2' ><p align='center'>  Patient's Details: </p></th></tr>
	<tr>
	<td>Patient's name </td>
	<td>$fName  $lName</td>
	</tr>

	<tr>
	<td>Email: </td>
	<td>$Email </td>
	</tr>

	<tr>
	<td>Phone Number </td>
	<td> $Phone</td>
	</tr>

	<tr>
	<td>Address </td>
	<td>$Address </td>
	</tr>

	<tr>
	<td>Date of Birth </td>
	<td>$DOB </td>
	</tr>

	<tr>
	<td> Blood Group</td>
	<td>$BloodGroup </td>
	</tr>

	<tr>
	<td>Gender </td>
	<td>$Gender </td>
	</tr>

	<tr>
	<td>Allergy </td>
	<td>$allergy </td>
	</tr>

	</Table>";

?>

