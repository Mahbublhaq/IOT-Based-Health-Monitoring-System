<?php
$servername = "localhost"; // Replace with your MySQL server address
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "health_monitor"; // Replace with your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from the request
$humidity = $_GET['humidity'];
$temperature = $_GET['temperature'];
$ecgValue = $_GET['ecgValue'];
$ds18b20Temperature = $_GET['ds18b20Temperature'];
$irValue = $_GET['irValue'];
$bpm = $_GET['bpm'];

$sql = "INSERT INTO health_data(humidity,temperature,ecgValue, bodyTemp, SpO2, bpm)
VALUES ('$humidity', '$temperature', '$ecgValue', '$ds18b20Temperature', '$irValue', '$bpm')";

if ($conn->query($sql) === TRUE) {
    echo "Record added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>



