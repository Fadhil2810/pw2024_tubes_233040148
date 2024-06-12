<?php 
include "./include/config.php";
session_start(); 
// Query untuk mengambil data dari tabel content_food
$search = isset($_GET["search"]) ? $_GET["search"] : null ;
$sql = "SELECT * FROM content_food";
if ($search) {
    $sql .=" WHERE content_title LIKE '%$search%'";
  }
$result = $conn->query($sql);

// Arrays to hold categorized content
$Makan = [];
$snacks = [];
$drinks = [];

// Categorize content based on content_kategori
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if ($row["content_kategori"] == "Makan") {
            $Makan[] = $row;
        } elseif ($row["content_kategori"] == "snack") {
            $snacks[] = $row;
        } elseif ($row["content_kategori"] == "drink") {
            $drinks[] = $row;
        }
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en" style="background-color: chocolate;">
<?php
include "meta.php"?>
<body>
    <?php include './include/navbar.php' ?>

    <!-- Beranda -->
    <section id="Beranda" class="homebg" style="min-height: 92vh;
    background-image: url('./assets/img/home.jpg');
    background-size: cover; background-position:center;">
    <div class="hometxt" style="text-align: center; color:white; padding-top: 220px;">
        <h2>Dipatiukur Culinary</h2>
        <h6>website kuliner yang merekomendasikan makanan berat, jajanan ringan,
            <br>bahkan tempat nongkrong sekalipun yang terletak di Dipatiukur.</h6>
    </div>
    
    </section>

    <!-- Makan Section -->
    <section id="Makan" class="Makan" style="text-align: center; background-image: url(./assets/img/body.avif); background-size: cover; background-attachment: fixed; background-repeat: no-repeat; background-position: center;">
        <h2 style="background-color: chocolate; padding-bottom:5px;">Makan</h2>
        <div class="container-fluid" style="display: flex; flex-direction: row; flex-wrap: wrap; place-content: center; gap: 18px; padding-top:20px; padding-bottom:30px;">
            <?php 
            if (count($Makan) > 0) {
                foreach ($Makan as $row) {
                    ?>
                    <div class="card" style="width: 18rem;">
                    <div class="card wrap" style="height:150px; overflow:hidden; ">
                        <img class="card-img-top" src="./assets/img/<?php echo $row["content_photo"]; ?>" alt="Card image cap" style="max-height: 150px;object-fit: cover; scale:0.99;">
                    </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row["content_title"]; ?></h5>
                            <p class="card-text"><?php echo $row["content_food"]; ?></p>
                            <a href="<?php echo $row["content_url"]; ?>" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<p>No Makan available</p>";
            }
            ?>
        </div>
    </section>
    
    <!-- Jajan Section -->
    <section id="Jajan" style="min-height:100vh; text-align:center; background-image: url(./assets/img/jajan.jpg); background-size: cover; background-attachment: fixed; background-repeat: no-repeat; background-position: center;">
        <h2  style="background-color: chocolate; padding-bottom:5px;">Jajan</h2>
        <div class="container-fluid" style="display: flex; flex-direction: row; flex-wrap: wrap; place-content: center; gap: 18px; padding-top:20px; padding-bottom:30px;">
            <?php 
            if (count($snacks) > 0) {
                foreach ($snacks as $row) {
                    ?>
                    <div class="card" style="width: 18rem;">
                    <div class="card wrap" style="height:150px; overflow:hidden; ">
                    <img class="card-img-top" src="./assets/img/<?php echo $row["content_photo"]; ?>" alt="Card image cap" style="max-height: 150px;object-fit: cover; scale:0.99;">
                    </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row["content_title"]; ?></h5>
                            <p class="card-text"><?php echo $row["content_food"]; ?></p>
                            <a href="<?php echo $row["content_url"]; ?>" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<p>No snacks available</p>";
            }
            ?>
        </div>
    </section>

    <!-- Nongkrong Section -->
    <section id="Nongkrong" style="min-height:100vh; text-align:center; background-image: url(./assets/img/nongkrong.jpg); background-size: cover; background-attachment: fixed; background-repeat: no-repeat; background-position: center;">
        <h2  style="background-color: chocolate; padding-bottom:5px;">Nongkrong</h2>
        <div class="container-fluid" style="display: flex; flex-direction: row; flex-wrap: wrap; place-content: center; gap: 18px; padding-top:20px; padding-bottom:30px;">
            <?php 
            if (count($drinks) > 0) {
                foreach ($drinks as $row) {
                    ?>
                    <div class="card" style="width: 18rem;">
                    <div class="card wrap" style="height:150px; overflow:hidden; ">
                        <img class="card-img-top" src="./assets/img/<?php echo $row["content_photo"]; ?>" alt="Card image cap" style="max-height: 150px;object-fit: cover; scale:0.99;">
                    </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row["content_title"]; ?></h5>
                            <p class="card-text"><?php echo $row["content_food"]; ?></p>
                            <a href="<?php echo $row["content_url"]; ?>" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<p>No Nongkrong available</p>";
            }
            ?>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

    <?php include './include/footer.php' ?>
</body>
</html>
