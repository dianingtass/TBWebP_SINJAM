<?php include "authUser.php";?>

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
  <link href="css/cekKetersediaan_style.css" rel="stylesheet">
</head>
<body>

<?php include "navbar.php" ?>

<br><br>
<div class="container">
  <br>
  <h2>Peminjaman Fasilitas Universitas Pembangunan Nasional "Veteran" Jakarta</h2>
  <br>

  <form class="form-inline" method="GET">
    <input type="hidden" name="sort" value="<?php echo isset($sort_column) ? $sort_column : ''; ?>">
    <input type="hidden" name="order" value="<?php echo isset($sort_order) ? $sort_order : ''; ?>">

    <div class="row">
      <div class="col-md-3 mb-3">
        <label class="sr-only" for="search_id">ID Peminjaman</label>
        <input type="text" class="form-control" id="search_id" name="search_id" placeholder="ID Peminjaman" value="<?php echo isset($_GET['search_id']) ? $_GET['search_id'] : ''; ?>">
      </div>
      <div class="col-md-4 mb-3">
        <label class="sr-only" for="search_nim">NIM</label>
        <input type="text" class="form-control" id="search_nim" name="search_nim" placeholder="NIM" value="<?php echo isset($_GET['search_nim']) ? $_GET['search_nim'] : ''; ?>">
      </div>
      <div class="col-md-4 mb-3">
        <label class="sr-only" for="search_fasilitas">Fasilitas</label>
        <input type="text" class="form-control" id="search_fasilitas" name="search_fasilitas" placeholder="Fasilitas" value="<?php echo isset($_GET['search_fasilitas']) ? $_GET['search_fasilitas'] : ''; ?>">
      </div>
    <button type="submit" class="btn btn-primary btn-block col-md-1 mb-3" id="btn">Search</button>
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
      'nim' => 'id_user',
      'fasilitas' => 'nama_fasilitas',
      'tgl_pinjam' => 'tgl_pinjam',
      'tgl_pengajuan' => 'tgl_pengajuan',
      'status' => 'status'
    ];

    if (!array_key_exists($sort_column, $valid_sort_columns)) {
      $sort_column = 'id_pinjam';
    }

    $search_id = isset($_GET['search_id']) ? mysqli_real_escape_string($conn, $_GET['search_id']) : '';
    $search_nim = isset($_GET['search_nim']) ? mysqli_real_escape_string($conn, $_GET['search_nim']) : '';
    $search_fasilitas = isset($_GET['search_fasilitas']) ? mysqli_real_escape_string($conn, $_GET['search_fasilitas']) : '';

    $query = "SELECT p.id_pinjam, p.id_user, p.id_fasilitas, p.tgl_pinjam, p.tgl_pengajuan, f.nama_fasilitas, p.status
              FROM peminjaman p
              JOIN fasilitas f ON p.id_fasilitas = f.id_fasilitas
              WHERE (p.id_pinjam LIKE '%$search_id%') 
                AND (p.id_user LIKE '%$search_nim%') 
                AND (f.nama_fasilitas LIKE '%$search_fasilitas%')
                AND (p.status != 'Tidak Diterima')
              ORDER BY {$valid_sort_columns[$sort_column]} $sort_order";
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
          <a href="?sort=id_pinjam&order=<?php echo ($sort_column == 'id_pinjam' && $sort_order == 'asc') ? 'desc' : 'asc'; ?>&search_id=<?php echo $search_id; ?>&search_nim=<?php echo $search_nim; ?>&search_fasilitas=<?php echo $search_fasilitas; ?>">
            ID Peminjaman 
            <i class="fas fa-caret-<?php echo ($sort_column == 'id_pinjam' && $sort_order == 'asc') ? 'up' : 'down'; ?>"></i>
          </a>
        </th>
        <th>
          <a href="?sort=nim&order=<?php echo ($sort_column == 'nim' && $sort_order == 'asc') ? 'desc' : 'asc'; ?>&search_id=<?php echo $search_id; ?>&search_nim=<?php echo $search_nim; ?>&search_fasilitas=<?php echo $search_fasilitas; ?>">
            NIM 
            <i class="fas fa-caret-<?php echo ($sort_column == 'nim' && $sort_order == 'asc') ? 'up' : 'down'; ?>"></i>
          </a>
        </th>
        <th>
          <a href="?sort=fasilitas&order=<?php echo ($sort_column == 'fasilitas' && $sort_order == 'asc') ? 'desc' : 'asc'; ?>&search_id=<?php echo $search_id; ?>&search_nim=<?php echo $search_nim; ?>&search_fasilitas=<?php echo $search_fasilitas; ?>">
            Fasilitas 
            <i class="fas fa-caret-<?php echo ($sort_column == 'fasilitas' && $sort_order == 'asc') ? 'up' : 'down'; ?>"></i>
          </a>
        </th>
        <th>
          <a href="?sort=tgl_pinjam&order=<?php echo ($sort_column == 'tgl_pinjam' && $sort_order == 'asc') ? 'desc' : 'asc'; ?>&search_id=<?php echo $search_id; ?>&search_nim=<?php echo $search_nim; ?>&search_fasilitas=<?php echo $search_fasilitas; ?>">
            Tanggal Peminjaman 
            <i class="fas fa-caret-<?php echo ($sort_column == 'tgl_pinjam' && $sort_order == 'asc') ? 'up' : 'down'; ?>"></i>
          </a>
        </th>
        <th>
          <a href="?sort=tgl_pengajuan&order=<?php echo ($sort_column == 'tgl_pengajuan' && $sort_order == 'asc') ? 'desc' : 'asc'; ?>&search_id=<?php echo $search_id; ?>&search_nim=<?php echo $search_nim; ?>&search_fasilitas=<?php echo $search_fasilitas; ?>">
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

          echo "<tr>";
          echo "<th scope=\"row\">$i</th>";
          echo "<td>$data[id_pinjam]</td>";
          echo "<td>$data[id_user]</td>";
          echo "<td>$nama_fasilitas</td>";
          echo "<td>$date_pinjam</td>";
          echo "<td>$date_pengajuan</td>";
          echo "<td>$data[status]</td>";
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
