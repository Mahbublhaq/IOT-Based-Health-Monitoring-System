<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Bar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .navbar {
            
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            
        }

        .navbar a {
            float: left;
            display: block;
            color: black;
            text-align: center;
            padding: 20px 20px;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .navbar a:hover {
            background-color: lightgoldenrodyellow;
        }

        .navbar a.active {
            background-color: lightgreen;
        }

        /* Add a unique style for the active page link */
        .navbar a.active:hover {
            background-color: #004080;
        }

        /* Positioning links to the right side */
        .navbar-right {
            float: right;
        }

        /* Responsive navigation */
        @media screen and (max-width: 600px) {
            .navbar a {
                float: none;
                display: block;
                text-align: left;
            }
            
            .navbar-right {
                float: none;
                display: block;
                text-align: right;
                margin-top: 10px; /* Adjust margin for spacing */
            }
        }
    </style>
</head>
<body>

<div class="navbar">
    <div class="navbar-right">
        <a class="active" href="/model/Pdashbord.php">Home</a>
        <a  href="/model/info.php">Patient Info</a>
        <a href="live.php">Live Info</a>
        <a href="/model/patientdata.php">Download Record</a>
        <a href="/view/user_appointment.php">Doctor Appointment</a>
        <a href="/view/booking_status.php">Booking Status</a>
        <a href="/model/ptaskview.php"><i class="fa fa-medkit"></i> Medicine </a>
        <a href="logout.php">Logout</a>
    </div>
</div>

</body>
</html>
