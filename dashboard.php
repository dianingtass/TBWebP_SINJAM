<!doctype html>
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
		<link href="css/dashboard_style.css" rel="stylesheet">
		<title>SINJAM - UPNVJ </title>
	</head>

	<body>
    <?php include "navbar.php" ?>

<!-- Start Hero Section -->
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Selamat Datang di <span class="d-block">SINJAM UPNVJ</span></h1>
                    <p class="mb-4">Platform inovatif yang memudahkan Anda dalam proses peminjaman fasilitas di lingkungan Universitas Pembangunan Nasional "Veteran" Jakarta (UPNVJ).</p>
                    <p><a href="formPeminjaman.php" class="btn btn-secondary me-2">Pinjam Sekarang</a><a href="fasilitas.php" class="btn btn-white-outline">Telusuri Fasilitas</a></p>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="hero-img-wrap">
                    <?php
                        $dir = 'assets/db/';
                        $db = glob($dir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
                        foreach($db as $image) {
                            echo '<img src="'.$image.'" class="img-fluid">';
                        }
                        ?>
                    <button class="prev" onclick="plusSlides(-1)">&#10094;</button>
                    <button class="next" onclick="plusSlides(1)">&#10095;</button>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- End Hero Section -->

    <script>
    window.onload = function() {
    var slideIndex = 1;
    showSlides(slideIndex);

    document.querySelector(".prev").onclick = function() {
        plusSlides(-1);
    };
    document.querySelector(".next").onclick = function() {
        plusSlides(1);
    };

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function showSlides(n) {
        var i;
        var slides = document.querySelectorAll(".hero-img-wrap img");
        if (n > slides.length) {
            slideIndex = 1;
        }
        if (n < 1) {
            slideIndex = slides.length;
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].classList.remove("active");
        }
        slides[slideIndex - 1].classList.add("active");
    }
};

    </script>


		<!-- Start Product Section -->
		<div class="product-section">
			<div class="container">
				<div class="row">

					<!-- Start Column 1 -->
					<div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
						<h2 class="mb-4 section-title">Fasilitas di UPNVJ</h2>
						<p class="mb-4"> UPNVJ menyediakan fasilitas modern untuk mendukung kegiatan akademik dan kemahasiswaan. Temukan lebih lanjut tentang fasilitas yang tersedia dan manfaatnya bagi Anda. </p>
						<p><a href="fasilitas.php" class="btn btn-secondary me-2">Telusuri Fasilitas</a></p>
					</div> 
					<!-- End Column 1 -->

					<!-- Start Column 2 -->
					<div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
						<a class="product-item" href="fasilitas.php">
							<img src="assets/FIKLAB.png" class="img-fluid product-thumbnail">
							<strong class="product-price">FIK LAB.</strong>
							<h3 class="product-title">Fakultas Ilmu Komputer</h3>

							<span class="icon-cross">
								<img src="assets/cross.svg" class="img-fluid">
							</span>
						</a>
					</div> 
					<!-- End Column 2 -->

					<!-- Start Column 3 -->
					<div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
						<a class="product-item" href="fasilitas.php">
							<img src="assets/LABDIPLO.png" class="img-fluid product-thumbnail">
							<strong class="product-price">LAB. DIPLOMASI</strong>
							<h3 class="product-title">Fakultas Ilmu Sosial dan Ilmu Politik</h3>

							<span class="icon-cross">
								<img src="assets/cross.svg" class="img-fluid">
							</span>
						</a>
					</div>
					<!-- End Column 3 -->

					<!-- Start Column 4 -->
					<div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
						<a class="product-item" href="fasilitas.php">
							<img src="assets/BTI1.png" class="img-fluid product-thumbnail">
							<strong class="product-price">AUDITORIUM BTI</strong>
							<h3 class="product-title">Gedung Rektorat</h3>

							<span class="icon-cross">
								<img src="assets/cross.svg" class="img-fluid">
							</span>
						</a>
					</div>
					<!-- End Column 4 -->

				</div>
			</div>
		</div>
		<!-- End Fasilitas Section -->

        <!-- Start Alur Section -->
                <div class="timeline-section">
            <div class="container">
            <h2 class="section-title">Alur Peminjaman Fasilitas</h2>
            <div class="timeline">
                <div class="container-alur left">
                <div class="content">
                    <h2>Tentukan.</h2>
                    <p>Mulailah dengan menentukan fasilitas yang ingin Anda pinjam.
                    Tentukan juga tanggal dan waktu peminjaman yang sesuai dengan kebutuhan Anda.
                    </p>
                </div>
                </div>
                <div class="container-alur right">
                <div class="content">
                    <h2>Periksa.</h2>
                    <p>Setelah menentukan fasilitas dan tanggal, cek ketersediaan fasilitas tersebut. 
                    Periksa apakah fasilitas yang Anda pilih tersedia pada tanggal dan waktu yang diinginkan. 
                    </p>
                </div>
                </div>
                <div class="container-alur left">
                <div class="content">
                    <h2>Ajukan.</h2>
                    <p>Setelah memastikan ketersediaan, ajukan peminjaman dengan mengisi formulir yang disediakan. 
                        Sertakan informasi lengkap mengenai detail peminjaman. </p>
                </div>
                </div>
                <div class="container-alur right">
                <div class="content">
                    <h2>Tunggu.</h2>
                    <p>Tunggu proses verifikasi dan persetujuan dari pihak yang berwenang. Anda akan menerima 
                        notifikasi melalui email atau sistem kami mengenai status pengajuan Anda.</p>
                </div>
                </div>
            </div>
            </div>
        </div>

        <!-- End Alur Section -->

        <!-- Start FAQ Section -->
        <div class="faq-section">
        <h2>Pertanyaan Umum</h2>
        <div class="faq-container">
            <div class="faq-card">
                <h3>Hak Peminjam <i class="fas fa-user"></i></h3>
                <p>Siapa yang berhak mengajukan peminjaman fasilitas UPNVJ?</p>
            </div>
            <div class="faq-card">
                <h3>Peminjaman Fasilitas  <i class="fas fa-calendar-alt"></i></h3>
                <p>Bagaimana cara meminjam fasilitas untuk acara saya?</p>
            </div>
            <div class="faq-card">
                <h3>Persyaratan dan Ketentuan <i class="fas fa-file-alt"></i></h3>
                <p>Apa saja persyaratan untuk meminjam fasilitas di UPNVJ?</p>
            </div>
            <div class="faq-card">
                <h3>Ketersediaan Fasilitas <i class="fas fa-check-circle"></i></h3>
                <p> Bagaimana cara mengecek ketersediaan fasilitas yang ingin saya pinjam?</p>
            </div>
            <div class="faq-card">
                <h3>Alur Pembatalan <i class="fas fa-times-circle""></i></h3>
                <p>Bagaimana alur pembatalan pengajuan untuk membatalkan peminjaman fasilitas UPNVJ?</p>
            </div>
            <div class="faq-card">
                <h3>Kontak dan Dukungan <i class="fas fa-phone-alt"></i></h3>
                <p>Bagaimana cara menghubungi pihak UPNVJ jika saya membutuhkan bantuan terkait peminjaman fasilitas?</p>
            </div>
        </div>
        <a href="faq.php" class="btn btn-secondary me-2">Telusuri Lebih Lanjut</a>
    </div>
        <!-- End FAQ Section -->
         
        <?php include "footer.php" ?>
		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/tiny-slider.js"></script>
		<script src="js/custom.js"></script>
	</body>

</html>
