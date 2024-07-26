<?php
session_start();

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

$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();


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
        .profile-photo-container {
        text-align: center;
        max-width: 200px; 
        border-radius: 50%;
        margin: 0 auto; 
        overflow: hidden; 
    }

    .profile-photo-container img {
        width: 100%; 
        height: auto; 
    }

    .left-panel {
        text-align: center; 
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
                    background-image: url(images/new.jg);
                    background-repeat: no-repeat;
                    background-size: cover;
                }

            </style>
            
            
<div class="logo-name">
    <div class="logo-image">
       <img src="images/bg.avif" alt="">
    </div>
    <span class="logo_name" style=color:white;><b>Welcome <?php echo $user['name']; ?> </b></span>
</div>

<div class="menu-items">
    <ul class="nav-links">
        <li><a href="profile.php">
            <i style=color:white; class="uil uil-estate"></i>
            <span class="link-name" style=color:white;><b>Dashboard</b></span>
        </a></li>
        <li><a href="BMI.php">
            <i style=color:white; class="uil uil-files-landscapes"></i>
            <span class="link-name"style=color:white;><b>BMI</b></span>
        </a></li>
        <li><a href="c_in_mem.php">
            <i style=color:white; class="uil uil-chart"></i>
            <span class="link-name" style=color:white;><b>Classes</b></span>
        </a></li>
        <li><a href="paymember.php">
            <i style=color:white; class="uil uil-thumbs-up"></i>
            <span class="link-name" style=color:white;><b>Payments</b></span>
        </a></li>
        <li><a href="help.php">
            <i style=color:white; class="uil uil-question-circle"></i>
            <span class="link-name"style=color:white;><b>Help & support</b></span>
        </a></li>
        <li><a href="tips.php">
            <i style=color:white; class="uil uil-bolt-alt"></i>
            <span class="link-name" style=color:white;><b>Tips</b></span>
        </a></li>
    </ul>
    
    <ul class="logout-mode">
        <li><a href="logout.php">
            <i style=color:white; class="uil uil-signout"></i>
            <span class="link-name" style=color:white;><b>Logout</b></span>
        </a></li>
    </ul>
</div>

<style>
    /* Change font color to white for link names */
    .link-name {
        color: white;
    }
</style>

                

                
            </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <style>
            .dashboard{
                background-color:#189AB4;
                background-image: url(images/neww2.jpg);
                background-repeat: no-repeat;
                background-size: cover;
                background-attachment: fixed; /* Fix the background image */
            }
        </style>
    <div class="top-center">
    <h1>Ironcity Gymnasium</h1>
</div>
<style>
                       
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
        font-size: 30px; 
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
              <h3 class="panel-title"><?php echo $user['name']; ?></h3>
            </div>
            <div class="container mt-5">
            <div class="col-md-9 col-lg-9">
                
    <div class="row">
        <!-- Left Side Panel for Buttons, Profile Photo, and File Upload -->
        <div class="col-md-3 left-panel">
            <!-- Display user profile photo if available -->
            <?php if (!empty($user['profile_photo'])): ?>
                <div class="profile-photo-container">
                    <img src="profile_photos/<?php echo $user['profile_photo']; ?>" alt="Profile Photo" class="img-fluid rounded-circle">
                </div>
            <?php else: ?>
                <!-- If the user doesn't have a profile photo, display the template image -->
                <div class="profile-photo-container">
                    <img src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png" alt="Template Image" class="img-fluid rounded-circle">
                </div>
            <?php endif; ?>

            <!-- Add a form for profile photo upload -->
            <hr>
            <form action="upload_photo.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="profile_photo">Upload Profile Photo:</label>
                    <input type="file" name="profile_photo" id="profile_photo" class="form-control-file">
                </div>
                <button type="submit" class="btn btn-primary">Upload</button><br><br><br>
            </form>
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
                <td><?php echo $user['name']; ?></td>
            </tr>
            <tr>
                <td>NIC</td>
                <td><?php echo $user['nic']; ?></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td><?php echo $user['gender']; ?></td>
            </tr>
            <tr>
                <td>Age</td>
                <td><?php echo $user['age']; ?></td>
            </tr>
            <tr>
                <td>Height</td>
                <td><?php echo $user['height']; ?></td>
            </tr>
            <tr>
                <td>Weight</td>
                <td><?php echo $user['weight']; ?></td>
            </tr>
            <tr>
                <td>Date of Birth</td>
                <td><?php echo $user['dob']; ?></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><?php echo $user['address']; ?></td>
            </tr>
            <tr>
                <td>Package Type</td>
                <td><?php echo $user['packages']; ?></td>
            </tr>
            <tr>
                <td>Mobile</td>
                <td><?php echo $user['phone']; ?></td>
            </tr>
        </tbody>
    </table>
</div>

<div class="col-md-9 col-lg-9">
                  <a href="edit_profile.php" class="btn btn-primary">Edit profile</a>
                  <br><br>
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