<?php
include_once "function/koneksi.php";
include_once "function/helper.php";
if ($totalBarang == 0) {
    echo "<h3>Maaf, saat ini anda belum menambahkan data dalam keranjang</h3>";
} else {
    $no = 1;
    echo "<table class = 'table-list-keranjang'>
            <tr class = 'baris-title'>
                <th class = 'kolom-nomor'> No </th>
                <th class = 'kolom-data'> Image </th>
                <th class = 'kolom-data'> Nama Barang </th>
                <th class = 'kolom-nomor'> qty </th>
                <th class = 'status-action'> Harga Satuan </th>
                <th class = 'status-action'> Total </th>
            </tr>";

    foreach ($keranjang as $key => $value) {
        $barang_id = $key;
        $gambar = $value["gambar"];
        $nama_barang = $value["nama_barang"];
        $quantity = $value["quantity"];
        $harga = $value["harga"];

        $totalHarga = $quantity * $harga;

        echo "<tr>
                <td class ='kolom-nomor'>$no</td>
                <td class ='kolom-data'>
                <img src = '" . BASE_URL . "images/barang/$gambar' height = '100px' >
                </td>
                <td class ='kolom-data'>$nama_barang</td>
                <td class ='kolom-nomor'>
                <input type = 'text' name = '$barang_id' value='$quantity' class='update-quantity'>
                </td>
                <td class ='status-action'>" . rupiah($harga) . "</td>
                <td class ='status-action'>" . rupiah($totalHarga) . "</td>
        </tr>";
        $no++;
    }
    echo "</table>";
}
