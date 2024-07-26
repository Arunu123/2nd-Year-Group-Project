<?php
session_start();

// Include database connection file
include('dbcon.php');

if (isset($_POST['save_coach'])) {
    // Get form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $nic = $_POST['nic'];
    $password = $_POST['password'];
    $reentered_password = $_POST['re_enter_password']; // Note: corrected field name

    // Validate password match
    if ($password !== $reentered_password) {
        $_SESSION['message'] = "Error: Passwords do not match.";
        header("Location: coach_create.php");
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Insert data into the 'coaches' table
    $sql_coach = "INSERT INTO coach (username, email, phone, nic, password) 
                  VALUES ('$username', '$email', '$phone', '$nic', '$hashed_password')";

    $result_coach = mysqli_query($conn, $sql_coach);

    if ($result_coach) {
        // Get the ID of the newly added coach
        $coach_id = mysqli_insert_id($conn);

        // Automatically create an account for the coach
        $sql_user = "INSERT INTO users (coach_id, username, password) 
                     VALUES ('$coach_id', '$username', '$hashed_password')";

        $result_user = mysqli_query($conn, $sql_user);

        if ($result_user) {
            $_SESSION['message'] = "Coach and account added successfully.";
        } else {
            $_SESSION['message'] = "Error creating coach account: " . mysqli_error($conn);
        }
    } else {
        $_SESSION['message'] = "Error adding coach: " . mysqli_error($conn);
    }

    // Close database connection
    mysqli_close($conn);

    // Redirect back to the form page
    header("Location: coach_create.php");
    exit();
}

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

// Fetch user details from the database
$email = $_SESSION['email'];
$conn = new mysqli('localhost', 'root', '', 'reg');
if ($conn->connect_error) {
    die('Connection Failed : ' . $conn->connect_error);
}

$stmt = $conn->prepare("SELECT * FROM coach WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Display coach profile
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="./css/dashboardstyle1.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        /* Custom CSS */
        .profile-photo-container {
            text-align: center;
            max-width: 150px;
            border-radius: 50%;
            margin: 0 auto;
        }

        .user-row {
            margin-bottom: 14px;
        }

        .user-row:last-child {
            margin-bottom: 0;
        }

        .dropdown-user {
            margin: 13px 0;
            padding: 5px;
            height: 100%;
        }

        .dropdown-user:hover {
            cursor: pointer;
        }

        .table-user-information>tbody>tr {
            border-top: 1px solid rgb(221, 221, 221);
        }

        .table-user-information>tbody>tr:first-child {
            border-top: 0;
        }

        .table-user-information>tbody>tr>td {
            border-top: 0;
        }

        .toppad {
            margin-top: 20px;
        }

        nav {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            padding: 10px 14px;
            border-right: 1px solid var(--border-color);
            transition: var(--tran-05);
            background-image: url(./images/12.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }

        .link-name {
            color: white;
        }

        .dashboard {
            background-color: "";
            background-image: url(./images/coachbg.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: ;
        }

        /* Centered text at the top */
        .top-center {
            text-align: center;
            padding: 20px 0;
            background-color: #333;
            color: white;
            font-size: 20px;
            font-family: arial sans-serif;
            margin-left: -11px;
            margin-right: -10px;
            margin-top: -10px;
            border-radius: 10px;
        }

        .top-center h1 {
            margin: 0;
            font-size: 30px;
            font-style: italic;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: blue;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #45a049;
        }

        #classScheduleForm {
            width: 450px;
            height: 450px;
            margin-top: 60px;
            margin-left: 410px;
            padding: 20px;
            box-sizing: border-box;
        }

        #classScheduleForm label,
        #classScheduleForm input {
            margin-bottom: 10px;
        }
    </style>

<style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: white;
            margin: 0;
            padding: 0;
            margin-top:50px;
        }

        h2 {
            
            text-align: left;
            margin-top: 20px;
            color: blue;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin: 15px auto;
            background-color: lightblue;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-top:20px;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: silver;
            color: black;
        }

        tr {
            background-color: white;
            color: black;
            transition: background-color 0.3s;
        }

        tr:hover {
            background-color: lightblue;
            color: black;
        }

        video {
            position: fixed;
            top: 50%;
            left: 50%;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            transform: translateX(-50%) translateY(-50%);
            z-index: -1;
        }
    </style>

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

</head>

<body>
    <nav>
        <!-- Video Background -->
<video autoplay muted loop>
<source src="images/hd1594.mov" type="video/mp4">
</video>
        <div class="logo-name">
            <div class="logo-image">
                <img src="./images/user.png" alt="">
            </div>
            <span class="logo_name" style="color:white;">Welcome <?php echo $user['username']; ?> </span>
        </div>

        <div class="menu-items">
        <ul class="nav-links">
        <li><a href="coach.php">
            <i style=color:white; class="uil uil-estate"></i>
            <span class="link-name" style=color:white;><b>Dashboard</b></span>
        </a></li>
        <li><a href="schedule.php" >
            <i style=color:white; class="uil uil-clock"></i>
            <span class="link-name" style=color:white;><b>Schedule a Class</b></span>
        </a></li>
        <li><a href="scheduled.php" >
            <i style=color:white; class="uil uil-user-arrows"></i>
            <span class="link-name" style=color:white;><b>Scheduled Classes</b></span>
        </a></li> 
    </ul>
    
    <ul class="logout-mode">
        <li><a href="logout.php">
            <i style=color:white; class="uil uil-signout"></i>
            <span class="link-name" style=color:white; position:fixed; margin-bottom: 20px;><b>Logout</b></span>
        </a></li>
    </ul>
        </div>

        
    </nav>

    <section class="dashboard">
        <div class="top-center">
            <h1>Ironcity Gymnasium</h1>
        </div>

        <h2 style="color:blue; font-size:25px; margin-top:70px;">Coach Schedules</h2>
        <table id="myTable" style="padding:10px;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Coach Name</th>
                    <th>Scheduled Time</th>
                    <th>Scheduled Date</th>
                    <th>Class Date</th>
                    <th>Class Type</th>
                  
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "reg";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM coachschedule";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["ID"] . "</td>";
                        echo "<td>" . $row["Name"] . "</td>";
                        echo "<td>" . $row["Time"] . "</td>";
                        echo "<td>" . $row["Date"] . "</td>";
                        echo "<td>" . $row["classDate"] . "</td>";
                        echo "<td>" . $row["classType"] . "</td>";
                       
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No records found</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                // Autofill coach name (replace with your actual coach name)
                document.getElementById("username").value = "<?php echo $user['username']; ?>";;

                // Autofill current date
                var currentDate = new Date();
                var formattedDate = currentDate.toISOString().split('T')[0];
                document.getElementById("currentDate").value = formattedDate;
            });

            </script>
    </section>
</body>

</html>