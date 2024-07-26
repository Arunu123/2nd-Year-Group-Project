<?php
session_start();

if (isset($_POST['class_name']) && isset($_POST['day']) && isset($_POST['time'])) {
    // Establish the database connection
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "reg";

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    }

    // Get input from the add class form
    $className = $_POST['class_name'];
    $day = $_POST['day'];
    $time = $_POST['time'];
   
    // Get coach ID from the session
    $coachID = $_SESSION['id']; // Make sure to set this session variable during coach login

    // Query to add the class
    $sql = "INSERT INTO schedules (class_name, day, time,schedule_id) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $className, $day, $time, $schedule_id);

    if ($stmt->execute()) {
        // Class added successfully, redirect to coach schedule page
        header("Location: coach.php");
    } else {
        // Error adding class, handle accordingly
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    // Redirect to the add class form if accessed without proper data
    header("Location: add_class.php");
}
?>