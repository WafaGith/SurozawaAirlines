<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'surozawaairlines';

// Membuat koneksi
$koneksi = mysqli_connect($servername, $username, $password, $database);

// Mengecek koneksi
if (!$koneksi) {
    die('Connection Failed: ' . mysqli_connect_error());
}

// Menghapus data jika ada permintaan DELETE
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_pesawat'])) {
    $id_pesawat = $_POST['id_pesawat'];

    $delete_sql = "DELETE FROM plane WHERE id_pesawat = '$id_pesawat'";
    if (mysqli_query($koneksi, $delete_sql)) {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "Error: " . $delete_sql . "<br>" . mysqli_error($koneksi);
    }
}

$sql = "SELECT * FROM plane ORDER BY id_pesawat DESC";
$result = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dashboard.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <title>Plane Data</title>
    <style>
        /* dashboard.css */
        /* Add button styles */
        .add-btn {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-right: 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        /* Styling untuk tombol Edit */
        .edit-btn {
            background-color: #007bff;
            /* Warna biru */
            color: #fff;
            /* Warna teks putih */
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 3px;
        }

        .edit-btn:hover {
            background-color: #0056b3;
            /* Warna latar belakang saat dihover */
        }

        /* Styling untuk tombol Delete */
        .delete-btn {
            background-color: #f44336;
            /* Warna merah */
            color: #fff;
            /* Warna teks putih */
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 3px;
        }

        .delete-btn:hover {
            background-color: #d32f2f;
            /* Warna latar belakang saat dihover */
        }
    </style>
</head>

<body>
    <?php include 'sidebar.php'; ?>
    <section class="home-section">
        <div class="text">Plane Data</div>
        <div class="table-container">
            <a href="add-plane.php" class="add-btn">Tambah Data</a>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Pesawat</th>
                        <th>Nama Pesawat</th>
                        <th>Kapasitas</th>
                        <th>Jenis Pesawat</th>
                        <th>Tanggal Pembuatan</th>
                        <th>Nomor Registrasi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result && mysqli_num_rows($result) > 0) {
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                    <td>{$no}</td>
                                    <td>{$row['id_pesawat']}</td>
                                    <td>{$row['nama_pesawat']}</td>
                                    <td>{$row['kapasitas']}</td>
                                    <td>{$row['jenis_pesawat']}</td>
                                    <td>{$row['tanggal_pembuatan']}</td>
                                    <td>{$row['nomor_registrasi']}</td>
                                    <td>

                                    <form action='edit-plane.php' method='GET' style='display:inline-block;'>
    <input type='hidden' name='id_pesawat' value='{$row['id_pesawat']}'>
    <button type='submit' class='edit-btn' style='background-color: #007bff; color: #fff; border: none; padding: 5px 10px; cursor: pointer; border-radius: 3px;'>Edit</button>
</form>

<form action='' method='POST' style='display:inline-block;'>
    <input type='hidden' name='id_pesawat' value='{$row['id_pesawat']}'>
    <button type='submit' class='delete-btn' style='background-color: #f44336; color: #fff; border: none; padding: 5px 10px; cursor: pointer; border-radius: 3px;'>Delete</button>
</form>

                                
                                    </td>
                                  </tr>";
                            $no++;
                        }
                    } else {
                        echo "<tr><td colspan='8'>No data found!</td></tr>";
                    }
                    mysqli_close($koneksi);
                    ?>
                </tbody>
            </table>
        </div>
    </section>
</body>

</html>