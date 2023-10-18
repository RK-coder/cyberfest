<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CyberFest</title>
    <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com"> -->
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->
    <link href="style.css" rel="stylesheet">
    <!-- <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&display=swap" rel="stylesheet"> -->
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com"> -->
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@1,700&display=swap" rel="stylesheet"> -->
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com"> -->
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@1,700&display=swap" rel="stylesheet"> -->
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com"> -->
<!-- <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->
<!-- <link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@1,400;1,700&family=Pixelify+Sans&display=swap" rel="stylesheet"> -->
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
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
            <h1>COIMBATORE INSTITUTE OF TECHNOLOGY</h1>  <br>
            <h4>DEPARTMENT OF COMPUTER APPLICATIONS </h4><br>
            <h6> PROUDLY PRESENTs </h6>  <br>
            <img src="logow.png" alt="logo">
            <h4><br>TECHODYSSEY : A JOURNEY THROUGH THE WORLD OF TECHNOLOGY</h4> <br>
        
            <div class="timer">
                <h2 id="headline">Countdown to the Event</h2>
                <div id="countdown">
                    <ul>
                    <li><span id="days"></span>days</li>
                    <li><span id="hours"></span>Hours</li>
                    <li><span id="minutes"></span>Minutes</li>
                    <li><span id="seconds"></span>Seconds</li>
                    </ul>
                </div><br><br>
            </div>
        </div>
    </section>
    <div class="container">
        <section id="section2">
        <h2 style="text-align:center">ABOUT CYBERFEST 2K23</h2><br><br>
        <p><i>CYBERFEST IS A NATIONAL-LEVEL TECHNICAL SYMPOSIUM METICULOUSLY ORGANIZED BY THE DEPARTMENT OF COMPUTER APPLICATIONS AT COIMBATORE INSTITUTE OF TECHNOLOGY.
            THIS EVENT SERVES AS A BEACON OF INSPIRATION, GUIDING INDIVIDUALS TO SHARPEN THEIR SOCIO-TECHNICAL SKILLS.
            IT OFFERS A PLATFORM FOR UNDERGRADUATE AND POSTGRADUATE STUDENTS, SPANNING ACROSS DIVERSE EDUCATIONAL BACKGROUNDS, TO PARTICIPATE AND ENGAGE IN HEALTHY COMPETITION.
            THIS DYNAMIC, ONE-DAY SYMPOSIUM IS A RICH FUSION OF VARIOUS THOUGHT-PROVOKING EVENTS AND ACTIVITIES.
            JOIN US FOR A SERIES OF TECHNICAL SUBEVENTS THAT WILL CHALLENGE AND INSPIRE YOU IN THE WORLD OF TECHNOLOGY.</i></p>
        </section>  
        <br><br><br><br>

        <section id="section3">
        <h2 style="text-align:center">EVENTS</h2><br><br>
        <div class="subevents-container">
  <!-- Category 1: Coding Challenges -->
  <div class="subevent-category">
    <h3>Category 1</h3>
        <div class="subevent-details" id="hackathon-details" data-event-id="1" onclick="openPopup('event1')">
            <h2>LOGIC LORE</h2>
            <div class="logoimg">
                <img src="loading.jpg" alt="logo">
            </div>
            <p>Put your coding skills to the test and develop innovative solutions in a time-bound challenge.</p>
        </div>
        
        <br><br>

        <div class="subevent-details" id="cipher-details" data-event-id="2" onclick="openPopup('event2')">
            <h2>FUN FORUM</h2>
            <div class="logoimg">
                <img src="loading.jpg" alt="logo">
            </div>
            <p>Showcase your programming prowess by solving intricate coding puzzles and problems.</p>
        </div>
    </div>

    <!-- Category 2: Cybersecurity -->
    <div class="subevent-category">
        <h3>Category 2</h3>

        <div class="subevent-details" data-event-id="3" onclick="openPopup('event3')">
            <h2>QUANTUM QUEST</h2>
            <div class="logoimg">
                <img src="loading.jpg" alt="logo">
            </div>
            <p>Explore the world of cybersecurity and decode challenging puzzles to protect digital assets.</p>
        </div>
        
        <br><br>

        <div class="subevent-details" id="cipher-details" data-event-id="4" onclick="openPopup('event4')">
            <h2>Maze Runners</h2>
            <div class="logoimg">
                <img src="loading.jpg" alt="logo">
            </div>
            <p>Showcase your programming prowess by solving intricate coding puzzles and problems.</p>
        </div>
    </div>

    <!-- Category 3: SHUTTER SPECTRUM -->
    <div class="subevent-category">
        <h3>Category 3</h3>

        <div class="subevent-details" data-event-id="5" onclick="openPopup('event5')">
            <h2>SHUTTER SPECTRUM</h2>
            <div class="logoimg">
                <img src="loading.jpg" alt="logo">
            </div>
            <p>Engage with industry experts through enlightening talks and discussions on the latest tech trends.</p>
        </div>
        
        <br><br>

        <div class="subevent-details" id="cipher-details" data-event-id="6" onclick="openPopup('event6')">
            <h2>Idea Launch</h2>
            <div class="logoimg">
                <img src="loading.jpg" alt="logo">
            </div>
            <p>Showcase your programming prowess by solving intricate coding puzzles and problems.</p>
        </div>
    </div>

        <!-- Category 4: STICKEEZ MATE -->
        <div class="subevent-category">
        <h3>Category 4</h3>

        <div class="subevent-details" data-event-id="7" onclick="openPopup('event7')">
            <h2>STICKEEZ MATE</h2>
            <div class="logoimg">
                <img src="loading.jpg" alt="logo">
            </div>
            <p>Engage with industry experts through enlightening talks and discussions on the latest tech trends.</p>
        </div>
        </div>

    </div>
    <div class="popup-overlay" id="event1-popup">
            <div class="popup-content">
                <span class="close-button" onclick="closePopup('event1')">&#10006;</span>
                <h2>LOGIC LORE</h2>
                <p>
                    <b>SLOGAN: </b>   
                    <p> The canvas of code awaits your artistry</p>
                    <b> DESCRIPTION: </b>
                    <p>	The Logic Lore is a coding competition designed to celebrate the art of programming and debugging. Whether you are seasoned coder or just starting your coding journey, this contest is for you. It's an opportunity to showcase your coding prowess and win fantastic prizes!</p>
                    <b> TEAM SIZE: 2</b><br>
                    <b> NO OF ROUNDS: 2<br><br>
                    <b> ROUND 1: </b>
                    <p> During the initial stage, there is a technical puzzle that assesses student's understanding of data structures and core computer science principles. Those who achieve top positions will progress to the subsequent round. </p>
                    <b> ROUND 2: </b>
                    <p> In the second round of the competition, participants will encounter a coding phase that comprises two distinct tasks. The first task places a primary emphasis on problem solving skills. Following the problem solving segment, the subsequent task shifts the focus to debugging.</p>
                    <b> GENERAL RULES: </b>
                    <p> In case of a tie, the team that solves the problem first wins 
                        Any malpractice won't be tolerated and the team will be disqualified.
                        The decision made by the panel cannot be overruled.
                    </p>
                <button class="btn btn-primary">LOGIN TO REGISTER FOR LOGIC LORE</button>
            </div>
        </div>

        <div class="popup-overlay" id="event2-popup">
            <div class="popup-content">
                <span class="close-button" onclick="closePopup('event2')">&#10006;</span>
                <h2>FUN FORUM</h2>
                <p>
                <b> SLOGAN: </b> <p> Bytes of Fun, Bits of Tech: Join the College Fusion Fest!</p>
                <b> DESCRIPTION: </b>
                <p> Join us for a lively computer department event filled with fun games that will challenge your skills and spark your competitive spirit! It's a fantastic opportunity to unwind, bond with fellow computer enthusiasts, and celebrate the joy of gaming. </p>
                <b> NO OF ROUNDS:  3</b><br><br>
                <b> ROUND 1: </b>
                <p>  Get ready to dive into the digital battlefield! In this exciting round of our computer department's fun games event, participants will compete in thrilling gaming challenges and showcasing their gaming prowess. It's a test of wit and reflexes that will leave you on the edge of your seat. Are you up for the challenge?</p>
                <b> ROUND 2: </b>
                <p> In this electrifying battle of our fun-filled computer department games event is here! Get ready for another round of exhilarating challenges, friendly competition, and non-stop excitement. Whether you're a gaming pro or just looking to have a great time, this event is for you. Join us and level up your gaming experience! </p>
                <b> ROUND 3: </b>
                <p> Welcome to the exhilarating grand finale of our computer department's fun game event!. The final round promises intense competition, technical challenges, and the chance to prove yourself as the ultimate gamer. Join us for an epic battle of wits and skills, where only the best will emerge victorious and claim the title of champion!  </p>                <button class="btn btn-primary">LOGIN TO REGISTER FOR FUN FORUM</button>
            </div>
        </div>

        <div class="popup-overlay" id="event3-popup">
            <div class="popup-content">
                <span class="close-button" onclick="closePopup('event3')">&#10006;</span>
                <h2>QUANTUM QUEST</h2>
                <p>Detailed description of event 3.</p>
                <button class="btn btn-primary">LOGIN TO REGISTER FOR QUANTUM QUEST</button>
            </div>
        </div>

        <div class="popup-overlay" id="event4-popup">
            <div class="popup-content">
                <span class="close-button" onclick="closePopup('event4')">&#10006;</span>
                <h2>MAZE RUNNERS</h2>
                <p>Detailed description of event 4.</p>
                <button class="btn btn-primary">LOGIN TO REGISTER FOR MAZE RUNNERS</button>
            </div>
        </div>

        <div class="popup-overlay" id="event5-popup">
            <div class="popup-content">
                <span class="close-button" onclick="closePopup('event5')">&#10006;</span>
                <h2>SHUTTER SPECTRUM</h2>
                <b>Description:   </b>
                   <p> The objective of this event is to conduct a paper presentation . Each team can choose the topic from the given set of problem statements . Prototype has to be submitted in prior , the shortlisted team will present their ideas in front of juries.</p>
                    <b> Team size  : 3 or 4 members </b><br><br>
                    <b> Event Rules : </b>
                    <p> 1. Each team would comprise of 3 or 4 members including the team leader.<br>
                    2. As the software edition of the hackathon is digital product development competition, majority of the team members must be well versed with programming skills.<br>
                    3. Team members should work up to prototype design to the given problem statement.<br>
                    4. All team members should be from same college; no inter-college teams are allowed. However, members from different branches of the same college/ institute are encouraged to form a team.<br>
                    5. The teams have entire freedom to use any programming language or web-designing or any framework for the development of their project.<br>
                    6. In case of similar project between two or more teams - the earliest submission will be considered.<br>
                    7. Submission with more than 20% plagiarism will be rejected.<br>
                    8. The assumption made, strategies and problem modelling must be included in the solution.<br>
                    9. The team have first submitted the idea for the problem/abstract before one week prior to the final documentation. Then, submit the documentation before the last date for document submission.<br>
                    10. The selected team will come to college on the event date to present their document</p>
                    <b> General Rules:   </b><p>
                    •	Any malpractice will not be tolerated and team will be disqualified.  <br>
                    •	The decision made by the panel cannot be overruled.  <br>
                    </p>                <button class="btn btn-primary">LOGIN TO REGISTER FOR SHUTTER SPECTRUM</button>
            </div>
        </div>

        <div class="popup-overlay" id="event6-popup">
            <div class="popup-content">
                <span class="close-button" onclick="closePopup('event6')">&#10006;</span>
                <h2>IDEA LAUNCH</h2>
                <p>Detailed description of event 6.</p>
                <button class="btn btn-primary">LOGIN TO REGISTER FOR IDEA LAUNCH</button>
            </div>
        </div>

        <div class="popup-overlay" id="event7-popup">
            <div class="popup-content">
                <span class="close-button" onclick="closePopup('event7')">&#10006;</span>
                <h2>STICKEEZ MATE</h2>
                <b>Description: </b>
                  <p>  Get ready for Stickeez a chess showdown like no other! The Elimination Round kicks off the action, 
                    where players go head-to-head, making every move count in a bid to secure a spot in the finals. It's all 
                    about survival of the smartest.
                    But that's not all-brace yourself for the Arena Clash in Round 2! This is where things get wild. No 
                    rules, just one chance to prove your chess prowess. Face opponents of all levels, adapt on the fly, and 
                    give it your all to secure that coveted spot in the finals.
                    Join us in this chess adventure to push your strategic limits and unlock new dimensions in the game. 
                    Chess is a world of endless possibilities, and this event is your chance to explore them all. Don't miss 
                    out-try your possibility and aim for chess glory!
                </p>
                    <b>No of Rounds: 2 </b> <br> <b>Team size: Individual Play</b><br>
                    <b> Round 1:  </b><br>
                    <p> • Battle against fellow chess enthusiasts in a thrilling elimination round.
                    • Only the strongest minds will advance to the next stage.
                    • Show your mettle and secure your spot in the finals!
                    • Elimination Based On Score
                    Challenger's Delight: Fun Retry Challenge : (Those who wants to give wildcard entry)
                    This Challenge consist of a Funny chess quiz and optional chess puzzle race between 
                    participants</p><br>
                    <b> Round 2:  </b>
                    <p> • The ultimate test of strategy and nerves!
                    • Compete against the best of the best in a high-stakes arena round.
                    • Score more wins, and claim the title of Chess Champion!</p><br>
                    <b> General Rules:  </b>
                    <p> • Participants are expected to uphold the spirit of fair play and sportsmanship.
                    • Any form of cheating, including external assistance or computer engine usage, will 
                    result in immediate disqualification.
                    • Participants are required to maintain respectful and professional behavior throughout 
                    the event.
                    • The event will be conducted on an online Li-chess platform.(Everyone should have 
                    account on Li-Chess , Instruction’s are shared later)
                    • Participants must have a stable internet connection and a compatible device.</p>
                    <b> How are scores calculated? </b>
                    <p> • A win has a base score of 2 points, a draw 1 point, and a loss is worth no points. If 
                    you win two games consecutively you will start a double point streak, represented by 
                    a flame icon. The following games will continue to be worth double points until you 
                    fail to win a game. That is, a win will be worth 4 points, a draw 2 points, and a loss 
                    will still not award any points. For example, two wins followed by a draw will be 
                    worth 6 points: 2 + 2 + (2 x 1)</p>
                    <b> How does the pairing work? </b>
                    <p> • At the beginning of the tournament, players are paired based on their rating. As soon 
                    as you finish a game, return to the tournament lobby: you will then be paired with a 
                    player close to your ranking. This ensures minimum wait time, however you may not 
                    face all other players in the tournament. Play fast and return to the lobby to play more 
                    games and win more points.</p>
                <button class="btn btn-primary">LOGIN TO REGISTER FOR STICKEEZ MATE</button>
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
