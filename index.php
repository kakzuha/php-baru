<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menambah Data Mahasiswa</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
</head>

<body>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">NIM</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Jurusan</th>
            </tr>
        </thead>
        <?php
            include 'koneksi.php';

                $query = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
                $no = 1;
                while ($data = mysqli_fetch_assoc($query)) {

        ?>
        <tr>
            <td>
                <?php echo $no++;?>
            </td>
            <td>
                <?php echo $data['nim'];?>
            </td>
            <td>
                <?php echo $data['nama'];?>
            </td>
            <td>
                <?php echo $data['alamat'];?>
            </td>
            <td>
                <?php echo $data['jurusan'];?>
            </td>
            <td>
                <i class="fas fa-edit bg-success p-2 text-white rounded"></i>
                <a href="ubah_mhs.php" data-toggle="modal" data-target="#editmhs<?php echo $data['nim'];?>">Edit</a>
                <i class="fas fa-trash-alt bg-danger p-2 text-white rounded"></i>
                <a href="hapus_mhs.php" data-toggle="modal" data-target="#deletemhs<?php echo $data['nim'];?>">Delete</a>
            </td>
        </tr>
        <?php
                }
        ?>
        <a href="#" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambahmhs">
            <i class="fas fa-plus-circle mr-2"></i>TAMBAH DATA MAHASISWA
        </a>
        <!-- Update Modal -->
        <div class="example-modal">
            <div class="modal fade" id="editmhs<?php echo $data['nim'];?>" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">Edit Data Mahasiswa</h3>
                        </div>
                        <div class="modal-body">
                            <form action="update_mhs.php" method="post" role="form">
                                <?php
                                        $nim = $data['nim'];
                                        $query1 = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim='$nim'");
                                        while ($data1 = mysqli_fetch_assoc($query1)) {}
                                    ?>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label text-right">Nama Mahasiswa</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="nama"
                                                value="<?php echo $data1['nama']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-3 control-label text-right">Alamat</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="alamat"
                                                    value="<?php echo $data1['alamat']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-3 control-label text-right">Jurusan</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="jurusan"
                                                    value="<?php echo $data1['jurusan']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button id="noedit" type="button" class="btn btn-danger pull-left"
                                            data-dismiss="modal">Batal</button>
                                        <input type="submit" name="submit" class="btn btn-primary" value="Update">
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Delete -->
        <div class="example-modal">
            <div id="deletemhs<?php echo $data['nim']; ?>" class="modal fade" role="dialog" style="display:none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">Konfirmasi Hapus Data</h3>
                        </div>
                        <div class="modal-body">
                            <h5 align="center">Apakah anda yakin ingin menghapus NIM
                                <?php echo
$data['nim'];?><strong><span class="grt"></span></strong> ?
                            </h5>
                        </div>
                        <div class="modal-footer">
                            <button id="nodelete" type="button" class="btn btn-danger pull-left"
                                data-dismiss="modal">Cancle</button>
                            <a href="hapus_mhs.php?nim=<?php echo $data['nim']; ?>" class="btn btn-primary">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
                                        }
                                        ?>

    </table>
</body>
</html>
