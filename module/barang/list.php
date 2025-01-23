<div id="frame-tambah">
    <a class="tombol-action" href="<?php echo BASE_URL . "index.php?page=my_profile&module=barang&action=form"; ?>">
        + Tambah Barang
    </a>
</div>
<?php
$queryBarang = mysqli_query($koneksi, "SELECT barang.*,kategori.kategori FROM barang JOIN kategori ON barang.kategori_id=kategori.kategori_id");

if (mysqli_num_rows($queryBarang) == 0) {
    echo "<h3>Saat ini belum ada data dalam halaman barang</h3>";
} else {
    echo "<table class = 'table-list'>";
    echo "<tr class = 'baris-title'>
                <th class = 'kolom-nomor'>No</th>
                <th class = 'kolom-data'>Barang</th>
                <th class = 'kolom-data'>Kategori</th>
                <th class = 'kolom-data'>Harga</th>
                <th class = 'status-action'>Status</th>
                <th class = 'status-action'>Action</th>
        </tr>";
    $no = 1;
    while ($row = mysqli_fetch_assoc($queryBarang)) {
        echo "<tr>
                    <td class = 'kolom-nomor'>$no</td>
                    <td class = 'kolom-data'>  $row[nama_barang] </td>
                    <td class = 'kolom-data'>  $row[kategori] </td>
                    <td class = 'kolom-data'>" . rupiah($row['harga']) . " </td>
                    <td class = 'status-action'> $row[status] </td>
                    <td>
                    <a class = 'button-status' href = '" . BASE_URL . "index.php?page=my_profile&module=barang&action=form&barang_id=$row[barang_id]'> Edit </a>
                    </td>
                </tr>";
        $no++;
    }
    echo "</table>";
}
?>