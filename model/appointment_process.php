<?php
session_start();
// not login  go login
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

// Assign session id to p_id
$p_id = $_SESSION['id'];

// Connect to the database (replace with your database credentials)
$mysqli = new mysqli("localhost", "root", "", "health");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Fetch form data
$doctor_id = $_POST['doctor_id'];
$user_name = $_POST['user_name'];
$user_phone = $_POST['user_phone'];
$user_address = $_POST['user_address'];
$date = $_POST['date'];
$time = $_POST['time'];

// Insert appointment into database
$query = "INSERT INTO appointments (doctor_id, user_name, user_phone, user_address, date, time, p_id) 
          VALUES ('$doctor_id', '$user_name', '$user_phone', '$user_address', '$date', '$time', '$p_id')";
if ($mysqli->query($query) === TRUE) {
    echo "<h2>Appointment booked successfully!</h2>";
} else {
    echo "Error: " . $mysqli->error;
}

// Close the database connection
$mysqli->close();
?>


