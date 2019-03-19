

<?php
	include "include.php";

	$patient_id = $_SESSION['patient_id'];

	if(isset($_GET["OP"])){
		
		switch ($_GET["OP"]){


		case "view_details";
		if(isset($_GET["ID"])){

			$w=$_GET["ID"];
			view_details($w);
		break;
		} 
		else $main = "";
		}
	}
	else $main = "";

	function view_details($value){

		global $con;
		$val = $value;
		$patient_id = $_SESSION['patient_id'];

		$query = mysqli_query($con, "SELECT encounters.encounter_id, patients.patient_fname, patients.patient_lname, administrators.admin_first_name, administrators.admin_last_name, encounters.date_of_visit, encounters.reason_for_visit, encounters.temperature, encounters.weight, encounters.bp,  encounters.diagnosis, encounters.prescription, encounters.misc_notes FROM patients, encounters, administrators WHERE encounters.pat_id = patients.patient_id AND encounters.admin_id = administrators.admin_id AND encounters.pat_id =  '$patient_id' AND encounters.encounter_id = '$val' ") or die("Cannot fetch data ". mysqli_error($con));

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

		echo "<b>Consultation Details:</b>

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
		<td> $temp &deg;c</td>
		</tr>
		<tr>
		<td>Weight</td>
		<td> $weight kg </td>
		</tr>
		<tr> 
		<td>Blood Pressure </td>
		<td>$bp mm/Hg</td>
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

	}


	echo "All Previous Consultation Notes: 

	<table width = '100%'>

		<tr>
			<th>Patient Name </th>
			<th>Attended to by </th>
			<th>Date of Visit </th>
			<th>Diagnosis </th>
		</tr>";

	$query = mysqli_query($con, "SELECT encounters.encounter_id, patients.patient_fname, patients.patient_lname, administrators.admin_first_name, administrators.admin_last_name, encounters.date_of_visit, encounters.reason_for_visit, encounters.temperature, encounters.weight, encounters.bp,  encounters.diagnosis, encounters.prescription, encounters.misc_notes FROM patients, encounters, administrators WHERE encounters.pat_id = patients.patient_id AND encounters.admin_id = administrators.admin_id AND encounters.pat_id =  '$patient_id' ORDER BY encounter_id DESC") or die("Cannot fetch data ". mysqli_error($con));

	while($row = mysqli_fetch_array($query)){

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

		echo "<tr> 
			<td>$patfName $patlName </td>
			<td>$adminfname $adminlname</td>
			<td>$dateofvisit </td>
			<td>$diagnosis </td>
			<td> <a href = 'index.php?main=viewAllencounters&OP=view_details&ID=$enc_id' > View Details </a></td>
		</tr>";

	}echo "</table>";
?>