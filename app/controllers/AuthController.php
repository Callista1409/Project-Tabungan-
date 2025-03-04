<?php
class AuthController {
    private $db;
    private $userModel;

    // Konstruktor untuk menghubungkan ke database dan memuat model pengguna
    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
        require_once 'app/models/User.php';
        $this->userModel = new User($this->db);
    }

    // Metode untuk menangani proses login
    public function login() {
        require_once 'app/helpers/AuthMiddleware.php';
        AuthMiddleware::isGuest(); // Pastikan hanya tamu yang bisa mengakses halaman login

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Jika login berhasil, arahkan ke halaman utama
            if($this->userModel->login($email, $password)) {
                header('Location: home');
                exit();
            }
        }
        require_once 'app/views/login.php';
    }

    // Metode untuk menangani proses registrasi
    public function register() {
        require_once 'app/helpers/AuthMiddleware.php';
        AuthMiddleware::isGuest(); // Pastikan hanya tamu yang bisa mengakses halaman registrasi

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            // Pengguna pertama akan menjadi admin, lainnya sebagai user biasa
            $role = $this->isFirstUser() ? 'admin' : 'user';

            // Jika registrasi berhasil, arahkan ke halaman login
            if($this->userModel->register($name, $email, $password, $role)) {
                header('Location: login');
                exit();
            }
        }
        require_once 'app/views/register.php';
    }

    // Cek apakah pengguna pertama untuk menetapkan peran admin
    private function isFirstUser() {
        $query = "SELECT COUNT(*) as count FROM users";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'] === 0;
    }

    // Metode untuk menangani proses logout
    public function logout() {
        session_destroy(); // Hapus sesi pengguna
        header('Location: login'); // Arahkan kembali ke halaman login
        exit();
    }
}
?>
