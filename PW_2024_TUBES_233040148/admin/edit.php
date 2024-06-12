<?php
include "../include/config.php";

if (isset($_GET['conten_id'])) {
    $content_id = $_GET['conten_id'];

    // Query untuk mendapatkan data berdasarkan content_id
    $sql = "SELECT * FROM content_food WHERE conten_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $content_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $content_title = $row['content_title'];
        $content_food = $row['content_food'];
        $content_url = $row['content_url'];
        $content_photo = $row['content_photo'];
        $content_kategori = $row['content_kategori'];
        $admin_id = $row['admin_id'];
    } else {
        echo "No record found";
        exit();
    }

    $stmt->close();
} else {
    echo "Invalid content ID";
    exit();
}

// Proses update data ketika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $content_title = $_POST['content_title'];
    $content_food = $_POST['content_food'];
    $content_url = $_POST['content_url'];
    $content_photo = $_POST['content_photo'];
    $content_kategori = $_POST['content_kategori'];
    $admin_id = $_POST['admin_id'];

    $sql = "UPDATE content_food SET content_title = ?, content_food = ?, content_url = ?, content_photo = ?, content_kategori = ?, admin_id = ? WHERE conten_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $content_title, $content_food, $content_url, $content_photo, $content_kategori, $admin_id, $content_id);

    if ($stmt->execute()) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $stmt->close();
    $conn->close();

    // Redirect kembali ke halaman utama setelah pengeditan
    header("Location: admin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Edit Content</title>
</head>
<body>
    <div class="container">
        <h2>Edit Content</h2>
        <form action="edit.php?conten_id=<?php echo $content_id; ?>" method="POST">
            <div class="mb-3">
                <label for="content_title" class="form-label">Content Title</label>
                <input type="text" class="form-control" id="content_title" name="content_title" value="<?php echo htmlspecialchars($content_title); ?>" required>
            </div>
            <div class="mb-3">
                <label for="content_food" class="form-label">Content Food</label>
                <textarea class="form-control" id="content_food" name="content_food" rows="3" required><?php echo htmlspecialchars($content_food); ?></textarea>
            </div>
            <div class="mb-3">
                <label for="content_url" class="form-label">Content URL</label>
                <input type="url" class="form-control" id="content_url" name="content_url" value="<?php echo htmlspecialchars($content_url); ?>" required>
            </div>
            <div class="mb-3">
                <label for="content_photo" class="form-label">Content Photo</label>
                <input type="text" class="form-control" id="content_photo" name="content_photo" value="<?php echo htmlspecialchars($content_photo); ?>" required>
            </div>
            <div class="mb-3">
                <label for="content_kategori" class="form-label">Content Kategori</label>
                <input type="text" class="form-control" id="content_kategori" name="content_kategori" value="<?php echo htmlspecialchars($content_kategori); ?>" required>
            </div>
            <div class="mb-3">
                <label for="admin_id" class="form-label">Admin ID</label>
                <input type="number" class="form-control" id="admin_id" name="admin_id" value="<?php echo htmlspecialchars($admin_id); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
