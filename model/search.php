<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Health Data</title>
    <style>
        body {
            padding: 20px;
        }

        .result-heading {
            margin-bottom: 20px;
        }

        .download-btn {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

<div class='download-btn'>
        <a href='../model/sdoenlode.php' class='btn btn-primary'>Download Data</a>
        </div>

    <?php
    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        // Get the date from the form
        $dateFilter = isset($_GET['date']) ? $_GET['date'] : null;

        // Your database connection code
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "health";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Use a prepared statement to prevent SQL injection
        $query = "SELECT * FROM health_data";
        $conditions = [];

        if ($dateFilter) {
            $conditions[] = "DATE(timestamp) = ?";
        }

        if (!empty($conditions)) {
            $query .= " WHERE " . implode(" AND ", $conditions);
        }

        $stmt = $conn->prepare($query);

        if (!$stmt) {
            die("Error in the prepared statement: " . $conn->error);
        }

        if ($dateFilter) {
            $stmt->bind_param("s", $dateFilter);
        }

        $stmt->execute();

        // Check for execution errors
        if ($stmt->error) {
            die("Error during execution of the statement: " . $stmt->error);
        }

        $result = $stmt->get_result();

        // Display search results with Bootstrap-styled table
        echo "<div class='result-heading'><h1>Search Result</h1></div>";

        echo "<div class='table-responsive'>";
        echo "<table class='table table-bordered table-striped'>";
        echo "<thead class='thead-dark'>";
        echo "<tr><th>ID</th><th>Timestamp</th><th>Humidity</th><th>Temperature</th><th>ECG Value</th><th>Body Temperature</th><th>Oxygen Level</th><th>BPM</th></tr>";
        echo "</thead><tbody>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['timestamp'] . "</td>";
            echo "<td>" . $row['humidity'] . "</td>";
            echo "<td>" . $row['temperature'] . "</td>";
            echo "<td>" . $row['ecgValue'] . "</td>";
            echo "<td>" . $row['bodyTemp'] . "</td>";
            echo "<td>" . $row['SpO2'] . "</td>";
            echo "<td>" . $row['bpm'] . "</td>";
            // Add more fields as needed
            echo "</tr>";
        }

        echo "</tbody></table>";
        echo "</div>";

        // Download button
        echo "<div class='download-btn'>";
        echo "<a href='download.php' class='btn btn-primary'>Download Data</a>";
        echo "</div>";

        // Close the statement
        $stmt->close();

        $conn->close();
    }
    ?>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
