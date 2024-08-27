<?php
// Connect to the database (replace with your database credentials)
$mysqli = new mysqli("localhost", "root", "", "health");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Get form data

$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$role = $_POST['role'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$name = $_POST['name'];
$email = $_POST['email'];
$specialization = $_POST['specialization'];

// Insert user into the appropriate table based on role
switch ($role) {
    case 'patients':
        $table = 'patients';
        break;
    case 'doctors':
        $table = 'doctors';
        break;
    case 'nurses':
        $table = 'nurses';
        break;
    default:
        die("Invalid role");
}

//specilization insert when doctor select
if ($role == 'doctors') {
    $query = "INSERT INTO $table (name, email, password, phone, address, specialization) VALUES ('$name', '$email', '$password', '$phone', '$address', '$specialization')";
} else {
    $query = "INSERT INTO $table (name, email, password, phone, address) VALUES ('$name', '$email', '$password', '$phone', '$address')";
}
$result = mysqli_query($mysqli, $query);

if ($result) {
    // alert(json_encode($result));
    echo "<script>alert('Signup successful!');</script>";
  
} else {
    echo "Error: " . $mysqli->error;
}


header("Location: ../view/login.php");
?>
