<?php
session_start();
include('db_connection.php');

if (!isset($_SESSION['username'])) {
    header('Location: login.html'); // Redirect to login if not logged in
    exit();
}

$username = $_SESSION['username'];

$sql = "SELECT subject, score FROM test_yourself WHERE username='$username'";
$result = $conn->query($sql);
$test_data = [];

while ($row = $result->fetch_assoc()) {
    $test_data[] = ['subject' => $row['subject'], 'score' => $row['score']];
}

echo json_encode($test_data);
?>
