<?php
include 'config.php';

$ip = $_SERVER['REMOTE_ADDR'];
$user_agent = $_SERVER['HTTP_USER_AGENT'];

$api_url = "http://ip-api.com/json/$ip";
$response = file_get_contents($api_url);
$data = json_decode($response, true);

$country = $data['country'] ?? 'Unknown';
$region = $data['regionName'] ?? 'Unknown';
$city = $data['city'] ?? 'Unknown';
$isp = $data['isp'] ?? 'Unknown';

$bot_keywords = ['bot', 'crawl', 'spider', 'curl', 'slurp', 'wget', 'headless'];
$is_bot = false;
foreach ($bot_keywords as $bot) {
    if (stripos($user_agent, $bot) !== false) {
        $is_bot = true;
        break;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cat money 💸</title>

    <!-- Meta SEO -->
    <meta name="description" content="Hasilkan Uang Sekarang Juga!">
    <meta name="keywords" content="tracking, device info, IP, lokasi, user agent">
    <meta name="author" content="Hasilkan Uang 2025">

    <!-- Open Graph (Facebook, WhatsApp, LinkedIn) -->
    <meta property="og:title" content="Hasilkan Uang">
    <meta property="og:description" content="Cek berita terbaru tentang cat moneyi!">
    <meta property="og:image" content="https://example.com/assets/preview.jpg"> <!-- Ganti dengan URL gambar -->
    <meta property="og:url" content="https://cat.cleverapps.io">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Hasilkan Uang">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Hasilkan Uang Dengan Mudah">
    <meta name="twitter:description" content="Cek berita terbaru tentang cat moneyi!">
    <meta name="twitter:image" content="https://example.com/assets/preview.jpg"> <!-- Ganti dengan URL gambar -->
    <meta name="twitter:site" content="@yourusername">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="https://example.com/assets/favicon.png">

    <script>
        function getDeviceInfo() {
            let ua = navigator.userAgent;
            let deviceInfo = {
                ip: "<?= $ip ?>",
                country: "<?= $country ?>",
                region: "<?= $region ?>",
                city: "<?= $city ?>",
                isp: "<?= $isp ?>",
                userAgent: ua,
                screenWidth: window.screen.width,
                screenHeight: window.screen.height,
                innerWidth: window.innerWidth,
                innerHeight: window.innerHeight,
                language: navigator.language,
                platform: navigator.platform,
                cookiesEnabled: navigator.cookieEnabled,
                timezone: Intl.DateTimeFormat().resolvedOptions().timeZone,
                brand: "Unknown",
                model: "Unknown",
                isBot: <?= $is_bot ? 'true' : 'false' ?>
            };

            let brands = {
                "samsung": "Samsung",
                "iphone": "Apple",
                "ipad": "Apple",
                "huawei": "Huawei",
                "xiaomi": "Xiaomi",
                "redmi": "Xiaomi",
                "oppo": "Oppo",
                "vivo": "Vivo",
                "realme": "Realme",
                "sony": "Sony",
                "nokia": "Nokia",
                "asus": "Asus",
                "lenovo": "Lenovo",
                "oneplus": "OnePlus",
                "motorola": "Motorola"
            };

            for (let key in brands) {
                if (ua.toLowerCase().includes(key)) {
                    deviceInfo.brand = brands[key];
                    break;
                }
            }

            let modelMatch = ua.match(/([^)]+)/);
            if (modelMatch && modelMatch[1]) {
                deviceInfo.model = modelMatch[1];
            }

            fetch('save_device.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(deviceInfo)
            });
        }

        window.onload = getDeviceInfo;
    </script>
</head>
<body>
    <h3>Tracking sedang berjalan...</h3>
</body>
</html>ndow.onload = getDeviceInfo;
    </script>
</head>
<body>
    <h3>Tracking sedang berjalan...</h3>
</body>
</html>