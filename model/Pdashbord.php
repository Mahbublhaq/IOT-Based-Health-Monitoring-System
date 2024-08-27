<?php
// Start session
session_start();

// Set the current active page in the session
if (isset($_GET['page'])) {
    $_SESSION['active_page'] = $_GET['page'];
} else {
    // Set a default active page
    $_SESSION['active_page'] = 'info.php';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient INFO</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f8ff;
            color: #333;
            overflow-x: hidden;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
            font-size: 30px;
            background-color: #007bff;
            padding: 20px;
            color: white;
            text-shadow: 2px 2px 4px #000000;
        }

        .sidenav {
            height: 100%;
            width: 220px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343a40;
            padding-top: 20px;
            font-size: 20px;
            transition: width 0.3s;
        }

        .sidenav:hover {
            width: 240px;
        }

        .sidenav h2 {
            color: #f1f1f1;
            text-align: center;
            margin-bottom: 30px;
        }

        .sidenav a {
            padding: 15px 20px;
            text-decoration: none;
            font-size: 18px;
            color: #818181;
            display: block;
            transition: color 0.3s, transform 0.3s;
        }

        .sidenav a:hover {
            color: #f1f1f1;
            transform: scale(1.1);
        }

        .sidenav a.active {
            color: #f1f1f1;
            font-weight: bold;
        }

        .main {
            margin-left: 240px;
            padding: 20px;
            transition: margin-left 0.3s;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            grid-gap: 20px;
        }

        .template-box {
            padding: 30px;
            text-align: center;
            background: linear-gradient(135deg, #ff9a9e 0%, #fad0c4 99%, #fad0c4 100%);
            border-radius: 15px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2), 0 8px 20px rgba(0, 0, 0, 0.19);
            transition: transform 0.3s, box-shadow 0.3s;
            cursor: pointer;
        }

        .template-box:nth-child(2) {
            background: linear-gradient(135deg, #a1c4fd 0%, #c2e9fb 100%);
        }

        .template-box:nth-child(3) {
            background: linear-gradient(135deg, #d4fc79 0%, #96e6a1 100%);
        }

        .template-box:nth-child(4) {
            background: linear-gradient(135deg, #84fab0 0%, #8fd3f4 100%);
        }

        .template-box:nth-child(5) {
            background: linear-gradient(135deg, #fddb92 0%, #d1fdff 100%);
        }

        .template-box:nth-child(6) {
            background: linear-gradient(135deg, #fcff9e 0%, #c9ffbf 100%);
        }

        .template-box:nth-child(7) {
            background: linear-gradient(135deg, #fbc2eb 0%, #a6c1ee 100%);
        }

        .template-box:hover {
            transform: translateY(-15px) scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3), 0 15px 45px rgba(0, 0, 0, 0.22);
        }

        .template-box a {
            text-decoration: none;
            color: darkslategrey;
            font-size: 20px;
            font-weight: bold;
        }

        .template-box a.active {
            color: #007bff;
        }

        .welcome {
            margin-left: 240px;
            padding: 20px;
            text-align: center;
            color: black;
            text-shadow: 2px 2px 4px #000000;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>IOT Based Health Monitoring System</h1>
    </div>

    <div class="sidenav">
        <h2>Dashboard</h2>
        <a href="info.php" <?php echo ($_SESSION['active_page'] == 'info.php') ? 'class="active"' : ''; ?>><i class="fa fa-users"></i> Patient Info</a>
        <a href="live.php" <?php echo ($_SESSION['active_page'] == 'live.php') ? 'class="active"' : ''; ?>><i class="fa fa-heartbeat"></i> Live Info</a>
        <a href="/model/patientdata.php" <?php echo ($_SESSION['active_page'] == '/model/patientdata.php') ? 'class="active"' : ''; ?>><i class="fa fa-download"></i> Download Record</a>
        <a href="/view/user_appointment.php" <?php echo ($_SESSION['active_page'] == '/view/user_appointment.php') ? 'class="active"' : ''; ?>><i class="fa fa-calendar"></i> Doctor Appointment</a>
        <a href="/view/booking_status.php" <?php echo ($_SESSION['active_page'] == '/view/booking_status.php') ? 'class="active"' : ''; ?>><i class="fa fa-calendar-plus-o"></i> Appointment Status</a>
        <a href="/model/ptaskview.php" <?php echo ($_SESSION['active_page'] == '/model/ptaskview.php') ? 'class="active"' : ''; ?>><i class="fa fa-medkit"></i> Medicine Info</a>
        <a href="logout.php" <?php echo ($_SESSION['active_page'] == 'logout.php') ? 'class="active"' : ''; ?>><i class="fa fa-sign-out"></i> Logout</a>
    </div>

    <div class="welcome">
        <h2>Welcome to Patient Dashboard</h2>
    </div>

    <div class="main">
        <div class="template-box">
            <a href="info.php" <?php echo ($_SESSION['active_page'] == 'info.php') ? 'class="active"' : ''; ?>>Patient Info</a>
        </div>
        <div class="template-box">
            <a href="live.php" <?php echo ($_SESSION['active_page'] == 'live.php') ? 'class="active"' : ''; ?>>Live Info</a>
        </div>
        <div class="template-box">
            <a href="/model/patientdata.php" <?php echo ($_SESSION['active_page'] == '/model/patientdata.php') ? 'class="active"' : ''; ?>>Download Record</a>
        </div>
        <div class="template-box">
            <a href="/view/user_appointment.php" <?php echo ($_SESSION['active_page'] == '/view/user_appointment.php') ? 'class="active"' : ''; ?>>Doctor Appointment</a>
        </div>
        <div class="template-box">
            <a href="/view/booking_status.php" <?php echo ($_SESSION['active_page'] == '/view/booking_status.php') ? 'class="active"' : ''; ?>>Appointment Status</a>
        </div>
        <div class="template-box">
            <a href="/model/ptaskview.php" <?php echo ($_SESSION['active_page'] == '/model/ptaskview.php') ? 'class="active"' : ''; ?>>Medicine Info</a>
        </div>
        <div class="template-box">
            <a href="logout.php" <?php echo ($_SESSION['active_page'] == 'logout.php') ? 'class="active"' : ''; ?>>Logout</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
