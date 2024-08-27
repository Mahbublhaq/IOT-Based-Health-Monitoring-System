<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients Information </title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            margin-top: 50px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            background-color: #007bff;
            color: #fff;
            padding: 20px;
            text-align: center;
            margin-bottom: 30px;
        }

        img.profile-picture {
            max-width: 200px;
            max-height: 200px;
            margin-top: 10px;
        }

        form {
            margin-top: 20px;
        }

        input[type="file"] {
            margin-bottom: 10px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        h3{
            background-color: black;
            color: white;
            width:20%;
            margin-left: 40%;
            text-align: center;
            margin-top: 10px;

        }
    </style>
</head>
<body>
    <?php
    // Start session
    session_start();

    // Connect to the database (replace with your database credentials)
    $mysqli = new mysqli("localhost", "root", "", "health");

    // Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Retrieve logged-in user's information
    $id = $_SESSION['id'];
    $role = $_SESSION['role'];

    // Define table based on role
    if ($role == 'patients') {
        $table = 'patients';
    } elseif ($role == 'doctors') {
        $table = 'doctors';
    } elseif ($role == 'nurses') {
        $table = 'nurses';
    } else {
        die("Invalid role");
    }

    // Fetch user information
    $query = "SELECT * FROM $table WHERE id = $id";
    $result = $mysqli->query($query);

   
    echo '<h1>IOT Based Smart Health Monitoring System</h1>';
    include("../header/nurse_header.php");
    echo '<h3>Nurses Information</h1>';
   
    echo '<div class="container">';

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Display or add profile picture
        echo '<div class="text-center">';
        $user_id = $row['id'];
        $picture_query = "SELECT * FROM picture WHERE user_id = $user_id";
        $picture_result = $mysqli->query($picture_query);

        if ($picture_result->num_rows > 0) {
            $picture_row = $picture_result->fetch_assoc();
            $imagePath = $picture_row['image_path'];
            $imageUrl = $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) . '/' . $imagePath;
            echo '<img src="' . $imageUrl . '" alt="Profile Picture" class="profile-picture rounded-circle">';
        } else {
            // Show a default circular profile picture
            echo '<img src="https://via.placeholder.com/500x500?text=No+Picture" alt="Default Profile Picture" class="profile-picture rounded-circle">';
            
            // Add profile picture option
            echo '<form action="/model/upload_profile_picture.php" method="post" enctype="multipart/form-data">';
            echo '<div class="form-group">';
            echo '<label for="fileToUpload">Profile Picture:</label>';
            echo '<input type="file" name="fileToUpload" id="fileToUpload" class="form-control-file">';
            echo '</div>';
            echo '<button type="submit" name="submit" class="btn btn-primary">Upload Image</button>';
            echo '</form>';
        }
        echo '</div>';

        // Display other user information
        echo "<div class='container mt-4'>";
        echo "<h2>Welcome, {$row['name']}</h2>";
        echo "<p>ID: {$row['id']}</p>";
        echo "<p>Name: {$row['name']}</p>";
        echo "<p>Email: {$row['email']}</p>";
        echo "<p>Phone: {$row['phone']}</p>";
        echo "<p>Address: {$row['address']}</p>";
        echo "<p>Role: {$row['role']}</p>";
        echo "</div>";

    } else {
        echo "User not found";
    }

    echo '</div>';

    $mysqli->close();
    ?>

    <!-- Bootstrap JS (optional, if you need Bootstrap functionality) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
