<!DOCTYPE html>
<html>
<head>
    <title>Home - Mini Saving</title>
    <link rel="stylesheet" href="public/css/style.css"> <!-- Menghubungkan file CSS -->
</head>
<body>
    <nav>
        <h1>Mini Saving</h1>
        <?php if(isset($_SESSION['user_id'])): ?> <!-- Cek apakah pengguna sudah login -->
            <div>
                Welcome, <?php echo $_SESSION['user_name']; ?> <!-- Menampilkan nama pengguna -->
                <?php if($_SESSION['user_role'] === 'admin'): ?> <!-- Cek apakah pengguna adalah admin -->
                    <a href="admin">Admin Dashboard</a> <!-- Link ke dashboard admin -->
                <?php endif; ?>
                <a href="save">Save</a> <!-- Link ke halaman tabungan -->
                <a href="logout">Logout</a> <!-- Link untuk logout -->
            </div>
        <?php else: ?>
            <div>
                <a href="login">Login</a> <!-- Link ke halaman login -->
                <a href="register">Register</a> <!-- Link ke halaman registrasi -->
            </div>
        <?php endif; ?>
    </nav>

    <main>
        <h2>Recent Savings</h2>
        <?php foreach($saving as $saving): ?> <!-- Loop untuk menampilkan data tabungan -->
            <div class="saving-card">
                <h3><?php echo htmlspecialchars($saving['name']); ?></h3> <!-- Menampilkan nama penyimpan -->
                <p>Amount: Rp<?php echo number_format($saving['amount']); ?></p> <!-- Menampilkan jumlah tabungan -->
                <p>Message: <?php echo htmlspecialchars($saving['message']); ?></p> <!-- Menampilkan pesan -->
                <small>Date: <?php echo $saving['created_at']; ?></small> <!-- Menampilkan tanggal penyimpanan -->
            </div>
        <?php endforeach; ?>
    </main>
</body>
</html>
