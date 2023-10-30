<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About</title>
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
    <a href="about.php" class="active">About</a>
    <a href="approvel.php">Approvel Area</a>
    <a href="event1.php">Quantum Quest</a>
    <a href="event2.php">Fun Forum</a>
    <a href="event3.php">Logic Lore</a>
    <a href="event4.php">Maze Runners</a>
    <a href="event5.php">Idea Launch</a>
    <a href="event6.php">Stickeez Mate</a>
    <a href="event7.php">Shutter Spectrum</a>
    <a class="text-dark active" style="float: right;font-weight: 700;">Logout</a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
  
  <hr style="border:2px solid aliceblue; margin-top:-0px;">
<div class="container">
  <br><br>
  <div class="row">
    <div class="col-lg-12 col-md-12">
      <h2 style="justify-content: center;">Welcome Registration Team</h2>
      <br>
      <br>
      <div class="row">
        <div class="col-lg-6 col-md-12">
          <div class="card">
            <div class="card-header">No,Of Students Registered</div>
            <div class="card-body">
            <?php
            $connect=mysqli_connect("localhost","root","","cyberfest");
            $query="SELECT count(id) AS total FROM register";
            $result=mysqli_query($connect,$query);
            $values=mysqli_fetch_assoc($result);
            $num_rows=$values['total'];
            ?>
            <p align="center" style="color: #555; font-weight:bold; font-size:40px;"><b><?php echo $num_rows;?></b></p> 
            </div> 
          </div>
        </div>
        <div class="col-lg-6 col-md-12">
          <div class="card">
            <div class="card-header">No.of Students Approved</div>
            <div class="card-body">
            <?php
            $connect=mysqli_connect("localhost","root","","cyberfest");
            $query=" select COUNT(DISTINCT re.name) as total  from registrations re,register r where re.id=r.id and re.status='1'";
            $result=mysqli_query($connect,$query);
            $values=mysqli_fetch_assoc($result);
            $num_rows=$values['total'];
            ?>
            <p align="center" style="color: #555; font-weight:bold; font-size:40px;"><b><?php echo $num_rows;?></b></p> 
            </div> 
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12 col-md-12">
      <br>
      <br>
      <div class="row">
        <div class="col-lg-3 col-md-12">
          <div class="card">
            <div class="card-header">No.Of Students In Event 1</div>
            <div class="card-body">
            <?php
            $connect=mysqli_connect("localhost","root","","cyberfest");
            $query="SELECT count(registration_id) AS total FROM registrations re where  re.status=1 and re.event_name='QUANTUM QUEST'";
            $result=mysqli_query($connect,$query);
            $values=mysqli_fetch_assoc($result);
            $num_rows=$values['total'];
            ?>
            <p align="center" style="color: #555; font-weight:bold; font-size:40px;"><b><?php echo $num_rows;?></b></p> 
            </div> 
          </div>
        </div>
        <div class="col-lg-3 col-md-12">
          <div class="card">
            <div class="card-header">No.of Students In Event 2</div>
            <div class="card-body">
            <?php
            $connect=mysqli_connect("localhost","root","","cyberfest");
            $query="SELECT count(registration_id) AS total FROM registrations re where  re.status=1 and re.event_name='FUN FORUM'";
            $result=mysqli_query($connect,$query);
            $values=mysqli_fetch_assoc($result);
            $num_rows=$values['total'];
            ?>
            <p align="center" style="color: #555; font-weight:bold; font-size:40px;"><b><?php echo $num_rows;?></b></p> 
            </div>           </div>
        </div>
        <div class="col-lg-3 col-md-12">
          <div class="card">
            <div class="card-header">No,Of Students In Event 3</div>
            <div class="card-body">
            <?php
            $connect=mysqli_connect("localhost","root","","cyberfest");
            $query="SELECT count(registration_id) AS total FROM registrations re where  re.status=1 and re.event_name='LOGIC LORE'";
            $result=mysqli_query($connect,$query);
            $values=mysqli_fetch_assoc($result);
            $num_rows=$values['total'];
            ?>
            <p align="center" style="color: #555; font-weight:bold; font-size:40px;"><b><?php echo $num_rows;?></b></p> 
            </div>           </div>
        </div>
        <div class="col-lg-3 col-md-12">
          <div class="card">
            <div class="card-header">No.of Students In Event 4</div>
            <div class="card-body">
            <?php
            $connect=mysqli_connect("localhost","root","","cyberfest");
            $query="SELECT count(registration_id) AS total FROM registrations re where  re.status=1 and re.event_name='MAZE RUNNERS'";
            $result=mysqli_query($connect,$query);
            $values=mysqli_fetch_assoc($result);
            $num_rows=$values['total'];
            ?>
            <p align="center" style="color: #555; font-weight:bold; font-size:40px;"><b><?php echo $num_rows;?></b></p> 
            </div>           </div>
        </div>
        
        </div>
      </div>
    </div>
    <br><br>
    <div class="row">
      <br><br>
        <div class="col-lg-3 col-md-12">
          <div class="card">
            <div class="card-header">No.of Students In Event 5</div>
            <div class="card-body">
            <?php
            $connect=mysqli_connect("localhost","root","","cyberfest");
            $query="SELECT count(registration_id) AS total FROM registrations re where  re.status=1 and re.event_name='IDEA LAUNCH'";
            $result=mysqli_query($connect,$query);
            $values=mysqli_fetch_assoc($result);
            $num_rows=$values['total'];
            ?>
            <p align="center" style="color: #555; font-weight:bold; font-size:40px;"><b><?php echo $num_rows;?></b></p> 
            </div> 
           </div>
        </div>
        <div class="col-lg-3 col-md-12">
          <div class="card">
            <div class="card-header">No.of Students In Event 6</div>
            <div class="card-body">
            <?php
            $connect=mysqli_connect("localhost","root","","cyberfest");
            $query="SELECT count(registration_id) AS total FROM registrations re where  re.status=1 and re.event_name='STICKEEZ MATE'";
            $result=mysqli_query($connect,$query);
            $values=mysqli_fetch_assoc($result);
            $num_rows=$values['total'];
            ?>
            <p align="center" style="color: #555; font-weight:bold; font-size:40px;"><b><?php echo $num_rows;?></b></p> 
            </div> 
            </div>
        </div>
        <div class="col-lg-3 col-md-12">
          <div class="card">
            <div class="card-header">No.of Students In Event 7</div>
            <div class="card-body">
            <?php
            $connect=mysqli_connect("localhost","root","","cyberfest");
            $query="SELECT count(registration_id) AS total FROM registrations re where  re.status=1 and re.event_name='SHUTTER SPECTRUM'";
            $result=mysqli_query($connect,$query);
            $values=mysqli_fetch_assoc($result);
            $num_rows=$values['total'];
            ?>
            <p align="center" style="color: #555; font-weight:bold; font-size:40px;"><b><?php echo $num_rows;?></b></p> 
            </div>  
          </div><br><br>
    </div>
    <br>
    
  </div>
  
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




