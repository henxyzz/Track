<?php include "config.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h1 class="text-center">📊 Data Pengunjung</h1>
    <table class="table table-bordered">
        <tr>
            <th>IP</th>
            <th>Device</th>
            <th>Browser</th>
            <th>User Agent</th>
            <th>Aksi</th>
        </tr>
        <?php
        $result = $conn->query("SELECT * FROM visitors");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['ip']}</td>
                    <td>{$row['device']}</td>
                    <td>{$row['browser']}</td>
                    <td>{$row['user_agent']}</td>
                    <td>
                        <a href='delete.php?id={$row['id']}' class='btn btn-danger btn-sm'>Hapus</a>
                    </td>
                  </tr>";
        }
        ?>
    </table>
</body>
</html>