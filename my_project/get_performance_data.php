<?php
session_start();
include('db_connection.php');

if (!isset($_SESSION['username'])) {
    header('Location: login.html'); // Redirect to login if not logged in
    exit();
}

$username = $_SESSION['username'];

// Retrieve performance data specific to the logged-in user
$sql = "SELECT subject, score FROM performance_data WHERE username='$username'";
$result = $conn->query($sql);
$performance_data = [];

while ($row = $result->fetch_assoc()) {
    $performance_data[] = ['subject' => $row['subject'], 'score' => $row['score']];
}

echo json_encode($performance_data);
?>
