<?php
include "config.php";

if (!isset($_GET["c"])) die("Invalid request");

$code = $_GET["c"];

// cek shortlink
$stmt = $conn->prepare("SELECT id, original_url FROM urls WHERE short_code=?");
$stmt->bind_param("s", $code);
$stmt->execute();
$stmt->bind_result($id, $original_url);

if ($stmt->fetch()) {
    // update hit count
    $conn->query("UPDATE urls SET hit_count = hit_count + 1 WHERE id=$id");

    // catat analytics
    $ip = $_SERVER['REMOTE_ADDR'];
    $ua = $_SERVER['HTTP_USER_AGENT'];
    $ref = $_SERVER['HTTP_REFERER'] ?? null;

    $log = $conn->prepare("INSERT INTO url_hits (url_id, ip, user_agent, referrer) VALUES (?,?,?,?)");
    $log->bind_param("isss", $id, $ip, $ua, $ref);
    $log->execute();

    header("Location: $original_url");
    exit;
} else {
    echo "Link not found!";
}
?>
