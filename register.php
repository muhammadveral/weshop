<?php
if ($user_id) {
    header("location: " . BASE_URL);
}
?>

<div id="container-user-access">
    <form id="container-form" action="<?php echo BASE_URL . "proses_register.php"; ?>" method="post">
        <?php
        $notif = isset($_GET['notif']) ? $_GET['notif'] : false;
        $nama_lengkap = isset($_GET['nama_lengkap']) ? $_GET['nama_lengkap'] : false;
        ?>
        <!-- nama lengkap -->
        <div class="element-form">
            <label>Nama Lengkap</label>
            <span>
                <input name="nama_lengkap" type="text" value="<?php echo $nama_lengkap; ?>">
            </span>
        </div>
        <!-- Email -->
        <div class="element-form">
            <label>Email</label>
            <span>
                <input name="email" type="text">
            </span>
        </div>
        <!-- Alamat -->
        <div class="element-form">
            <label>Alamat</label>
            <span>
                <textarea name="alamat"></textarea>
            </span>
        </div>
        <!-- Nomor Handphone -->
        <div class="element-form">
            <label>Nomor Handphone</label>
            <span>
                <input name="phone" type="text">
            </span>
        </div>
        <!-- Password -->
        <div class="element-form">
            <label>Password</label>
            <span>
                <input name="password" type="password">
            </span>
        </div>
        <!-- Re-password -->
        <div class="element-form">
            <label>Re-password</label>
            <span>
                <input name="re_password" type="password">
            </span>
        </div>
        <?php
        // validasi kelengkapan data dan password
        if ($notif == "caution") {
            echo " <div class = 'notif'> Maaf, data yang harus anda isi belum lengkap </div>";
        } elseif ($notif == "email") {
            echo " <div class = 'notif'> Maaf, email yang anda masukkan sudah terdaftar </div>";
        } elseif ($notif == "password") {
            echo " <div class = 'notif'> Maaf, password yang anda masukkan tidak sama </div>";
        }
        ?>
        <!-- submit -->
        <div class="element-form">
            <button type="submit">Register</button>
        </div>
    </form>
</div>