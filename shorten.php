<?php
include "config.php";
include "functions.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $original_url = trim($_POST["url"]);
    if (!filter_var($original_url, FILTER_VALIDATE_URL)) {
        die("Invalid URL");
    }

    $code = generateCode(6);

    // pastikan unik
    $stmt = $conn->prepare("SELECT id FROM urls WHERE short_code=?");
    $stmt->bind_param("s", $code);
    $stmt->execute();
    while ($stmt->fetch()) {
        $code = generateCode(6);
    }
    $stmt->close();

    $stmt = $conn->prepare("INSERT INTO urls (original_url, short_code) VALUES (?, ?)");
    $stmt->bind_param("ss", $original_url, $code);
    $stmt->execute();

    echo "Your short URL: <a href='redirect.php?c=$code'>http://localhost/redirect.php?c=$code</a>";
}
?>
