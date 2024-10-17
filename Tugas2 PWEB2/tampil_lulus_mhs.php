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
                    <a class="nav-link " href="tampil_lulus_mhs.php">Lulus</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="tampil_remidi_mhs.php">Remidi</a>
                </li>
            </ul>
           
        </div>
    </nav>
<body>
<div class="container mt-3">
  <h2>LULUS</h2>
  <p>Daftar mahasiswa yang lulu ujian</p>
  <table class="table table-bordered">
    <thead class="table-dark">

      <tr>
        <th>No</th>
        <th>MAHASISWA_ID</th>
        <th>NAMA MAHASISWA</th>
        <th>NILAI AKHIR</th>
        <th>MATA KULIAH_ID</th>
        <th>SEMESTER_ID</th>
      </tr>
    </thead>
    <tbody>
    <?php 
      include('nilai.php');
      $lulus = new lulus();
      $connection= $lulus->getConnection(); // Ambil koneksi database

      $no = 1;
      // Query untuk join data dari mahasiswa dan nilai
      $query = $connection->query("SELECT a.mahasiswa_id, a.nama_mahasiswa, b.nilai_akhir, b.matkul_id, b.semester_id 
        FROM mahasiswa a
        JOIN nilai b ON a.mahasiswa_id = b.mahasiswa_id
        WHERE b.nilai_akhir >= 70");
      while ($row = $query->fetch(PDO::FETCH_ASSOC))
      {?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $row['mahasiswa_id']; ?></td>
            <td><?php echo $row['nama_mahasiswa']; ?></td>
            <td><?php echo $row['nilai_akhir']; ?></td>
            <td><?php echo $row['matkul_id']; ?></td>
            <td><?php echo $row['semester_id']; ?></td>
  
      <?php } ?>
    </tbody>
  </table>
</div>

</body>
</html>