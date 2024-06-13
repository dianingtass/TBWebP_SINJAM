<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css\index_style.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>SINJAM</title>
</head>
<body>
    <!-- NAVIGATION BAR -->
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="" onclick="event.preventDefault(); location.reload(); window.scrollTo(0, behavior: 'smooth');">SINJAM<span>UPNVJ</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModalMhs"><span class="icon"><i class="fa-regular fa-user"></i></span>Login</a>
                </li>
            </ul>
        </div>
    </nav>
 
    <!-- CAROUSEL -->
    <section>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="3000">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="assets\UPN.jpg" alt="First slide">
                    <div class="overlay"></div>
                    <div class="carousel-caption d-none d-md-block">
                        <h1>SINJAM</h1>
                        <p>Meminjam Fasilitas UPNVJ dengan Mudah</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="assets\MERCe.jpg" alt="Second slide">
                    <div class="overlay"></div>
                    <div class="carousel-caption d-none d-md-block">
                        <h1>SINJAM</h1>
                        <p>Meminjam Fasilitas UPNVJ dengan Mudah</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="assets\BTI.jpg" alt="Third slide">
                    <div class="overlay"></div>
                    <div class="carousel-caption d-none d-md-block">
                        <h1>SINJAM</h1>
                        <p>Meminjam Fasilitas UPNVJ dengan Mudah</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>

    <!-- DESCRIPTION WEB -->
    <section id="content">
        <div class="about-web">
            <h2>SINJAM</h2>
            <h5>Sistem Informasi Peminjaman yang dikelola oleh<br>Universitas Pembangunan Nasional "Veteran" Jakarta</h5>
            <hr>
            <div class="deskripsi">
                <p>Tenaga pendidikan dan mahasiswa UPN "Veteran" Jakarta memiliki akses untuk melihat berbagai fasilitas yang ada, 
                    mengajukan peminjaman fasilitas secara online, memantau status peminjaman, dan mendapatkan notifikasi terkait 
                    permohonan peminjaman.
                </p>
        </div>
    </section>

    <!-- CARD -->
    <section>
        <div class="card-position">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><i class="fa-solid fa-building-user"></i></h5>
                    <h6 class="card-subtitle mb-2">Explore Facilities</h6>
                    <p class="card-text text-muted">Temukan informasi lengkap tentang berbagai fasilitas yang ada di UPN "Veteran" Jakarta</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><i class="fa-solid fa-handshake"></i></h5>
                    <h6 class="card-subtitle mb-2">Easy to Rent</h6>
                    <p class="card-text text-muted">Mengajukan peminjaman fasilitas dengan lebih mudah, cepat, dan nyaman.</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><i class="fa-solid fa-list-check"></i></h5>
                    <h6 class="card-subtitle mb-2">Check Status</h6>
                    <p class="card-text text-muted">Mengecek persetujuan peminjaman dan ketersediaan fasilitas yang telah diajukan.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- MODAL LOGIN MAHASISWA -->
    <div class="modal fade" id="loginModalMhs" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Login</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="loginMhs.php">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Masukkan Email">

                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </form>
                </div>
                <div class="modal-footer justify-content-center">
                    <input type="submit" class="btn btn-primary" value="Login">
                </div>
                <div class="login-admin">
                    <h4><a href="#" data-toggle="modal" data-target="#loginModalAdm">Masuk sebagai Admin</a></h4>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL LOGIN ADMIN -->
    <div class="modal fade" id="loginModalAdm" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Login</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="loginAdmin.php">
                        <label>Email</label>
                        <input type="email" class="form-control" name="username" placeholder="Masukkan Email">

                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </form>
                </div>
                <div class="modal-footer justify-content-center">
                    <input type="submit" class="btn btn-primary" value="Login">
                </div>
                <div class="login-admin">
                    <h4><a href="#" data-toggle="modal" data-target="#loginModalMhs">Masuk sebagai Mahasiswa</a></h4>
                </div>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="footer-section">
		<div class="container relative">
            <div class="row">
                <div class="col-4 mt-5">
                    <a href="index.html" style="font-weight: 600; font-size: 32px; color:#208aae; font-family: 'Gotham';">SINJAM<span style="font-weight:100; color: black; font-family: 'Gotham'; opacity: .5;">UPNVJ</span></a>
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
                            <li>+6221-123 5678</li>
                            <li>sinjam@upnvj.ac.id</li>
                        </ul>
                    </div>
                    <br><br>
                </div>
            </div>

            <div class="border-top copyright">
                <p class="mb-2">Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                . All Rights Reserved. &mdash; Sistem Informasi Peminjaman Universitas Pembangunan Nasional "Veteran" Jakarta</p>
            </div>
		</div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#loginModalMhs').on('show.bs.modal', function (e) {
            $('#loginModalAdm').modal('hide');
        });

        $('#loginModalAdm').on('show.bs.modal', function (e) {
            $('#loginModalMhs').modal('hide');
        });
    });
    </script>
</body>
</html>