<!DOCTYPE html>
<html>

<head>
    <title>Read Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include "menu.php"; ?>

    <?php

    require "koneksi.php";

    $id = $_GET["id"];

    $sql = "SELECT * FROM barang WHERE id = '$id'";
    $query = mysqli_query($koneksi, $sql);

    $barang = mysqli_fetch_array($query);
    ?>

    <div>
        <form action="update-barang.php" method="POST">
            <h1>Lihat Barang</h1>

            <input type="hidden" name="id" value="<?= $id ?>">

            <table>
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama" value="<?= $barang["nama"] ?>"></td>
                </tr>
                <tr>
                    <td>Kategori</td>
                    <td>
                        <select name="kategori">
                            <option value="gaming" <?= $barang["kategori"] == "gaming" ? "selected" : "" ?>>GAMING</option>
                            <option value="komersil" <?= $barang["kategori"] == "komersil" ? "selected" : "" ?>>KOMERSIL</option>
                            <option value="editing" <?= $barang["kategori"] == "editing" ? "selected" : "" ?>>EDITING</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Stok</td>
                    <td><input type="number" name="stok" value="<?= $barang["stok"] ?>"></td>
                </tr>
                <tr>
                    <td>Harga Beli</td>
                    <td><input type="number" name="harga_beli" value="<?= $barang["harga_beli"] ?>"></td>
                </tr>
                <tr>
                    <td>Harga Jual</td>
                    <td><input type="number" name="harga_jual" value="<?= $barang["harga_jual"] ?>"></td>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>