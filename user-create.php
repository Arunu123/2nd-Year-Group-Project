<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>user create</title>
    <script>
        function validatePhoneNumber() {
            var phone = document.getElementById('phone').value;
            if (phone.length !== && <= 10) {
                alert('Phone number must be 10 digits long.');
                return false;
            }
            return true;
        }

        function validateNIC() {
            var nic = document.getElementById('nic').value;
            if (nic.length !== 12) {
                alert('NIC number must be 12 digits long.');
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add a new Member 
                            <a href="admin.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">

                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                            <label>Date of Birth</label>
                            <input type="date" name="dob" class="form-control" required>
                        </div>
                            <div class="mb-3">
                                <label>Phone</label>
                                <input type="text" id="phoneNumber" maxlength="10"name="phone" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Gender</label>
                                <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="male"
                                            value="male" checked>
                                        <label class="form-check-label" for="male">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="female"
                                            value="female">
                                        <label class="form-check-label" for="female">Female</label>
                                    </div>
                            </div>
                            <div class="mb-3">
                                <label>Age</label>
                                <input type="text" name="age" class="form-control" required>
                            </div>

                            <div class="mb-3">
                            <label for="height">Height in cm:</label>
                            <input type="text" name="height" id="height" class="form-control" placeholder="Height" required>
                        </div>
                        <div class="mb-3">
                            <label for="weight">Weight in kg:</label>
                            <input type="text" name="weight" id="weight" class="form-control" placeholder="Weight" required>
                        </div>
                      
                            <div class="mb-3">
                                <label>Address</label>
                                <input type="text" name="address" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>NIC</label>
                                <input type="text" name="nic" id="nicNumber" maxlength="12" class="form-control" required>
                            </div>    

                             <div class="mb-3">
                            <label for="package">Choose a Package:</label>
                            <select id="package" name="packages" class="form-control">
                                <option value="Royal Fitness">Royal Fitness</option>
                                <option value="Diamond Fitness">Diamond Fitness</option>
                                <option value="Platinum Fitness">Platinum Fitness</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="password">Password:</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="mb-3">
                            <label for="repassword">Re-enter Password:</label>
                            <input type="password" name="repassword" id="repassword" class="form-control" placeholder="Confirm Password" required>
                        </div>
                        


                            <div class="mb-3">
                                <button type="submit" name="save_user" class="btn btn-primary">Save user</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
