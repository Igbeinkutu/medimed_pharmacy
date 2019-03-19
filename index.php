<?php 
session_start();
include "include.php";

include_once 'lang/common.php';

$getMain="";


if(isset($_POST['Submit11']))
{

$Emailorphone=trim($_POST['txtusername']);
$Password1=md5($_POST['txtpassword']);
$Password = trim($Password1);

$sql=mysqli_query($con, "SELECT * FROM patients where (patient_email='$Emailorphone' OR phone_no = '$Emailorphone' OR username = '$Emailorphone') AND patient_password='$Password' ") or die ("Error In Select ".mysqli_error($con));
$row=mysqli_fetch_array($sql);


if (mysqli_num_rows($sql)>0)
{
$fname = $row['patient_fname'];
$_SESSION['patient_fname'] = $fname;
$No=$row['patient_id'];
$_SESSION['patient_id']=$No;

echo "<script language='JavaScript'>
              document.location='index.php?main=prescription';
        </script>";
}
else
{
echo "<script language='JavaScript'>
alert ('You Have Entered A Wrong Email Address, Password or Username!');
        </script>";

}

}

if (!isset($_SESSION['patient_id']))
{
$LoginType="<form method='POST' action='index.php'>
                      <table width='100%'  border='0'>
                        <tr>
                          <td><div align='center'>
						  <br>
						  <input type='text' name='txtusername' size='25' class='inputfield' title='Enter username, Email or Phone number. Username is the name and phone number' Placeholder= 'Email / Phone or username' required />
						                              
                          </div></td>
                        </tr>
                        <tr>
                          <td>
                         
						 <br> &nbsp;&nbsp;&nbsp;<input type='password' value='Password' name='txtpassword' size='25' class='inputfield' title='Enter password' onfocus='clearText(this)' onblur='clearText(this)' required/>                    
						  </td>
                        </tr>
                        <tr>
                          <td><div align='center'>
                            <input type='submit' name='Submit11' value='Login' />

                          </div></td>
                        </tr>
						                     
                      </table>                  
                  </form>
             ";
}
else
{
//if (!empty($_GET['CI']))
	$c = $_SESSION['patient_id'];
  $fname = $_SESSION['patient_fname'];

  $query = mysqli_query($con, "SELECT * FROM mycart WHERE Customer_ID = '$c'") or die ("Cannot fetch data from cart ". mysqli_error($con));

  $cartQty = 0;
  while($result = mysqli_fetch_array($query)){

    $Qty = $result['prod_quantity']; 
    
    $cartQty = $cartQty + $Qty;
  }

	
$LoginType="<table width='100%'  border='1'>
<tr>
    <td>
    <p align='center' style = 'font-size:15px'>Hello $fname!</p>
    </td>
  <tr>
    <td><p align='center' style = 'padding:7px'><a style='color:#000000' href='index.php?main=account_info&CI=$c'>Edit Account Information</a></p></td>
  </tr>
  <tr>
    <td><p align='center' style = 'padding:7px'><a style='color:#000000' href='index.php?main=MyCart'>My Cart ($cartQty)</a></p></td>
  </tr>
  <tr>
    <td><p align='center' style = 'padding:7px'><a style='color:#000000'  href='Logout.php'>Logout</a></p></td>
  </tr>


</table>
";

  
}

if (isset($_POST['SearchBTN']))
{
$txtSearch=$_POST['search'];

echo "<script language='JavaScript'>
              document.location='index.php?main=Search&txt=$txtSearch';
        </script>";

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">

<link rel="stylesheet" href="themes/default/default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="themes/light/light.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="themes/dark/dark.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="themes/bar/bar.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/style-slider.css" type="text/css" media="screen" />
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<title>Medi Med Pharmacy</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="shortcut icon" href="css/icon.jpg"/>

<style type="text/css">
body {
	background-image: url(images/top-bg.gif);
	background-repeat: no-repeat;
	background-color: #f5f4f0;
}
</style>
<!--[if IE 6]>
<link rel="stylesheet" type="text/css" href="iecss.css" />
<![endif]-->
<script type="text/javascript" src="js/boxOver.js"></script>

<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>
</head>

<body>

<div id="main_container">
  <!-- end of oferte_content-->
        
     <div id="wrapper">

        <div class="slider-wrapper theme-default">
            <p>&nbsp;</p>
          <p>&nbsp;</p>
            <div id="slider" class="nivoSlider">
                <img src="images/banner1.png" data-thumb="images/banner1.png" alt="" />
                <img src="images/banner2.png" data-thumb="images/banner2.png" alt="" data-transition="slideInLeft" />
                <img src="images/banner3.png" data-thumb="images/banner3.png" alt=""  />
               <img src="images/banner4.png" data-thumb="images/banner4.png" alt="" data-transition="slideInLeft"/>

            </div>
            
            
           
    </div>
        <script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
       <script type="text/javascript" src="js/jquery.nivo.slider.js"></script>
      <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
       </script>
    
  </div>
  <div id="main_content">
    
    
   
            <div id="menu_tab">
            <div class="left_menu_corner"></div>
              <ul class="menu">
                    <center>
                         <li><a href="index.php" class="nav1"><?php echo $lang['Home']; ?></a></li>
                         <li class="divider"></li>
                         <li><a href="index.php?main=aboutus" class="nav3"><?php echo 'About patient'; ?></a></li>
                         <li class="divider"></li>
                         <li><a href="index.php?main=product" class="nav5"><?php echo 'Medicines'; ?></a></li>
                         <li class="divider"></li>

                         <li><a href="index.php?main=reg" class="nav4"><?php echo $lang['Reg1']; ?></a></li>
                         <li class="divider"></li>
                      
                         <li><a href="index.php?main=Contact_Us" class="nav6"><?php echo $lang['Contact_Us']; ?></a></li>

                         <li class="divider"></li>
                      
                         <li><a href="index.php?main=prescription" class="nav6"><?php echo "Encounter"; ?></a></li>
              </ul>

</center>
             <div class="right_menu_corner"></div>
    </div><!-- end of menu tab -->
			<div>
			  <div class="top_bar">
			    <div class="top_search">
			      <div class="search_text"><a href="#"><?php echo $lang['Search']; ?></a></div>
			      <form action="index.php" method="post">
			        <input type="text" class="search_input" name="search" />
			        <input type="submit" style="background-image:url(images/search.gif) ; width:29px ; height:26px ; border:0; padding-bottom:25px; " value=" "  name="SearchBTN" id="SearchBTN"/>
		          </form>
		        </div>
			    <div class="languages">
			      <div class="lang_text"></div>
		        </div>
		      </div>
			</div>
            <div style="width:1000px ; height:30px ; background-image:url(images/ticker.png) ; background-repeat:no-repeat ; padding:5px ">
						     <marquee   width='997' id=mrq  behavior='scroll' dir=ltr direction=left loop='-1' scrolldelay='30' scrollamount='1' truespeed onmouseover='this.stop()' onmouseout='this.start()' >
	<?php 

  if(isset($_SESSION['patient_id'])){
    $c = $_SESSION['patient_id'];

    $query = mysqli_query($con, "SELECT * FROM vaccinations WHERE pat_id = '$c'");
    while($result = mysqli_fetch_array($query)){

      $due_date = $result['due_date'];
      $Vaccination_type = $result['Vaccination_type'];
      $date1 =  date('Y-m-d');
      $date_due = strtotime($due_date);
      $currentdate = strtotime($date1);
      $dat = ceil(($date_due - $currentdate)/60/60/24);
      if($dat < 8 && $dat>0){

        echo " - $Vaccination_type is due in $dat days - ";
      }else if($dat == 0){

        $vaccination_reminder = " - $Vaccination_type is due today - ";
      } else
      $vaccination_reminder = '';
    }
    } 
  ?>
			</marquee>
			</div>
			
    <div  style="padding-top:10px ">
    <span class="current"></span>	
    
    </div>        
        
    <div class="left_content">
    
      <div class="title_box"><?php echo $lang['Category']; ?></div>
	
       <ul class="left_menu">
         <?php 
						 $i=0;
				   $query =mysqli_query($con, "SELECT * FROM `categories` ORDER BY `Category_ID` DESC ");
while ($result=mysqli_fetch_array($query))
{


$Name=$result['Category_Name'];
$No=$result['Category_ID'];

if ($i % 2 ==0)
$ClassType="class='odd' ";
else
$ClassType="class='even' ";

				        echo "<li  $ClassType><a href='index.php?main=Sub_Category&ID=$No'>$Name</a></li>";
						$i++;
}
				   ?>
       </ul>	 
      <div class="banner_adds"> </div>
	    

 
      <div class="title_box"><?php echo $lang['Offer']; ?></div>
      <?php
		   
    $q=mysqli_query ($con, "SELECT * FROM `medicines` WHERE Medicine_Qnt>'0' ORDER BY RAND()  ");
	$result=mysqli_fetch_array($q);
	$id=$result['Medicine_ID'];
	$title=$result['Medicine_Name'];
	$Pic="admin/".$result['Medicine_Picture'];
	$Descr=$result['Medicine_Description'];
	$Price=$result['Medicine_Price'];
	$Descr=substr($Descr, 0, 50);
//$Price2=$Price+3.5;
             echo "
	
	 <div class='border_box'>
         <div class='product_title'><a href='index.php?main=readProduct&ID=$id''>$title</a></div>
         <div class='product_img'><a href='index.php?main=readProduct&ID=$id''><img src='$Pic' alt='' width='120px' height='120px'  alt='' title='' border='0' /></a></div>
         <div class='prod_price'> <span class='price'>$Price NGN</span></div>
     </div>  "
	 ?>
       
     
 
    </div>
    <!-- end of left content -->
   
   
   <div class="center_content">
   
   	
    	
   <?php
if (isset($_GET['main'])){
$getMain=$_GET['main'];
switch ($getMain)

{
//case "";
//include  "main_content.php";
//break;


case "photo";
include  "Slide.php";
break;

case "product";
include  "main_content.php";
break;




case "Sub_Category";
include  "Sub_Category.php";
break;

case "readProduct";
include  "Show_Medicines.php";
break;

case "MyCart";
include  "My_Cart.php";
break;



case "account_info";
include  "Account_Info.php";
break;

		case 'Contact_Us':
		include "Contact_Us.php";
		break;

		case 'reg':
		include "Register.php";
		break;
				case 'sorry':
		include "Sorry.php";
		break;		


case 'Thanks':
		include "Thanks.php";
		break;
	case 'Payments':
				include "Payments.php";
				break;
					case 'address':
				include "address.php";
				break;
				case 'Search':
				include "Search.php";
				break;

					case 'aboutus':
				include "about us.php";
				break;

					case 'contactus':
				include "contactus.htm";
				break;
				
					case 'prescription':
				include "prescription.php";
				break;
				
				
				case 'Delete':
				include "Delete_Cart.php";
				break;

        case 'addencounter':
        include "addconsultation.php";
        break;

        case 'editlastencounter':
        include "editLastEncounter.php";
        break;

        case 'viewlastencounter':
        include "viewLastEncounter.php";
        break;

        case 'followUp':
        include "followUp.php";
        break;

        case 'viewfollowUp':
        include "viewfollowUp.php";
        break;

        case 'viewAllencounters':
        include "viewAllEncounters.php";
        break;

        case 'vaccination':
        include "vaccination.php";
        break;


   }
  } else include 'main_content.php';
?>
    
    
   
   </div><!-- end of center content -->
   
   <div class="right_content">
   		<div class="shopping_cart">
       	  <div class="title_box"><?php echo $lang['Customer_Area']; ?></div>
            	
            <?php echo $LoginType;?>
      
        </div>
        <br />
        <br />
     <div class="title_box"><?php echo "Last Visit"; ?></div>  
     
	      <?php

      if(isset($_SESSION['patient_id'])){
       $c = $_SESSION['patient_id'];

        $query = mysqli_query($con, "SELECT encounters.encounter_id, patients.patient_fname, patients.patient_lname, administrators.admin_first_name, administrators.admin_last_name, encounters.date_of_visit, encounters.reason_for_visit, encounters.temperature, encounters.weight, encounters.bp,  encounters.diagnosis, encounters.prescription, encounters.misc_notes FROM patients, encounters, administrators WHERE encounters.pat_id = patients.patient_id AND encounters.admin_id = administrators.admin_id AND encounters.pat_id =  '$c' ORDER BY encounter_id DESC") or die("Cannot fetch data ". mysqli_error($con));

    $row = mysqli_fetch_array($query);
    $prescription = $row['prescription'];
    $dateofvisit = $row['date_of_visit'];
    $diagnosis = $row['diagnosis'];
    $misc_notes = $row['misc_notes'];

    echo "
      <div class = 'border_box'> 
      <div class='product_title'><a href='index.php?main=viewlastencounter'>Date: $dateofvisit </a></div><br/>
      <div class='product_img'>Diagnosis: $diagnosis </div>
      <div class='product_img'> Prescription: $prescription </div>
      <div class='product_img'> Additional Notes: $misc_notes </div>
      

      </div>
    ";}
	 ?>
	      <div class="banner_adds"> </div>   
            
   </div><!-- end of main content -->
    
   <div class="footer">
   
        <div class="left_footer">
        </div>
        
        <div class="center_footer">
          <p>Automated Process Ltd.  <br /> <?php echo 'All rights Reserved &copy '; echo  date("Y"); ?></p>
        </div>
        
        <div class="right_footer"></div>   
   
   </div>                 


</div>
<!-- end of main_container -->
</body>
</html>