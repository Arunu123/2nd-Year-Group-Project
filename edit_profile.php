<?php
session_start();

if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

// Fetch user details from the database
$email = $_SESSION['email'];
$conn = new mysqli('localhost', 'root', '', 'reg');
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
}

$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>

    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Add your custom CSS styles if needed -->
    <!-- <link href="custom.css" rel="stylesheet"> -->
</head>
<body>
    <div class="container">
    <center>< <h1 class="mt-5">Edit Profile</h1></center>
        
        <form action="update_profile.php" method="POST">
            <!-- Display current user details as input fields -->
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" value="<?php echo $user['name']; ?>" required>
            </div>

            <!-- Add other profile fields here as needed -->
            <div class="form-group">
                <label for="nic">NIC:</label>
                <input type="text" class="form-control" name="nic" value="<?php echo $user['nic']; ?>" required>
            </div>

            <div class="form-group">
                <label for="gender">Gender:</label>
                <input type="text" class="form-control" name="gender" value="<?php echo $user['gender']; ?>" required>
            </div>

            <div class="form-group">
                <label for="age">Age:</label>
                <input type="number" class="form-control" name="age" value="<?php echo $user['age']; ?>" required>
            </div>

            <div class="form-group">
                <label for="height">Height (in cm):</label>
                <input type="number" class="form-control" name="height" value="<?php echo $user['height']; ?>" required>
            </div>

            <div class="form-group">
                <label for="weight">Weight (in kg):</label>
                <input type="number" class="form-control" name="weight" value="<?php echo $user['weight']; ?>" required>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Save Changes</button>
           <center><a href="profile.php" class="btn btn-secondary mt-3">Go Back to Profile Page</a></center> 
        </form>
    </div>

    <!-- Include Bootstrap JS if needed -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script> -->
</body>
</html>
