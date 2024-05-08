<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Tiketing Pesawat</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: url('assets/2.jpg') no-repeat center center fixed;
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
        input, button {
            padding: 10px;
            margin-bottom: 10px;
            width: 100%;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #0056b3;
        }
        .back, .register {
            margin-top: 20px;
            display: inline-block;
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }
        .register {
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <div class="overlay">
        <h1>Login</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <a href="index.php" class="back">Back</a>
        <a href="register.php" class="register">Register</a>  
    </div>

<?php
session_start();

// Dummy data for example
$dummy_users = [
    'wafa69' => '69wafa',
    'Admin' => '000'
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check credentials
    if (isset($dummy_users[$username]) && $dummy_users[$username] === $password) {
        // Set session variables
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;

        // Redirect to the user dashboard or homepage
        header("Location: admin.php");
        exit;
    } else {
        echo "<script>alert('Hayo, passwordnya salah loh');</script>";
    }
}
?>

</body>
</html>
