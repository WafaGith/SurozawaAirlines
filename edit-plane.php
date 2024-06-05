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

// Mengecek koneksi
if (!$koneksi) {
    die('Connection Failed: ' . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id_pesawat'])) {
    $id_pesawat = $_GET['id_pesawat'];
    $sql = "SELECT * FROM plane WHERE id_pesawat = '$id_pesawat'";
    $result = mysqli_query($koneksi, $sql);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "Data not found!";
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Tangani perubahan data
    $id_pesawat = $_POST['id_pesawat'];
    // Ambil data dari form
    $nama_pesawat = $_POST['nama_pesawat'];
    $kapasitas = $_POST['kapasitas'];
    $jenis_pesawat = $_POST['jenis_pesawat'];
    $tanggal_pembuatan = $_POST['tanggal_pembuatan'];
    $nomor_registrasi = $_POST['nomor_registrasi'];

    // Lakukan proses update ke database
    $update_sql = "UPDATE plane SET nama_pesawat = '$nama_pesawat', kapasitas = '$kapasitas', jenis_pesawat = '$jenis_pesawat', tanggal_pembuatan = '$tanggal_pembuatan', nomor_registrasi = '$nomor_registrasi' WHERE id_pesawat = '$id_pesawat'";
    if (mysqli_query($koneksi, $update_sql)) {
        header("Location: plane-data.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($koneksi);
    }
}

mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dashboard.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <title>Edit</title>
    <style>
        /* dashboard.css */
        .add-btn, .action-btn, .submit-btn {
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
        .submit-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <?php include 'sidebar.php'; ?>
    <section class="home-section">
        <div class="text">Edit Data Pesawat</div>
        <div class="form-container">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="hidden" name="id_pesawat" value="<?php echo $row['id_pesawat']; ?>">
                <label for="nama_pesawat">Nama Pesawat:</label><br>
                <input type="text" id="nama_pesawat" name="nama_pesawat" value="<?php echo $row['nama_pesawat']; ?>"><br>
                <label for="kapasitas">Kapasitas:</label><br>
                <input type="text" id="kapasitas" name="kapasitas" value="<?php echo $row['kapasitas']; ?>"><br>
                <label for="jenis_pesawat">Jenis Pesawat:</label><br>
                <input type="text" id="jenis_pesawat" name="jenis_pesawat" value="<?php echo $row['jenis_pesawat']; ?>"><br>
                <label for="tanggal_pembuatan">Tanggal Pembuatan:</label><br>
                <input type="text" id="tanggal_pembuatan" name="tanggal_pembuatan" value="<?php echo $row['tanggal_pembuatan']; ?>"><br>
                <label for="nomor_registrasi">Nomor Registrasi:</label><br>
                <input type="text" id="nomor_registrasi" name="nomor_registrasi" value="<?php echo $row['nomor_registrasi']; ?>"><br><br>
                <input type="submit" name="submit" value="Submit" class="submit-btn">
            </form>
        </div>
    </section>
</body>
</html>
