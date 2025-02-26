<?php
session_start();
include_once("function/koneksi.php");
include_once("function/helper.php");
$page = isset($_GET['page']) ? $_GET['page'] : false;
$kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
$nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : false;
$level = isset($_SESSION['level']) ? $_SESSION['level'] : false;
$keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : false;
$totalBarang = is_array($keranjang) ? count($keranjang) : 0;
// Perlu menambahkan session dalam file kategori

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Weshop || Alat-alat elektronik</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- 12/02/2025 jQuery untuk slidesjs -->
    <script src="<?php echo BASE_URL . "js/jquery-3.7.1.min.js"; ?>"> </script>
    <script src="<?php echo BASE_URL . "js/slidesjs/source/jquery.slides.min.js"; ?>"> </script>
    <!-- Play images otomatis -->
    <script>
        $(function() {
            $('#slides').slidesjs({
                height: 350,
                play: {
                    auto: true,
                    interval: 3000,
                },
                navigation: false
            });
        });
    </script>


    <link rel="stylesheet" href="<?php echo BASE_URL . "css/style.css" ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "css/banner.css" ?>">
</head>

<body>
    <div id="container">
        <!-- HEADER -->
        <div id="header">
            <a href="<?php echo BASE_URL . "index.php"; ?>">
                <img src="<?php echo BASE_URL . "images/logo.png" ?>">
            </a>
            <div id="menu">
                <div id="user">
                    <?php
                    if ($user_id) {
                        echo "Hi, <b> $nama. </b>  <a href='" . BASE_URL . "index.php?page=my_profile&module=kategori&action=list'>My Profile </a>";
                        echo "<a href='" . BASE_URL . "logout.php'> Logout </a>";
                    } else {
                        echo "<a href='" . BASE_URL . "index.php?page=login'> Login</a>";
                        echo "<a href='" . BASE_URL . "index.php?page=register'> Register</a>";
                    }
                    ?>
                </div>
                <div id="keranjang-button">
                    <a href="<?php echo BASE_URL . "index.php?page=keranjang"; ?>">
                        <img src="<?php echo BASE_URL . "images/cart.png" ?>">
                        <?php
                        if ($totalBarang != 0) {
                            echo "<span class = 'total-barang'>$totalBarang</span>";
                        }
                        ?>
                    </a>
                </div>
            </div>
        </div>
        <!-- CONTENT -->
        <div id="content">
            <?php
            $filename = "$page.php";
            if (file_exists($filename)) {
                include_once($filename);
            } else {
                include_once("main.php");
            }
            ?>
        </div>
        <!-- FOOTER -->
        <div id="footer">
            <p>&#169; Copyright by @muhammadveral</p>
        </div>
    </div>
</body>

</html>