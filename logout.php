<?php
if (isset($_GET['logout']) && $_GET['logout'] == 'yes') {
    session_start(); // Memulai sesi
    session_unset(); // Menghapus semua variabel sesi
    session_destroy(); // Menghancurkan sesi
    header("Location: index.php"); // Mengalihkan pengguna ke halaman login
    exit;
} else {
    echo "<script>
            if (confirm('Apakah Anda yakin ingin logout?')) {
                window.location.href = 'logout.php?logout=yes';
            } else {
                window.location.href = 'dashboard.php';
            }
          </script>";
}
?>
