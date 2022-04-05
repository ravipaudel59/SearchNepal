<?php
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

  $uploadedFile = "";
  if(isset($_POST["submit"])) {
    $Fullname = $_POST["full_name"];
    $email = $_POST["email"];
    $contact = $_POST["contact"];
    $position = $_POST["position"];
    $photo = $_FILES['file_cv']['name'];

    $tempname = $_FILES["file_cv"]["tmp_name"];    
    $folder = "upload/".$photo;   
    $fileName = basename($_FILES["file_cv"]["name"]);
    $targetFilePath = 'upload/' . $fileName;
    
     //database 
     $servername="localhost:3306";
     $username="searchnp_login";
     $password="#51784@60816";
     $dbname="searchnp_searchnepal";
 
     // sql connec
     $conn = mysqli_connect($servername, $username, $password, $dbname);
     
     $sql = "insert into form(fullname, email, photo, contact, position) values('$Fullname', '$email', '$photo', '$contact', '$position')";
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
    $body2 = "Dear $Fullname, <br> Your application has been confirmed. <br><br> With regards <br> Search Nepal"; //sender
    $to1 = 'praptituladhar2000@gmail.com';
    $to2 = $email;  
    
    $headers = "From : praptituladhar2000@gmail.com \r\n";  //admin's mail
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers = "Content-type:text/html;charset=UTF-8" . "\r\n";

     // attachments
     if(move_uploaded_file($tempname, $targetFilePath)){
      $uploadedFile = $targetFilePath;
    }
    // Boundary 
    $semi_rand = md5(time()); 
    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 
    
    // Headers for attachment 
    $headers = "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 

     // Multipart boundary 
     $body1 = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
     "Content-Transfer-Encoding: 7bit\n\n" . $body1 . "\n\n"; 

     // Preparing attachment
     if(is_file($uploadedFile)){
      $body1 = "--{$mime_boundary}\n";
      $fp =    fopen($uploadedFile,"rb");
      $data =  fread($fp,filesize($uploadedFile));
      fclose($fp);
      $data = chunk_split(base64_encode($data));
      $body1 = "Content-Type: application/octet-stream; name=\"".basename($uploadedFile)."\"\n" . 
      "Content-Description: ".basename($uploadedFile)."\n" .
      "Content-Disposition: attachment;\n" . " filename=\"".basename($uploadedFile)."\"; size=".filesize($uploadedFile).";\n" . 
      "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
    }
  
  $body1 = "--{$mime_boundary}--";
  $returnpath = "-f" . 'praptituladhar2000@gmail.com';
  
  // Send email
  $send = mail($to1,$subject1,$body1,$headers,$returnpath);
  
  // Delete attachment file from the server
  unlink($uploadedFile);
     
     
    $send = mail($to2,$subject2,$body2,$headers);
    // $send = mail($to2,$subject1,$body1,$headers);
   
    
    
    if($send == true){
        header('Location: index.html');
    }
    else{
        header('Location: apply.html');
    }
    
    // move_uploaded_file($tempname, $folder);
    
   
  }
    
?>