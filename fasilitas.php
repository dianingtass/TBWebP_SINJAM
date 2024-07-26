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
  <link href="css/fasilitas_style.css" rel="stylesheet">
</head>
<body>
<?php 
$currentPage = 'fasilitas.php';
include "navbar.php" ?>
<br><br>


<div class="container">
  <br>
  <h2>Fasilitas Universitas Pembangunan Nasional "Veteran" Jakarta</h2>
  <br>

  <?php
    include("config.php");

    // Fetch unique lokasi and pic for the dropdowns
    $lokasi_query = "SELECT DISTINCT lokasi FROM fasilitas";
    $lokasi_result = mysqli_query($conn, $lokasi_query);
    if (!$lokasi_result) {
        die("Query Error:" . mysqli_errno($conn) . " -" . mysqli_error($conn));
    }

    $pic_query = "SELECT DISTINCT pic FROM fasilitas";
    $pic_result = mysqli_query($conn, $pic_query);
    if (!$pic_result) {
        die("Query Error:" . mysqli_errno($conn) . " -" . mysqli_error($conn));
    }
  ?>

  <form class="form-inline" method="GET">
    <div class="row">
      <div class="col-md-4 mb-3">
        <label class="sr-only" for="search_lokasi">Lokasi</label>
        <div class="dropdown-container">
          <select class="form-control dropdown-icon" id="search_lokasi" name="search_lokasi">
            <option value="">Pilih Lokasi</option>
            <?php 
            while ($row = mysqli_fetch_assoc($lokasi_result)) { 
              $lokasi = $row['lokasi'];
              $display_lokasi = ($lokasi == 'pl') ? 'Pondok Labu' : (($lokasi == 'limo') ? 'Limo' : $lokasi);
            ?>
              <option value="<?php echo $lokasi; ?>" <?php if (isset($_GET['search_lokasi']) && $_GET['search_lokasi'] == $lokasi) echo 'selected'; ?>>
                <?php echo $display_lokasi; ?>
              </option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <label class="sr-only" for="search_pic">PIC</label>
        <div class="dropdown-container">
          <select class="form-control dropdown-icon" id="search_pic" name="search_pic">
            <option value="">Pilih PIC</option>
            <?php while ($row = mysqli_fetch_assoc($pic_result)) { ?>
              <option value="<?php echo $row['pic']; ?>" <?php if (isset($_GET['search_pic']) && $_GET['search_pic'] == $row['pic']) echo 'selected'; ?>>
                <?php echo $row['pic']; ?>
              </option>
            <?php } ?>
          </select>
        </div>
      </div>
      <button type="submit" class="btn btn-primary btn-block col-md-1 mb-3" id="btn">Search</button>
    </div>
  </form>
  <br>

  <?php
    $search_lokasi = isset($_GET['search_lokasi']) ? mysqli_real_escape_string($conn, $_GET['search_lokasi']) : '';
    $search_pic = isset($_GET['search_pic']) ? mysqli_real_escape_string($conn, $_GET['search_pic']) : '';

    $query = "SELECT * FROM fasilitas 
              WHERE (lokasi LIKE '%$search_lokasi%') 
                AND (pic LIKE '%$search_pic%')
              ORDER BY id_fasilitas";
    if (empty($search_lokasi) && empty($search_pic)) {
      $query = "SELECT * FROM fasilitas ORDER BY id_fasilitas";
    }

    $result = mysqli_query($conn, $query);
    if(!$result){
      die("Query Error:".mysqli_errno($conn)." -".mysqli_error($conn));
    }
  ?>

  <div class="row">
    <?php while ($row = mysqli_fetch_assoc($result)) {
        $lokasi_display = ($row['lokasi'] == 'pl') ? 'Pondok Labu' : (($row['lokasi'] == 'limo') ? 'Limo' : $row['lokasi']);
    ?>
      <div class="col-md-4 mb-4">
        <div class="card card-hover">
          <img src="assets/fasilitas/<?php echo $row['foto']; ?>" class="card-img-top" alt="<?php echo $row['nama_fasilitas']; ?>">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row['nama_fasilitas']; ?></h5>
            <div class="card-description">
              <p><strong><?php echo $row['nama_fasilitas']; ?></strong></p>
              <p><strong>Lokasi:</strong> <?php echo $lokasi_display; ?></p>
              <p><strong>PIC:</strong> <?php echo $row['pic']; ?></p>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>


</body>
<br><br>
<?php include "footer.php" ?>
</html>