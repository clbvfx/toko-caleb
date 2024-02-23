<!DOCTYPE html>
<html>

<head>
    <title>Halaman Login</title>
    <link rel="stylesheet" href="login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="box-login">
        <form action="validasi.php" method="POST">
            <h1>Selamat Datang!</h1>
            <table>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit">LOGIN</button>
                        <button type="reset">CLEAR</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>