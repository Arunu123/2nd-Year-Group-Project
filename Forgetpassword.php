<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reg";

// Check if form is submitted and data & T&c are accepted
if(isset($_POST['forgotPassword'])) {
    $email = $_POST['username'];
    $UserPassword = $_POST['password'];
    
    if(isset($_POST['changePassConfirm'])) {
        // Proceed only if "I need to change my password" is checked
        // Add code to validate and sanitize user input as needed
        
        // Connection object using prepared statements
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Update the Password using a prepared statement
        $sql = "UPDATE section SET password = ? WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $UserPassword, $email);

        if ($stmt->execute()) {
            echo "<script>
                    window.alert(\"Your Password Change Successful!\");
                    window.alert(\"You have been sent an email about the changed Password!\");
                    window.location.replace(\"../Login.php\");
                  </script>";
        } else {
            echo "Error: " . $conn->error;
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "<script>
                window.alert(\"You Must Agree to the Terms and Conditions. Please tick 'I need to change my Password'!\");
                window.location.replace(\"../Login.html\");
              </script>";
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
</head>
<body>
    <h2>Forgot Password</h2>
    <form action="Forgetpassword.php" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <button type="submit">Reset Password</button>
    </form>
</body>
</html>
