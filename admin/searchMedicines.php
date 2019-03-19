<?php
include "../include.php";

$txtSearch=$_GET['txt'];
$q=mysqli_query ($con, "SELECT * FROM `medicines` where Medicine_Name like '%$txtSearch%' or  Medicine_Description like '%$txtSearch%' ORDER BY `Medicine_ID`");
	
		echo "<table width='100%'  border='1' >
		<h3><p align='center'>Medicines Search Results</p></h3>
    <tr bgcolor='#fff'>

      <td ><div align='center' class='style3 style4'>Medicine Name</div></td>
	  
	        <td ><div align='center' class='style3 style4'>Medicine Picture</div></td>


  <td ><div align='center'><span class='style6'><strong>Activate</strong></span></div></td>

	<td ><div align='center'><span class='style6'><strong>Deactivate</strong></span></div></td>

	    <td ><div align='center'><span class='style6'><strong>Medicine Status</strong></span></div></td>

	    <td ><div align='center'><span class='style6'><strong>Medicine Qnt</strong></span></div></td>
		
			    <td ><div align='center'><span class='style6'><strong>Medicine Price</strong></span></div></td>

		
			    <td ><div align='center'><span class='style6'><strong>Medicine Exp Date</strong></span></div></td>


      <td ><div align='center' class='style6'><strong>Edit Medicine Information</strong></div></td>

  <td ><div align='center' class='style6'><strong>Delete Medicine</strong></div></td>
    </tr> ";
	if(mysqli_num_rows($q) >0)
	{
	
	while($result=mysqli_fetch_array($q))
	{
		$id=$result['Medicine_ID'];
	$title=$result['Medicine_Name'];
	$m_pic=$result['Medicine_Picture'];
	$Qnt=$result['Medicine_Qnt'];
	$Exp_Date=$result['Medicine_Exp_Date'];
	$P=$result['Medicine_Price'];


		$active=$result['Active'];
		if ($active==0)
		$pic='images/inactive.png';
		else
		$pic='images/active.png';

	echo "

<tr>

      <td><div align='center' class='style3'>$title</div></td>
	   <td><div align='center'><img src='$m_pic' width='75' height='75' border='0'></div></td>
       <td><div align='center'><a href='ProductsManagment.php?main=active&id=$id' ><img src='images/new.png' width='20' height='20' border='0'></a></div></td>
	   <td><div align='center'><a href='ProductsManagment.php?main=inactive&id=$id' ><img src='images/inactive.png' width='20' height='20' border='0'></a></div></td>
	   
	   	  <td><div align='center'><img src=$pic width='20' height='20'/></div></td>


	        <td><div align='center'>$Qnt</div></td>
				        <td><div align='center'>$P</div></td>

			<td><div align='center'>$Exp_Date</div></td>

      <td><div align='center'><a href='ProductsManagment.php?main=update&id=$id'><img src='images/edit.png' width='18' height='15' border='0'></a></div></td>
	  
	  <td><div align='center'><a href='ProductsManagment.php?main=delete&id=$id'><img src='images/delete.png' width='18' height='15' border='0'></a></div></td>
	  
	  
    </tr>";
} }echo "</table>";

?>