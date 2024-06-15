<?php
include("config.php");

$message = "";

if (isset($_POST["submit"])) {
    $nim = htmlentities(strip_tags(trim($_POST["nim"])));
    $nama = htmlentities(strip_tags(trim($_POST["nama"])));
    $email = htmlentities(strip_tags(trim($_POST["email"])));
    $feedback = htmlentities(strip_tags(trim($_POST["feedback"])));

    $nim = mysqli_real_escape_string($conn, $nim);
    $nama = mysqli_real_escape_string($conn, $nama);
    $email = mysqli_real_escape_string($conn, $email);
    $feedback = mysqli_real_escape_string($conn, $feedback);

    $query = "INSERT INTO feedback (nim, nama, email, feedback) VALUES ('$nim', '$nama', '$email', '$feedback')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $message = "Terimakasih, Feedback telah dikirim!";
    } else {
        die ("Query Error: " . mysqli_errno($conn) . " - " . mysqli_error($conn));
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">
  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />
	<!-- Bootstrap CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
	<link href="css/feedback_style.css" rel="stylesheet">
	<title>SINJAM UPNVJ</title>
</head>

<!-- TEMPLATE NAVBAR -->
<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">
			<div class="container">
				<a class="navbar-brand" href="dashboard.php">SINJAM<span>UPNVJ</span></a>
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
						<li><a class="nav-link" href="profile.php"><i class="fa-regular fa-user"></i></a></li>
					</ul>
				</div>
			</div>	
		</nav>
    <br><br><br>

<div class="container">
  <br><br><br>
  <div class="block">
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-8 pb-4">
        <h2>Feedback</h2>
        <p>Anda dapat memberikan feedback kepada layanan SINJAM UPN "Veteran" Jakarta pada halaman ini.</p>

        <!-- Tampilkan pesan sukses jika ada -->
        <?php if (!empty($message)): ?>
          <div class="alert alert-success"><?php echo $message; ?></div>
        <?php endif; ?>
        
        <form action="feedback.php" method="post">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label class="text-black" for="nim">NIM</label>
                <input type="text" name="nim" class="form-control" id="nim" required>
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label class="text-black" for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" id="nama" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="text-black" for="email" style="padding-top: 20px">Email address</label>
            <input type="email" name="email" class="form-control" id="email" required>
          </div>
          <div class="form-group mb-5">
            <label class="text-black" for="feedback" style="padding-top: 20px">Feedback</label>
            <textarea name="feedback" class="form-control" id="feedback" cols="30" rows="5" required></textarea>
          </div>
          <button type="submit" name="submit" class="submit">Kirim Feedback</button>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
<footer class="footer-section">
	<div class="container relative">
    <div class="row">
      <div class="col-4 mt-5">
        <a href="dashboard.php" style="font-weight: 650; font-size: 32px; color:#208aae">SINJAM<span style="font-weight:100; color: black;">UPNVJ</span></a>
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
					<p class="mb-2 text-center ">Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Sistem Informasi Peminjaman Universitas Pembangunan Nasional "Veteran" Jakarta</p>
				</div>
			</div>
		</div>
	</div>
</footer>

</html>
