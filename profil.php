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
        }

        th {
            background-color: #f2f2f2;
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
    require "koneksi.php";
    $id = $_SESSION["id"];

    $sql = "SELECT * FROM user WHERE id = '$id'";
    $query = mysqli_query($koneksi, $sql);

    $user = mysqli_fetch_array($query);
    ?>

    <div class="profile-container">
        <div class="profile-picture" style="background-image: url('path_to_your_image.jpg');"></div>
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