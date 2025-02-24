<?php
$barang_id = isset($_GET['barang_id']) ? $_GET['barang_id'] : false;

$nama_barang = "";
$kategori_id = "";
$spesifikasi = "";
$gambar = "";
$keterangan_gambar = "";
$stok = "";
$harga = "";
$status = "";
$button = "Add";

// fungsi edit
if ($barang_id) {
    $queryBarang = mysqli_query($koneksi, "SELECT * FROM barang WHERE barang_id='$barang_id'");
    $row = mysqli_fetch_array($queryBarang);

    $nama_barang = $row['nama_barang'];
    $kategori_id = $row['kategori_id'];
    $spesifikasi = $row['spesifikasi'];
    $gambar = $row['gambar'];
    $keterangan_gambar = "--'Pilih foto'";
    $harga = $row['harga'];
    $stok = $row['stok'];
    $status = $row['status'];
    $button = "Update";

    $gambar = "<img src='" . BASE_URL . "images/barang/$gambar' />";
}
?>

<form id="form-module" action="<?php echo BASE_URL . "module/barang/action.php?barang_id=$barang_id"; ?>" method="post" enctype="multipart/form-data">
    <?php $notif = isset($_GET['notif']) ? $_GET['notif'] : false; ?>
    <!-- Kategori form -->
    <div class="element-form-module">
        <label>Kategori</label>
        <span>
            <select name="kategori_id">
                <?php
                $query = mysqli_query($koneksi, "SELECT kategori_id, kategori FROM kategori WHERE status='on' ORDER BY kategori ASC");
                while ($row = mysqli_fetch_assoc($query)) {
                    echo "<option value='$row[kategori_id]'>$row[kategori]</option>";
                }
                ?>
            </select>
        </span>
    </div>
    <!-- Nama Barang -->
    <div class="element-form-module">
        <label>Nama Barang</label>
        <span>
            <input class="element-type-text" name="nama_barang" type="text" value="<?php echo $nama_barang; ?>">
        </span>
    </div>
    <!-- Spesifikasi -->
    <div class="element-form-module">
        <label>Spesifikasi</label>
        <span>
            <textarea id="editor" name="spesifikasi"><?php echo $spesifikasi; ?></textarea>
        </span>
    </div>

    <!-- Stok -->
    <div class=" element-form-module">
        <label>Stok</label>
        <span>
            <input class="element-type-text" name="stok" type="text" value="<?php echo $stok; ?>">
        </span>
    </div>
    <!-- Harga -->
    <div class="element-form-module">
        <label>Harga</label>
        <span>
            <input class="element-type-text" name="harga" type="text" value="<?php echo $harga; ?>">
        </span>
    </div>
    <!-- Upload File -->
    <div class="element-form-module">
        <label>Gambar Produk <?php echo $keterangan_gambar; ?> </label>
        <span>
            <input id="images" type="file" name="file"> <?php echo $gambar; ?>
        </span>
    </div>
    <!-- Status form -->
    <div class="element-form-module">
        <label>Status</label>
        <span>
            <input name="status" type="radio" value="on" <?php echo ($status == "on") ? "checked" : ""; ?>> On
            <input name="status" type="radio" value="off" <?php echo ($status == "off") ? "checked" : ""; ?>> Off
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