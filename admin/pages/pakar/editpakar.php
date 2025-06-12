<?php

$id_user = $_GET["id_user"];

$queryUser = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = '$id_user'");
$user = mysqli_fetch_assoc($queryUser);
?>


<section>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="../function.php?act=ubahPakar&id_user=<?= $id_user; ?>" id="ubah" method="POST">
                        <div class="form-group">
                            <label class="papan" for="nama">Nama Pakar AC</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?= $user['nama']; ?>" required>
                            <div class="valid-feedback">
                                Bagus!
                            </div>
                            <div class="invalid-feedback">
                                Nama tidak boleh kosong
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="papan" for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= $user['email']; ?>" required>
                            <div class="valid-feedback">
                                Bagus!
                            </div>
                            <div class="invalid-feedback">
                                Email tidak valid
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="papan" for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="<?= $user['alamat']; ?>" required>
                            <div class="valid-feedback">
                                Bagus!
                            </div>
                            <div class="invalid-feedback">
                                Alamat tidak boleh kosong
                            </div>
                        </div>

                        <div class="form-row">
                            <button type="submit" name="submitButton" id="submitButton" class="registerbtn btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</section>