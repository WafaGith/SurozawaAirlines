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
<title>Admin Panel</title>
<link rel="stylesheet" href="css/kategori.css">
</head>
<body>

<div class="container">
    <h2>Tabel Tiket Pesawat</h2>
    <table>
        <thead>
            <tr>
                <th>Maskapai</th>
                <th>Kategori Class Pesawat</th>
                <th>Keterangan</th>
                <th>Harga</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Garuda Indonesia</td>
                <td>Economy Class</td>
                <td>Lorem ipsum dolor sit amet</td>
                <td>$500</td>
                <td>
                    <a href="#" class="edit-button">Edit</a>
                    <a href="#" class="delete-button">Delete</a>
                </td>
            </tr>
            <tr>
                <td>Lion Air</td>
                <td>Bussinis Class</td>
                <td>Lorem ipsum dolor sit amet</td>
                <td>$500</td>
                <td>
                    <a href="#" class="edit-button">Edit</a>
                    <a href="#" class="delete-button">Delete</a>
                </td>
            </tr>
            <tr>
                <td>Surozawa Air</td>
                <td>Privat Jet Class</td>
                <td>Lorem ipsum dolor sit amet</td>
                <td>$500</td>
                <td>
                    <a href="#" class="edit-button">Edit</a>
                    <a href="#" class="delete-button">Delete</a>
                </td>
            </tr>
            <!-- Tambahkan data tambahan disini -->
        </tbody>
    </table>
    <a href="admin.php" class="back-button">Kembali</a>
    <a href="#" class="add-button">Tambah Data</a>
</div>

</body>
</html>
