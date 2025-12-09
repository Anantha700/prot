<?php
$conn = mysqli_connect("localhost", "root", "", "register");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<?php 
include("dbconnect.php");
session_start();

extract($_POST);

if (isset($_POST['btn'])) {

    $qry = mysqli_query($conn, "
        INSERT INTO register (Name, Gender, Institution, City, StateName, Phone, Email, Charater, Amount)
        VALUES ('$Name','$Gender','$Institution','$City','$StateName','$Phone','$Email','$Charater','$Amount')");

    if ($qry) {
        echo "<script>alert('Inserted successfully')</script>";
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
}
?>

<table width="98%" align="center"> 
<tr>
<td colspan="10" align="center"><strong>User Details</strong></td>
</tr>

<tr><td colspan="10">&nbsp;</td></tr>

<tr>
<td width="1%"></td>
<td><strong>Name</strong></td>
<td><strong>Gender</strong></td>
<td><strong>Institution</strong></td>
<td><strong>City</strong></td>
<td><strong>StateName</strong></td>
<td><strong>Email</strong></td>
<td><strong>Phone</strong></td>
<td><strong>Charater</strong></td>
<td><strong>Amount</strong></td>
</tr>

<tr><td colspan="10">&nbsp;</td></tr>

<?php 
$qry = mysqli_query($conn, "SELECT * FROM register");

while ($row = mysqli_fetch_assoc($qry)) { 
?>
<tr>
<td></td>
<td><?php echo $row['Name']; ?></td>
<td><?php echo $row['Gender']; ?></td>
<td><?php echo $row['Institution']; ?></td>
<td><?php echo $row['City']; ?></td>
<td><?php echo $row['StateName']; ?></td>
<td><?php echo $row['Email']; ?></td>
<td><?php echo $row['Phone']; ?></td>
<td><?php echo $row['Charater']; ?></td>
<td><?php echo $row['Amount']; ?></td>
</tr>
<tr><td colspan="10">&nbsp;</td></tr>
<?php 
}
?>
</table>
