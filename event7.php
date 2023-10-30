<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EVENT-7</title>
  <link rel="stylesheet" href="CSS/style.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
  <div class="topnav" id="myTopnav">
    <br>
    <div class="row">   
       <img src="images/cit_logo.webp" height="100px" width="100px" style="border-radius: 50px;display: block;margin: 30px;">
     <h2 style="margin-top:65px;">Coimbatore Institute Of Technology</h2>  </div>
       <img src="images/LOGOS-03.png" height="180px" width="300px" style="border-radius: 50px;float:right; margin-top: -167px;">
    <hr style="border:2px solid aliceblue;">
    <a href="about.php">About</a>
    <a href="approvel.php">Approvel Area</a>
    <a href="event1.php">Quantum Quest</a>
    <a href="event2.php">Fun Forum</a>
    <a href="event3.php">Logic Lore</a>
    <a href="event4.php">Maze Runners</a>
    <a href="event5.php">Idea Launch</a>
    <a href="event6.php">Stickeez Mate</a>
    <a href="event7.php"class="active">Shutter Spectrum</a>
    <a class="text-dark active" style="float: right;font-weight: 700;">Logout</a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
  
  <hr style="border:2px solid aliceblue; margin-top:-0px;">
<div class="container">
  <br><br>
  <h1 style="text-align: center;">Event-7   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="event7-export.php"><button type="button" class="btn btn-danger">Export</button></a></h1>
  <br>
    <table class="table table-bordered table-info">
      <thead class="text-dark bg-secondary">
        <tr>
        <th>Clg.Regno</th>
          <th>Name</th>
          <th>Clg.Name</th>
          <th>phone.Number</th>
          <th>E-mail.id</th>
          <th>Degree</th>
        </tr>
      </thead>
      <?php
include "db_conn.php";
$query="SELECT r.*,re.* FROM register r, registrations re WHERE r.id=re.id and re.event_name='SHUTTER SPECTRUM' and re.status=1  order by r.college";
$data=mysqli_query($conn,$query);
while ($rows = mysqli_fetch_array($data)){
?>
      <tbody>
        <tr>
        <td><?php echo $rows['reg_no']; ?></td>
        <td><?php echo $rows['name']; ?></td>
        <td><?php echo $rows['college']; ?></td>
        <td><?php echo $rows['phone']; ?></td>
        <td><?php echo $rows['email']; ?></td>
        <td><?php echo $rows['degree']; ?></td>
<?php
}
?>
      </tr>
      </tbody>
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




