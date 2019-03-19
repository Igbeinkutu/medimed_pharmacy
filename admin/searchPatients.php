<?php
include "../include.php";

$txtSearch=$_GET['txt'];

$sql=mysqli_query($con, "SELECT * from patients WHERE patient_fname like '%$txtSearch%' OR  patient_lname like '%$txtSearch%' OR phone_no like '%$txtSearch%'") or die ("Cannot fetch patients details ".mysqli_error($con));

           echo "<table width='100%''  border='1'>
           <h3><p align='center'>Patients Search Results</p></h3>
           <tr bgcolor='#fff'>
            <td bgcolor='#fff'><div align='center'><strong>First Name</strong></div></td>
      <td ><div align='center'><strong>Last Name</strong></div></td>
            <td ><div align='center'><strong>Gender</strong></div></td>
            <td ><div align='center'><strong>Phone</strong></div></td>
            <td ><div align='center'><strong>Email</strong></div></td>
      <td ><div align='center'><strong>Address</strong></div></td>
      <td ><div align='center'><strong>DOB</strong></div></td>
      <td ><div align='center'><strong>Blood Group</strong></div></td>
      <td ><div align='center'><strong>Edit Customer</strong></div></td>";
          while ($row=mysqli_fetch_array($sql))
          {
              $x=$row['patient_id'];


        echo "<tr bgcolor='lightblue'><td><div align='center'>".$row['patient_fname']."</div></td>";
    echo "<td><div align='center'>".$row['patient_lname']."</div></td>";

    echo "<td><div align='center'>".$row['patient_gender']."</div></td>";

        echo "<td><div align='center'>".$row['phone_no']."</div></td>";

    echo "<td><div align='center'>".$row['patient_email']."</div></td>";
    
    echo "<td><div align='center'>".$row['patient_address']."</div></td>";
    echo "<td><div align='center'>".$row['DOB']."</div></td>";
    echo "<td><div align='center'>".$row['Blood_Group']."</div></td>";

    echo "<td bgcolor='#ccc'><div align='center'><a href ='CustomersManagment.php?OP=Update&ID=$x'>Edit Customer</a></div></td>
    </tr>";

} echo "</table>";
?>
          
