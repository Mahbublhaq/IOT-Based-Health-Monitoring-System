<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients List</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <!-- Custom CSS -->
    <style>
        /* Header */
        header {
            background-color:#007bff;
            color: #ffffff;
            padding: 20px 0;
            text-align: center;
        }

        /* Page content */
        .container {
            padding: 20px;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <h1>IOT Base Smart Health Monitoring System</h1>
    </header>
    <?php
    include("../header/doctor_header.php");

    
    ?>

    <!-- Page content -->
    <div class="container">
        <h2 class="mb-4">Patients List</h2>
        <table id="patientsTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                   
                    <th>Address</th>
                    <!-- Add more columns as needed -->
                </tr>
            </thead>
            <tbody>
                <!-- Populate table dynamically using PHP -->
                <?php
                // Include your database connection script here
                $mysqli = new mysqli("localhost", "root", "", "health");

                // Fetch patients from the database
                $query = "SELECT * FROM patients";
                $result = $mysqli->query($query);

                // Output patient data
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['phone'] . "</td>";
                    echo "<td>" . $row['address'] . "</td>";
                    // Add more columns as needed
                    echo "</tr>";
                }

                // Close database connection
                $mysqli->close();
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <!-- Initialize DataTables -->
    <script>
        $(document).ready(function() {
            $('#patientsTable').DataTable();
        });
    </script>
</body>
</html>
