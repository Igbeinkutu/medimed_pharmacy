<?php
include "../include.php";

if(isset($_POST['Submit_update']))
{

    $fName=$_POST['fName'];
	$lName=$_POST['lName'];
	$gender=$_POST['gender'];
	$dob=$_POST['dob'];
	$BloodGroup=$_POST['BloodGroup'];
    $Email=$_POST['email'];
    $Phone=$_POST['Phone'];
    $Address=$_POST['Address'];
	$No = $_POST['No'];
    $Password=md5($_POST['password']);
    $repword = md5($_POST['repword']);
	
	$No=$_POST['No'];

$sql=mysqli_query($con, "UPDATE patients set patient_fname='$fName', patient_lname='$lName', patient_gender='$gender', patient_email='$Email',phone_no='$Phone',patient_address='$Address', DOB='$dob', Blood_Group='$BloodGroup', patient_password = '$Password' WHERE patient_id='$No' ") or die ("error in adding ".mysqli_error($con));

echo "<script language='JavaScript'>
			  alert ('Patient Account Information Has Been Updated !');
      </script>";


echo '  <script language="JavaScript">
            document.location="CustomersManagment.php";
        </script>';


}

if (isset($_POST['SearchBTN']))
{
  $txtSearch=$_POST['searchpatient'];
           
           echo "<script language='JavaScript'>
              document.location='searchPatients.php?txt=$txtSearch';
        </script>";
}


if(isset($_GET["OP"])){ //$rubrique = $_GET["OP"];
//else $main = "";

switch ($_GET["OP"]){


case "Update";
if(isset($_GET["ID"])) $rubrique = $_GET["ID"];
else $main = "";

$w=$_GET["ID"];
UpdateCustomer($w);
break;

case "Delete";
if(isset($_GET["ID"])) $rubrique = $_GET["ID"];
else $main = "";
$w=$_GET["ID"];
DeleteCustomer($w);
break;


}
}
else $main = "";
?>


<?php
function UpdateCustomer($value)
{
	global $con;
    $sqluPDATE=mysqli_query($con, "select * from patients where patient_id='$value'") or die ("error in select ".mysqli_error($con));

          $row1=mysqli_fetch_array($sqluPDATE);
$fName=$row1['patient_fname'];
$lName=$row1['patient_lname'];
$No1=$row1['patient_id'];
$Email=$row1['patient_email'];
$Phone=$row1['phone_no'];
$Password=$row1['patient_password'];
$Address=$row1['patient_address'];
$DOB=$row1['DOB'];
$bloodGroup=$row1['Blood_Group'];
$Gender=$row1['patient_gender'];

echo "<form action='CustomersManagment.php' method='POST'>";

echo "
<div align='center'>
  <p>&nbsp;</p>
  <table width='327' border='1'>
    <tr bgcolor='#fff'>
      <td colspan='2'><div align='center'>";
	  
	  echo "Customer Account Information"; 	  
	  echo "</div></td>
    </tr>

    <input type='hidden' name='No' value=$No1>

   <tr>
	 <td><div align='center'>First Name</div></td>
     <td bgcolor='#fff'><div align='center'>
        <input name='fName' type='text' value=$fName>
      </div></td>
    </tr>
	<tr>
	 <td><div align='center'>Last Name</div></td>
     <td bgcolor='#fff'><div align='center'>
        <input name='lName' type='text' value=$lName>
      </div></td>
    </tr>
    <tr>
	      <td><div align='center'>Gender</div></td>

      <td bgcolor='#fff'><div align='center'>
        <input name='gender' type='text' id='gender' value=$Gender>
      </div></td>
    </tr>
	
	<tr>
		          <td><div align='center'>Phone No</div></td>

          <td bgcolor='#fff'><div align='center'>
            <input name='Phone' type='tel' id='Phone' value=$Phone>
          </div></td>
        </tr>
	<tr>
	 <td><div align='center'>Email</div></td>
     <td bgcolor='#fff'><div align='center'>
        <input name='email' type='email' value=$Email>
      </div></td>
    </tr>
    <tr>
   <td><div align='center'>Password</div></td>
     <td bgcolor='#fff'><div align='center'>
        <input name='password' type='password' value=''>
      </div></td>
    </tr>
    <tr>
   <td><div align='center'>Re-enter Password</div></td>
     <td bgcolor='#fff'><div align='center'>
        <input name='repword' type='password' value=''>
      </div></td>
    </tr>

<tr>
		          <td><div align='center'>Customer Address</div></td>

          <td bgcolor='#CCCCCC'><div align='center'>
<textarea name='Address' cols='27' rows='2'>$Address</textarea> </div></td>
        </tr>
		
		<tr>
	 <td><div align='center'>DOB</div></td>
     <td bgcolor='#fff'><div align='center'>
        <input name='dob' type='date' value=$DOB>
      </div></td>
    </tr>
		
        <tr>
		          <td><div align='center'>Blood Group</div></td>

          <td bgcolor='#CCCCCC'><div align='center'>
            <input name='BloodGroup' type='text' id='BloodGroup' value=$bloodGroup>
           <!-- <select name = 'BloodGroup'>
                <option"; if ($bloodGroup == "A+") echo "selected"; echo ">A+ </option>
                <option"; if ($bloodGroup == 'B+') echo "selected"; echo ">B+ </option>
                <option"; if ($bloodGroup == "AB+") echo "selected"; echo ">AB+ </option>
                <option"; if ($bloodGroup == 'O+') echo "selected"; echo ">O+ </option>
                <option"; if ($bloodGroup == 'A-') echo 'selected'; echo ">A- </option>
                <option"; if ($bloodGroup == 'B-') echo 'selected'; echo ">B- </option>
                <option"; if ($bloodGroup == 'AB-') echo 'selected'; echo ">AB- </option>
                <option"; if ($bloodGroup == 'O-') echo 'selected'; echo ">O- </option>
            </select> -->
          </div></td>
        </tr> 
		
      <tr bgcolor='#CCCCCC'>
      <td colspan='2'><div align='center'></div>        <div align='center'>
        <input type='submit' name='Submit_update' value='Update Customer Details'/>
      </div></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</div>";
echo "</form>";
}



function DeleteCustomer($value)
{
		global $con;
      $sqluPDATE=mysqli_query($con, "select * from patients where patient_id='$value'") or die ("error in select ".mysqli_error($con));

          $row1=mysqli_fetch_array($sqluPDATE);
$fName=$row1['patient_fname'];
$lName=$row1['patient_lname'];

echo "<form action='CustomersManagment.php' method='POST' name='del'>";

  echo "<head>
<title>Untitled Document</title>
<style type='text/css'>
<!--
.style1 {color: #FF0000}
.style2 {color: #000000}
.style4 {
	color: #FF0000;
	font-style: italic;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<div align='center'>
  <p>&nbsp;</p>
   <table width='519' height='118' border='1'>
    <tr>
      <td colspan='2'><div align='center'></div>
        <div align='center'>Delete Member</div></td>
    </tr>
    <tr>
      <td colspan='2'><div align='center'></div>
      <div align='center'>Are you Sure To Delete The Customer: <span class='style1'><strong><em>$fName $lName</em></strong> <span class='style2'>
      <input type='hidden' name='txtdelete' value='$value'  /></span> </span></span> ? </div></td>
    </tr>
    <tr>
      <td><div align='center'>
        <input type='submit' name='SubmitYes' value='Yes'>
      </div></td>
      <td><div align='center'>
        <input type='submit' name='SubmitNo' value='No'>
      </div></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</div>
</body>";

}

if(isset($_POST['SubmitYes']))
{

$v=$_POST['txtdelete'];

    $sqlUpdateCategory=mysqli_query($con, "delete from patients where patient_id='$v' ") or die ("Error ".mysqli_error($con));
	
	echo "<script language='JavaScript'>
			  alert ('Customer Has Been Deleted !');
      </script>";
	
	
	
echo '  <script language="JavaScript">
            document.location="CustomersManagment.php";
        </script>';
}
?>

<meta http-equiv='Content-Type' content='text/html; charset=windows-1256'>

</head>

<body>
<form name="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div align="center">
    <tr>
      <td><div align="center">
        <h3><p>Patients Management</p></h3> 
        <form action="CustomersManagment.php" method="post">
        Search: <input type="text" name="searchpatient" title="Search by first name, last name or phone">
        <input type="submit" style="background-image:url(../images/search.gif) ; width:29px ; height:26px ; border:0; padding-bottom:25px; " value=" "  name="SearchBTN"/>
              </form>
        <table width="100%"  border="1">
          <tr bgcolor='#fff'>
            <td bgcolor='#fff'><div align="center"><strong>First Name</strong></div></td>
			<td ><div align="center"><strong>Last Name</strong></div></td>
            <td ><div align="center"><strong>Gender</strong></div></td>
            <td ><div align="center"><strong>Phone</strong></div></td>
            <td ><div align="center"><strong>Email</strong></div></td>
			<td ><div align="center"><strong>Address</strong></div></td>
			<td ><div align="center"><strong>DOB</strong></div></td>
			<td ><div align="center"><strong>Blood Group</strong></div></td>
			<td ><div align="center"><strong>Edit Customer</strong></div></td>
            <!-- <td ><div align="center"><strong>Delete Customer</strong></div></td> -->
          </tr>


         <?php
           $sql=mysqli_query($con, "select * from patients") or die ("Cannot fetch patients details ".mysqli_error($con));

          echo "<tr bgcolor='#06F'>";
          while ($row=mysqli_fetch_array($sql))
          {
              $x=$row['patient_id'];


        echo "<td><div align='center'>".$row['patient_fname']."</div></td>";
		echo "<td><div align='center'>".$row['patient_lname']."</div></td>";

		echo "<td><div align='center'>".$row['patient_gender']."</div></td>";

        echo "<td><div align='center'>".$row['phone_no']."</div></td>";

		echo "<td><div align='center'>".$row['patient_email']."</div></td>";
		
		echo "<td><div align='center'>".$row['patient_address']."</div></td>";
		echo "<td><div align='center'>".$row['DOB']."</div></td>";
		echo "<td><div align='center'>".$row['Blood_Group']."</div></td>";

		echo "<td bgcolor='#ccc'><div align='center'><a href ='CustomersManagment.php?OP=Update&ID=$x'>Edit Customer</a></div></td>";

		// echo "<td bgcolor='#ccc'><div align='center'>";
		// echo "<a href ='CustomersManagment.php?OP=Delete&ID=$x'>Delete Customer</a>";
		// echo "</div></td>";
         echo "</tr>";
          }
        ?>


        </table>

      </div></td>
    </tr>
  </table>
</div>
</form>
</body>
</html>