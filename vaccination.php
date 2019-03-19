
	<ul>
	<li><a href="index.php?main=vaccination&task=addVaccination">Add Vaccination Schedule</a><br/></li>
<!-- 	<li><a href="index.php?main=vaccination&task=updateVaccination">Update schedule</a><br/></li>
 -->	<li><a href="index.php?main=vaccination&task=viewVaccination">View all Schedule</a></li>
</ul><br/>

<?php



include "include.php";

$memberNo=$_SESSION['patient_id'];

if(isset($_GET["task"])){

	$task = $_GET["task"];
		
		
	switch($task) {
		case 'addVaccination':
			addVaccination();
		break;
		
		case 'updateVaccination':
			updateVaccination();
		break;

		case 'viewVaccination':
			viewVaccination();
		break;
	}
}

function addVaccination(){
	global $con;
	if (isset($_POST['sub'])){

		$vac_type = $_POST['vac_type'];
		$due_date = $_POST['due_date'];
		$memberNo=$_SESSION['patient_id'];

	$query = mysqli_query($con, "INSERT INTO vaccinations (pat_id, Vaccination_type, vac_status, due_date) VALUES ('$memberNo', '$vac_type', 'Not Administered', '$due_date' )");

		echo "
			<script>
			alert('Vaccination has been added');
			</script>
		";
	}
	

	echo " Add Vaccination schedule:
		<form action = 'index.php?main=vaccination&task=addVaccination' method = 'POST'>

			<table style='width: 100%'> 
			<tr><td>Vacination Name:</td> 
			<td><input type = 'text' name = 'vac_type' size = '30' required/></td>
			</tr>
			<tr><td>Due Date:</td> 
			<td><input type = 'date' name = 'due_date' size = '15' required/></td>
			<tr><td></td><td><input type = 'submit' value = 'Save' name = 'sub'/></td></tr>
			</table>


		</form>
	";


}

function updateVaccination(){
	global $con;

		$id = $_GET['id'];

		$today = date('Y-m-d');
		
		$query = mysqli_query($con, "UPDATE vaccinations SET vac_status = 'Administered', administered_date  = '$today' WHERE vaccination_id = '$id' ") or die('Cannot Update status '.mysqli_error($con));
		echo "
			<script>
			alert('Vaccine has been administered');
			</script>
		";

}

function viewVaccination(){
	global $con;
	$memberNo=$_SESSION['patient_id'];

	$query = mysqli_query($con, "SELECT patient_fname, patient_lname, Vaccination_type, vac_status, due_date, vaccination_id, administered_date FROM patients, vaccinations WHERE patient_id = pat_id AND pat_id = '$memberNo'");

	echo "
	<table width = '100%'>
				<tr>
					<th> Patient's Name </th>
					<th> Vaccination Type</th>
					<th> Due Date</th>
					<th> </th>
					<th> Status</th>
				</tr>";
	while($result = mysqli_fetch_array($query)){

		$fname = $result['patient_fname'];
		$lname = $result['patient_lname'];
		$vac_type = $result['Vaccination_type'];
		$vac_status = $result['vac_status'];
		$due_date = $result['due_date'];
		$vacc_id = $result['vaccination_id'];
		$date_administered = $result['administered_date'];
	

		echo "
				<tr>
					<td>$fname $lname </td>
					<td> $vac_type</td>
					
					<td> $due_date</td>
					<td><a href='index.php?main=vaccination&task=updateVaccination&id=$vacc_id' id = '$vacc_id' >Administer</a> </td>";

					
					if ($vac_status == 'Administered'){

						echo "<td> $date_administered </td>";
						echo "<script>
						    document.getElementById('$vacc_id').innerHTML = 'Administered on';
						    document.getElementById('$vacc_id').removeAttribute('href');
						    document.getElementById('$vacc_id').removeAttribute('style');
						    </script>";

					}else
						echo "<td> Not administered </td>";
			echo " </tr>";
	} echo "</table>";

	
}


?>

