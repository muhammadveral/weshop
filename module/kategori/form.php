<?php
$kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;

$kategori = "";
$status = "";
$button = "Add";

if ($kategori_id) {
    $querykategori = mysqli_query($koneksi, "SELECT * FROM kategori WHERE kategori_id='$kategori_id'");
    $row = mysqli_fetch_array($querykategori);

    $kategori = $row['kategori'];
    $status = $row['status'];
    $button = "Update";
}
?>
<form id="form-module" action="<?php echo BASE_URL . "module/kategori/action.php?kategori_id=$kategori_id"; ?>" method="post">
    <?php $notif = isset($_GET['notif']) ? $_GET['notif'] : false; ?>
    <!-- Kategori form -->
    <div class="element-form-module">
        <label>Kategori</label>
        <span>
            <input class="element-type-text" name="kategori" type="text" value="<?php echo $kategori; ?>">
        </span>
    </div>
    <!-- Status form -->
    <div class="element-form-module">
        <label>Status</label>
        <span>
            <input class="element-type-radio" name="status" type="radio" value="on" <?php echo ($status == "on") ? "checked" : ""; ?>> On
            <input class="element-type-radio" name="status" type="radio" value="off" <?php echo ($status == "off") ? "checked" : ""; ?>> Off
        </span>
    </div>
    <!-- validasi kelengkapan data -->
    <?php
    if ($notif == "caution") {
        echo "<div class='notif' >Maaf, data yang anda masukkan belum lengkap</div>";
    }
    ?>
    <!-- Submit -->
    <div class="element-form-button">
        <button name="button" type="submit" value="<?php echo $button; ?>">
            <?php
            echo $button;
            ?>
        </button>
    </div>
</form>