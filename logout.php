<?php
session_start(); // Memulai sesi

session_unset(); // Menghapus semua variabel sesi
session_destroy(); // Menghancurkan sesi

header("Location: index.php"); // Mengalihkan pengguna ke halaman login
exit;
?>
