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
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
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
                <i class='bx bxs-user widget-icon'></i>
                <h3>Statistik Pengguna</h3>
                <div class="widget-content">
                    <p>Total Pengguna: 1234</p>
                    <p>Pengguna Aktif: 567</p>
                </div>
            </div>
            <div class="widget">
                <i class='bx bx-bell widget-icon'></i>
                <h3>Pemberitahuan Terbaru</h3>
                <div class="widget-content">
                    <ul>
                        <li>Pemberitahuan 1</li>
                        <li>Pemberitahuan 2</li>
                        <li>Pemberitahuan 3</li>
                    </ul>
                </div>
            </div>
            <div class="widget">
                <i class='bx bx-task widget-icon'></i>
                <h3>Jadwal Penerbangan</h3>
                <div class="widget-content">
                    <ul>
                        <li>Jadwal 1</li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <script>
    let sidebar = document.querySelector(".sidebar");
    let closeBtn = document.querySelector("#btn");
    closeBtn.addEventListener("click", ()=>{
      sidebar.classList.toggle("open");
      menuBtnChange();//calling the function(optional)
    });
    searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
      sidebar.classList.toggle("open");
      menuBtnChange(); //calling the function(optional)
    });
    // following are the code to change sidebar button(optional)
    function menuBtnChange() {
     if(sidebar.classList.contains("open")){
       closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
     }else {
       closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
     }
    }
    </script>
</body>
</html>
