<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image" href="tlogo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CYBERFEST'23</title>
    <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<!-- <body onload="document.body.style.opacity='1'"> -->
<body>
<div class="fade-in animation">
    <header>
        <div class="top-nav">
            <div>
            <h4><img src="CIT logo.png" alt="logo" style="width: 30px">
            COIMBATORE INSTITUTE OF TECHNOLOGY
            <img src="cman.png" alt="logo" style="width: 25px"></h4>  
            </div>  
                <input id="menu-toggle" type="checkbox" />
                <label class='menu-button-container' for="menu-toggle">
                <div class="menu-button"></div>
                </label>
                    <ul class="menu">
                    <li>   <a href="#section1">Home</a></li>
                    <li>   <a href="#section2">About</a></li>
                    <li>   <a href="#section3">Events</a></li>
                    <!-- <li>   <a href="#section4">Sponsors</a></li> -->
                    <li>   <a href="#section5">Contact</a></li>
                    <li>   <a href="reset-password.php" >Reset Password</a></li>
                    <li>  &nbsp;&nbsp;&nbsp; <a href="profile.php" class="btn btn-success">Profile</a></li>
                    <li>   <a href="logout.php" class="btn btn-danger ml-3">Sign Out</a></li>
                    </ul>
        </div>
        <div class="welcome" style="text-align: right;">
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
                    echo '<h6>Hey, <b>' . htmlspecialchars($user_name) . '</b> ! Welcome.&nbsp;&nbsp;</h6>';
                }
            
                $stmt->close();
            }                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
        ?>
        </div>
    </header>
    
    <section id="section1" >
        <div class="heading"><br><br>
            <h1>COIMBATORE INSTITUTE OF TECHNOLOGY</h1><br>
            <h4>DEPARTMENT OF COMPUTER APPLICATIONS </h4>
            <h6> PROUDLY PRESENTs </h6><br>
            <img src="logo.png" alt="logo">
            <h4>A JOURNEY THROUGH THE WORLD OF TECHNOLOGY</h4> <br>
            <h3 style="color:yellow;"> NOV'17 2023 </h3><br>
            <div class="timer">
                <h1 id="headline">COUNTDOWN TO THE EVENT</h1>
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
        <section id="section2" class="scroll-section"><br><br>
        <h2 style="text-align:center">ABOUT CYBERFEST 2K23</h2><br>
        <p>CYBERFEST IS A NATIONAL-LEVEL TECHNICAL SYMPOSIUM METICULOUSLY ORGANIZED BY THE DEPARTMENT OF COMPUTER APPLICATIONS AT COIMBATORE INSTITUTE OF TECHNOLOGY.
            THIS EVENT SERVES AS A BEACON OF INSPIRATION, GUIDING INDIVIDUALS TO SHARPEN THEIR SOCIO-TECHNICAL SKILLS.
            IT OFFERS A PLATFORM FOR UNDERGRADUATE AND POSTGRADUATE STUDENTS, SPANNING ACROSS DIVERSE EDUCATIONAL BACKGROUNDS, TO PARTICIPATE AND ENGAGE IN HEALTHY COMPETITION.
            THIS DYNAMIC, ONE-DAY SYMPOSIUM IS A RICH FUSION OF VARIOUS THOUGHT-PROVOKING EVENTS AND ACTIVITIES.
            JOIN US FOR A SERIES OF TECHNICAL SUBEVENTS THAT WILL CHALLENGE AND INSPIRE YOU IN THE WORLD OF TECHNOLOGY.</p>
        </section>  <br><br>

        <div class="instruction">
        <hr style="height:2px;border-width:0;color:white;background-color:white">   
        <h2> INSTRUCTIONS FOR REGISTRATION</h2><br>
    
        <h5> GENERAL INSTRUCTIONS </h5>
        <ul>
            <li> Only 25 Students per college are admitted.</li>
            <li>All UnderGraduate and PostGraduate College students except Undergraduate 1st years are eligibile to participate.</li>
            <li>  The registration fee for our symposium is priced at 200 rupees</li>
            <li> Once the registration is made , participants can attend upto 5 different events.</li>
        </ul> 

        <h5> REGISTRATION</h5>
        <ul>
            <li> Clicking "Register" button under the event description will directly register you to the event.</li>
            <li> Once registered for the event you cannot unregister yourself from the event. </li>
        </ul>

        <h5> CATEGORIZATION </h5>
        <ul>
            <li>In offline events there are 3 categories, In the first two categories there are two events. You can only register any one in the first two categories.</li>
            <li><b>For ex:</b> You can either register for Quantum Quest or Fun Forum in the category 1 and you can either register for logic lore or maze runners in category 2.</li>
            <li> For the FUN FORUM event only 120 members are allowed and the registration for the  event will be closed once the registrations are full. </li>
        </ul> 
    
        <h5> PROFILE </h5>
        <ul>
            <li> You can check on your registered events in your profile. </li>
            <li> You can also check your registered mobile number and email id. </li>
        </ul>
            <p><b>For any queries related to registration participants can contact the below listed event organizers.</b></p>
           <ul> <li> <b>Sankar Guru - 9626930715</li>
            <li> Keerthana - 6374682651</li>
            <li> Pepitha sri - 8680078973</b></li></ul>
        </div>
        <div class="perk">
        <h2> PARTICIPANT PERKS </h2>
        <P>As a token of appreciation for your participation in the symposium, we will be providing you with lunch, refreshments,  participation certificates, and complimentary gifts.We hope you enjoy the symposium and the benefits that come with being a participant. Thank you again for your attendance !</P>
        </div>
        <hr style="height:2px;border-width:0;color:white;background-color:white">
        <br><br>

<section id="section3" class="section">
        <form method="post">

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    // Split the value into event name and category
    list($eventToRegister, $categoryOfEventToRegister) = explode('|', $_POST['register']);

    // Check if the user is already registered for the same event or category
    $id = $_SESSION['id'];

    // Fetch the user's name from the register table
    $stmt = $link->prepare("SELECT name FROM register WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($userName);
    $stmt->fetch();
    $stmt->close();

    $alreadyRegisteredForEvent = false; // Initialize a flag
    $alreadyRegisteredInSameCategory = false; // Initialize a flag

    // Check if the user is already registered
    $stmt = $link->prepare("SELECT id, event_name, category FROM registrations WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($userId, $registeredEvent, $registeredCategory);

        while ($stmt->fetch()) {
            if ($registeredEvent == $eventToRegister) {
                $alreadyRegisteredForEvent = true;
                break;
            }

            if ($registeredCategory == $categoryOfEventToRegister) {
                $alreadyRegisteredInSameCategory = true;
            }
        }
    }

    $stmt->close();

    if ($alreadyRegisteredForEvent) {
        echo ('<script>alert("You are already registered for this event.");</script>');
    } elseif ($alreadyRegisteredInSameCategory) {
        echo ('<script>alert("You are already registered for an event in this category.");</script>');
    } else {
        // Register the user for the event
        $stmt = $link->prepare("INSERT INTO registrations (name, event_name, category, id) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $userName, $eventToRegister, $categoryOfEventToRegister, $id);

        if ($stmt->execute()) {
            echo ('<script>alert("You have successfully registered for the event!");</script>');
        } else {
            echo ('<script>alert("Registration failed. Please try again.");</script>');
        }

        $stmt->close();
    }
}
?>

            <h2 style="text-align:center">EVENTS</h2><br>
            <h3 style="text-align:center; color:#FF7676">OFFLINE EVENTS</h3><br>
                <div class="subevents-container">
     
                    <!-- Category 1: -->
                    <div class="subevent-category">
                    <h3>CATEGORY 1</h3>
                    <div class="category">
                        <br>
                        <div class="subevent-details" data-event-id="1" onclick="openPopup('event1')">
                            <h2>QUANTUM QUEST</h2>
                            <div class="logoimg">
                                <img src="QQ1.png" alt="logo" style="width:110%">
                            </div>
                            <p>" Quiz your way to coding glory! "</p>
                        </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;    
                    
                        <div class="subevent-details"  data-event-id="2" onclick="openPopup('event2')">
                            <h2>FUN FORUM</h2>
                            <div class="logoimg">
                                <img src="FF.png" alt="logo" style="width:110%">
                            </div>
                            <p>" Bytes of Fun, Bits of Tech: Join the College Fusion Fest! "</p>
                        </div>
                    </div>
                    </div>

                    <!-- Category 2: -->
                    <div class="subevent-category">
                    <h3> &nbsp; &nbsp; &nbsp;  CATEGORY 2</h3>
                    <div class="category">
                        <div class="subevent-details" data-event-id="3" onclick="openPopup('event3')">
                            <h2>LOGIC LORE</h2>
                            <div class="logoimg">
                                <img src="LL1.png" alt="logo" style="width:110%">
                            </div>
                            <p>" The canvas of code awaits your artistry ! "</p>
                        </div>
                        &nbsp;&nbsp; &nbsp; &nbsp; 

                        <div class="subevent-details"  data-event-id="4" onclick="openPopup('event4')">
                            <h2>MAZE RUNNERS</h2>
                            <div class="logoimg">
                                <img src="MR1.png" alt="logo" style="width:110%">
                            </div>
                            <p>" Clear your vision holds the key.... Where you stumble there lies your treasure! "</p>
                        </div>
                    </div>
                    </div>

                    <!-- Category 3:  -->
                    <div class="subevent-category">
                    <h3> &nbsp; &nbsp; &nbsp; CATEGORY 3</h3>
                    <div class="category">
                        <div class="subevent-details" data-event-id="6" onclick="openPopup('event5')">
                            <h2>IDEA LAUNCH</h2>
                            <div class="logoimg">
                                <img src="IL.png" alt="logo" style="width:110%">
                            </div>
                            <p>" From Concept to Reality, From Vision to Impact:Launch Your Innovation at Idea Launch. "</p>
                        </div>
                    </div><br>
                    </div>
                </div>


                 <!-- Online event:  -->
                <h3 style="text-align:center; color:#FF7676"> ONLINE EVENT </h3> 
                <div class="subevents-container">
             
                    <div class="subevent-category">
                    <div class="category">
                        <div class="subevent-details" data-event-id="7" onclick="openPopup('event7')">
                            <h2>STICKEEZ MATE</h2>
                            <div class="logoimg">
                            <img src="SM.png" alt="logo" style="width:110%">
                            </div>
                            <p>" Embark on a journey of limitless possibilities through the strategic dance of kings and queens. "</p>
                        </div>
                    </div>
                    </div>
                </div>

                  <!-- Hybrid event:  -->
                    <h3 style="text-align:center; color:#FF7676"> HYBRID EVENT </h3>
                    
                    <div class="subevents-container">
                    
                    <div class="subevent-category">
                    <div class="category">
                        <div class="subevent-details" data-event-id="5" onclick="openPopup('event6')">
                            <h2>SHUTTER SPECTRUM</h2>
                            <div class="logoimg">
                                <img src="SS.png" alt="logo" style="width:110%">
                            </div>
                            <p>" Capture the world through your lens and tell a story in a single frame. "</p>
                        </div>
                    </div>
                    </div>
                </div>


        <div class="popup-overlay" id="event1-popup">
            <div class="popup-content">
                <span class="close-button" onclick="closePopup('event1')">&#10006;</span>
                <h2>QUANTUM QUEST</h2><br>
                <h4><b>DESCRIPTION</b></h4>
                <p>Welcome to the Quiz Competition, a thrilling and intellectually stimulating event designed to challenge your knowledge, teamwork, and quick thinking. In this competition, participants will be put to the test across three intense rounds, each with its unique set of challenges. Let's take a closer look at what to expect.</p>
                <h4><b>EVENT DETAILS</b></h4>
                <h5>No of Rounds: 3</h5>
                <h5>Team size: 2</h5><br>
                <h5>First Round - Online Portal (MCQs) :</h5>
                <ul>
                  <li>  The first round will be conducted on an online portal and will consist of multiple-choice questions (MCQs).</li>
                <li>	Participants are required to log in to the online portal and answer the MCQ questions.</li>
                <li>	The leaderboard will be monitored by the organizers, and the top-performing teams will be selected to advance to the second round.</li>

                </ul>
                <h5>Second Round - Pen and Paper Test :</h5>
                <ul>
                    <li>	Only the teams selected from the first round will proceed to the second round.</li>
                    <li>	The second round will be a pen and paper test, and participants will be provided with required materials(Pen, Paper and Notepad)</li>
                    <li>	The test will include questions that require written answers.</li>
                    <li>	The time limit for the second round will be strictly enforced.</li>
                    <li>	The scores from this round will be used to shortlist teams for the final round.</li>

                </ul>
                <h5>Third Round (Final Round) - Buzzer Round :</h5>
                <ul>
                    <li>	The top 5 teams, based on the scores from the second round, will advance to the final round.</li>
                    <li>	The final round will be a buzzer round, and online buzzers will be provided.</li>
                    <li>	Teams will compete to answer questions using the online buzzers, and the timing and accuracy of their responses will be crucial.</li>
                    <li>	The team that scores the highest in this round will be declared the winner of the quiz competition.</li>

                    </ul>
                <p>In case of a tie, organizers will have a tie-breaker question to determine the winner</p>
                <h4><b>GENERAL RULES:<b></h4>
                <ul>
                <li>	Participants must register for the competition in advance, adhering to the registration deadlines set by the organizers.</li>
                <li>	Participants should have a stable internet connection and access to a suitable device, such as a computer or laptop, for the online portal round. Ensure that mobile data is enabled.</li>
                <li>	In the pen and paper rounds, the use of unauthorized materials, such as textbooks, notes, or electronic devices, is strictly prohibited.</li>
                <li>	Adhere to time limits for answering questions in all rounds. The organizers will enforce these time limits to maintain fairness and efficiency.</li>
                <li>	Participants should not engage in any form of cheating, including communication with external sources, or any activity that could give an unfair advantage.</li>
                </ul>
                <hr style="height:2px;border-width:0;color:white;background-color:white">
                <h4>EVENT COORDINATORS:</h4> 
                <p>
                    For any queries participants can contact the below listed committee members.
                </p>
                    <ul>
                    <li>	Vishwak Shana	-	91504 14644</li>
                    <li>	Sindhu	-	97919 18048</li>
                    <li>	Swetha	-	86677 84051</li>
                    <li>	Naga Harish	-	 63808 33476</li>
                    </ul>
               
                <hr style="height:2px;border-width:0;color:white;background-color:white">
                <div style="text-align: center;">
                <button type="submit" name="register" value="QUANTUM QUEST|CATEGORY 1" class="btn btn-primary" style="text-align:center">Register for QUANTUM QUEST</button>
                <button type="button" class="btn btn-danger ml-3" onclick="closePopup('event1')">Cancel</button>    
            </div>
            </div>
        </div>

        <div class="popup-overlay" id="event2-popup">
            <div class="popup-content">
                <span class="close-button" onclick="closePopup('event2')">&#10006;</span>
                <h2>FUN FORUM</h2><br>
                <p>
                <h4> DESCRIPTION: </h4>
                <p> Join us for a lively computer department event filled with fun games that will challenge your skills and spark your competitive spirit! It's a fantastic opportunity to unwind, bond with fellow computer enthusiasts, and celebrate the joy of gaming. </p>
                <h4><b>EVENT DETAILS</b></h4>
                <h5> NO OF ROUNDS:  2</h5>
                <h5> Team Size : 2 </h5><br>
                <h5> ROUND 1: </h5>
                <p>  <ul>Get ready to dive into the digital battlefield! In this electrifying battle of our fun-filled computer department games event is here!  In this exciting round of our fun games event, participants will compete in thrilling gaming challenges and showcasing their gaming prowess. It's a test of wit and reflexes that will leave you on the edge of your seat. Are you up for the challenge?</ul></p>
                <h5> ROUND 2 (FINALE):</h5>
                <p> <ul>Welcome to the exhilarating grand finale of our computer department's fun game event!. The final round promises intense competition, technical challenges, and the chance to prove yourself as the ultimate gamer. Join us for an epic battle of wits and skills, where only the best will emerge victorious and claim the title of champion!</ul> </p>
                <h4>GENERAL RULES:</h4>
                <ul>
                <li>	Emphasize the importance of fair play. Cheating or unsportsmanlike conduct can detract from the fun of the game.</li>
                <li>	Outline any penalties for rule violations. Ensure that they are appropriate and fair.</li>
                <li>	Be clear about how points are scored, and how a winner or winning team is determined. Consider tie-breaker rules if necessary and that team will be rematch.</li>
                <li>	Most importantly, remind everyone that the primary goal is to have fun. Games and fun events are meant for enjoyment and relaxation, so keep the atmosphere light and enjoyable.</li>
                </ul>
                <hr style="height:2px;border-width:0;color:white;background-color:white">
                <h4>EVENT COORDINATORS:</h4> 
                <p>
                    For any queries participants can contact the below listed committee members.
                </p>
                    <ul>
                    <li>	ARUN KUMAR  S   - 73395 22441</li>
                    <li>	SHEEHAL  NISHIBA J   - 94888 86032</li>
                    <li>	JAYARRAKESH PRABAKAR S - 93855 28415</li>
                    <li>	SOMASUNDARAM S - 70109 05731</li>
                    </ul>
               
                <hr style="height:2px;border-width:0;color:white;background-color:white">
                <div style="text-align: center;">
                    <button type="submit" name="register" value="FUN FORUM|CATEGORY 1" class="btn btn-primary">Register for FUN FORUM</button>
                    <button class="btn btn-danger ml-3" onclick="closePopup('event2')">Cancel</button>
                </div>
            </div>
        </div>

        <div class="popup-overlay" id="event3-popup">
            <div class="popup-content">
                <span class="close-button" onclick="closePopup('event3')">&#10006;</span>
                <h2>LOGIC LORE</h2>
                <p>    
                    <h4> DESCRIPTION: </h4>
                    <p>	The Logic Lore is a coding competition designed to celebrate the art of programming and debugging. Whether you are seasoned coder or just starting your coding journey, this contest is for you. It's an opportunity to showcase your coding prowess and win fantastic prizes! </p>
                    <h4><b>EVENT DETAILS</b></h4>
                    <h5> TEAM SIZE: 2</h5><br>
                    <h5> NO OF ROUNDS: 2<br><br>
                    <h5> ROUND 1: </h5>
                    <p> During the initial stage, there is a technical puzzle that assesses student's understanding of data structures and core computer science principles. Those who achieve top positions will progress to the subsequent round. </p>
                    <h5> ROUND 2: </h5>
                    <p> In the second round of the competition, participants will encounter a coding phase that comprises two distinct tasks. The first task places a primary emphasis on problem solving skills. Following the problem solving segment, the subsequent task shifts the focus to debugging.</p>
                    <h4> GENERAL RULES: </h4>
                    <p><li> In case of a tie, the team that solves the problem first wins </li>
                    <li>Any malpractice won't be tolerated and the team will be disqualified.</li>
                    <li>The decision made by the panel cannot be overruled.</li>
                    </p>
                    <hr style="height:2px;border-width:0;color:white;background-color:white">
                    <h4>EVENT COORDINATORS:</h4> 
                        <p>
                            For any queries participants can contact the below listed committee members.
                        </p>
                    <ul>
                    <li>	ASHOK G   - 95666 27631</li>
                    <li>	KAVIYA MEENA   - 89250 06212</li>
                    <li>	ABHISHEK - 73582 68048</li>
                    <li>	SHEEN X - 63842 04517</li>
                    </ul>
               
                <hr style="height:2px;border-width:0;color:white;background-color:white">
                <div style="text-align: center;">
                <button type="submit" name="register" value="LOGIC LORE|CATEGORY 2" class="btn btn-primary">Register for LOGIC LORE</button>
                <button class="btn btn-danger ml-3" onclick="closePopup('event3')">Cancel</button>
                </div>
            </div>
        </div>

        <div class="popup-overlay" id="event4-popup">
            <div class="popup-content">
                <span class="close-button" onclick="closePopup('event4')">&#10006;</span>
                <h2>MAZE RUNNERS</h2><br>
                <h4>DESCRIPTION</h4>
                <p>
                Get ready for Maze Runners to treasure like no other! Play the task with your smart minds and 
                strategies for all levels and spot the finals.
                Join us and discover the adventure to push your strategic limits and unlock a new way to win the 
                game, Don't missout-try your possibility and aim for hunt!</p>
                <h4><b>EVENT DETAILS</b></h4>
                <h5>No of Rounds: 2</h5>
                <h5> Team size: 6</h5>
                <p>
                <h5>ROUND 1:</h5>
                <ul>
                <li> Engage your mind with fun & play.</li>
                <li> Use your smartness for explore the task.</li>
                <li> Elimination Based On Score</li><br>
                </ul>
                <h5>Challenger's Next Stage: </h5> The Contestant will Level up to next Stage and explore the 
                source of fun.</p>
                <h5>ROUND 2:</h5>
                <ul>
                <li> The ultimate test of strategy and nerves!</li>
                <li> Emphasize the primary goal to win and enjoy the adventure.</li>
                <li> Examine the game, and explore the treasury !</li><br>
                </ul>
                <h4>GENERAL RULES</h4>
                <ul><li> Participants are need to follow the game rules and regulations reveal by the instructor.</li>
                <li> Any form of cheating or against the rules ,will result in immediate disqualification.</li>
                <li> Participants are required to maintain respectful and professional behavior throughout.
                the event.</li></ul>
                <hr style="height:2px;border-width:0;color:white;background-color:white">
                <h4>EVENT COORDINATORS:</h4>
               <p> For any queries participants can contact the below listed committee members.</p>
               <ul> 
               <li> Syed Abdul Rahman S - 70925 50028</li>
                <li> Oviya C - 87786 53548</li>
                <li> Viswa - 63743 53499</li>
               </ul>
                </p>
                <hr style="height:2px;border-width:0;color:white;background-color:white">
                <div style="text-align: center;">
                <button type="submit" name="register" value="MAZE RUNNERS|CATEGORY 2" class="btn btn-primary">Register for MAZE RUNNERS</button>
                <button class="btn btn-danger ml-3" onclick="closePopup('event4')">Cancel</button>
                </div>
            </div>
        </div>

        <div class="popup-overlay" id="event5-popup">
            <div class="popup-content">
                <span class="close-button" onclick="closePopup('event5')">&#10006;</span>
                <h2>IDEA LAUNCH</h2><br>
                <h4>DESCRIPTION   </h4>
                   <p> Idea Lanuch is a paper presentation event. Share your domain expertise through professional PPTs, fostering collaboration and diverse discussions.</p>
                   <h4><b>EVENT DETAILS</b></h4> 
                   <h5> TEAM SIZE  : 3 or 4 members </h5>
                    <h4> EVENT RULES : </h4><ul>
                    1.	Teams must consist of 3 or 4 members, including the team leader.<br>
                    2.All team members must be from the same college; inter-college teams are not permitted. However, teams can include members from different branches of the same college or institute.<br>
                    3.	Proficiency in programming skills is highly advantageous since the Hackathon's software edition focuses on digital product development.<br>
                    4.Teams have the flexibility to choose a problem statement from the provided domains.<br>
                    5. Teams can use any programming language, web-designing, or framework for their project development.<br>
                    6.Team members should work on designing a prototype for the chosen problem statement.<br>
                    7. Teams must submit an abstract of their idea one week before the final documentation deadline. The final documentation should be submitted on or before the specified last date.<br>
                    8. In case of similar projects by two or more teams, the earliest submission will be considered.<br>
                    9. Solutions should include assumptions, strategies, and problem modelling.<br>
                    10.	Submissions with more than 20% plagiarism will be rejected.<br>
                    11.	Selected teams will present their documents on the event date at the college.<br>
                    12.	The document must contain the following contents: 
                     <ul>  <li>	Problem definition </li>
                        <li>	The social impact of problem defined</li>
                        <li>	Requirement Analysis(Hardware, Software, functional, Non functional) </li>
                        <li>	The use cases </li>
                        <li>	Design with all applicable diagrams Ex: (Architecture, Class, Sequence, Activity, ER, etc)</li>
                        <li>	Input Output Screens</li>
                        <li>	Conclusion</li></ul>
                </ul>
                </p>
                    <h4> GENERAL RULES  </h4><ul>
                    <li>	Any form of malpractice will result in disqualification.  </li> 
                    <li>	Decisions made by the panel are final and cannot be overruled. </li></ul> 
                    </p>
                    <hr style="height:2px;border-width:0;color:white;background-color:white">
                   <h4> EVENT COORDINATORS   </h4>
                    <p>For any queries participants can contact the below listed committee member :  </p>
                    <ul>
                    <li>	Soundharya -  63815 91413 </li>
                    <li>	Vignesh - 93459 02954</li>
                    <li>	Ganga - 76398 37241</li>
                    <li>	Kaja Mohyaddeen - 63812 14184</li>
                    </ul>
                    <hr style="height:2px;border-width:0;color:white;background-color:white">
                <div style="text-align: center;">
                <button type="submit" name="register" value="IDEA LAUNCH|CATEGORY 3" class="btn btn-primary">Register for IDEA LAUNCH</button>
                <button class="btn btn-danger ml-3" onclick="closePopup('event5')">Cancel</button>
            </div>
            </div>
        </div>

        <div class="popup-overlay" id="event6-popup">
            <div class="popup-content">
                <span class="close-button" onclick="closePopup('event6')">&#10006;</span>
                <h2>SHUTTER SPECTRUM</h2><br>
                <h4><b>DESCRIPTION</b></h4>
                <p>Calling all budding photographers and creative spirits! We are excited to welcome you to our
                    photography contest.In this contest, you embark on a visual odyssey, where each frame is a
                    new chapter each. 
                </p>
                <h4><b>EVENT DETAILS</b></h4>    
                <h5>NO OF ROUNDS: 2 </h5> 
                    <h5>TEAM SIZE: INDIVIDUAL</h5>
                    <h5> ROUND 1:  </h5>
                    <h5> CONTEST TYPE: ONLINE </h5><br>
                    <ul><h5><b>CONTEST THEME : "SILHOUETTES IN NATURE"</b></h5><br>
                    <li>Explore the dramatic and emotional impact of
                    silhouettes against natural backgrounds, create mesmerizing silhouettes that
                    bring to life the intricate shapes, vibrant colors, and the sheer poetry of the
                    natural world. </li>
                   <li> In the first round, the participant should submit two photographs relevant
                    to the theme,along with a brief description of each photograph. The
                    shortlisted participants will advance to the next round,which will be held
                    offline at CIT campus.</li>
                    </ul>
                    <h5> ROUND 2:  </h5>
                    <h5> CONTEST TYPE: OFFLINE </h5><br>
                    <ul><h5><b>Contest Theme: The theme for this round will be intimated to shortlisted participants.</b></h5><br>
                        <li>This is the final round of the competition,where shortlisted participants
                            will be given a theme on which they should create a short reel of about 30
                            seconds within the CIT college premises.
                        </li>
                    </ul>
                    <h4> GENERAL RULES  </h4>
                    <ul>
                    <li>Photographs must be original and related to the theme. </li>
                    <li>Each participant should submit two photographs relevant to the theme.</li>
                    <li> Editing is allowed and both Mobile and DSLR cameras are allowed.</li> 
                    <li> Submission of offensive photos will lead to disqualification. </li>
                    <li> Plagiarism analysis will be conducted and participants with fake photographs will be disqualified. </li> 
                    <li> Format: High-resolution JPEG or PNG images.</li>
                    <li> How to Submit: Upload your two photographs through google forms whose link will be provided to the participants through email/WhatsApp.</li>
                    <li> A brief description of each photograph should be provided.</li> 
                    <li> Judging Criteria: Creativity and Originality, Relevance to the Theme and adherence to the description of the photo.</li>
                    </ul>
                    <hr style="height:2px;border-width:0;color:white;background-color:white">
                    <h4>EVENT COORDINATORS</h4>
                    <p>
                        For any queries participants can contact the below listed committee members.
                    </p>
                    <ul>
                    <li> Srinathi -   63792 36604</li>
                    <li>  Pratheesh - 63821 15320 </li>
                    <li>  Ragavan - 75300 54251</li>
                    <li> Ganasri R S - 94894 90208 </li>
                   
                    </ul>
                    <hr style="height:2px;border-width:0;color:white;background-color:white">
                    <div style="text-align: center;">
                <button type="submit" name="register" value="SHUTTER SPECTRUM|CATEGORY 4" class="btn btn-primary">Register for SHUTTER SPECTRUM</button>
                <button class="btn btn-danger ml-3" onclick="closePopup('event6')">Cancel</button>
        
            </div>
            </div>
        </div>

        <div class="popup-overlay" id="event7-popup">
            <div class="popup-content">
                <span class="close-button" onclick="closePopup('event7')">&#10006;</span>
                <h2>STICKEEZ MATE</h2><br>
                <h4><b>DESCRIPTION</b> </h4>
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
                <h4><b>EVENT DETAILS</b></h4>    
                <h5>NO OF ROUNDS: 2 </h5> 
                    <h5>TEAM SIZE: INDIVIDUAL PLAY</h5>
                    <h5> ROUND 1:  </h5>
                    <ul>
                      <li> Battle against fellow chess enthusiasts in a thrilling elimination round.</li>
                         <li> Only the strongest minds will advance to the next stage.</li>
                         <li> Show your mettle and secure your spot in the finals!</li>
                         <li> Elimination Based On Score</li>
                    </ul>
                   <h5> Challenger's Delight: Fun Retry Challenge :</h5>(Those who wants to give wildcard entry)
                    This Challenge consist of a Funny chess quiz and optional chess puzzle race between 
                    participants</p><br>
                    <h5> ROUND 2:  </h5>
                    <ul>  <li> The ultimate test of strategy and nerves!</li>
                    <li> Compete against the best of the best in a high-stakes arena round.</li>
                    <li> Score more wins, and claim the title of Chess Champion!</li></ul>
                    <h4> GENERAL RULES:  </h4>
                    <ul>
                    <p>  
                    <li> Participants are expected to uphold the spirit of fair play and sportsmanship.</li>
                    <li> Any form of cheating, including external assistance or computer engine usage, will 
                    result in immediate disqualification.</li>
                    <li> Participants are required to maintain respectful and professional behavior throughout 
                    the event.</li>
                    <li> The event will be conducted on an online Li-chess platform.(Everyone should have 
                    account on Li-Chess , Instruction’s are shared later)</li>
                    <li> Participants must have a stable internet connection and a compatible device.</li></p>
                    <h5> How are scores calculated? </h5>
                    <p>  <li> A win has a base score of 2 points, a draw 1 point, and a loss is worth no points. If 
                    you win two games consecutively you will start a double point streak, represented by 
                    a flame icon. The following games will continue to be worth double points until you 
                    fail to win a game. That is, a win will be worth 4 points, a draw 2 points, and a loss 
                    will still not award any points. For example, two wins followed by a draw will be 
                    worth 6 points: 2 + 2 + (2 x 1),</li></p>
                    <h5> How does the pairing work? </h5>
                    <p>  <li> At the beginning of the tournament, players are paired based on their rating. As soon 
                    as you finish a game, return to the tournament lobby: you will then be paired with a 
                    player close to your ranking. This ensures minimum wait time, however you may not 
                    face all other players in the tournament. Play fast and return to the lobby to play more 
                    games and win more points.</li></p>
                    </ul>
                    <hr style="height:2px;border-width:0;color:white;background-color:white">
                    <h4>EVENT COORDINATORS</h4><br>
                    <p>
                        For any queries participants can contact the below listed committee members.
                    </p>
                    <ul>
                    <li>Arunkumar M - 95008 52903 </li>
                    <li> Yogamithra - 73395 96177 </li>
                    <li> Navin Shantha Kumar U - 88704 49328</li>
                    <li> Vikasini S - 88702 44556</li><br>
                    </ul>
                    <hr style="height:2px;border-width:0;color:white;background-color:white">
                    <div style="text-align: center;">
              
                    <button type="submit" name="register" value="STICKEEZ MATE|CATEGORY 5" class="btn btn-primary">Register for STICKEEZ MATE</button>
                    <button class="btn btn-danger ml-3" onclick="closePopup('event7')">Cancel</button>
                    </div>
                </div>
        </div>

        </form>
    </section>

    <!-- <section id="section4" class="scroll-section"><br><br>
    <div class="sponsor">
    <h2 style="text-align: center;">OUR SPONSORS</h2>
    </div>
    </section> -->

    <section id="section5" class="scroll-section"><br>
        <h2 style="text-align: center;">&nbsp;&nbsp;CONTACT</h2><br>
     
        <div class="con">
            <div class="con1">
                <h4 style= "color:black">CHAIRMAN</h4>
                <h5>SOORYA HARSHA P</h5>
                <h5>89253 17575</h5>
                <div class="contact-links">
                    <a href="mailto:soorya2k2.pro@gmail.com" target="_blank" class="fa fa-envelope"></a>
                    <a href="https://wa.me/918925317575"target="_blank" class="fa fa-whatsapp"></a>
                    <a href="https://www.linkedin.com/in/soorya-harsha22/" target="_blank" class="fa fa-linkedin"></a>
                </div>
            </div>

            <div class="con1">
                <h4 style= "color:black">SECRETARY</h4>
                <h5>SANJEEV KANNA</h5>
                <h5>86087 44936</h5>
                <div class="contact-links">
                    <a href="https://www.instagram.com/b.s_kanna/" target="_blank" class="fa fa-instagram"></a>
                    <a href="mailto:kannab.s@yahoo.com" target="_blank" class="fa fa-envelope"></a>
                    <a href="https://wa.me/918608744936" target="_blank"class="fa fa-whatsapp"></a>
                    <!-- <a href="https://www.linkedin.com/in/cit-cyberfest23/" target="_blank" class="fa fa-linkedin"></a> -->
                </div>
            </div>

            <div class="con1">
                <h4 style= "color:black">TREASURER</h4>
                <h5>PRAVEENA A</h5>
                <h5>82207 79877</h5>
                <div class="contact-links">
                    <a href="mailto:praveenasundari02@gmail.com" target="_blank" class="fa fa-envelope"></a>
                    <a href="https://wa.me/918220779877" target="_blank"class="fa fa-whatsapp"></a>
                    <a href="https://www.linkedin.com/in/praveena-anthonyswamy-10640b25b/" target="_blank" class="fa fa-linkedin"></a>
                </div>
            </div>
        </div><br>
        <h4 style= "color:white;text-align:center;">EVENT ORGANISERS</h4>
        <div class="con">

            <div class="con1"><br>
                <h5>KEERTHANA U</h5>
                <h5>63746 82651</h5>
                <div class="contact-links">
                    <a href="https://www.instagram.com/_keerthu_nathan_0_6_0_1/" target="_blank" class="fa fa-instagram"></a>
                    <a href="mailto:u.keerthu0601@gmail.com" target="_blank" class="fa fa-envelope"></a>
                    <a href="https://wa.me/916374682651" target="_blank"class="fa fa-whatsapp"></a>
                    <a href="https://www.linkedin.com/in/keerthana-u-641908264/" target="_blank" class="fa fa-linkedin"></a>
                </div>
            </div>

            <div class="con1"><br>
                <h5>SANKAR GURU S</h5>
                <h5> 96269 30715</h5>
                <div class="contact-links">
                    <a href="https://www.instagram.com/sankar.guru_sg/" target="_blank" class="fa fa-instagram"></a>
                    <a href="mailto:sankarguru02002@gmail.com" target="_blank" class="fa fa-envelope"></a>
                    <a href="https://wa.me/919626930715" target="_blank"class="fa fa-whatsapp"></a>
                    <a href="https://www.linkedin.com/in/sankar-guru/" target="_blank" class="fa fa-linkedin"></a>
                </div>
            </div>

            <div class="con1"><br>
                <h5>PEPITHA SRI S</h5>
                <h5>86800 78973</h5>
                <div class="contact-links">
                    <a href="https://www.instagram.com/pepithasri_sivaraj/" target="_blank" class="fa fa-instagram"></a>
                    <a href="mailto:pepithasri23@gmail.com" target="_blank" class="fa fa-envelope"></a>
                    <a href="https://wa.me/918680078973" target="_blank"class="fa fa-whatsapp"></a>
                    <a href="https://www.linkedin.com/in/cit-cyberfest23/" target="_blank" class="fa fa-linkedin"></a>
                </div>
            </div>
        </div><br>
        <h4 style= "color:white; text-align:center;">EVENT MANAGERS</h4>
        <div class="con">
            <div class="con1"><br>
                <h5>HARISHANKAR K</h5>
                <h5>76397 35123</h5>
                <div class="contact-links">
                    <a href="https://www.instagram.com/harish_hs_/" target="_blank" class="fa fa-instagram"></a>
                    <a href="mailto:harishankar.amk@gmail.com" target="_blank" class="fa fa-envelope"></a>
                    <a href="https://wa.me/917639735123" target="_blank"class="fa fa-whatsapp"></a>
                    <a href="https://www.linkedin.com/in/harishankark2/" target="_blank" class="fa fa-linkedin"></a>
                </div>
            </div>
            <div class="con1"><br>
                <h5>FRANCIS STEPHEN J</h5>
                <h5> 88704 49377</h5>
                <div class="contact-links">
                    <a href="https://www.instagram.com/spiker_stephen/" target="_blank" class="fa fa-instagram"></a>
                    <a href="mailto:stephenjfs3108@gmail.com" target="_blank" class="fa fa-envelope"></a>
                    <a href="https://wa.me/918870449377" target="_blank" class="fa fa-whatsapp"></a>
                    <a href="https://www.linkedin.com/in/francis-stephen-j-330170186/" target="_blank" class="fa fa-linkedin"></a>
                </div>
            </div>   
        </div>
        <div class="contact">
        <h2 style="text-align: center;">&nbsp;&nbsp;CONNECT WITH US IN SOCIAL MEDIAS</h2>
                    <a href="https://instagram.com/cyberfest2k23?igshid=MzRlODBiNWFlZA=="target="_blank" class="fa fa-instagram"></a>
                    <a href="mailto:citcyberfest.ac.in@gmail.com"target="_blank"class="fa fa-envelope"></a>
                    <a href="https://wa.me/918925317575"target="_blank"class="fa fa-whatsapp"></a>
                    <a href="https://www.linkedin.com/in/cit-cyberfest23/"target="_blank"class="fa fa-linkedin "></a>
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
</div>
</body>
</html>