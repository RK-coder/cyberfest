<?php
// Include config file
require_once "db.php";

// Define variables and initialize with empty values
$name = $username = $password = $confirm_password = $phone = $degree = $stream = $year = $college = $gender = $food_preference = $image_name = $image_data = "";
$name_err = $username_err = $password_err = $confirm_password_err = $phone_err = $degree_err = $stream_err = $year_err = $college_err = $gender_err = $food_preference_err = $image_err = "";

// Processing form data when form is submitted 
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate Input Name
    if (empty(trim($_POST["name"]))) {
        $name_err = "Please enter an name.";
    } else {
        $name = trim($_POST["name"]);
    }
    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))) {
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM user WHERE username = ?";

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
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have at least 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Password did not match.";
        }
    }
    // Validate phone number
    if (empty(trim($_POST["phone"]))) {
        $phone_err = "Please enter your phone number.";
    } elseif (!is_numeric(trim($_POST["phone"]))) {
        $phone_err = "Phone number must contain only numbers.";
    } else {
        $phone = trim($_POST["phone"]);
    }

    /* Validate department
    if (empty(trim($_POST["department"]))) {
        $department_err = "Please enter your department.";
    } else {
        $department = trim($_POST["department"]);
    }*/
    // Validate Degree
    if (empty(trim($_POST["degree"]))) {
        $degree_err = "Please select your degree.";
    } else {
        $degree = trim($_POST["degree"]);
    }

    // Validate Stream (optional)
    if ($degree !== "Other" && empty(trim($_POST["stream"]))) {
        $stream_err = "Please enter your stream.";
    } else {
        $stream = trim($_POST["stream"]);
    }

    // Validate year
    if (empty(trim($_POST["year"]))) {
        $year_err = "Please enter your year.";
    } else {
        $year = trim($_POST["year"]);
    }

    // Validate college
    if (empty(trim($_POST["college"]))) {
        $college_err = "Please enter your college.";
    } else {
        $college = trim($_POST["college"]);
    }
    // Validate Gender
    if (empty(trim($_POST["gender"]))) {
        $gender_err = "Please select your gender.";
    } else {
        $gender = trim($_POST["gender"]);
    }

    // Validate Food Preference
    if (empty(trim($_POST["food_preference"]))) {
        $food_preference_err = "Please select your food preference.";
    } else {
        $food_preference = trim($_POST["food_preference"]);
    }

    
    // Check if an image file was uploaded
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] === 0) {
        $image_name = $_FILES["image"]["name"];
        $image_data = file_get_contents($_FILES["image"]["tmp_name"]);
        
        // Check the file extension
        $allowed_extensions = array("jpg", "jpeg", "png");
        $file_extension = pathinfo($image_name, PATHINFO_EXTENSION);
        
        if (!in_array(strtolower($file_extension), $allowed_extensions)) {
            $image_err = "Only JPG, JPEG, and PNG files are allowed.";
        }
    } else {
        $image_err = "Please select an image file.";
    }
    // Check input errors before inserting in the database
    if (empty($name_err) && empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($degree_err) && empty($stream_err) && empty($year_err) && empty($college_err) && empty($gender_err) && empty($food_preference_err) && empty($image_err) ) {

        // Prepare an insert statement
        $sql = "INSERT INTO user (name, username, password, confirm_password, phone, degree, stream, year, college, gender, food_preference, image_name, image_data) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssssssss", $param_name, $param_username, $param_password, $param_confirm_password, $param_phone, $param_degree, $param_stream, $param_year, $param_college, $param_gender, $param_food_preference, $param_image_name, $param_image_data);

            // Set parameters
            $param_name = $name;
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_confirm_password = ($confirm_password);
            $param_phone = $phone;
            $param_degree = $degree;
            $param_stream = $stream;
            $param_year = $year;
            $param_college = $college;
            $param_gender = $gender;
            $param_food_preference = $food_preference;
            $param_image_name = $image_name;
            $param_image_data = $image_data;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to login page
                echo '<script>alert("Registration successful. You can now log in.");';
                echo 'window.location.href = "login.php";</script>';
            } else {
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
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font: 14px sans-serif;
        }

        .wrapper {
            width: 360px;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">        <div class="form-group">
                <label>Input Name</label>
                <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                <span class="invalid-feedback"><?php echo $name_err; ?></span>
            </div>    
        <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Phone Number</label>
                <input type="text" name="phone" class="form-control <?php echo (!empty($phone_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $phone; ?>">
                <span class="invalid-feedback"><?php echo $phone_err; ?></span>
            </div>
            <div class="form-group">
                <label>Degree</label>
                <select name="degree" id="degree" class="form-control <?php echo (!empty($degree_err)) ? 'is-invalid' : ''; ?>">
                    <option value="" selected disabled>Select your degree</option>
                    <option value="MCA" <?php if ($degree === 'MCA') echo 'selected'; ?>>MCA</option>
                    <option value="ME" <?php if ($degree === 'ME') echo 'selected'; ?>>ME</option>
                    <option value="MTech" <?php if ($degree === 'MTech') echo 'selected'; ?>>MTech</option>
                    <option value="Other" <?php if ($degree === 'Other') echo 'selected'; ?>>Other</option>
                </select>
                <span class="invalid-feedback"><?php echo $degree_err; ?></span>
            </div>

            <div class="form-group" id="otherField" style="display: none;">
                <label>Other Degree</label>
                <input type="text" name="other_degree" class="form-control">
            </div>

            <div class="form-group">
                <label>Stream</label>
                <input type="text" name="stream" class="form-control <?php echo (!empty($stream_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $stream; ?>">
                <span class="invalid-feedback"><?php echo $stream_err; ?></span>
            </div>
            <div class="form-group">
                <label>Year</label>
                <select name="year" class="form-control <?php echo (!empty($year_err)) ? 'is-invalid' : ''; ?>">
                    <option value="">Select Year</option>
                    <option value="1" <?php echo ($year == "1") ? "selected" : ""; ?>>1</option>
                    <option value="2" <?php echo ($year == "2") ? "selected" : ""; ?>>2</option>
                    <option value="3" <?php echo ($year == "3") ? "selected" : ""; ?>>3</option>
                    <option value="4" <?php echo ($year == "4") ? "selected" : ""; ?>>4</option>
                    <option value="5" <?php echo ($year == "5") ? "selected" : ""; ?>>5</option>
                </select>
                <span class="invalid-feedback"><?php echo $year_err; ?></span>
            </div>
            <div class="form-group">
                <label>College</label>
                <input type="text" name="college" class="form-control <?php echo (!empty($college_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $college; ?>">
                <span class="invalid-feedback"><?php echo $college_err; ?></span>
            </div>
            <div class="form-group">
                <label>Gender</label>
                <select name="gender" class="form-control <?php echo (!empty($gender_err)) ? 'is-invalid' : ''; ?>">
                    <option value="" selected disabled>Select your gender</option>
                    <option value="Male" <?php if ($gender === 'Male') echo 'selected'; ?>>Male</option>
                    <option value="Female" <?php if ($gender === 'Female') echo 'selected'; ?>>Female</option>
                </select>
                <span class="invalid-feedback"><?php echo $gender_err; ?></span>
            </div>

            <div class="form-group">
                <label>Food Preference</label>
                <select name="food_preference" class="form-control <?php echo (!empty($food_preference_err)) ? 'is-invalid' : ''; ?>">
                    <option value="" selected disabled>Select your food preference</option>
                    <option value="Veg" <?php if ($food_preference === 'Veg') echo 'selected'; ?>>Vegetarian (Veg)</option>
                    <option value="NonVeg" <?php if ($food_preference === 'NonVeg') echo 'selected'; ?>>Non-Vegetarian (Non-Veg)</option>
                </select>
                <span class="invalid-feedback"><?php echo $food_preference_err; ?></span>
            </div>
            <div class="form-group">
                <label>Upload Image</label>
                <input type="file" name="image" class="form-control <?php echo (!empty($image_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $image_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const degreeSelect = document.querySelector('select[name="degree"]');
        const otherField = document.querySelector('#otherField');

        degreeSelect.addEventListener('change', function () {
            if (degreeSelect.value === 'Other') {
                otherField.style.display = 'block';
            } else {
                otherField.style.display = 'none';
            }
        });

        // Initialize the display based on the initial selection
        if (degreeSelect.value === 'Other') {
            otherField.style.display = 'block';
        } else {
            otherField.style.display = 'none';
        }
    });
</script>


</html>
