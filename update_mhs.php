<?php
//include database connection file
include 'koneksi.php';
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$result = mysqli_query($koneksi, "UPDATE mahasiswa SET nama='$nama',alamat='$alamat',jurusan='$jurusan' WHERE nim='$nim'");
//redirect to homepage to display updated user in list
header("Location: index.php");
?>