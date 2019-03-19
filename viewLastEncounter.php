<p><b>Last Visit Consultation Notes:</b></p><br/>

<?php

	include "include.php";
	$patient_id = $_SESSION['patient_id'];

	$query = mysqli_query($con, "SELECT encounters.encounter_id, patients.patient_fname, patients.patient_lname, administrators.admin_first_name, administrators.admin_last_name, encounters.date_of_visit, encounters.reason_for_visit, encounters.temperature, encounters.weight, encounters.bp,  encounters.diagnosis, encounters.prescription, encounters.misc_notes FROM patients, encounters, administrators WHERE encounters.pat_id = patients.patient_id AND encounters.admin_id = administrators.admin_id AND encounters.pat_id =  '$patient_id' ORDER BY encounter_id DESC") or die("Cannot fetch data ". mysqli_error($con));

		$row = mysqli_fetch_array($query);

		$enc_id = $row['encounter_id'];

		$patfName = $row['patient_fname'];
		$patlName = $row['patient_lname'];
		$adminfname = $row['admin_first_name'];
		$adminlname = $row['admin_last_name'];
		$dateofvisit = $row['date_of_visit'];
		$reason = $row['reason_for_visit'];
		$temp = $row['temperature'];
		$weight = $row['weight'];
		$bp = $row['bp'];
		$diagnosis = $row['diagnosis'];
		$prescription = $row['prescription'];
		$misc_notes = $row['misc_notes'];

		echo "

		<table width = '100%'>
		<tr>
		<td>Patient's Name</td>
		<td> $patfName $patlName</td>
		</tr>
		<tr>
		<td>Admin Staff</td>
		<td> $adminfname $adminlname</td>
		</tr>
		<tr>
		<td> Date of Visit</td>
		<td> $dateofvisit</td>
		</tr>
		<tr>
		<td>Symptons/Reason for Visit</td>
		<td>$reason</td>
		</tr>
		<tr>
		<td>Temperature</td>
		<td> $temp</td>
		</tr>
		<tr>
		<td>Weight</td>
		<td> $weight </td>
		</tr>
		<tr> 
		<td>Blood Pressure</td>
		<td>$bp </td>
		</tr>
		<tr>
		<td>Diagnosis </td>
		<td>$diagnosis <td>
		</tr>
		<tr>
		<td>Prescription </td>
		<td>$prescription <td>
		</tr>
		<tr>
		<td>Additional Notes </td>
		<td>$misc_notes <td>
		</tr>
		</table><br/>";



?>