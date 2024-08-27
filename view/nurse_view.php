<?php
session_start();

// Check if user is logged in and role is nurse


// Include your database connection script here
$mysqli = new mysqli("localhost", "root", "", "health");

// Fetch tasks assigned to the nurse with patient and doctor names
$nurse_id = $_SESSION['id'];
$query = "SELECT t.id, p.name AS patient_name, d.name AS doctor_name, t.medicine, t.eat_time, t.other_details, t.task_completed
          FROM tasks t
          INNER JOIN patients p ON t.patient_id = p.id
          INNER JOIN doctors d ON t.assigned_by_doctor_id = d.id
          WHERE nurse_id = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("i", $nurse_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nurse Task List</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        /* Header */
        header,h1 {
            background-color:007bff ;
            color: #ffffff;
            padding: 20px 0;
            text-align: center;
        }
        /* Page content */
        .container {
            padding: 10px;
        }
    </style>

</head>
<body>
    <!-- Header -->
    <header class="bg-dark text-white py-4">
        <div class="container">
            <h1 class="text-center">IOT Base Smart Health Monitoring System</h1>
        </div>
    </header>
    <?php include("../header/nurse_header.php"); ?>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Nurse Task List</h2>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Doctor Name</th>
                        <th>Patient Name</th>
                        <th>Medicine</th>
                        <th>Eat Time</th>
                        <th>Other Details</th>
                        <th>Task Status</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row['doctor_name'] ?></td>
                            <td><?= $row['patient_name'] ?></td>
                            <td><?= $row['medicine'] ?></td>
                            <td><?= $row['eat_time'] ?></td>
                            <td><?= $row['other_details'] ?></td>
                            <td><?= $row['task_completed'] ? 'Completed' : 'Pending' ?></td>
                            <td>
                                <?php if (!$row['task_completed']): ?>
                                    <form action="/model/nurse_complete_task.php" method="POST">
                                        <input type="hidden" name="task_id" value="<?= $row['id'] ?>">
                                        <button type="submit" class="btn btn-primary">Complete Task</button>
                                    </form>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
