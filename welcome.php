<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CyberFest</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>  
    <header>
        <h1>CyberFest</h1>
        <p>Experience the World of Technology</p>
         <?php
        // Initialize the session
            session_start();
        // Check if the user is logged in, if not then redirect him to login page
            if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
                header("location: login.php");
                exit;
            }
        ?>
        <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["name"]); ?></b>. Welcome to our site.</h1>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
    </p>
    </header>
    <div class="container">
        <div class="highlight">Event Highlights:</div>
        <p>Join us for a series of technical subevents that will challenge and inspire you in the world of technology.</p>
        <div class="subevents-container">
            <div class="subevent-details" id="hackathon-details">
                <h2>Hackathon Hustle</h2>
                <p>
                    Put your coding skills to the test and develop innovative solutions in a time-bound challenge.
                </p>
                <a href="register.html">Register Now</a>
                <a href="hackathon.html">Learn More</a>
            </div>
            <div class="subevent-details" id="cipher-details">
                <h2>CodeCraft Challenge</h2>
                <p>Showcase your programming prowess by solving intricate coding puzzles and problems.</p>
                <a href="register.html">Register Now</a>
                <a href="codecraft.html">Learn More</a>
            </div>
            <div class="subevent-details">
                <h2>CyberSecurity Cipher</h2>
                <p>Explore the world of cybersecurity and decode challenging puzzles to protect digital assets.</p>
                <a href="register.html">Register Now</a>
                <a href="cybersecurity.html">Learn More</a>
            </div>
            <div class="subevent-details">
                <h2>TechTalk Symposium</h2>
                <p>Engage with industry experts through enlightening talks and discussions on the latest tech trends.</p>
                <a href="register.html">Register Now</a>
                <a href="techtalk.html">Learn More</a>
            </div>
        </div> 
        <div class="contact">
            <h2>Contact Us</h2>
            <p>Email: info@cyberfest.com</p>
            <p>Phone: +123-456-7890</p>
        </div>
        <div class="gallery">
            <h2>Event Gallery</h2>
            <img src="gallery/image1.jpg" alt="Event Photo">
            <img src="gallery/image2.jpg" alt="Event Photo">
            <!-- Add more images -->
        </div>
    </div>
</body>
</html>
