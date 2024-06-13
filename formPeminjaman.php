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
		<link href="css/tiny-slider.css" rel="stylesheet">
		<link href="css/formPeminjaman_style.css" rel="stylesheet">
		<title>SINJAM UPNVJ</title>
	</head>

	<body>
		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/tiny-slider.js"></script>
		<script src="js/custom.js"></script>
		<!-- Start Header/Navigation -->
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
						<li><a class="nav-link" href="profile.php"><i class="fa-regular fa-user"></i></a></li>
					</ul>
				</div>
			</div>	
		</nav>
        <br><br><br>
		<!-- End Header/Navigation -->

		<div class="untree_co-section">
		    <div class="container">
                <form method="post" action="" enctype="multipart/form-data">
		          <h1 class="h3 mb-3 text-black">Form Peminjaman</h1>
		          <div class="p-3 p-lg-5 border bg-white">

		            <div class="form-group">
		              <label for="c_nim" class="text-black">NIM <span class="text-danger">*</span></label>
		              <input type="text" class="form-control" id="c_nim" name="c_nim" value="<?php echo (isset($nim)) ? $nim : ""; ?>">
		            </div>
                    <br>
		            <div class="form-group">
		                <label for="c_nama" class="text-black">Nama <span class="text-danger">*</span></label>
		                <input type="text" class="form-control" id="c_nama" name="c_nama">
		            </div>
                    <br>                    
		            <div class="form-group">
		                <label for="c_fasilitas" class="text-black">Fasilitas <span class="text-danger">*</span></label>
		                <select id="c_fasilitas" name="c_fasilitas" class="form-control">
                            <option value="">Pilih Fasilitas</option>    
                            <option value="1">FIKLAB</option>    
                            <option value="2">Selasar FIK</option>    
                            <option value="3">Ubin Coklat</option>    
                            <option value="4">Auditorium FK</option>    
                            <option value="5">Plaza Wahidin</option>    
                            <option value="6">Auditorium MERCe</option>    
                            <option value="7">Laboratorium Diplomasi</option>    
                            <option value="8">Auditorium Tanah Airku</option>    
                            <option value="9">Auditorium Bhinneka Tunggal Ika</option>
                            <option value="10">Plaza Wardiman</option>
                            <option value="11">Plaza Internet</option>
                            <option value="12">Lapangan Olahraga</option>
                            <option value="13">Aula Serbaguna</option>
                        </select>
                        <div id="c_fasilitas_fiklab" style="display: none;" class="form-group">
                            <input type="checkbox" id="fiklab-201" name="fiklab-201" value="1" class="checkbox_fiklab">
                            <label for="fiklab-201">FIKLAB-201</label><br>
                            <input type="checkbox" id="fiklab-202" name="fiklab-202" value="2" class="checkbox_fiklab">
                            <label for="fiklab-202">FIKLAB-202</label><br>
                            <input type="checkbox" id="fiklab-203" name="fiklab-203" value="3" class="checkbox_fiklab">
                            <label for="fiklab-203">FIKLAB-203</label>
                        </div>

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const mainDropdown = document.getElementById('c_fasilitas');
                                const subCheckboxContainer = document.getElementById('c_fasilitas_fiklab');

                                mainDropdown.addEventListener('change', function() {
                                    if (mainDropdown.value == '1') {
                                        subCheckboxContainer.style.display = 'block';
                                    } else {
                                        subCheckboxContainer.style.display = 'none';
                                    }
                                });
                            });
                        </script>

		            </div>
                    <br>                    
		            <div class="form-group">
		                <label for="c_tanggal" class="text-black">Tanggal Peminjaman <span class="text-danger">*</span></label>
		                <input type="date" class="form-control" id="c_tanggal" name="c_tanggal">
		            </div>
                    <br>                    
		            <div class="form-group">
		                <label for="c_kak" class="text-black">Kerangka Acuan Kerja (KAK) <span class="text-danger">*</span></label>
		                <input type="file" class="form-control" id="c_kak" name="c_kak" accept=".doc, .docx, .pdf">
		            </div>
                    <br>
                    <div>
                        <input id="submit" type="submit" name="submit" value="Submit" class="submit">
                    </div>
                </form>
		      <!-- </form> -->
		    </div>
	    </div>

        <br><br><br>

		<!-- Start Footer Section -->
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
	</body>
</html>

<?php
    include("config.php");
    if (isset($_POST["submit"])) {
        date_default_timezone_set("Asia/Jakarta");
        $nim = htmlentities(strip_tags(trim($_POST["c_nim"])));
        $fasilitas = intval(htmlentities(strip_tags(trim($_POST["c_fasilitas"]))));
        $deskripsi = "";
        $tgl_pinjam = htmlentities(strip_tags(trim($_POST["c_tanggal"])));
        $tgl_pengajuan = date("Y-m-d");
        $tmp_file = $_FILES['c_kak']['tmp_name'];
        $nm_file = $_FILES['c_kak']['name'];
    
        if($fasilitas == "1"){
            $tmp = htmlentities(strip_tags(trim($_POST["fiklab-201"])));
            if($tmp == "1"){
                $deskripsi .= "201";
            }
            $tmp = htmlentities(strip_tags(trim($_POST["fiklab-202"])));
            if($tmp == "2"){
                $deskripsi .= ", 202";
            }
            $tmp = htmlentities(strip_tags(trim($_POST["fiklab-203"])));
            if($tmp == "3"){
                $deskripsi .= ", 203";
            }
            $first2 = substr($deskripsi, 0, 2);
            if($first2 == ", "){
                $deskripsi = substr($deskripsi, 2, strlen($deskripsi));
            }
        }

        if ($nm_file) {
            $dir = "KAK/" . $nm_file;
            move_uploaded_file($tmp_file, $dir);
            $sql_peminjaman = "INSERT INTO peminjaman(nim, id_fasilitas, deskripsi, tgl_pinjam, tgl_pengajuan, status) VALUES ('$nim', $fasilitas, '$deskripsi', '$tgl_pinjam', '$tgl_pengajuan', 1)";
            $queryPinjam = mysqli_query($conn, $sql_peminjaman) or die(mysqli_error($conn));

            if ($queryPinjam) {
                $idPinjam = "SELECT id_pinjam FROM peminjaman WHERE nim='$nim' AND id_fasilitas='$fasilitas' AND tgl_pengajuan='$tgl_pengajuan' LIMIT 1";
                $query = mysqli_query($conn, $idPinjam);
                if ($query && $row = mysqli_fetch_assoc($query)) {
                    $id_pinjam = $row['id_pinjam'];
                    $sql_kak = "INSERT INTO kak (id_pinjam, file, tgl_upload) VALUES ('$id_pinjam', '$nm_file', '$tgl_pengajuan')";
                    $query_kak = mysqli_query($conn, $sql_kak);
                }
            }
        }
    }
?>