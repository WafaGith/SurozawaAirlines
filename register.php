<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Tiket Pesawat</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: url('assets/3.jpg') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .overlay {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 90%;
        }
        h1 {
            font-size: 2em;
            margin-bottom: 20px;
            color: #333;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }
        input {
            padding: 10px;
            margin-bottom: 10px;
            width: 100%;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-right: 10px;
        }
        button:hover {
            background-color: #0056b3;
        }

        .button {
            display: inline-block;
            background-color: #0099ff;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 10px;
        }
        
        .button:hover {
            background-color: #66ccff;
        }
                
        .back {
            margin-top: 20px;
            display: inline-block;
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
            margin-right: 10px;
        }
        .register {
            margin-top: 20px;
            display: inline-block;
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }
        .popup {
            display: none;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9999;
        }

        .popup-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            padding-top: 0px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            border: 2px solid #007bff; 
        }
        .recov{
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            padding: 8.4px 18px 10px;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 10px;
        }
        .recov:hover{
            background-color: #002fff;
        }
        .close-btn{
            margin: 99.9%;
            margin-right: 0px;
            font-size: 26px;
            padding-top: 0px;
            margin-top: 0px;
        }
        .close-btn:hover{
            color: #e00909;
        }
    </style>
</head>
<body>
    <div class="overlay">
        <h1>Register</h1>
        <form action=" " method="post">
            <input type="text" name="name" placeholder="Nama Lengkap" required>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="email" name="email" placeholder="Email" required>
            <button type="Admin.php">Submit</button>
            <a class="recov" onclick="openRecoveryPopup()">Recovery</a>
        </form>
        <a href="index.php" class="back">Back</a>
        <a href="login.php" class="register">Login</a>
    </div>

    <!-- Pop-up untuk Lupa Password -->
    <div class="popup" id="recoveryPopup">
        <div class="popup-content">
            <b class="close-btn" onclick="closeRecoveryPopup()">x</b><!-- Panggil fungsi closeRecoveryPopup saat tombol close diklik -->
            <h2>Lupa Password</h2>
            <p>Masukkan alamat email Anda untuk mengatur ulang kata sandi.</p>
            <input type="email" placeholder="Alamat Email" required>
            <button type="button" onclick="resetPassword()">Kirim</button> <!-- Panggil fungsi resetPassword saat tombol kirim diklik -->
        </div>
    </div>

    <script>
        function validateForm() {
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;

            if (username === '' || password === '') {
                document.getElementById('popup').style.display = 'block';
                return false; 
            }

            return true; 
        }

        function closePopup() {
            document.getElementById('popup').style.display = 'none';
        }

        function openRecoveryPopup() {
            document.getElementById('recoveryPopup').style.display = 'block';
        }

        function closeRecoveryPopup() {
            var recoveryPopup = document.getElementById('recoveryPopup');
            recoveryPopup.style.animation = 'fadeOut 0.5s ease'; 
            setTimeout(function () {
                recoveryPopup.style.display = 'none';
                recoveryPopup.style.animation = ''; 
            }, 500); 
        }

        function resetPassword() {
            // Logika untuk mengatur ulang kata sandi
            alert('Fungsi untuk mengatur ulang kata sandi akan ditambahkan di sini.');
        }
    </script>

</body>
</html>
