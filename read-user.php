<!DOCTYPE html>
<html>

<head>
    <title>Read User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 20px;
        }

        .table {
            width: 50%;
            margin: auto;
        }

        button[type="submit"],
        button[type="reset"] {
            margin-top: 10px;
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }

        button[type="submit"]:hover,
        button[type="reset"]:hover {
            opacity: 0.8;
        }
    </style>
</head>

<body>
    <?php include "menu.php"; ?>

    <?php
    if ($_SESSION["level"] != "admin") {
        echo "Anda tidak dapat mengakses halaman ini";
        exit;
    }

    require "koneksi.php";

    $id = $_GET["id"];

    $sql = "SELECT * FROM user WHERE id = '$id'";
    $query = mysqli_query($koneksi, $sql);
    $user = mysqli_fetch_array($query);
    ?>

    <div class="container">
        <form action="updated-user.php" method="POST" class="table">
            <h1 class="text-center">Lihat User</h1>

            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="hidden" name="old_password" value="<?= $user["password"] ?>">

            <table class="table table-bordered">
                <tr>
                    <td>Username</td>
                    <td><input class="form-control" type="text" name="username" value="<?= $user["username"] ?>"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input class="form-control" type="password" name="password"></td>
                </tr>
                <tr>
                    <td>Level</td>
                    <td>
                        <select class="form-select" name="level">
                            <option value="admin" <?= $user["level"] == "admin" ? "selected" : "" ?>>admin</option>
                            <option value="keuangan" <?= $user["level"] == "keuangan" ? "selected" : "" ?>>keuangan</option>
                            <option value="logistik" <?= $user["level"] == "logistik" ? "selected" : "" ?>>logistik</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center">
                        <button type="submit" class="btn btn-primary">SIMPAN</button>
                        <button type="reset" class="btn btn-danger">RESET</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>