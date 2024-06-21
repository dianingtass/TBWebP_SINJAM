<?php
include "authUser.php";
include "config.php";

$nim = $_SESSION['id_user'];
$query = "SELECT * FROM users WHERE id_user='$nim'";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />
  <link rel="shortcut icon" href="favicon.png">

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link href="css/tiny-slider.css" rel="stylesheet">
  <link href="css/historyPeminjaman_style.css" rel="stylesheet">
</head>
<body>

<?php include "navbar.php" ?>

<br><br>
<div class="container">
  <br>
  <h2>Riwayat Peminjaman</h2>
  <br>

  <form class="form-inline" method="GET">
    <input type="hidden" name="sort" value="<?php echo isset($sort_column) ? $sort_column : ''; ?>">
    <input type="hidden" name="order" value="<?php echo isset($sort_order) ? $sort_order : ''; ?>">

    <div class="row">
      <div class="col-md-4 mb-3">
        <label class="sr-only" for="search_id">ID Peminjaman</label>
        <input type="text" class="form-control" id="search_id" name="search_id" placeholder="ID Peminjaman" value="<?php echo isset($_GET['search_id']) ? $_GET['search_id'] : ''; ?>">
      </div>
      <div class="col-md-4 mb-3">
        <label class="sr-only" for="search_fasilitas">Fasilitas</label>
        <input type="text" class="form-control" id="search_fasilitas" name="search_fasilitas" placeholder="Fasilitas" value="<?php echo isset($_GET['search_fasilitas']) ? $_GET['search_fasilitas'] : ''; ?>">
      </div>
      <div class="col-md-2 mb-3 d-flex">
        <button type="submit" class="btn" id="btn">Search</button>
        &nbsp&nbsp&nbsp&nbsp&nbsp
        <a class="btn btn-secondary" href="trackingPeminjaman.php">Kembali</a>
      </div>
    </div>
  </form>
  <br>

  <?php
    include("config.php");

    $sort_column = isset($_GET['sort']) ? $_GET['sort'] : 'id_pinjam';
    $sort_order = isset($_GET['order']) && $_GET['order'] == 'asc' ? 'asc' : 'desc';
    $next_order = $sort_order == 'asc' ? 'desc' : 'asc';

    $valid_sort_columns = [
      'id_pinjam' => 'id_pinjam',
      'fasilitas' => 'nama_fasilitas',
      'tgl_pinjam' => 'tgl_pinjam',
      'tgl_pengajuan' => 'tgl_pengajuan',
      'status' => 'status'
    ];

    if (!array_key_exists($sort_column, $valid_sort_columns)) {
      $sort_column = 'id_pinjam';
    }

    $search_id = isset($_GET['search_id']) ? mysqli_real_escape_string($conn, $_GET['search_id']) : '';
    $search_fasilitas = isset($_GET['search_fasilitas']) ? mysqli_real_escape_string($conn, $_GET['search_fasilitas']) : '';

    $query = "SELECT p.id_pinjam, p.id_user, p.id_fasilitas, p.tgl_pinjam, p.tgl_pengajuan, f.nama_fasilitas,
              CASE 
                WHEN p.status = 'Diterima' THEN 'Selesai'
                WHEN p.status = 'Diproses' THEN 'Selesai'
                WHEN p.status = 'Tidak Diterima' THEN 'Ditolak'
              END AS status 
              FROM peminjaman p
              JOIN fasilitas f ON p.id_fasilitas = f.id_fasilitas
              WHERE (p.id_pinjam LIKE '%$search_id%')
                AND (f.nama_fasilitas LIKE '%$search_fasilitas%')
                AND (id_user = '$nim')
                AND (tgl_pinjam < CURDATE())

              UNION ALL

              SELECT pb.id_pinjam, pb.id_user, pb.id_fasilitas, pb.tgl_pinjam, pb.tgl_pengajuan, f.nama_fasilitas, 'Batal' AS status 
              FROM pembatalan pb
              JOIN fasilitas f ON pb.id_fasilitas = f.id_fasilitas
              WHERE (pb.id_pinjam LIKE '%$search_id%')
                AND (f.nama_fasilitas LIKE '%$search_fasilitas%')
                AND (id_user = '$nim')

              ORDER BY ";
   
    if ($sort_column == 'status') {
        $query .= "status $sort_order, ";
    }
    $query .= "{$valid_sort_columns[$sort_column]} $sort_order";
    
    $result = mysqli_query($conn, $query);
    if(!$result){
      die("Query Error:".mysqli_errno($conn)." -".mysqli_error($conn));
    }
  ?>

  <table class="table table-hover">
    <thead>
      <tr>
        <th>No.</th>
        <th>
          <a href="?sort=id_pinjam&order=<?php echo ($sort_column == 'id_pinjam' && $sort_order == 'asc') ? 'desc' : 'asc'; ?>&search_id=<?php echo $search_id; ?>&search_fasilitas=<?php echo $search_fasilitas; ?>">
            ID Peminjaman 
            <i class="fas fa-caret-<?php echo ($sort_column == 'id_pinjam' && $sort_order == 'asc') ? 'up' : 'down'; ?>"></i>
          </a>
        </th>
        <th>
          <a href="?sort=fasilitas&order=<?php echo ($sort_column == 'fasilitas' && $sort_order == 'asc') ? 'desc' : 'asc'; ?>&search_id=<?php echo $search_id; ?>&search_fasilitas=<?php echo $search_fasilitas; ?>">
            Fasilitas 
            <i class="fas fa-caret-<?php echo ($sort_column == 'fasilitas' && $sort_order == 'asc') ? 'up' : 'down'; ?>"></i>
          </a>
        </th>
        <th>
          <a href="?sort=tgl_pinjam&order=<?php echo ($sort_column == 'tgl_pinjam' && $sort_order == 'asc') ? 'desc' : 'asc'; ?>&search_id=<?php echo $search_id; ?>&search_fasilitas=<?php echo $search_fasilitas; ?>">
            Tanggal Peminjaman 
            <i class="fas fa-caret-<?php echo ($sort_column == 'tgl_pinjam' && $sort_order == 'asc') ? 'up' : 'down'; ?>"></i>
          </a>
        </th>
        <th>
          <a href="?sort=tgl_pengajuan&order=<?php echo ($sort_column == 'tgl_pengajuan' && $sort_order == 'asc') ? 'desc' : 'asc'; ?>&search_id=<?php echo $search_id; ?>&search_fasilitas=<?php echo $search_fasilitas; ?>">
            Tanggal Pengajuan 
            <i class="fas fa-caret-<?php echo ($sort_column == 'tgl_pengajuan' && $sort_order == 'asc') ? 'up' : 'down'; ?>"></i>
          </a>
        </th>
        <th>
          <a href="?sort=status&order=<?php echo ($sort_column == 'status' && $sort_order == 'asc') ? 'desc' : 'asc'; ?>&search_id=<?php echo $search_id; ?>&search_fasilitas=<?php echo $search_fasilitas; ?>">
          Status
          <i class="fas fa-caret-<?php echo ($sort_column == 'status' && $sort_order == 'asc') ? 'up' : 'down'; ?>"></i>
          </a>
        </th>
      </tr>
    </thead>
    <tbody>
      <?php
        $i = 1;
        while($data = mysqli_fetch_assoc($result)) {
          $raw_date_pinjam = strtotime($data["tgl_pinjam"]);
          $date_pinjam = date("d - m - Y", $raw_date_pinjam);
          $raw_date_pengajuan = strtotime($data["tgl_pengajuan"]);
          $date_pengajuan = date("d - m - Y", $raw_date_pengajuan);

          $nama_fasilitas = $data['nama_fasilitas'];
          $status = $data['status'];
          $status_class = strtolower($status) == 'selesai' ? 'status-selesai' : 'status-batal';

          echo "<tr>";
          echo "<th scope=\"row\">$i</th>";
          echo "<td>$data[id_pinjam]</td>";
          echo "<td>$nama_fasilitas</td>";
          echo "<td>$date_pinjam</td>";
          echo "<td>$date_pengajuan</td>";
          echo "<td><span class=\"$status_class\">$status</span></td>";
          echo "</tr>";
          $i++;
        }

        mysqli_free_result($result);
        mysqli_close($conn);
      ?>
    </tbody>
  </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
<br><br>

<?php include "footer.php" ?>

</html>