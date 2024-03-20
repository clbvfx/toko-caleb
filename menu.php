<?php
session_start();

if (!array_key_exists("username", $_SESSION)) {

    header("location:logout.php");
}
?>


<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-custom">
    <!-- Isi navbar di sini -->


    <div class="container">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item mx-2">
                    <a class="nav-link" href="home.php">HOME</a>
                </li>
                <li class="nav-item dropdown mx-3">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        MASTER
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php if (isset($_SESSION["level"]) && $_SESSION["level"] == "BOS") : ?>
                            <li><a class="dropdown-item" href="user.php">User</a></li>
                        <?php endif ?>
                        <li><a class="dropdown-item" href="barang.php">Barang</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        TRANSAKSI
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="penjualan.php">Penjualan</a></li>
                        <li><a class="dropdown-item" href="pembelian.php">Pembelian</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Selamat datang, <?= $_SESSION["username"] ?>!
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="profil.php">Profil</a></li>
                        <li><a class="dropdown-item" href="logout.php">Log out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>