<?php

$queryGejala = mysqli_query($koneksi, "SELECT * FROM ms_gejala");

?>
<section class="">
    <div class="d-flex justify-content-between">
        <h3 class="fs-bold text-md">Gejala List</h3>
        <div class="">
            <a href="index.php?page=add-gejala" class="btn btn-md btn-success ">Add Gejala</a>
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
                                    <th>Kode Gejala</th>
                                    <th>Nama Gejala</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($data = mysqli_fetch_assoc($queryGejala)) { ?>
                                    <tr>
                                        <td>
                                            <a class="badge badge-pill badge-primary" href="index.php?page=edit-gejala&id_gejala=<?php echo $data["id_gejala"]; ?>">edit</a> |
                                            <a href="../function.php?act=hapusGejala&id_gejala=<?= $data['id_gejala']; ?>" onclick="return confirm('Yakin ingin menghapus data?');" class="badge badge-pill badge-danger">hapus</a>
                                        </td>
                                        <td><?= $data['kode_gejala']; ?></td>
                                        <td><?= $data['gejala']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</section>