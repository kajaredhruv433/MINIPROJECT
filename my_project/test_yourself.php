<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MCQ Quiz</title>
    <style>
        /* Add your CSS styles here */
    </style>
</head>
<body>
    <div class="navbar">
        <a href="homepage.php"><h1 align="center"><b>Home</b></h1></a>
        <!-- Add other navigation links as needed -->
        <div class="username">
            <?php
            // Retrieve the username from the query parameter
            $username = isset($_GET['username']) ? $_GET['username'] : '';
            echo $username;
            ?>
        </div>
    </div>

    <h1>MCQ Quiz</h1>
    <form id="quiz-form" method="post">
        <ol>
            <li>
                <h3>1. If a train leaves Station A traveling east at 60 mph, and another train leaves Station B traveling west at 80 mph, how far apart will they be after 2 hours?</h3>
                <input type="radio" name="q1" value="A">a) 120 miles<br>
                <input type="radio" name="q1" value="B">b) 160 miles<br>
                <input type="radio" name="q1" value="C">c) 220 miles<br>
                <input type="radio" name="q1" value="D">d) 240 miles<br>
            </li>
            <li>
                <h3>2. In a standard deck of playing cards, what is the probability of drawing a red card (hearts or diamonds) on the first draw?</h3>
                <input type="radio" name="q2" value="A">a) 1/2<br>
                <input type="radio" name="q2" value="B">b) 1/4<br>
                <input type="radio" name="q2" value="C">c) 1/3<br>
                <input type="radio" name="q2" value="D">d) 2/3<br>
            </li>
            <li>
                <h3>3. How many degrees are in the interior angles of a regular hexagon?</h3>
                <input type="radio" name="q3" value="A">a) 90 degrees<br>
                <input type="radio" name="q3" value="B">b) 120 degrees<br>
                <input type="radio" name="q3" value="C">c) 135 degrees<br>
                <input type="radio" name="q3" value="D">d) 140 degrees<br>
            </li>
            <li>
                <h3>4. A father's age is three times that of his son. The sum of their ages is 48. How old is the son?</h3>
                <input type="radio" name="q4" value="A">a) 12 years old<br>
                <input type="radio" name="q4" value="B">b) 14 years old<br>
                <input type="radio" name="q4" value="C">c) 16 years old<br>
                <input type="radio" name="q4" value="D">d) 18 years old<br>
            </li>
            <li>
                <h3>5. Which gas makes up the majority of the Earth's atmosphere?</h3>
                <input type="radio" name="q5" value="A">a) Oxygen<br>
                <input type="radio" name="q5" value="B">b) Carbon dioxide<br>
                <input type="radio" name="q5" value="C">c) Nitrogen<br>
                <input type="radio" name="q5" value="D">d) Hydrogen<br>
            </li>
            <li>
                <h3>6. Who is credited with the invention of the World Wide Web (WWW)?</h3>
                <input type="radio" name="q6" value="A">a) Tim Berners-Lee<br>
                <input type="radio" name="q6" value="B">b) Bill Gates<br>
                <input type="radio" name="q6" value="C">c) Steve Jobs<br>
                <input type="radio" name="q6" value="D">d) Mark Zuckerberg<br>
            </li>
            <li>
                <h3>7. Solve this math problem: If a car travels 200 miles at 40 miles per hour, how many hours will it take to reach the destination?</h3>
                <input type="radio" name="q7" value="A">a) 3 hours<br>
                <input type="radio" name="q7" value="B">b) 4 hours<br>
                <input type="radio" name="q7" value="C">c) 5 hours<br>
                <input type="radio" name="q7" value="D">d) 6 hours<br>
            </li>
            <li>
                <h3>8. If you have a cube made up of 27 smaller cubes (3x3x3), and you paint the outer layer of cubes, how many smaller cubes have paint on them?</h3>
                <input type="radio" name="q8" value="A">a) 9<br>
                <input type="radio" name="q8" value="B">b) 18<br>
                <input type="radio" name="q8" value="C">c) 24<br>
                <input type="radio" name="q8" value="D">d) 26<br>
            </li>
            <li>
                <h3>9. If a right triangle has one leg measuring 8 units and the hypotenuse is 10 units, what is the length of the other leg?</h3>
                <input type="radio" name="q9" value="A">a) 4 units<br>
                <input type="radio" name="q9" value="B">b) 6 units<br>
                <input type="radio" name="q9" value="C">c) 8 units<br>
                <input type="radio" name="q9" value="D">d) 12 units<br>
            </li>
            <li>
                <h3>10. If a store offers a "buy one, get the second one at half price" deal, and an item costs $40, how much will two of these items cost in total?</h3>
                <input type="radio" name="q10" value="A">a) $40<br>
                <input type="radio" name="q10" value="B">b) $50<br>
                <input type="radio" name="q10" value="C">c) $60<br>
                <input type="radio" name="q10" value="D">d) $70<br>
            </li>
        </ol>
        <input type="submit" value="Submit Quiz">
    </form>

    <script>
        // JavaScript code for handling the quiz submission
        const quizForm = document.getElementById("quiz-form");

        quizForm.addEventListener("submit", function (event) {
            event.preventDefault();

            // Calculate the score
            let score = 0;
            const answers = ["B", "A", "B", "C", "C", "A", "B", "B", "A", "C"]; // Correct answers for each question

            for (let i = 1; i <= 10; i++) {
                const selectedOption = document.querySelector(`input[name="q${i}"]:checked`);
                if (selectedOption) {
                    if (selectedOption.value === answers[i - 1]) {
                        score += 10; // Each correct answer is worth 10 points
                    }
                }
            }

            // Display the score
            alert(`Your score: ${score}`);

            // Send the score to the server (using Fetch API)
            fetch("test_yourself.php", {
                method: "POST",
                body: JSON.stringify({ username: "<?php echo $username; ?>", subject: 1, score: score, test: 1 }),
                headers: {
                    "Content-Type": "application/json"
                }
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                // Handle the server response here
            });
        });
    </script>

    <?php
    // PHP code for handling the score submission
    include 'db_connection.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents('php://input'));

        if ($data) {
            $user_id = $data->username; // Assuming 'username' represents the user's ID
            $subject = $data->subject;
            $score = $data->score;
            $test = $data->test;

            $sql = "INSERT INTO performance (user_id, subject, score, test) VALUES ('$user_id', '$subject', '$score', '$test')";

            if ($conn->query($sql) === TRUE) {
                echo "Score updated successfully";
            } else {
                echo "Error updating score: " . $conn->error;
            }
        } else {
            echo "Invalid data format.";
        }
    }
    $conn->close();
    ?>
</body>
</html>
