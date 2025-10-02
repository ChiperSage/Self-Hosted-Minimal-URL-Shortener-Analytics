<?php
include "../config.php";

$result = $conn->query("SELECT id, original_url, short_code, hit_count, created_at FROM urls ORDER BY created_at DESC");

echo "<h2>Admin Dashboard - URL Shortener</h2>";
echo "<table border=1>
<tr>
    <th>ID</th>
    <th>Original URL</th>
    <th>Short Code</th>
    <th>Clicks</th>
    <th>Created</th>
    <th>Analytics</th>
</tr>";

while ($row = $result->fetch_assoc()) {
    $shortLink = "http://localhost/redirect.php?c=" . $row['short_code'];
    echo "<tr>
        <td>{$row['id']}</td>
        <td><a href='{$row['original_url']}' target='_blank'>{$row['original_url']}</a></td>
        <td><a href='$shortLink' target='_blank'>{$row['short_code']}</a></td>
        <td>{$row['hit_count']}</td>
        <td>{$row['created_at']}</td>
        <td><a href='../analytics.php?c={$row['short_code']}'>View</a></td>
    </tr>";
}
echo "</table>";
?>
