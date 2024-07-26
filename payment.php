<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reg";

$UserName = $_POST["UserName"];
$CardNo = $_POST["CardNo"];
$Amount = $_POST["Amount"];



    // If there are no validation errors, proceed with database insertion
    if (empty($errors)) {
        // Create a database connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // SQL query to insert data into the database
        $sql = "INSERT INTO payment (UserName, CardNo ,Amount) VALUES ('$UserName', '$CardNo', '$Amount')";

        if ($conn->query($sql)) {
            echo "<script> 
                window.alert(\"Payment Successful!\");
                window.location.replace(\"../Gymnasium/successful.html\"); 
                </script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close the database connection
        $conn->close();
    }

            
