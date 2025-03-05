<!DOCTYPE html>
<html>
<head>
    <title>Saving - Mini Saving</title>
     <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <nav>
        <h1>Mini Saving</h1>
        <a href="home"><i class="fas fa-home"></i>Home</a> 
    </nav>

    <main>
        <h2>Make a Saving</h2>
        <form method="POST" action="save"> <!-- Form simpan -->
            <div>
                <label>Amount (Rp)</label>
                <input type="number" name="amount" required> 
            </div>
            <div>
                <label>Message</label>
                <textarea name="message" required></textarea>
            </div>
            <button type="submit">Save</button>
        </form>
    </main>
</body>
</html>
