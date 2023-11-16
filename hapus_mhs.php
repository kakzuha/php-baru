<?php
//include databse connection file
include 'koneksi.php';
$nim = $_GET['nim'];
$result = mysqli_query($koneksi,"DELETE FROM mahasiswa WHERE nim='$nim'");

if ($result) {
    echo "Record deleted successfully";
    // Add redirection or further actions here if needed
} else {
    echo "Error deleting record: " . mysqli_error($koneksi);
}
// header("Location: mahasiswa.php");
?>
