<?php
include "config.php";

$code = $_GET["c"] ?? null;
if (!$code) die("Missing code");

$stmt = $conn->prepare("SELECT id, original_url, hit_count FROM urls WHERE short_code=?");
$stmt->bind_param("s", $code);
$stmt->execute();
$stmt->bind_result($id, $url, $hits);
if (!$stmt->fetch()) die("Link not found");
$stmt->close();

echo "<h3>Analytics for: $url</h3>";
echo "Total clicks: $hits <br><br>";

$result = $conn->query("SELECT ip, referrer, created_at FROM url_hits WHERE url_id=$id ORDER BY created_at DESC LIMIT 20");

echo "<table border=1><tr><th>IP</th><th>Referrer</th><th>Time</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr><td>{$row['ip']}</td><td>{$row['referrer']}</td><td>{$row['created_at']}</td></tr>";
}
echo "</table>";
?>
