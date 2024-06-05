<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}
?>

<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'surozawaairlines';

// Membuat koneksi
$koneksi = mysqli_connect($servername, $username, $password, $database);

// Periksa koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

?>
<?php
require_once 'dompdf/vendor/autoload.php';

use Dompdf\Dompdf;

// Inisialisasi Dompdf
$dompdf = new Dompdf();

$query = mysqli_query($koneksi, "SELECT * FROM addschedule");

// HTML untuk isi PDF
$html = '<style>
            body {
                font-family: Arial, sans-serif; /* Ganti dengan font yang diinginkan */
            }
            table {
                font-size: 13px; /* Ukuran font untuk tabel */
            }
        </style>';

$html .= '<div style="text-align: center; border-bottom: 2px solid #000; padding-bottom: 10px; margin-bottom: 0;">
        <h3 style="margin-top: 5px;">Surozawa Airlines</h3>
        <p>Jln. Raya Karanglo Km.2 Malang, Jawa Timur, 65145, Indonesia.</p>
        <p>Telp: (123) 456-7890 | Email: info@surozawaairlines.com</p>
      </div>';

$html .= '<center><h3>Data Jadwal Penerbangan</h3></center><hr/><br>';

$html .= '<table border="1" width="100%" cellpadding="10" cellspacing="0">
            <thead>
            <tr>
            <th>No</th>
            <th>ID Schedule</th>
            <th>ID Pesawat</th>
            <th>Tanggal Keberangkatan</th>
            <th>Waktu Keberangkatan</th>
            <th>Bandara Asal</th>
            <th>Bandara Tujuan</th>
            
        </tr>
            </thead>
            <tbody>';

$no = 1;
while ($row = mysqli_fetch_array($query)) {
    $html .= '<tr>
                <td>' . $no . '</td>
                <td>' . $row['id_schedule'] . '</td>
                <td>' . $row['id_pesawat'] . '</td>
                <td>' . $row['tanggal_keberangkatan'] . '</td>
                <td>' . $row['waktu_keberangkatan'] . '</td>
                <td>' . $row['bandara_asal'] . '</td>
                <td>' . $row['bandara_tujuan'] . '</td>
              </tr>';
    $no++;
}

$html .= '</tbody></table>';

// Load HTML ke Dompdf
$dompdf->loadHtml($html);

// Set ukuran kertas dan orientasi
$dompdf->setPaper('A4', 'portrait');

// Render PDF
$dompdf->render();

// Output file PDF ke browser
$dompdf->stream("laporan_JadwalPenerbangan.pdf", array("Attachment" => 0));
?>
