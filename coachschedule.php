<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- CSS -->
    <link rel="stylesheet" href="./css/dashboardstyle.css">
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
</section>

<script src="./js/script.js"></script>

<section class="dashboard">
    <div class="top">
        <i class="uil uil-bars sidebar-toggle"></i>

        <div class="search-box">
            <i class="uil uil-search"></i>
            <input type="text" class="search-bar" placeholder="Search here..." oninput="searchTable()">
        </div>
        
        <img src="" alt="">
    </div>
    <br><br><br>

    <script>
        function searchTable() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.querySelector('.search-bar');
            filter = input.value.toUpperCase();
            table = document.getElementById('myTable');
            tr = table.getElementsByTagName('tr');

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName('td')[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = '';
                    } else {
                        tr[i].style.display = 'none';
                    }
                }
            }
        }
    </script>

    <h2>Coach Schedules</h2>
    <table id="myTable">
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
</body>
</html>