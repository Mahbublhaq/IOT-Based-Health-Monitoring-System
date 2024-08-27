<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professional Menu</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .navbar {
            /* Dark background color */
            padding-top: 15px;
            padding-bottom: 15px;
        }

        .navbar-brand {
            color: darkkhaki; /* White text color */
            font-weight: bold;
            font-size: 1.5rem;
        }

        .navbar-nav .nav-link {
            color: black !important; /* White text color */
            font-size: 1.1rem;
            transition: color 0.3s;
        }

        .navbar-nav .nav-link:hover {
            color: #17a2b8 !important; /* Highlight color on hover */
        }

        .navbar-toggler {
            border-color: #ffffff;
        }

        .navbar-toggler-icon {
            background-color: #ffffff;
        }
        .nav{
            background-color: lightgreen;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav">
                    <a class="nav-link" href="/view/nurse_dashbord.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/model/Nalert.php">Patient Health Live Info</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/view/nurse_view.php">View Task</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/model/ndoctor_list.php">Doctors</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/model/npatients_list.php">Patients List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/model/ninfo.php">Update Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/model/logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
