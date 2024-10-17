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
                <li class="nav-item active">
                    <a class="nav-link" href="tampil_mahasiswa.php">Mahasiswa <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tampil_nilai.php">Nilai</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tampil_lulus.php">Lulus</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tampil_remidi.php">Remidi</a>
                </li>
            </ul>
           
        </div>
    </nav>
<body>
<div class="container mt-3">
  <h2>Daftar Mahasiswa</h2>
   <!-- Membuat tabel yang akan digunakan untuk menampilkan data mahasiswa -->
  <table class="table table-bordered">
    <thead class="table-dark">
      <tr>
        <!-- Header kolom tabel yang menunjukkan atribut mahasiswa -->
        <th>No</th>
        <th>NIM</th>
        <th>Nama Mahasiswa</th>
        <th>Alamat</th>
        <th>Email</th>
        <th>No. Telepon</th>
      </tr>
    </thead>
    <tbody>
    <?php 
    // Memanggil file database.php untuk mengambil class Database
      include('database.php');
      // Membuat objek dari class Database
      $database = new Database(); 
      // Ambil koneksi database
      $conn = $database->getConn(); 

      $no = 1;
      // Menjalankan query untuk mengambil semua data dari tabel mahasiswa
      $query = $conn->query("SELECT * FROM mahasiswa");

      // Melakukan loop untuk menampilkan setiap baris data mahasiswa
      while ($row = $query->fetch(PDO::FETCH_ASSOC))
      {?>
          <tr>
            <!-- Menampilkan nomor urut, NIM, nama mahasiswa, alamat, email, dan nomor telepon -->
            <td><?php echo $no++; ?></td>
            <td><?php echo $row['nim']; ?></td>
            <td><?php echo $row['nama_mahasiswa']; ?></td>
            <td><?php echo $row['alamat']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['no_telp']; ?></td>
      <?php } ?>
    </tbody>
  </table>
</div>

</body>
</html>
