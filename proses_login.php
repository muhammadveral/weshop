<?php
include_once("function/helper.php");
include_once("function/koneksi.php");

$email = $_POST['email'];
$password = md5($_POST['password']);

$query_data = mysqli_query($koneksi, " SELECT * FROM user WHERE email = '$email' AND password = '$password' AND status = 'on'");

// jika validasi data salah
if (mysqli_num_rows($query_data) == 0) {
    header("location: " . BASE_URL . "index.php?page=login&notif=caution");
} else { //jika validasi data benar
    $row = mysqli_fetch_assoc($query_data);
    session_start();

    $_SESSION['user_id'] = $row['user_id'];
    $_SESSION['level'] = $row['level'];
    $_SESSION['nama'] = $row['nama'];

    header("location: " . BASE_URL . "index.php?page=my_profile&module=kategori&action=list");
}
