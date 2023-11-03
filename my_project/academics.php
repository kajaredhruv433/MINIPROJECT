<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Mini Project</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chart.js">
<style>
   body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-image: url('C:\Users\dhruv\OneDrive\Pictures\wallpaper\Dark theme\wp7576888.webp');
    background-size: cover;
    background-attachment: fixed;
  }
  .navbar {
    background-color: #69018cf6;
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
    background-color: #c9b4ce;
    color: #ffffff;
  }
  .bar {
  display: flex;
  align-items: center;
  border: 1px solid #ccc;
  background-color: rgba(249, 249, 249, 0.5); /* Use rgba for transparency */
  border-radius: 20px;
  position: relative;
  padding: 10px;
  margin-bottom: 20px;
  margin-left: 10px;
  margin-right: 10px;
  margin-top: 10px;
}

  .section {
    width: 33.33%;
    text-align: left; /* Changed text alignment to left */
  }
  .subject-name {
    font-weight: bold;
    text-align: left;
    margin-bottom: 5px;
  }
  .link {
  font-size: 12px;
  color: black; /* Set link color to black */
  text-decoration: none; /* Remove underline */
  display: block;
}

  .stats {
    font-size: 18px;
    margin: 10px 0;
  }
  .chart-container {
    position: relative;
    width: 100%;
  }
  .chart-container canvas {
    border: 2px solid #a4393900;
    border-radius: 50%;
  }
  .separator {
    border-left: 1px solid #ccc;
    height: 100%;
    margin: 0 10px;
  }
</style>
</head>

<body>
<div class="navbar">
        <a> 
            <h1 align="center"><b> Academics</b></h1>
        </a>
        <HR>
        <dl>
            <a href= "homepage.php"> Home </a>
            <a href="performance.php">Performance</a>
          
            <a href="http://erp.vcet.edu.in/login.htm;jsessionid=6C48A25405B3742ED71FC103134703DD">ERP portal</a>
            
            <br>
            <br>
            <br>
            <HR>
        </div>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mini_project"; // Replace with your actual database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT subject, MAX(score) AS highest_score, AVG(score) AS average_score FROM academic_data GROUP BY subject";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $subject = $row["subject"];
    $highest_score = $row["highest_score"];
    $average_score = round($row["average_score"], 2);
    $progress = round(($highest_score + $average_score) / 2, 2);

    // Generate HTML and JavaScript dynamically with the fetched data
    echo "
      <div class='bar'>
        <div class='section'>
          <div class='subject-name'>$subject</div>
          <a class='link' href='#section1ref'>Reference Material</a>
        </div>
        <div class='separator'></div>
        <div class='section'>
          <div class='stats'>Highest Score: $highest_score%</div>
          <div class='stats'>Average Score: $average_score%</div>
          <div class='stats'>Progress: $progress%</div>
        </div>
        <div class='separator'></div>
        <div class='section'>
          <div class='chart-container'>
            <canvas class='chart' data-highest='$highest_score' data-average='$average_score' data-progress='$progress'></canvas>
          </div>
        </div>
      </div>
    ";
  }
} else {
  echo "0 results";
}
$conn->close();
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var charts = document.querySelectorAll('.chart');
    charts.forEach(function(chart) {
      var ctx = chart.getContext('2d');
      var highest = chart.dataset.highest;
      var average = chart.dataset.average;
      var progress = chart.dataset.progress;

      var data = {
        datasets: [
          {
            data: [progress, 100 - progress],
            backgroundColor: ['#36a2eb', '#eff6fc'],
            borderWidth: 1
          },
          {
            data: [average, 100 - average],
            backgroundColor: ['#2ecc71', '#edf7ec'],
            borderWidth: 1
          },
          {
            data: [highest, 100 - highest],
            backgroundColor: ['#f39c12', '#fdf5e6'],
            borderWidth: 1
          }
        ]
      };

      var options = {
        responsive: true,
        maintainAspectRatio: false,
        cutoutPercentage: 50 // Adjust to control the size of the inner circle
      };
      new Chart(ctx, {
        type: 'doughnut',
        data: data,
        options: options
      });
    });
  });
</script>
</body>
</html>
