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
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="./css/dashboardstyle1.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Admin Dashboard Panel</title>
    <!-- Link to Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Link to Bootstrap JavaScript and jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        /* Add your custom CSS here */
        .profile-photo-container {
            text-align: center;
            max-width: 150px; /* Adjust the size as needed */
            border-radius: 50%;
            margin: 0 auto; /* Center the container horizontally */
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

        .table-user-information > tbody > tr {
            border-top: 1px solid rgb(221, 221, 221);
            
        }

        .table-user-information > tbody > tr:first-child {
            border-top: 0;
        
        }


        .table-user-information > tbody > tr > td {
            border-top: 0;
            
        }
        .toppad
        {margin-top:20px;
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
<style>
    body {
        overflow-x: hidden;
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
                    <style>
                        nav{
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
                    </style>
<div class="logo-name">
    <div class="logo-image">
       <img src="./images/user.png" alt="">
    </div>
    <span class="logo_name" style=color:white;>Welcome <?php echo $user['username']; ?> </span>
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

<style>
    /* Change font color to white for link names */
    .link-name {
        color: white;
    }
    .panel{
        background-color:lavender;
    }
</style>

                

                
            </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <style>
            .dashboard {
            background-color: "";
            background-image: url(./images/coachbg.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: ;
        }
                
             
            
        </style>
    <div class="top-center">
    <h1>Ironcity Gymnasium</h1>
</div>
                    <style>
                        /* Centered text at the top */
                        .top-center {
    text-align: center;
    padding: 20px 0;
    background-color: #333; /* Background color for the top bar */
    color: white; /* Text color */
    font-size: 20px; /* Font size */
    font-family: arial sans-serif; 
    margin-left: -11px;
    margin-right: -10px;
    margin-top: -10px;
    border-radius: 10px; /* Adjust the radius as needed to curve the side edges */
}

                    .top-center h1 {
                        margin: 0;
                        font-size: 30px; /* Adjust the font size as needed */
                        font-style: italic;
                    }

                    </style>



<div class="container">
      <div class="row">
      <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
           <A href="edit.html" ></A>

        <A href="edit.html" ></A>
       <br>
<p class=" text-info"></p>
      </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $user['username']; ?></h3>
            </div>
            <div class="container mt-5">
            <div class="col-md-9 col-lg-9">
                
    <div class="row">
        <!-- Left Side Panel for Buttons, Profile Photo, and File Upload -->
        <div class="col-md-3 left-panel">
            
            
        </div>
    </div>
</div>


<div class="col-md-9 col-lg-9">

    <table class="table table-user-information">
        <style>
            .table {
    width: 60%;
    margin-bottom: 20px
}
        </style>
        <tbody>
            <tr>
                <td>Name</td>
                <td><?php echo $user['username']; ?></td>
            </tr>
            <tr>
                <td>Class Type</td>
                <td><?php echo $user['coaching_type']; ?></td>
            </tr>
            <tr>
                <td>NIC</td>
                <td><?php echo $user['nic']; ?></td>
            </tr>
            
            <tr>
                <td>Mobile</td>
                <td><?php echo $user['phone']; ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?php echo $user['email']; ?></td>
            </tr>
        </tbody>
    </table>
</div>


              </div>
            </div>
            





<script>
        $(document).ready(function() {
    var panels = $('.user-infos');
    var panelsButton = $('.dropdown-user');
    panels.hide();

    //Click dropdown
    panelsButton.click(function() {
        //get data-for attribute
        var dataFor = $(this).attr('data-for');
        var idFor = $(dataFor);

        //current button
        var currentButton = $(this);
        idFor.slideToggle(400, function() {
            //Completed slidetoggle
            if(idFor.is(':visible'))
            {
                currentButton.html('<i class="glyphicon glyphicon-chevron-up text-muted"></i>');
            }
            else
            {
                currentButton.html('<i class="glyphicon glyphicon-chevron-down text-muted"></i>');
            }
        })
    });


    $('[data-toggle="tooltip"]').tooltip();

    $('button').click(function(e) {
        e.preventDefault();
        alert("This is a demo.\n :-)");
    });
});
    </script>
            
</body>
</html>