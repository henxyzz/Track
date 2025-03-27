<?php
include "config.php";

if (!$conn) {
    die("Database error.");
}

// Ambil data dari request
$ip = $_SERVER['REMOTE_ADDR'];
$agent = $_SERVER['HTTP_USER_AGENT'];
$screen_width = $_POST['screen_width'] ?? null;
$screen_height = $_POST['screen_height'] ?? null;
$viewport_width = $_POST['viewport_width'] ?? null;
$viewport_height = $_POST['viewport_height'] ?? null;
$language = $_POST['language'] ?? null;
$platform = $_POST['platform'] ?? null;
$cookies_enabled = $_POST['cookies_enabled'] ?? null;
$timezone = $_POST['timezone'] ?? null;
$brand = $_POST['brand'] ?? null;
$model = $_POST['model'] ?? null;

// Deteksi apakah bot
$is_bot = preg_match('/bot|crawl|spider|slurp/i', $agent) ? 1 : 0;

// Ambil informasi lokasi dari API IP
$ipData = json_decode(file_get_contents("http://ip-api.com/json/$ip"), true);
$country = $ipData['country'] ?? 'Unknown';
$region = $ipData['regionName'] ?? 'Unknown';
$city = $ipData['city'] ?? 'Unknown';
$isp = $ipData['isp'] ?? 'Unknown';

// Simpan ke database
$query = $conn->prepare("INSERT INTO devices (ip, country, region, city, isp, user_agent, screen_width, screen_height, viewport_width, viewport_height, language, platform, cookies_enabled, timezone, brand, model, is_bot) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$query->bind_param("ssssssiiiiisssssii", $ip, $country, $region, $city, $isp, $agent, $screen_width, $screen_height, $viewport_width, $viewport_height, $language, $platform, $cookies_enabled, $timezone, $brand, $model, $is_bot);

if ($query->execute()) {
    echo "Data berhasil disimpan!";
} else {
    echo "Gagal menyimpan data: " . $query->error;
}

$query->close();
$conn->close();
?>