<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reg";

// Create connection
$conn = new mysqli('localhost','root','','reg');

// Check connection
if ($conn->connect_error) 
{
 die("Connection failed: " . $conn->connect_error);
}


$delete = $_POST['del'];

// Use prepared statement to prevent SQL injection
$stmt = $conn->prepare("DELETE FROM users WHERE nic = ?");
$stmt->bind_param("i", $delete);

if ($stmt->execute()) {
    header("location: admin.php");
} else {
    echo "<script>alert('Invalid NIC or an error occurred.')</script>";
}

// Close the prepared statement
$stmt->close();

// Close the connection
$conn->close();
?>
