<?php
    $nic = $_POST['id_num'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
    $packages = $_POST['packages'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    // $repassword = $_POST['repassword'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'reg');
    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO users (phone, name, gender, age, height, weight, dob, address, nic, packages, email, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ississssssss", $mobile, $name, $gender, $age, $height, $weight, $dob, $address, $nic, $packages, $email, $password);

        if ($stmt->execute()) {
            // Registration successful, redirect to reg_success.html
            header("Location: reg_success.html");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
?>
