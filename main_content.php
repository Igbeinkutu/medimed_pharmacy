<?php include "include.php"; ?>
<div class='center_title_bar'><?php echo $lang['Last_Products']; ?></div>
           <?php
		   
		   $Date= date('Y-m-d H:i:s');

		   
    $q=mysqli_query($con, "SELECT * FROM `medicines` WHERE Medicine_Qnt>'0' And Active='1' And Medicine_Exp_Date>'$Date' ORDER BY `Medicine_ID`") or die ("Error In Select ".mysqli_error($con));;
	while($result=mysqli_fetch_array($q))
	{
	$id=$result['Medicine_ID'];
	$title=$result['Medicine_Name'];
	$Pic="admin/".$result['Medicine_Picture'];
	$Descr=$result['Medicine_Description'];
	$Price=$result['Medicine_Price'];
	$Descr=substr($Descr, 0, 50);

             ?>
    
 
     	<div class='prod_box'>
        	<div class='top_prod_box'></div>
            <div class='center_prod_box'>            
                 <div class='product_title'><a href='index.php?main=readProduct&ID=<?php echo $id; ?>'><?php echo $title; ?> </a></div>
                 <div class='product_img'><a href='index.php?main=readProduct&ID=<?php echo $id; ?>'><img src='<?php echo $Pic; ?>' alt='' width='120px' height='120px' title='' border='0' /></a></div>
                 <div class='prod_price'><span class='price'><?php echo $Price; ?> NGN</span></div>                        
            </div>
            <div class='bottom_prod_box'></div>             
            <div class='prod_details_tab'>
            <a href='index.php?main=readProduct&ID=<?php echo $id; ?>' title='header=[Add to cart] body=[&nbsp;] fade=[on]'><img src='images/cart.gif' alt='' title='' border='0' class='left_bt' /></a>
            <a href='index.php?main=readProduct&ID=<?php echo $id; ?>' class='prod_details'><?php echo $lang['Details']; ?></a>             
            </div>                     
        </div>
 
			 
			 
			 
			 
			 
			<?php
			
			 }
			 ?>
      
             
			