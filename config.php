<?php
$mysql_uri = "mysql://user:password@localhost/tracking_db"; // Ganti sesuai kredensial

$uri_parts = parse_url($mysql_uri);

$host = $uri_parts['host'];
$user = $uri_parts['user'];
$pass = $uri_parts['pass'];
$db   = ltrim($uri_parts['path'], '/');

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>