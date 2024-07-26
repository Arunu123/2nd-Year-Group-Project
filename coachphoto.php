<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

// Check if a file was uploaded
if (isset($_FILES['profile_photo']) && $_FILES['profile_photo']['error'] === UPLOAD_ERR_OK) {
    // Define the directory to save uploaded photos
    $uploadDirectory = 'profile_photos/';

    // Create the directory if it doesn't exist
    if (!file_exists($uploadDirectory)) {
        mkdir($uploadDirectory, 0777, true);
    }

    // Generate a unique filename for the uploaded photo
    $photoFileName = uniqid() . '_' . $_FILES['profile_photo']['name'];

    // Define the full path to save the photo
    $photoPath = $uploadDirectory . $photoFileName;

    // Move the uploaded file to the specified directory
    if (move_uploaded_file($_FILES['profile_photo']['tmp_name'], $photoPath)) {
        // Update the user's profile with the photo filename in the database
        $email = $_SESSION['email'];
        $conn = new mysqli('localhost', 'root', '', 'reg');
        if ($conn->connect_error) {
            die('Connection Failed: ' . $conn->connect_error);
        }

        $stmt = $conn->prepare("UPDATE coach SET profile_photo = ? WHERE email = ?");
        $stmt->bind_param("ss", $photoFileName, $email);
        if ($stmt->execute()) {
            // Photo uploaded and database updated successfully
            header('Location: coach.php');
            exit();
        } else {
            echo "Error updating profile photo in the database.";
        }
    } else {
        echo "Error uploading the photo.";
    }
} else {
    echo "No file uploaded or an error occurred.";
}
?>
