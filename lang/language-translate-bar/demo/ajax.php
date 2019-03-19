<?php
if($_GET['status']=='updateLanguage'){
	session_start();
	$_SESSION['language'] = $_GET['language'];
	echo $_SESSION['language'];
}
?>