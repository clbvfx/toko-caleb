<!DOCTYPE html>
<html>

<head>
    <title>New User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* CSS untuk membuat tabel berada di tengah */
        .center-table {
            margin: 0 auto;
            /* Margin kiri dan kanan auto untuk membuat tabel berada di tengah */
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
    ?>

    <div class="container">
        <div class="text-center">
            <h1>Tambah User</h1>
        </div>
        <form action="create-user.php" method="POST">
            <div class="table-responsive center-table">
                <table class="table table-bordered">
                    <tr>
                        <td>Username</td>
                        <td><input type="text" name="username" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="password" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>Level</td>
                        <td>
                            <select name="level" class="form-select">
                                <option value="admin">admin</option>
                                <option value="keuangan">keuangan</option>
                                <option value="logistik">logistik</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="submit" class="btn btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-secondary">RESET</button>
                        </td>
                    </tr>
                </table>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>