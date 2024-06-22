<?php include "authUser.php";?>

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
		<link href="css/FAQ_style.css" rel="stylesheet">
		<title>SINJAM UPNVJ</title>
	</head>

	<body>
		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/tiny-slider.js"></script>
		<script src="js/custom.js"></script>

		<!-- Navbar -->
         
		<?php 
        $currentPage = 'FAQ.php';
        include "navbar.php"?>
        <br><br>
		

		<!-- FAQ Section -->
        <content>
            <div class="container">
                <br><h2 style="font-family: 'Gotham';">Frequently Asked Questions (FAQ's)</h2>
            </div><br>
            <div class="container">
                <div class="row">
                    <div class="accordion" id="accordion-bs">
                        <!-- Pertanyaan 1 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                                Q : Apa itu<i>&nbsp;Website&nbsp;</i>Sinjam UPNVJ?
                                </button>
                            </h2>
                            <div id="collapse1" class="accordion-collapse collapse" data-bs-parent="#accordion-bs">
                                <div class="accordion-body">
                                    <p>A : Sinjam UPNVJ merupakan<i>&nbsp;website&nbsp;</i>yang digunakan oleh mahasiswa untuk melakukan pengajuan peminjaman fasilitas yang ada di UPN "Veteran Jakarta". Pada<i>&nbsp;website&nbsp;</i>ini, mahasiswa juga dapat melihat daftar fasilitas apa saja yang dapat diajukan peminjaman.

                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Pertanyaan 2 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                Q : Bagaimana alur pengajuan untuk melakukan pengajuan peminjaman fasilitas UPNVJ?
                                </button>
                            </h2>
                            <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#accordion-bs">
                                <div class="accordion-body">
                                    <p>A : Berikut adalah alur pengajuan untuk melakukan pengajuan peminjaman fasilitas UPNVJ : <br>&emsp;&emsp;1. Baca dan pahami persyaratan di bawah ini sebelum mengisi pengajuan peminjaman fasilitas UPNVJ.<br>&emsp;&emsp;2. Pergi ke halaman <a href="formPeminjaman.php" style="text-decoration: none;">Pengajuan</a> peminjaman fasilitas UPNVJ. <br>&emsp;&emsp;3. Isi persyaratan yang dibutuhkan dan diminta. <br>&emsp;&emsp;4. Unduh templat dokumen Kerangka Acuan Kerja (KAK) pada Form Peminjaman atau <a href="KAK/Template-KAK.docx" style="text-decoration: none;" download="Template-KAK.pdf">Klik Di sini</a>.<br>&emsp;&emsp;5. Isi dan unggah dokumen KAK pada kolom yang sudah disediakan. <br>&emsp;&emsp;6.<i>&nbsp;Submit&nbsp;</i>formulir pengajuan jika semua yang dibutuhkan sudah terisi.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Pertanyaan 3 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                Q : Apa saja syarat dan ketentuan yang harus dipenuhi dan diketahui sebelum melakukan pengajuan peminjaman fasilitas UPNVJ?
                                </button>
                            </h2>
                            <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#accordion-bs">
                                <div class="accordion-body">
                                    <p>A : Berikut adalah syarat dan ketentuan yang harus dipahami dan dibaca sebelum melakukan pengajuan peminjaman fasilitas UPNVJ : <br>
                                    &emsp;&emsp;1. Mahasiswa diperbolehkan untuk melakukan pengajuan peminjaman fasilitas pada hari <strong>Senin - Sabtu</strong> di antara pukul <strong>08.00 - 16.00 WIB</strong>. <br>&emsp;&emsp;2. Mahasiswa hanya bisa melakukan pengajuan peminjaman <strong>paling lambat</strong> H-10 dari waktu pengajuan.<br>&emsp;&emsp;3. Harap fasilitas ditinggalkan dengan keadaan seperti semula. <br>&emsp;&emsp;4. <strong>Tidak boleh</strong> melebihi batas waktu yang telah diajukan. <br>&emsp;&emsp;5. <strong>Tidak boleh</strong> merusak dan menghilangkan properti fasilitas. <br></p>
                                </div>
                            </div>
                        </div>

                        <!-- Pertanyaan 4 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                Q : Bagaimana alur pembatalan pengajuan untuk membatalkan peminjaman fasilitas UPNVJ?
                                </button>
                            </h2>
                            <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#accordion-bs">
                                <div class="accordion-body">
                                    <p>A : Berikut adalah alur pembatalan untuk membatalkan peminjaman fasilitas UPNVJ : <br>&emsp;&emsp;1. Pergi ke halaman<a href="profile.php" style="text-decoration: none;"><i>&nbsp;Profile</i></a>.<br>&emsp;&emsp;2. Tekan tombol detail peminjaman <br>&emsp;&emsp;3. Tekan tombol batal untuk membatalkan peminjaman. <br>&emsp;&emsp;4. Isi deskripsi alasan terkait pembatalan peminjaman.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Pertanyaan 5 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">Q : Bagaimana cara untuk mengecek ketersediaan tanggal pada fasilitas yang ingin diajukan peminjaman?
                                </button>
                            </h2>
                            <div id="collapse5" class="accordion-collapse collapse" data-bs-parent="#accordion-bs">
                                <div class="accordion-body">
                                    <p>A : Untuk mengecek ketersediaan tanggal pada fasilitas, anda dapat pergi ke halaman <a href="cekKetersediaan.php" style="text-decoration: none;">Jadwal</a> yang ada pada<i>&nbsp;navigation bar&nbsp;</i>. Pada halaman tersebut, anda dapat melihat tanggal - tanggal yang tersedia pada fasilitas yang ingin anda ajukan peminjaman.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Pertanyaan 6 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                                Q : Siapa yang berhak dan tidak berhak dalam melakukan pengajuan peminjaman fasilitas UPNVJ?
                                </button>
                            </h2>
                            <div id="collapse6" class="accordion-collapse collapse" data-bs-parent="#accordion-bs">
                                <div class="accordion-body">
                                <p>A : Seluruh mahasiswa UPN "Veteran" Jakarta memiliki hak untuk melakukan pengajuan peminjaman fasilitas yang berada di UPNVJ. Sebaliknya, seorang yang tidak terdaftar sebagai mahasiswa UPN "Veteran" Jakarta tidak memiliki hak untuk melakukan pengajuan peminjaman fasilitas UPNVJ.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Pertanyaan 7 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
                                Q : Di mana letak informasi kontak yang dapat saya hubungi jika saya membutuhkan bantuan saat melakukan pengajuan peminjaman?
                                </button>
                            </h2>
                            <div id="collapse7" class="accordion-collapse collapse" data-bs-parent="#accordion-bs">
                                <div class="accordion-body">
                                <p>A : Untuk informasi kontak, anda bisa melihat informasi lengkapnya pada bagian<a href="#footer-sec" style="text-decoration: none;"><i>&nbsp;footer&nbsp;</i></a>dari<i>&nbsp;website&nbsp;</i>ini. Tidak hanya informasi kontak, melainkan anda juga dapat melihat informasi alamat universitas serta<i>&nbsp;email&nbsp;</i>yang dapat dihubungi.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </content>

        <br><br><br>

		<!-- Start Footer Section -->
		<?php include "footer.php"?>
	</body>
</html>