<?php $queryKerusakan = mysqli_query($koneksi, "SELECT * FROM ms_kerusakan"); ?>
<section>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="../function.php?act=tambahSolusi" id="tambah" method="POST">
                        <div class="form-group">
                            <label for="namaSolusi">Solusi</label>
                            <input type="text" class="form-control" id="namaSolusi" name="namaSolusi" placeholder="Masukkan Solusi">
                        </div>
                        <div class="form-group">
                            <label for="id_kerusakan" class="form-label">Nama Kerusakan</label>
                            <select name="id_kerusakan" id="id_kerusakan" class="form-control">
                                <option value="">Pilih Kerusakan dari Solusi</option>
                                <?php while ($kerusakan = mysqli_fetch_assoc($queryKerusakan)) { ?>
                                    <option value="<?= $kerusakan["id_kerusakan"]; ?>"><?= $kerusakan["kerusakan"]; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="tambah_btn" id="tambah" class="btn btn-primary" value="Tambah">
                    </form>
                </div>
            </div>
        </div>
</section>