<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reg";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $scheduleId = $_GET["id"];

    $sql = "SELECT * FROM schedules WHERE schedule_id = $scheduleId";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $className = $row["class_name"];
        $day = $row["day"];
        $time = $row["time"];
        // You can fetch other fields as needed
    } else {
        echo "Schedule not found.";
        exit;
    }
} else {
    echo "Invalid request.";
    exit;
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Schedule Details</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: aliceblue;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            margin-top: 50px;
        }

        input {
            margin-bottom: 10px;
        }

        .back-btn {
            margin-top: 20px;
        }
        h2{
            text-align: center;
            margin-top: 30px;
            font-family: bold;
        }

        /* Add more styling as needed */
    </style>
</head>
<body>

<?php
// Your PHP code remains the same
?>

<!-- Create an edit form with pre-filled values -->
<h2>Edit Details</h2>
<form action="update_schedule.php" method="post" class="form">
    <input type="hidden" name="id" value="<?php echo $scheduleId; ?>">
    <div class="form-group">
        <label for="className">Class Name:</label>
        <input type="text" class="form-control" id="className" name="class_name" value="<?php echo $className; ?>">
    </div>
    <div class="form-group">
        <label for="day">Day:</label>
        <input type="date" class="form-control" id="day" name="day" value="<?php echo $day; ?>">
    </div>
    <div class="form-group">
        <label for="time">Time:</label>
        <input type="time" class="form-control" id="time" name="time" value="<?php echo $time; ?>">
    </div>
    <!-- Add other fields as needed -->
    <button type="submit" class="btn btn-primary">Update Schedule</button>
</form>

<!-- Back button to return to coach.php -->
<a href="coach.php" class="btn btn-secondary back-btn">Back to Coach Schedule</a>

<!-- Add Bootstrap JS and Popper.js links -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
