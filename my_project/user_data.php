<?php
include('db_connection.php');
session_start();

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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Performance Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="performance.css">
</head>
<body>
    <h1>Welcome, <?php echo $username; ?></h1>
    <h2>Performance Dashboard</h2>
    <canvas id="performanceChart" width="800" height="500"></canvas>

    <script>
        var ctx = document.getElementById('performanceChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?php echo json_encode(array_column($performance_data, 'subject')); ?>,
                datasets: [{
                    label: 'Score',
                    data: <?php echo json_encode(array_column($performance_data, 'score')); ?>,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100 // Customize the max value as needed
                    }
                }
            }
        });
    </script>
</body>
</html>
