<?php
if ($user_id) {
    header("location: " . BASE_URL);
}
?>

<div id="container-user-access">
    <form id="container-form" action="<?php echo BASE_URL . "proses_login.php"; ?>" method="post">
        <?php
        $notif = isset($_GET['notif']) ? $_GET['notif'] : false;
        ?>
        <!-- Email -->
        <div class="element-form">
            <label>Email</label>
            <span>
                <input name="email" type="text">
            </span>
        </div>
        <!-- Password -->
        <div class="element-form">
            <label>Password</label>
            <span>
                <input name="password" type="password">
            </span>
        </div>
        <?php
        // validasi kelengkapan data dan password
        if ($notif == "caution") {
            echo " <div class = 'notif'> maaf, email atau password yang anda masukkan tidak cocok </div>";
        }
        ?>
        <!-- submit -->
        <div class="element-form">
            <button type="submit">Login</button>
        </div>
    </form>
</div>