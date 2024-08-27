<?php
session_start();
// $_SESSION_['id'] = $row['id'];

// Connect to the database (replace with your database credentials)
$mysqli = new mysqli("localhost", "root", "", "health");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Fetch form data
$name = $_POST['name'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$specialization = $_POST['specialization'];


// Query doctors based on specialization
$query = "SELECT * FROM doctors WHERE specialization = '$specialization'";
$result = $mysqli->query($query);

echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Doctor List</title>
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
</head>
<body>
    <div class='container'>
        <h2>Available Doctors</h2>";
        
if ($result->num_rows > 0) {
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>" . $row['name'] . " - " . $row['specialization'] . " - <a href='booking_see_and_update.php?doctor_id=" . $row['id'] . "&name=$name&phone=$phone&address=$address'>Book Appointment</a></li>";
    }
    echo "</ul>";
} else {
    echo "No doctors available for this specialization.";
}

echo "</div>
</body>
</html>";

// Close the database connection
$mysqli->close();
?>
