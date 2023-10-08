<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title>Registered Events</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        padding: 20px;
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    ul {
        list-style: none;
        padding: 0;
    }

    ul li {
        margin-bottom: 10px;
        background-color: #fff;
        padding: 10px;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .btn-primary {
        display: block;
        margin-top: 20px;
        margin-left: auto;
        margin-right: auto;
    }
</style>

</head>
<body>
    <h1>Registered Events</h1>
    
    <?php
    // Start the session
    session_start();
    
    // Check if the user is logged in
    if (isset($_SESSION['id'])) {
        // Database connection parameters
        require_once 'db.php';
        
        // Check the connection
        if ($link->connect_error) {
            die("Connection failed: " . $link->connect_error);
        }
        
        // Get the user's registered events
        $id = $_SESSION['id'];
        $stmt = $link->prepare("SELECT event_name, category FROM registrations WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($registeredEvent, $registeredCategory);
        
        // Initialize a flag to check if any events are registered
        $eventsRegistered = false;

        // Display the registered events
        echo "<ul>";
        while ($stmt->fetch()) {
            echo "<strong>Event Name:</strong> $registeredEvent<br><strong>Category:</strong> $registeredCategory<br></li>";
            $eventsRegistered = true; // Set the flag to true if events are registered
        }
        echo "</ul>";
        
        // Close the database connection
        $stmt->close();
        $link->close();

        // If no events are registered, show an alert
    if (!$eventsRegistered) {
        echo ("No events registered.<br>");
    }
    } 
    ?>
    
    <a class="btn btn-primary" href="welcome.php">Home</a>
</body>
</html>
