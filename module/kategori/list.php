<div id="frame-tambah">
    <a class="tombol-action" href="<?php echo BASE_URL . "index.php?page=my_profile&module=kategori&action=form"; ?>">
        + Tambah Kategori
    </a>
</div>
<?php
$querykategori = mysqli_query($koneksi, "SELECT*FROM kategori");

if (mysqli_num_rows($querykategori) == 0) {
    echo "<h3>Saat ini belum ada data dalam page kategori</h3>";
} else {
    echo "<table class = 'table-list'>";
    echo "<tr class = 'baris-title'>
                <th class = 'kolom-nomor'>No</th>
                <th class = 'kolom-data'>Kategori</th>
                <th class = 'status-action'>Status</th>
                <th class = 'status-action'>Action</th>
        </tr>";
    $no = 1;
    while ($row = mysqli_fetch_assoc($querykategori)) {
        echo "<tr>
                    <td class = 'kolom-nomor'>$no</td>
                    <td class = 'kolom-data'>  $row[kategori] </td>
                    <td class = 'status-action'> $row[status] </td>
                    <td>
                    <a class = 'button-status' href = '" . BASE_URL . "index.php?page=my_profile&module=kategori&action=form&kategori_id=$row[kategori_id]'> Edit </a>
                    </td>
                </tr>";
        $no++;
    }
    echo "</table>";
}
?>