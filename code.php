<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_user']))
{
    $user_id = mysqli_real_escape_string($con, $_POST['delete_user']);

    $query = "DELETE FROM users WHERE id='$user_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "user Deleted Successfully";
        header("Location: admin.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "user Not Deleted";
        header("Location: admin.php");
        exit(0);
    }
}

if(isset($_POST['update_user']))
{
    $users_id = mysqli_real_escape_string($con, $_POST['users_id']);

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $age = mysqli_real_escape_string($con, $_POST['age']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $nic = mysqli_real_escape_string($con, $_POST['nic']);

    $query = "UPDATE users SET name='$name', email='$email', phone='$phone', age='$age' , address='$address' , nic='$nic' WHERE id='$users_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "user Updated Successfully";
        header("Location: admin.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "User Not Updated";
        header("Location: admin.php");
        exit(0);
    }

}

if(isset($_POST['save_user']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $age = mysqli_real_escape_string($con, $_POST['age']);
    $height = mysqli_real_escape_string($con, $_POST['height']);
    $weight = mysqli_real_escape_string($con, $_POST['weight']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $nic = mysqli_real_escape_string($con, $_POST['nic']);
    $package = mysqli_real_escape_string($con, $_POST['packages']);
    $dob = mysqli_real_escape_string($con, $_POST['dob']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
   
    $query = "INSERT INTO users (name, email, phone, gender, age, height, weight, address, nic, packages, dob, password) 
              VALUES ('$name', '$email', '$phone', '$gender', '$age', '$height', '$weight', '$address', '$nic', '$package', '$dob', '$password')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "User created successfully";
        header("Location: user-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "User not created";
        header("Location: user-create.php");
        exit(0);
    }
}


?>