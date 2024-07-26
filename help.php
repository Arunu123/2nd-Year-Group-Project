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

// Display user profile
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

        /* Two-color panels with a vertical rule */
        .left-panel {
            background-color: #E0E0E0; /* Left panel background color */
            padding: 20px;
            border-right: 2px solid #333; /* Vertical rule */
            height: 500px;
        }

        .right-panel {
            background-color: #F0F0F0; /* Right panel background color */
            padding: 20px;
        }

        .right-panel.user-details {
    padding: 20px;
    border-top-right-radius: 20px; /* Curved border on the top-right corner */
    border-bottom-right-radius: 20px; /* Curved border on the bottom-right corner */
    border-left: 2px solid black; /* Vertical rule */
    display: flex; /* Use flexbox for layout */
    flex-direction: column; /* Stack elements vertically */
    align-items: center; /* Center items horizontally */
    justify-content: center; /* Center items vertically */
    text-align: center; /* Center text horizontally */
    margin-top: -18px;
    border: "";
    background-image: url(./images/payback.jpg) ;
    background-repeat: no-repeat;
    background-size: cover;
    background-color: rgba(255, 255, 255, 0.5); /* 0.5 for 50% transparency (adjust as needed) */
   
    
}

.left-panel {
    padding: 20px;
    border-right: 2px solid #333; /* Vertical rule */
    height: 500px;
    border-top-left-radius: 20px; /* Curved border on the top-left corner */
    border-bottom-left-radius: 20px; /* Curved border on the bottom-left corner */
    margin-top: -18px;
    border:"";
    background-image: url(./images/payback.jpg) ;
    background-repeat: no-repeat;
    background-size: cover;
    background-color: rgba(255, 255, 255, 0.5); /* 0.5 for 50% transparency (adjust as needed) */
   
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
                background-color: "";
                background-image: url(images/neww2.jpg);
                background-repeat: no-repeat;
                background-size: cover;
             
            }
        </style>
    <div class="top-center">
    <h1 style="font-size: 30px; font-family: arial sans-serif;" >Ironcity Gymnasium</h1>
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
            </style>
            <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Center the form */
        .center-form {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* White opacity background overlay */
        .form-overlay {
            position: absolute;
            background-color: rgba(255, 255, 255, 0.8); /* Adjust opacity here */
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: -1;
        }

        /* Style for the form panel */
        .form-panel {
            background-color: #fff; /* Background color for the form panel */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
    </style>
    <title>Help & Support Form</title>
</head>
<body>
    <div class="container center-form">
        <div class="form-overlay"></div> <!-- White opacity background overlay -->
        <!-- Help & Support Form Panel -->
        <div class="form-panel">
            <fieldset>
                <legend><h3>Help & Support</h3></legend><br>
                <form action="SuportDetails.php" method="post">
                    <div class="form-group">
                        <label>Your Name:</label>
                        <input type="text" class="form-control" name="UserName" placeholder="Your name.." value="<?php echo $user['name']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Your Username:</label>
                        <input type="email" class="form-control" name="UserEmail" placeholder="Your registered e-mail.." value="<?php echo $user['email']; ?>" readonly >
                    </div>
                    <div class="form-group">
                        <label for="Request">Select Your Request/Enquiry Type</label>
                        <select class="form-control" name="ReqeustType" required>
                            <option value="empty">--Select--</option>
                            <option value="PaymentIssue">About Payment Issues</option>
                            <option value="About-Trainer">About Trainer</option>
                            <option value="About-Packages">About Packages</option>
                            <option value="About-System">About Online System Issues</option>
                            <option value="About-Enroll">About Enrolling Issues</option>
                            <option value="About-Dashboard">About My Profile Dashboard</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Your Message:</label><br>
                        <textarea class="form-control" name="UserMessage" placeholder="Write something.." style="height:80px" required></textarea>
                    </div>
                    <input class="btn btn-primary" type="submit" name="Submit" value="Submit">
                </form>
            </fieldset>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
