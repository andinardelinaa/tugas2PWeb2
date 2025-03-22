<?php
//membuat class database untuk menangani koneksi ke database
class Database {
    // properti untuk menyimpan detail koneksi database
    private $host = "localhost"; // nama host database 
    private $username = "root"; // username untuk mengakses database
    private $password = ""; //password untuk mengakses database
    private $db = "db_mahasiswa"; // nama database yang akan digunakan
    private $conn;  // properti untuk menyimpan objek PDO

    // construct untuk menginisialisasikan properti
    // Constructor ini akan memanggil method getConnection() untuk menginisialisasi koneksi ke database
    public function __construct() {
        // Inisialisasi koneksi ke nilai null sebelum dicoba
        $this->getConnection();
    }
    // Method ini mencoba membuat objek PDO
    public function getConnection() {
        $this->conn = null;
        try { // Membuat koneksi PDO dengan host, database, username, dan password yang sudah didefinisikan
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db, $this->username, $this->password);
            $this->conn->exec("set names utf8");
            // echo "Koneksi berhasil!<br>";
        } catch (PDOException $exception) {
            echo "Koneksi error: " . $exception->getMessage();
        }
        return $this->conn;
    }
    // Method getConn() digunakan untuk mengakses koneksi yang sudah dibuat
    // Method ini mengembalikan properti $conn yang berisi objek PDO
    public function getConn() {
        return $this->conn; 
    }
    // Method ini bisa digunakan untuk menampilkan data dari database
    public function tampilkanData() {
        
    }
}

?>
