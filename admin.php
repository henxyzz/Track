<?php include "config.php"; ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h1 class="text-center">📊 Data Pengunjung</h1>
    
    <!-- Search Form -->
    <form method="GET" action="" class="mb-3">
        <input type="text" name="search" placeholder="Cari berdasarkan IP, Device, atau Browser" class="form-control" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
        <button type="submit" class="btn btn-primary mt-2">Cari</button>
    </form>

    <table class="table table-bordered">
        <tr>
            <th>IP</th>
            <th>Device</th>
            <th>Browser</th>
            <th>User Agent</th>
            <th>Aksi</th>
        </tr>

        <?php
        // Search Functionality
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $query = "SELECT * FROM visitors WHERE ip LIKE '%$search%' OR device LIKE '%$search%' OR browser LIKE '%$search%'";
        $result = $conn->query($query);
        
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['ip']}</td>
                    <td>{$row['device']}</td>
                    <td>{$row['browser']}</td>
                    <td>{$row['user_agent']}</td>
                    <td>
                        <a href='edit.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                        <a href='delete.php?id={$row['id']}' class='btn btn-danger btn-sm'>Hapus</a>
                    </td>
                  </tr>";
        }
        ?>
    </table>
</body>
</html>