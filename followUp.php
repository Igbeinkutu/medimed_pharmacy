
<?php

if ( ! session_id() ) @ session_start();
	include "include.php";
	$admin = $_SESSION['Log'];
	$pat = $_SESSION['patient_id'];

	
	if(isset($_POST['add_follow'])){

		if(!isset($admin) OR !isset($pat)){
			

		echo "<script language='JavaScript'>
		alert ('Error: patient and admin are not set! ');
              document.location='index.php?main=prescription';
        </script>";
	}else{

		
		$notes = $_POST['notes'];
		$days = $_POST['days'];
		$Date = date('Y-m-d H:i:s');

		$admin_id = $_SESSION['Log'];
		$pat_id = $_SESSION['patient_id'];

		$query = mysqli_query($con, "INSERT INTO follow_up (pat_id, admin_id, note, no_of_days, date_added) VALUES ('$pat_id', '$admin_id', '$notes - Date Created - $Date', '$days', '$Date')") or die("Cannot Insert follow_up details". mysqli_error($con));

		echo "<script language='JavaScript'>
		alert ('Follow up Notes added!');
              document.location='index.php?main=prescription';
        </script>";

	    }

	}

	
echo "
<div align='center'>

	<form action='followUp.php' method='POST'>

		<p style='font-size: 13px'><b>Follow up:</b></p><br/>

		<table width='100%' border='5px' style='cell-spacing:15px; padding:15px ''>
		<thead><tr><th colspan='2' align='center'></th></tr></thead>
		<tfoot></tfoot>
		<tbody>
			<tr>
				<td>Follow up Notes</td>
				<td><textarea name='notes' id='notes' rows='4' cols='30' required/></textarea></td>
			</tr>
			<tr>
				<td> No of Days for follow up</td>
				<td><input type='number' name='days' required/></td>
			</tr>
			<tr>
				<td></td>
				<td><input type='submit' name='add_follow' value='Add follow up'></td>
			</tr>
		</tbody>
	</table>


	</form>
</div>";  ?>