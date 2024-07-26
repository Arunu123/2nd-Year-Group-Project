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
    </nav>

    <section class="dashboard">
        <style>
            .dashboard{
                background-color: "";
                background-image: url(./images/3.jpg);
                background-repeat: no-repeat;
                background-size: cover;
                background-attachment: fixed; /* Fix the background image */
                margin-top:-20px;
                
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

        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            background-color: #fedddd;
        }

        header {
            text-align: center;
            padding: 10px;
            background-color: #333;
            color: #fff;
        }

        section {
            margin-top: 20px;
        }


        .video-container {
            position: relative;
            width: 100%;
            overflow: hidden;
            margin-bottom: 20px; /* Add some space between videos */
        }

        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 60%;
        }

        .tip-container {
            display: flex;
            justify-content: space-between;
            align-items: stretch; /* Ensure equal height for flex items */
            margin-bottom: 5px; /* Adjust space between videos and paragraphs */
            height:408px;
        }


        .tip {
            flex: 0 0 40%; /* Adjust the width of the paragraph container */
            padding: 23px;
            background-color: #fff;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            justify-content: center;
            margin-bottom: 0%;
        }

    </style>
</head>
<body>
<br><br>
    <section>
        <div class="tip-container">
        <div class="video-container" style=padding-bottom:56.25%;>
            <iframe width="560" height="315" src="images/fit1.mp4" frameborder="0" allowfullscreen></iframe>
        </div>
        <div class="tip">
            <h2 style=color:rgb(241,118,30);>Tip 1: Running Exercises</h2>
            <ul>
                <li>Running is great for your heart. It makes it stronger and helps <b>improve blood circulation</b>, keeping your heart healthy.</li>
                <li>Running burns calories, helping you <b>maintain a healthy weight.</b> It's an effective way to stay fit and shed extra pounds.</li>
                <li>When you run, you use various muscles, making them stronger. It also promotes healthy bones, <b>keeping your body strong</b>.</li>
                <li>Running releases feel-good chemicals called endorphins. It <b>helps reduce stress,</b> boost your mood, and make you feel happier.</li>
                <li>You don't need fancy equipment. All you need is a pair of good shoes. Running is <b>simple, convenient,</b> and can be done almost anywhere.</li>
            </ul>
        </div>
        </div><br><br>

        <div class="tip-container">
        <div class="video-container" style=padding-bottom:56.25%;>
            <iframe width="560" height="315" src="images/fit2.mp4" frameborder="0" allowfullscreen></iframe>
        </div>
        <div class="tip">
            <h2 style=color:rgb(241,118,30);>Tip 2: Push-ups</h2>
            <ul>
                <li>Push-ups work your chest, shoulders, and arms, helping you <b>build strength</b> in your upper body.</li>
                <li>While doing push-ups, your core muscles are engaged, promoting a <b>strong and stable midsection.</b></li>
                <li>You can do push-ups anywhere, anytime, <b>without any special equipment.</b> Just use your body weight.</li>
                <li>Push-ups are a compound exercise, meaning they work multiple muscle groups at once, <b>contributing to overall fitness.</b></li>
                <li>Whether you're a beginner or advanced, push-ups can be modified to suit your fitness level, making them <b>accessible for everyone.</b></li>
            </ul>
        </div>
        </div><br><br>

        <div class="tip-container">
        <div class="video-container" style=padding-bottom:56.25%;>
            <iframe width="560" height="315" src="images/fit3.mp4" frameborder="0" allowfullscreen></iframe>
        </div>
        <div class="tip">
            <h2 style=color:rgb(241,118,30);>Tip 3: Skipping</h2>
            <ul>
                <li>Skipping is a <b>great cardiovascular exercise.</b> It gets your heart pumping, <b>improving heart health and stamina.</b></li>
                <li>Skipping helps <b>burn calories,</b> making it an effective way to <b>lose weight</b> and maintain a <b>healthy body.</b></li>
                <li>It engages various muscle groups, including legs, arms, and core, providing a <b>full-body workout.</b></li>
                <li>Skipping requires coordination between your hands and feet, helping <b>improve overall coordination</b> and <b>agility.</b></li>
                <li>You can skip almost anywhere with a rope. It's a <b>fun and portable exercise</b> that doesn't require much space or equipment.</li>
            </ul>
        </div>
        </div><br><br>

        <div class="tip-container">
        <div class="video-container" style=padding-bottom:56.25%;>
            <iframe width="560" height="315" src="images/fit4.mp4" frameborder="0" allowfullscreen></iframe>
        </div>
        <div class="tip">
            <h2 style=color:rgb(241,118,30);>Tip 4: Use of Dumbbells</h2>
            <ul>
                <li>Lifting dumbbells <b>helps to strengthen and tone your muscles.</b> It's a simple yet effective way to <b>build muscle strength.</b></li>
                <li>Regular use of dumbbells can contribute to <b>increased bone density,</b> promoting better overall bone health.</li>
                <li>Using dumbbells engages stabilizing muscles, <b>enhancing your balance and overall stability.</b></li>
                <li>Dumbbells offer a wide range of exercises for different muscle groups. They are versatile and <b>suitable for various workout routines.</b></li>
                <li>Dumbbells are <b>compact and easy to store,</b> making them ideal for home workouts. You can target multiple muscle groups <b>without</b> the need for <b>complex equipment.</b></li>
            </ul>>
        </div>
        </div><br><br>

        <div class="tip-container">
        <div class="video-container" style=padding-bottom:56.25%;>
            <iframe width="560" height="315" src="images/fit5.mp4" frameborder="0" allowfullscreen></iframe>
        </div>
        <div class="tip">
            <h2 style=color:rgb(241,118,30);>Tip 5: Drink a lot of Water</h2>
            <ul>
                <li>Drinking water helps <b>keep your body hydrated.</b> It's like giving your body the fuel it needs to function properly.</li>
                <li>Water is <b>great for your skin.</b> It keeps it hydrated, making it look <b>fresh and healthy.</b></li>
                <li>Water helps your body <b>get rid of waste and toxins.</b> Think of it like a clean-up crew for your insides.</li>
                <li>When you drink enough water, you <b>feel more energetic.</b> It's like giving your body a little <b>power-up.</b></li>
                <li>Sometimes when you feel hungry, your body is actually thirsty. Drinking water can help <b>control unnecessary snacking</b> and keep you on a <b>healthy track.</b></li>
            </ul>
        </div>
        </div><br><br>

        <div class="tip-container">
        <div class="video-container" style=padding-bottom:56.25%; width:100%; Height 100%;>
            <iframe width="560" height="315" src="images/fit6.mp4" frameborder="0" allowfullscreen></iframe>
        </div>
        <div class="tip">
            <h2 style=color:rgb(241,118,30);>Tip 6: Meditation</h2>
            <ul>
                <li>Meditation <b>helps you relax</b> by calming your mind. It gives you a break from the busyness of life and <b>reduces stress.</b></li>
                <li>It <b>improves your ability to focus and concentrate.</b> Meditation trains your mind to stay present, leading to better clarity of thoughts.</li>
                <li>Meditation <b>encourages positive emotions.</b> It helps manage negative feelings, reducing anxiety and promoting a <b>sense of calm.</b></li>
                <li>Regular meditation can <b>improve sleep quality.</b> It relaxes your body and mind, making it easier to fall asleep and enjoy a more restful night.</li>
                <li>Meditation <b>strengthens the connection between your mind and body.</b> It heightens awareness of how your thoughts and emotions impact your <b>physical well-being.</b></li>
            </ul>
        </div>
    </div>
    </section>
</body>
</html>
