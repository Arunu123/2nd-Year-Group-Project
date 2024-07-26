<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_coach']))
{
    $user_id = mysqli_real_escape_string($con, $_POST['delete_coach']);

    $query = "DELETE FROM coach WHERE id='$user_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "user Deleted Successfully";
        header("Location: coachdash.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "user Not Deleted";
        header("Location: coachdash.php");
        exit(0);
    }
}

if(isset($_POST['update_coach']))
{
    $coach_id = mysqli_real_escape_string($con, $_POST['coach_id']);

    $name = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $nic = mysqli_real_escape_string($con, $_POST['nic']);

    $query = "UPDATE coach SET username='$name', email='$email', phone='$phone', nic='$nic' WHERE id='$coach_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "coach Updated Successfully";
        header("Location: coachdash.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "coach Not Updated";
        header("Location: coachdash.php");
        exit(0);
    }

}


if(isset($_POST['save_coach']))
{
    $name = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);

    $coaching_type=mysqli_real_escape_string($con, $_POST['coaching_type']);

    $phone = mysqli_real_escape_string($con, $_POST['phone']);
   
   
   
    $nic = mysqli_real_escape_string($con, $_POST['nic']);

    $password = mysqli_real_escape_string($con, $_POST['password']);
   

    $query = "INSERT INTO coach (username,email,coaching_type,phone,nic,password) VALUES ('$name','$email','$coaching_type','$phone','$nic','$password')";


    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "coach Created Successfully";
        header("Location: coach-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "coach Not Created";
        header("Location: coach-create.php");
        exit(0);
    }
}

?>