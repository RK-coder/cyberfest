<?php 
$id = $_GET['id'];
$status = $_GET['status'];
include "db_conn.php";

// Use prepared statements to prevent SQL injection
$query = "UPDATE registrations SET status = ?, name = ? WHERE id = ?";
$stmt = mysqli_prepare($conn, $query);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "ssi", $status, $name, $id); // Assuming $name is the new name
    mysqli_stmt_execute($stmt);

    // Check for success and redirect accordingly
    if (mysqli_affected_rows($conn) > 0) {
        header('location:approvel.php');
    } else {
        echo "Update failed";
    }

    mysqli_stmt_close($stmt);
} else {
    echo "Error in prepared statement: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
