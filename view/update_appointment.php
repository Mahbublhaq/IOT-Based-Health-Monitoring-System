<?php
session_start();

// Check if doctor is logged in
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

// Connect to the database
$mysqli = new mysqli("localhost", "root", "", "health");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Check if appointment ID is set
if (!isset($_GET['id'])) {
    echo "Appointment not found";
    exit();
}

// Fetch appointment details
$appointment_id = $_GET['id'];
$query = "SELECT * FROM appointments WHERE id = '$appointment_id'";
$result = $mysqli->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Appointment not found";
    exit();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Update appointment details
    $date = $_POST['date'];
    $time = $_POST['time'];
    $status = $_POST['status'];

    $update_query = "UPDATE appointments SET date = '$date', time = '$time', status = '$status' WHERE id = '$appointment_id'";
    if ($mysqli->query($update_query) === TRUE) {
        echo "Appointment updated successfully";
    } else {
        echo "Error updating appointment: " . $mysqli->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Appointment</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Update Appointment</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $appointment_id; ?>" method="post">
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" class="form-control" id="date" name="date" value="<?php echo $row['date']; ?>" required>
            </div>
            <div class="form-group">
                <label for="time">Time:</label>
                <input type="time" class="form-control" id="time" name="time" value="<?php echo $row['time']; ?>" required>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="pending" <?php if ($row['status'] == 'pending') echo 'selected'; ?>>Pending</option>
                    <option value="accepted" <?php if ($row['status'] == 'accepted') echo 'selected'; ?>>Accepted</option>
                    <option value="rejected" <?php if ($row['status'] == 'rejected') echo 'selected'; ?>>Rejected</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>

<?php
// Close the database connection
$mysqli->close();
?>
