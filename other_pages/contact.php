<?php



if($_POST){
    $userName = $_POST['visitor_name'];
    $userEmail = $_POST['visitor_email'];
    $userSubject = $_POST['visitor_subject'];
    $userMessage = $_POST['visitor_message'];

    $body = '';

    if(isset($_POST['visitor_name'])) {
        $userName = filter_var($_POST['visitor_name'], FILTER_SANITIZE_STRING);
        $body .= 'From: '.$userName. '\r\n';
    }

    if(isset($_POST['visitor_email'])) {
        $userEmail = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['visitor_email']);
        // $visitor_email = filter_var($visitor_email, FILTER_VALIDATE_EMAIL);
        $body .= 'Email: '.$userEmail. '\r\n';
    }

    if(isset($_POST['visitor_subject'])) {
        
       
        $body .= 'Subject: '.$userSubject. '\r\n';
    }



    if(isset($_POST['visitor_message'])) {
        $user_message = htmlspecialchars($_POST['visitor_message']);
        $body .= 'Message: '.$userMessage. '\r\n';
    }

    $recipient = 'connor.doherty97@gmail.com';


    mail($recipient, $userSubject, $body);

    // $headers  = 'MIME-Version: 1.0' . "\r\n"
    // .'Content-type: text/html; charset=utf-8' . "\r\n"
    // .'From: ' . $visitor_email . "\r\n";

    if(mail($recipient, $userSubject, $body)) {
        echo "<p>Thank you for contacting us, $visitor_name. You will get a reply within 24 hours.</p>";
    } else {
        echo '<p>We are sorry but the email did not go through.</p>';
    }

} else {
    echo '<p>Something went wrong</p>';
}





?>


<!--   storage from top of contact_test



<php
   
  


     if(filter_var())

    //submit form
  if(isset($_POST['email']) && $_POST['email']!= ''){
    $userName = $_POST['visitor_name'];
    $userEmail = $_POST['visitor_email'];
    $userSubject = $_POST['visitor_subject'];
    $userMessage = $_POST['visitor_message'];
    
 
 
    $TO = 'connor.doherty97@gmail.com';
    $body = '';
 
    $body .= 'From: '.$userName. '\r\n';
    $body .= 'Email: '.$userEmail. '\r\n';
    $body .= 'Message: '.$userMessage. '\r\n';
    
    mail($to,$userSubject,$body);
    
  }



-->