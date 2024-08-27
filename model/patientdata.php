<?php
session_start();

// Check if user is logged in and role is patient
if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'patients') {
    header("Location: login.php");
    exit;
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "health";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the last 7 records from the database
$query = "SELECT * FROM health_data ORDER BY timestamp DESC LIMIT 15";
$result_health_data = $conn->query($query);

// Check if the query was successful
if (!$result_health_data) {
    die("Query failed: " . $conn->error);
}

$id = $_SESSION['id'];
$sql = "SELECT * FROM patients WHERE id=$id";
$result_patient = $conn->query($sql);
$patient = $result_patient->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sensor Data Dashboard</title>
    <!-- Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .download-btn {
            text-align: center;
            margin-top: 20px;
        }
        .second-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .pid{
            text-align: center;
            width: 100%;
            padding: 20px;
            background-color: black;
            color: #fff;
            height: 20%;
            


            



        }
        h1{
            text-align: center;
            margin-bottom: 20px;
            width: 100%;
            padding: 20px;
            color: lightcoral;
        }
        .head{
            margin-left: 60%;
            padding: auto;
        }
    </style>
</head>
<body>
    <div class="pid">
        <h1>IOT Based Smart Health Monitoring System</h1>
        <h2>Welcome, <?php echo $patient['name']; ?></h2>
        <h5 class="card-title">Patient ID: <?php echo $patient['id']; ?></h5>
    </div>
  <div class="head"><?php include("../header/pheader.php"); ?></div> 
    <h1>Patient Health Data </h1>

    <table class="table table-bordered table-striped mt-4">
        <thead class="thead-dark">
            <tr>
                
                <th>Humidity</th>
                <th>Temperature</th>
                <th>ECG Value</th>
                <th>Body Temperature</th>
                <th>Oxygen Level</th>
                <th>BPM</th>
                <th>Date and Time</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($data = $result_health_data->fetch_assoc()):
            ?>
                <tr>
                    
                    <td><?php echo $data['humidity']; ?></td>
                    <td><?php echo $data['temperature']; ?></td>
                    <td><?php echo $data['ecgValue']; ?></td>
                    <td><?php echo $data['bodyTemp']; ?></td>
                    <td><?php echo $data['SpO2']; ?></td>
                    <td><?php echo $data['bpm']; ?></td>
                    <td><?php echo $data['timestamp']; ?></td>
                </tr>
            <?php
            endwhile;
            ?>
        </tbody>
    </table>

    <div class="download-btn">
        <a href="/model/pdownlode.php" class="btn btn-primary">Download All Sensor Data CSV</a>
    </div>

    <!-- Bootstrap JS and Popper.js script links -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

<?php
// Close the connection
$conn->close();
?>
