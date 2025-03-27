<?php 
include "config.php";

// Ambil ID dari URL
$id = isset($_GET['id']) ? $_GET['id'] : '';

// Hapus data pengunjung berdasarkan ID
$query = "DELETE FROM visitors WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();

// Redirect ke admin.php setelah menghapus
header("Location: admin.php");
exit();
?>