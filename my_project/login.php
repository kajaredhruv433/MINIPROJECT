<?php
include('db_connection.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $_SESSION['username'] = $username;
        header('Location: homepage.php');
        exit();
    } else {
        echo "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login or Signup</title>
    <link rel="stylesheet" href="login_page.css">
    <style>
        {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Global styles */
        body {
            font-family: 'Helvetica', sans-serif;
            background: linear-gradient(to bottom, #3498db, #2980b9);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* Container styles */
        .container {
            max-width: 400px;
            background-color: rgba(255, 255, 255, 0.37);
            padding: 70px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        /* Header styles */
        .header {
            font-size: 28px;
            font-weight: bold;
            color: #ffffff;
            margin-bottom: 20px;
        }

        /* Form styles */
        form {
            display: flex;
            flex-direction: column;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"],
        button {
            margin: 10px 0;
            padding: 12px;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            color: #333;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"] {
            padding-left: 15px;
        }

        button {
            background-color: #2980b9;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #3498db;
        }

        /* Switch styles */
        .switch {
            margin-top: 20px;
        }

        .switch a {
            text-decoration: none;
            color: #3498db;
            font-weight: bold;
        }

        /* Video background styles */
        video#background-video {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        /* Content styles */
        .content {
            position: relative;
            z-index: 1;
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<body>
    <video autoplay muted loop id="background-video">
        <source src="stars.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="container">
        <div class="header">
            <h2>Login</h2>
        </div>
        <form action="login.php" method="POST">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <button type="submit">Login</button>
        </form>
        
        <div class="switch">
            <p>Don't have an account? <a href="signup.html">Signup</a></p>
        </div>
    </div>
    <div class="content">
        <!-- Your content goes here -->
    </div>
</body>
</html>
