<?php
session_start();
include("../include.php");
//$memberNo=$_SESSION['patient_id'];

$Date= date('Y-m-d H:i:s');

		echo "<table width='100%'  border='1'>
		<tr>
			<th> Medicine Name </th>
			<th> Image </th>
			
			<th> Quantity </th>
			<th> Expiry Date </th>
		 </tr>
		";   
    $q=mysqli_query($con, "SELECT * FROM `medicines` WHERE Medicine_Qnt>'0' AND Medicine_Qnt < 11 AND Active='1' And Medicine_Exp_Date>'$Date' ORDER BY `Medicine_ID`") or die ("Error In Select ".mysqli_error($con));;
	while($result=mysqli_fetch_array($q))
	{
	$id=$result['Medicine_ID'];
	$title=$result['Medicine_Name'];
	$Pic=$result['Medicine_Picture'];
	$Descr=$result['Medicine_Description'];
	$Price=$result['Medicine_Price'];
	$Descr=substr($Descr, 0, 50);
	$qty = $result['Medicine_Qnt'];
	$expiry = $result['Medicine_Exp_Date'];

	echo "
	<tr>
		<td>$title </td>
		<td><img src='$Pic' width='100' height='100'/> </td>

		<td>$qty </td>
		<td>$expiry </td>

	</tr>
";
}
echo "</table>"	


?>