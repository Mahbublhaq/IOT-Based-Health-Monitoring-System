<?php
// Connect to the database (replace with your database credentials)
$mysqli = new mysqli("localhost", "root", "", "health");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Fetch appointment details
$doctor_id = $_GET['doctor_id'];
$user_name = $_GET['name'];
$user_phone = $_GET['phone'];
$user_address = $_GET['address'];


echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Doctor Appointment</title>
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
</head>
<body>
    <div class='container'>
        <h2>Doctor Appointment</h2>
        <form action='appointment_process.php' method='post'>
            <input type='hidden' name='doctor_id' value='$doctor_id'>
            <input type='hidden' name='user_name' value='$user_name'>
            <input type='hidden' name='user_phone' value='$user_phone'>
            <input type='hidden' name='user_address' value='$user_address'>
            <div class='form-group'>
                <label for='date'>Select Date:</label>
                <input type='date' class='form-control' id='date' name='date' required>
            </div>
            <div class='form-group'>
                <label for='time'>Select Time:</label>
                <input type='time' class='form-control' id='time' name='time' required>
            </div>
            <button type='submit' class='btn btn-primary'>Book Appointment</button>
        </form>
    </div>
</body>
</html>";

// Close the database connection
$mysqli->close();
?>
