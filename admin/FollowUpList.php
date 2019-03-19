<?php

session_start();

	include "../include.php";
	$admin = $_SESSION['Log'];

	if(isset($_POST['update_follow'])){

		$note = $_POST['followupdate'];
		$followId = $_POST['followId'];
		$date2 =  date('Y-m-d H:i:s');
		$sql1 = "select * from follow_up where follow_id = '$followId'";
		$query1 = mysqli_query($con, $sql1) or die ('Cannot select follow_id '.mysqli_error($con));
		$row1 = mysqli_fetch_array($query1);
		$prevnote = $row1['note'];

		$Query3 = mysqli_query($con, "UPDATE follow_up SET note = '$prevnote <br/> <br/> $note - Date Updated - $date2 ' WHERE follow_id = '$followId'");
	}

	if(isset($_GET["OP"])){

		switch ($_GET["OP"]){


		case "Update";
				if(isset($_GET["ID"])) $rubrique = $_GET["ID"];
		else $main = "Main page";

		$w=$_GET["ID"];
		UpdateNote($w);
		break;
		}
	}

	function UpdateNote($value){

		global $con;
		$val = $value;
		
		$query2 = mysqli_query($con, "SELECT patient_fname, patient_lname, follow_id FROM patients, follow_up WHERE pat_id = patient_id AND follow_id = '$val'") or die("Cannot select details ".mysqli_error($con));

		$result2 = mysqli_fetch_array($query2);
		$fname = $result2['patient_fname'];
		$lname = $result2['patient_lname'];

		echo "<table>
			<thead>
				<th>Add follow up note for $fname $lname<th>
			</thead>
			<tfooter>
			
			</tfooter>
			<tbody>";

		echo "<form action = 'FollowUpList.php' method = 'POST'> 

			<tr>
			<td><textarea name = 'followupdate'  rows='4' cols='30'> </textarea></td>
			</tr>
			<tr>
			<td><input type='submit' name='update_follow' value='Update note '></td>
			</tr><input type = 'hidden' name = 'followId' value = '$val'/>
		</form> 
		</tbody>
		</table><br/>";
	}

	

	$query = mysqli_query($con, "SELECT patient_fname, patient_lname, patient_gender, phone_no, patient_email, patient_address, note, follow_id, no_of_days, date_added FROM patients, follow_up WHERE pat_id = patient_id " ) or die("Cannot select details ".mysqli_error($con));

	echo "<table width = '100%' cellpadding='5px' cellspacing='1px' border='1px' >
	<thead>
				List of follow ups
			<tr>
			<td> Patient Name </td>
			<td> Gender </td>
			<td> Phone</td>
			<td> Email</td>
			<td> Address</td>
			<td> Note</td>
		</tr>
			</thead>
			<tfooter>
			
			</tfooter>
			<tbody>";
	while($result = mysqli_fetch_array($query)){

		$pfname = $result['patient_fname'];
		$plname = $result['patient_lname'];
		$pgender = $result['patient_gender'];
		$Phone = $result['phone_no'];
		$email = $result['patient_email'];
		$address = $result['patient_address'];
		$note = $result['note'];
		$x = $result['follow_id'];

		$dateAdded = $result['date_added'];
		$days = $result['no_of_days'];

		$startdate = strtotime($dateAdded);
		$enddate = strtotime("+$days days", $startdate);

		$date1 =  date('Y-m-d');
		$currentdate = strtotime($date1);

		if($currentdate <= $enddate){

				echo "<tr>
			<td>$pfname $plname </td>
			<td>$pgender </td>
			<td>$Phone </td>
			<td> $email</td>
			<td>$address </td>
			<td >$note </td>
			<td> <a href='FollowUpList.php?OP=Update&ID=$x'>Add note</a> </td>
		</tr>

		";
		}

	
	}

	echo "</tbody>
	</table>";

?>