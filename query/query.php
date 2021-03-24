<?php

$conn = new mysqli('us-cdbr-east-03.cleardb.com', 'bb1776d2ba3558', 'c39173a3', 'heroku_6e2951769b8b7f2');

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['input'])) {

  $Name = $_POST['Name'];
  $Tel = $_POST['tel'];
  $Arrival_time = $_POST['Arrival'];
  $Departure_time = $_POST['Departure'];
  $Reason = $_POST['Reason'];

  $date = date_create();
   $data_list = date_format($date, 'Y-m-d H:i:s') . "\n";
  
 
  
  $query = "INSERT INTO `parking`(`Name`, `Tel`, `Arrival_time`,`Departure_time`,`Reason`,`Create_At`) VALUES 
  ('$Name','$Tel','$Arrival_time','$Departure_time','$Reason','$data_list')";
  $result = mysqli_query($conn, $query);

  if ($result) {

    header("Location: ../viewlist.php");
    unset($_POST['input']);
  }
}


if (isset($_POST['delete'])) {

  $query = "DELETE FROM `parking` WHERE id='".$_POST['delete']."'";
  $result = mysqli_query($conn, $query);

  if ($result) {
    header("Location: ../viewlist.php");
    unset($_POST['input']);
  }

}
