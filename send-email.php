<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reg";

$name = $_POST["GuestName"];
$email = $_POST["email"];
$message = $_POST["Message"];



	//Connection object
	$conn = new mysqli($servername, $username ,$password, $dbname);
	$sql="INSERT INTO contactdetails(GuestName,email,Message) VALUES('$name','$email','$message')";
	$result = mysqli_query($conn,$sql);



		if($result){
                echo "<script>alert('Data Inserted Succesfully')</script>";
                header("Location:Findus.html");
                //can redirect to the main page.....
            }
            else{
                echo"<script>alert('Error in inserting records')</script>";
            }
            

		


	$conn->close();

 


//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing true enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'arunukithmina123@gmail.com'    ;                     //SMTP username
    $mail->Password   = 'ixwekkvfiuwpyehj';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS

    //Recipients
    $mail->setFrom('kanchanasaranga33@gmail.com', 'server');
    $mail->addAddress('arunukithmina123@gmail.com', 'admin');     //Add a recipient
    
    //$mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo($email, 'user');
    $mail->addCC($email);
    //$mail->addBCC('bcc@example.com');

    //Attachments
   // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;
     

    $mail->send();
    echo 'Message has been sent';
    header("Location: Findus.html");
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>