<?php
// Connect to the database (replace with your database credentials)
$mysqli = new mysqli("localhost", "root", "", "health");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Get form data
$email = $_POST['email'];
$role = $_POST['role'];
$phone = $_POST['phone'];
$new_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Determine the appropriate table based on the role
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

// Check if the email, role, and phone number match
$query = "SELECT * FROM $table WHERE email='$email' AND phone='$phone'";
$result = mysqli_query($mysqli, $query);

if (mysqli_num_rows($result) > 0) {
    // Update password
    $update_query = "UPDATE $table SET password='$new_password' WHERE email='$email' AND phone='$phone'";
    $update_result = mysqli_query($mysqli, $update_query);

    if ($update_result) {
        echo "<script>alert('Password reset successful!');</script>";
    } else {
        echo "Error: " . $mysqli->error;
    }
} else {
    echo "<script>alert('No matching user found with the provided email, role, and phone number.');</script>";
}

// Redirect to login page
header("Location: ../view/login.php");
?>
