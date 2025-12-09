<?php
include("dbconnect.php");
session_start();

if (isset($_POST['btn'])) {

    $Name       = $_POST['Name'];
    $Gender     = $_POST['Gender'];
    $Institution = $_POST['Institution'];
    $City       = $_POST['City'];
    $StateName  = $_POST['StateName'];
    $Phone      = $_POST['Phone'];
    $Email      = $_POST['Email'];
    $Charater   = $_POST['Charater'];
    $Amount     = $_POST['Amount'];

    $qry = mysqli_query($conn, "INSERT INTO register
        (Name, Gender, Institution, City, StateName, Phone, Email, Charater, Amount)
        VALUES
        ('$Name', '$Gender', '$Institution', '$City', '$StateName', '$Phone', '$Email', '$Charater', '$Amount')");

    if ($qry) {
        echo "<script>alert('Inserted Successfully');</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Registration</title>
</head>
<body>

<h2 align="center">User Registration</h2>

<form method="post">

<table align="center" cellpadding="10">

<tr>
<td>Name:</td>
<td><input type="text" name="Name" required></td>
</tr>

<tr>
<td>Gender:</td>
<td>
<select name="Gender">
<option>Male</option>
<option>Female</option>
</select>
</td>
</tr>

<tr>
<td>Institution:</td>
<td><input type="text" name="Institution" required></td>
</tr>

<tr>
<td>City:</td>
<td><input type="text" name="City" required></td>
</tr>

<tr>
<td>State Name:</td>
<td><input type="text" name="StateName" required></td>
</tr>

<tr>
<td>Phone:</td>
<td><input type="text" name="Phone" required></td>
</tr>

<tr>
<td>Email:</td>
<td><input type="email" name="Email" required></td>
</tr>

<tr>
<td>Charater:</td>
<td><input type="text" name="Charater" required></td>
</tr>

<tr>
<td>Amount:</td>
<td><input type="number" name="Amount" required></td>
</tr>

<tr>
<td colspan="2" align="center">
<input type="submit" name="btn" value="Submit">
</td>
</tr>

</table>
</form>

<br><br>

<h2 align="center">User Details</h2>

<table width="90%" border="1" align="center" cellpadding="5">
<tr>
<th>Name</th>
<th>Gender</th>
<th>Institution</th>
<th>City</th>
<th>State Name</th>
<th>Phone</th>
<th>Email</th>
<th>Charater</th>
<th>Amount</th>
</tr>

<?php
$qry = mysqli_query($conn, "SELECT * FROM register");

while ($row = mysqli_fetch_assoc($qry)) {
    echo "<tr>
        <td>".$row['Name']."</td>
        <td>".$row['Gender']."</td>
        <td>".$row['Institution']."</td>
        <td>".$row['City']."</td>
        <td>".$row['StateName']."</td>
        <td>".$row['Phone']."</td>
        <td>".$row['Email']."</td>
        <td>".$row['Charater']."</td>
        <td>".$row['Amount']."</td>
    </tr>";
}
?>

</table>

</body>
</html>
