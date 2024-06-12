<?php
include "../include/config.php";

if (isset($_GET['content_id'])) {
    $content_id = $_GET['content_id'];

    // Query untuk menghapus data
    $sql = "DELETE FROM content_food WHERE content_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $content_id);

    if ($stmt->execute()) {
        echo "Record deleted successfully";
        header("Location: index.php"); // Redirect kembali ke halaman utama setelah penghapusan
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
