
<?php

	include "include.php";

	$patient_id = $_SESSION['patient_id'];

	if(isset($_POST['visit'])){

		$temperature = $_POST['temp'];
		$weight = $_POST['weight'];
		$bp = $_POST['pressure'];
		$symptoms = $_POST['symptoms'];
		$diagnosis = $_POST['diagnosis'];
		$prescription = $_POST['pres'];
		$misc_note = $_POST['misc'];
		$lastenc_id = $_POST['lastenc_id'];


		$updateQuery = mysqli_query($con, "UPDATE encounters SET temperature = '$temperature', weight = '$weight', bp = '$bp', diagnosis = '$diagnosis', prescription = '$prescription', misc_notes = '$misc_note' WHERE  encounter_id = '$lastenc_id'  ") or die("Cannot update table ".mysqli_error($con));

		echo "<script language='JavaScript'>
		alert ('Consultation Notes updated!');
              document.location='index.php?main=viewlastencounter';
        </script>";
	}

	$query = mysqli_query($con, "SELECT * FROM encounters WHERE pat_id = '$patient_id' ORDER BY encounter_id DESC") or die("Cannot fetch data ".mysqli_error($con));
	$row = mysqli_fetch_array($query);

	$Temperature = $row['temperature'];
	$weight = $row['weight'];
	$bp = $row['bp'];
	$symptoms = $row['reason_for_visit'];
	$diagnosis = $row['diagnosis'];
	$prescription = $row['prescription'];
	$misc_notes = $row['misc_notes'];
	$lastEnc_id = $row['encounter_id'];

	echo "<div align='center'>

<form action='index.php?main=editlastencounter' method = 'POST' enctype='multipart/form-data'  id = 'encounter'>
	
	<p style='font-size: 13px'><b>Edit last Consultation Notes:</b></p><br/>

	<table width='100%' border='5px' style='cell-spacing:15px; padding:15px '>
		<thead><tr><th colspan='2' align='center'></th></tr></thead>
		<tfoot></tfoot>
		<tbody>
			<tr>
				<td>Temperature</td>
				<td><input type='text' name='temp' Value = '$Temperature' /></td> 
			</tr>
			<tr>
				<td>Weight</td>
				<td><input type='text' name='weight'  Value = '$weight'/></td> 
			</tr>
			<tr>
				<td>Blood Pressure</td>
				<td><input type='text' name='pressure' Value = '$bp'/></td> 
			</tr>
			<tr>
				<td>Reason for Visit/Symptoms </td>
				<td><textarea name='symptoms' id='symptoms' rows='5' cols='30' placeholder='Enter Reason for Visit or Symptoms'>$symptoms</textarea></td>
			</tr>
			
			<tr>
				<td>Diagnosis</td>
				<td><textarea name='diagnosis' id='diagnosis' rows='7' cols='30' placeholder='Enter Diagnosis'>$diagnosis</textarea></td>
			</tr>
			<tr>
				<td>Prescription</td>
				<td><textarea name='pres' id='pres' rows='7' cols='30' placeholder='Enter Prescription'>$prescription</textarea></td>
			</tr>

			<tr>
				<td>Miscellaneous Notes</td>
				<td><textarea name='misc' id='misc' rows='5' cols='30' placeholder='Enter observations and additional notes'>$misc_notes</textarea></td><input type = 'hidden' name = 'lastenc_id' value = '$lastEnc_id'/>
			</tr>
			<tr>
				<td colspan='2' style='width: 100%; text-align: center' ><br/><input type='submit' name='visit' value='Update' /></td>
			</tr>
		</tbody>

	</table>
</form>
</div>";

?>