<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mini_project"; // Replace with your actual database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create a table for storing academic data
$sql = "CREATE TABLE academic_data (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    subject VARCHAR(255) NOT NULL,
    marks INT(11) NOT NULL,
    FOREIGN KEY (username) REFERENCES users(username)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table academic_data created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
