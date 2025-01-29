<?php
include_once("../../function/koneksi.php");
include_once("../../function/helper.php");

$nama_barang = $_POST['nama_barang'];
$kategori_id = $_POST['kategori_id'];
$spesifikasi = $_POST['spesifikasi'];
$update_gambar = "";
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$status = $_POST['status'];
$button = $_POST['button'];

$dataForm = http_build_query($_POST);
$query_data = mysqli_query($koneksi, "SELECT * FROM barang WHERE nama_barang = '$nama_barang'");

// upload file kedalam server
if (!empty($_FILES["file"]["name"])) {
    $namaFile = $_FILES["file"]["name"];
    move_uploaded_file($_FILES["file"]["tmp_name"], "../../images/barang/" . $namaFile);

    $update_gambar = ", gambar='$namaFile'";
}
// cara debugging manual
// status masih ada bug ketika status belom di isi
// var_dump($status);

// mengecek data dari formulir tambah barang
if (empty($nama_barang) || empty($spesifikasi) || empty($status) || empty($harga) || empty($stok)) {
    header("location: " . BASE_URL . "index.php?page=my_profile&module=barang&action=form&notif=caution&$dataForm");
    exit();
}

if ($button == "Add") {
    mysqli_query($koneksi, "INSERT INTO barang (nama_barang, kategori_id, spesifikasi, gambar, harga, stok, status) 
                                            VALUES ('$nama_barang', '$kategori_id', '$spesifikasi', '$namaFile', '$harga', '$stok', '$status')");
    header("location: " . BASE_URL . "index.php?page=my_profile&module=barang&action=list");
    exit();
} else if ($button == "Update") {
    $barang_id = $_GET['barang_id'];
    mysqli_query($koneksi, "UPDATE barang SET kategori_id = '$kategori_id',
                                            nama_barang = '$nama_barang', 
                                            spesifikasi = '$spesifikasi', 
                                            harga = '$harga',
                                            stok = '$stok', 
                                            status = '$status'
                                            $update_gambar WHERE barang_id = '$barang_id'");
}
header("location: " . BASE_URL . "index.php?page=my_profile&module=barang&action=list");
exit();
