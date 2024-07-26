<?php
session_start();

if (isset($_POST['login'])) {
    // Establish the database connection
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "reg";

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
    if ($conn->connect_error) {
        die('Connection Failed : ' . $conn->connect_error);
    }

    // Get input from the login form
    $username = $_POST['username']; // Assuming the email is entered in the 'username' field
    $password = $_POST['password'];

    // Query to check if it's a member
    $queryMember = "SELECT * FROM users WHERE email = ? AND password = ?";
    $stmtMember = $conn->prepare($queryMember);
    $stmtMember->bind_param("ss", $username, $password);
    $stmtMember->execute();
    $resultMember = $stmtMember->get_result();

    // Query to check if it's an admin
    $queryAdmin = "SELECT * FROM section WHERE username='$username' AND password='$password'";
    $resultAdmin = $conn->query($queryAdmin);

    // Query to check if it's a coach
    $queryCoach = "SELECT * FROM coach WHERE email = ? AND password = ?";
    $stmtCoach = $conn->prepare($queryCoach);
    $stmtCoach->bind_param("ss", $username, $password);
    $stmtCoach->execute();
    $resultCoach = $stmtCoach->get_result();

    if ($resultMember->num_rows == 1) {
        // Member authenticated, set session and redirect to member profile
        $_SESSION['email'] = $username;
        header('Location: profile.php');
    } elseif ($resultAdmin->num_rows == 1) {
        // Admin authenticated, redirect to admin panel or dashboard
        header("Location: admin.php");
    } elseif ($resultCoach->num_rows == 1) {
        // Coach authenticated, set session with coach ID and redirect to coach profile
        

        $_SESSION['email'] = $username;
        header('Location: coach.php');
    } else {
        // Invalid credentials, redirect back to login form
        header("Location: login.php");
    }

    $stmtMember->close();
    $stmtCoach->close();
    $conn->close();
}
?>