<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ironcity Gym</title>
        <!-- Add Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/loginhe.css">
         

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
        <style>
            /* Add your custom CSS here */
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap');
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  user-select: none;
  font-family: 'Poppins', sans-serif;
}  
.bg-img {
  background: url("images/bg-1.jpg");
  height: 100vh;
  background-size: cover;
  background-position: center;
}
.bg-img:after {
  position: absolute;
  content: "";
  top: 25%;
  left: 0;
  height: 120%;
  width: 100%;
  background: rgba(0, 0, 0, 0.7);
}
.content {
  position: absolute;
  top: 75%;
  left: 50%;
  z-index: 999;
  text-align: center;
  padding: 60px 32px;
  width: 370px;
  transform: translate(-50%, -50%);
  background: rgba(255, 255, 255, 0.04);
  box-shadow: -1px 4px 28px 0px rgba(0, 0, 0, 0.75);
}
.content header {
  color: white;
  font-size: 33px;
  font-weight: 600;
  margin: 0 0 35px 0; 
}
.field {
  position: relative;
  height: 45px;
  width: 100%;
  display: flex;
  background: rgba(255, 255, 255, 0.94);
}
.field span {
  color: #222;
  width: 40px;
  line-height: 45px;
}
.field input {
  height: 100%;
  width: 100%;
  background: transparent;
  border: none;
  outline: none;
  color: #222;
  font-size: 16px; 
}
.space {
  margin-top: 16px;
}
.show {
  position: absolute;
  right: 13px;
  font-size: 13px;
  font-weight: 700;
  color: #222;
  display: none;
  cursor: pointer; 
}
.pass-key:valid ~ .show {
  display: block;
}
.pass {
  text-align: left;
  margin: 10px 0;
}
.pass a {
  color: white;
  text-decoration: none; 
}
.pass:hover a {
  text-decoration: underline;
}
.field input[type="submit"] {
  background: #3498db;
  border: 1px solid #2691d9;
  color: white;
  font-size: 18px;
  letter-spacing: 1px;
  font-weight: 600;
  cursor: pointer; 
}
.field input[type="submit"]:hover {
  background: #2691d9;
}
.login {
  color: white;
  margin: 20px 0; 
}
.links {
  display: flex;
  cursor: pointer;
  color: white;
  margin: 0 0 20px 0;
}
.facebook,
.instagram {
  width: 100%;
  height: 45px;
  line-height: 45px;
  margin-left: 10px;
}
.facebook {
  margin-left: 0;
  background: #4267b2;
  border: 1px solid #3e61a8;
}
.instagram {
  background: #e1306c;
  border: 1px solid #df2060;
}
.facebook:hover {
  background: #3e61a8;
}
.instagram:hover {
  background: #df2060;
}
.links i {
  font-size: 17px;
}
i span {
  margin-left: 8px;
  font-weight: 500;
  letter-spacing: 1px;
  font-size: 16px; 
}
.signup {
  font-size: 15px;
  color: white; 
}
.signup a {
  color: #3498db;
  text-decoration: none;
}
.signup a:hover {
  text-decoration: underline;
}
        </style>
    </head>
    
    <body style="background-image: url(./images/123.jpg);h">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#"><img src="images/bg.avif" class="logo" alt="*The logo of our Gymnasium*"></a>
            <h1 class="navbar-text title mx-auto ">Ironcity Gymnasium</h1>
            
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

      
        <!-- login form -->
        <div class="bg-img">
            <div  class="content" style="background-color: rgba(255, 255, 255, 0.5);">
                <header style="color: black;">Login Form</header>
                <form id="login" action="process_login.php" method="post" class="input-fill">
                    <div class="field">
                        <span class="fa fa-user"></span>
                        <input type="text" class="input-field" name="username" required placeholder="Email or Phone">
                    </div>
                    <div class="field space">
                        <span class="fa fa-lock"></span>
                        <input type="password" name="password" class="pass-key" required placeholder="Password">
                        <span class="show">SHOW</span>
                    </div>
                    <br>
                    <div class="field" >
                        <input type="submit" name="login" value="LOGIN">
                    </div>
                </form>
                <div class="login" style="color: black;"></div>
                <div class="links">
                    <div class="facebook">
                        <a href="https://www.facebook.com/profile.php?id=100063739526119&mibextid=LQQJ4d" 
                        style="color: black; text-decoration:none;"><span>Facebook</span></i>
                    </div>
                    
                </div>
                <div class="signup">Don't have an account?
                    <a href="register.php" style="color: black; text-decoration:underline;" >Signup Now</a>
                </div>
            </div>
        </div>

          <script>
            const pass_field = document.querySelector(".pass-key");
const showBtn = document.querySelector(".show");
showBtn.addEventListener("click", function () {
  if (pass_field.type === "password") {
    pass_field.type = "text";
    showBtn.textContent = "HIDE";
    showBtn.style.color = "#3498db";
  } else {
    pass_field.type = "password";
    showBtn.textContent = "SHOW";
    showBtn.style.color = "#222";
  }
});

          </script>
          
          <br><br>

<!--footer-->

<footer class="footer" id="ex1"  >
	
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