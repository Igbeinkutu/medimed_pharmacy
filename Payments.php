<?php

include "include.php";
$memberNo=$_SESSION['patient_id'];

		//if(isset($_GET["CI"]))
      $CI = $_GET["CI"];

    //if(isset($_GET['ID']))
        $total=$_GET['ID'];

    //if(isset($_GET['Name']))
		    $Title =$_GET['Name'];
		
		if (!isset($_SESSION['patient_id']))
		{
		echo 'Adding ...
				<script language="JavaScript">
					document.location="index.php?main=sorry";
				</script>';

		}

?>


<!DOCTYPE HTML>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
</head>


<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />

<script>
function add_extra_fields(){
				
				if (document.getElementById('pt').value == 'CC'){
					
					document.getElementById('cct1').value = '';
					document.getElementById('ccn1').removeAttribute('style');
					document.getElementById('sc1').removeAttribute('style');
				}else{
					
					document.getElementById('cct1').style.display='none';
					document.getElementById('ccn1').style.display = 'none';
					document.getElementById('sc1').style.display = 'none';
				}
			
}
</script>
<style type='text/css'>
<!--
.style2 {
	font-size: 16;
}
.style3 {
	font-size: 16px;
	font-weight: bold;
}
.style5 {font-size: 16}
.style6 {font-size: 18px}
.style7 {font-size: 24px}
-->
</style>



</head>

<body>
<?php
  $sq=mysqli_query($con, "SELECT * from patients where patient_id='$memberNo'");
while ($row=mysqli_fetch_array($sq))
{
$No=$row['patient_id'];
$fName=$row['patient_fname'];
$lName=$row['patient_lname'];
$Phone=$row['phone_no'];
$Email=$row['patient_email'];
$Address=$row['patient_address'];
}
?>
<div id='templatemo_content_left'>

<form action='Add_Order.php?CI=<?php echo $CI; ?>&total=<?php echo $total; ?>&Title=<?php echo $Title; ?>' method='POST'>

<div align='center'>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table width='518' height='200' border='1' bgcolor='#06F'>
    
    
	
	   
	 <tr  id = 'paymethod'>
      <td><div align='center' class='style2'><span class="style2 style6"><?php echo $lang['Payment_Type']; ?></span></div></td>
      <td><div align='left' class='style5'>
      <select name="pt" id = "pt" onChange="add_extra_fields()">
        <option value="Cash" >Cash</option>
        <option value="CC" >Debit Card</option>
    </select>
    </td>
    </tr>
		
    <tr id = "cct1" style= "display:none" >
      <td><div align='center' class='style2'><span class="style2 style6"><?php echo $lang['Credit_Card_Type']; ?></span></div></td>
      <td><div align='left' class='style5'>
      <select name="cct" >
        <option value="Verve">Verve</option>
        <option value="Visa">Visa</option>
        <option value="Master">Master Card</option>
             
    </select>
    </td>
    </tr>
      
       <tr  style= "display:none" id = "ccn1">
      <td><div align='center' class='style2 style6'><?php echo "Card Number"; ?></div></td>
      <td><div align='left' class='style5'>
          <input name='ccn' type='text' id='txtnumcard' />
      </div></td>
    </tr>
          

  
  <tr  style= "display:none" id = "sc1">
      <td><div align='center' class='style2 style6'><?php echo $lang['Security_Number']; ?></div></td>
      <td><div align='left' class='style5'>
          <input name='sc' type='text' id='txtseccode' placeholder = "3 digit number behind card"/>      </div></td>
    </tr>      
      
      
      
      
      </div></td>
    </tr>
    
    
    <tr  >
      <td><div align='center' class='style2 style6'><?php echo "First Name"; ?></div></td>
      <td><div align='left' class='style5'>
        <input name='fName' type='text' value='<?php echo $fName; ?>' readonly/>
      </div></td>
    </tr>
	<tr  >
      <td><div align='center' class='style2 style6'><?php echo "Last Name"; ?></div></td>
      <td><div align='left' class='style5'>
        <input name='lName' type='text' value='<?php echo $lName; ?>' readonly/>
      </div></td>
    </tr>
    <tr  >
      <td><div align='center' class='style2 style6'><?php echo $lang['Phone']; ?></div></td>
      <td><div align='left' class='style5'>
        <input name='Phone' type='text' value='<?php echo $Phone; ?>' readonly/>
      </div></td>
    </tr>
    <tr  >
      <td><div align='center' class='style2 style6'><?php echo $lang['Email']; ?></div></td>
      <td><div align='left' class='style5'>
        <input name='Email' type='text' value='<?php echo $Email; ?>' readonly/>
      </div></td>
    </tr>
    
    <tr  >
      <td><div align='center' class='style2 style6'><?php echo "Branch"; ?></div></td>
      <td><div align='left' class='style5'>
      <?php

	
$query11 = mysqli_query($con, "select * from pharmacy_branch");
echo '<select id="userlanguage" name="Branch">';
while ($row111 = mysqli_fetch_array($query11)) {
echo '<option value="'.$row111['location'].'">'.$row111['location'].'</option>';  
}
echo '</select>';
?>
      </div></td>
    </tr>
 
    <tr>
      <td><div align='center' class='style2 style6'><?php echo $lang['Address']; ?></div></td>
      <td><div align='left' class='style5'>
<textarea name="Address" cols="27" rows="2" ><?php echo $Address; ?></textarea>                

</div>
      </div></td>
    </tr>
    
    
    
    
    <tr >
      <td height='30' colspan='2'><div align='center'>
        <input type='submit' name='Order_Submit' value='<?php echo $lang['Payment']; ?>' />
      </div></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</div>
</form>
</div>
</body>
</html>
