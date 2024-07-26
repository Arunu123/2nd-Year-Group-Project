<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ironcity Gym</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/he.css">
    <link rel="stylesheet" href="css/.css">

    <!-- Add Bootstrap JS and jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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

        function validatePassword() {
            var password = document.getElementById('password').value;
            var repassword = document.getElementById('repassword').value;

            if (password !== repassword) {
                alert('Passwords do not match.');
                return false;
            }

            return true;
        }
    </script>

    <style>
        /* Add your custom CSS here */
        .registration-box {
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
        }

        body {
            background-image: url(./images/about-us.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center center;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#"><img src="images/bg.avif" class="logo" alt="*The logo of our Gymnasium*"></a>
        <h1 class="navbar-text title mx-auto ">Ironcity Gymnasium</h1>
        <button class="btn btn-light ml-auto" onclick="location.href='login.php'">Login</button>
    </nav>

    <!-- Navigation bar -->
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="view.html">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="packages.html">Packages</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="membership.html">Membership</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="Findus.html">Find Us</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="aboutus.html">About Us</a>
        </li>
    </ul>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="border rounded p-4 registration-box">
                    <form class="form0" action="registration.php" target="" method="POST" onsubmit="return validatePassword()">
                        <center>
                            <h1>Register Now!</h1>
                        </center>
                        <p class="text-center">Please fill the form to register.</p>
                        <hr>

                        <!-- Left Column -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstname">Full Name:</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Full Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="gender">Gender:</label><br>
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
                                <div class="form-group">
                                    <label for="age">Age:</label>
                                    <input type="number" name="age" id="age" pattern="[0-9]{2}" class="form-control"
                                        placeholder="Age" required>
                                </div>
                                <div class="form-group">
                                    <label for="height">Height in cm:</label>
                                    <input type="text" name="height" id="height" class="form-control"
                                        placeholder="Height" required>
                                </div>
                            </div>

                            <!-- Right Column -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="weight">Weight in kg:</label>
                                    <input type="text" name="weight" id="weight" class="form-control"
                                        placeholder="Weight" required>
                                </div>
                                <div class="form-group">
                                    <label for="dob">Date Of Birth:</label>
                                    <input type="date" name="dob" id="dob" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="id_num">NIC:</label>
                                    <input type="text" name="id_num" id="id_num" maxlength="12" class="form-control" placeholder="xxxxxxxxxxxx" required>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address:</label>
                                    <input type="text" name="address" id="address" class="form-control"
                                        placeholder="Address" required>
                                </div>
                                <div class="form-group">
                                    <label for="mobile">Mobile Number:</label>
                                    <input type="tel" name="mobile" id="mobile" maxlength="10" class="form-control"  placeholder="071-xxxxxxx" required>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="package">Choose a Package:</label>
                            <select id="package" name="packages" class="form-control" required>
                                <option value="Royal Fitness">Royal Fitness</option>
                                <option value="Diamond Fitness">Diamond Fitness</option>
                                <option value="Platinum Fitness">Platinum Fitness</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}"
                                class="form-control" placeholder="abc@gmail.com" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                        </div>
                        
                        <div class="form-group text-center">
                            <input type="submit" id="submitbtn" class="btn btn-primary" value="Register">
                        </div>
                    </form>
                    <div class="container signin text-center">
                        <p>Click on Login to manage your own account !<a href=""></a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br><br><br>

    
 <!-- Footer -->
    
 <footer class="footer" id="ex1" >
	
	<table  style="width:100%">	
			

			<tr>
  				<td><img src ="images/net.png" alt="fbicon" class="foot-icon"> Visit :www.ironcitygym.lk<br>
  					<img src ="images/call.png" alt="fbicon" class="foot-icon">Call Us : +94 763096425<br>
  					<img src ="images/Location.png" alt="fbicon" class="foot-icon">Location : <a href="https://goo.gl/maps/f8wNYQcdg5M81ktY6"> Nugegalayaya, Sooriyawewa</a> <br>

  				</td>



				<td class="col4">
							© All Rights Reserved.<br>
  	       					ironcity Pvt Ltd<br>
  							<a href="ironcitygym@gmail.com">ironcitygym12@gmail.com</a>
  				</td>

			<td >	
				<div id="textAlign">
  					<p class="foots">Follow Us On  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;</p>
					<a href="/"><img src ="images/fbb.png" alt="fbicon"  width="40" height="40" > </a>
					<a href=""><img src ="images/tweeticon.png" alt="teewticon"  width="40" height="40" ></a>
					<a href=""><img src ="images/insticon.png" alt="yticon"  width="45" height="40" > </a>
				</div>
			</td>
		

		</tr>

</table>

</footer>


</body>

</html>


