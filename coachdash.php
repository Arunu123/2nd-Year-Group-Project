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
</head>

<style>
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
                <input type="text" class="search-bar" placeholder="Search here..." oninput="searchTable()">
            </div>
            
            <img src="" alt="">
        </div>
        <br><br><br>





        <?php
    session_start();
    require 'dbcon.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Users CRUD</title>
    
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
            border-bottom: none;
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
    </style>
</head>
<body>
  
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                        <h4 style="color: blue;"><b>Coach Details
                        <a href="coach-create.php" style="float: right;" class="btn btn-primary float-end">Add Coaches</a></b></h4>

                    <div class="card-body">

                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Password</th>
                                    <th>NIC</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM coach";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $coach)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $coach['id']; ?></td>
                                                <td><?= $coach['username']; ?></td>
                                                <td><?= $coach['email']; ?></td>
                                                <td><?= $coach['phone']; ?></td>
                                                <td><?= $coach['password']; ?></td>
                                                <td><?= $coach['nic']; ?></td>
                                                
                                                <td  style="display: flex; gap: 5px;">
                                                    <a href="coach-view.php?id=<?= $coach['id']; ?>" class="btn btn-info btn-sm">View</a>
                                                    <a href="coach-edit.php?id=<?= $coach['id']; ?>" class="btn btn-success btn-sm">Edit</a><br>
                                                    <form id="deleteForm<?=$coach['id'];?>" action="coach-code.php" method="POST" class="d-inline">
                                                        <button type="button" onclick="confirmDelete(<?=$coach['id'];?>)" class="btn btn-danger btn-sm">Delete</button>
                                                        <input type="hidden" name="delete_coach" value="<?=$coach['id'];?>" />
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
           
            </div>
        </div>
    </div>
     


    <script>
    function searchTable() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.querySelector('.search-bar');
        filter = input.value.toUpperCase();
        table = document.getElementById('myTable');
        tr = table.getElementsByTagName('tr');

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName('td')[1]; // Change index based on the column you want to search
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

<script>
function confirmDelete(coachId) {
    var result = confirm("Are you sure you want to delete this coach?");
    if (result) {
        // If the user clicks "OK," submit the form
        document.getElementById("deleteForm" + coachId).submit();
    } else {
        // If the user clicks "Cancel," do nothing
    }
}
</script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>


       

          