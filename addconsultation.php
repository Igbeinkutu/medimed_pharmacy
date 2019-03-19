<?php

	include "include.php";


if (isset($_POST['visit']))
{
	$temperature = $_POST['temp'];
	$weight = $_POST['weight'];
	$bp = $_POST['pressure'];
	$symptoms = $_POST['symptoms'];
	$diagnosis = $_POST['diagnosis'];
	$prescription = $_POST['pres'];
	$misc_note = $_POST['misc'];

	$admin_id = $_SESSION['Log'];
	$pat_id = $_SESSION['patient_id'];
	$Date = date('Y-m-d H:i:s');

	$query = mysqli_query($con, "insert into encounters (pat_id, admin_id, date_of_visit, reason_for_visit, temperature, weight, bp, diagnosis, prescription, misc_notes) VALUES('$pat_id', '$admin_id', '$Date', '$symptoms', '$temperature', '$weight', '$bp', '$diagnosis', '$prescription', '$misc_note' )") or die("Cannot enter details: ".mysqli_error($con));

	echo "<script language='JavaScript'>
		alert ('Consultation Notes added!');
              document.location='index.php';
        </script>";
}

?>
<div align="center">

<form action="index.php?main=addencounter" method = "POST" enctype="multipart/form-data"  id = 'encounter'>
	
	<p style="font-size: 13px"><b>Consultation:</b></p><br/>

	<table width="100%" border='5px' style="cell-spacing:15px; padding:15px ">
		<thead><tr><th colspan="2" align="center"></th></tr></thead>
		<tfoot></tfoot>
		<tbody>
			<tr>
				<td>Temperature</td>
				<td><input type="text" name="temp" />&nbsp;&deg;C</td> 
			</tr>
			<tr>
				<td>Weight</td>
				<td><input type="text" name="weight"  />&nbsp;kg</td> 
			</tr>
			<tr>
				<td>Blood Pressure</td>
				<td><input type="text" name="pressure" />&nbsp;mm/Hg</td> 
			</tr>
			<tr>
				<td>Reason for Visit/Symptoms </td>
				<td><textarea name="symptoms" id="symptoms" rows="5" cols="30" placeholder="Enter Reason for Visit or Symptoms "></textarea></td>
			</tr>
			
			<tr>
				<td>Diagnosis</td>
				<td><textarea name="diagnosis" id="diagnosis" rows="7" cols="30" placeholder="Enter Diagnosis"></textarea></td>
			</tr>
			<tr>
				<td>Prescription</td>
				<td><textarea name="pres" id="pres" rows="7" cols="30" placeholder="Enter Prescription"></textarea></td>
			</tr>

			<tr>
				<td>Miscellaneous Notes</td>
				<td><textarea name="misc" id="misc" rows="5" cols="30" placeholder="Enter observations and additional notes"></textarea></td>
			</tr>
			<tr>
				<td colspan="2" style="width: 100%; text-align: center" ><br/><input type="submit" name="visit" value="Save" /></td>
			</tr>
		</tbody>

	</table>
</form>
</div>