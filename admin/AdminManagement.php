<?php

session_start();

	include "../include.php";
	if(!isset($_SESSION['Sadmin'])){

		echo "You are not Authorized to view this page!
        <script language='JavaScript'>
        alert('You are not Authorized to view this page');
            document.location='../error.php';
        </script>";
	}
	
	if(isset($_GET["OP"])){
		
switch ($_GET["OP"]){


case "Update";
if(isset($_GET["ID"])) $rubrique = $_GET["ID"];
else $main = "Main page";

$w=$_GET["ID"];
UpdateAdmin($w);
break;

case "Delete";
if(isset($_GET["ID"])) $rubrique = $_GET["ID"];
else $main = "";
$w=$_GET["ID"];
DeleteAdmin($w);
break;


case "Add_new";
AddAdmin();
break;

}
}
else $main = "";

	
?>
<?php
	if(isset($_POST['submitAdmin']))
	{
		$fName=$_POST['fname'];
		$lName=$_POST['lname'];
		$userName=trim($_POST['username']);
		$password1=trim(md5($_POST['pword']));
		$repword1 = $_POST['re_pword'];
		$role = $_POST['role'];
		$branch = $_POST['branch'];
		
		
			$query = mysqli_query($con, "INSERT into administrators (admin_first_name, admin_last_name, admin_username, admin_password, role, branch) VALUES ('$fName', '$lName', '$userName', '$password1', '$role', '$branch')") or die ('Cannot insert values into database '.mysqli_error($con));
			
			echo "<script language='JavaScript'>
				  alert ('Admin has been created !');
		  </script>";
		
	  
	}
	
	if(isset($_POST['submitUpdate'])){
		
		$fName=$_POST['fname'];
		$lName=$_POST['lname'];
		$userName=trim($_POST['username']);
		$password=trim(md5($_POST['pword']));
		$repword = trim($_POST['re_pword']);
		$role = $_POST['role'];
		$branch = $_POST['branch'];
		$id = $_POST['adminID'];
		
		$query = mysqli_query($con, "update administrators set admin_first_name = '$fName', admin_last_name = '$lName', admin_username = '$userName', admin_password ='$password', role = '$role', branch='$branch' WHERE admin_id = '$id'");
	}
	
	if(isset($_POST['Yes'])){
		
		$val = $_POST['adminID'];
		//$deleteadmin = "DELETE FROM administrators WHERE admin_id = '$val'";
		$deleteadmin = "UPDATE administrators SET status = 'deleted' WHERE admin_id = '$val'";
		
		$query = mysqli_query($con, $deleteadmin) or die ('Cannot delete admin '.mysqli_error($con));
		echo "<script language='JavaScript'>
			  alert ('Admin has been deleted !');
		</script>";
		echo '  <script language="JavaScript">
            document.location="AdminManagement.php";
        </script>';
	}
	if(isset($_POST['No'])){
		
		echo '  <script language="JavaScript">
            document.location="AdminManagement.php";
        </script>';
	}
	
	function isValid(){
		
		global $password1;
		global $repword1;
	
		if  (strlen($password1)<6 )
		{
		   $error= "<div align='center'><strong>Please Must Be At Least 6 Character </strong>";
		   
			echo "<script language='JavaScript'>
						  alert ('Check The Password, It Should Be At Least 6 Character !');
				  </script>";   		   
		return false;
		}

		else if ( $password1 =! $repword1){
			
			$error= "<div align='center'><strong>Passwords do not match !</strong>";

			echo "<script language='JavaScript'>
						  alert ('Passwords do not match!');
				  </script>";
			return false;
		}
		else return true;
	}
?>
<?php
	function UpdateAdmin($value){
		
		global $con;
		$val = $value;
		$sql = "select * from administrators where admin_id = '$val'";
		$query1 = mysqli_query($con, $sql) or die ('Cannot select Administrator ID '.mysqli_error($con));
		$row = mysqli_fetch_array($query1);
		
		$fname = $row['admin_first_name'];
		$lname = $row['admin_last_name'];
		$username = $row['admin_username'];
		$password = $row['admin_password'];
		$role = $row['role'];
		$branch = $row['branch'];
		
		echo "<form action = 'AdminManagement.php' method = 'POST'> ";
		echo " 
		<table>
			<thead>
				Update Account Information
			</thead>
			<tfooter>
			
			</tfooter>
			<tbody>
					
				<tr>
					<input type = 'hidden' name = 'adminID' value = '$val'/>
					<td>Admin first name: </td>
					<td> <input type = 'text' value = '$fname' name = 'fname' required/></td>
				</tr>
				<tr> 
					<td> Admin Last name: </td>
					<td> <input type = 'text' value = '$lname' name = 'lname'required/></td>
				</tr>
				<tr> 
					<td>Admin Username: </td>
					<td> <input type = 'text' value = '$username' name= 'username' required/></td>
				</tr>
				<tr> 
					<td>Password: </td>
					<td> <input type = 'password' value = '' name = 'pword'/></td>
				</tr>
				<tr> 
					<td>Re-Password: </td>
					<td> <input type = 'password' value = '' name = 're_pword' /></td>
				</tr>
				
				<tr>
					<td> Role: </td>
					<td> <select name = 'role'>
							<option "; if ($role == 'Super Admin') echo 'selected'; echo "> Super Admin</option>
							<option "; if ($role == 'Administrator') echo 'selected'; echo "> Administrator </option>
						</select></td>
				</tr>
				<tr> 
					<td>Branch: </td>
					<td> <input type = 'text' value = '$branch' name = 'branch' required/></td>
				</tr>
				<tr>
					<td colspan = '2' align= 'center'> <input type = 'submit' value = 'Update details' name='submitUpdate'> </td>
				</tr>
			</tbody>
		</table>";
	}
	
	function AddAdmin(){

		global $con;
		$query =mysqli_query($con, 'select * from pharmacy_branch');
		//$result = mysqli_fetch_array($query);
		
		echo "<form action = 'AdminManagement.php' method = 'POST'> ";
		echo " 
		<table>
			<thead>
				<h2>Admin Account Information</h2>
			</thead>
			<tfooter>
			
			</tfooter>
			<tbody>
				<tr> 
					<td>Admin first name: </td>
					<td> <input type = 'text' value = '' name = 'fname'  required/></td>
				<tr>
				<tr> 
					<td> Admin Last name: </td>
					<td> <input type = 'text' value = '' name = 'lname' required/></td>
				<tr>
				<tr> 
					<td>Admin Username: </td>
					<td> <input type = 'text' value = '' name = 'username' required/></td>
				<tr>
				<tr> 
					<td>Password: </td>
					<td> <input type = 'password' value = '' name = 'pword' min = '6' required/></td>
				<tr>
				<tr> 
					<td>Re-enter Password: </td>
					<td> <input type = 'password' value = '' name = 're_pword' min = '6' required/></td>
				<tr>
				<tr> 
					<td>Role: </td>
					<td> 
						<select name = 'role' required>
							<option value = ''> -- select Role --</option>
							<option value = 'Administrator'> Administrator </option>
							<option value = 'Super Admin'> Super Admin </option>
						</select>

					</td>
				<tr>
				<tr> 
					<td>Branch: </td>
					<td>
					<select name = 'branch'  required>
					<option value = ''> -- select branch --</option>";

					while($result = mysqli_fetch_array($query)){

						$branch = $result['location'];
						echo "<option value = $branch> $branch </option>";


					}echo "</td>

						</select>
				<tr>
				<tr>
					<td colspan = '2' align= 'center'> <input type = 'submit' value = 'Create Admin' name = 'submitAdmin'> </td>
				</tr>
			</tbody>
		</table>";
		
	}
	
	function DeleteAdmin($value){
		
		global $con;
		$query = mysqli_query($con, "SELECT * FROM administrators WHERE admin_id = '$value'") or die('cannot fetch admin detail '. mysqli_error($con));
		$row = mysqli_fetch_array($query);
		
		$fname = $row['admin_first_name'];
		$lname = $row['admin_last_name'];
		$branch = $row['branch'];
		$id = $row['admin_id'];
		
		echo "Are you sure you want to delete this admin staff: ".$fname. " ".$lname." ?";
		
		echo" <form action = 'AdminManagement.php' method = 'POST' name = 'performDelete'>";
		echo" <input type = 'hidden' name = 'adminID' value = '$id'/>";
		echo" <input type = 'submit' name = 'Yes' value = 'Yes'> &nbsp;&nbsp;";
		echo" <input type = 'submit' name = 'No' value = 'No'><br/> ";
		
		echo" </form>";
	}
?>
<!doctype HTML>
<html>
	<head>
		<title> </title>
	</head>
	
	<body>
		<h3 align="center">Manage Admins </h3>
		
		<a href='AdminManagement.php?OP=Add_new'> Add new admin </a>
		<table cellpadding="5px" cellspacing="1px" border="1px" >
			<thead>
				
					<td>First Name </td>
					<td>Last Name </td>
					<td>Username </td>
					<td>Role </td>
					<td>Branch </td>
					<td>Edit </td>
					<td>Delete </td>
				
			</thead>
			<tfoot> </tfoot>
			<tbody>
				
				<?php
					$query = mysqli_query($con, "SELECT * FROM administrators WHERE status = 'available'") or die ('cannot select from administrators '.mysqli_error($con));
					echo '<tr>';
					
					while($row = mysqli_fetch_array($query)){
						$x = $row['admin_id'];
						
						echo"<td> ".$row['admin_first_name']."</td>";
						echo"<td> ".$row['admin_last_name']."</td>";
						echo"<td> ".$row['admin_username']."</td>";
						echo"<td> ".$row['role']."</td>";
						echo"<td> ".$row['branch']."</td>";
						echo"<td><a href='AdminManagement.php?OP=Update&ID=$x'> Update admin </a></td>";
						echo"<td><a href='AdminManagement.php?OP=Delete&ID=$x'> Delete admin </a></td>";
						echo"</tr>";
					}
				?>
				
			</tbody>
		</table>
		
	
	</body>

</html>