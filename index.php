<?php include "config.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>URL Shortener</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <h2>Minimal URL Shortener</h2>
    <form action="shorten.php" method="post">
        <input type="url" name="url" placeholder="Enter long URL" required>
        <button type="submit">Shorten</button>
    </form>
</body>
</html>
