<?php
session_start();
include("../include.php");

	echo "<table width='100%'  border='1'>
		<tr>
			<th> Name of Patient </th>
			<th> Type Of Vaccine </th>
			
			<th> Date due </th>
			<th> Phone Number </th>
			<th> Email </th>
			<th> Username </th>
		 </tr>
		";  

		$query = mysqli_query($con, "SELECT patient_fname, patient_lname, Vaccination_type, due_date, phone_no, patient_email, username FROM vaccinations, patients WHERE patient_id = pat_id ");

		while($result = mysqli_fetch_array($query)){

	      $fname = $result['patient_fname'];
	      $lname = $result['patient_lname'];
	      $phone = $result['phone_no'];
	      $email = $result['patient_email'];
	      $due_date = $result['due_date'];
	      $Vaccination_type = $result['Vaccination_type'];
	      $username = $result['username'];
	      $date1 =  date('Y-m-d');
	      $date_due = strtotime($due_date);
	      $currentdate = strtotime($date1);
	      $dat = ceil(($date_due - $currentdate)/60/60/24);
	      
	       if($dat < 8 && $dat>0){

	      echo " <tr>
	      <td>$fname $lname </td>
	      <td>$Vaccination_type </td>
	      <td>$due_date</td>
	      <td>$phone </td>
	      <td>$email </td>
	      <td>$username </td>

	      </tr>";
	  }	       }
	    echo "</table>";

?>