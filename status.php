<?php 
$id=$_GET['id'];
$status=$_GET['status'];
include "db_conn.php";
$query="UPDATE registrations SET status=$status WHERE id=$id ";
mysqli_query($conn,$query);
header('location:approvel.php');
?>
