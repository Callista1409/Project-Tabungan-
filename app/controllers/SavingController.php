<?php
class SavingController {
    private $db;
    private $savingModel;

    // Konstruktor untuk menghubungkan ke database dan memuat model tabungan
    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
        require_once 'app/models/Saving.php';
        $this->savingModel = new Saving($this->db);
    }

    // Metode untuk menangani halaman penyimpanan tabungan
    public function index() {
        // Cek apakah pengguna sudah login, jika tidak arahkan ke halaman login
        if(!isset($_SESSION['user_id'])) {
            header('Location: login');
            exit();
        }

        // Jika metode permintaan adalah POST, proses penyimpanan data tabungan
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $amount = $_POST['amount']; // Ambil jumlah tabungan dari input pengguna
            $message = $_POST['message']; // Ambil pesan dari input pengguna
            $user_id = $_SESSION['user_id']; // Ambil ID pengguna dari sesi

            // Simpan data tabungan ke database
            if($this->savingModel->create($user_id, $amount, $message)) {
                header('Location: home'); // Arahkan kembali ke halaman utama jika berhasil
                exit();
            }
        }

        require_once 'app/views/save.php'; // Tampilkan halaman penyimpanan tabungan
    }
}
?>
