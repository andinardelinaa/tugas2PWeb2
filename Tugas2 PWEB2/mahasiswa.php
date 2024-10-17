<?php
// Memanggil file database.php yang berisi class Database
require 'database.php';

// Membuat class Mahasiswa yang merupakan turunan dari class Database
class Mahasiswa extends Database {
    // Properti untuk menyimpan objek koneksi dan nama tabel
    protected $conn;
    public $table_name = "mahasiswa";  
    public function __construct() {
        // Memanggil constructor dari kelas induk (Database) dan menginisialisasi koneksi
        parent::__construct();
        // Menggunakan koneksi dari parent class
        $this->conn = $this->getConnection();  
    }

    // Fungsi untuk mendapatkan semua data mahasiswa
    public function tampilkanData() {
         // Query SQL untuk mengambil semua data dari tabel mahasiswa
        $query = "SELECT * FROM " . $this->table_name;  
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        // Mengembalikan hasil eksekusi query (objek PDOStatement)
        return $stmt;
    }
}
?>
