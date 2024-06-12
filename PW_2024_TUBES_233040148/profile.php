<?php 
include './include/config.php'; // Pastikan path ke config.php benar
session_start();
$username =  isset($_SESSION['username']) ? $_SESSION['username'] :'';

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <style>
         #Profile {
            display: flex;
            justify-content: center;
            flex-direction: column;
            gap: 50px;
            align-items: center;
            height: 100vh;
            width: 100%;
            color: #EEC4DC;
            font-family: "Poppins", sans-serif;
            font-weight: 500;
            font-size: 50px;
            font-style: normal;
            background-color: #4B0082;
            background-image: chocolate;
            
        }

        a {
           text-decoration: none;
           color: #1C0039
        }


    </style>

    <?php include 'meta.php';?>
</head>
    <body>
    <?php include './include/navbar.php';?>
    <div class="container-fluid" id="Profile">
    <h1>Selamat Datang, <?php echo $username;?></h1>
    <p>Anda sudah berhasil login </p>
    </div>
    <?php include './include/footer.php';?>
    <?php include 'meta.php';?>
</body>
</html>