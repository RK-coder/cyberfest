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
    <div class="top-nav">
        <div>
        <h4><img src="CIT logo.png" alt="logo" style="width: 40px">
        COIMBATORE INSTITUTE OF TECHNOLOGY</h4>  
        </div>  
            <input id="menu-toggle" type="checkbox" />
            <label class='menu-button-container' for="menu-toggle">
            <div class="menu-button"></div>
            </label>
                <ul class="menu">
                <li>   <a href="#section1">Home</a></li>
                <li>   <a href="#section2">About</a></li>
                <li>   <a href="#section3">Events</a></li>
                <li>   <a href="#section4">Contact</a></li>
                <li>   <a href="#section5">Gallery</a></li>
                <li>   <a href='login.php' class="btn btn-primary">Login</a></li>
                <li>   <a href='register.php' class="btn btn-warning">Sign Up</a></li>
                </ul>
    </div>
</header>
    
        <section id="section1">
        <div class="heading"><br>
            <h1>COIMBATORE INSTITUTE OF TECHNOLOGY</h1>
            <h4>DEPARTMENT OF COMPUTER APPLICATIONS </h4>
            <h6> CONDUCTs </h6>
            <img src="cyberfest2.png" alt="logo" style="width:250px">
            <h4>EXPERIENCE THE WORLD OF TECHNOLOGY</h4> <br>
        
        <div class="timer">
            <h1 id="headline">Countdown to the Event</h1>
            <div id="countdown">
                <ul>
                <li><span id="days"></span>days</li>
                <li><span id="hours"></span>Hours</li>
                <li><span id="minutes"></span>Minutes</li>
                <li><span id="seconds"></span>Seconds</li>
                </ul>
            </div>
        </div>
        </div>
        </section>
    <div class="container">
        <section id="section2">
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

            <div class="subevent-details" id="hackathon-details" onclick="openPopup('event1')">
             <h2>HACKATHON HUSTLE</h2>
            <p>Put your coding skills to the test and develop innovative solutions in a time-bound challenge.
            </p>
            </div>
            <div class="subevent-details" id="cipher-details" onclick="openPopup('event2')">
                <h2>CodeCraft Challenge</h2>
                <p>Showcase your programming prowess by solving intricate coding puzzles and problems.</p>
            </div>
            <div class="subevent-details" onclick="openPopup('event3')">
                <h2>CyberSecurity Cipher</h2>
                <p>Explore the world of cybersecurity and decode challenging puzzles to protect digital assets.</p>
            </div>
            <div class="subevent-details" onclick="openPopup('event4')">
                <h2>TechTalk Symposium</h2>
                <p>Engage with industry experts through enlightening talks and discussions on the latest tech trends.</p>
            </div>
        </div> 
        <div class="popup-overlay" id="event1-popup">
        <div class="popup-content">
            <span class="close-button" onclick="closePopup('event1')">&#10006;</span>
            <h2>Hackathon Hustle</h2>
            <p>Detailed description of event 1.</p>
        </div>
        </div>
        <div class="popup-overlay" id="event2-popup">
        <div class="popup-content">
            <span class="close-button" onclick="closePopup('event2')">&#10006;</span>
            <h2>CodeCraft Challenge</h2>
                <p>Showcase your programming prowess by solving intricate coding puzzles and problems.</p>
        </div>
        </div>
        <div class="popup-overlay" id="event3-popup">
        <div class="popup-content">
            <span class="close-button" onclick="closePopup('event3')">&#10006;</span>
            <h2>CyberSecurity Cipher</h2>
                <p>Explore the world of cybersecurity and decode challenging puzzles to protect digital assets.</p>
        </div>
        </div>
        <div class="popup-overlay" id="event4-popup">
        <div class="popup-content">
            <span class="close-button" onclick="closePopup('event4')">&#10006;</span>
            <h2>TechTalk Symposium</h2>
                <p>Engage with industry experts through enlightening talks and discussions on the latest tech trends.</p>
        </div>
        </div>
        </section>

        <section id="section4"><br><br>
        <div class="contact">
        <h2 style="text-align: center;">Contact</h2>
            <a href="https://instagram.com/cyberfest2k23?igshid=MzRlODBiNWFlZA==" class="fa fa-instagram"></a>
            <a href="mailto:cyberfest2023@gmail.com"class="fa fa-envelope"></a>
            <a href="tel:+91-7598596904"class="fa fa-phone"></a>
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
        const navigationHeight =document.querySelector('.nav').offsetHeight;
        document.documentElement.style.setProperty('--scroll-pading', navigationHeight -1 + "px" )
    </script>

</body>
</html>
