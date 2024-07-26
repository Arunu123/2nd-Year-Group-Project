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

        .table-user-information > tbody > tr {
            border-top: 1px solid rgb(221, 221, 221);
            
        }

        .table-user-information > tbody > tr:first-child {
            border-top: 0;
        
        }


        .table-user-information > tbody > tr > td {
            border-top: 0;
            
        }

        .toppad{
            margin-top:20px;
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
            font-size: 30px; /* Adjust the font size as needed */
            font-style: italic;
        }

        body {
            overflow-x: hidden;
        }

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

        .link-name {
            color: white;
        }

        .dashboard{
            background-color: "";
            background-image: url(images/neww2.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed; /* Fix the background image */
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
    <img src="images/bg.avif" alt="">
    </div>
    <span class="logo_name" style="color:white; float:left;"><b>Welcome <?php echo $user['name']; ?> </b></span>
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
    </nav>

    <section class="dashboard">
    <div class="top-center">
    <h1>Ironcity Gymnasium</h1>
</div>
                    

    
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title>BMI Calculator</title>
    <style>
        body {
            background-color: #f4f4f4;
            text-align: center;
        }
        .container {
            margin-top: 50px;
            width: 600px; 
            height: 1200px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container" style="width: 600px; height:680px;">
        <h1 style="font-size:45px;">BMI Calculator</h1>

        <input type="hidden" id="bmi" name="bmi">

        <form id="bmiForm" method="post" action="save_bmi.php"><br><br><br>
        <div class="form-group">
        <label for="name" style="font-size:20px;">Name:</label>
        <input style="font-size:17px;" type="text" class="form-control" id="name" name="name" value="<?php echo $user['name']; ?>" readonly>
    </div><br>
            <div class="form-group">
                <label for="weight" style="font-size:20px;">Weight (kg):</label>
                <input style="font-size:17px;" type="number" class="form-control" id="weight" name="weight" placeholder="Enter your weight" required>
            </div><br>
            <div class="form-group">
                <label for="height" style="font-size:20px;">Height (cm):</label>
                <input style="font-size:15px;" type="number" class="form-control" id="height" name="height" placeholder="Enter your height" required>
            </div><br><br>
            <button style="font-size:20px;" type="button" class="btn btn-primary" onclick="calculateBMI()">Calculate BMI</button>
        </form>
        <div style="font-size:15px;" id="result" class="mt-4"></div>
        <div style="font-size:15px;" id="foodTips" class="mt-4"></div>
    </div>

    <script>
        function calculateBMI() {


            const weight = parseFloat(document.getElementById('weight').value);
            const height = parseFloat(document.getElementById('height').value);
            const bmiInput = document.getElementById('bmi');
            const resultDiv = document.getElementById('result');
            const foodTipsDiv = document.getElementById('foodTips');

            if (isNaN(weight) || isNaN(height) || weight <= 0 || height <= 0) {
                resultDiv.innerHTML = '<p>Please enter valid weight and height values.</p>';
                foodTipsDiv.innerHTML = '';
            } else {
                const bmi = weight / ((height / 100) ** 2);
                const bmiCategory = getBMICategory(bmi);
                const foodTips = getFoodTips(bmiCategory);

                resultDiv.innerHTML = `<p>Your BMI is: ${bmi.toFixed(2)}</p><p>You are ${bmiCategory}.</p>`;
                foodTipsDiv.innerHTML = `<h4>Food Tips:</h4><p>${foodTips}</p>`;
            }
        }

        function getBMICategory(bmi) {
            if (bmi < 18.5) {
                return 'Underweight';
            } else if (bmi >= 18.5 && bmi < 24.9) {
                return 'Normal';
            } else if (bmi >= 25 && bmi < 29.9) {
                return 'Overweight';
            } else {
                return 'Obese';
            }
        }

        function getFoodTips(bmiCategory) {
            switch (bmiCategory) {
                case 'Underweight':
                    return 'Focus on increasing calorie intake with nutrient-dense foods. Include lean proteins, whole grains, and healthy fats in your diet.';
                case 'Normal':
                    return 'Maintain a balanced diet with a variety of foods. Emphasize portion control and continue to make healthy choices.';
                case 'Overweight':
                    return 'Reduce calorie intake by choosing lean proteins, fiber-rich foods, and limiting added sugars and refined carbohydrates. Incorporate regular exercise.';
                case 'Obese':
                    return 'Seek professional guidance for a personalized weight loss plan. Emphasize whole foods, portion control, and regular physical activity.';
                default:
                    return 'No specific food tips available.';
            }
        }
    </script>

</body>
</html>
