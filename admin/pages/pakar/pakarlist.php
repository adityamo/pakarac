<?php

$queryUser = mysqli_query($koneksi, "SELECT * FROM user WHERE role = '2'");

?>
<section class="">
    <div class="d-flex justify-content-between">
        <h3 class="fs-bold text-md">Pakar List</h3>
        <div class="">
            <a href="index.php?page=add-pakar" class="btn btn-md btn-success ">Add Pakar</a>
        </div>

    </div>

    <div class="row pt-2">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <thead>
                                <tr>
                                    <?php if ($_SESSION['role'] == 1) {
                                        echo '<th>Aksi</th>';
                                    } ?>
                                    <th>Aksi</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Alamat</th>
                                    <th>Username</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($data = mysqli_fetch_assoc($queryUser)) { ?>
                                    <tr>
                                        <td>
                                            <a class="badge badge-pill badge-primary" href="index.php?page=edit-pakar&id_user=<?php echo $data['id_user']; ?>">edit</a> |
                                            <a href="../function.php?act=hapusPakar&id_user=<?= $data["id_user"]; ?>" onclick="return confirm('Yakin ingin menghapus data?');" class="badge badge-pill badge-danger">hapus</a>
                                        </td>
                                        <td><?= $data['nama']; ?></td>
                                        <td><?= $data['email']; ?></td>
                                        <td><?= $data['alamat']; ?></td>
                                        <td><?= $data['nama']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</section>