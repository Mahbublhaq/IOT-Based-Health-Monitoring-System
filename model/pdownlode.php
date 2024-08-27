<?php
$servername = "localhost"; // Replace with your MySQL server address
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "health"; // Replace with your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all data from the table
$query = "SELECT * FROM health_data ORDER BY timestamp DESC LIMIT 20";
$result = $conn->query($query);

// Generate CSV data
$csvFileName = 'patient_data.csv';
$fp = fopen($csvFileName, 'w');

// Add CSV headers
$headers = array('Date', 'Time', 'Humidity', 'Temperature', 'ECG Value', 'DS18B20 Temperature', 'SpO2', 'BPM');
fputcsv($fp, $headers);

// Add data rows
while ($data = $result->fetch_assoc()) {
    // Assuming your database has 'timestamp' column for date and time
    $dateTime = new DateTime($data['timestamp']);
    $date = $dateTime->format('Y-m-d');
    $time = $dateTime->format('H:i:s');

    // Add date and time to the data array
    $rowData = array($date, $time, $data['humidity'], $data['temperature'], $data['ecgValue'], $data['bodyTemp'], $data['SpO2'], $data['bpm']);

    fputcsv($fp, $rowData);
}

fclose($fp);

// Close the connection
$conn->close();

// Download the CSV file
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="' . $csvFileName . '"');
readfile($csvFileName);
unlink($csvFileName); // Delete the file after download to avoid clutter
?>
