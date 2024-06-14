<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link href="css/tiny-slider.css" rel="stylesheet">
  <link href="css/managePeminjaman_style.css" rel="stylesheet">
</head>
<body>

<!-- TEMPLATE NAVBAR -->
<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

<div class="container">
  <a class="navbar-brand" href="index.html">SINJAM<span>UPNVJ</span></a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsFurni">
    <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
      <li><a class="nav-link" href="fasilitas.php">Fasilitas</a></li>
      <li><a class="nav-link" href="cekKetersediaan.php">Jadwal</a></li>
      <li><a class="nav-link" href="formPeminjaman.php">Peminjaman</a></li>
      <li><a class="nav-link" href="feedback.php">Feedback</a></li>
      <li><a class="nav-link" href="FAQ.php">FAQ</a></li>
    </ul>

    <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
      <li><a class="nav-link" href="profile.php"><img src="images/user.svg"></a></li>
    </ul>
  </div>
</div>	
</nav>
<br>
<br><br><br>
<div class="container">
  <br>
  <h2>Peminjaman Fasilitas Universitas Pembangunan Nasional "Veteran" Jakarta</h2>          
  <table class="table table-hover">
    <thead>
      <tr>
        <th>No.</th>
        <th>ID Peminjaman</th>
        <th>NIM</th>
        <th>ID Fasilitas</th>
        <th>Tanggal Peminjaman</th>
        <th>Tanggal Pengajuan</th>
        <th>Detail</th>
      </tr>
    </thead>
    <tbody>
      <?php
        include("config.php");
        $query = "SELECT * FROM peminjaman ORDER BY id_pinjam ASC";
        $result = mysqli_query($conn, $query);
        if(!$result){
          die("Query Error:".mysqli_errno($conn)." -".mysqli_error($conn));
        }
        $i = 1;
        while($data = mysqli_fetch_assoc($result)) {
          $raw_date_pinjam = strtotime($data["tgl_pinjam"]);
          $date_pinjam = date("d - m - Y", $raw_date_pinjam);
          $raw_date_pengajuan = strtotime($data["tgl_pengajuan"]);
          $date_pengajuan = date("d - m - Y", $raw_date_pengajuan);

          echo "<tr>";
          echo "<th scope=\"row\">$i</th>";
          echo "<td>$data[id_pinjam]</td>";
          echo "<td>$data[nim]</td>";
          echo "<td>$data[id_fasilitas]</td>";
          echo "<td>$date_pinjam</td>";
          echo "<td>$date_pengajuan</td>";
          echo "<td class=\"text-center\">";
          echo "<form action=\"./detailPeminjaman.php\" method=\"post\" class=\"d-inline-block mb-2\">";
          echo "<input type=\"hidden\" name=\"id_pinjam\" value=\"$data[id_pinjam]\">";
          echo "<input type=\"submit\" name=\"submit\" value=\"Detail\" class=\"btn btn-info text-white\">";
          echo "</form>";
          echo "</td>";
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

<footer class="footer-section">
	<div class="container relative">
    <div class="row">
      <div class="col-4 mt-5">
        <a href="index.html" style="font-weight: 650; font-size: 32px; color:#208aae">SINJAM<span style="font-weight:100; color: black;">UPNVJ</span></a>
      </div>
      <div class="col-4">
        <div class="mb-4 footer-h1">Menu</div>
        <p class="mb-2"><a href="fasilitas.php">Fasilitas</a></p>
        <p class="mb-2"><a href="cekKetersediaan.php">Jadwal</a></p>
        <p class="mb-2"><a href="formPeminjaman.php">Peminjaman</a></p>
        <p class="mb-2"><a href="feedback.php">Feedback</a></p>
        <p class="mb-2"><a href="FAQ.php">FAQ</a></p>
      </div>
      <div class="col-4">
        <div class="ml-9">
          <div class="mb-4 footer-h1">Contact</div>
          <ul class="list-unstyled">
            <li>Universitas Pembangunan Nasional "Veteran" Jakarta</li>
            <li>Jl. RS. Fatmawati, Pondok Labu, Jakarta Selatan, DKI Jakarta. 12450.</li>
            <li>+62 812 3456 7890</li>
            <li>sinjam@upnvj.ac.id</li>            
          </ul>
        </div>
      <br><br>
    </div>
        
		<div class="border-top copyright">
			<div class="row mt-3">
				<div class="col">
					<p class="mb-2 text-center ">Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Sistem Informasi Peminjaman Universitas Pembangunan Nasional "Veteran" Jakarta <!-- License information: https://untree.co/license/ --></p>
				</div>
			</div>
		</div>
	</div>
</footer>
</html>
