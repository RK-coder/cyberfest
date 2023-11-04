<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, otherwise redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
 
// Include config file
require_once "db.php";
 
// Define variables and initialize with empty values
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate new password
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Please enter the new password.";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "Password must have atleast 6 characters.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm the password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
        
    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err)){
        
        // Prepare an update statement
        $sql = "UPDATE register SET password = ?, confirm_password = ? WHERE id = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssi", $param_password, $param_confirm_password, $param_id);
        
            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_confirm_password = $confirm_password; // Store the confirm password as-is
            $param_id = $_SESSION["id"];
        
            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
        
                // Close the statement
                mysqli_stmt_close($stmt);
        
                 // Password updated successfully. Show an alert.
                 echo '<script>alert("Password changed successfully.");</script>';

               // Redirect to the login page after the alert
                  echo '<script>window.location.href = "login.php";</script>';
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
    }
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image" href="tlogo.png">
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        
       
        
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
                    <li>   <a href="reset-password.php" >Reset Password</a></li>
                    <li>   <a href="profile.php" class="btn btn-success">Profile</a></li>
                    <li>   <a href="logout.php" class="btn btn-danger ml-3">Sign Out</a></li>
                </ul>
        </div>
    </header>
    <div class="reset">
<h2>Reset Password</h2><br>
    <div class="wrapper">
       
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
            <div class="form-group">
                <label>New Password</label>
                <input type="password" name="new_password" class="form-control <?php echo (!empty($new_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $new_password; ?>">
                <span class="invalid-feedback"><?php echo $new_password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <a class="btn btn-link ml-2" href="welcome.php">Cancel</a>
            </div>
        </form>
    </div> 
    </div>   
</body>
</html>