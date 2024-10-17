<?php
// Memanggil file mhs.php yang berisi class Mahasiswa
require 'mahasiswa.php';

// Membuat class Nilai yang merupakan turunan dari class Mahasiswa
class Nilai extends Mahasiswa {
    public $table_name = "nilai";  
    
     // Constructor yang dipanggil saat objek Nilai dibuat
    public function __construct(){
        parent:: __construct();
    }
    // Fungsi untuk mengambil semua data nilai
    public function tampilkanData() {
        // Query SQL untuk mengambil semua data dari tabel nilai
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
//turunan atau inheritence, class lulus adalah turunan dari kelas nilai
class Lulus extends Nilai{
      // Constructor yang dipanggil saat objek Lulus dibuat
    public function __construct(){
        parent:: __construct();
    }
   // Polymorphism: mengoverride method tampilkanData() dari class Nilai
    public function tampilkanData() {
        $query = "SELECT * FROM nilai WHERE nilai_akhir >= 70";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}

// Membuat objek dari class Lulus dan menampilkan data mahasiswa yang lulus
$lulus = new Lulus();
// Menyimpan hasil data mahasiswa lulus
$data = $lulus ->tampilkanData();

// Membuat class Remidi yang merupakan turunan dari class Nilai (inheritance)
class Remidi extends Nilai{
    // Constructor yang dipanggil saat objek Remidi dibuat
    public function __construct(){
        parent:: __construct();
    }
     // Polymorphism: mengoverride method tampilkanData() dari class Nilai
    public function tampilkanData() {
        // Query SQL untuk mengambil data mahasiswa yang nilai_akhir < 70 (mahasiswa yang harus remidi)
        $query = "SELECT * FROM nilai WHERE nilai_akhir < 70";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
// Membuat objek dari class Remidi dan menampilkan data mahasiswa yang harus remidi
$remidi = new Remidi();
// Menyimpan hasil data mahasiswa remidi
$data = $remidi ->tampilkanData();
?>
