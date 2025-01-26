<?php
include_once("../../function/koneksi.php");
include_once("../../function/helper.php");

$kategori = $_POST['kategori'];
$status = $_POST['status'];
$button = $_POST['button'];

$dataForm = http_build_query($_POST);
$query_data = mysqli_query($koneksi, "SELECT * FROM kategori WHERE kategori = '$kategori'");



// 26-01-2025 
// mengecek data dari formulir tambah kategori
if (empty($kategori) ||  empty($status)) {
    header("location: " . BASE_URL . "index.php?page=my_profile&module=kategori&action=form&notif=caution&$dataForm");
} else if ($button == "Add") {
    mysqli_query($koneksi, "INSERT INTO kategori (kategori, status) 
                                            VALUES ('$kategori', '$status')");
    header("location: " . BASE_URL . "index.php?page=my_profile&module=barang&action=list");
} else if ($button == "Update") {
    $kategori_id = $_GET['kategori_id'];

    mysqli_query($koneksi, "UPDATE kategori SET kategori='$kategori',
                                                status='$status' WHERE kategori_id = '$kategori_id'");
}
header("location: " . BASE_URL . "index.php?page=my_profile&module=kategori&action=list");
