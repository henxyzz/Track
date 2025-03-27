<?php 
include "config.php";

// Ambil ID dari URL
$id = isset($_GET['id']) ? $_GET['id'] : '';

// Ambil data pengunjung dari database
$query = "SELECT * FROM visitors WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $device = $_POST['device'];
    $browser = $_POST['browser'];
    $user_agent = $_POST['user_agent'];

    // Update data pengunjung
    $updateQuery = "UPDATE visitors SET device = ?, browser = ?, user_agent = ? WHERE id = ?";
    $stmtUpdate = $conn->prepare($updateQuery);
    $stmtUpdate->bind_param("sssi", $device, $browser, $user_agent, $id);
    $stmtUpdate->execute();

    header("Location: admin.php"); // Redirect setelah update
    exit();
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Pengunjung</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h1>Edit Data Pengunjung</h1>
    
    <form method="POST">
        <div class="mb-3">
            <label for="device" class="form-label">Device</label>
            <input type="text" name="device" id="device" class="form-control" value="<?php echo $row['device']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="browser" class="form-label">Browser</label>
            <input type="text" name="browser" id="browser" class="form-control" value="<?php echo $row['browser']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="user_agent" class="form-label">User Agent</label>
            <input type="text" name="user_agent" id="user_agent" class="form-control" value="<?php echo $row['user_agent']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>

    <a href="admin.php" class="btn btn-secondary mt-3">Kembali</a>
</body>
</html>