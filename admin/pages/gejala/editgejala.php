<?php

$id_gejala = $_GET["id_gejala"];
$queryKerusakan  = mysqli_query($koneksi, "SELECT * FROM ms_kerusakan");
$query = mysqli_query($koneksi, "SELECT * FROM aturan INNER JOIN ms_kerusakan ON aturan.id_kerusakan = ms_kerusakan.id_kerusakan INNER JOIN ms_gejala ON aturan.id_gejala = ms_gejala.id_gejala WHERE aturan.id_gejala = '$id_gejala'");
$data = mysqli_fetch_assoc($query);


?>

<section>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="../function.php?act=ubahGejala&id_gejala=<?= $data['id_gejala']; ?>" id=" tambah" method="POST">
                        <div class="form-group">
                            <label for="namaGejala">Kode Gejalan</label>
                            <input type="text" class="form-control" id="kodeGejala" name="kodeGejala" placeholder="Masukkan Kode Gejala" value="<?= $data['kode_gejala']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="namaGejala">Gejala</label>
                            <input type="text" class="form-control" id="namaGejala" name="namaGejala" placeholder="Masukkan gejala" value="<?= $data['gejala']; ?>">
                        </div>
                        <div class=" form-group">
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
                            <input type="submit" name="ubah_btn" id="ubah" class="btn btn-primary" value="Simpan Perubahan">
                    </form>
                </div>
            </div>
        </div>


</section>