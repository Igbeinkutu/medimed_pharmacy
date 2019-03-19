<?php
include "include.php";
$IDcafee=$_GET['id'];

$Lang=$_GET['Lang'];
if ($Lang=='Ar')
{
 $q=mysqli_query($con, "select * from advertisments where Adv_No='$IDcafee' ");
$DIR="ltr";
$DIRText="Right";
$DateOf="Date Added";
}
else
{
 $q=mysqli_query($con, "select * from advertisments where Adv_No='$IDcafee' ");
$DIR="rtl";
$DIRText="Left";
$DateOf="Date Of Publishing ";
}

$result=mysqli_fetch_array($q);

   $no=$result['Adv_No'];
   $title=$result['Adv_Title'];
   $pic="admin/".$result['Adv_Picture'];
   $desc=$result['Adv_Description'];
   $date=$result['Add_Date'];


?>
<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN'
'http://www.w3.org/TR/html4/loose.dtd'>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv='Content-Type' content='text/html; charset=windows-1256'>
<style type='text/css'>
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style1 {font-family: Tahoma}
.style2 {font-size: 9px}
.style3 {font-family: Tahoma; font-size: 9px; }
a {text-decoration:none}
.style4 {
	font-size: 18px;
	font-weight: bold;
}
.style7 {
	color:#000000;
}
-->
</style></head>

<body>



  <table width='100%' height='156' align='right' dir="<?php echo $DIR;?>">
  

 <tr valign='middle'>
      <td  colspan='3'><div align='right'>

<div class='addthis_toolbox addthis_default_style'>
<a href='http://www.addthis.com/bookmark.php?v=250&amp;username=ahmad190' class='addthis_button_compact'>Share</a>
<span class='addthis_separator'>|</span>
<a class='addthis_button_facebook'></a>
<a class='addthis_button_myspace'></a>
<a class='addthis_button_google'></a>
<a class='addthis_button_twitter'></a>
</div>
<script type='text/javascript' src='http://s7.addthis.com/js/250/addthis_widget.js#username=ahmad190'></script>


        <p align="center" class='style4'><span class='style7'><?php echo $title;?></span></p>
        </div>
        </td>
    </tr>
  
    <tr>
    
      <td valign='middle'><div align="left"><img src='<?php echo $pic;?>' width='208' height='206' ></div></td>
      <td colspan='2' valign='top'><div align='<?php echo $DIRText;?>' style="font-family:Tahoma "><?php     print (nl2br($desc)); ?>
      </div></td>
    </tr>
    <tr>
      <td  height='18' valign='top'></td>
      <td  valign='top'><div align='right'></div></td>
    </tr>
    <tr>
      <td colspan='3' valign='top'><div align="<?php echo $DIRText;?>"><span class='style1 style2 style7'><?php echo $DateOf;?> <strong><?php echo  $date;?></strong> </span></div></td>
    </tr>




 </table>

</body>
</html>

