<!DOCTYPE html>
<html lang="en">
<head>
    <title>Performance Dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="performance.css">
    <style>
        /* Your existing styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        
        .navbar {
            background-color: #281e5d;
            overflow: hidden;
        }

        .navbar a {
            float: left;
            font-size: 16px;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .navbar a:hover {
            background-color: #fff;
            color: #ddd;
        }

        #performance-graph {
            text-align: center;
            max-height: 110vh;
            margin-top: 10px;
        }

        .performance-container {
            margin: 0 auto; /* Center the container */
            max-width: 800px; /* Set the maximum width for the graph */
        }
    </style>
</head>

<body bgcolor="#ffffff">
    <div class="navbar">
        <a>
            <h1 align="center"><b> Performance Dashboard </b></h1>
        </a>
        <HR>
        <dl>
            <a href="homepage.php"> Home </a>
            <a href="academics.php">Academic Status</a>
            <a href="http://erp.vcet.edu.in/login.htm;jsessionid=6C48A25405B3742ED71FC103134703DD">ERP portal</a>
            <br>
            <br>
            <br>
            <HR>
        </div>

        <div id="performance-graph" class="performance-container">
            <canvas id="performance-chart" width="800" height="500"></canvas>
        </div>

        <!-- PHP code for fetching data from the "performance" table -->
        <?php
        include 'db_connection.php';

        // Fetch performance data from the database
        $sql = "SELECT test, score FROM performance WHERE subject = 1"; // Assuming subject 1
        $result = $conn->query($sql);

        $tests = array();
        $scores = array();

        while ($row = $result->fetch_assoc()) {
            $tests[] = "Test " . $row['test'];
            $scores[] = (int)$row['score'];
        }

        $conn->close();
        ?>

        <!-- Add a script to generate the chart using fetched data -->
        <script>
            var tests = <?php echo json_encode($tests); ?>;
            var scores = <?php echo json_encode($scores); ?>;
            
            var ctx = document.getElementById('performance-chart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: tests,
                    datasets: [{
                        label: 'Performance',
                        data: scores,
                        backgroundColor: 'rgba(0, 0, 255, 0.5)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1.5
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            suggestedMin: 0, // Minimum value on the y-axis
                            suggestedMax: 100, // Maximum value on the y-axis
                        }
                    }
                }
            });
        </script>
    </body>
    </html>
