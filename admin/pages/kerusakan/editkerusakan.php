<?php

$id_kerusakan = $_GET["id_kerusakan"];

$queryKerusakan = mysqli_query($koneksi, "SELECT * FROM ms_kerusakan WHERE id_kerusakan = '$id_kerusakan'");
$kerusakan = mysqli_fetch_assoc($queryKerusakan);
?>


<section>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="../function.php?act=ubahKerusakan&id_kerusakan=<?= $id_kerusakan; ?>" id="ubah" method="POST">
                        <div class="form-group">
                            <label for="namaGejala">Kode Kerusakan</label>
                            <input type="text" class="form-control" id="kodeKerusakan" name="kodeKerusakan" placeholder="Masukkan Kode Kerusakan" value="<?= $kerusakan['kode_kerusakan']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="namaGejala">Kerusakan</label>
                            <input type="text" class="form-control" id="namaKerusakan" name="namaKerusakan" placeholder="Masukkan Kerusakan" value="<?= $kerusakan['kerusakan']; ?>">
                        </div>
                        <div class="form-row">
                            <button type="submit" name="submitButton" id="submitButton" class="registerbtn btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</section>