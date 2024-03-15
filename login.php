<!DOCTYPE html>
<html>

<head>
    <title>Halaman Login</title>
    <link rel="stylesheet" href="login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="wrapper">
        <form action="validasi.php" method="POST">
            <h1>Selamat datang!</h1>
            <div class="input-box">
                <input type="text" name="username" placeholder="username" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="password" required>
                <i class='bx bx-lock'></i>
            </div>
            <button type="submit" class="btn">Login</button>
            <button type="reset" class="btn">Clear</button>
            <p id="greeting"></p>
        </form>
    </div>

    <script>
        // Set zona waktu ke Asia/Jakarta
        <?php date_default_timezone_set('Asia/Jakarta'); ?>
        // Memperoleh waktu saat ini dari PHP
        const currentTime = new Date();
        // Hari dimulai dari 0 (Minggu) sampai 6 (Sabtu)
        const currentDay = currentTime.getDay();
        // Jam saat ini
        const currentHour = currentTime.getHours();
        const currentMinute = currentTime.getMinutes();
        // Menentukan apakah sudah lewat hari Jumat, 15 Maret 2024, jam 12.50 WIB
        const isPastStartDateTime = currentDay > 5 || (currentDay === 5 && (currentHour > 12 || (currentHour === 12 && currentMinute >= 50)));

        let greeting = "";

        if (isPastStartDateTime) {
            if (currentHour >= 4 && currentHour < 11) {
                greeting = "Selamat pagi!";
            } else if (currentHour >= 11 && currentHour < 15) {
                greeting = "Selamat siang!";
            } else if (currentHour >= 15 && currentHour < 18) {
                greeting = "Selamat sore!";
            } else {
                greeting = "Selamat malam!";
            }
        } else {
            greeting = "Selamat datang!"; // Default greeting before start date
        }

        // Menampilkan pesan selamat datang
        document.querySelector("h1").textContent = greeting;
    </script>
</body>

</html>