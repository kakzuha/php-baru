<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "db_akademik"; //<-- nama database

// melakukan koneksi ke db
$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    echo "Gagal terkoneksi: " .die(mysqli_error($koneksi));
}