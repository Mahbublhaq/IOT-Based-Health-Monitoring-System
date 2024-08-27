<?php
session_start();



// Include your database connection script here
$mysqli = new mysqli("localhost", "root", "", "health");

// Fetch patients from database
$query_patients = "SELECT id, name FROM patients";
$result_patients = $mysqli->query($query_patients);

// Fetch nurses from database
$query_nurses = "SELECT id, name FROM nurses";
$result_nurses = $mysqli->query($query_nurses);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Assign Task</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .header {
            color: #fff;
            padding: 20px;
            background-color: #007bff;
            text-align: center;
            margin-bottom: 30px;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin: 0 auto;
            max-width: 500px;
        }

        .form-group label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
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

    <?php include("../header/doctor_header.php"); ?>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Doctor Assign Task</h2>
        <form action="/model/assign_task.php" method="POST">
            <div class="form-group">
                <label for="patient_id">Select Patient:</label>
                <select class="form-control" id="patient_id" name="patient_id" required>
                    <?php while ($row = $result_patients->fetch_assoc()): ?>
                        <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="nurse_id">Select Nurse:</label>
                <select class="form-control" id="nurse_id" name="nurse_id" required>
                    <?php while ($row = $result_nurses->fetch_assoc()): ?>
                        <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="medicine">Medicine Name:</label>
                <input type="text" class="form-control" id="medicine" name="medicine" required>
            </div>
            <div class="form-group">
                <label for="eat_time">Eat Time:</label>
                <input type="datetime-local" class="form-control" id="eat_time" name="eat_time" required>
            </div>
            <div class="form-group">
                <label for="other_details">Other Details:</label>
                <textarea class="form-control" id="other_details" name="other_details" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Assign Task</button>
        </form>
    </div>
</body>
</html>
