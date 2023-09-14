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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<header>
    <div class="navbar">
        <img src="CIT logo.png" alt="logo" style="width: 40px">
        <h4>COIMBATORE INSTITUTE OF TECHNOLOGY</h4>    
            <nav class="nav">
                <a href="#section1">Home</a>
                <a href="#section2">About</a>
                <a href="#section3">Events</a>
                <a href="#section4">Contact</a>
                <a href="#section5">Gallery</a>
                <a href='login.php'>Login</a>
            </nav>
        <div class="menu-icon" onclick="toggleNav()">&#9776;</div>
    </div>
</header>

    <div class="container">
        <section id="section1">
        <div class="heading">
            <h2>COIMBATORE INSTITUTE OF TECHNOLOGY</h2>
            <h4>DEPARTMENT OF COMPUTER APPLICATIONS </h4>
            <h6> PROUDLY PRESENTs </h6>
            <img src="cyberfest2.png" alt="logo" style="width:250px">
            <h4>EXPERIENCE THE WORLD OF TECHNOLOGY</h4>   <br>
        </div>
        </section>

        <section id="section2"><br><br>
        <h2 style="text-align:center">ABOUT CYBERFEST 2K23</h2><br><br>
        <p>CYBERFEST IS A NATIONAL-LEVEL TECHNICAL SYMPOSIUM METICULOUSLY ORGANIZED BY THE DEPARTMENT OF COMPUTER APPLICATIONS AT COIMBATORE INSTITUTE OF TECHNOLOGY.
            THIS EVENT SERVES AS A BEACON OF INSPIRATION, GUIDING INDIVIDUALS TO SHARPEN THEIR SOCIO-TECHNICAL SKILLS.
            IT OFFERS A PLATFORM FOR UNDERGRADUATE AND POSTGRADUATE STUDENTS, SPANNING ACROSS DIVERSE EDUCATIONAL BACKGROUNDS, TO PARTICIPATE AND ENGAGE IN HEALTHY COMPETITION.
            THIS DYNAMIC, ONE-DAY SYMPOSIUM IS A RICH FUSION OF VARIOUS THOUGHT-PROVOKING EVENTS AND ACTIVITIES.
            JOIN US FOR A SERIES OF TECHNICAL SUBEVENTS THAT WILL CHALLENGE AND INSPIRE YOU IN THE WORLD OF TECHNOLOGY.</p>
        </section>  
        <br><br><br><br>

        <section id="section3">
        <h2 style="text-align:center">EVENTS</h2><br><br>
        <div class="subevents-container">
            <div class="subevent-details" id="hackathon-details">
                <h2>HACKATHON HUSTLE</h2>
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
            <a href="#" class="fa fa-instagram"></a>
        </div>
    </section>

        <section id="section5">
        <div class="gallery">
            <h2>Event Gallery</h2>
            <img src="gallery/image1.jpg" alt="Event Photo">
            <img src="gallery/image2.jpg" alt="Event Photo">
        </div>
        </section>
    </div>
   
    <script src="script.js"></script>
       <script>
        function toggleNav() {
            var nav = document.querySelector('nav');
            nav.classList.toggle('active');
        }

        const navigationHeight =document.querySelector('.nav').offsetHeight;
        document.documentElement.style.setProperty('--scroll-pading', navigationHeight -1 + "px" )
   
    </script>
</body>
</html>
