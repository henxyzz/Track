<?php
include 'config.php';

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM devices WHERE id=$id");
    header("Location: admin.php");
}

$result = $conn->query("SELECT * FROM devices ORDER BY timestamp DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Tracking</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        a { text-decoration: none; color: red; }
    </style>
</head>
<body>
    <h2>Admin Panel - Daftar Device</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>IP</th>
            <th>Negara</th>
            <th>Kota</th>
            <th>ISP</th>
            <th>Brand</th>
            <th>Model</th>
            <th>Bot?</th>
            <th>Action</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['ip'] ?></td>
                <td><?= $row['country'] ?></td>
                <td><?= $row['city'] ?></td>
                <td><?= $row['isp'] ?></td>
                <td><?= $row['brand'] ?></td>
                <td><?= $row['model'] ?></td>
                <td><?= $row['is_bot'] ? 'YES' : 'NO' ?></td>
                <td><a href="?delete=<?= $row['id'] ?>" onclick="return confirm('Yakin hapus?')">Hapus</a></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>