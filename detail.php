<div id="kiri">
    <?php
    echo kategori($kategori_id);
    ?>
</div>
<div id="kanan">
    <?php
    $barang_id = $_GET['barang_id'];
    $queryBarang = mysqli_query($koneksi, "SELECT*FROM barang WHERE barang_id='$barang_id' AND status = 'on'");
    $rowBarang = mysqli_fetch_assoc($queryBarang);
    echo "<div id='detail-barang'>
                    <h2>$rowBarang[nama_barang]</h2>
                    <div id = 'frame-gambar'>
                        <img src= '" . BASE_URL . "images/barang/$rowBarang[gambar]'/>
                    </div>
                    <div id = 'frame-harga'>
                        <span> " . rupiah($rowBarang['harga']) . "</span>
                        <a href = '" . BASE_URL . "tambah-keranjang.php?barang_id=$rowBarang[barang_id]'> + tambah keranjang </a>
                    </div>
                    <div id = 'keterangan'>
                        <b> Keterangan </b> $rowBarang[spesifikasi]
                    </div>
                </div>";
    ?>

</div>