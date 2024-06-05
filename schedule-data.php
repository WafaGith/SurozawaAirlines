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
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_schedule']) && isset($_POST['delete_schedule'])) {
    $id_schedule = $_POST['id_schedule'];

    $delete_sql = "DELETE FROM addschedule WHERE id_schedule = '$id_schedule'";
    if (mysqli_query($koneksi, $delete_sql)) {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "Error: " . $delete_sql . "<br>" . mysqli_error($koneksi);
    }
}

// Menyimpan data ke tabel addschedule jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_schedule'])) {
    $id_pesawat = $_POST['id_pesawat'];
    $tanggal_keberangkatan = $_POST['tanggal_keberangkatan'];
    $waktu_keberangkatan = $_POST['waktu_keberangkatan'];
    $bandara_asal = $_POST['bandara_asal'];
    $bandara_tujuan = $_POST['bandara_tujuan'];

    $insert_sql = "INSERT INTO addschedule (id_schedule, id_pesawat, tanggal_keberangkatan, waktu_keberangkatan, bandara_asal, bandara_tujuan)
                   VALUES (NULL, '$id_pesawat', '$tanggal_keberangkatan', '$waktu_keberangkatan', '$bandara_asal', '$bandara_tujuan')";

    if (mysqli_query($koneksi, $insert_sql)) {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "Error: " . $insert_sql . "<br>" . mysqli_error($koneksi);
    }
}

// Mengedit data jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_schedule'])) {
    $id_schedule = $_POST['id_schedule'];
    $id_pesawat = $_POST['id_pesawat'];
    $tanggal_keberangkatan = $_POST['tanggal_keberangkatan'];
    $waktu_keberangkatan = $_POST['waktu_keberangkatan'];
    $bandara_asal = $_POST['bandara_asal'];
    $bandara_tujuan = $_POST['bandara_tujuan'];

    $update_sql = "UPDATE addschedule SET id_pesawat='$id_pesawat', tanggal_keberangkatan='$tanggal_keberangkatan', waktu_keberangkatan='$waktu_keberangkatan', bandara_asal='$bandara_asal', bandara_tujuan='$bandara_tujuan' WHERE id_schedule='$id_schedule'";

    if (mysqli_query($koneksi, $update_sql)) {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "Error: " . $update_sql . "<br>" . mysqli_error($koneksi);
    }
}

$sql = "SELECT * FROM addschedule ORDER BY id_schedule DESC";
$result = mysqli_query($koneksi, $sql);

// Mengambil data pesawat dari tabel plane
$sql_planes = "SELECT id_pesawat, nama_pesawat FROM plane ORDER BY nama_pesawat ASC";
$result_planes = mysqli_query($koneksi, $sql_planes);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dashboard.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Schedule Data</title>
    <style>
        .action-btn {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 6px 12px;
            cursor: pointer;
            border-radius: 4px;
        }

        .action-btn:hover {
            background-color: #c82333;
        }

        .edit-btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 6px 12px;
            cursor: pointer;
            border-radius: 4px;
            margin-right: 5px;
        }

        .edit-btn:hover {
            background-color: #0056b3;
        }

        .add-btn {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 6px 12px;
            cursor: pointer;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        .add-btn:hover {
            background-color: #218838;
        }

        .delete-btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 6px 12px;
            cursor: pointer;
            border-radius: 4px;
            margin-right: 5px;
        }

        .delete-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <?php include 'sidebar.php'; ?>
    <section class="home-section">
        <div class="text">Schedule Data</div>
        <div class="table-container">
            <tr>
                <td><button type="button" class="add-btn" data-toggle="modal" data-target="#addScheduleModal">Add Schedule</button></td>
                <td><button type="button" onclick="window.location.href='schedule-cetak.php'" class="add-btn" style="background-color: orange;">Cetak</button></td>

            </tr>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Schedule</th>
                        <th>ID Pesawat</th>
                        <th>Tanggal Keberangkatan</th>
                        <th>Waktu Keberangkatan</th>
                        <th>Bandara Asal</th>
                        <th>Bandara Tujuan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        $no = 1; // Inisialisasi nomor urut
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                    <td>{$no}</td>
                                    <td>{$row['id_schedule']}</td>
                                    <td>{$row['id_pesawat']}</td>
                                    <td>{$row['tanggal_keberangkatan']}</td>
                                    <td>{$row['waktu_keberangkatan']}</td>
                                    <td>{$row['bandara_asal']}</td>
                                    <td>{$row['bandara_tujuan']}</td>
                                    <td>
                                    <div class='action-buttons' style='display: flex; gap: 10px; align-items: center;'>
                                    <button type='button' class='edit-btn' data-toggle='modal' data-target='#editScheduleModal{$row['id_schedule']}'>Edit</button>
                                    <form action='' method='POST' style='display:inline-block; margin: 0;'>
                                        <input type='hidden' name='id_schedule' value='{$row['id_schedule']}'>
                                        <input type='hidden' name='delete_schedule' value='1'>
                                        <button type='submit' class='delete-btn' style='background-color: red; color: white;'>Delete</button>
                                    </form>
                                </div>
                                
                                    </td>
                                  </tr>";
                            $no++; // Increment nomor urut
                        }
                    } else {
                        echo "<tr><td colspan='8'>No data found!</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Modal Tambah -->
    <div class="modal fade" id="addScheduleModal" tabindex="-1" role="dialog" aria-labelledby="addScheduleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addScheduleModalLabel">Tambah Jadwal Penerbangan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <label for="id_pesawat">Nama Pesawat:</label><br>
                        <select id="id_pesawat" name="id_pesawat" required>
                            <?php
                            if (mysqli_num_rows($result_planes) > 0) {
                                while ($row = mysqli_fetch_assoc($result_planes)) {
                                    echo "<option value='{$row['id_pesawat']}'>{$row['nama_pesawat']}</option>";
                                }
                            } else {
                                echo "<option value=''>No planes available</option>";
                            }
                            ?>
                        </select><br><br>

                        <label for="tanggal_keberangkatan">Tanggal Keberangkatan:</label><br>
                        <input type="date" id="tanggal_keberangkatan" name="tanggal_keberangkatan" required><br><br>

                        <label for="waktu_keberangkatan">Waktu Keberangkatan:</label><br>
                        <input type="time" id="waktu_keberangkatan" name="waktu_keberangkatan" required><br><br>

                        <label for="bandara_asal">Bandara Asal:</label><br>
                        <input type="text" id="bandara_asal" name="bandara_asal" required><br><br>

                        <label for="bandara_tujuan">Bandara Tujuan:</label><br>
                        <input type="text" id="bandara_tujuan" name="bandara_tujuan" required><br><br>

                        <input type="hidden" name="add_schedule" value="1">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit (buatkan modal untuk setiap jadwal) -->
    <?php
    if (mysqli_num_rows($result) > 0) {
        mysqli_data_seek($result, 0); // Reset pointer hasil query
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
            <div class="modal fade" id="editScheduleModal<?= $row['id_schedule'] ?>" tabindex="-1" role="dialog" aria-labelledby="editScheduleModalLabel<?= $row['id_schedule'] ?>" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editScheduleModalLabel<?= $row['id_schedule'] ?>">Edit Jadwal Penerbangan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST">
                                <label for="id_pesawat_<?= $row['id_schedule'] ?>">Nama Pesawat:</label><br>
                                <select id="id_pesawat_<?= $row['id_schedule'] ?>" name="id_pesawat" required>
                                    <?php
                                    if (mysqli_num_rows($result_planes) > 0) {
                                        mysqli_data_seek($result_planes, 0); // Reset pointer hasil query pesawat
                                        while ($plane = mysqli_fetch_assoc($result_planes)) {
                                            $selected = ($plane['id_pesawat'] == $row['id_pesawat']) ? 'selected' : '';
                                            echo "<option value='{$plane['id_pesawat']}' $selected>{$plane['nama_pesawat']}</option>";
                                        }
                                    } else {
                                        echo "<option value=''>No planes available</option>";
                                    }
                                    ?>
                                </select><br><br>

                                <label for="tanggal_keberangkatan_<?= $row['id_schedule'] ?>">Tanggal Keberangkatan:</label><br>
                                <input type="date" id="tanggal_keberangkatan_<?= $row['id_schedule'] ?>" name="tanggal_keberangkatan" value="<?= $row['tanggal_keberangkatan'] ?>" required><br><br>

                                <label for="waktu_keberangkatan_<?= $row['id_schedule'] ?>">Waktu Keberangkatan:</label><br>
                                <input type="time" id="waktu_keberangkatan_<?= $row['id_schedule'] ?>" name="waktu_keberangkatan" value="<?= $row['waktu_keberangkatan'] ?>" required><br><br>

                                <label for="bandara_asal_<?= $row['id_schedule'] ?>">Bandara Asal:</label><br>
                                <input type="text" id="bandara_asal_<?= $row['id_schedule'] ?>" name="bandara_asal" value="<?= $row['bandara_asal'] ?>" required><br><br>

                                <label for="bandara_tujuan_<?= $row['id_schedule'] ?>">Bandara Tujuan:</label><br>
                                <input type="text" id="bandara_tujuan_<?= $row['id_schedule'] ?>" name="bandara_tujuan" value="<?= $row['bandara_tujuan'] ?>" required><br><br>

                                <input type="hidden" name="id_schedule" value="<?= $row['id_schedule'] ?>">
                                <input type="hidden" name="edit_schedule" value="1">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    <?php
        }
    }
    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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