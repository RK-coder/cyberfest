<!DOCTYPE html>
<html lang="en">
     <!-- Import Particles.js and app.js files -->

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
    <link href="particlesjs-config.json" rel="json">
    
</head>

<body>

<div id="particles-js">
	<div class="heading">
    <header>
    <img src="cyberfest2.png" alt="logo" style="width:250px">
        <h4>Experience the World of Technology</h4>
        <p><a href='login.php'>Login</a></p>
    </header>
    </div>
</div>
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
    <script src="particles.js">
	</script>
	<script src="app.js">
	</script>
      
</body>
</html>
