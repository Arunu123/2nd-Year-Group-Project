<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

// Fetch user details from the database
$email = $_SESSION['email'];
$conn = new mysqli('localhost', 'root', '', 'reg');
if ($conn->connect_error) {
    die('Connection Failed : ' . $conn->connect_error);
}

$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Process BMI calculation and save to the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $user['name']; // Use 'name' instead of 'email' for the name
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $bmi = $_POST['bmi'];

    // Save BMI data to the database
    $stmt = $conn->prepare("INSERT INTO bmi_data (user_email, bmi) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $bmi); // Adjusted parameters
    $stmt->execute();
    
    // Redirect back to the BMI page or any other page
    header('Location: BMI.php');
    exit();
}
?>
