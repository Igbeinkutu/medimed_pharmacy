<div class='center_title_bar'><?php echo $lang['My_Cart']; ?>

<?php
//session_start();

include("include.php");

include_once 'lang/common.php';

global $sum;
$memberNo=$_SESSION['patient_id'];

if (!isset($memberNo))
{
echo 'Adding ...
        <script language="JavaScript">
            document.location="index.php?main=sorry";
        </script>';

}

if(isset($_POST['qtyadd'])){

  if(isset($_GET['med']) && isset($_GET['qty'])){
    $medID = $_GET['med'];
    $qtyfromcart = $_GET['qty'] + 1;
      mysqli_query($con, "UPDATE mycart SET prod_quantity = '$qtyfromcart' WHERE Customer_ID = '$memberNo' AND Products_ID = '$medID'") or die (mysqli_error($con));

      echo '<script language="JavaScript">
                document.location="index.php?main=MyCart";
            </script>';    
  }
}
if(isset($_POST['qtysub'])){

  if(isset($_GET['med']) && isset($_GET['qty'])){
    $medID = $_GET['med'];
    $qtyfromcart = $_GET['qty'] - 1;

    if ($qtyfromcart > 0 ){

      mysqli_query($con, "UPDATE mycart SET prod_quantity = '$qtyfromcart' WHERE Customer_ID = '$memberNo' AND Products_ID = '$medID'") or die (mysqli_error($con));

      echo '<script language="JavaScript">
                document.location="index.php?main=MyCart";
            </script>'; 
    }else if ($qtyfromcart == 0 ){

        mysqli_query($con, "DELETE FROM mycart WHERE Customer_ID = '$memberNo' AND Products_ID = '$medID'") or die (mysqli_error($con));

      echo '<script language="JavaScript">
                document.location="index.php?main=MyCart";
            </script>';    
    }
         
  }
}

if(isset($_POST['qtyremove'])){

  if(isset($_GET['med']) && isset($_GET['qty'])){
    $medID = $_GET['med'];
      mysqli_query($con, "DELETE FROM mycart WHERE Customer_ID = '$memberNo' AND Products_ID = '$medID'") or die (mysqli_error($con));

      echo '<script language="JavaScript">
                document.location="index.php?main=MyCart";
            </script>';    
  }
}

?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>



<script type="text/javascript">
function confirmMsg()
{
return confirm("Are you sure you want delete?");
}

function confirmReject()
{
return confirm("Are you sure you want reject?");
}


function confirmApproval()
{
return confirm("Are you sure you want approve?");
}
</script>	

<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">


<style type="text/css">
<!--
.style1 {font-family: Tahoma}
-->

table, th, td {
    border: 0px;
}
th, td {
    padding: 1px;
    text-align: centre;
</style>
</head>

<body>
<div id='templatemo_content_left'>

 <div style="padding: 15px;">

 <?php echo $lang['My_Cart']; ?> :

 <ul>
 <?php
 echo "<table  id = 'carttable' style='width:100%'>
 <tr>
  <th> Medicine Name  </th>
  <th> Unit Price</th>
  <th> Amount </th>
  <th> Quantity </th>
 </tr>";
 $sum1=0;
 $dateofvis = date('Y-m-d');

  $pres_query = mysqli_query($con, "SELECT * FROM encounters WHERE pat_id = '$memberNo' and date_of_visit = '$dateofvis' ORDER BY encounter_id DESC");
  $pres_result = mysqli_fetch_array($pres_query);
  $pres = $pres_result['prescription'];
  if(!isset($pres)){

    echo"
    <script language='JavaScript'>
      alert('Please fill consultation notes');
      document.location='index.php?main=prescription'; 
      </script>
    ";
  }
   $sq = mysqli_query($con, "SELECT DISTINCT medicines.Medicine_ID, medicines.Medicine_Picture, medicines.Medicine_Name, medicines.Medicine_Price, mycart.Cart_ID, mycart.prod_quantity, encounters.prescription FROM medicines, patients, mycart, encounters WHERE mycart.Customer_ID = patients.patient_id AND mycart.Products_ID = medicines.Medicine_ID AND mycart.Customer_ID='$memberNo' AND encounters.pat_id = '$memberNo' AND encounters.date_of_visit = '$dateofvis'") or die ("Cannot fetch data from cart ". mysqli_error($con));
   
   
   echo "<form method = 'POST'>";
while ($row=mysqli_fetch_array($sq))
{
$Med_No=$row['Medicine_ID'];
$Title=$row['Medicine_Name'];
$price=$row['Medicine_Price'];
$prescription = $row['prescription'];

$prod_quantity = $row['prod_quantity'];
$priceforallqty = $price * $prod_quantity;
$sum1=$sum1+$priceforallqty;

 echo "
  
		<tr>
			<td>$Title </td>
      <td> $price</td>
			<td>$priceforallqty </td>
      <td> 
      $prod_quantity
      </td><td>
      <button formaction='index.php?main=MyCart&med=$Med_No&qty=$prod_quantity' type='submit' name = 'qtyadd'>Add</button>
      <button formaction='index.php?main=MyCart&med=$Med_No&qty=$prod_quantity' type='submit' name = 'qtysub'>sub</button>
      <button formaction='index.php?main=MyCart&med=$Med_No&qty=$prod_quantity' type='submit' name = 'qtyremove'>Remove Item</button>
      </td>
		</tr>";
  
  }echo "</table></form>";
  ?>
 </ul>
 </div>
  <ul>
 
 
 <p><?php echo $lang['Sum']; ?> :
 <?php 
 $sum=$sum1;//+$sum2;
 echo $sum;?> NGN</p>
 <p>&nbsp;</p>
 
 
 <?php 
 
 if ( $sum != 0 ){
 
 echo"
 
 
  <p align='center'><a href='index.php?main=Payments&ID=$sum&CI=$memberNo&Name=$prescription'>Make Payment </a></p>
  <p align='center'><a href='index.php?main=Delete&ID=$memberNo&CI=$memberNo'>Cancel</a></p>

 ";
 
 }
 
 ?>
 
 </p>
 

</div>
</div>


