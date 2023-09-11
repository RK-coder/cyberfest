<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redirect to login if not logged in
}
require_once 'db.php'; // Include database connection

// Fetch user's registrations from database
$user_id = $_SESSION['user_id'];
$query = "SELECT event_name FROM registrations WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();
$registrations = [];
while ($row = $result->fetch_assoc()) {
    $registrations[] = $row['event_name'];
}
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - CyberFest</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <h1>CyberFest</h1>
        <p>Welcome, <?php echo $_SESSION['username']; ?></p>
        <a href="logout.php">Logout</a>
    </header>
    <div class="container">
        <h2>Your Registrations:</h2>
        <?php foreach ($registrations as $event) : ?>
            <p><?php echo $event; ?></p>
        <?php endforeach; ?>
    </div>
</body>
</html>
