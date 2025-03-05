<!DOCTYPE html>
<html>
<head>
    <title>Home - Mini Saving</title>
    <link rel="stylesheet" href="public/css/style.css">
    <style>body { background-image: url(public/css/test.jpg);
  background-size: cover;
 height: 100vh;
  background-repeat: no-repeat; } 
  </style>
</head>
<body>
    <nav>
        <h1>Mini Saving</h1>
        <?php if(isset($_SESSION['user_id'])): ?> <!-- Cek apakah pengguna sudah login -->
            <div>
                Welcome, <?php echo $_SESSION['user_name']; ?> 
                <?php if($_SESSION['user_role'] === 'admin'): ?>
                    <a href="admin">Admin Dashboard</a> <!-- Link ke dashboard admin --> 
                <?php endif; ?>
                <a href="save">Save</a> 
                <a href="logout">Logout</a>
            </div>
        <?php else: ?>
            <div>
                <a href="login">Login</a> 
                <a href="register">Register</a> 
            </div>
        <?php endif; ?>
    </nav>

    <main>
        <h2>Recent Savings</h2>
        <?php foreach($saving as $saving): ?> <!-- Loop untuk menampilkan data tabungan -->
            <div class="saving-card">
                <h3><?php echo htmlspecialchars($saving['name']); ?></h3> <
                <p>Amount: Rp<?php echo number_format($saving['amount']); ?></p> 
                <p>Message: <?php echo htmlspecialchars($saving['message']); ?></p> 
                <small>Date: <?php echo $saving['created_at']; ?></small> 
            </div>
        <?php endforeach; ?>
    </main>
</body>
</html>
