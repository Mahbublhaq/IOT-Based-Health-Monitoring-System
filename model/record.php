<?php
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

// Fetch data based on the provided date or fetch all data if no date is provided
$dateFilter = isset($_GET['date']) ? $_GET['date'] : null;

// Use a prepared statement to prevent SQL injection
$query = "SELECT * FROM health_data";
if ($dateFilter) {
    $query .= " WHERE DATE(date_column) = ?";
}

$stmt = $conn->prepare($query);

if ($stmt) {
    if ($dateFilter) {
        $stmt->bind_param("s", $dateFilter);
    }

    $stmt->execute();
    $result = $stmt->get_result();
}

// Close the statement and connection
$stmt->close();
$conn->close();
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
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color:#007bff;
            color: white;
            padding: 20px;
            text-align: center;
            margin-bottom: 20px;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            
            margin-bottom: 20px;
        }

        .search-form {
            text-align: center;
            margin-bottom: 20px;
        }

        .search-form .form-control {
            width: 300px;
            margin-right: 10px;
        }

        .download-btn {
            text-align: center;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 8px 20px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>IOT Based Smart Health Monitoring System</h1>
    </div>
    <?php
    include("../header/doctor_header.php");

    
    ?>


    <div class="container">
        <h2>Sensor Data </h2>
        <!-- Add a form for date input and search button -->
        <form class="search-form" method="GET" action="search.php">
            <div class="form-group">
                <input type="text" name="date" class="form-control" placeholder="Search by Date (YYYY-MM-DD)" value="<?php echo htmlspecialchars($dateFilter); ?>">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

        <div class="download-btn">
            <a href="../model/downlode.php" class="btn btn-primary">Download All Sensor Data CSV</a>
        </div>

        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
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
                <?php while ($data = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $data['id']; ?></td>
                        <td><?php echo $data['humidity']; ?></td>
                        <td><?php echo $data['temperature']; ?></td>
                        <td><?php echo $data['ecgValue']; ?></td>
                        <td><?php echo $data['bodyTemp']; ?></td>
                        <td><?php echo $data['SpO2']; ?></td>
                        <td><?php echo $data['bpm']; ?></td>
                        <td><?php echo $data['timestamp']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <div class="download-btn">
            <a href="download.php" class="btn btn-primary">Download All Sensor Data CSV</a>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js script links -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
