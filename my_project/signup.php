<?php
include('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "INSERT INTO users (fullname, email, username, password) VALUES ('$fullname', '$email', '$username', '$password')";
    
    if ($conn->query($query) === TRUE) {
        header('Location: login.php'); // Redirect to login page after successful signup
        exit();
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
