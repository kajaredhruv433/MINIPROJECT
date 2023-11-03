<?php
include('db_connection.php');

$query = "SELECT subject, AVG(score) as average FROM academic_data GROUP BY subject";
$result = $conn->query($query);

$academic_data = [
    'subjects' => [],
    'scores' => []
];

while ($row = $result->fetch_assoc()) {
    $academic_data['subjects'][] = $row['subject'];
    $academic_data['scores'][] = $row['average'];
}

echo json_encode($academic_data);
$conn->close();
?>
