<?php
include 'function.php';
?>


<?php
// Redirect sesuai role
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 0) {
        header("Location: admin/index.php");
        exit;
    } else if ($_SESSION['role'] == 2) {
        echo "<script>document.location.href = 'admin/index.php?page=data-pakar'</script>";
        exit;
    }
}

// Inisialisasi session
if (!isset($_SESSION['persentase'])) {
    $_SESSION['persentase'] = [];
}

if (!isset($_SESSION['index_gejala'])) {
    $_SESSION['index_gejala'] = 0;
}

// Ambil semua gejala dari database
$gejalaList = mysqli_query($koneksi, "SELECT * FROM ms_gejala ORDER BY id_gejala ASC");
$gejalaArray = [];
while ($row = mysqli_fetch_assoc($gejalaList)) {
    $gejalaArray[] = $row;
}

$totalGejala = count($gejalaArray);
$currentIndex = $_SESSION['index_gejala'];

// Proses jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['ya'])) {
        $_SESSION['persentase'][] = $gejalaArray[$currentIndex]['id_gejala'];
    }
    $_SESSION['index_gejala']++;

    if ($_SESSION['index_gejala'] >= $totalGejala) {
        // Hitung hasil berdasarkan aturan
        $jawabanYa = $_SESSION['persentase'];

        // Ambil semua kerusakan
        $kerusakanQuery = mysqli_query($koneksi, "SELECT * FROM ms_kerusakan");
        $hasilDiagnosa = [];

        while ($kerusakan = mysqli_fetch_assoc($kerusakanQuery)) {
            $id_kerusakan = $kerusakan['id_kerusakan'];

            // Ambil semua id_gejala yang berelasi dengan kerusakan ini
            $aturanQuery = mysqli_query($koneksi, "SELECT id_gejala FROM aturan WHERE id_kerusakan = '$id_kerusakan'");
            $gejalaKerusakan = [];
            while ($aturan = mysqli_fetch_assoc($aturanQuery)) {
                $gejalaKerusakan[] = $aturan['id_gejala'];
            }

            $jumlahCocok = count(array_intersect($jawabanYa, $gejalaKerusakan));
            $total = count($gejalaKerusakan);

            $persentase = $total > 0 ? number_format(($jumlahCocok / $total) * 100, 2) : 0;
            $hasilDiagnosa[$kerusakan['id_kerusakan']] = $persentase;
        }

        $_SESSION['hasil'] = $hasilDiagnosa;

        // Reset sesi terkait
        unset($_SESSION['index_gejala']);
        unset($_SESSION['persentase']);

        header("Location: hasil.php");
        exit;
    } else {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <title>Diagnosa | PakarAC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="custom.css" />
</head>

<body>
    <nav class="navbar py-2 navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="gambar/logo.png" width="147" alt="logo" /></a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li><a class="btn px-4 btn-primary ml-2" href="logout.php">Log Out</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="test mt-5">
        <div class="container">
            <div class="row">
                <div class="col align-self-center">
                    <h2 class="mb-4">Pertanyaan:</h2>
                    <form method="post">
                        <?php
                        if ($currentIndex < $totalGejala) {
                            $gejala = $gejalaArray[$currentIndex]['gejala'];
                            echo "<p class='mb-4'>Apakah Anda mengalami <strong>$gejala</strong>?</p>";
                            echo '<input type="submit" name="ya" value="Ya" class="btn btn-primary mr-2 px-4 py-2">';
                            echo '<input type="submit" name="tidak" value="Tidak" class="btn btn-danger px-3 py-2">';
                        } else {
                            echo "<p class='text-danger'>Gejala tidak ditemukan atau sudah selesai.</p>";
                        }
                        ?>
                    </form>
                </div>
                <div class="col d-none d-sm-block">
                    <img width="500" src="gambar/step-2.png" alt="hero" />
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>