<?php
use \PHPMailer\PHPMailer\PHPMailer;
use \PHPMailer\PHPMailer\Exception;

  $msg = "";
  if(isset($_POST["submit"])) {
    $Fullname = $_POST["full_name"];
    $email = $_POST["email"];
    $photo = $_FILES['file_cv']['name'];

    $tempname = $_FILES["file_cv"]["tmp_name"];    
    $folder = "../upload/".$photo;    
    
    require('connection.php');
     
     $sql = "insert into form(fullname, email, photo) values('$Fullname', '$email', '$photo')";
     mysqli_query($conn, $sql);
     move_uploaded_file($tempname, $folder);
     mysqli_close($conn);
     
       //   if(mysqli_query($conn, $sql)){
   //     echo"New student information saved successfully";
   // }
   // else{
   //     echo"Error:".$sql."<br>". mysqli_error($conn);
   // }

    // send the mail
    $subject1 = "Job Application"; //admin
    $subject2 = "Confirmation regarding your application"; //sender

    $body1 = "Fullname : \r\n".$Fullname."<br>"."Email : \r\n".$email."\r\n"; //admin
    $body2 = "Your application has been confirmed. <br><br> With regards <br> Search Nepal"; //sender
    $to = $email;
    $headers = "From : praptituladhar2000@gmail.com \r\n";  //admin's mail

    require_once "../PHPMailer/PHPMailer.php";
    require_once "../PHPMailer/SMTP.php";
    require_once "../PHPMailer/Exception.php";

    $mail = new PHPMailer();
    // SMTP setting
    $mail->SMTPDebug = 4; 
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "praptituladhar2000@gmail.com";  //login id (admin)
    $mail->Password = '9860680614';  //login password
    $mail->Port = 587;
    $mail->SMTPSecure = "tls";

    // email setting
    $mail->isHTML(true);
    $mail->setFrom("praptituladhar2000@gmail.com",'Prapti Tuladhar'); //admin
    $mail->addAddress('praptituladhar2000@gmail.com'); //first of admin
    // $mail->addReplyTo('praptituladhar2000@gmail.com');
  
    // attachments
    $mail->addAttachment('var/tmp/file.tar.gz');
    $mail->addAttachment($folder);
    // content
    $mail->isHTML(true);
    $mail->Subject = ("praptituladhar2000@gmail.com ($subject1)");
    $mail->Body = $body1;

    if($mail->send()){
      $status = "success";
      $response = "Email is sent";
      $mail->clearAddresses();
      $mail->clearAttachments();
      $mail->addAddress($email);
      $mail->Subject = ("$email ($subject2)");
      $mail->Body = $body2;
      $mail->send();
      header('Location: ../index.html');
      }
    else{
      $status = "failed";
      $response = "Something is wrong: <br>" . $mail->ErrorInfo;
      header('Location: ../apply.html');
    }
    exit(json_encode(array("status" => $status, "response" => $response)));

    // move_uploaded_file($tempname, $folder);
    
   
  }
    
?>