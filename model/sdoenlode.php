<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "health_monitor";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


include('db_connect.php');

// Use a prepared statement to prevent SQL injection
$query = "SELECT * FROM health_data";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

// Create a CSV file
$csvFileName = 'health_data.csv';
$csvFile = fopen($csvFileName, 'w');

// Write the header
$headers = array('ID', 'Timestamp', 'Humidity', 'Temperature', 'ECG Value', 'Body Temperature', 'Oxygen Level', 'BPM');
fputcsv($csvFile, $headers);

// Write the data
while ($row = $result->fetch_assoc()) {
    fputcsv($csvFile, $row);
}

// Close the CSV file
fclose($csvFile);

// Provide the CSV file for download
header('Content-Type: application/csv');
header('Content-Disposition: attachment; filename=' . $csvFileName);
readfile($csvFileName);

// Delete the temporary CSV file
unlink($csvFileName);

// Close the statement and database connection
$stmt->close();
$conn->close();


?>
