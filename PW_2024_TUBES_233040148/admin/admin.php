<?php 
include "../include/config.php";

// Query untuk mengambil data dari tabel content_food
$sql = "SELECT * FROM content_food";
$result = $conn->query($sql);
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
    <?php include '../include/navbar.php' ?>
    <!-- Background Home -->
    <img src="../assets/img/home.jpg" alt="tidak ada gambar." class="homebg" style="min-height:101vh;"> 

    <!-- Makan -->
    <section class="Makan" style="text-align: center; background-image: url(./assets/img/body.avif); background-size: cover; background-attachment: fixed; background-repeat: no-repeat; background-position: center;">
        <h2>KONTEN</h2>
    
        <div class="container">
            <table class="table table-striped">
                <thead> 
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Id</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                <a href="tambah.php" class="btn btn-primary">Tambah</a> 
                <?php 
                    if ($result->num_rows > 0) {
                        $index = 1; // Index untuk nomor urut
                        while($row = $result->fetch_assoc()) {
                    ?>
                            <tr>
                                <th scope="row"><?php echo $index; ?></th>
                                <td><img src="../assets/img/<?php echo $row["content_photo"]; ?>" alt="Card image cap" class="img-fluid" style="max-width: 100px;"></td>
                                <td><?php echo $row["content_title"]; ?></td>
                                <td><?php echo $row["content_food"]; ?></td>
                                <td><?php echo $row["admin_id"]; ?></td>
                                <td><?php echo $row["content_kategori"]; ?></td>
                                <td><a href="hapus.php?conten_id=<?php echo $row["conten_id"]; ?>" class="btn btn-primary" style="background-color:red;">Hapus</a> <a href="edit.php?conten_id=<?php echo $row["conten_id"]; ?>" class="btn btn-primary" style="background-color:yellow;">Edit</a></td>
                            </tr>
                    <?php
                            $index++;
                        }
                    } else {
                        echo "<tr><td colspan='5'>No results</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </section>
        
    <section id="snack" style="min-height:100vh;">
        <div class="container-fluid">
        </div>
    </section>
    <section id="drink" style="min-height:100vh;">
        <div class="container-fluid">
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

    <?php include '../include/footer.php' ?>
</body>
</html>
