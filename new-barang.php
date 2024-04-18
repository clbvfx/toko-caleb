<!DOCTYPE html>
<html>

<head>
    <title>New Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* CSS untuk membuat tabel berukuran sedang */
        .center-table {
            margin: 0 auto;
            /* Margin kiri dan kanan auto untuk membuat tabel berada di tengah */
            width: 50%;
            /* Lebar tabel */
        }
    </style>
</head>

<body>
    <?php include "menu.php"; ?>

    <?php
    if ($_SESSION["level"] != "admin" && $_SESSION["level"] != "logistik") {
        echo "Anda tidak dapat mengakses halaman ini";
        exit;
    }
    ?>

    <div class="container">
        <form action="create-barang.php" method="POST">
            <div class="text-center">
                <h1>Tambah Barang</h1>
            </div>
            <table class="center-table">
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama"></td>
                </tr>
                <tr>
                    <td>Kategori</td>
                    <td>
                        <select name="kategori" class="form-select">
                            <option value="makanan">makanan</option>
                            <option value="minuman">minuman</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Stok</td>
                    <td><input type="number" min="0" name="stok"></td>
                </tr>
                <tr>
                    <td>Harga Beli</td>
                    <td><input type="number" min="0" name="harga_beli"></td>
                </tr>
                <tr>
                    <td>Harga Jual</td>
                    <td><input type="number" min="0" name="harga_jual"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" class="btn btn-primary">SIMPAN</button>
                        <button type="reset" class="btn btn-secondary">RESET</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>