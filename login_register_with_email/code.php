<?php
session_start();
include('db.php');
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.@gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'calatravarico433@gmail.com';                     //SMTP username
    $mail->Password   = 'bfes yzna scdn cexh  ';                          //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('calatravarico433@gmail.com', 'Mailer');
    $mail->addAddress('calatravarico433@gmail.com', 'Joe User');     //Add a recipient
   
    //Attachments
    $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                        //Set email format to HTML
    $mail->Subject = 'Email verification from secre-alt';
    $mail_template = "
        <h1>You have Registered with Hiicoy</h2>
        <h5>Verify your Email address to login with the link below</h5>
        <br></br>
        <a href='http://localhost/CALATRAVA/login_register_with_email/verify_email.php?token=$verify_token'>Click Me</a>
    ";
    $mail->Body    = $mail_template;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


if (isset($_POST['register_btn'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone']; 
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
    $verify_token = md5(rand()); 

    // Send verification email
    sendemail_verify($name, $email, $verify_token);

    // Check if email already exists
    $check_email_query = "SELECT email FROM users WHERE email = '$email' LIMIT 1";
    $check_email_query_run = mysqli_query($con, $check_email_query);

    if (mysqli_num_rows($check_email_query_run) > 0) {
        $_SESSION['status'] = "Email ID already exists!";
        header("Location: register.php");
    } else {
        // Insert user data into the database
        $query = "INSERT INTO users (name, phone, email, password, verify_token) 
                  VALUES ('$name', '$phone', '$email', '$password', '$verify_token')";
        $query_run = mysqli_query($con, $query);

        if ($query_run) {
            $_SESSION['status'] = "Registration Successful! Please verify your Email Address.";
            header("Location: register.php");
        } else {
            $_SESSION['status'] = "Registration Failed. Please try again.";
            header("Location: register.php");
        }
    }
} 
?>