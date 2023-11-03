<?php
session_start();
include('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_SESSION['username'];
    $subject = $_POST['subject'];
    $score = $_POST['score'];

    // Check if the user exists
    $result = $conn->query("SELECT id FROM users WHERE username='$username'");
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $user_id = $row['id'];

        // Insert a new record with the user's ID
        $query = "INSERT INTO academic_data (user_id, subject, score) VALUES ('$user_id', '$subject', '$score')";

        if ($conn->query($query) === TRUE) {
            echo "Marks added successfully";
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }
    } else {
        echo "User not found.";
    }

    $conn->close();
}
?>
