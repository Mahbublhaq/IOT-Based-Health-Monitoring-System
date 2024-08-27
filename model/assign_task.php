<?php
session_start();


// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection script here
    $mysqli = new mysqli("localhost", "root", "", "health");

    // Validate form data
    $patient_id = $_POST['patient_id'];
    $nurse_id = $_POST['nurse_id'];
    $medicine = $_POST['medicine'];
    $eat_time = $_POST['eat_time'];
    $other_details = $_POST['other_details'];

    // Prepare and execute SQL statement to insert task assignment
    $query = "INSERT INTO tasks (patient_id, nurse_id, medicine, eat_time, other_details, assigned_by_doctor_id) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("iisssi", $patient_id, $nurse_id, $medicine, $eat_time, $other_details, $_SESSION['id']);
    $stmt->execute();
    $stmt->close();

    // Redirect to doctor dashboard or show success message
    header("Location: ../view/doctor_dashbord.php");
    exit;
}
?>
