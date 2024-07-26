<?php
session_start();

if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user input from the form
    $name = $_POST['name'];
    $nic = $_POST['nic'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];

    // Update the user's profile in the database
    $email = $_SESSION['email'];
    $conn = new mysqli('localhost', 'root', '', 'reg');
    
    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    }

    $stmt = $conn->prepare("UPDATE users SET name = ?, nic = ?, gender = ?, age = ?, height = ?, weight = ? WHERE email = ?");
    $stmt->bind_param("sssssss", $name, $nic, $gender, $age, $height, $weight, $email);

    if ($stmt->execute()) {
        // Update successful
        header('Location: profile.php'); // Redirect back to the profile page
        exit();
    } else {
        echo 'Error updating profile: ' . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
