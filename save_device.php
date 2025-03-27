<?php
include "config.php";

if (!$conn) {
    die("Database error.");
}

$ip = $_SERVER['REMOTE_ADDR'];
$agent = $_SERVER['HTTP_USER_AGENT'];

// Masukkan data ke database
$query = $conn->prepare("INSERT INTO visitors (ip, user_agent) VALUES (?, ?)");
$query->bind_param("ss", $ip, $agent);
$query->execute();
$query->close();

echo "Data tersimpan!";
?>