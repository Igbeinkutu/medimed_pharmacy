<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />

<div class='center_title_bar'>Search Result</div>
           <?php
		   $txt=$_GET['txt'];
		   $Date= date('Y-m-d H:i:s');


    $q=mysqli_query ($con, "SELECT * FROM `medicines` where Medicine_Exp_Date >'$Date' AND Active='1' AND Medicine_Name like '%$txt%' or  Medicine_Description like '%$txt%' ORDER BY `Medicine_ID` DESC LIMIT 0 , 50");
	
	if(mysqli_num_rows($q) >0)
	{
	
	while($result=mysqli_fetch_array($q))
	{
	$id=$result['Medicine_ID'];
	$title=$result['Medicine_Name'];
	$Pic="admin/".$result['Medicine_Picture'];
	$Descr=$result['Medicine_Description'];
	$Price=$result['Medicine_Price'];
	$Descr=substr($Descr, 0, 50);

             echo "
    
 
     	<div class='prod_box'>
        	<div class='top_prod_box'></div>
            <div class='center_prod_box'>            
                 <div class='product_title'><a href='index.php?main=readProduct&ID=$id'>$title </a></div>
                 <div class='product_img'><a href='index.php?main=readProduct&ID=$id'><img src='$Pic' alt='' width='120px' height='120px' title='' border='0' /></a></div>
                 <div class='prod_price'><span class='price'>$Price NGN</span></div>                        
            </div>
            <div class='bottom_prod_box'></div>             
            <div class='prod_details_tab'>
            <a href='index.php?main=readProduct&ID=$id' title='header=[Add to cart] body=[&nbsp;] fade=[on]'><img src='images/cart.gif' alt='' title='' border='0' class='left_bt' /></a>
            <a href='index.php?main=readProduct&ID=$id' class='prod_details'>details</a>             
            </div>                     
        </div>

			 ";
	}
	}
	else
	{
			 echo "
    
 
     	<div class='prod_box'>
        	Product Not Found             
        </div>
			 ";
			 }
	
			 ?>
      
             
			