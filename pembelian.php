<!DOCTYPE html>
<html>

<head>
    <title>Pembelian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="menu.css">
    <style>
        body {
            padding: 20px;
            background-color: #f8f9fa;
        }

        table {
            border-collapse: collapse;
            width: 50%;
            margin: 0 auto;
            background-color: #e9ecef;
        }

        th,
        td,
        h1 {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        form {
            text-align: center;
        }

        button {
            margin-top: 10px;
            padding: 5px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <?php include "menu.php"; ?>

    <?php
    require "koneksi.php";
    $sql = "SELECT pembelian.id, barang.nama as nama_barang, pembelian.jumlah, pembelian.total_harga, user.username, pembelian.created_at FROM barang JOIN pembelian on barang.id = pembelian.id_barang JOIN user ON user.id = pembelian.id_staff ORDER BY pembelian.created_at DESC";
    $query = mysqli_query($koneksi, $sql);
    ?>

    <div>
        <h1>Data Pembelian</h1>
        <form action="new-pembelian.php" method="GET">
            <button type="submit">Tambah</button>
        </form>
        <table>
            <tr>
                <th>No.</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Diinput oleh</th>
                <th>Waktu</th>
                <th colspan="2">Aksi</th>
            </tr>

            <?php $i = 1; ?>
            <?php while ($pembelian = mysqli_fetch_array($query)) : ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $pembelian["nama_barang"] ?></td>
                    <td><?= $pembelian["jumlah"] ?></td>
                    <td><?= $pembelian["total_harga"] ?></td>
                    <td><?= $pembelian["username"] ?></td>
                    <td><?= $pembelian["created_at"] ?></td>
                    <td>
                        <form action="read-pembelian.php" method="GET">
                            <input type="hidden" name="id" value='<?= $pembelian["id"] ?>'>
                            <button type="submit">Lihat</button>
                        </form>
                    </td>
                    <td>
                        <form action="delete-pembelian.php" method="POST" onsubmit="return konfirmasi(this)">
                            <input type="hidden" name="id" value='<?= $pembelian["id"] ?>'>
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endwhile ?>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function konfirmasi(form) {
            formData = new FormData(form);
            id = formData.get("id");
            return confirm(`Hapus pembelian '${id}'?`);
        }
    </script>
</body>

</html>