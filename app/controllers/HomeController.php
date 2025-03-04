<?php
class HomeController {
    private $db;
    private $savingModel;

    // Konstruktor untuk menghubungkan ke database dan memuat model tabungan
    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
        require_once 'app/models/Saving.php';
        $this->savingModel = new Saving($this->db);
    }

    // Metode untuk menampilkan halaman utama
    public function index() {
        require_once 'app/helpers/AuthMiddleware.php';
        AuthMiddleware::isAuthenticated(); // Pastikan pengguna sudah login
        
        $saving = $this->savingModel->getAll(); // Ambil semua data tabungan
        $isAdmin = $_SESSION['user_role'] === 'admin'; // Cek apakah pengguna adalah admin
        require_once 'app/views/home.php'; // Tampilkan halaman utama
    }

    // Metode untuk menampilkan halaman admin
    public function admin() {
        require_once 'app/helpers/AuthMiddleware.php';
        AuthMiddleware::isAdmin(); // Pastikan hanya admin yang bisa mengakses halaman ini
        
        require_once 'app/models/User.php';
        $userModel = new User($this->db);
        $users = $userModel->getAllUsers(); // Ambil semua data pengguna
        $saving = $this->savingModel->getAll(); // Ambil semua data tabungan
        require_once 'app/views/admin.php'; // Tampilkan halaman admin
    }
}
?>
