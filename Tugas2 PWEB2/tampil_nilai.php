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
                    <a class="nav-link" href="index.php">Beranda <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tampil_mahasiswa.php">Mahasiswa <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="tampil_nilai.php">Nilai</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="tampil_lulus.php">Lulus</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="tampil_remidi.php">Remidi</a>
                </li>
            </ul>
           
        </div>
    </nav>

<body>
<div class="container mt-3">
  <!-- Judul halaman yang akan menampilkan daftar nilai mahasiswa -->
  <h2>Daftar Nilai</h2>
  <table class="table table-bordered">
    <thead class="table-dark">
      <tr>
        <!-- Header tabel, berisi kolom untuk nomor, nilai, nilai akhir, ID mahasiswa, ID mata kuliah, dan ID semester -->
        <th>No</th>
        <th>NILAI</th>
        <th>NILAI AKHIR</th>
        <th>MAHASISWA_ID</th>
        <th>MATKUL_ID</th>
        <th>SEMESTER_ID</th>
      </tr>
    </thead>
    <tbody>
    <?php 
     // Memanggil file database.php untuk koneksi ke database
      include('database.php');
      // Membuat objek dari class Database
      $database = new Database();
      // Ambil koneksi database
      $conn = $database->getConn(); 

      $no = 1;
      // Menjalankan query untuk mengambil semua data dari tabel nilai
      $query = $conn->query("SELECT * FROM nilai");

      // Looping untuk menampilkan setiap baris data dari hasil query
      while ($row = $query->fetch(PDO::FETCH_ASSOC))
      {?>
          <tr>
            <!-- Menampilkan nomor urut, nilai, nilai akhir, ID mahasiswa, ID mata kuliah, dan ID semester -->
            <td><?php echo $no++; ?></td>
            <td><?php echo $row['nilai']; ?></td>
            <td><?php echo $row['nilai_akhir']; ?></td>
            <td><?php echo $row['mahasiswa_id']; ?></td>
            <td><?php echo $row['matkul_id']; ?></td>
            <td><?php echo $row['semester_id']; ?></td>
          </tr>
          <!-- <td colspan="6" class="text-center"> -->
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

</body>
</html>