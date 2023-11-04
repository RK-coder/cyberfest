<?php
// Include config file
require_once "db.php";

// Define variables and initialize with empty values
$name = $username = $password = $confirm_password = $phone = $email = $reg_no = $degree = $stream = $year = $college = $gender = $food_preference = $transaction_number = $image_name = $image_data = "";
$name_err = $username_err = $password_err = $confirm_password_err = $phone_err = $email_err = $reg_no_err =  $degree_err = $stream_err = $year_err = $college_err = $gender_err = $food_preference_err = $transaction_number_err = $image_err = "";

// Processing form data when form is submitted 
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate Input Name
    if (empty(trim($_POST["name"]))) {
        $name_err = "";
    } else {
        $name = trim($_POST["name"]);
    }

    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } elseif (strlen(trim($_POST["username"])) < 6) {
        $username_err = "Username must be at least 6 characters long.";
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))) {
        $username_err = "Username can only contain letters (both upper and lower case), numbers, and underscores.";
    } else {    
        // Prepare a select statement
        $sql = "SELECT id FROM register WHERE username = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "This username is already taken.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }


    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 8) {
        $password_err = "Password must have at least 8 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm the password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Passwords did not match.";
        }
    }

  // Validate phone number
    if (empty(trim($_POST["phone"]))) {
        $phone_err = "Please enter your phone number.";
    } else {
        // Remove non-numeric characters from the input
        $phone = preg_replace('/\D/', '', $_POST["phone"]);

        if (strlen($phone) !== 10) {
            $phone_err = "Phone number must contain exactly 10 digits.";
        }
    }

    // Validate the email address
    if (empty(trim($_POST["email"]))) {
    $email_err = "Please enter an email address.";
        } else {
    $email = trim($_POST["email"]);
    // Check if the email address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_err = "Invalid email format.";
    }
    }

    // Validate Reg.No
    if (empty(trim($_POST["reg_no"]))) {
        $reg_no_err = "Please enter your Registration Number.";
    } else {
        $reg_no = trim($_POST["reg_no"]);
    }

    // Validate Degree
    if (isset($_POST["degree"])) {
        $degree = trim($_POST["degree"]);
        if ($degree === "Other") {
            // If "Other" is selected, check for a custom degree entry
            if (isset($_POST["other_degree"])) {
                $custom_degree = trim($_POST["other_degree"]);
            }
        } else {
            // If a predefined degree is selected, store it in the "degree" column
            $custom_degree = null; // Set to null if not "Other"
        }
    } else {
        $degree_err = "Please select your degree.";
    }

    // Validate Stream (optional)
    if ($degree !== "Other" && empty(trim($_POST["stream"]))) {
        $stream_err = "Please enter your stream.";
    } else {
        $stream = trim($_POST["stream"]);
    }

    // Validate year
    if (isset($_POST["year"])) {
        $year = trim($_POST["year"]);
    } else {
        $year_err = "Please enter your year.";
    }

    // Check if degree is BE or BTech and year is 1
    if ($degree === "BE" || $degree === "BTech") {
        if ($year === "1") {
            $degree_err = "You are not eligible for this combination of degree and year.";
        }
    }

    // Validate college
    if (isset($_POST["college"])) {
        $college = trim($_POST["college"]);
        if ($college === "Other") {
            // If "Other" is selected for college, check for a custom college entry
            if (isset($_POST["other_college"])) {
                $custom_college = trim($_POST["other_college"]);
            }
        } else {
            // If a predefined college is selected, store it in the "college" column
            $custom_college = null; // Set to null if not "Other"
        }
    } else {
        $college_err = "Please select your college.";
    }
      

    // Validate Gender
    if (isset($_POST["gender"])) {
        $gender = trim($_POST["gender"]);
    } else {
        $gender_err = "Please select your gender.";
    }

    // Validate Food Preference
    if (isset($_POST["food_preference"])) {
        $food_preference = trim($_POST["food_preference"]);
    } else {
        $food_preference_err = "Please select your food preference.";
    }

    //Validate Transaction number
    $transaction_number = $_POST['transaction_number'];

if (empty($transaction_number)) {
    $transaction_number_err = "Please enter the transaction number.";
} elseif (!is_numeric($transaction_number)) {
    $transaction_number_err = "Transaction number must be numeric.";
} else {
    // Transaction number is numeric, proceed with the insertion

     // Check if the transaction number already exists in the database
     $check_query = "SELECT id FROM register WHERE transaction_number = ?";
     $stmt = mysqli_prepare($link, $check_query);
     mysqli_stmt_bind_param($stmt, "s", $transaction_number);
     mysqli_stmt_execute($stmt);    
     mysqli_stmt_store_result($stmt);
 
     if (mysqli_stmt_num_rows($stmt) > 0) {
         $transaction_number_err = "This transaction number is already in use.";
     }else {
        // Transaction number is valid, and it's not in use, proceed with the insertion
        // ... (the rest of your insertion code)
    }
 
     // Close the statement
     mysqli_stmt_close($stmt);
}

    // Check if an image file was uploaded
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] === 0) {
        $image_name = $_FILES["image"]["name"];
        $image_data = file_get_contents($_FILES["image"]["tmp_name"]);
    
        // Check the file size
        $max_size = 2 * 1024 * 1024; // 2MB in bytes
        if ($_FILES["image"]["size"] > $max_size) {
            $image_err = "The uploaded image is too large. Please choose an image less than 2MB.";
        } else {
            // Check the file extension
            $allowed_extensions = array("jpg", "jpeg", "png");
            $file_extension = pathinfo($image_name, PATHINFO_EXTENSION);
    
            if (!in_array(strtolower($file_extension), $allowed_extensions)) {
                $image_err = "Only JPG, JPEG, and PNG files are allowed.";
            } else {
                $image_format = $file_extension; // Store the image format
            }
        }
    } else {
        $image_err = "Please select an image file.";
    }
   
    // Check input errors before inserting in the database
    if (empty($name_err) && empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($phone_err) && empty($email_err) && empty($reg_no_err) && empty($degree_err) && empty($year_err) && empty($college_err) && empty($custom_college_err) && empty($gender_err) && empty($food_preference_err) && empty($image_err)) {

        // Check if the college registration count is less than the maximum limit
        $maxRegistrations = 3; // Set the maximum number of registrations per college

        if ($college !== "Other") {
        $sql = "SELECT COUNT(*) FROM register WHERE college = ?";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "s", $college);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $registrationCount);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        if ($registrationCount < $maxRegistrations) {
            // Prepare an insert statement
            $sql = "INSERT INTO register (name, username, password, confirm_password, phone, email, reg_no, degree, custom_degree, stream, year, college, custom_college, gender, food_preference, transaction_number, image_name, image_data, image_format) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )";

            if ($stmt = mysqli_prepare($link, $sql)) {
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "sssssssssssssssssss", $param_name, $param_username, $param_password, $param_confirm_password, $param_phone, $param_email, $param_reg_no, $param_degree, $param_custom_degree, $param_stream, $param_year, $param_college,  $param_custom_college, $param_gender, $param_food_preference, $param_transaction_number, $param_image_name, $param_image_data, $param_image_format);

                // Set parameters
                $param_name = $name;
                $param_username = $username;
                $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
                $param_confirm_password = ($confirm_password);
                $param_phone = $phone;
                $param_email = $email;
                $param_reg_no = $reg_no;
                $param_degree = $degree;
                $param_custom_degree = $custom_degree;
                $param_stream = $stream;
                $param_year = $year;
                $param_college = $college;
                $param_custom_college = $custom_college;
                $param_gender = $gender;
                $param_food_preference = $food_preference;
                $param_transaction_number = $transaction_number;
                $param_image_name = $image_name;
                $param_image_data = $image_data;
                $param_image_format = $image_format;

                // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    // Update the college registration count
                    $updateSql = "UPDATE register SET college_registration_count = college_registration_count + 1 WHERE college = ?";
                    $updateStmt = mysqli_prepare($link, $updateSql);
                    mysqli_stmt_bind_param($updateStmt, "s", $college);
                    mysqli_stmt_execute($updateStmt);
                    mysqli_stmt_close($updateStmt);

                    // Redirect to login page
                    echo '<script>alert("Registration successful. You can now log in. Confirmation mail will be sent to your registered email once your details are verified.");';
                    echo 'window.location.href = "login.php";</script>';
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }

                // Close statement
                mysqli_stmt_close($stmt);
            }
        } else {
            // Display an error message if the college registration limit is reached
            echo '<script>alert("Registration for this college is full. Please choose another college.");</script>';
        }

    } else {
        // If college is "Other", handle it as a special case without considering registration count
        // Prepare an insert statement
        $sql = "INSERT INTO register (name, username, password, confirm_password, phone, email, reg_no, degree, custom_degree, stream, year, college, custom_college, gender, food_preference, transaction_number, image_name, image_data, image_format) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssssssssssssss", $param_name, $param_username, $param_password, $param_confirm_password, $param_phone, $param_email, $param_reg_no, $param_degree, $param_custom_degree, $param_stream, $param_year, $param_college, $param_custom_college, $param_gender, $param_food_preference, $param_transaction_number, $param_image_name, $param_image_data, $param_image_format);

            // Set parameters
            $param_name = $name;
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_confirm_password = ($confirm_password);
            $param_phone = $phone;
            $param_email = $email;
            $param_reg_no = $reg_no;
            $param_degree = $degree;
            $param_custom_degree = $custom_degree;
            $param_stream = $stream;
            $param_year = $year;
            $param_college = $college;
            $param_custom_college = $custom_college;
            $param_gender = $gender;
            $param_food_preference = $food_preference;
            $param_transaction_number = $transaction_number;
            $param_image_name = $image_name;
            $param_image_data = $image_data;
            $param_image_format = $image_format;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to login page
                echo '<script>alert("Registration successful! You can now log in. Confirmation mail will be sent to your registered email once your details are verified.");';
                echo 'window.location.href = "login.php";</script>';

            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
        // Close the database connection
        mysqli_close($link);
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image" href="tlogo.png">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
   <!-- <link rel="stylesheet" href="form.css">-->
    <style>
        /* nav bar */

.top-nav {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-between;
    background-color: #ffffff;
    background: linear-gradient(to left, #08034d, #08034d);
    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    color: #FFF;
    text-decoration-color: white;
    padding: 1em;
    
  }
  
  .menu {
    display: flex;
    flex-direction: row;
    list-style-type: none;
    margin: 0;
    padding: 0;
  }
  
  .menu > li {
    margin: 0.5rem;
    overflow: hidden;
    color: white;
  }
  
  .menu-button-container {
    display: none;
    height: 100%;
    width: 30px;
    cursor: pointer;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }
  
  #menu-toggle {
    display: none;
  }
  
  .menu-button,
  .menu-button::before,
  .menu-button::after {
    display: block;
    background-color: #fff;
    position: absolute;
    height: 4px;
    width: 30px;
    transition: transform 400ms cubic-bezier(0.23, 1, 0.32, 1);
    border-radius: 2px;
  }
  
  .menu-button::before {
    content: '';
    margin-top: -8px;
  }
  
  .menu-button::after {
    content: '';
    margin-top: 8px;
  }
  
  #menu-toggle:checked + .menu-button-container .menu-button::before {
    margin-top: 0px;
    transform: rotate(405deg);
  }
  
  #menu-toggle:checked + .menu-button-container .menu-button {
    background: rgba(255, 255, 255, 0);
  }
  
  #menu-toggle:checked + .menu-button-container .menu-button::after {
    margin-top: 0px;
    transform: rotate(-405deg);
  }
  
  @media (max-width: 550px) {
    .menu-button-container {
      display: flex;
    }
    .menu {
      position: absolute;
      top: 0;
      margin-top: 50px;
      left: 0;
      flex-direction: column;
      width: 100%;
      justify-content: center;
      align-items: center;
    }
    #menu-toggle ~ .menu li {
      height: 0;
      margin: 0;
      padding: 0;
      border: 0;
      transition: height 400ms cubic-bezier(0.23, 1, 0.32, 1);
    }
    #menu-toggle:checked ~ .menu li {
      border: 1px solid #333;
      height: 2.5em;
      padding: 0.5em;
      transition: height 400ms cubic-bezier(0.23, 1, 0.32, 1);
    }
    .menu > li {
      display: flex;
      justify-content: center;
      margin: 0;
      padding: 0.5em 0;
      width: 100%;
      color: white;
      background-color: #222;
    }
    .menu > li:not(:last-child) {
      border-bottom: 1px solid #444;
    }
  }
  @media all and (max-width: 650px){

    h4{
        font-size: 20px;
    }
}
/* for others*/
        body {
            font: 14px sans-serif;
            font-family: 'Cabin', sans-serif;
            font-family: 'Montserrat', sans-serif;
            background-image:url(circuit1.jpg);
            background-size: cover;
            background-position: center;
            position: relative;
            height: auto; /* Set the desired height for the canvas background */
 
        }
        .regform h2{
            text-align: center;
        }
        .regi-form {
            max-width: 1200px;
            margin: 20px auto ;
            padding: 50px;
            align-items: center;
            align-content: center;
            /* border: 1px solid #ccc; */
            background-color:black;
            background-image: linear-gradient(to top right, rgb(61, 32, 176) ,rgb(61, 32, 176)  ,rgb(238, 101, 232), rgb(61, 32, 176) , rgb(61, 32, 176) );
            border-radius: 10px;
            color: white;
        }
        label{
        font-size: 14px;
        font-family: 'Cabin', sans-serif;
        font-family: 'Montserrat', sans-serif;
        /* font-family: 'Pixelify Sans', sans-serif; */
        }

        .form-group {
            margin-bottom: 50px;
        }

        .form-group label {
            font-weight: bold;
        }

        /* For screens with a maximum width of 450px (e.g. small screens) */
        @media all and (max-width: 650px) {
            .form-group {
                display: block;
                width: 100%; /* One input in a row for small screens */
            }
            .regi-form{
                margin: 20px;
            }
        }

        /* For screens with a minimum width of 451px and a maximum width of 800px */
        @media screen and (min-width: 651px) and (max-width: 1080px) {
            .form-group {
                display: inline-block;
                width: 45%; /* Two inputs in a row for medium screens */
            /*  margin-right: 5%; Adjust margin as needed for spacing */
            }
            .regi-form{
                margin: 20px;
            }
        }

        /* For screens with a minimum width of 801px and a maximum width of 1250px */
        @media screen and (min-width: 1081px) and (max-width: 1250px) {
            .form-group {
                display: inline-block;
                width: 30%; /* Three inputs in a row for large screens */
            }
            .regi-form{
                margin: 20px;
            }
        }

        @media all and (min-width: 1251px){
            .form-group {
                display: inline-block;
                width: 30%; /* Three inputs in a row for large screens */
            }
        }
            
    </style>
</head>

<body>
    <div class="rb">
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

    <div class="regform">
    
        <div class="regi-form">
        <h2><b>REGISTRATION</b></h2><br>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">        
        <div class="form-group">
                <label>STUDENT NAME</label>
                <input type="text" name="name"  required 
                oninvalid="this.setCustomValidity('Enter your Name')"
                oninput="this.setCustomValidity('')" 
                class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>"   value="<?php echo $name; ?>" >
                <span class="invalid-feedback"><?php echo $name_err; ?></span>
            </div>    &nbsp;&nbsp;
            <div class="form-group">
                <label>USERNAME</label>
                <input type="text" name="username" required 
                oninvalid="this.setCustomValidity('Enter a UserName Here')"
                oninput="this.setCustomValidity('')"  class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>
            &nbsp;&nbsp;
            <div class="form-group">
                <label>PASSWORD</label>
                <input type="password" name="password"  required 
                oninvalid="this.setCustomValidity('Enter a Password')"
                oninput="this.setCustomValidity('')" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>&nbsp;&nbsp;

            <div class="form-group">
                <label>CONFIRM PASSWORD</label>
                <input type="password"  required 
                oninvalid="this.setCustomValidity('Confirm the password')"
                oninput="this.setCustomValidity('')" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>&nbsp;&nbsp;

            <div class="form-group">
                <label>CONTACT NUMBER</label>
                <input type="text" name="phone" 
                required 
                oninvalid="this.setCustomValidity('Enter your phone number')"
                oninput="this.setCustomValidity('')" class="form-control <?php echo (!empty($phone_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $phone; ?>">
                <span class="invalid-feedback"><?php echo $phone_err; ?></span>
            </div>&nbsp;&nbsp;

            <div class="form-group">
                <label>EMAIL ID</label>
                <input type="email" name="email"  required 
                oninvalid="this.setCustomValidity('Enter your email address')"
                oninput="this.setCustomValidity('')" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>&nbsp;&nbsp;
           
            <div class="form-group">
                <label>REGISTRATION NUMBER</label>
                <input type="text" name="reg_no"  required 
                oninvalid="this.setCustomValidity('Enter your registration number')"
                oninput="this.setCustomValidity('')" class="form-control <?php echo (!empty($reg_no_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $reg_no; ?>">
                <span class="invalid-feedback"><?php echo $reg_no_err; ?></span>
            </div>&nbsp;&nbsp;

            <div class="form-group">
                <label>DEGREE</label>
                <select name="degree" id="degree" required 
                oninvalid="this.setCustomValidity('Select your degree')"
                oninput="this.setCustomValidity('')"class="form-control <?php echo (!empty($degree_err)) ? 'is-invalid' : ''; ?>">
                    <option value="" selected disabled>Select your degree</option>
                    <option value="MCA" <?php if ($degree === 'MCA') echo 'selected'; ?>>MCA</option>
                    <option value="ME" <?php if ($degree === 'ME') echo 'selected'; ?>>ME</option>
                    <option value="MTech" <?php if ($degree === 'MTech') echo 'selected'; ?>>MTech</option>
                    <option value="MSc" <?php if ($degree === 'MSc') echo 'selected'; ?>>MSc</option>
                    <option value="BE" <?php if ($degree === 'BE') echo 'selected'; ?>>BE</option>
                    <option value="BTech" <?php if ($degree === 'BTech') echo 'selected'; ?>>BTech</option>
                    <option value="Other" <?php if ($degree === 'Other') echo 'selected'; ?>>Other</option>
                </select>
                <span class="invalid-feedback"><?php echo $degree_err; ?></span>
            </div>

            <div class="form-group" id="otherDegreeField" >
                <label>OTHER </label>
                <input type="text" name="other_degree" class="form-control">
            </div>&nbsp;


            <div class="form-group">
                <label>STREAM</label>
                <input type="text" name="stream" class="form-control <?php echo (!empty($stream_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $stream; ?>">
                <span class="invalid-feedback"><?php echo $stream_err; ?></span>
            </div>&nbsp;&nbsp;

            <div class="form-group">
                <label>YEAR OF STUDY</label>
                <select name="year" required 
                oninvalid="this.setCustomValidity('Select your year of study')"
                oninput="this.setCustomValidity('')"class="form-control <?php echo (!empty($year_err)) ? 'is-invalid' : ''; ?>">
                    <option value="" selected disabled>Select Year</option>
                    <option value="1" <?php echo ($year == "1") ? "selected" : ""; ?>>1</option>
                    <option value="2" <?php echo ($year == "2") ? "selected" : ""; ?>>2</option>
                    <option value="3" <?php echo ($year == "3") ? "selected" : ""; ?>>3</option>
                    <option value="4" <?php echo ($year == "4") ? "selected" : ""; ?>>4</option>
                    <option value="5" <?php echo ($year == "5") ? "selected" : ""; ?>>5</option>
                </select>
                <span class="invalid-feedback"><?php echo $year_err; ?></span>
            </div>&nbsp;&nbsp;

            <div class="form-group">
                <label>COLLEGE NAME</label>
                <select type="text" name="college" required 
                oninvalid="this.setCustomValidity('Select your college')"
                oninput="this.setCustomValidity('')" id="college" class="form-control <?php echo (!empty($college_err)) ? 'is-invalid' : ''; ?>">
                    
                <option value="" selected disabled>Select your college</option>
                    <option value="A V S Engineering College, Salem" <?php if ($college === 'A V S Engineering College, Salem') echo 'selected'; ?>>A V S Engineering College, Salem</option>
                    <option value="Adithya Institute of Technology, Coimbatore" <?php if ($college === 'Adithya Institute of Technology, Coimbatore') echo 'selected'; ?>>Adithya Institute of Technology, Coimbatore</option>
                    <option value="Akshaya College of Engineering & Technology, Coimbatore" <?php if ($college === 'Akshaya College of Engineering & Technology, Coimbatore') echo 'selected'; ?>>Akshaya College of Engineering & Technology, Coimbatore</option>
                    <option value="Al-Ameen Engineering College (Autonomous), Erode" <?php if ($college === 'Al-Ameen Engineering College (Autonomous), Erode') echo 'selected'; ?>>Al-Ameen Engineering College (Autonomous), Erode</option>
                    <option value="ANNA UNIVERSITY REGIONAL CENTRE, COIMBATORE" <?php if ($college === 'ANNA UNIVERSITY REGIONAL CENTRE, COIMBATORE') echo 'selected'; ?>>ANNA UNIVERSITY REGIONAL CENTRE, COIMBATORE</option>
                    <option value="Angel College of Engineering and Technology, Tiruppur" <?php if ($college === 'Angel College of Engineering and Technology, Tiruppur') echo 'selected'; ?>>Angel College of Engineering and Technology, Tiruppur</option>
                    <option value="Annapoorana Engineering College (Autonomous), Salem" <?php if ($college === 'Annapoorana Engineering College (Autonomous), Salem') echo 'selected'; ?>>Annapoorana Engineering College (Autonomous), Salem</option>
                    <option value="Arjun College of Technology, Coimbatore" <?php if ($college === 'Arjun College of Technology, Coimbatore') echo 'selected'; ?>>Arjun College of Technology, Coimbatore</option>
                    <option value="Arulmurugan College of Engineering, Karur" <?php if ($college === 'Arulmurugan College of Engineering, Karur') echo 'selected'; ?>>Arulmurugan College of Engineering, Karur</option>
                    <option value="AVINASHILINGAM UNIVERSITY" <?php if ($college === 'AVINASHILINGAM UNIVERSITY') echo 'selected'; ?>>AVINASHILINGAM UNIVERSITY</option>
                    <option value="Asian College of Engineering and Technology, Coimbatore" <?php if ($college === 'Asian College of Engineering and Technology, Coimbatore') echo 'selected'; ?>>Asian College of Engineering and Technology, Coimbatore</option>
                    <option value="Bannari Amman Institute of Technology (Autonomous), Erode" <?php if ($college === 'Bannari Amman Institute of Technology (Autonomous), Erode') echo 'selected'; ?>>Bannari Amman Institute of Technology (Autonomous), Erode</option>                   
                    <option value="Bharathiyar Institute of Engineering for Women, Salem" <?php if ($college === 'Bharathiyar Institute of Engineering for Women, Salem') echo 'selected'; ?>>Bharathiyar Institute of Engineering for Women, Salem</option>
                    <option value="BHARATHIAR UNIVERSITY" <?php if ($college === 'BHARATHIAR UNIVERSITY') echo 'selected'; ?>>BHARATHIAR UNIVERSITY</option>
                    <option value="Builders Engineering College, Tiruppur" <?php if ($college === 'Builders Engineering College, Tiruppur') echo 'selected'; ?>>Builders Engineering College, Tiruppur</option>
                    <option value="Cherraan College of Technology, Tiruppur" <?php if ($college === 'Cherraan College of Technology, Tiruppur') echo 'selected'; ?>>Cherraan College of Technology, Tiruppur</option>
                    <option value="Christ The King Engineering College, Coimbatore" <?php if ($college === 'Christ The King Engineering College, Coimbatore') echo 'selected'; ?>>Christ The King Engineering College, Coimbatore</option>
                    <option value="C M S College of Engineering and Technology, Coimbatore" <?php if ($college === 'C M S College of Engineering and Technology, Coimbatore') echo 'selected'; ?>>C M S College of Engineering and Technology, Coimbatore</option>
                    <option value="Coimbatore Institute of Engineering and Technology (Autonomous), Coimbatore" <?php if ($college === 'Coimbatore Institute of Engineering and Technology (Autonomous), Coimbatore') echo 'selected'; ?>>Coimbatore Institute of Engineering and Technology (Autonomous), Coimbatore</option>
                    <option value="Coimbatore Institute of Technology (Autonomous), Coimbatore" <?php if ($college === 'Coimbatore Institute of Technology (Autonomous), Coimbatore') echo 'selected'; ?>>Coimbatore Institute of Technology (Autonomous), Coimbatore</option>
                    <option value="Dhanalakshmi Srinivasan College of Engineering, Coimbatore" <?php if ($college === 'Dhanalakshmi Srinivasan College of Engineering, Coimbatore') echo 'selected'; ?>>Dhanalakshmi Srinivasan College of Engineering, Coimbatore</option>
                    <option value="Dhaanish Ahmed Institute of Technology, Coimbatore" <?php if ($college === 'Dhaanish Ahmed Institute of Technology, Coimbatore') echo 'selected'; ?>>Dhaanish Ahmed Institute of Technology, Coimbatore</option>
                    <option value="Dhirajlal Gandhi College of Technology, Salem" <?php if ($college === 'Dhirajlal Gandhi College of Technology, Salem') echo 'selected'; ?>>Dhirajlal Gandhi College of Technology, Salem</option>
                    <option value="DR GR DAMODARAN COLLEGE OF SCIENCE" <?php if ($college === 'DR GR DAMODARAN COLLEGE OF SCIENCE') echo 'selected'; ?>>DR GR DAMODARAN COLLEGE OF SCIENCE</option>
                    <option value="DR MAHALINGAM COLLEGE OF ENGINEERING AND TECHNOLOGY" <?php if ($college === 'DR MAHALINGAM COLLEGE OF ENGINEERING AND TECHNOLOGY') echo 'selected'; ?>>DR MAHALINGAM COLLEGE OF ENGINEERING AND TECHNOLOGY</option>
                    <option value="Dr.NGP Arts and science" <?php if ($college === 'Dr.NGP Arts and science') echo 'selected'; ?>>DR.NGP ARTS AND SCIENCE</option>
                    <option value="Dr. NGP Institute Of Technology, Coimbatore" <?php if ($college === 'Dr. NGP Institute Of Technology, Coimbatore') echo 'selected'; ?>>DR. NGP INSTITUTE OF TECHNOLOGY, COIMBATORE</option>
                    <option value="Dr.SNS Rajalakshmi College of Arts and Science" <?php if ($college === 'Dr.SNS Rajalakshmi College of Arts and Science') echo 'selected'; ?>>DR.SNS RAJALAKSHMI COLLEGE OF ARTS AND SCIENCE</option>
                    <option value="Easa College of Engineering and Technology, Coimbatore" <?php if ($college === 'Easa College of Engineering and Technology, Coimbatore') echo 'selected'; ?>>Easa College of Engineering and Technology, Coimbatore</option>
                    <option value="Excel Engineering College (Autonomous), Namakkal" <?php if ($college === 'Excel Engineering College (Autonomous), Namakkal') echo 'selected'; ?>>Excel Engineering College (Autonomous), Namakkal</option>
                    <option value="GOVERNMENT ARTS COLLEGE" <?php if ($college === 'GOVERNMENT ARTS COLLEGE') echo 'selected'; ?>>GOVERNMENT ARTS COLLEGE</option>
                    <option value="Government College of Technology" <?php if ($college === 'Government College of Technology') echo 'selected'; ?>>GOVERNMENT COLLEGE OF TECHNOLOGY</option>
                    <option value="Ganesh College of Engineering, Salem" <?php if ($college === 'Ganesh College of Engineering, Salem') echo 'selected'; ?>>Ganesh College of Engineering, Salem</option>
                    <option value="Gnanamani College of Technology, Namakkal" <?php if ($college === 'Gnanamani College of Technology, Namakkal') echo 'selected'; ?>>Gnanamani College of Technology, Namakkal</option>
                    <option value="Government College of Engineering, Erode (formerly Institute of Road and Transport Technology)" <?php if ($college === 'Government College of Engineering, Erode (formerly Institute of Road and Transport Technology)') echo 'selected'; ?>>Government College of Engineering, Erode (formerly Institute of Road and Transport Technology)</option>
                    <option value="Government College of Engineering, Salem (Autonomous)" <?php if ($college === 'Government College of Engineering, Salem (Autonomous)') echo 'selected'; ?>>Government College of Engineering, Salem (Autonomous)</option>
                    <option value="Hindusthan College Of Arts And Science, Coimbatore" <?php if ($college === 'Hindusthan College Of Arts And Science, Coimbatore') echo 'selected'; ?>>HINDUSTHAN COLLEGE OF ARTS AND SCIENCE, COIMBATORE</option>
                    <option value="J K K Munirajah College of Technology, Erode" <?php if ($college === 'J K K Munirajah College of Technology, Erode') echo 'selected'; ?>>J K K Munirajah College of Technology, Erode</option>
                    <option value="Jai Shriram Engineering College, Tiruppur" <?php if ($college === 'Jai Shriram Engineering College, Tiruppur') echo 'selected'; ?>>Jai Shriram Engineering College, Tiruppur</option>
                    <option value="Jairupaa College of Engineering, Tiruppur" <?php if ($college === 'Jairupaa College of Engineering, Tiruppur') echo 'selected'; ?>>Jairupaa College of Engineering, Tiruppur</option>
                    <option value="Jansons Institute of Technology, Coimbatore" <?php if ($college === 'Jansons Institute of Technology, Coimbatore') echo 'selected'; ?>>Jansons Institute of Technology, Coimbatore</option>
                    <option value="K P R Institute of Engineering and Technology (Autonomous), Coimbatore" <?php if ($college === 'K P R Institute of Engineering and Technology (Autonomous), Coimbatore') echo 'selected'; ?>>K P R Institute of Engineering and Technology (Autonomous), Coimbatore</option>
                    <option value="Kathir College of Engineering, Coimbatore" <?php if ($college === 'Kathir College of Engineering, Coimbatore') echo 'selected'; ?>>Kathir College of Engineering, Coimbatore</option>
                    <option value="KARPAGAM ACADEMY OF HIGHER EDUCATION" <?php if ($college === 'KARPAGAM ACADEMY OF HIGHER EDUCATION') echo 'selected'; ?>>KARPAGAM ACADEMY OF HIGHER EDUCATION</option>
                    <option value="KGISL INSTITUTE OF INFORMATION MANAGEMENT" <?php if ($college === 'KGISL INSTITUTE OF INFORMATION MANAGEMENT') echo 'selected'; ?>>KGISL INSTITUTE OF INFORMATION MANAGEMENT</option>
                    <option value="Kalaignar karunanidhi Institute of Technology" <?php if ($college === 'Kalaignar karunanidhi Institute of Technology') echo 'selected'; ?>>KALAIGNAR KARUNANIDHI INSTITUTE OF TECHNOLOGY</option>
                    <option value="Karpagam College of Engineering (Autonomous) ,Coimbatore" <?php if ($college === 'Karpagam College of Engineering (Autonomous) ,Coimbatore') echo 'selected'; ?>>KARPAGAM COLLEGE OF ENGINEERING (AUTONOMOUS) ,COIMBATORE</option>
                    <option value="Karpagam Institute of Technology,Coimbatore" <?php if ($college === 'Karpagam Institute of Technology,Coimbatore') echo 'selected'; ?>>KARPAGAM INSTITUTE OF TECHNOLOGY,COIMBATORE</option>
                    <option value="Knowledge Institute of Technology, Salem" <?php if ($college === 'Knowledge Institute of Technology, Salem') echo 'selected'; ?>>KNOWLEDGE INSTITUTE OF TECHNOLOGY, SALEM</option>
                    <option value="Kongu Engineering College, Erode" <?php if ($college === 'Kongu Engineering College, Erode') echo 'selected'; ?>>KONGU ENGINEERING COLLEGE, ERODE</option>
                    <option value="Kumaraguru College of Technology" <?php if ($college === 'Kumaraguru College of Technology') echo 'selected'; ?>>KUMARAGURU COLLEGE OF TECHNOLOGY</option>
                    <option value="Kongu Engineering College (Autonomous), Erode" <?php if ($college === 'Kongu Engineering College (Autonomous), Erode') echo 'selected'; ?>>Kongu Engineering College (Autonomous), Erode</option>
                    <option value="M. Kumarasamy College of Engineering (Autonomous), Karur" <?php if ($college === 'M. Kumarasamy College of Engineering (Autonomous), Karur') echo 'selected'; ?>>M. Kumarasamy College of Engineering (Autonomous), Karur</option>
                    <option value="Mahendra College of Engineering, Salem" <?php if ($college === 'Mahendra College of Engineering, Salem') echo 'selected'; ?>>Mahendra College of Engineering, Salem</option>
                    <option value="Mahendra Engineering College for Women, Namakkal" <?php if ($college === 'Mahendra Engineering College for Women, Namakkal') echo 'selected'; ?>>Mahendra Engineering College for Women, Namakkal</option>
                    <option value="Muthayammal College of Engineering, Namakkal" <?php if ($college === 'Muthayammal College of Engineering, Namakkal') echo 'selected'; ?>>Muthayammal College of Engineering, Namakkal</option>
                    <option value="N.S.N College of Engineering and Technology, Karur" <?php if ($college === 'N.S.N College of Engineering and Technology, Karur') echo 'selected'; ?>>N.S.N College of Engineering and Technology, Karur</option>
                    <option value="Nandha College of Technology, Erode" <?php if ($college === 'Nandha College of Technology, Erode') echo 'selected'; ?>>Nandha College of Technology, Erode</option>
                    <option value="Nandha Engineering College (Autonomous), Erode" <?php if ($college === 'Nandha Engineering College (Autonomous), Erode') echo 'selected'; ?>>Nandha Engineering College (Autonomous), Erode</option>
                    <option value="Nallamuthu Gounder Mahalingam College, Pollachi" <?php if ($college === 'Nallamuthu Gounder Mahalingam College, Pollachi') echo 'selected'; ?>>NALLAMUTHU GOUNDER MAHALINGAM COLLEGE, POLLACHI</option>
                    <option value="NEHRU COLLEGE OF MANAGEMENT" <?php if ($college === 'NEHRU COLLEGE OF MANAGEMENT') echo 'selected'; ?>>NEHRU COLLEGE OF MANAGEMENT</option>
                    <option value="P A College of Engineering and Technology (Autonomous), Coimbatore" <?php if ($college === 'P A College of Engineering and Technology (Autonomous), Coimbatore') echo 'selected'; ?>>P A College of Engineering and Technology (Autonomous), Coimbatore</option>
                    <option value="P.G.P. College of Engineering and Technology, Namakkal" <?php if ($college === 'P.G.P. College of Engineering and Technology, Namakkal') echo 'selected'; ?>>P.G.P. College of Engineering and Technology, Namakkal</option>
                    <option value="Paavai College of Engineering, Namakkal" <?php if ($college === 'Paavai College of Engineering, Namakkal') echo 'selected'; ?>>Paavai College of Engineering, Namakkal</option>
                    <option value="Paavai Engineering College (Autonomous), Namakkal" <?php if ($college === 'Paavai Engineering College (Autonomous), Namakkal') echo 'selected'; ?>>Paavai Engineering College (Autonomous), Namakkal</option>
                    <option value="Pollachi Institute of Engineering and Technology, Coimbatore" <?php if ($college === 'Pollachi Institute of Engineering and Technology, Coimbatore') echo 'selected'; ?>>Pollachi Institute of Engineering and Technology, Coimbatore</option>
                    <option value="PIONEER COLLEGE OF ARTS AND SCIENCE" <?php if ($college === 'PIONEER COLLEGE OF ARTS AND SCIENCE') echo 'selected'; ?>>PIONEER COLLEGE OF ARTS AND SCIENCE</option>
                    <option value="PSG COLLEGE OF ARTS AND SCIENCE" <?php if ($college === 'PSG COLLEGE OF ARTS AND SCIENCE') echo 'selected'; ?>>PSG COLLEGE OF ARTS AND SCIENCE</option>
                    <option value="PSG COLLEGE OF TECHNOLOGY" <?php if ($college === 'PSG COLLEGE OF TECHNOLOGY') echo 'selected'; ?>>PSG COLLEGE OF TECHNOLOGY</option>
                    <option value="PSGR KRISHNAMMAL COLLEGE FOR WOMEN" <?php if ($college === 'PSGR KRISHNAMMAL COLLEGE FOR WOMEN') echo 'selected'; ?>>PSGR KRISHNAMMAL COLLEGE FOR WOMEN</option>
                    <option value="Park College of Engineering and Technology" <?php if ($college === 'Park College of Engineering and Technology') echo 'selected'; ?>>PARK COLLEGE OF ENGINEERING AND TECHNOLOGY</option>
                    <option value="R P Sarathy Institute of Technology (formerly Narasu's Sarathy Institute of Technology), Salem" <?php if ($college === "R P Sarathy Institute of Technology (formerly Narasu's Sarathy Institute of Technology), Salem") echo 'selected'; ?>>R P Sarathy Institute of Technology (formerly Narasu's Sarathy Institute of Technology), Salem</option>
                    <option value="RATHINAM TECHNICAL CAMPUS" <?php if ($college === 'RATHINAM TECHNICAL CAMPUS') echo 'selected'; ?>>RATHINAM TECHNICAL CAMPUS</option>
                    <option value="RVS COLLEGE OF ENGINEERING AND TECHNOLOGY" <?php if ($college === 'RVS COLLEGE OF ENGINEERING AND TECHNOLOGY') echo 'selected'; ?>>RVS COLLEGE OF ENGINEERING AND TECHNOLOGY</option>
                    <option value="Sasurie College of Engineering, Tiruppur" <?php if ($college === 'Sasurie College of Engineering, Tiruppur') echo 'selected'; ?>>Sasurie College of Engineering, Tiruppur</option>
                    <option value="Sengunthar Engineering College (Autonomous), Namakkal" <?php if ($college === 'Sengunthar Engineering College (Autonomous), Namakkal') echo 'selected'; ?>>Sengunthar Engineering College (Autonomous), Namakkal</option>
                    <option value="Shree Sathyam College of Engineering and Technology, Salem" <?php if ($college === 'Shree Sathyam College of Engineering and Technology, Salem') echo 'selected'; ?>>Shree Sathyam College of Engineering and Technology, Salem</option>
                    <option value="Shree Venkateshwara Hi-tech Engineering College, Erode" <?php if ($college === 'Shree Venkateshwara Hi-tech Engineering College, Erode') echo 'selected'; ?>>Shree Venkateshwara Hi-tech Engineering College, Erode</option>
                    <option value="Sona College of Technology (Autonomous), Salem" <?php if ($college === 'Sona College of Technology (Autonomous), Salem') echo 'selected'; ?>>Sona College of Technology (Autonomous), Salem</option>
                    <option value="Sree Sakthi Engineering College, Coimbatore" <?php if ($college === 'Sree Sakthi Engineering College, Coimbatore') echo 'selected'; ?>>Sree Sakthi Engineering College, Coimbatore</option>
                    <option value="Sri Eshwar College of Engineering (Autonomous), Coimbatore" <?php if ($college === 'Sri Eshwar College of Engineering (Autonomous), Coimbatore') echo 'selected'; ?>>Sri Eshwar College of Engineering (Autonomous), Coimbatore</option>
                    <option value="Sri Krishna College of Engineering & Technology (Autonomous), Coimbatore" <?php if ($college === 'Sri Krishna College of Engineering & Technology (Autonomous), Coimbatore') echo 'selected'; ?>>Sri Krishna College of Engineering & Technology (Autonomous), Coimbatore</option>
                    <option value="Sri Krishna College of Technology (Autonomous), Coimbatore" <?php if ($college === 'Sri Krishna College of Technology (Autonomous), Coimbatore') echo 'selected'; ?>>Sri Krishna College of Technology (Autonomous), Coimbatore</option>
                    <option value="SRI RAMAKRISHANA ENGINEERING COLLEGE" <?php if ($college === 'SRI RAMAKRISHANA ENGINEERING COLLEGE') echo 'selected'; ?>>SRI RAMAKRISHANA ENGINEERING COLLEGE</option>
                    <option value="Sri Ramakrishna Institute of Technology (Autonomous), Coimbatore" <?php if ($college === 'Sri Ramakrishna Institute of Technology (Autonomous), Coimbatore') echo 'selected'; ?>>Sri Ramakrishna Institute of Technology (Autonomous), Coimbatore</option>
                    <option value="Sri Ranganthar Institute of Engineering and Technology, Coimbatore" <?php if ($college === 'Sri Ranganthar Institute of Engineering and Technology, Coimbatore') echo 'selected'; ?>>Sri Ranganthar Institute of Engineering and Technology, Coimbatore</option>
                    <option value="Sri Sai Ranganathan Engineering College, Coimbatore" <?php if ($college === 'Sri Sai Ranganathan Engineering College, Coimbatore') echo 'selected'; ?>>Sri Sai Ranganathan Engineering College, Coimbatore</option>
                    <option value="Sri Shakthi Institute of Engineering and Technology (Autonomous), Coimbatore" <?php if ($college === 'Sri Shakthi Institute of Engineering and Technology (Autonomous), Coimbatore') echo 'selected'; ?>>Sri Shakthi Institute of Engineering and Technology (Autonomous), Coimbatore</option>
                    <option value="Sri Shanmugha College of Engineering and Technology, Salem" <?php if ($college === 'Sri Shanmugha College of Engineering and Technology, Salem') echo 'selected'; ?>>Sri Shanmugha College of Engineering and Technology, Salem</option>
                    <option value="Sri Venkateswara College of Computer Applications & Management, Coimbatore" <?php if ($college === 'Sri Venkateswara College of Computer Applications & Management, Coimbatore') echo 'selected'; ?>>Sri Venkateswara College of Computer Applications & Management, Coimbatore</option>
                    <option value="Sri Venkateswara Institute of Information Technology and Management, Coimbatore" <?php if ($college === 'Sri Venkateswara Institute of Information Technology and Management, Coimbatore') echo 'selected'; ?>>Sri Venkateswara Institute of Information Technology and Management, Coimbatore</option>
                    <option value="Suguna College of Engineering, Coimbatore" <?php if ($college === 'Suguna College of Engineering, Coimbatore') echo 'selected'; ?>>Suguna College of Engineering, Coimbatore</option>
                    <option value="Surya Engineering College, Erode" <?php if ($college === 'Surya Engineering College, Erode') echo 'selected'; ?>>Surya Engineering College, Erode</option>
                    <option value="SNS COLLEGE OF ENGINEERING" <?php if ($college === 'SNS COLLEGE OF ENGINEERING') echo 'selected'; ?>>SNS COLLEGE OF ENGINEERING</option>
                    <option value="SNS COLLEGE OF TECHNOLOGY" <?php if ($college === 'SNS COLLEGE OF TECHNOLOGY') echo 'selected'; ?>>SNS COLLEGE OF TECHNOLOGY</option>
                    <option value="Sankara College of Science and Commerce" <?php if ($college === 'Sankara College of Science and Commerce') echo 'selected'; ?>>SANKARA COLLEGE OF SCIENCE AND COMMERCE</option>
                    <option value="TAMILNADU COLLEGE OF ENGINEERING" <?php if ($college === 'TAMILNADU COLLEGE OF ENGINEERING') echo 'selected'; ?>>TAMILNADU COLLEGE OF ENGINEERING</option>    
                    <option value="Tagore Institute of Engineering and Technology, Salem" <?php if ($college === 'Tagore Institute of Engineering and Technology, Salem') echo 'selected'; ?>>Tagore Institute of Engineering and Technology, Salem</option>
                    <option value="The Kavery Engineering College, Salem" <?php if ($college === 'The Kavery Engineering College, Salem') echo 'selected'; ?>>The Kavery Engineering College, Salem</option>
                    <option value="United Institute of Technology, Coimbatore" <?php if ($college === 'United Institute of Technology, Coimbatore') echo 'selected'; ?>>United Institute of Technology, Coimbatore</option>
                    <option value="V S A Group of Institutions, Salem" <?php if ($college === 'V S A Group of Institutions, Salem') echo 'selected'; ?>>V S A Group of Institutions, Salem</option>
                    <option value="Vasavi Vidya Trust Group of Institutions, Salem" <?php if ($college === 'Vasavi Vidya Trust Group of Institutions, Salem') echo 'selected'; ?>>Vasavi Vidya Trust Group of Institutions, Salem</option>
                    <option value="Velalar College of Engineering and Technology (Autonomous), Erode" <?php if ($college === 'Velalar College of Engineering and Technology (Autonomous), Erode') echo 'selected'; ?>>Velalar College of Engineering and Technology (Autonomous), Erode</option>
                    <option value="Vidyaa Vikas College of Engineering and Technology, Namakkal" <?php if ($college === 'Vidyaa Vikas College of Engineering and Technology, Namakkal') echo 'selected'; ?>>Vidyaa Vikas College of Engineering and Technology, Namakkal</option>
                    <option value="Vivekanandha College of Engineering for Women (Autonomous), Namakkal" <?php if ($college === 'Vivekanandha College of Engineering for Women (Autonomous), Namakkal') echo 'selected'; ?>>Vivekanandha College of Engineering for Women (Autonomous), Namakkal</option>
                    <option value="Vivekanandha College of Technology for Women, Namakkal" <?php if ($college === 'Vivekanandha College of Technology for Women, Namakkal') echo 'selected'; ?>>Vivekanandha College of Technology for Women, Namakkal</option>
                    <option value="V.L.B. Janakiammal College of Arts and Science" <?php if ($college === 'V.L.B. Janakiammal College of Arts and Science') echo 'selected'; ?>>V.L.B. JANAKIAMMAL COLLEGE OF ARTS AND SCIENCE</option>
                    <option value="V.S.B. College of Engineering Technical Campus, Coimbatore" <?php if ($college === 'V.S.B. College of Engineering Technical Campus, Coimbatore') echo 'selected'; ?>>V.S.B. College of Engineering Technical Campus, Coimbatore</option>
                    <option value="V.S.B. Engineering College (Autonomous), Karur" <?php if ($college === 'V.S.B. Engineering College (Autonomous), Karur') echo 'selected'; ?>>V.S.B. Engineering College (Autonomous), Karur</option>
                    <option value="Vishnu Lakshmi College of Engineering and Technology, Coimbatore" <?php if ($college === 'Vishnu Lakshmi College of Engineering and Technology, Coimbatore') echo 'selected'; ?>>Vishnu Lakshmi College of Engineering and Technology, Coimbatore</option>
                    <option value="Other" <?php if ($college === 'Other') echo 'selected'; ?>>OTHER</option>
                </select>
                <span class="invalid-feedback"><?php echo $college_err; ?></span>
            </div>

            <div class="form-group" id="otherCollegeField" style="display: none;">
                <label>OTHER </label>
                <input type="text" name="other_college" class="form-control">
            </div>
            &nbsp;&nbsp;

            <div class="form-group">
                <label>GENDER</label>
                <select name="gender" required 
                oninvalid="this.setCustomValidity('Select your gender')"
                oninput="this.setCustomValidity('')" class="form-control <?php echo (!empty($gender_err)) ? 'is-invalid' : ''; ?>">
                    <option value="" selected disabled>Select your gender</option>
                    <option value="Male" <?php if ($gender === 'Male') echo 'selected'; ?>>Male</option>
                    <option value="Female" <?php if ($gender === 'Female') echo 'selected'; ?>>Female</option>
                </select>
                <span class="invalid-feedback"><?php echo $gender_err; ?></span>
            </div>&nbsp;&nbsp;

            <div class="form-group">
                <label>FOOD PREFERENCE</label>
                <select name="food_preference" required 
                oninvalid="this.setCustomValidity('Select your food preference')"
                oninput="this.setCustomValidity('')" class="form-control <?php echo (!empty($food_preference_err)) ? 'is-invalid' : ''; ?>">
                    <option value="" selected disabled>Select your food preference</option>
                    <option value="Veg" <?php if ($food_preference === 'Veg') echo 'selected'; ?>>Vegetarian (Veg)</option>
                    <option value="NonVeg" <?php if ($food_preference === 'NonVeg') echo 'selected'; ?>>Non-Vegetarian (Non-Veg)</option>
                </select>
                <span class="invalid-feedback"><?php echo $food_preference_err; ?></span>
            </div><br><br> &nbsp;&nbsp;
            
            <div class="form-group">
                <label> SCAN AND PAY</label>
                <img src="payment.jpg" alt="payment"style="width: 300px; ">
            </div><br><br> &nbsp;&nbsp;

            <div class="form-group">
                <label>TRANSACTION NUMBER</label>
                <input type="text" name="transaction_number"  required 
                oninvalid="this.setCustomValidity('Enter your transaction number')"
                oninput="this.setCustomValidity('')"  class="form-control <?php echo (!empty($transaction_number_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $transaction_number; ?>">
                <span class="invalid-feedback"><?php echo $transaction_number_err; ?></span>
            </div> &nbsp;&nbsp;

            <div class="form-group">
                <label>PAYMENT RECEIPT</label>
                <input type="file" name="image"  required 
                oninvalid="this.setCustomValidity('Attach your payment receipt')"
                oninput="this.setCustomValidity('')" class="form-control <?php echo (!empty($image_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><br><?php echo $image_err; ?></span>
            </div><br>&nbsp;&nbsp;

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>&nbsp;&nbsp;

            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
        <hr style="height:2px;border-width:0;color:white;background-color:white">
        <ul>
        <p><b>For any queries related to registration participants can contact.</b></p>
            <li><b> RISHI KUMAR N - 75985 96904</b> </li>
            <li><b> VIGNESHWARAN S - 93459 02954</b> </li>
        </ul>
        <hr style="height:2px;border-width:0;color:white;background-color:white">
    </div>
    </div>
    </div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const degreeSelect = document.querySelector('select[name="degree"]');
        const otherDegreeField = document.querySelector('#otherDegreeField');

        degreeSelect.addEventListener('change', function () {
            if (degreeSelect.value === 'Other') {
                otherDegreeField.style.display = 'block';
            } else {
                otherDegreeField.style.display = 'none';
            }
        });

        // Initialize the display based on the initial selection
        if (degreeSelect.value === 'Other') {
            otherDegreeField.style.display = 'block';
        } else {
            otherDegreeField.style.display = 'none';
        }
    });

    document.addEventListener('DOMContentLoaded', function () {
        const collegeSelect = document.querySelector('select[name="college"]');
        const otherCollegeField = document.querySelector('#otherCollegeField');

        collegeSelect.addEventListener('change', function () {
            if (collegeSelect.value === 'Other') {
                otherCollegeField.style.display = 'block';
            } else {
                otherCollegeField.style.display = 'none';
            }
        });

        // Initialize the display based on the initial selection
        if (collegeSelect.value === 'Other') {
            otherCollegeField.style.display = 'block';
        } else {
            otherCollegeField.style.display = 'none';
        }
    });
    // Get the transaction number input element
    const transactionNumberInput = document.querySelector('input[name="transaction_number"]');

    // Add an input event listener to restrict non-numeric input
    transactionNumberInput.addEventListener('input', function () {
        // Remove non-numeric characters from the input
        this.value = this.value.replace(/\D/g, '');
    });
    oninput="setCustomValidity('')"
</script>
</html>
