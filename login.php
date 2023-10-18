<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
 
// Include config file
require_once "db.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM register WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["name"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: welcome.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
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
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="form.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<div class="lb">
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
                <li>   <a href="index.php" class="btn btn-primary">Home</a></li>
                </ul>
    </div>
</header>

    <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
    ?>

<div class="box">   
    <div class="login-form">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return validateForm();">
            <h2>LOGIN</h2><br>
            <div class="login-group">
                <!-- <label for="username">USERNAME</label><br> -->
                <div class="input-group">
                    <input type="text" name="username" id="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>" placeholder="USERNAME">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                    </div>
                </div>
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>

            <br>   
            <div class="login-group">
                <!-- <label for="password">PASSWORD</label><br> -->
                <div class="input-group">
                    <input type="password" name="password" id="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" placeholder="PASSWORD">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-lock"></i></span>
                    </div>
                </div>
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
             <br>
            <div class="login-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div><br>
            <p>Don't have an account? <a href="register.php">Sign up now</a></p>
            <div class="login-group">
                <p>Having trouble logging in? <a href="#" id="openContactDialog">Forgot login credentials</a></p>
            </div>
            <div id="contactUsDialog" class="dialog">
                <div class="dialog-content">
                    <span class="close-button" id="closeDialog">&times;</span><br>
                    <h4>FORGOT LOGIN CREDENTIALS</h4>
                    <p>If you need assistance with your login credentials, please contact our support team at cyberfest2023@gmail.com or Send "RESET PASSWORD" -  "YOUR USERNAME" to cyberfest2023@gmail.com from your registered mail id.</p>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
function validateForm() {
    var username = document.forms[0]["username"].value;
    var password = document.forms[0]["password"].value;
    
    if (username === "" || password === "") {
        alert("Please insert valid credentials !");
        return false;
    }
    
    return true;
}
  // Get the dialog and close button elements
var contactUsDialog = document.getElementById("contactUsDialog");
var closeDialogButton = document.getElementById("closeDialog");

// Get the link to open the dialog
var contactLink = document.getElementById("openContactDialog");

// Show the dialog when the link is clicked
contactLink.addEventListener("click", function (e) {
    e.preventDefault(); // Prevent the default link behavior
    contactUsDialog.style.display = "block";
});

// Close the dialog when the close button is clicked
closeDialogButton.addEventListener("click", function () {
    contactUsDialog.style.display = "none";
});

</script>
</div>
</body>
</html>