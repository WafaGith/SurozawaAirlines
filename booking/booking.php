<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Tiket Pesawat</title>
    <link rel="stylesheet" type="text/css" href="css/booking.css">
</head>
<body>
    <h1>Pemesanan Tiket Pesawat</h1>

    <h2>Daftar Penerbangan Tersedia:</h2>
    <table id="daftar-penerbangan">
        <tr>
            <th>Nomor Penerbangan</th>
            <th>Berangkat</th>
            <th>Tujuan</th>
            <th>Tanggal</th>
            <th>Waktu</th>
            <th>Harga</th>
            <th>Kapasitas</th>
        </tr>
        <tr>
            <td>ABC123</td>
            <td>Jakarta</td>
            <td>Bali</td>
            <td>2024-04-01</td>
            <td>10:00</td>
            <td>Rp 500.000</td>
            <td>200 kursi</td>
        </tr>
        <tr>
            <td>DEF456</td>
            <td>Bali</td>
            <td>Surabaya</td>
            <td>2024-04-02</td>
            <td>12:00</td>
            <td>Rp 400.000</td>
            <td>150 kursi</td>
        </tr>
        <tr>
            <td>GHI789</td>
            <td>Surabaya</td>
            <td>Medan</td>
            <td>2024-04-03</td>
            <td>14:00</td>
            <td>Rp 600.000</td>
            <td>300 kursi</td>
        </tr>
    </table>

    <!-- <h2>Pesan Tiket:</h2>
    <form id="form-pemesanan">
        <label for="nomor-penerbangan">Nomor Penerbangan:</label>
        <input type="text" id="nomor-penerbangan" required><br><br>

        <label for="jumlah-tiket">Jumlah Tiket:</label>
        <input type="number" id="jumlah-tiket" required><br><br>

        <button type="submit">Pesan Tiket</button>
    </form> -->

    <!-- Button "Kembali ke Dashboard" -->
    <button onclick="window.location.href='admin.php'" class="back-button">Kembali ke Dashboard</button>
</body>
</html>
