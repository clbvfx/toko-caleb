<!DOCTYPE html>
<html>

<head>
    <title>New Penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include "menu.php"; ?>

    <?php
    if ($_SESSION["level"] != "admin" && $_SESSION["level"] != "keuangan") {
        echo "Anda tidak dapat mengakses halaman ini";
        exit;
    }
    ?>

    <?php
    require "koneksi.php";
    $sql = "SELECT * FROM barang";
    $query = mysqli_query($koneksi, $sql);
    ?>

    <div>
        <form action="create-penjualan.php" method="POST">
            <h1>Tambah Penjualan</h1>
            <table>
                <tr>
                    <td>Barang</td>
                    <td>
                        <select name="id_barang">
                            <?php while ($barang = mysqli_fetch_array($query)) : ?>
                                <option value='<?= $barang["id"] ?>'>
                                    <?= $barang["nama"] ?>, harga: <?= $barang["harga_jual"] ?>, stok: <?= $barang["stok"] ?>
                                </option>
                            <?php endwhile ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Jumlah</td>
                    <td><input type="number" min="0" name="jumlah"></td>
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