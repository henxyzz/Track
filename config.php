<?php
$mysql_uri = "mysql://undolvldxoi5pdjz:yLs0bVsz4S674Q2yWQ9@b5a9pf0n7clohxbsy3cb-mysql.services.clever-cloud.com:21442/b5a9pf0n7clohxbsy3cb"; // Ganti sesuai kredensial

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