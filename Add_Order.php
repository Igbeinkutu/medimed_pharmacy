<?php
session_start();
include "include.php";

//$memberNo=$_SESSION['patient_id'];


$pt = $_POST["pt"];
		
		
switch($pt) {
	case 'CC':
		CC();
	break;
	
	case 'Cash':
		Cash();
	break;
}


function CC(){
	
		global $con;
	
		$pt = $_POST["pt"];
		$cct = $_POST["cct"];
		$ccn = $_POST["ccn"];
		$sc = $_POST["sc"];
		$fName = $_POST["fName"];
		$lName = $_POST["lName"];
		$Phone = $_POST["Phone"];
		$Email = $_POST["Email"];
		$Address = $_POST["Address"];
		$Area = $_POST["Branch"];
		$CI = $_GET["CI"];
		$total = $_GET["total"];
		$Title = $_GET["Title"];
		$cclenght=strlen($ccn);
		$sclenght=strlen($sc);
		
		
		if ($cclenght != 16)
{
	echo '<script language="JavaScript">
			alert ("Credit Card Number must be 16 digits only !");
			document.location="index.php?main=Payments&ID='.$total.'CI='.$CI.'Name='.$Title.'";
		</script>';
}
elseif ($sclenght != 3)
{
	echo '<script language="JavaScript">
	alert ("Credit Card Security Number must be 3 digits only !");
	document.location="index.php?main=Payments&ID='.$total.'CI='.$CI.'Name='.$Title.'";
			</script>';
}
else
{
	$PS = "Debit Card Payment";
	$Date = date('Y-m-d H:i:s');

        $q= mysqli_query($con, "SELECT * FROM medicines where Active='1' AND Medicine_Qnt > '0' " ) or die ("error in select ".mysqli_error($con));
		while($result=mysqli_fetch_array($q)){

			$id = $result['Medicine_ID'];
			$Qnt = $result['Medicine_Qnt'];
			$memberNo=$_SESSION['patient_id'];

			$query2 = mysqli_query($con, "SELECT * FROM mycart WHERE Customer_ID = '$memberNo' AND Products_ID = '$id' ");
			$result2 = mysqli_fetch_array($query2);
			$quant = $result2['prod_quantity'];
			$med_ID = $result2['Products_ID'];

			if($id === $med_ID){

				$qty = $Qnt - $quant;
				echo "$qty <br/><br/>";

				$sql1=mysqli_query($con, "UPDATE medicines SET Medicine_Qnt='$qty' WHERE Medicine_ID='$med_ID' ") or die (mysqli_error($con));
			}

			
		}


	$sql=mysqli_query($con, "insert into orders (Customer_ID, Order_C_Fname, Order_C_Lname, Order_C_Email, Order_C_Phone, Order_C_Address, Order_Total_Price, Order_Area, Order_Payment_Method, Order_Payment_Status, Order_Products, Order_Date) values ('$CI','$fName', '$lName', '$Email','$Phone','$Address','$t','$Area','$pt','$PS','$Title','$Date')") or die(mysqli_error($con));

	$No1=$_GET['CI'];
	$sqldelete=mysqli_query($con, "delete from mycart where Customer_ID ='$No1' ");


	echo '<script language="JavaScript">
	alert ("Your Order was Successful!");
	document.location="index.php?CI='.$CI.'";

			</script>';
}
}

function Cash(){
		
		global $con;
		
		$pt = $_POST["pt"];
		$cct = $_POST["cct"];
		$ccn = $_POST["ccn"];
		$sc = $_POST["sc"];
		$fName = $_POST["fName"];
		$lName = $_POST["lName"];
		$Phone = $_POST["Phone"];
		$Email = $_POST["Email"];
		$Address = $_POST["Address"];
		$Area = $_POST["Branch"];
		$CI = $_GET["CI"];
		$total = $_GET["total"];
		$Title = $_GET["Title"];
		$cclenght=strlen($ccn);
		$sclenght=strlen($sc);
		
		$PS = "Cash Payment";
		$t = $total;
		$Date = date('Y-m-d H:i:s');

        $q= mysqli_query($con, "SELECT * FROM medicines where Active='1' AND Medicine_Qnt > '0' " ) or die ("error in select ".mysqli_error($con));
		while($result=mysqli_fetch_array($q)){

			$id = $result['Medicine_ID'];
			$Qnt = $result['Medicine_Qnt'];
			$memberNo=$_SESSION['patient_id'];

			$query2 = mysqli_query($con, "SELECT * FROM mycart WHERE Customer_ID = '$memberNo' AND Products_ID = '$id' ");
			$result2 = mysqli_fetch_array($query2);
			$quant = $result2['prod_quantity'];
			$med_ID = $result2['Products_ID'];

			if($id === $med_ID){

				$qty = $Qnt - $quant;
				echo "$qty <br/><br/>";

				$sql1=mysqli_query($con, "UPDATE medicines SET Medicine_Qnt='$qty' WHERE Medicine_ID='$med_ID' ") or die (mysqli_error($con));
			}

			
		}

		$sql=mysqli_query($con, "insert into orders (Customer_ID, Order_C_Fname, Order_C_Lname, Order_C_Email, Order_C_Phone, Order_C_Address,Order_Total_Price,Order_Area,Order_Payment_Method,Order_Payment_Status,Order_Products,Order_Date) values ('$CI','$fName', '$lName','$Email','$Phone','$Address','$t','$Area','$pt','$PS','$Title','$Date')") or die ('Cannot submit order'.mysqli_error($con));

		$No1=$_GET['CI'];
		$sqldelete=mysqli_query($con,"delete from mycart where Customer_ID ='$No1' ");


		echo '<script language="JavaScript">
		alert ("Your order was successful!");
		document.location="index.php?CI='.$CI.'";

				</script>';

}
?>
