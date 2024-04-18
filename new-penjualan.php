<!DOCTYPE html>
<html>

<head>
    <title>New Penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 60px;
            /* Untuk memberi ruang pada navbar */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 0;
        }

        form {
            width: 50%;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        table {
            width: 100%;
        }

        td {
            padding: 8px;
        }

        button {
            padding: 5px 15px;
            margin-top: 10px;
        }
    </style>
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
            <h1 class="text-center">Tambah Penjualan</h1>
            <table>
                <tr>
                    <td>Barang</td>
                    <td>
                        <select name="id_barang" class="form-select">
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
                    <td><input type="number" min="0" name="jumlah" class="form-control"></td>
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