<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>

     <link rel="stylesheet" href="css/pheaderFooter.css"/>
	
	<link rel="stylesheet" href="css/useraccount.css"/> 

</head>
<body>
   
       <!--Header-->
       <div id="bcolor">
            
        <table  width="100%">
            <tr>
                <td>	<a href=""><img src="images/bg.avif" class="logo" alt="*The logo of our Gymnasium*" /></a></td>
                <td class="col1"><h1 class="title">Ironcity Gymnasium</h1></td>

                <td class="col2" >
                        
                        <a href="../login.html">
                                    <button class="btn1" > Login</button></a><img src="images/login.png" id="accp" align="center" alt="*The logo of login*" />

                </td>
             </tr>
                    
        </table>
                    
     </div>				
<!----Header close---->

<!--Navigation bar-->
<ul class="menu">
    <li class="menu"> <a href="view.html"> Home</a> </li>
    <li class="menu"> <a href="packages.html"> Packages</a></li>
    <li class="menu"> <a href="membership.html"> Membership</a></li>
    <li class="menu"> <a href="FindUs.html"> Find us</a></li>
    <li class="menu"> <a href="AboutUs.html"> About Us</a></li>
</ul>
<hr id="test"/>
<div id="regib">
  <br>
  <center>
    <div>
      <img src="./images/user1.jpg">
    </div>
    <form class="form2" action="useracc.php" method="POST">
      <label for="nic" class="dnic"><b>Enter NIC Number</b></label>
      <input type="text" name="nic" placeholder="Enter NIC Number" required><br/>
      <input type="submit" id="findmy" value="Find My Account">
    </form>
  </center>
  <br><br/>
  <div>
    <p class="font1" align="center">...View Accounts Details...</p>
    <center>
      <table border="1" width="80%" bgcolor="white">
        <tr>
          <th>nic</th>
          <th>firstname</th>
          <th>lastname</th>
          <th>gender</th>
          <th>age</th>
          <th>height</th>
          <th>weight</th>
          <th>dob</th>
          <th>address</th>
          <th>mobile</th>
          <th>packages</th>
          <th>email</th>
        </tr>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "reg";

          // Create connection
          $conn = new mysqli($servername, $username, $password, $dbname);

          // Check connection
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }

          $nic = $_POST['nic'];

          $sql = "SELECT nic, firstname, lastname, gender, age, height, weight, dob, address, phone, packages, email FROM users WHERE nic=?";
          $stmt = $conn->prepare($sql);
          $stmt->bind_param("s", $nic);
          $stmt->execute();
          $result = $stmt->get_result();

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . $row["nic"] . "</td>";
              echo "<td>" . $row["firstname"] . "</td>";
              echo "<td>" . $row["lastname"] . "</td>";
              echo "<td>" . $row["gender"] . "</td>";
              echo "<td>" . $row["age"] . "</td>";
              echo "<td>" . $row["height"] . "</td>";
              echo "<td>" . $row["weight"] . "</td>";
              echo "<td>" . $row["dob"] . "</td>";
              echo "<td>" . $row["address"] . "</td>";
              echo "<td>" . $row["phone"] . "</td>";
              echo "<td>" . $row["packages"] . "</td>";
              echo "<td>" . $row["email"] . "</td>";
              echo "</tr>";
            }
          } else {
            echo "<tr><td colspan='12'>No details to display</td></tr>";
          }

          $stmt->close();
          $conn->close();
        }
        ?>
      </table>
    </center>
  </div>
</div>

	<br>

<center>
<form class="form3" action="update.php" method="POST">
	
	<table   >
		<tr ><th colspan="7"><label for = "update" class="up"><b>Update Account Details</b></label></th>
		</tr>
		<tr>
			<td><label for = "nic" class="up">NIC:</label><br/>
				<input type="NIC" name="nic" pattern="[0-9]{12}" placeholder="200116404223" ><br></td>
			<td>
				<label for = "age" class="up">First Name:</label><br/>
				<input type="text"  name="firstname" placeholder="First Name" required>
			</td>
			<td>
				<label for = "age" class="up">Last Name:</label><br/>
				<input type="text"  name="lastname" placeholder="Last Name" required>
			</td>	
			<td><label for = "age" class="up">Age:</label><br/>
				<input type="number" name="age" pattern="[0-9]{2}" placeholder="Age" ><br></td>
			<td><label for = "weight" class="up">Weight:</label><br/>
				<input type="text" name="weight" placeholder="Weight" ><br></td>
			<td rowspan="2"><br/><br/><br/><br/><label for = "address" class="up">Address:</label><br/>
		    <textarea name="address" class="area" rows="8" cols="50" ></textarea><br></td>
			<td><label for = "mnumber" class="up">Mobile Number:</label><br/>
				<input type="phone" name="mobile" pattern="[0-9]{10}" placeholder="0714782233" ></td>
	
	
		</tr>
		<tr></tr>
	</table>
	

				<input type="submit" id="submitbtn" value="Update Account">

</form>

</center>




<!--Page Content End-->

<!--footer-->

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