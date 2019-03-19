<?php
	include "include.php";

	$patient_id = $_SESSION['patient_id'];

	echo "All Follow Up Notes: 

	<table width = '100%' cellpadding='5px' cellspacing='1px' border='1px' >
	<thead>
	<tr>
			<td>Attended to by </td>
			<td>Notes </td>
			<td>Duration </td>
		</tr>
	</thead>
			<tfooter>
			
			</tfooter>
			<tbody>

		";

	$query = mysqli_query($con, "SELECT note, admin_first_name, admin_last_name, no_of_days  FROM administrators, follow_up WHERE follow_up.admin_id = administrators.admin_id AND pat_id = '$patient_id' ") or die("Cannot fetch data ". mysqli_error($con));

	while($row = mysqli_fetch_array($query)){

		$adminfname = $row['admin_first_name'];
		$adminlname = $row['admin_last_name'];
		$days = $row['no_of_days'];
		$notes = $row['note'];

		echo "<tr>
		<td> $adminfname $adminlname </td>
		<td>$notes </td>
		<td>$days Days</td>
		</tr>
		";

	}
	echo "</table>";

?>
