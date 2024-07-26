<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have a database connection established
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "reg";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get data from the form
    $coachName = $_POST['username'];
    $currentDate = $_POST['currentDate'];
    $classTime = $_POST['classTime'];
    $classDate = $_POST['classDate'];
    $classType = $_POST['classType'];
    

    // Insert data into the "coachschedule" table
    $sql = "INSERT INTO coachschedule (Name, Date, Time, classDate, classType) VALUES ('$coachName', '$currentDate', '$classTime', '$classDate', '$classType')";

    if ($conn->query($sql) === TRUE) {
        echo "Class scheduled successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request";
}
?>