<?php

session_start();

	include("include.php");

	$memberNo=$_SESSION['patient_id'];

    $query = mysqli_query($con, "SELECT * FROM vaccinations WHERE pat_id = '$memberNo'");
    $result = mysqli_fetch_array($query);
    $due_date = $result['due_date'];
    //$due_date2 = new DateTime($due_date);
    $date1 =  date('Y-m-d');
    //$date2 = new DateTime($date1);

    $date_due = strtotime($due_date);
    $currentdate = strtotime($date1);


$dat = ceil(($date_due - $currentdate)/60/60/24);

    echo " current date : $date1 Due Date : $due_date - $date_due -  $currentdate - " ;
    echo " Date diff is $dat"
?>
