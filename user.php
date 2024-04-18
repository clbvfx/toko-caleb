<!DOCTYPE html>
<html>

<head>
    <title>Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 20px;
            background-size: cover;
            color: white;
        }

        .profile-container {
            width: 70%;
            margin: 0 auto;
            background-color: transparent;
            padding: 20px;
            border-radius: 5px;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            color: white;
        }

        th,
        td {
            border: 1px solid white;
            padding: 8px;
            background-color: #363636;
            /* Warna latar belakang */
            color: white;
            /* Warna teks */
        }

        th {
            background-color: #212121;
            /* Warna latar belakang header */
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 5px;
            border-radius: 3px;
            border: 1px solid #ccc;
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

        .profile-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .profile-container {
            width: 50%;
            max-width: 500px;
            margin: 0 auto;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        .profile-picture {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background-size: cover;
            background-position: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <?php include "menu.php"; ?>

    <?php
    if ($_SESSION["level"] != "admin") {
        // jika di sesi ini levelnya bukan admin, akses ditolak
        echo "Anda tidak dapat mengakses halaman ini";
        exit;
    }

    require "koneksi.php";

    // cari semua user dari database
    $sql = "SELECT * FROM user";
    $query = mysqli_query($koneksi, $sql);
    ?>

    <div>
        <h1>Data User</h1>
        <form class="d-flex justify-content-center" action="new-user.php" method="GET">
            <button type="submit">Tambah</button>
        </form>
        <table border="1">
            <tr>
                <th>No.</th>
                <th>Username</th>
                <th>Level</th>
                <th>Dibuat pada</th>
                <th>Diubah pada</th>
                <th colspan="2">Aksi</th>
            </tr>
            <!-- ambil (fetch) data user satu per satu, lalu tampilkan -->
            <?php $i = 1; ?>
            <?php while ($user = mysqli_fetch_array($query)) : ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $user["username"] ?></td>
                    <td><?= $user["level"] ?></td>
                    <td><?= $user["created_at"] ?></td>
                    <td><?= $user["updated_at"] ?></td>
                    <td>
                        <form action="read-user.php" method="GET">
                            <input type="hidden" name="id" value='<?= $user["id"] ?>'>
                            <button type="submit">Lihat</button>
                        </form>
                    </td>
                    <td>
                        <form action="delete-user.php" method="POST" onsubmit="return konfirmasi(this)">
                            <input type="hidden" name="id" value='<?= $user["id"] ?>'>
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endwhile ?>
        </table>
    </div>
    <script>
        // tampilkan konfirmasi sebelum hapus
        function konfirmasi(form) {
            formData = new FormData(form);
            id = formData.get("id");
            return confirm(`Hapus user '${id}'?`);
        }
    </script>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</html>