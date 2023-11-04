<?php
include "db_conn.php"; // Include your database connection code here

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Make sure to properly sanitize and validate the $id variable to prevent SQL injection.
    // For this example, we'll use intval to ensure $id is an integer, but consider using prepared statements for production code.
    $id = intval($id);

    // Query the database to fetch the image data based on the provided ID
    $query = "SELECT image_data, image_format FROM register WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $imageData = $row['image_data'];
        $imageFormat = $row['image_format'];

      // Set the appropriate headers for the download
header("Content-Type: image/$imageFormat");
header("Content-Disposition: attachment; filename=image.$imageFormat");
header("Content-Length: " . strlen($imageData));


        // Output the image data to the browser for download
        echo $imageData;
        exit();
    }
}

// If the image couldn't be found or there was an issue, you can redirect or show an error message.
header("Location: error_page.php"); // Redirect to an error page or display an error message.
?>