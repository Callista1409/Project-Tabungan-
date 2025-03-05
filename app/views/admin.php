<!DOCTYPE html>
<html>
<head>
    <title>Home - Mini Saving</title>
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>body { background-image: url(public/css/test.jpg);
  background-size: cover;
 height: 100vh;
  background-repeat: no-repeat; } 
  </style>
</head>
<body>
    <nav>
        <h1>Mini Savings - Admin Dashboard</h1>
        <div>
        <a href="home"><i class="fas fa-home"></i>Home</a> 
        <a href="logout"><i class="fas fa-sign-out-alt"></i>Logout</a>
        </div>
    </nav>

    <main>
        <h2>All Savings</h2>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Amount</th>
                    <th>Message</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($savings as $saving): ?>
                    <tr>
                        <td><?php echo $saving['id']; ?></td>
                        <td><?php echo htmlspecialchars($saving['name']); ?></td>
                        <td>Rp<?php echo number_format($saving['amount']); ?></td>
                        <td><?php echo htmlspecialchars($saving['message']); ?></td>
                        <td><?php echo $saving['created_at']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>