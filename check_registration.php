<?php
session_start();
 // Assuming you have a database connection established
 require_once 'db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    // Initialize error messages
    $errors = [];

    // Split the value into event name and category
    $eventData = explode('|', $_POST['register']);
    if (count($eventData) != 2) {
        $errors[] = "Invalid event data.";
    } else {
        list($eventToRegister, $categoryOfEventToRegister) = $eventData;
    }

    // Check if the user is already registered for the same event or category
    $id = $_SESSION['id'];

    if (empty($eventToRegister) || empty($categoryOfEventToRegister)) {
        $errors[] = "Invalid event data.";
    }

    // Fetch the user's name from the register table
    $stmt = $link->prepare("SELECT name FROM register WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($userName);
    $stmt->fetch();
    $stmt->close();

    $alreadyRegisteredForEvent = false;
    $alreadyRegisteredInSameCategory = false;

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

    // Handle errors and registration
 // Check if the user is already registered
if ($alreadyRegisteredForEvent) {
    $errors[] = "You are already registered for this event.";
} elseif ($alreadyRegisteredInSameCategory) {
    $errors[] = "You are already registered for an event in this category.";
} else {
    // Register the user for the event
    $stmt = $link->prepare("INSERT INTO registrations (name, event_name, category, id) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $userName, $eventToRegister, $categoryOfEventToRegister, $id);

    if ($stmt->execute()) {
        $successMessage = "You have successfully registered for " . $eventToRegister;
    } else {
        $errors[] = "Registration failed. Please try again.";
    }
    $stmt->close();
}

    // Display any errors in dialogue boxes
    if (!empty($errors)) {
        echo "<script>alert('" . implode("\\n", $errors) . "');</script>";
    }

    if (isset($successMessage)) {
        echo "<script>alert('$successMessage');</script>";
    }
}
?>
