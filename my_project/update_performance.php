<?php
session_start();
include('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $subject = $_POST['subject'];
    $score = $_POST['score'];

    $query = "UPDATE performance_data SET username='$username', subject='$subject', score='$score' WHERE id='$id'";

    if ($conn->query($query) === TRUE) {
        echo "Performance data updated successfully";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
