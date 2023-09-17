<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>  
    <header>
    <div class="navbar">
    <h4><img src="CIT logo.png" alt="logo" style="width: 40px">
        COIMBATORE INSTITUTE OF TECHNOLOGY</h4>    
            <nav class="nav">
                <a href="#section1">Home</a>
                <a href="#section2">About</a>
                <a href="#section3">Events</a>
                <a href="#section4">Contact</a>
                <a href="#section5">Gallery</a>
                <a href="reset-password.php" class="btn btn-warning">Reset Password</a>
                <a href="logout.php" class="btn btn-danger ml-3">Sign Out</a>
            </nav>
        <div class="menu-icon" onclick="toggleNav()">&#9776;</div>
    </div>
         <?php
        // Initialize the session
            session_start();
        // Check if the user is logged in, if not then redirect him to login page
            if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
                header("location: login.php");
                exit;
            }
        ?>
        <h6>Hi, <b><?php echo htmlspecialchars($_SESSION["name"]); ?></b>. Welcome to our site.</h6>
    <p>
        
    </p>
    </header>
    
    <section id="section1">
        <div class="heading"><br>
            <h1>COIMBATORE INSTITUTE OF TECHNOLOGY</h1>
            <h4>DEPARTMENT OF COMPUTER APPLICATIONS </h4>
            <h6> PROUDLY PRESENTs </h6>
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

        <section id="section4"><br><br>
        <h2 style="text-align: center;">Contact</h2>
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

    <script >
        (function () {
  const second = 1000,
    minute = second * 60,
    hour = minute * 60,
    day = hour * 24;

  // Set the date and time of your one-time event
  const eventDate = new Date('2023-09-30T23:59:59').getTime();

  const x = setInterval(function () {
    const now = new Date().getTime(),
      distance = eventDate - now;

    const daysElement = document.getElementById("days");
    const hoursElement = document.getElementById("hours");
    const minutesElement = document.getElementById("minutes");
    const secondsElement = document.getElementById("seconds");

    if (distance < 0) {
      document.getElementById("headline").innerText = "Event Started!";
      daysElement.innerText = "0";
      hoursElement.innerText = "0";
      minutesElement.innerText = "0";
      secondsElement.innerText = "0";
      clearInterval(x);
    } else {
      daysElement.innerText = Math.floor(distance / day);
      hoursElement.innerText = Math.floor((distance % day) / hour);
      minutesElement.innerText = Math.floor((distance % hour) / minute);
      secondsElement.innerText = Math.floor((distance % minute) / second);
    }
  }, 1000);
})();

    </script>
</body>
</html>
