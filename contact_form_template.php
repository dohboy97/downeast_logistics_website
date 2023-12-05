<?php
 
//PHP MAILER

use PHPMailer\PHPMailer\PHPMailer;

require 'vendor/autoload.php';

$honeypot = trim($_POST['email']);

if(!empty($honeypot)) {
    echo 'BAD ROBOT';
    exit;
}

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
    //Phone number
    if (array_key_exists('phone', $_POST)) {
        //Limit length and strip HTML tags
        $phone = substr(strip_tags($_POST['phone']), 0, 10);
    } else {
        $phone = '';
    }
    //Validate to address
    //Never allow arbitrary input for the 'to' address as it will turn your form into a spam gateway!
    //Substitute appropriate addresses from your own domain, or simply use a single, fixed address
    if (array_key_exists('to', $_POST) && in_array($_POST['to'], ['sales', 'support', 'accounts'], true)) {
        $to = '';
    } else {
        $to = '';
    }
    //Make sure the addinfo@downeastlog.com before trying to use it
    if (array_key_exists('forreal', $_POST) && PHPMailer::validateAddress($_POST['forreal'])) {
        $email = $_POST['forreal'];
    } else {
        $msg .= 'Error: invalid email address provided';
        $err = true;
    }
    if (!$err) {

        $mail = new PHPMailer();

        

        $mail->isSMTP();
        $mail->Host = '';
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = '';                 // SMTP username
        $mail->Password = '';
        $mail->Port = 25;
        $mail->CharSet = PHPMailer::CHARSET_UTF8;
        //It's important not to use the submitter's address as the from address as it's forgery,
        //which will cause your messages to fail SPF checks.
        //Use an address in your own domain as the from address, put the submitter's address in a reply-to
        $mail->setFrom('', (empty($name) ? 'Contact form' : $name));
        $mail->addAddress('');
        $mail->addReplyTo($email, $name);
        $mail->Subject = 'Contact form: ' . $subject;
        $mail->Body = "Contact form submission\n\n" . $query . "\n\n" . $name . "\n\n" . $email . "\n\n" . $phone;
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
                <label for="email"><input type="email" name="email" id="email" maxlength="255" style = 'display:none'></label>
                   <label for = 'name' class = 'form-label'></label>
                    <input type='text' id = 'name' name = 'name' placeholder="Your Name" maxlength='255' required>
                </div>
                <div class = 'form-group'>
                <label for = 'forreal' class = 'form-label'></label>
                    <input type='email' id = 'forreal' name = 'forreal' placeholder="Your Email" maxlength = '255' required>
                </div>

                <div class = 'form-group'>
                <label for = 'phone' class = 'form-label'></label>
                    <input type='tel' id = 'phone' name = 'phone' placeholder="Your Phone: (123)-456-7899" maxlength = '10' required>
                </div>

                <div class = 'form-group'>

                <label for = 'subject' class = 'form-label'></label>
                    <input type='text' id = 'subject' name = 'subject' placeholder="Subject" maxlength = '255' required>
                </div>

                <div class = 'form-group'>
                    
                    
                    <label for = 'query' class = 'form-label'></label>
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
        <span>Downeast Logistics LLC © 2024</span>
    </footer>
    <script src = "js/main.js"></script>
</body>
</html>
