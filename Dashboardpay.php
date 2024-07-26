<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="./css/dashboardstyle.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Admin Dashboard Panel</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: white;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: left;
            margin-top: 20px;
            color: blue;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px auto;
            background-color: lightblue;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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
</head>
<body>
<nav style="background-image: url(images/12.jpg);  position:fixed;">

<!-- Video Background -->
<video autoplay muted loop>
<source src="images/hd1594.mov" type="video/mp4">
</video>

<div class="logo-name">
    <div class="logo-image">
        <img src="./images/d.jpg.jpg" alt="">
    </div>
    <span class="logo_name" style=color:white;>Welcome Admin !</span>
</div>

<div class="menu-items">
    <ul class="nav-links">

    <li><a href="admin.php">
            <i style="color: white;" class="uil uil-users-alt"></i>
            <span style="color: white;" class="link-name"><b>Members</b></span>
        </a></li>
        <li><a href="coachdash.php">
            <i style="color: white;" class="uil uil-user-md"></i>
            <span style="color: white;" class="link-name"><b>Coaches</b></span>
        </a></li>
        <li><a href="coachschedule.php">
            <i style="color: white;" class="uil uil-clock"></i>
            <span style="color: white;" class="link-name"><b>Coach Schedules</b></span>
        </a></li>
        <li><a href="Dashboardpay.php">
            <i style="color: white;" class="uil uil-thumbs-up"></i>
            <span style="color: white;" class="link-name"><b>Payments</b></span>
        </a></li>
        <li><a href="view-inquiries.php">
            <i style="color: white;" class="uil uil-comment-question"></i>
            <span style="color: white;" class="link-name"><b>Web Inquiries</b></span>
        </a></li>
        <li><a href="userinq.php">
            <i style="color: white;" class="uil uil-user-exclamation"></i>
            <span style="color: white;" class="link-name"><b>User Inquiries</b></span>
        </a></li>
    </ul>
    
    <ul class="logout-mode">
        <li><a href="login.php">
            <i style="color: white;" class="uil uil-signout"></i>
            <span style="color: white;" class="link-name"><b>Logout</b></span>
        </a></li>

        
    </ul>
</div>
</nav>


    <div class="activity">
                <div class="title">
                    
                </div>

               
                </div>
            </div>
        </div>
    </section>

    <script src="./js/script.js"></script>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div>
            
            <img src="" alt="">
        </div>
        <br><br><br>

        <div id="regib">
<h2 style padding='20px'; text-align: left;>Payment Details</h2>
<?php
$conn = new mysqli('localhost', 'root', '', 'reg');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM payment;";
$result = $conn->query($sql);

if ($result) {
    echo "<table>";
    echo "<tr>
              <th>Ref Number</th>
              <th>Name</th>
              <th>Amount</th>
              <th>Time_Stamp</th>
          </tr>";

    $totalAmount = 0; // Initialize a variable to store the sum

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["UserName"] . "</td>";
        echo "<td>" . $row["Amount"] . "</td>";
        echo "<td>" . $row["Timestamp"] . "</td>";
        echo "</tr>";

        // Accumulate the amount for each row
        $totalAmount += $row["Amount"];
    }

    echo "</table>";

    // Display the total amount after the table
    echo "<p>Total Amount: " . $totalAmount . "</p>";
} else {
    echo "Query failed: " . $conn->error;
}

$conn->close();
?>


          
</body>
</html>