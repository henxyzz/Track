<?php
include 'config.php';

$data = json_decode(file_get_contents("php://input"), true);

$sql = "INSERT INTO devices (ip, country, region, city, isp, user_agent, screen_width, screen_height, viewport_width, viewport_height, language, platform, cookies_enabled, timezone, brand, model, is_bot)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssiiiiisssssi",
    $data['ip'], $data['country'], $data['region'], $data['city'], $data['isp'],
    $data['userAgent'], $data['screenWidth'], $data['screenHeight'], $data['innerWidth'], $data['innerHeight'],
    $data['language'], $data['platform'], $data['cookiesEnabled'], $data['timezone'],
    $data['brand'], $data['model'], $data['isBot']
);

if ($stmt->execute()) {
    echo "Data berhasil disimpan!";
} else {
    echo "Gagal menyimpan data: " . $conn->error;
}
$stmt->close();
?>