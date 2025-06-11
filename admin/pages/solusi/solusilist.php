<?php

$querySolusi = mysqli_query($koneksi, "SELECT id_solusi, kerusakan, solusi FROM solusi INNER JOIN ms_kerusakan ON solusi.id_kerusakan = ms_kerusakan.id_kerusakan");

?>
<section class="">
    <h3 class="fs-bold text-md">Solusi List</h3>
    <div class="row pt-2">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <thead>
                                <tr class="d-flex">
                                    <th class="col-2">Aksi</th>
                                    <th class="col-1">Id Solusi</th>
                                    <th class="col-3">Penyakit</th>
                                    <th class="col-6">Solusi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($data = mysqli_fetch_assoc($querySolusi)) { ?>
                                    <tr class="d-flex">
                                        <td class="col-2">
                                            <a class="badge badge-pill badge-primary" href="ubahSolusi.php?id_solusi=<?php echo $data["id_solusi"]; ?>">edit</a> |
                                            <a href="function.php?act=hapusSolusi&id_solusi=<?= $data['id_solusi']; ?>" onclick="return confirm('Yakin ingin menghapus data?');" class="badge badge-pill badge-danger">hapus</a>
                                        </td>
                                        <td class="col-1"><?= $data['id_solusi']; ?></td>
                                        <td class="col-3"><?= $data['penyakit']; ?></td>
                                        <td class="col-6"><?= $data['solusi']; ?></td>

                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</section>