<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

// Database connection
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'surozawaairlines';

// Create connection
$koneksi = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$koneksi) {
    die('Connection Failed:' . mysqli_connect_error());
}

$sql = "SELECT id_schedule, id_pesawat, tanggal_keberangkatan, waktu_keberangkatan, bandara_asal, bandara_tujuan FROM addschedule";
$result = $koneksi->query($sql);

$schedules = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $schedules[] = $row;
    }
} else {
    echo "0 results";
}
$koneksi->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dashboard.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <title>Dashboard</title>
    <style>
        .widgets {
            display: flex;
            gap: 20px;
            margin: 20px;
        }

        .widget {
            flex: 1;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .widget h3 {
            margin-bottom: 20px;
            font-size: 1.5em;
        }

        .widget-content {
            font-size: 1em;
        }

        .widget-icon {
            font-size: 2em;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <?php include 'sidebar.php'; ?>
    <section class="home-section">
        <div class="text">Dashboard</div>
        <div class="widgets">
            <div class="widget">
                <i class='bx bxs-plane widget-icon'></i>
                <h3>Pesawat Aktif</h3>
                <div class="widget-content">
                    <?php
                    $activePlanes = array_unique(array_column($schedules, 'id_pesawat'));
                    echo "<p>Pesawat: " . implode(", ", $activePlanes) . "</p>";
                    echo "<p>Total Pesawat: " . count($activePlanes) . "</p>";
                    ?>
                </div>
            </div>
            <div class="widget">
                <i class='bx bx-bell widget-icon'></i>
                <h3>Penerbangan Terbaru</h3>
    <div class="widget-content" style="padding-left: 20px;">
        <?php
        if (empty($schedules)) {
            echo "<p>Tidak ada penerbangan terbaru</p>";
        } else {
            echo "<ul>";
            $count = 0;            foreach ($schedules as $schedule) {
                echo "<li>" . $schedule['bandara_asal'] . " ke " . $schedule['bandara_tujuan'] . " pada tanggal " . $schedule['tanggal_keberangkatan'] . "</li>";
                $count++;
                if ($count >= 2) {
                    break; // Hanya tampilkan 2 penerbangan
                }
            }
            echo "</ul>";
        }
        ?>


                </div>
            </div>
            <div class="widget">
                <i class='bx bx-task widget-icon'></i>
                <h3>Total Penerbangan</h3>
                <div class="widget-content">
                    <?php
                    $totalFlights = count($schedules);
                    echo "<p>Total Penerbangan: " . $totalFlights . "</p>";
                    ?>
                </div>
            </div>
        </div>
    </section>

    <script>
        let sidebar = document.querySelector(".sidebar");
        let closeBtn = document.querySelector("#btn");
        closeBtn.addEventListener("click", () => {
            sidebar.classList.toggle("open");
            menuBtnChange(); //calling the function(optional)
        });
        searchBtn.addEventListener("click", () => { // Sidebar open when you click on the search icon
            sidebar.classList.toggle("open");
            menuBtnChange(); //calling the function(optional)
        });
        // following are the code to change sidebar button(optional)
        function menuBtnChange() {
            if (sidebar.classList.contains("open")) {
                closeBtn.classList.replace("bx-menu", "bx-menu-alt-right"); //replacing the icons class
            } else {
                closeBtn.classList.replace("bx-menu-alt-right", "bx-menu"); //replacing the icons class
            }
        }
    </script>
</body>

</html>