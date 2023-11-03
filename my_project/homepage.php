<?php
session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Performance Dashboard</title>
    <style>
        /* CSS for the Navbar */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2; /* Light gray background */
        }

        .navbar {
            background-color: #333;
            overflow: hidden;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0px 20px;
        }

        .navbar a {
            font-size: 16px;
            color: #fff;
            text-align: center;
            padding: 16px 20px;
            text-decoration: none;
            transition: background-color 0.3s, color 0.3s;
        }

        .navbar a:hover {
            background-color: #4CAF50; /* Green on hover */
            color: #fff;
        }

        .navbar a::after {
            content: '';
            display: block;
            width: 0;
            height: 2px;
            background-color: #4CAF50; /* Green underline */
            transition: width 0.3s;
        }

        .navbar a:hover::after {
            width: 100%; /* Full width on hover */
        }

        .username {
            color: #fff;
            margin-left: auto;
        }

        /* Additional Content Styles */
        .dashboard-content {
            padding: 20px;
        }

        .Test_yourself {
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .performance-trends {
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="homepage.php"><h1 align="center"><b>Home</b></h1></a>
        <a href="academics.php">Academics</a>
        <a href="performance.php">Performance</a>
        <a href="http://erp.vcet.edu.in/login.htm;jsessionid=6C48A25405B3742ED71FC103134703DD">ERP portal</a>
        <div class="username">
            <?php echo $username; ?>
        </div>
    </div>

    <div class="dashboard-content">
        <div class="Test_yourself">
            <h2><a href="test_yourself.php" style="color: black; text-decoration: none;">Test Yourself</a></h2>
            <!-- Add performance metrics here -->
        </div>

        <div class="performance-trends">
            <h2>Performance Trends</h2>
            <!-- Add performance trend charts here -->
        </div>
    </div>

    <!-- Your homepage content goes here -->

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>
