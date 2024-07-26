<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reg";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $scheduleId = $_POST["id"];
    $className = $_POST["class_name"];
    $day = $_POST["day"];
    $time = $_POST["time"];
    // Add other fields as needed

    // Update the schedule in the database
    $sql = "UPDATE schedules SET class_name = '$className', day = '$day', time = '$time' WHERE id = $scheduleId";

    if ($conn->query($sql) === TRUE) {
        echo "Schedule updated successfully";
    } else {
        echo "Error updating schedule: " . $conn->error;
    }
}

$conn->close();
?>
