<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reg";

// Check if form submitted, insert data
if (isset($_POST['Submit'])) {
    $UserName = $_POST['UserName'];
    $UserEmail = $_POST['UserEmail'];
    $ReqeustType = $_POST['ReqeustType'];
    $UserMessage = $_POST['UserMessage'];

    // Connection object
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Use prepared statement to prevent SQL injection
    $sql = "INSERT INTO suportdetails (UserName, UserEmail, ReqeustType, UserMessage) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $UserName, $UserEmail, $ReqeustType, $UserMessage);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>window.alert('Data Inserted Successfully')</script>";
        header("Location: ./help.php");
        exit();
    } else {
        echo "<script>alert('Error in inserting records')</script>";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
