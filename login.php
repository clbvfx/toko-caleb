<!DOCTYPE html>
<html>

<head>
    <title>Halaman Login</title>
    <link rel="stylesheet" href="login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="wrapper">
        <form action="validasi.php" method="POST">
            <h1>Selamat datang!</h1>
            <div class="input-box">
                <input type="text" name="username" placeholder="username" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="password" required>
                <i class='bx bx-lock'></i>
            </div>
            <button type="submit" class="btn">Login</button>
            <button type="reset" class="btn">Clear</button>
            <p id="greeting"></p>
        </form>
    </div>
</body>

</html>