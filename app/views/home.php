<!DOCTYPE html>
<html>
<head>
    <title>Home - Mini Saving</title>
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>
<body>
    <nav>
        <h1>Mini Saving</h1>
        <?php if(isset($_SESSION['user_id'])): ?> <!-- Mengecek apakah pengguna sudah login -->
            <div>
                Welcome, <?php echo $_SESSION['user_name']; ?> <!-- Menampilkan nama pengguna -->
                
                <?php if($_SESSION['user_role'] === 'admin'): ?> <!-- Jika pengguna adalah admin -->
                    <a href="admin">Admin Dashboard</a> <!-- Link ke dashboard admin -->
                <?php endif; ?>
                
                <a href="save"><i class="fas fa-save"></i>Save</a>
                <a href="logout"><i class="fas fa-sign-out-alt"></i>Logout</a>
            </div>
        <?php else: ?> <!-- Jika pengguna belum login -->
            <div>
            <a href="login"><i class="fas fa-sign-in-alt"></i>Login</a>
            <a href="register">Register</a>
            </div>
        <?php endif; ?>
    </nav>

    <main>
        <h2>Recent Savings</h2>
        <?php foreach($saving as $saving): ?> <!-- Looping untuk menampilkan data tabungan -->
            <div class="saving-card">
                <h3><?php echo htmlspecialchars($saving['name']); ?></h3> <!-- Menampilkan nama pengguna -->
                <p>Amount: Rp<?php echo number_format($saving['amount']); ?></p> <!-- Menampilkan jumlah tabungan -->
                <p>Message: <?php echo htmlspecialchars($saving['message']); ?></p> <!-- Menampilkan pesan -->
                <small>Date: <?php echo $saving['created_at']; ?></small> <!-- Menampilkan tanggal penyimpanan -->
            </div>
        <?php endforeach; ?>
    </main>
</body>
</html>
