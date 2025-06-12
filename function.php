<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'db_pakarac');

if (mysqli_connect_errno()) {
    echo "Koneksi Database Gagal : " . mysqli_connect_error();
}

session_start();
if (isset($_GET["act"])) {
    $act = $_GET["act"];
    if ($act == "register") {
        register();
    } else if ($act == "login") {
        login();
    } else if ($act == "registerPakar") {
        registerPakar();
    } else if ($act == "tambahGejala") {
        tambahGejala();
    } else if ($act == "tambahKerusakan") {
        tambahKerusakan();
    } else if ($act == "tambahSolusi") {
        tambahSolusi();
    } else if ($act == "hapusGejala") {
        $id_gejala = $_GET["id_gejala"];
        hapusGejala($id_gejala);
    } else if ($act == "hapusKerusakan") {
        $id_penyakit = $_GET["id_kerusakan"];
        hapusKerusakan($id_penyakit);
    } else if ($act == "hapusUser") {
        $id_user = $_GET["id_user"];
        hapusUser($id_user);
    } else if ($act == "hapusPakar") {
        $id_user = $_GET["id_user"];
        hapusPakar($id_user);
    } else if ($act == "hapusSolusi") {
        $id_solusi = $_GET["id_solusi"];
        hapusSolusi($id_solusi);
    } else if ($act == "ubahGejala") {
        $id_gejala = $_GET["id_gejala"];
        ubahGejala($id_gejala);
    } else if ($act == "ubahUser") {
        $id_user = $_GET["id_user"];
        ubahUser($id_user);
    } else if ($act == "ubahPakar") {
        $id_user = $_GET["id_user"];
        ubahPakar($id_user);
    } else if ($act == "ubahKerusakan") {
        $id_kerusakan = $_GET["id_kerusakan"];
        ubahKerusakan($id_kerusakan);
    } else if ($act == "ubahSolusi") {
        $id_solusi = $_GET["id_solusi"];
        ubahSolusi($id_solusi);
    } else if ($act == "ulang") {
        ulang();
    }
}

function ulang()
{
    session_unset();
    session_destroy();
    header("location: test.php");
}

function register()
{
    global $koneksi;
    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);
    $alamat = htmlspecialchars($_POST['alamat']);
    // $tgl_lahir = $_POST['tgl_lahir'];
    $query_user = "INSERT INTO user VALUES ('','1','$nama', '$email', '$alamat','$password')";
    $exe = mysqli_query($koneksi, $query_user);

    if (!$exe) {
        die('Query Error : ' . mysqli_errno($koneksi) . '-' . mysqli_error($koneksi));
    } else {
        // echo "<script type='text/javascript'> success(); </script>";
        echo "<script>
        alert('Berhasil Registrasi! Silahkan Login');
        document.location.href = 'index.php';
            </script>";
    }
}

function ubahUser($id_user)
{
    global $koneksi;
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    // $penyakit = $_POST['id_penyakit'];
    $queryUser = "UPDATE user SET nama = '$nama', email = '$email', alamat = '$alamat' WHERE id_user = '$id_user'";
    // $queryRelasi = "INSERT INTO relasi VALUES ('', '')"
    $exe = mysqli_query($koneksi, $queryUser);
    if (!$exe) {
        die('Error pada database');
    }
    echo "<script>
            alert('Data User berhasil diubah!');
            document.location.href = 'admin/index.php?page=data-user'</script>";
}

function hapusUser($id_user)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM user WHERE id_user = $id_user");
    $result = mysqli_affected_rows($koneksi);
    if ($result > 0) {
        echo "
        <script>
                alert('Akun User berhasil dihapus!');
                document.location.href = 'admin/index.php?page=data-user';
            </script>	
        ";
    } else {
        echo "
        <script>
                    alert('Akun User gagal dihapus!');
                    document.location.href = 'admin/index.php?page=data-user';
            </script>	
        ";
    }
}




function login()
{
    global $koneksi;
    $nama = htmlspecialchars($_POST["nama"]);
    $input_pass = htmlspecialchars($_POST['password']);
    // var_dump($nama, $input_pass);
    $query = mysqli_query($koneksi, "SELECT * FROM user where nama = '$nama'");
    $data = mysqli_fetch_assoc($query);
    // echo json_encode($data);
    // die;

    $password = $data['password'];
    $role = $data['role'];

    if ($data) {
        $_SESSION['nama'] = $data['nama'];
        if (password_verify($input_pass, $password)) {
            if ($role == "1") {
                $_SESSION['role'] = 1;
                echo "<script>
                document.location.href = 'admin/index.php?page=data-user';
                </script>";
            } else if ($role == "0") {
                $_SESSION['role'] = 0;
                echo "<script>
                document.location.href = 'admin/index.php?page=data-user';
                </script>";
            } else if ($role == "2") {
                $_SESSION['role'] = 2;
                echo "<script>
                document.location.href = 'admin/index.php?page=data-user';
                </script>";
            }
        }
    } else {
        echo "<script>
                alert('Username atau password kosong/salah!');
                document.location.href = 'index.php';
                </script>";
    }
}


function registerPakar()
{
    global $koneksi;
    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);
    $alamat = htmlspecialchars($_POST['alamat']);
    $query_pakar = "INSERT INTO user VALUES ('','2','$nama', '$email', '$alamat','$password')";
    $exe = mysqli_query($koneksi, $query_pakar);

    if (!$exe) {
        die('Query Error : ' . mysqli_errno($koneksi) . '-' . mysqli_error($koneksi));
    } else {
        // echo "<script type='text/javascript'> success(); </script>";
        echo "<script>
        alert('Berhasil Registrasi Pakar! Segera beritahu pakar Login');
        document.location.href = 'admin/index.php?page=data-pakar';
            </script>";
    }
}

function ubahPakar($id_user)
{

    global $koneksi;
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    // $penyakit = $_POST['id_penyakit'];
    $queryUser = "UPDATE user SET nama = '$nama', email = '$email', alamat = '$alamat' WHERE id_user = '$id_user'";
    // $queryRelasi = "INSERT INTO relasi VALUES ('', '')"
    $exe = mysqli_query($koneksi, $queryUser);
    if (!$exe) {
        die('Error pada database');
    }
    echo "<script>
            alert('Data Pakar berhasil diubah!');
            document.location.href = 'admin/index.php?page=data-pakar'</script>";
}

function hapusPakar($id_user)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM user WHERE id_user = $id_user");
    $result = mysqli_affected_rows($koneksi);
    if ($result > 0) {
        echo "
        <script>
                alert('Akun Pakar berhasil dihapus!');
                document.location.href = 'admin/index.php?page=data-pakar';
            </script>	
        ";
    } else {
        echo "
        <script>
                    alert('Akun Pakar gagal dihapus!');
                    document.location.href = 'admin/index.php?page=data-pakar';
            </script>	
        ";
    }
}



function tambahKerusakan()
{
    global $koneksi;
    $kodeKerusakan = $_POST['kodeKerusakan'];
    $namaKerusakan = $_POST['namaKerusakan'];
    // $penyakit = $_POST['id_penyakit'];
    $queryKerusakan = "INSERT INTO ms_kerusakan VALUES ('','$kodeKerusakan','$namaKerusakan')";
    // $queryRelasi = "INSERT INTO relasi VALUES ('', '')"
    $exe = mysqli_query($koneksi, $queryKerusakan);
    if (!$exe) {
        die('Error pada database');
    }
    echo "<script>
            alert('kerusakan berhasil ditambahkan');
            document.location.href = 'admin/index.php?page=data-kerusakan'</script>";
}

function ubahKerusakan($id_kerusakan)
{
    global $koneksi;
    $kodeKerusakan = $_POST['kodeKerusakan'];
    $kerusakan = $_POST['namaKerusakan'];


    $queryPenyakit = "UPDATE ms_kerusakan SET kode_kerusakan = '$kodeKerusakan', kerusakan = '$kerusakan'  WHERE id_kerusakan = '$id_kerusakan'";

    $exe = mysqli_query($koneksi, $queryPenyakit);
    if (!$exe) {
        die('Error pada database');
    }
    echo "<script>
            alert('Data Kerusakan berhasil diubah!');
            document.location.href = 'admin/index.php?page=data-kerusakan'</script>";
}

function hapusKerusakan($id_kerusakan)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM ms_kerusakan WHERE id_kerusakan = $id_kerusakan");
    $result = mysqli_affected_rows($koneksi);
    if ($result > 0) {
        echo "
        <script>
                alert('Kerusakan berhasil dihapus!');
                document.location.href = 'admin/index.php?page=data-kerusakan';
            </script>	
        ";
    } else {
        echo "
        <script>
                    alert('kerusakan gagal dihapus, karena masih terikat dengan gejala!');
                    document.location.href = 'admin/index.php?page=data-kerusakan';
            </script>	
        ";
    }
}



function tambahGejala()
{
    global $koneksi;
    $kodeGejala = $_POST['kodeGejala'];
    $gejala = $_POST['namaGejala'];
    $id_kerusakan = $_POST['id_kerusakan'];
    $queryGejala = "INSERT INTO ms_gejala VALUES ('','$kodeGejala','$gejala')";

    $exe = mysqli_query($koneksi, $queryGejala);

    if (!$exe) {
        die('Error pada database');
    }
    $id_gejala = mysqli_insert_id($koneksi);
    $queryRelasi = "INSERT INTO aturan VALUES ('', '$id_gejala', '$id_kerusakan')";
    $ex = mysqli_query($koneksi, $queryRelasi);

    if (!$ex) {
        die('Error pada database');
    }
    echo "<script>
        alert('Gejala berhasil ditambahkan');
        document.location.href = 'admin/index.php?page=data-gejala'</script>";
}


function ubahGejala($id_gejala)
{
    global $koneksi;
    $id_kerusakan = $_POST['id_kerusakan'];
    $kodeGejala = $_POST['kodeGejala'];
    $gejala = $_POST['namaGejala'];

    $queryGejala = "UPDATE ms_gejala SET kode_gejala = '$kodeGejala', gejala = '$gejala' WHERE id_gejala = '$id_gejala'";
    $exe = mysqli_query($koneksi, $queryGejala);
    if (!$exe) {
        die('Error pada database');
    }
    $queryRelasi = "UPDATE aturan SET id_gejala = '$id_gejala', id_kerusakan = '$id_kerusakan' WHERE id_gejala = '$id_gejala'";
    $ex = mysqli_query($koneksi, $queryRelasi);
    if (!$ex) {
        die('Error pada database');
    }
    echo "<script>
        alert('Data Gejala berhasil diubah');
        document.location.href = 'admin/index.php?page=data-gejala'</script>";
}

function hapusGejala($id_gejala)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM ms_gejala WHERE id_gejala = $id_gejala");
    $result = mysqli_affected_rows($koneksi);
    if ($result > 0) {
        echo "
        <script>
                alert('Gejala berhasil dihapus!');
                document.location.href = 'admin/index.php?page=data-gejala';
            </script>	
        ";
    } else {
        echo "
        <script>
                alert('Gejala gagal dihapus, karena masih terikat dengan kerusakan!');
                document.location.href = 'admin/index.php?page=data-gejala';
            </script>	
        ";
    }
}

function tambahSolusi()
{
    global $koneksi;
    $solusi = $_POST['namaSolusi'];
    $id_kerusakan = $_POST['id_kerusakan'];
    // $penyakit = $_POST['id_penyakit'];
    $querySolusi = "INSERT INTO solusi VALUES ('', '$id_kerusakan', '$solusi')";
    // $queryRelasi = "INSERT INTO relasi VALUES ('', '')"
    $exe = mysqli_query($koneksi, $querySolusi);
    if (!$exe) {
        die('Error pada database');
    }
    echo "<script>
            alert('Solusi berhasil ditambahkan');
            document.location.href = 'admin/index.php?page=data-solusi'</script>";
}

function ubahSolusi($id_solusi)
{
    global $koneksi;
    $solusi = htmlspecialchars($_POST['namaSolusi']);
    $id_kerusakan = htmlspecialchars($_POST['id_kerusakan']);
    // $penyakit = $_POST['id_penyakit'];
    $querySolusi = "UPDATE solusi SET solusi = '$solusi', id_kerusakan = '$id_kerusakan' WHERE id_solusi = '$id_solusi'";
    // $queryRelasi = "INSERT INTO relasi VALUES ('', '')"
    $exe = mysqli_query($koneksi, $querySolusi);
    if (!$exe) {
        die('Error pada database');
    }
    echo "<script>
            alert('Data Solusi berhasil diubah!');
            document.location.href = 'admin/index.php?page=data-solusi'</script>";
}



function hapusSolusi($id_solusi)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM solusi WHERE id_solusi = $id_solusi");
    $result = mysqli_affected_rows($koneksi);
    if ($result > 0) {
        echo "
        <script>
                alert('Solusi berhasil dihapus!');
                document.location.href = 'admin/index.php?page=data-solusi';
            </script>	
        ";
    } else {
        echo "
        <script>
                    alert('Solusi gagal dihapus!');
                    document.location.href = 'admin/index.php?page=data-solusi';
            </script>	
        ";
    }
}

function gejala($id_penyakit)
{
    global $koneksi;
    $query = "SELECT relasi.id_gejala as id_gejala FROM relasi INNER JOIN gejala ON relasi.id_gejala = gejala.id_gejala INNER JOIN penyakit ON relasi.id_penyakit = penyakit.id_penyakit WHERE relasi.id_penyakit = '$id_penyakit' ";
    $data = mysqli_query($koneksi, $query);
    // var_dump($data);
    $row = mysqli_fetch_assoc($data);

    return $row['id_gejala'];
    // echo "hasil". $row['id_gejala'];
}
