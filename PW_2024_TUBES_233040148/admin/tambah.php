<?php
include("../include/config.php");
// Cek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $content_title = $_POST['content_title'];
    $content_food = $_POST['content_food'];
    $content_url = $_POST['content_url'];
    $content_photo = $_FILES['content_photo']['name'];
    $admin_id = $_POST['admin_id'];
    $content_kategori = $_POST['content_kategori'];

     // Handle file upload
    if (is_uploaded_file($_FILES['content_photo']['tmp_name'])) {
        $target_dir = "../assets/img/";
        $target_file = $target_dir . basename($_FILES['content_photo']['name']);
        if (move_uploaded_file($_FILES['content_photo']['tmp_name'], $target_file)) {
            echo "<script>alert('File " . $_FILES['content_photo']['name'] . " upload berhasil.');</script>";
        } else {
            echo "<script>alert('upload gagal');</script>";
        }
    } else {
        echo "Possible file upload attack: filename '". $_FILES['content_photo']['tmp_name'] . "'.";
    }

    // Query untuk insert data
    $sql = "INSERT INTO content_food (content_title, content_food, content_url, content_photo, admin_id,content_kategori) VALUES ('$content_title', '$content_food', '$content_url', '$content_photo', '$admin_id','$content_kategori')";
    if ($conn->query($sql) === TRUE) {
        echo "Data Ditambahkan";
        header("Location: admin.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Tutup koneksi
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Font nav-brand -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Food & Culinary</title>
</head>
<body>
    <?php include '../include/navbar.php'; ?>
    <div class="container">
        <h2>Tambah Konten Kuliner</h2>
        <form method="post" action="" enctype="multipart/form-data">
            <div class="form-group">
                <label for="content_title">Judul Kuliner</label>
                <input type="text" class="form-control" id="content_title" name="content_title" required>
            </div>
            <div class="form-group">
                <label for="content_food">Isi Kuliner</label>
                <input type="text" class="form-control" id="content_food" name="content_food" required>
            </div>
            <div class="form-group">
                <label for="content_kategori">Kategori</label>
                <input type="text" class="form-control" id="content_kategori" name="content_kategori" required>
            </div>
            <div class="form-group">
                <label for="content_url">URL</label>
                <input type="text" class="form-control" id="content_url" name="content_url" required>
            </div>
            <div class="form-group">
                <label for="content_photo">Foto</label>
                 <input type="file" class="form-control" id="content_photo" name="content_photo" required>
            </div>
             <div class="form-group">
                <label for="admin_id">Admin Id</label>
                <input type="text" class="form-control" id="admin_id" name="admin_id" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
    <?php include '../include/footer.php'; ?>
    <?php include '../script.php'; ?>
</body>
</html>