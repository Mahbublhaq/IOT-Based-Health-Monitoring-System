<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nurse Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        /* Global Styles */
        body {
            font-family: 'Arial', sans-serif;
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
            margin-left:16.3%;
        }

        .sidebar {
            background: black ;
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
            background: linear-gradient(135deg, rgb(255, 65, 108), rgb(255, 75, 43));
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
            background-color:lightgoldenrodyellow;
            
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
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <h1>IOT Based Smart Health Monitoring System</h1>
    </header>

    <!-- Sidebar -->
    <div class="sidebar">
    <h5  class="text-center mb-4"><i class="fa fa-home" aria-hidden="true"> Home</i></h5>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="/model/Nalert.php"><i class="fas fa-info-circle icon"></i> Patient Health Live Info</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/model/npatients_list.php"><i class="fas fa-users icon"></i> Patients List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/model/ndoctor_list.php"><i class="fas fa-user-md icon"></i> Doctors List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/view/nurse_view.php"><i class="fas fa-tasks icon"></i> View Task</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/model/ninfo.php"><i class="fas fa-user-edit icon"></i> Update Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/model/logout.php"><i class="fas fa-sign-out-alt icon"></i> Logout</a>
            </li>
        </ul>
    </div>

    <!-- Page content -->
    <div class="content">
        <h2 class="text-center mb-4">Nurse Dashboard</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="box">
                    <h3>Patient Health Live Info</h3>
                    <p>Monitor live health data of patients.</p>
                    <a href="/model/Nalert.php" class="btn btn-primary">View Info</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box">
                    <h3>Patients List</h3>
                    <p>View detailed list of patients.</p>
                    <a href="/model/npatients_list.php" class="btn btn-primary">View List</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box">
                    <h3>Doctors List</h3>
                    <p>View detailed list of doctors.</p>
                    <a href="/model/ndoctor_list.php" class="btn btn-primary">View List</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box">
                    <h3>View Task</h3>
                    <p>View and manage assigned tasks.</p>
                    <a href="/view/nurse_view.php" class="btn btn-primary">View Task</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box">
                    <h3>Update Profile</h3>
                    <p>Update your profile information.</p>
                    <a href="/model/ninfo.php" class="btn btn-primary">Update Profile</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box">
                    <h3>Logout</h3>
                    <p>Logout from the system.</p>
                    <a href="/model/logout.php" class="btn btn-primary">Logout</a>
                </div>
            </div>


        </div>
        
       


    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Custom JavaScript -->
    <script>
        // Toggle sidebar width
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('.sidebar').toggleClass('active');
            });
        });
    </script>
</body>
</html>
