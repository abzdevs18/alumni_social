<?php
	include '../../inc/conn_db.php';
	session_start();

 if (isset($_POST['email'])) {
   	$date = $_POST['dateSend'];
   	$sbj = mysqli_real_escape_string($conn,$_POST['subject']);
   	$msg = mysqli_real_escape_string($conn,$_POST['message']);

      require '../PHPMailerAutoload.php';
      require 'credentials.php';
      $mail = new PHPMailer;
      $mail->isSMTP();                                      // Set mailer to use SMTP
      $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = EMAIL;                 // SMTP username
      $mail->Password = PASS;                           // SMTP password
      $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
      $mail->Port = 587;                                    // TCP port to connect to
      $mail->setFrom(EMAIL, 'Alumni Monitoring System');

      $em = mysqli_query($conn,"SELECT email FROM users");
      while ($e = mysqli_fetch_assoc($em)) {
      	$mail->addAddress($e['email']);  
      }
      $mail->addReplyTo(EMAIL);
      $mail->Subject = $sbj;
      $mail->Body    = $msg;
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
      if(!$mail->send()) {
          echo 'Message could not be sent.';
          echo 'Mailer Error: ' . $mail->ErrorInfo;
      } else {
				
			// $send_timestamp = $_SERVER['REQUEST_TIME'];
			$query = "INSERT INTO `emails` (`subject`, `content`, `date_send`) VALUES ('$sbj', '$msg','$date')";
			$query_statement = mysqli_query($conn,$query);
		if ($query_statement) {
				// after submit form redirect to the same person ID
			header("Location: ../message.php?user=2"); 
			exit();
		}else{
			echo mysqli_error($conn);
		}
    }
 }