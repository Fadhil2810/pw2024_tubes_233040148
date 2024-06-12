<?php 
define('BASE_URL', 'http://localhost/pw_2024_tubes_233040148/');
$username = isset ($_SESSION['username']) ? $_SESSION['username'] :'GUEST';
?>
<nav class="navbar navbar-expand-lg" style="height: 50px; padding-bottom: 8px; background-color:chocolate;">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav" style="justify-content: space-between;">
      <ul class="navbar-nav" style="padding-bottom:5px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo BASE_URL?>index.php#Beranda">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo BASE_URL?>index.php#Makan">Makan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo BASE_URL?>index.php#Jajan">Jajan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo BASE_URL?>index.php#Nongkrong">Nongkrong</a>
        </li>
        <?php if (!empty($username) && $username != 'Guest') { ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo BASE_URL; ?>profile.php"><?php echo htmlspecialchars($username); ?></a>
        </li>

        <?php } else ?>

        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register.php">Register</a>
        </li>
      </ul>
        <a class="navbar-brand" href="#" style="margin-left:-190px;">Dipatiukur Culinary</a>
      <form class="d-flex" role="search" method="GET">
          <input class="form-control me-2" id="searchinput" name="search" type="search" placeholder="Cari Apa?" aria-label="Search" aria-label="Search" value="<?php echo isset($search) ? $search : ''; ?>">
          <button class="btn btn-outline-success" type="submit" style="color: black ;">Cari</button>
        </form>
    </div>
  </div>
</nav>

  