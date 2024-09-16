<html lang="en">

<head>
    <title>Number guessing game</title>
</head>

<body>
    <h1>Guess the number game</h1>

    <form method="post">
        <label for="guess">Enter your guess (between 1 and 100):</label>
        <input type="number" id="guess" name="guess" min="1" max="100" step="1" required value="<?php echo isset($_POST['guess']) ? $_POST['guess'] : ''; ?>">
        <input type="submit" value="Submit">
        <input type="submit" name="giveup" value="Give up">
    </form>

    <?php
    // Display the number of guesses
    session_start();
    if (isset($_SESSION['guesses']) && $_SESSION['guesses'] > 0) {
        echo "<p>You have already guessed " . $_SESSION['guesses'] . " times.</p>";
    }

    // Include the PHP logic and capture its output
    ob_start();    // Use output buffering
    include 'process_guess.php';
    $message = ob_get_clean();    // capture the output from process_guess.php and store it in the $message variable.

    if (isset($message) && !empty($message)) {
        echo "<p>$message</p>";
    }
    ?>

</body>

</html>