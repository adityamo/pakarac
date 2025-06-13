<?php
include 'function.php';

if (!isset($_SESSION['role'])) {
    header("location: index.php");
    exit;
}

if ($_SESSION['role'] == 0) {
    header("location: indexAdmin.php");
    exit;
} elseif ($_SESSION['role'] == 2) {
    header("location: indexPakar.php");
    exit;
}

$hasilDiagnosa = $_SESSION['hasil'] ?? [];
arsort($hasilDiagnosa);

$idKerusakanTertinggi = array_key_first($hasilDiagnosa);
$skorTertinggi = $hasilDiagnosa[$idKerusakanTertinggi] ?? 0;

// Pastikan tidak ada spasi
$idKerusakanTertinggi = trim($idKerusakanTertinggi);

// Ambil nama kerusakan
$namaKerusakanTertinggi = "Tidak diketahui";
if (!empty($idKerusakanTertinggi)) {
    $queryKerusakan = mysqli_prepare($koneksi, "SELECT kerusakan FROM ms_kerusakan WHERE id_kerusakan = ?");
    mysqli_stmt_bind_param($queryKerusakan, "s", $idKerusakanTertinggi);
    mysqli_stmt_execute($queryKerusakan);
    $resultKerusakan = mysqli_stmt_get_result($queryKerusakan);
    $dataKerusakan = mysqli_fetch_assoc($resultKerusakan);
    $namaKerusakanTertinggi = $dataKerusakan['kerusakan'] ?? "Tidak diketahui";
}

// Ambil solusi
$querySolusi = mysqli_prepare($koneksi, "SELECT solusi FROM solusi WHERE id_kerusakan = ?");
mysqli_stmt_bind_param($querySolusi, "s", $idKerusakanTertinggi);
mysqli_stmt_execute($querySolusi);
$resultSolusi = mysqli_stmt_get_result($querySolusi);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Hasil Diagnosa Kerusakan AC</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light py-2">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="gambar/logo.png" width="147" alt="Logo"></a>
            <ul class="navbar-nav ml-auto">
                <li></li>
                <li><a class="btn btn-success ml-2" href="function.php?act=ulang">Cek Ulang</a></li>
                <li><a class="btn btn-primary ml-2" href="logout.php">Log Out</a></li>
            </ul>
        </div>
    </nav>

    <section class="hasil mt-4">
        <div class="container">
            <h3 class="mb-4">Hasil Diagnosa Kerusakan AC</h3>

            <?php if (!empty($hasilDiagnosa)) : ?>
                <h5>Persentase Kerusakan:</h5>
                <?php foreach ($hasilDiagnosa as $idKerusakan => $skor) :
                    $queryNama = mysqli_query($koneksi, "SELECT kerusakan FROM ms_kerusakan WHERE id_kerusakan = '$idKerusakan'");
                    $dataNama = mysqli_fetch_assoc($queryNama);
                    $namaKerusakan = $dataNama['kerusakan'] ?? 'Tidak diketahui';
                ?>
                    <div class='py-1'><strong><?= htmlspecialchars($namaKerusakan) ?> = <?= $skor ?>%</strong></div>
                <?php endforeach; ?>

                <hr>
                <h5 class="mt-4">Kerusakan utama: <span class="text-danger"><?= htmlspecialchars($namaKerusakanTertinggi); ?></span></h5>
                <h5 class="mt-3">Solusi yang disarankan:</h5>
                <?php if (mysqli_num_rows($resultSolusi) > 0) : ?>
                    <?php while ($solusi = mysqli_fetch_assoc($resultSolusi)) : ?>
                        <p>- <?= htmlspecialchars($solusi['solusi']) ?></p>
                    <?php endwhile; ?>
                <?php else : ?>
                    <p class="text-muted">Solusi belum tersedia.</p>
                <?php endif; ?>
            <?php else : ?>
                <p class="text-danger">Belum ada hasil diagnosa.</p>
            <?php endif; ?>
            <div class="row">
                <div class="col-lg-12">
                    <a class="btn btn-danger ml-2" href="cetak.php">Cetak Hasil</a>
                </div>
            </div>
        </div>
    </section>
</body>

</html>