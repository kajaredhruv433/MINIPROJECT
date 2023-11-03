<?php
include 'db_connection.php';
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}


// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Decode the JSON data sent from the quiz page
    $data = json_decode(file_get_contents('php://input'));

    if ($data) {
        $username = $data->username;
        $subject = $data->subject;
        $score = $data->score;

        // Insert the score into the database
        $sql = "INSERT INTO performance_data (username, subject, score) VALUES ('$username', '$subject', $score)";

        if ($conn->query($sql) === TRUE) {
            $response = ['message' => 'Score updated successfully.'];
            echo json_encode($response);
        } else {
            $response = ['error' => 'Error updating score: ' . $conn->error];
            echo json_encode($response);
        }
    } else {
        $response = ['error' => 'Invalid data format.'];
        echo json_encode($response);
    }
} else {
    $response = ['error' => 'Invalid request method.'];
    echo json_encode($response);
}

$conn->close();
?>
