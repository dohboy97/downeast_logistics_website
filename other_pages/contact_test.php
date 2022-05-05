<?php
    ini_set('display_errors', true);
    error_reporting(-1);
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

            <form action = 'contact.php' method = 'post'>
                
                <div class = 'form-group'>
                   <label for = 'visitor_name' class = 'form-label'>Your Name</label>
                    <input type='text' id = 'name' name = 'visitor_name' placeholder="Name" required>
                </div>
                <div class = 'form-group'>
                <label for = 'visitor_email' class = 'form-label'>Your Email</label>
                    <input type='text' id = 'email' name = 'visitor_email' placeholder="Email" required>
                </div>
                <div class = 'form-group'>
                    
                    <!-- <input type='text' id = 'message' name = 'visitor-message' placeholder="Your message..." required> -->
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
    
</body>
</html>