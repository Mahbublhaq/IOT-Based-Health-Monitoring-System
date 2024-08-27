<?php
session_start();


// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection script here
    $mysqli = new mysqli("localhost", "root", "", "health");

    // Validate form data
    $task_id = $_POST['task_id'];

    // Prepare and execute SQL statement to mark task as completed
    $query = "UPDATE tasks SET task_completed = 1, task_completed_time = CURRENT_TIMESTAMP WHERE id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $task_id);
    $stmt->execute();
    $stmt->close();

    // Redirect to nurse dashboard or show success message
    header("Location: ../view/nurse_view.php");
    exit;
}
?>
