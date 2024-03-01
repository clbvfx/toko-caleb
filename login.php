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
            <h1>Selamat Datang!</h1>
            <div class="input-box">
                <input type="text" name="username" placeholder="username" require>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="password">
                <i class='bx bx-lock'></i>
            </div>
            <button type="submit" class="btn">login</button>
            <button type="reset" class="btn">clear</button>
    </div>
    </form>
    </div>
</body>

</html>