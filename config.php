<?php
$host = "b5a9pf0n7clohxbsy3cb-mysql.services.clever-cloud.com";
$port = 21442;
$user = "undolvldxoi5pdjz";
$password = "yLs0bVsz4S674Q2yWQ9";
$database = "b5a9pf0n7clohxbsy3cb";

// Cek koneksi
$conn = new mysqli($host, $user, $password, $database, $port);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>ew mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>