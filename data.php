<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ironcity Gym</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/he.css">
    <link rel="stylesheet" href="css/loginreg.css"/> 
    <style>
        /* Add your custom CSS here */
        body {
    background-image: url(../Gymnasium/images/bannerlg.jpg);
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
<!----Header close---->



<div id="regib">
<h3 style padding='20px';><center>...Accounts Details... </center></h3>
	
	
    <center>

	
	<?php
    /*
		     $sql = "SELECT * FROM users;";
		     $result=$conn->query($sql);

			if($result->num_rows>0){
				while($row=$result->fetch_assoc()){
					echo"<tr>";
					echo"<td>".$row["MemberID"]."</td>";
					echo"<td>".$row["nic"]."</td>";
					echo"<td>".$row["firstname"]."</td>";
					echo"<td>".$row["lastname"]."</td>";
					echo"<td>".$row["gender"]."</td>";
					echo"<td>".$row["age"]."</td>";
					echo"<td>".$row["height"]."</td>";
					echo"<td>".$row["weight"]."</td>";
					echo"<td>".$row["dob"]."</td>";
					echo"<td>".$row["address"]."</td>";
					echo"<td>".$row["mobile"]."</td>";
					echo"<td>".$row["packages"]."</td>";
					echo"<td>".$row["email"]."</td>";
					echo"</tr>";

				}
			}
			else{
				echo "No details to display";
			}

			echo"</table>";

			$conn->close();
	*/

    
    $conn = new mysqli('localhost','root','','reg');
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "SELECT * FROM users;";
    $result = $conn->query($sql);
    
    if ($result) {
        echo "<table>";
        echo "<tr>
                  <th>ID</th>
                  <th>NIC</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Gender</th>
                  <th>Age</th>
                  <th>Height</th>
                  <th>Weight</th>
                  <th>Date of Birth</th>
                  <th>Address</th>
                  <th>Mobile</th>
                  <th>Packages</th>
                  <th>Email</th>
              </tr>";
    
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo"<td>".$row["id"]."</td>";
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
    
        echo "</table>";
    } else {
        echo "Query failed: " . $conn->error;
    }
    
    $conn->close();
    ?>
    
			</table>
		</center>
		<br/>
	<style >
        /*
input[type=delete]{
  
  padding: 10px;
  margin: 5px 0 10px 9px;
  display: inline-block;
  border: none;
  background: #f1f1f1;

}
#deletebtn{
	background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  cursor: pointer;
  width: 50%;
  opacity: 0.9;
	
}
#deletebtn:hover {
  opacity: 1;
}
.form2{
	background: none;
	margin-left: 10px;
	width: 500px;
	margin-left: auto;
	margin-right: auto;
}
.dnic{

	color: black;
}
.divbk{
	background-color: white;
	margin-right: 10px;
}
.form3{
	background: none;
	width: 50%;
	margin-left: 10px;
	box-shadow: 0px 0px 10px 10px white;


}

	

.up{
	font-size: 17px;
	color: black;
	border-style: groove;
	background-color: white;
}
.ud{
	
	background: none;


}*/


           /* Add this CSS to style your table */
table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: center;
}

th {
    background-color: #f2f2f2;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

/* Center the table on the page */
table {
    margin: 0 auto;
}



	</style>

<br><br>
<form class="form2" action="deleteacc.php" method="POST">
    <div class="divbk">
      <label for="del" class="dnic"><b>Delete Your Account: Enter NIC</b></label>
    </div>
    <input type="text" name="del" placeholder="Enter NIC Number" required>
    <input type="submit" id="deletebtn" value="Delete Account">
  </form>

<center>

<br><br>
	
<form class="form3" action="update.php" method="POST">
	

<div class="ud" >
	<table    >
		<tr ><th colspan="5"><label for = "update" class="up"><b>Update Account Details</b></label></th>
		</tr>
		<tr>
			<td><label for = "nic" class="up">NIC:</label><br/>
				<input type="NIC" name="nic" pattern="[0-9]{12}" placeholder="200116404223" ><br></td>	
			<td><label for = "age" class="up">Age:</label><br/>
				<input type="number" name="age" pattern="[0-9]{2}" placeholder="Age" ><br></td>
			<td><label for = "weight" class="up">Weight:</label><br/>
				<input type="text" name="weight" placeholder="Weight" ><br></td>
			<td rowspan="2"><br/><label for = "address" class="up">Address:</label><br/>
		    <textarea name="address" class="area" rows="3" cols="50" ></textarea><br></td>
			<td><label for = "mnumber" class="up">Mobile Number:</label><br/>
				<input type="phone" name="mobile" pattern="[0-9]{10}" placeholder="0714782233" ></td>
	
	
		</tr>
		<tr></tr>
	</table>
	</div>

				<input type="submit" id="submitbtn" value="Update Account">

</form>

</center>

<style>

     /* Styles for the delete account form */
.form2 {
  text-align: center;
  margin-top: 20px;
}

.divbk {
  background-color: #f0f0f0;
  padding: 10px;
}

.dnic {
  font-weight: bold;
}

#deletebtn {
  background-color: #ff0000;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  cursor: pointer;
  margin-top: 20px; ;
}

/* Styles for the update account form */
.form3 {
  text-align: center;
  margin-top: 20px;
}

.ud {
  background-color: #f0f0f0;
  padding: 20px;
}

.up {
  font-weight: bold;
}

.area {
  width: 100%;
}

#submitbtn {
  background-color: #007bff;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  cursor: pointer;
  margin-top: 10px;
}


</style>







<br/><br/><br/><br/><br/><br/><br/><br/>

</div>

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

 