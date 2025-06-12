<section>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="../function.php?act=registerPakar" id="tambah" method="POST">
                        <div class="form-group">
                            <label class="papan" for="nama">Nama Pakar</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>
                            <div class="valid-feedback">
                                Bagus!
                            </div>
                            <div class="invalid-feedback">
                                Nama tidak boleh kosong
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="papan" for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                            <div class="valid-feedback">
                                Bagus!
                            </div>
                            <div class="invalid-feedback">
                                Email tidak valid
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="papan" for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" minlength="8" placeholder="Password" required>
                            <div class="valid-feedback">
                                Bagus!
                            </div>
                            <div class="invalid-feedback">
                                Password min. 8 karakter
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="papan" for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required>
                            <div class="valid-feedback">
                                Bagus!
                            </div>
                            <div class="invalid-feedback">
                                Alamat tidak boleh kosong
                            </div>
                        </div>

                        <div class="form-row">
                            <button type="submit" name="submitButton" id="submitButton" class="registerbtn btn btn-primary">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</section>