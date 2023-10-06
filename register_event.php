<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $eventToRegister = $_POST['register'];

    // Check if the event is already registered
    // Assuming you have a database connection established

    $id = $_SESSION['id'];

    require_once 'db.php';

    // Check if the user is already registered for this event
    $stmt = $link->prepare("SELECT * FROM registrations WHERE event_name = ? AND id = ?");
    $stmt->bind_param("si", $eventToRegister, $id);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo '<script>alert("You are already registered for this event.");</script>';
    } else {
        // Register the user for the event
        $stmt = $link->prepare("INSERT INTO registrations (event_name, id) VALUES (?, ?)");
        $stmt->bind_param("si", $eventToRegister, $id);

        if ($stmt->execute()) {
            echo '<script>alert("Successfully registered for the event!");</script>';
        } else {
            echo '<script>alert("Registration failed. Please try again.");</script>';
        }
    }

    $stmt->close();
    $link->close();
}
?>
