<?php
$id_solusi = $_GET["id_solusi"];
$queryKerusakan = mysqli_query($koneksi, "SELECT * FROM ms_kerusakan");
$query = mysqli_query($koneksi, "SELECT * FROM solusi INNER JOIN ms_kerusakan ON solusi.id_kerusakan = ms_kerusakan.id_kerusakan WHERE id_solusi = '$id_solusi'");
$data = mysqli_fetch_assoc($query);
?>
<section>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="../function.php?act=ubahSolusi&id_solusi=<?= $data['id_solusi']; ?>" id="tambah" method="POST">
                        <div class="form-group">
                            <label for="namaSolusi">Solusi</label>
                            <input type="text" class="form-control" id="namaSolusi" name="namaSolusi" placeholder="Masukkan Solusi" value="<?= $data['solusi']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="id_kerusakan" class="form-label">Nama Kerusakan</label>
                            <select name="id_kerusakan" id="id_kerusakan" class="form-control">
                                <?php while ($kerusakan = mysqli_fetch_assoc($queryKerusakan)) { ?>
                                    <option
                                        value="<?= $kerusakan["id_kerusakan"]; ?>"
                                        <?= ($kerusakan["id_kerusakan"] == $data['id_kerusakan']) ? 'selected' : '' ?>>
                                        <?= $kerusakan["kerusakan"]; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="tambah_btn" id="tambah" class="btn btn-primary" value="Simpan Perubahan">
                    </form>
                </div>
            </div>
        </div>
</section>