<?php
class User {
    private $conn; // Properti untuk menyimpan koneksi database
    private $table = 'users'; // Nama tabel database

    // Konstruktor untuk menerima koneksi database
    public function __construct($db) {
        $this->conn = $db;
    }

    // Fungsi untuk mendaftarkan pengguna baru
    public function register($name, $email, $password, $role = 'user') {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Enkripsi password

        // Query untuk memasukkan data pengguna baru ke dalam tabel users
        $query = "INSERT INTO " . $this->table . " (name, email, password, role) 
                  VALUES (:name, :email, :password, :role)";
        $stmt = $this->conn->prepare($query); // Persiapkan query SQL
        
        // Bind parameter dengan nilai dari input pengguna
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->bindParam(':role', $role);
        
        // Eksekusi query, jika berhasil return true, jika gagal return false
        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Fungsi untuk login pengguna
    public function login($email, $password) {
        // Query untuk mencari pengguna berdasarkan email
        $query = "SELECT * FROM " . $this->table . " WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Ambil hasil pencarian
        if($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Verifikasi password dengan password yang disimpan di database
            if(password_verify($password, $row['password'])) {
                // Simpan informasi pengguna ke dalam sesi
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_name'] = $row['name'];
                $_SESSION['user_role'] = $row['role'];
                return $row; // Return data pengguna jika login berhasil
            }
        }
        return false; // Return false jika login gagal
    }

    // Fungsi untuk mendapatkan semua data pengguna
    public function getAllUsers() {
        // Query untuk mengambil semua pengguna dengan kolom tertentu
        $query = "SELECT id, name, email, role, created_at FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Ambil semua data dalam bentuk array asosiatif
    }
}
?>
