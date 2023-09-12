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
    <header>
        <h1>COIMBATORE INSTITUTE OF TECHNOLOGY</h1>
        <div class="menu-icon" onclick="toggleNav()">&#9776;</div>
        <nav>
        <a href="#section1">Home</a>
        <a href="#section2">About Us</a>
        <a href="#section3">Events</a>
        <a href="#section4">Contact</a>
        <a href="#section5">Gallery</a>
        <a href='login.php'>Login</a>
    </nav>
    </header>

    <section id="section1">
        <h2>Home</h2>
	<div class="heading" id="particles-js">
        <h2>COIMBATORE INSTITUTE OF TECHNOLOGY</h2>
        <h3>Department of Computer Applications </h3>
        <h6> Proudly Presents </h6>
        <img src="cyberfest2.png" alt="logo" style="width:250px">
        <h4>Experience the World of Technology</h4>   
    </div>
    </section>

    <div class="container">

        <section id="section2">
        <h2>About Us</h2>
        <p>This is the content of Section 1.</p>
  
        <div class="highlight">Event Highlights:</div>
        <p>Join us for a series of technical subevents that will challenge and inspire you in the world of technology.</p>
        </section>  

        <section id="section3">
        <h2>Events</h2>
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
        </section>

        <section id="section4">
        <h2>Contact</h2>
        <div class="contact">
            <h2>Contact Us</h2>
            <p>Email: info@cyberfest.com</p>
            <p>Phone: +123-456-7890</p>
        </div>
        </section>

        <section id="section5">
        <h2>Gallery</h2>
        <div class="gallery">
            <h2>Event Gallery</h2>
            <img src="gallery/image1.jpg" alt="Event Photo">
            <img src="gallery/image2.jpg" alt="Event Photo">
            <!-- Add more images -->
        </div>
        </section>
    </div>
    <script src="particles.js">
	</script>
	<script src="app.js">
	</script>
       <script>
        function toggleNav() {
            var nav = document.querySelector('nav');
            nav.classList.toggle('active');
        }
    </script>
</body>
</html>
