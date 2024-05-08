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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Surozawa Airlines</title>
    <link
      rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link rel="stylesheet" href="css/admin.css" />
  </head>
  <body>
    <div class="sidebar">
      <div class="logo">
        <img src="assets/logo5.png" alt="Logo" />
      </div>
      <a href="kategori.php">Kategori</a>
      <a href="booking.php">Booking</a>
      <a href="transaksi.php">Transaksi</a>
      <a href="logout.php">Keluar</a>
    </div>

    <div class="content">
      <h2>Dashboard</h2>
      <p>
        Selamat datang di dashboard Surozawa Airlines. Di sini Anda dapat
        melihat statistik, laporan, dan mengelola informasi terkait penerbangan,
        booking, dan transaksi.
      </p>
      <div class="dashboard-widgets">
        <div class="widget">
          <h3>Statistik Penerbangan</h3>
          <p>
            Statistik tentang jumlah penerbangan, rute populer, dan jumlah
            penumpang per bulan.
          </p>
        </div>
        <div class="widget">
          <h3>Booking Terbaru</h3>
          <p>Daftar booking terbaru yang perlu diproses atau dikonfirmasi.</p>
        </div>
        <div class="widget">
          <h3>Transaksi Terakhir</h3>
          <p>Daftar transaksi terakhir yang dilakukan oleh penumpang.</p>
        </div>
      </div>
    </div>
  </body>
</html>
