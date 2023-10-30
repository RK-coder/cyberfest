<?php
include "db_conn.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approval</title>
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="topnav" id="myTopnav">
        <br>
        <div class="row">
            <img src="images/cit_logo.webp" height="100px" width="100px" style="border-radius: 50px; display: block; margin: 30px;">
            <h2 style="margin-top: 65px;">Coimbatore Institute Of Technology</h2>
        </div>
        <img src="images/LOGOS-03.png" height="180px" width="300px" style="border-radius: 50px; float: right; margin-top: -167px;">
        <hr style="border: 2px solid aliceblue;">
        <a href="about.php">About</a>
        <a href="approvel.php" class="active">Approval Area</a>
        <a href="event1.php">Quantum Quest</a>
        <a href="event2.php">Fun Forum</a>
        <a href="event3.php">Logic Lore</a>
        <a href="event4.php">Maze Runners</a>
        <a href="event5.php">Idea Launch</a>
        <a href="event6.php">Stickeez Mate</a>
        <a href="event7.php">Shutter Spectrum</a>
        <a class="text-dark active" style="float: right; font-weight: 700;">Logout</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
    <hr style="border: 2px solid aliceblue; margin-top: -0px;">
    <div class="container-fluid">
        <br><br>
        <table class="table table-bordered table-dark">
            <thead>
                <tr>
                    <th>Clg.Regno</th>
                    <th>Name</th>
                    <th>College Name</th>
                    <th>Image Name</th>
                    <th>Image</th>
                    <th>Transaction Number</th>
                    <th>Approve</th>
                </tr>
            </thead>
            <?php
            $query = "SELECT r.*, re.* FROM register r, registrations re WHERE r.id=re.id GROUP BY re.id";
            $data = mysqli_query($conn, $query);
            while ($rows = mysqli_fetch_array($data)) {
                ?>
                <tbody>
                <tr>
                    <td><?php echo $rows['reg_no']; ?></td>
                    <td><?php echo $rows['name']; ?></td>
                    <td><?php echo $rows['college']; ?></td>
                    <td><?php echo $rows['image_name']; ?></td>
                    <td>
                        <?php
                        if (!empty($rows['image_data'])) {
                            $imageData = base64_encode($rows['image_data']);
                            $imageFormat = $rows['image_format'];
                            $imageSrc = "data:image/{$imageFormat};base64,{$imageData}";
                            echo "<img src='{$imageSrc}' alt='User Image' width='100' height='100'>";
                        } else {
                            echo "No Image";
                        }
                        ?>
                    </td>
                    <td><?php echo $rows['transaction_number']; ?></td>
                    <td>
                        <?php
                        if ($rows['status'] == 0) {
                            echo '<p><a href="status.php?id=' . $rows['id'] . '&status=1" class="btn btn-success">Accept</a></p>';
                        } else {
                            echo '<p><a href="status.php?id=' . $rows['id'] . '&status=0" class="btn btn-danger">Deny</a></p>';
                        }
                        ?>
                    </td>
                </tr>
                </tbody>
            <?php } ?>
        </table>
    </div>

    <script>
        function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
        }
    </script>
</body>
</html>
