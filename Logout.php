<?php
session_start();

include "include.php";

unset($_SESSION["patient_id"]);
unset($_SESSION["patient_fname"]);


// destroy the session
//session_destroy(); 

echo "<script language='JavaScript'>
			  alert ('You Have Been Logged Out Successfully !');
      </script>";	
	  
echo '  <script language="JavaScript">
            document.location="index.php";
        </script>';




?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style1 {font-family: Tahoma}
-->
</style>
</head>

<body>
<form action="index.php?main=assessment" method="POST">
</form>
</body>
</html>
