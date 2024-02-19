<?php
session_start();
@include 'config.php';

  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];


$sql = "INSERT INTO complaint (uid, name, email, subject, message) VALUES ('".$_SESSION['id']."', '".$name."', '".$email."', '".$subject."', '".$message."')";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Submit Complaint</title>
</head>
<body>
  <h1>Submit Complaint</h1>
  <p>We will get back to you soon</p>
  <p><a href="./home.php">Go to my Complaints</a></p>
</body>
</html>
