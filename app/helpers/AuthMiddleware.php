<?php
class AuthMiddleware {
    // Memeriksa apakah pengguna sudah login
    public static function isAuthenticated() {
        if (!isset($_SESSION['user_id'])) { // Jika tidak ada sesi user_id, arahkan ke halaman login
            header('Location: login');
            exit();
        }
    }
    // Memeriksa apakah pengguna adalah admin
    public static function isAdmin() {
        self::isAuthenticated(); // Pastikan pengguna sudah login
        if ($_SESSION['user_role'] !== 'admin') { // Jika bukan admin, arahkan ke halaman home
            header('Location: home');
            exit();
        }
    }

    // Memeriksa apakah pengguna adalah tamu (belum login)
    public static function isGuest() {
        if (isset($_SESSION['user_id'])) { // Jika sudah login, arahkan ke halaman home
            header('Location: home');
            exit();
        }
    }
}
