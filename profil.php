<!DOCTYPE html>
<html>

<head>
    <title>Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="menu.css">
</head>

<body>
    <?php include "menu.php"; ?>

    <?php
    require "koneksi.php";
    $id = $_SESSION["id"];

    $sql = "SELECT * FROM user WHERE id = '$id'";
    $query = mysqli_query($koneksi, $sql);

    $user = mysqli_fetch_array($query);
    ?>

    <div>
        <form action="update-profil.php" method="POST">
            <h1>Profil</h1>

            <input type="hidden" name="id" value="<?= $id ?>">

            <table>
                <tr>
                    <td>Username</td>
                    <td><input readonly type="text" name="username" value="<?= $user["username"] ?>"></td>
                </tr>
                <tr>
                    <td>Password Baru</td>
                    <td><input required type="password" name="new_password"></td>
                </tr>
                <tr>
                    <td>Ulangi Password Baru</td>
                    <td><input required type="password" name="confirm_password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit">SIMPAN</button>
                        <button type="reset">RESET</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</html>
</body>

</html>