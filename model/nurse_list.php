<?php
// Include database connection
$mysqli = new mysqli("localhost", "root", "", "health");

// Fetch list of nurses from the database
$query = "SELECT * FROM nurses";
$result = $mysqli->query($query);

// Check if there are nurses in the database
if ($result->num_rows > 0) {
    $nurses = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $nurses = array();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nurse List</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Header */
        header {
            background-color: #007bff;
            color: white;
            padding: 20px 0;
            text-align: center;
        }

        /* Page content */
        .container {
            padding: 20px;
        }

        .table thead th {
            background-color: #007bff;
            color: white;
            border-color: #dee2e6;
        }

        .table tbody tr:hover {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <h1 class="mb-4">IOT Based Health Monitoring System</h1>
    </header>

    <?php include("../header/doctor_header.php"); ?>

    <div class="container mt-5">
        <h2 class="mb-4">Nurse List</h2>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($nurses as $nurse) : ?>
                        <tr>
                            <td><?php echo $nurse['id']; ?></td>
                            <td><?php echo $nurse['name']; ?></td>
                            <td><?php echo $nurse['phone']; ?></td>
                            <td><?php echo $nurse['email']; ?></td>
                            <td><?php echo $nurse['address']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
