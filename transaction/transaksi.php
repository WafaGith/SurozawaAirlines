<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi</title>
    <link rel="stylesheet" href="css/transaksi.css">
</head>
<body>
    <div class="transaction-container">
        <h2>Riwayat Transaksi Pemesanan Tiket Pesawat</h2>
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Tanggal</th>
                    <th>Keberangkatan</th>
                    <th>Tujuan</th>
                    <th>Jumlah Tiket</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>2024-03-28</td>
                    <td>Jakarta</td>
                    <td>Surabaya</td>
                    <td>2</td>
                    <td>Rp. 500,000</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>2024-03-29</td>
                    <td>Surabaya</td>
                    <td>Jakarta</td>
                    <td>1</td>
                    <td>Rp. 250,000</td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
        <a href="admin.php" class="back-button">Kembali ke Admin Dashboard</a>
    </div>
</body>
</html>