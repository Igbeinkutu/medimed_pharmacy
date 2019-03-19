<?php
include("include.php");
$memberNo=$_SESSION['patient_id'];

if (!isset ($memberNo))
{
echo 'Adding ...
      <script language="JavaScript">
       document.location="index.php?main=sorry";
 </script>';

}


$NewsID=$_GET['ID'];
		   $Date= date('Y-m-d H:i:s');

    $sql=mysqli_query($con, "SELECT * FROM medicines where Active='1' AND Medicine_Exp_Date >'$Date' AND Medicine_ID='$NewsID' AND Medicine_Qnt > '0' " ) or die ("error in select ".mysqli_error($con));
$row=mysqli_fetch_array($sql);
          $no=$row['Medicine_ID'];
          $title=$row['Medicine_Name'];
          $details=$row['Medicine_Description'];
          $pic="admin/".$row['Medicine_Picture'];
          $Add_Date=$row['Medicine_Add_Date'];
		  $Exp_Date=$row['Medicine_Exp_Date'];
		$Price=$row['Medicine_Price'];
		$Subcat=$row['Medicine_Category'];
		$Qnt=$row['Medicine_Qnt'];
		

if(isset($_GET['op'])){

    if ($_GET['op']=='pay')
    {

      $query = mysqli_query($con, "SELECT * FROM mycart WHERE Customer_ID = '$memberNo' && Products_ID = '$NewsID'");
      
      if(mysqli_num_rows($query)>0){
          echo 'Medicine Quantity has been updated ...';

          $result = mysqli_fetch_array($query);
          $quantity_added = $result['prod_quantity'];
          $quantity_added++;
          $qtyupdate = mysqli_query($con, "update mycart set prod_quantity = '$quantity_added' WHERE Customer_ID = '$memberNo' && Products_ID = '$NewsID' ") or die (mysqli_error($con));
          //$sql1=mysqli_query($con, "update medicines set Medicine_Qnt='$Qnt'- 1 where Medicine_ID='$no' ") or die (mysqli_error($con));

      }else{

        $sql=mysqli_query($con, "insert Into mycart (Customer_ID, Products_ID, prod_quantity) values('$memberNo','$NewsID', 1 ) ") or die (mysqli_error($con));
        //$sql1=mysqli_query($con, "update medicines set Medicine_Qnt='$Qnt'-1 where Medicine_ID='$no' ") or die (mysqli_error($con));

        echo '
                <script language="JavaScript">
        alert ("This Medicine Is Added Successfully To Your Cart !");

        </script>';
        }
      }
}

?>
<style type="text/css">
<!--
.style1 {font-family: Tahoma}
-->
</style>
<body>
<div id='templatemo_content_left'>

  
         
					        <div align="center" style="border:1px #25AEDE solid ">
                            
			<p><a href="index.php?main=readProduct&ID=<?php echo $NewsID?>&op=pay"><?php echo $lang['Add_Cart']; ?></a></p>
					          <p align="center"><strong><?php echo $title;?></strong></p>
					        </div>
</br>
                            <div align="left"><img src="<?php echo $pic;?>" width="212" height="171" style="border-width: 0px;"> </div>
           
                  <p><br>
             <div  class="style1">Description : <span  class="DateTime"> <?php echo nl2br($details);?></span></div>
     

  <div  class="style1">Date Of Publish : <span  class="DateTime"> <?php echo $Add_Date;?></span></div>
    <div  class="style1">Expiry Date: <span  class="DateTime"> <?php echo $Exp_Date;?></span></div>

        <div  class="style1"> Price :  <?php echo $Price;?> NGN </div>
		<br/>
		<a href="index.php?main=MyCart&ID=<?php echo $Subcat;?>" style="color:#000000 ">
        <h2 align="center"  class="style1" style="border:1px #25AEDE solid "><?php echo $lang['Back']; ?></h2>
  </a>
  

						<div class='cleaner_with_height'>&nbsp;</div>

</div>

