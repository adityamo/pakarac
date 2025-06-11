<section>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="../function.php?act=tambahKerusakan" id="tambah" method="POST">
                        <div class="form-group">
                            <label for="namaGejala">Kode Kerusakan</label>
                            <input type="text" class="form-control" id="kodeKerusakan" name="kodeKerusakan" placeholder="Masukkan Kode Kerusakan">
                        </div>
                        <div class="form-group">
                            <label for="namaGejala">Kerusakan</label>
                            <input type="text" class="form-control" id="namaKerusakan" name="namaKerusakan" placeholder="Masukkan Kerusakan">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="tambah_btn" id="tambah" class="btn btn-primary" value="Tambah">
                    </form>
                </div>
            </div>
        </div>


</section>