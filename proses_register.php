<?php
include_once("function/koneksi.php");
include_once("function/helper.php");

$level = "customer";
$nama_lengkap = $_POST['nama_lengkap'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$re_password = $_POST['re_password'];
$status = "on";

unset($_POST['email']);
unset($_POST['phone']);
unset($_POST['alamat']);
unset($_POST['password']);
unset($_POST['re_password']);

$dataForm = http_build_query($_POST);

$query_data = mysqli_query($koneksi, "SELECT * FROM user WHERE email = '$email'");

if (empty($nama_lengkap) || empty($email) || empty($alamat) || empty($phone) || empty($password)) {
    header("location: " . BASE_URL . "index.php?page=register&notif=require&$dataForm");
    // mengecek data email yang sama
} elseif (mysqli_num_rows($query_data) == 1) {
    header("location: " . BASE_URL . "index.php?page=register&notif=email&$dataForm");
} elseif ($password != $re_password) {
    header("location: " . BASE_URL . "index.php?page=register&notif=password&$dataForm");
} else {
    $password = md5($password);
    mysqli_query($koneksi, "INSERT INTO user (level, nama, email, alamat, phone, password, status)
                                    VALUES ('$level', '$nama_lengkap', '$email', '$alamat', '$phone', '$password', '$status') ");
    header("location: " . BASE_URL . "index.php?page=login");
}
