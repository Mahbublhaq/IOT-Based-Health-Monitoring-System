<?php
session_start();

// Check if session id is set
if (!isset($_SESSION['id'])) {
    die("Please log in to view tasks.");
}

$doctor_id = $_SESSION['id']; // Retrieve the doctor ID from session

$servername = "localhost"; // your database server name
$username = "root"; // your database username
$password = ""; // your database password
$dbname = "health"; // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch tasks assigned by the logged-in doctor
$sql = "SELECT * FROM tasks WHERE assigned_by_doctor_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $doctor_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Status</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .pending {
            color: white;
            background-color: red;
        }
        .complete {
            color: white;
            background-color: green;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Task Status</h1>
        
        <table>
            <tr>
                <th>ID</th>
                <th>Patient ID</th>
                <th>Nurse ID</th>
                <th>Medicine</th>
                <th>Eat Time</th>
                <th>Other Details</th>
                <th>Assigned by Doctor ID</th>
                <th>Status</th>
                <th>Task Completed Time</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $statusClass = $row['task_completed'] == 1 ? 'complete' : 'pending';
                    $statusText = $row['task_completed'] == 1 ? 'Complete' : 'Pending';
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['patient_id']}</td>
                            <td>{$row['nurse_id']}</td>
                            <td>{$row['medicine']}</td>
                            <td>{$row['eat_time']}</td>
                            <td>{$row['other_details']}</td>
                            <td>{$row['assigned_by_doctor_id']}</td>
                            <td class='$statusClass'>$statusText</td>
                            <td>{$row['task_completed_time']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='9'>No tasks found</td></tr>";
            }
            $stmt->close();
            $conn->close();
            ?>
        </table>
    </div>
</body>
</html>
