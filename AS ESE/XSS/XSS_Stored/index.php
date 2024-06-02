<?php
session_start();

// Clear comments list if it exists
if(isset($_SESSION['comments'])) {
    unset($_SESSION['comments']);
}

$comments = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username']) && isset($_POST['comment'])) {
    $username = $_POST['username'];
    $comment = $_POST['comment'];
    
    // Store comment in session (simulating a database)
    $comments[] = array("username" => $username, "comment" => $comment);
    $_SESSION['comments'] = $comments;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Social Media Page</title>
</head>
<body>
    <h1>Social Media Page</h1>
    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br><br>
        <label for="comment">Comment:</label>
        <textarea id="comment" name="comment" required></textarea>
        <br><br>
        <input type="submit" value="Post Comment">
    </form>
    <h2>Comments:</h2>
    <ul>
        <?php
        foreach ($comments as $c) {
            echo "<li><strong>" . $c['username'] . ":</strong> " . $c['comment'] . "</li>";
        }
        ?>
    </ul>
</body>
</html>
