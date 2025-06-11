<?php

$queryKerusakan  = mysqli_query($koneksi, "SELECT * FROM ms_kerusakan");

?>
<section class="">
    <div class="d-flex justify-content-between">
        <h3 class="fs-bold text-md">Kerusakan List</h3>
        <div class="">
            <a href="index.php?page=add-kerusakan" class="btn btn-md btn-success ">Add Kerusakan</a>
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
                                    <th>Aksi</th>
                                    <th>Id Kerusakan</th>
                                    <th>Nama Kerusakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($data = mysqli_fetch_assoc($queryKerusakan)) { ?>
                                    <tr>
                                        <td>
                                            <a class="badge badge-pill badge-primary" href="ubahPenyakit.php?id_penyakit=<?php echo $data["id_kerusakan"]; ?>">edit</a> |
                                            <a href="../function.php?act=hapusKerusakan&id_kerusakan=<?= $data['id_kerusakan']; ?>" onclick="return confirm('Yakin ingin menghapus data?');" class="badge badge-pill badge-danger">hapus</a>
                                        </td>
                                        <td><?= $data['kode_kerusakan']; ?></td>
                                        <td><?= $data['kerusakan']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</section>