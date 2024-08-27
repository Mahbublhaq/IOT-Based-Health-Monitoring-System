<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: 'Times New Roman', serif;
            background: linear-gradient(135deg, #f0f0f0 0%, #f0f0f0 50%, #c0c0c0 100%);
            margin: 0;
            overflow-x: hidden;
        }

        .header {
            background: linear-gradient(45deg, #007bff, #00c6ff);
            color: #fff;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 1000;
            margin-left: 16.5%;
        }

        .sidebar {
            background-color: black;
            color: #fff;
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            overflow-y: auto;
            transition: all 0.3s ease;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar ul li {
            padding: 10px;
            text-align: center;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: #fff;
            transition: all 0.3s ease;
            display: block;
            padding: 10px;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sidebar ul li a:hover {
            background: linear-gradient(45deg, rgb(255, 65, 108), rgb(255, 75, 43));
            transform: translateX(10px);
        }

        .sidebar ul li a .icon {
            margin-right: 10px;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
            transition: all 0.3s ease;
        }

        .content h2 {
            color: #007bff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        .box {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            transform-style: preserve-3d;
            margin-bottom: 20px;
        }

        .box:hover {
            transform: translateY(-10px) rotateX(10deg) rotateY(10deg);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            background-color:lightyellow;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .content {
                margin-left: 0;
                padding: 20px;
            }

            .header {
                font-size: 30px;
                padding: 10px;
            }

            .sidebar ul li a {
                font-size: 20px;
                padding: 15px;
            }
        }
        .mt-4 {
            margin-top: 20px;
        }

        .alert-custom {
            background-color: #ffcc00;
            color: #000;
            border: 1px solid #ff9900;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 20px;
        }
        .mt-4{
            margin-left:30%;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>IOT Based Smart Health Monitoring System</h1>
    </div>
    
    <div class="sidebar">
        <h5 class="text-center mb-4"><i class="fa fa-home" aria-hidden="true"> Home</i></h5>
        <ul>
            <li><a href="/view/doctor_appointment.php" class="nav-link"><i class="fas fa-calendar-check icon"></i>Appointment</a></li>
            <li><a href="/view/doctor_assign_task.php" class="nav-link"><i class="fas fa-tasks icon"></i>Assign Work for Nurses</a></li>
            <li><a href="/model/view_task.php"><i class="fa fa-tasks"></i> View Task</a></li>  
            <li><a href="/model/Dalert.php" class="nav-link"><i class="fa fa-heartbeat icon"></i>Live Health Data</a></li>
            <li><a href="/model/chart.php" class="nav-link"><i class="fas fa-chart-line icon"></i>Check Patient Condition</a></li>
            <li><a href="/model/patients_list.php" class="nav-link"><i class="fas fa-users icon"></i>About Patient</a></li>
            <li><a href="/model/nurse_list.php" class="nav-link"><i class="fas fa-user-nurse icon"></i>About Nurse</a></li>
            <li><a href="/model/record.php" class="nav-link"><i class="fas fa-download icon"></i>Download Record</a></li>
            <li><a href="/model/logout.php" class="nav-link"><i class="fas fa-sign-out-alt icon"></i>Logout</a></li>
        </ul>
    </div>

    <div class="content">
        <h2 class="mt-4">Welcome to Doctor Dashboard</h2>
        
        <div class="row">
            <div class="col-md-4">
                <div class="box">
                    <h3>Appointment</h3>
                    <p>Manage your appointments effectively.</p>
                    <a href="/view/doctor_appointment.php" class="btn btn-primary">Go to Appointments</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box">
                    <h3>Assign Work for Nurses</h3>
                    <p>Assign tasks and manage nurses' work.</p>
                    <a href="/view/doctor_assign_task.php" class="btn btn-primary">Assign Work</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box">
                    <h3>Task Status</h3>
                    <p>Nurse Task Update Show..</p>
                    <a href="/model/view_task.php"class="btn btn-primary"> View Task</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box">
                    <h3>Patients Health Live</h3>
                    <p>Live Health Tracking...</p>
                    <a href="/model/Dalert.php" class="btn btn-primary">Live Health Data</a>
                </div>
            </div>  
                      
            <div class="col-md-4">
                <div class="box">
                    <h3>Check Patient Condition</h3>
                    <p>Monitor and analyze patients' conditions.</p>
                    <a href="/model/chart.php" class="btn btn-primary">Check Condition</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box">
                    <h3>About Patient</h3>
                    <p>View detailed information about patients.</p>
                    <a href="/model/patients_list.php" class="btn btn-primary">View Patients</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box">
                    <h3>About Nurse</h3>
                    <p>View detailed information about nurses.</p>
                    <a href="/model/nurse_list.php" class="btn btn-primary">View Nurses</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box">
                    <h3>Download Record</h3>
                    <p>Download patient and medical records.</p>
                    <a href="/model/record.php" class="btn btn-primary">Download Records</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Sample JavaScript Alert
        document.addEventListener('DOMContentLoaded', (event) => {
            alert('Welcome to the Doctor Dashboard!');
        });
    </script>
</body>
</html>
