<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    
    <title>Profile</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: black;

    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    .btn-primary {
        display: block;
        margin-top: 20px;
        margin-left: auto;
        margin-right: auto;
    }
    table {
        border-collapse: collapse;
        width: 50%;
       
    }

    th, td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
        border-color: white;
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
                <li>   <a href="welcome.php/#section2">Profile</a></li>
                <li>   <a href="#section3">About</a></li>
                <li>   <a href="#section4">Events</a></li>
                <li>   <a href="#section5">Contact</a></li>
                <li>   <a href="#section6">Gallery</a></li>
                <li>   <a href="register_event.php">Profile</a></li>
                <li>   <a href="reset-password.php" class="btn btn-warning">Reset Password</a></li>
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

    <h1>USER PROFILE</h1>
    
    <?php if (isset($_SESSION['id'])): ?>
    <h2>User Information</h2>
    <table>
        <tr>
            <th>Name</th>
            <td><?= $userName ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?= $userEmail ?></td>
        </tr>
        <tr>
            <th>Phone</th>
            <td><?= $userPhone ?></td>
        </tr>
    </table>

    <?php if (!empty($registeredEvents)): ?>
        <h2>Events Registered</h2>
        <table>
            <tr>
                <th>Event Name</th>
                <th>Category</th>
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
<?php endif; ?>

</body>
</html>
