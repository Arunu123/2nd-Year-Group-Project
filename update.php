<?php
	include_once 'config.php';
?>

<?php
	$nic= $_POST['nic'];
	$age= $_POST['age'];
	
	$weight= $_POST['weight'];
	$address= $_POST['address'];
	$mobile= $_POST['mobile'];

	if(isset($_GET['nic'])) {
		$nic = $_GET['nic'];
	
	if(mysqli_query($conn,"UPDATE users SET `age`='".$age."',`weight`='".$weight."',`address`='".$address."',`phone`='".$mobile."' WHERE `nic`='".$nic."'")){

		echo "<script>alert('Data Inserted Succesfully')</script>";
		header("Location:admin.php");
		//can redirect to the main page.....
	}
	else{
		echo"<script>alert('Error in inserting records')</script>";
	}
}
	mysqli_close($conn);
?>
