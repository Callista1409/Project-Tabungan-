<!DOCTYPE html>
<html>
<head>
    <title>Register - Mini Saving</title>
   
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <nav>
        <h1>Mini Saving</h1>
        <a href="home"><i class="fas fa-home"></i> Home</a>
     
    </nav>

    <main>
        <h2>Register</h2>
        <!-- Form registrasi untuk pengguna baru -->
        <form method="POST" action="register"> 
            <div>
                <label>Name</label> 
                <input type="text" name="name" required> 
            </div>
            <div>
                <label>Email</label> 
                <input type="email" name="email" required> 
            </div>
            <div>
                <label>Password</label> 
                <input type="password" name="password" required> 
            </div>
            <button type="submit">Register</button>
        </form>
        
       
        <p>Already have an account? <a href="login">Login</a></p>
    </main>
</body>
</html>
