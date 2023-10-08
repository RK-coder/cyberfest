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
                <li>   <a href="register_event.php">Registered events</a></li>
                <li>   <a href="reset-password.php" class="btn btn-warning">Reset Password</a></li>
                <li>   <a href="logout.php" class="btn btn-danger ml-3">Sign Out</a></li>
                </ul>
    </div>
         <?php
        // Initialize the session
            session_start();
        // Check if the user is logged in, if not then redirect him to login page
            if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
                header("location: login.php");
                exit;
            }
            if (isset($_SESSION["id"])) {
                // Assuming you have a database connection established
                require_once 'db.php';
            
                // Fetch the user's name from the database
                $user_id = $_SESSION["id"];
                $stmt = $link->prepare("SELECT name FROM register WHERE id = ?");
                $stmt->bind_param("i", $user_id);
                $stmt->execute();
                $stmt->bind_result($user_name);
            
                if ($stmt->fetch()) {
                    // Display a welcome message with the user's name
                    echo '<h6>Hi, <b>' . htmlspecialchars($user_name) . '</b>. Welcome to our site.</h6>';
                }
            
                $stmt->close();
            }                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       
               
        ?>
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
        <form method="post">

        <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    // Split the value into event name and category
    list($eventToRegister, $categoryOfEventToRegister) = explode('|', $_POST['register']);

    // Check if the user is already registered for the same event or category
    $id = $_SESSION['id'];

    $stmt = $link->prepare("SELECT id, event_name, category FROM registrations WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($userId, $registeredEvent, $registeredCategory);

    $alreadyRegisteredForEvent = false; // Initialize a flag
    $alreadyRegisteredInSameCategory = false; // Initialize a flag

    while ($stmt->fetch()) {
        if ($registeredEvent == $eventToRegister) {
            $alreadyRegisteredForEvent = true;
            break;
        }

        if ($registeredCategory == $categoryOfEventToRegister) {
            $alreadyRegisteredInSameCategory = true;
        }
    }

    $stmt->close();

    if ($alreadyRegisteredForEvent) {
        echo ('<script>alert("You are already registered for this event.");</script>');
    } elseif ($alreadyRegisteredInSameCategory) {
        echo ('<script>alert("You are already registered for a event in this category.");</script>');
    } else {
        // Register the user for the event
        $stmt = $link->prepare("INSERT INTO registrations (event_name, category, id) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $eventToRegister, $categoryOfEventToRegister, $id);

        if ($stmt->execute()) {
            echo ('<script>alert("Successfully registered for the event!");</script>');
        } else {
            echo ('<script>alert("Registration failed. Please try again.");</script>');
        }

        $stmt->close();
    }
}

$link->close();
?>


        <h2 style="text-align:center">EVENTS</h2><br><br>
                <div class="subevents-container">
                    <!-- Category 1: Coding Challenges -->
                    <div class="subevent-category">
                        <h3>Category 1</h3>
                        <div class="subevent-details" id="hackathon-details" data-event-id="1" onclick="openPopup('event1')">
                            <h2>HACKATHON HUSTLE</h2>
                            <div class="logoimg">
                                <img src="loading.jpg" alt="logo">
                            </div>
                            <p>Put your coding skills to the test and develop innovative solutions in a time-bound challenge.</p>
                        </div><br><br>
                        <div class="subevent-details" id="cipher-details" data-event-id="2" onclick="openPopup('event2')">
                            <h2>Code craft challenge</h2>
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
                            <h2>CyberSecurity Cipher</h2>
                            <div class="logoimg">
                                <img src="loading.jpg" alt="logo">
                            </div>
                            <p>Explore the world of cybersecurity and decode challenging puzzles to protect digital assets.</p>
                        </div>
                    </div>

                    <!-- Category 3: TechTalk Symposium -->
                    <div class="subevent-category">
                        <h3>Category 3</h3>
                        <div class="subevent-details" data-event-id="4" onclick="openPopup('event4')">
                            <h2>TechTalk Symposium</h2>
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
                <h2>Hackathon Hustle</h2>
                <p>Detailed description of event 1.</p>
                <!-- Add a hidden input field for the category 
                <input type="hidden" name="category_Hackathonhustle" value="Coding Challenges">-->
                <button type="submit" name="register" value="Hackathon Hustle|Cat1" class="btn btn-primary">Register for Hackathon hustle</button>
            </div>
        </div>

        <div class="popup-overlay" id="event2-popup">
            <div class="popup-content">
                <span class="close-button" onclick="closePopup('event2')">&#10006;</span>
                <h2>CodeCraft Challenge</h2>
                <p>Showcase your programming prowess by solving intricate coding puzzles and problems.</p>
                <!-- Add a hidden input field for the category 
                <input type="hidden" name="category_CodeCraftchallenge" value="Coding Challenges">-->
                <button type="submit" name="register" value="CodeCraftChallenge|Cat1" class="btn btn-primary">Register for CodeCraftChallenge</button>
            </div>
        </div>

        <div class="popup-overlay" id="event3-popup">
            <div class="popup-content">
                <span class="close-button" onclick="closePopup('event3')">&#10006;</span>
                <h2>CyberSecurity Cipher</h2>
                <p>Explore the world of cybersecurity and decode challenging puzzles to protect digital assets.</p>
                <!-- Add a hidden input field for the category 
                <input type="hidden" name="category_CyberSecurityCipher" value="Cybersecurity">-->
                <button type="submit" name="register" value="CyberSecurity Cipher|Cat2" class="btn btn-primary">Register for CyberSecurity Cipher</button>
            </div>
        </div>

        <div class="popup-overlay" id="event4-popup">
            <div class="popup-content">
                <span class="close-button" onclick="closePopup('event4')">&#10006;</span>
                <h2>TechTalk Symposium</h2>
                <p>Engage with industry experts through enlightening talks and discussions on the latest tech trends.</p>
                <!-- Add a hidden input field for the category
                <input type="hidden" name="category_TechTalkSymposium" value="TechTalk Symposium">-->
                <button type="submit" name="register" value="TechTalk Symposium|Cat3" class="btn btn-primary">Register for TechTalk Symposium</button>
            </div>
        </div>
        </form>
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
        function toggleNav() {
            var nav = document.querySelector('nav');
            nav.classList.toggle('active');
        }

        const navigationHeight =document.querySelector('.nav').offsetHeight;
        document.documentElement.style.setProperty('--scroll-pading', navigationHeight -1 + "px" )
       
$(document).ready(function() {
    $('#registrationForm').submit(function(event) {
        event.preventDefault(); // Prevent the form from performing a full-page refresh
        
        // Serialize the form data
        var formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: 'welcome.php', // Update with the correct URL
            data: formData,
            success: function(response) {
                // Display the alert based on the response from PHP
                alert(response);
            }
        });
    });
});
</script>

</body>
</html>