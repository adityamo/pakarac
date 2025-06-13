<?php
require_once 'libs/dompdf/autoload.inc.php'; // sesuaikan dengan path dompdf

use Dompdf\Dompdf;

include 'function.php';


// Cek role (opsional, bisa disamakan seperti di hasil.php)
if (!isset($_SESSION['role']) || $_SESSION['role'] != 1) {
    header("Location: index.php");
    exit;
}

$hasilDiagnosa = $_SESSION['hasil'] ?? [];
arsort($hasilDiagnosa);

$idKerusakanTertinggi = array_key_first($hasilDiagnosa);
$skorTertinggi = $hasilDiagnosa[$idKerusakanTertinggi] ?? 0;
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

// Bangun HTML-nya
$html = '<h3>Hasil Diagnosa Kerusakan AC</h3>';

if (!empty($hasilDiagnosa)) {
    $html .= "<h5>Persentase Kerusakan:</h5>";
    foreach ($hasilDiagnosa as $idKerusakan => $skor) {
        $queryNama = mysqli_query($koneksi, "SELECT kerusakan FROM ms_kerusakan WHERE id_kerusakan = '$idKerusakan'");
        $dataNama = mysqli_fetch_assoc($queryNama);
        $namaKerusakan = $dataNama['kerusakan'] ?? 'Tidak diketahui';
        $html .= "<p><strong>" . htmlspecialchars($namaKerusakan) . " = " . $skor . "%</strong></p>";
    }

    $html .= "<hr>";
    $html .= "<h5>Kerusakan utama: <span style='color:red'>" . htmlspecialchars($namaKerusakanTertinggi) . "</span></h5>";
    $html .= "<h5>Solusi yang disarankan:</h5>";

    if (mysqli_num_rows($resultSolusi) > 0) {
        while ($solusi = mysqli_fetch_assoc($resultSolusi)) {
            $html .= "<p>- " . htmlspecialchars($solusi['solusi']) . "</p>";
        }
    } else {
        $html .= "<p><em>Solusi belum tersedia.</em></p>";
    }
} else {
    $html .= "<p><strong>Belum ada hasil diagnosa.</strong></p>";
}

// Inisialisasi Dompdf dan cetak PDF
$dompdf = new Dompdf();
$dompdf->loadHtml($html);

// Ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'portrait');

// Render dan kirim ke browser
$dompdf->render();
$dompdf->stream("hasil-diagnosa.pdf", ["Attachment" => false]); // Set ke true jika ingin langsung download
exit;
