<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image" href="tlogo.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Profile</title>
    <style>
    body {
        background-color: black;
        background: url(neon5.jpeg);
        background-size: initial;
        background-position: center;
    }
    </style>

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
                    <li>   <a href="welcome.php">Home</a></li>
                    <li>   <a href="welcome.php#section2">About</a></li>
                    <li>   <a href="welcome.php#section3">Events</a></li>
                    <!-- <li>   <a href="welcome.php#section4">Sponsors</a></li> -->
                    <li>   <a href="welcome.php#section5">Contact</a></li>
                    <li>   <a href="reset-password.php">Reset Password</a></li>
                    <li>   <a href="profile.php" class="btn btn-success">Profile</a></li>
                    <li>   <a href="logout.php" class="btn btn-danger ml-3">Sign Out</a></li>
                </ul>
        </div>
    </header>
   
    <?php
// Start the session
session_start();

// Initialize variables
$userName = $userEmail = $userPhone = "";
$registeredEvents = [];

// Check if the user is logged in
if (isset($_SESSION['id'])) {
    // Database connection parameters
    require_once 'db.php';

    // Check the connection
    if ($link->connect_error) {
        die("Connection failed: " . $link->connect_error);
    }

    // Get the user's data
    $id = $_SESSION['id'];
    $stmt = $link->prepare("SELECT name, email, phone FROM register WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($userName, $userEmail, $userPhone);
    $stmt->fetch();
    
    // Close the $stmt
    $stmt->close();

    // Get the user's registered events
    $stmt = $link->prepare("SELECT event_name, category FROM registrations WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($registeredEvent, $registeredCategory);
    
    // Collect registered events into an array
    while ($stmt->fetch()) {
        $registeredEvents[] = [
            'event_name' => $registeredEvent,
            'category' => $registeredCategory
        ];
    }
    
    // Close the $stmt
    $stmt->close();

    // Close the database connection
    $link->close();
}

?>
<div class="profile"><br><br><br>
    <h1>USER PROFILE</h1>
    
    <?php if (isset($_SESSION['id'])): ?>
        <table>
        <h3>USER INFORMATION</h3>
    
        <tr>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>PHONE</th>           
        </tr>
        <tr>
        <td><?= $userName ?></td>
            <td><?= $userEmail ?></td>
            <td><?= $userPhone ?></td>   
        </tr>
    </table>
<br>
    <?php if (!empty($registeredEvents)): ?>
        <h3>EVENTS REGISTERED</h3>
        <table>
            <tr>
                <th>EVENT NAME</th>
                <th>CATEGORY</th>
            </tr>
            <?php foreach ($registeredEvents as $event): ?>
                <tr>
                    <td><?= $event['event_name'] ?></td>
                    <td><?= $event['category'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>No events registered.</p>
    <?php endif; ?>
<?php else: ?>
    <p>You are not logged in.</p>
<?php endif; ?><br><br>
</div>
</body>
</html>
