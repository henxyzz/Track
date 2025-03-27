<?php
// Konfigurasi Database
define('DB_HOST', 'b5a9pf0n7clohxbsy3cb-mysql.services.clever-cloud.com');
define('DB_USER', 'undolvldxoi5pdjz');
define('DB_PASS', 'yLs0bVsz4S674Q2yWQ9');
define('DB_NAME', 'b5a9pf0n7clohxbsy3cb');
define('DB_PORT', 21442);

// Membuat koneksi ke database
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Pastikan karakter encoding UTF-8
$conn->set_charset("utf8");
?>