<?php

	if(!isset($_SESSION['patient_id'])){

		echo "<script language='JavaScript'>
		alert ('Patient is not logged in!');
              document.location='index.php';
        </script>";

        }
?>
<ul>
	<li><a href="index.php?main=addencounter">Enter consultation notes</a><br/></li>
	<li><a href="index.php?main=editlastencounter">Edit Last consultation notes</a><br/></li>
	<li><a href="index.php?main=viewlastencounter">View Last Visit</a><br/></li>
	<li><a href="index.php?main=viewAllencounters">View all previous Visits</a></li>
	<li><a href="index.php?main=followUp">Make follow up</a></li>
	<li><a href="index.php?main=viewfollowUp">View all follow ups</a></li>
	<li><a href="index.php?main=vaccination">Vaccination Schedule</a></li>
</ul>