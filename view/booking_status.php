<?php
session_start();

// Check if the session ID exists
if (!isset($_SESSION['id'])) {
    // Redirect to login page or display an error message
    echo "Unauthorized access. Please log in.";
    exit;
}

// Assign session id to p_id
$p_id = $_SESSION['id'];

// Connect to the database (replace with your database credentials)
$mysqli = new mysqli("localhost", "root", "", "health");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Query to select appointments for the current session ID
$query = "SELECT * FROM appointments WHERE p_id = '$p_id'";
$result = $mysqli->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Status</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 50px;
        }
        .status-accepted {
            color: green;
        }
        .status-pending {
            color: yellow;
        }
        .status-rejected {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Booking Status</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Doctor ID</th>
                        <th>User Name</th>
                        <th>User Phone</th>
                        <th>User Address</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Check if appointments exist for the current session ID
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            $statusClass = '';
                            // Determine the status class
                            if ($row["status"] == 'Accepted') {
                                $statusClass = 'status-accepted';
                            } elseif ($row["status"] == 'Pending') {
                                $statusClass = 'status-pending';
                            } elseif ($row["status"] == 'Rejected') {
                                $statusClass = 'status-rejected';
                            }

                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["doctor_id"] . "</td>";
                            echo "<td>" . $row["user_name"] . "</td>";
                            echo "<td>" . $row["user_phone"] . "</td>";
                            echo "<td>" . $row["user_address"] . "</td>";
                            echo "<td>" . $row["date"] . "</td>";
                            echo "<td>" . $row["time"] . "</td>";
                            echo "<td class='$statusClass'>" . $row["status"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='9'>No appointments found</td></tr>";
                    }

                    // Close the database connection
                    $mysqli->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
