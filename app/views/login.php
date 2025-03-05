<!DOCTYPE html>
<html>
<head>
    <title>Login - Mini Saving</title>
  
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>
<body>
    <nav>
        <h1>Mini Saving</h1>
        <a href="home"><i class="fas fa-home"></i>Home</a> 
    </nav>

    <main>
        <h2>Login</h2>
        <!-- Form login untuk pengguna -->
        <form method="POST" action="login"> <!-- Mengirim data login menggunakan metode POST -->
            <div>
                <label>Email</label> 
                <input type="email" name="email" required> 
            </div>
            <div>
                <label>Password</label>
                <input type="password" name="password" required> 
            </div>
            <button type="submit">Login</button> 
        </form>
        
        <!-- Link untuk pengguna yang belum memiliki akun -->
        <p>Don't have an account? <a href="register">Register</a></p>
    </main>
</body>
</html>
