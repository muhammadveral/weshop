<?php
include_once("../../function/koneksi.php");
include_once("../../function/helper.php");

$nama_barang = $_POST['nama_barang'];
$kategori_id = $_POST['kategori_id'];
$spesifikasi = $_POST['spesifikasi'];
$status = $_POST['status'];
$button = $_POST['button'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];

$dataForm = http_build_query($_POST);
$query_data = mysqli_query($koneksi, "SELECT * FROM barang WHERE nama_barang = '$nama_barang'");

// upload file kedalam server
$namaFile = $_FILES["file"]["name"];
move_uploaded_file($_FILES["file"]["tmp_name"], "../../images/barang/" . $namaFile);
// cara debugging manual
// status masih ada bug ketika status belom di isi

// var_dump($status);

// mengecek data dari formulir tambah barang




if (empty($nama_barang) || empty($spesifikasi) || empty($status) || empty($namaFile) || empty($harga) || empty($stok)) {
    header("location: " . BASE_URL . "index.php?page=my_profile&module=barang&action=form&notif=caution&$dataForm");
} else {

    mysqli_query($koneksi, "INSERT INTO barang (nama_barang, kategori_id, spesifikasi, gambar, harga, stok, status) 
                                            VALUES ('$nama_barang', '$kategori_id', '$spesifikasi', '$namaFile', '$harga', '$stok', '$status')");
    header("location: " . BASE_URL . "index.php?page=my_profile&module=barang&action=list");
}
