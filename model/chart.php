<?php
// Connect to the database
$mysqli = new mysqli("localhost", "root", "", "health");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Fetch all column names from the health_data table
$query = "SHOW COLUMNS FROM health_data";
$result = $mysqli->query($query);

$fields = [];
while ($row = $result->fetch_assoc()) {
    if ($row['Field'] !== 'id' && $row['Field'] !== 'timestamp') {
        $fields[] = $row['Field'];
    }
}

// Fetch data for each field
$data = [];
foreach ($fields as $field) {
    $query = "SELECT timestamp, $field FROM health_data";
    $result = $mysqli->query($query);
    
    $data[$field] = [];
    while ($row = $result->fetch_assoc()) {
        $data[$field][] = [
            'timestamp' => $row['timestamp'],
            'value' => $row[$field]
        ];
    }
}

// Calculate average values for each field
$averages = [];
foreach ($data as $field => $entries) {
    $total = 0;
    foreach ($entries as $entry) {
        $total += $entry['value'];
    }
    $average = $total / count($entries);
    $averages[$field] = $average;
}

// Close the database connection
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Line Graphs for Health Data</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        canvas {
            max-width: 100%;
            height: auto;
        }
        .header {
            background-color: #007bff;
            color: #fff;
            padding: 20px;
            text-align: center;
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
        <h1>Health Data Line Graphs</h1>
        <div class="graphs">
            <?php foreach ($fields as $field): ?>
                <canvas id="<?php echo $field; ?>Chart" width="400" height="200"></canvas>
            <?php endforeach; ?>
            <h2>Average Graphs</h2>
            <?php foreach ($averages as $field => $average): ?>
                <canvas id="<?php echo $field; ?>AverageChart" width="400" height="200"></canvas>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script>
        <?php foreach ($fields as $field): ?>
            var ctx_<?php echo $field; ?> = document.getElementById('<?php echo $field; ?>Chart').getContext('2d');
            var <?php echo $field; ?>Chart = new Chart(ctx_<?php echo $field; ?>, {
                type: 'line',
                data: {
                    labels: [<?php foreach ($data[$field] as $entry): ?>"<?php echo $entry['timestamp']; ?>",<?php endforeach; ?>],
                    datasets: [{
                        label: '<?php echo ucfirst($field); ?>',
                        data: [<?php foreach ($data[$field] as $entry): ?><?php echo $entry['value']; ?>,<?php endforeach; ?>],
                        fill: false,
                        borderColor: 'rgb(<?php echo rand(0, 255); ?>, <?php echo rand(0, 255); ?>, <?php echo rand(0, 255); ?>)',
                        tension: 0.1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            display: true,
                            title: {
                                display: true,
                                text: 'Timestamp'
                            }
                        },
                        y: {
                            display: true,
                            title: {
                                display: true,
                                text: 'Value'
                            }
                        }
                    }
                }
            });
        <?php endforeach; ?>

        // Average graphs
        <?php foreach ($averages as $field => $average): ?>
            var ctx_<?php echo $field; ?>_average = document.getElementById('<?php echo $field; ?>AverageChart').getContext('2d');
            var <?php echo $field; ?>AverageChart = new Chart(ctx_<?php echo $field; ?>_average, {
                type: 'line',
                data: {
                    labels: ['Average'],
                    datasets: [{
                        label: 'Average <?php echo ucfirst($field); ?>',
                        data: [<?php echo $average; ?>],
                        fill: false,
                        borderColor: 'rgb(<?php echo rand(0, 255); ?>, <?php echo rand(0, 255); ?>, <?php echo rand(0, 255); ?>)',
                        tension: 0.1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            display: true,
                            title: {
                                display: true,
                                text: 'Timestamp'
                            }
                        },
                        y: {
                            display: true,
                            title: {
                                display: true,
                                text: 'Value'
                            }
                        }
                    }
                }
            });
        <?php endforeach; ?>
    </script>



    
</body>
</html>
