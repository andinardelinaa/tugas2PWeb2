# TUGAS 2 PRAKTIKUM WEB 2
# ERD TABEL MAHASISWA DAN NILAI
Studi kasus mengenai mahasiswa dan dosen menunjukkan bagaimana implementasi Sistem Penilaian Mahasiswa. Sistem ini di polymorishm dengan role sebagai admin dan role sebagai mahasiswa.
## 1). Membuat View berbasis OOP, dengan mengambil data dari database MySQL

- membuat database db_mahasiswa dan membuat tabel mahasiswa dengan struktur :
![tabel mhs](https://github.com/user-attachments/assets/8afa624c-9c8c-4c79-91ca-0a00b27d64ec)

dan tabel nilai dengan struktur :
![andin](https://github.com/user-attachments/assets/efd58f1f-00e6-44c6-b397-85275b2799d5)

- membuat view dengan Bootstrap
```php
<?php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PWEB 2</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Navbar 1 (Utama) -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="collapse navbar-collapse" id="navbarMain">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="tampil_mahasiswa.php">Admin<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tampil_lulus2.php">Mahasiswa</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-4">
        <h1>Selamat Datang di Halaman Penilaian Mahasiswa</h1>
        <h2>Halo!</h2>
        <p>Apa yang Harus Anda Lakukan?<br>
        Jika Anda seorang admin, silakan klik Menu Admin, dan jika Anda seorang mahasiswa, silakan klik Mahasiswa.</p>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
?>
```

- berikut adalah kode lengkap untuk koneksi pada database
```php
<?php

class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $db = "db_mahasiswa";
    private $conn; 

    public function __construct() {
        $this->getConnection();
    }

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db, $this->username, $this->password);
            $this->conn->exec("set names utf8");
            // echo "Koneksi berhasil!<br>";
        } catch (PDOException $exception) {
            echo "Koneksi error: " . $exception->getMessage();
        }
        return $this->conn;
    }

    public function getConn() {
        return $this->conn; // Tambahkan method untuk mengembalikan koneksi
    }

    public function tampilkanData() {
        
    }
}
?>
```

## 2). Gunakan the_construct sebagai link ke database 
constractor pada class Database untuk menginisialisasi properti
```php
<?php
class database {
    public function __construct() {
        $this->getConnection();
    }
}
?>
```

constractor pada class Mahasiswa untuk menginisialisasi dan koneksi ke database
```php
<?php
class Mahasiswa extends Database{
....
public function __construct() {
        // Memanggil constructor dari kelas induk (Database) dan menginisialisasi koneksi
        parent::__construct();
        $this->conn = $this->getConnection();  // Menggunakan koneksi dari parent class
    }
}
?>
```
constractor pada class Mahasiswa untuk menginisialisasi dan koneksi ke database
```php
<?php
class Nilai extends Mahasiswa
{
...
public function __construct(){
        parent:: __construct();
    }
}
?>
```

## 3). Terapkan enkapsulasi sesuai logika studi kasus 
mengganti properti dalam class menjadi private atau dengan kata lain menyembunyikan atribut(data) 
```php
<?php
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $db = "db_mahasiswa";
    private $conn;
?>
```

## 4). Membuat kelas turunan menggunakan konsep pewarisan 
membuat class turunan dari nilai yaitu lulus dan remedi berdasarkan nilai akhir. berikut kode lengkap turunan Lulus:
```php
<?php
class Lulus extends Nilai{
    public function __construct(){
        parent:: __construct();
    }
    public function tampilkanData() {
        $query = "SELECT * FROM nilai WHERE nilai_akhir >= 70";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
$lulus = new Lulus();
$data = $lulus ->tampilkanData();
?>
```
membuat class turunan dari nilai yaitu lulus dan remedi berdasarkan nilai akhir. berikut kode lengkapnya turunan Remidi:
```php
<?php
class Remidi extends Nilai{
    public function __construct(){
        parent:: __construct();
    }
    public function tampilkanData() {
        $query = "SELECT * FROM nilai WHERE nilai_akhir < 70";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
$remidi = new Remidi();
$data = $remidi ->tampilkanData();
?>
```
## e). Terapkan polimorfisme untuk minimal 2 peran sesuai studi kasus

2 peran yaitu menjadi admin dan mahasiswa, admin bisa mengakses semua tabel, sedangkan mahasiswa hanya bisa melihat tabel remedi dan lulus. isi dalam index:
1. Role Admin
2. Role Mahasiswa
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PWEB 2</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Navbar 1 (Utama) -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="collapse navbar-collapse" id="navbarMain">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="tampil_mahasiswa.php">Admin<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tampil_lulus2.php">Mahasiswa</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-4">
        <h1>Selamat Datang di Halaman Penilaian Mahasiswa</h1>
        <h2>Halo!</h2>
        <p>Apa yang Harus Anda Lakukan?<br>
        Jika Anda seorang admin, silakan klik Menu Admin, dan jika Anda seorang mahasiswa, silakan klik Mahasiswa.</p>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
```
tampilan:
![beranda](https://github.com/user-attachments/assets/1361e7e6-3599-4a89-99d7-cd3ec92b95a4)

## Tampilan Role Admin (melihat data mahasiswa, nilai, lulus dan remedi)

![role admin](https://github.com/user-attachments/assets/54d1128d-a3eb-464c-a7c1-dce4f06389ed)

## Tampilan Role Mahasiswa (melihat nilai lulus dan remidi)
![role mahasiswa](https://github.com/user-attachments/assets/5d9e0321-30c4-4ba2-b9fe-12e4e953ba9b)
