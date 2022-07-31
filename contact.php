<?php
 
//PHP MAILER

use PHPMailer\PHPMailer\PHPMailer;

require 'vendor/autoload.php';

if (array_key_exists('subject', $_POST)) {
    $err = false;
    $msg = '';
    $email = '';
    //Apply some basic validation and filtering to the subject
    if (array_key_exists('subject', $_POST)) {
        $subject = substr(strip_tags($_POST['subject']), 0, 255);
    } else {
        $subject = 'No subject given';
    }
    //Apply some basic validation and filtering to the query
    if (array_key_exists('query', $_POST)) {
        //Limit length and strip HTML tags
        $query = substr(strip_tags($_POST['query']), 0, 16384);
    } else {
        $query = '';
        $msg = 'No query provided!';
        $err = true;
    }
    //Apply some basic validation and filtering to the name
    if (array_key_exists('name', $_POST)) {
        //Limit length and strip HTML tags
        $name = substr(strip_tags($_POST['name']), 0, 255);
    } else {
        $name = '';
    }
    //Validate to address
    //Never allow arbitrary input for the 'to' address as it will turn your form into a spam gateway!
    //Substitute appropriate addresses from your own domain, or simply use a single, fixed address
    if (array_key_exists('to', $_POST) && in_array($_POST['to'], ['sales', 'support', 'accounts'], true)) {
        $to = 'connor.doherty97@gmail.com';
    } else {
        $to = 'connor.doherty97@gmail.com';
    }
    //Make sure the addinfo@downeastlog.com before trying to use it
    if (array_key_exists('email', $_POST) && PHPMailer::validateAddress($_POST['email'])) {
        $email = $_POST['email'];
    } else {
        $msg .= 'Error: invalid email address provided';
        $err = true;
    }
    if (!$err) {

        $mail = new PHPMailer();

        $mail->SMTPDebug = 2;

        $mail->isSMTP();
        $mail->Host = 'smtp.ipower.com';
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'sales@downeastlogistics.com';                 // SMTP username
        $mail->Password = 'Bmca&h!S9k8#517';
        $mail->Port = 25;
        $mail->CharSet = PHPMailer::CHARSET_UTF8;
        //It's important not to use the submitter's address as the from address as it's forgery,
        //which will cause your messages to fail SPF checks.
        //Use an address in your own domain as the from address, put the submitter's address in a reply-to
        $mail->setFrom('sales@downeastlogistics.com', (empty($name) ? 'Contact form' : $name));
        $mail->addAddress('connor.doherty97@gmail.com');
        $mail->addReplyTo($email, $name);
        $mail->Subject = 'Contact form: ' . $subject;
        $mail->Body = "Contact form submission\n\n" . $query;
        if (!$mail->send()) {
            $msg .= 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            $msg .= 'Message sent!';
        }
    }
} ?>


<html lang="en">
<head>
    <meta charset="UTF-8">
   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = 'stylesheet' href = "css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@200&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;1,200;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d0e2e32f6e.js" crossorigin="anonymous"></script>
    <title>Contact</title>
</head>
<body>
   




    <header>
        <section class = "marketLinks">
            <!--Email-->
            <div>
            <a href = "mailto:sales@downeastlogistics.com">
            <i class="fa-solid fa-envelope"></i>
            <span>sales@downeastlogistics.com</span>
            </a>
            </div>
            <!--Fedmall, GSA, etc Vendor Page Links-->
            <img src = 'photos/fedmall_gsa_holder2.jpg'>
        </section>
        <section class = "titleAndCreds">
            <div>
                <img src = 'photos/dlogo.jpg'>
                
            </div>
            <div class = "stamps">
                <!--SDVOSB EDWOSB ETC STAMPS-->
                <img src = 'photos/fullribbons.jpg'>
            </div>
        </section>

        <!--HIDDEN SECTIONS FOR MOBILE VERSION-->

        <section class = 'mobile hidden mobileLogo'>

        <img src = 'photos/dlogo.jpg'>

        </section>
        <section class = 'mobile hidden mobile-nav'>

        <i class="fa-solid fa-bars hamburger"></i>

        </section>

        <section class = 'hidden-nav invisible'>
        <ul>
   
            <a class = 'no-top-border' href = '../index.html'><li>Home</li></a>
            <a href = 'about.html'><li>About</li></a>
            <a href = 'capabilities.html'><li>Capabilities</li></a>
            <a href = 'products.html'><li>Products</li></a>
            <a class = 'no-bottom-border' href = 'contact.php'><li>Contact</       li></a>

        </ul>
        </section>

        <nav>
            <ul>
                <a  class = 'home' href = 'index.html'><li>Home</li></a>
                <a href = 'about.html'><li>About</li></a>
                <a href = 'capabilities.html'><li>Capabilities</li></a>
                <a href = 'products.html'><li>Products</li></a>
                <a href = 'contact.php'><li>Contact</li></a>
            </ul>
        </nav>
        

        

        </section>

        <div class = "slogan">
            <div class = 'filler'></div>
            <h2>Contact</h2>
        </div>
    
    </header>

    <div class = 'contact-body-photo'>

    <section class = 'contact-body'>

        <!-- <img src="../photos/portland_headlight.jpg"> -->
    

        <div class = 'form'>
            <h3>Contact Information</h3>
            <h4>Send us a message</h4>


            <!--action = 'contact.php' -->
            <?php if (empty($msg)) { ?>
            
            <form method = 'post'>
                
                <div class = 'form-group'>
                   <label for = 'name' class = 'form-label'>Your Name</label>
                    <input type='text' id = 'name' name = 'name' placeholder="Name" maxlength='255' required>
                </div>
                <div class = 'form-group'>
                <label for = 'email' class = 'form-label'>Your Email</label>
                    <input type='text' id = 'email' name = 'email' placeholder="Email" maxlength = '255' required>
                </div>

                <div class = 'form-group'>

                <label for = 'subject' class = 'form-label'>Subject</label>
                    <input type='text' id = 'subject' name = 'subject' placeholder="Subject" maxlength = '255' required>
                </div>

                <div class = 'form-group'>
                    
                    
                    <label for = 'query' class = 'form-label'>Message:</label>
                    <textarea style = 'width:100%; height:150px' id = 'query' name='query' placeholder="Message..."></textarea>
                </div>
                <button type = 'submit'>Send Message</button>
            </form>
            <?php } else {
    echo $msg;
} ?>

        </div>
    </section>
    </div>
    
    <footer class = 'footer'>
        <span>Downeast Logistics LLC © 2022</span>
    </footer>
    <script src = "js/main.js"></script>
</body>
</html>
