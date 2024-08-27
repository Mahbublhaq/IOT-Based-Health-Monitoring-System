<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Professional Menu Bar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .navbar {
            background-color: #333;
            overflow: hidden;
            padding: 10px 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
            transition: background-color 0.3s, transform 0.3s;
        }

        .navbar a:hover {
            background-color: #555;
            transform: scale(1.1);
        }

        .navbar a.active {
            background-color: #4CAF50;
        }

        .navbar a.logo {
            font-size: 24px;
            font-weight: bold;
        }

        .navbar a.logo:hover {
            background-color: inherit;
            transform: none;
        }

        .navbar-right {
            float: right;
        }

        @media screen and (max-width: 600px) {
            .navbar a {
                float: none;
                display: block;
                text-align: left;
            }

            .navbar-right {
                float: none;
                display: block;
                text-align: left;
                margin-top: 10px;
            }
        }
    </style>
</head>
<body>

<div class="navbar">
    
    <div class="navbar-right">
        <a href="/view/doctor_appointment.php"><i class="fa fa-home"></i> Home</a>
        <a href="/view/doctor_appointment.php"><i class="fa fa-calendar"></i> Appointment</a>
        <a href="/view/doctor_assign_task.php"><i class="fa fa-tasks"></i> Assign Work for Nurses</a>
        <a href="/model/view_task.php"><i class="fa fa-tasks"></i> View Task</a>
        <a href="/model/Dalert.php"><i class="fa fa-heartbeat"></i> Live Health Data</a>
        <a href="/model/chart.php"><i class="fa fa-line-chart"></i> Check Patient Condition</a>
        <a href="/model/patients_list.php"><i class="fa fa-users"></i> About Patient</a>
        <a href="/model/nurse_list.php"><i class="fa fa-user-md"></i> About Nurse</a>
        <a href="/model/record.php"><i class="fa fa-download"></i> Download Record</a>
        <a href="/model/logout.php"><i class="fa fa-sign-out"></i> Logout</a>
    </div>
</div>

</body>
</html>
