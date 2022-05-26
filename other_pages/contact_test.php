<?php
 
$message_sent = false;
 //submit form
if(isset($_POST['email']) && $_POST['email']!= ''){

    if(filter_var($_POST['visitor_email'], FILTER_VALIDATE_EMAIL)){
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
        $message_sent = true;
        if(mail($to, $userSubject, $body)) {
            echo "<p>Thank you for contacting us, $visitor_name. You will get a reply within 24 hours.</p>";
        } else {
            echo '<p>We are sorry but the email did not go through.</p>';
        }
    }
    else{
        $message_sent = false;
    }


 
}


?>


<html lang="en">
<head>
    <meta charset="UTF-8">
   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = 'stylesheet' href = "../css/style.css">
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
            <img src = '../photos/fedmall_gsa_holder2.jpg'>
        </section>
        <section class = "titleAndCreds">
            <div>
                <img src = '../photos/dlogo.jpg'>
                
            </div>
            <div class = "stamps">
                <!--SDVOSB EDWOSB ETC STAMPS-->
                <img src = '../photos/fullribbons.jpg'>
            </div>
        </section>

        <!--HIDDEN SECTIONS FOR MOBILE VERSION-->

        <section class = 'mobile hidden mobileLogo'>

        <img src = '../photos/dlogo.jpg'>

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
            <a class = 'no-bottom-border' href = 'contact_test.php'><li>Contact</       li></a>

        </ul>
        </section>

        <nav>
            <ul>
                <a  class = 'home' href = '../index.html'><li>Home</li></a>
                <a href = 'about.html'><li>About</li></a>
                <a href = 'capabilities.html'><li>Capabilities</li></a>
                <a href = 'products.html'><li>Products</li></a>
                <a href = 'contact.html'><li>Contact</li></a>
            </ul>
        </nav>
        

        

        </section>

        <div class = "slogan">
            <div class = 'filler'></div>
            <h2>Contact</h2>
        </div>
    
    </header>

    <section class = 'contact-body'>


    

        <div class = 'form'>
            <h3>Contact Information</h3>
            <h4>Send us a message</h4>


            <!--action = 'contact.php' -->
            
            <form method = 'POST'>
                
                <div class = 'form-group'>
                   <label for = 'visitor_name' class = 'form-label'>Your Name</label>
                    <input type='text' id = 'name' name = 'visitor_name' placeholder="Name" required>
                </div>
                <div class = 'form-group'>
                <label for = 'visitor_email' class = 'form-label'>Your Email</label>
                    <input type='text' id = 'email' name = 'visitor_email' placeholder="Email" required>
                </div>

                <div class = 'form-group'>

                <label for = 'visitor_subject' class = 'form-label'>Subject</label>
                    <input type='text' id = 'subject' name = 'visitor_subject' placeholder="Subject" required>
                </div>

                <div class = 'form-group'>
                    
                    
                    <label for = 'visitor_message' class = 'form-label'>Message:</label>
                    <textarea id = message name='visitor_message' placeholder="Message..."></textarea>
                </div>
                <button type = 'submit'>Send Message</button>
            </form>

        </div>
    </section>
    
    
    <footer class = 'footer'>
        <span>Downeast Logistics LLC © 2022</span>
    </footer>
    <script src = "../js/main.js"></script>
</body>
</html>
