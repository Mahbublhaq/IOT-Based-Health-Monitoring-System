<?php
// Start session
session_start();

// Connect to the database (replace with your database credentials)
$mysqli = new mysqli("localhost", "root", "", "health");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Get form data
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

if ($role == 'patients') {
    $table = 'patients';
    //check username and password
    $query = "SELECT * FROM $table WHERE email = '$username'";
    $result = $mysqli->query($query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['id'] = $row['id'];
           $_SESSION['role'] = $role;
            header("Location: /model/Pdashbord.php");
        } else {
            echo "Invalid username or password";
        }
    } else {
        echo "Invalid Role";
    }



} elseif ($role == 'doctors') {
    $table = 'doctors';
    //check username and password
    $query = "SELECT * FROM $table WHERE email = '$username'";
    $result = $mysqli->query($query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['role'] = $role;
            header("Location: ../view/doctor_dashbord.php");
        } else {
            echo "Invalid username or password";
        }
    } else {
        echo "Invalid Role";
    }

} elseif ($role == 'nurses') {
    $table = 'nurses';
    //check username and password
    $query = "SELECT * FROM $table WHERE email = '$username'";
    $result = $mysqli->query($query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['role'] = $role;
            header("Location: ../view/nurse_dashbord.php");
        } else {
            echo "Invalid username or password";
        }
    } else {
        echo "Invalid Role";
    }

} else {
    die("Invalid role");
}


$mysqli->close();
?>
