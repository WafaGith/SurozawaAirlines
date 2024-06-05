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
    <link rel="stylesheet" href="css/dashboard.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <title>Tambah Data Pesawat</title>
    <style>
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #f4f4f4;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-container form {
            display: flex;
            flex-direction: column;
        }
        .form-container label {
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-container input {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-container button {
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        .form-container button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php include 'sidebar.php'; ?>
    <section class="home-section">
        <div class="text">Tambah Data Pesawat</div>
        <div class="form-container">
            <form action="" method="POST" class="centered-form">
                <label for="nama_pesawat">Nama Pesawat:</label>
                <input type="text" id="nama_pesawat" name="nama_pesawat" required>
                
                <label for="kapasitas">Kapasitas:</label>
                <input type="number" id="kapasitas" name="kapasitas">
                
                <label for="jenis_pesawat">Jenis Pesawat:</label>
                <input type="text" id="jenis_pesawat" name="jenis_pesawat">
                
                <label for="tanggal_pembuatan">Tanggal Pembuatan:</label>
                <input type="date" id="tanggal_pembuatan" name="tanggal_pembuatan">
                
                <label for="nomor_registrasi">Nomor Registrasi:</label>
                <input type="text" id="nomor_registrasi" name="nomor_registrasi">
                
                <button type="submit">Submit</button>
            </form>
        </div>
    </section>
    
    <script>
        let sidebar = document.querySelector(".sidebar");
        let closeBtn = document.querySelector("#btn");
        closeBtn.addEventListener("click", () => {
            sidebar.classList.toggle("open");
            menuBtnChange();
        });
        
        function menuBtnChange() {
            if (sidebar.classList.contains("open")) {
                closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");
            } else {
                closeBtn.classList.replace("bx-menu-alt-right", "bx-menu");
            }
        }
    </script>
</body>
</html>

<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_pesawat = $_POST['nama_pesawat'];
    $kapasitas = isset($_POST['kapasitas']) ? $_POST['kapasitas'] : null;
    $jenis_pesawat = isset($_POST['jenis_pesawat']) ? $_POST['jenis_pesawat'] : null;
    $tanggal_pembuatan = isset($_POST['tanggal_pembuatan']) ? $_POST['tanggal_pembuatan'] : null;
    $nomor_registrasi = isset($_POST['nomor_registrasi']) ? $_POST['nomor_registrasi'] : null;

    $sql = "INSERT INTO plane (id_pesawat, nama_pesawat, kapasitas, jenis_pesawat, tanggal_pembuatan, nomor_registrasi) 
            VALUES (NULL, '$nama_pesawat', '$kapasitas', '$jenis_pesawat', '$tanggal_pembuatan', '$nomor_registrasi')";

    if (mysqli_query($koneksi, $sql)) {
        header("Location: plane/plane-data.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }
}

mysqli_close($koneksi);
?>
