<?php
    include("config.php");
    if (isset($_POST["submit"])) {
        date_default_timezone_set("Asia/Jakarta");
        $nim = htmlentities(strip_tags(trim($_POST["c_nim"])));
        $nama = htmlentities(strip_tags(trim($_POST["c_nama"])));
        $fasilitas = intval(htmlentities(strip_tags(trim($_POST["c_fasilitas"]))));
        $deskripsi = "";
        $tgl_pinjam = htmlentities(strip_tags(trim($_POST["c_tanggal"])));
        $tgl_pengajuan = date("Y-m-d");
        $jam_mulai = htmlentities(strip_tags(trim($_POST["c_jamMulai"])));
        $jam_selesai = htmlentities(strip_tags(trim($_POST["c_jamSelesai"])));
        $tmp_file = $_FILES['c_kak']['tmp_name'];
        $nm_file = $_FILES['c_kak']['name'];
    
		$tgl_pengajuan1 = new DateTime($tgl_pengajuan);
        $tgl_pinjam1 = new DateTime($tgl_pinjam);
        $interval = $tgl_pengajuan1->diff($tgl_pinjam1);
        $selisih_hari = $interval->days;
        
        // Jika selisih hari kurang dari 10 hari, tampilkan pesan kesalahan
		$queryNim = "SELECT nim FROM mahasiswa WHERE nim='$nim'";
		$resultNim = mysqli_query($conn, $queryNim);

		$nimError = $namaError = $fasilitasError = $hariError = $jamError = $kakError = "";

		if (empty($nim)){
			$nimError = "NIM belum terisi. Mohon isi terlebih dahulu.";
		}else{
			if (mysqli_num_rows($resultNim) > 0) {
				while ($row = mysqli_fetch_assoc($resultNim)) {
				}
			} else {
				$nimError = "NIM tidak valid. Mohon masukkan NIM yang sesuai.";
			}
		}

		$queryNama = "SELECT nama FROM mahasiswa WHERE nim='$nim'";
		$resultNama = mysqli_query($conn, $queryNama);

		if (empty($nama)){
			$namaError = "Nama belum terisi. Mohon isi terlebih dahulu.";
		}else {
			if (mysqli_num_rows($resultNama) > 0) {
				$row = mysqli_fetch_assoc($resultNama);
				$nama_database = $row['nama']; // Ambil nilai 'nama' dari database
		
				// Bandingkan nilai dari database dengan variabel $nama
				if (!($nama === $nama_database)) {
					$namaError = "Nama tidak sesuai dengan profil NIM. Mohon masukkan nama yang sesuai.";
				}
			}
		}

        if (empty($fasilitas)){
			$fasilitasError = "Fasilitas belum dipilih. Mohon pilih terlebih dahulu.";
		}

        if (empty($tgl_pinjam)){
			$hariError = "Tanggal peminjaman belum terisi. Mohon isi terlebih dahulu.";
		}
		else if ($selisih_hari < 10) {
            $hariError = "Pengajuan harus dilakukan minimal 10 hari sebelum peminjaman. Mohon ubah tanggal peminjaman.";
        }

        if (empty($jam_mulai) || empty($jam_selesai)) {
            $jamError = "Jam penggunaan belum terisi lengkap. Mohon isi terlebih dahulu.";
        }else{
			$jam_awal = new DateTime('08:00');
			$jam_akhir = new DateTime('16:00');

			$jam_mulai_obj = DateTime::createFromFormat('H:i', $jam_mulai);
			$jam_selesai_obj = DateTime::createFromFormat('H:i', $jam_selesai);

			// Membandingkan waktu
			if (($jam_mulai_obj < $jam_awal) || ($jam_selesai_obj > $jam_akhir)) {
				$jamError = "Peminjaman hanya dibatasi dari jam <b>08.00</b> s/d <b>16.00</b>. Mohon ubah jam peminjaman.";
			}
		}

        if (empty($nm_file)) {
            $kakError = "Kerangka Acuan Kerja (KAK) Belum Di-Upload. Mohon Upload Terlebih Dahulu.";
        }

		if (empty($nimError) && empty($namaError) && empty($fasilitasError) && empty($hariError) && empty($jamError) && empty($kakError)) {
			if(isset($_POST["fiklab-201"])){
				$tmp = htmlentities(strip_tags(trim($_POST["fiklab-201"])));
				if($tmp == "1"){
					$deskripsi .= "201";
				}
			}
			if(isset($_POST["fiklab-202"])){
				$tmp = htmlentities(strip_tags(trim($_POST["fiklab-202"])));
				if($tmp == "2"){
					$deskripsi .= ", 202";
				}
			}
			if(isset($_POST["fiklab-203"])){
				$tmp = htmlentities(strip_tags(trim($_POST["fiklab-203"])));
				if($tmp == "3"){
					$deskripsi .= ", 203";
				}
			}
			if (substr($deskripsi, 0, 2) == ", ") {
				$deskripsi = substr($deskripsi, 2);
			}
	
			if ($nm_file) {
				$dir = "KAK/" . $nm_file;
				move_uploaded_file($tmp_file, $dir);
				$sql_peminjaman = "INSERT INTO peminjaman(nim, id_fasilitas, deskripsi, tgl_pinjam, tgl_pengajuan, jam_mulai, jam_selesai, status) VALUES ('$nim', $fasilitas, '$deskripsi', '$tgl_pinjam', '$tgl_pengajuan', '$jam_mulai', '$jam_selesai', 1)";
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
				$accMessage = "";
				if ($queryPinjam) {
					$accMessage = "Terima Kasih! Pengajuan Anda Telah Selesai.";
				} else {
					die ("Query Error: " . mysqli_errno($conn) . " - " . mysqli_error($conn));
				}
			}
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
		<link href="css/tiny-slider.css" rel="stylesheet">
		<link href="css/formPeminjaman_style.css" rel="stylesheet">
		<title>SINJAM UPNVJ</title>
	</head>

	<body>
		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/tiny-slider.js"></script>
		<script src="js/custom.js"></script>
		<?php include "navbar.php" ?>

		<div class="untree_co-section">
		    <div class="container">
				<?php if (!empty($accMessage)): ?>
				  <div id="notifAlert"  class="alert alert-success"><?php echo $accMessage; ?></div>
			  	<?php endif; ?>

				<?php if (!empty($nimError)): ?>
				  <div id="notifAlert" class="alert alert-danger"><?php echo $nimError; ?></div>
			  	<?php endif; ?>
				<?php if (!empty($namaError)): ?>
				  <div id="notifAlert" class="alert alert-danger"><?php echo $namaError; ?></div>
			  	<?php endif; ?>
				<?php if (!empty($fasilitasError)): ?>
				  <div id="notifAlert" class="alert alert-danger"><?php echo $fasilitasError; ?></div>
			  	<?php endif; ?>
				<?php if (!empty($hariError)): ?>
				  <div id="notifAlert" class="alert alert-danger"><?php echo $hariError; ?></div>
			  	<?php endif; ?>
				<?php if (!empty($jamError)): ?>
				  <div id="notifAlert" class="alert alert-danger"><?php echo $jamError; ?></div>
			  	<?php endif; ?>
				<?php if (!empty($kakError)): ?>
				  <div id="notifAlert" class="alert alert-danger"><?php echo $kakError; ?></div>
			  	<?php endif; ?>

                <form method="post" action="" enctype="multipart/form-data">
		          <h1 class="h3 mb-3 text-black">Form Peminjaman</h1>
		          <div class="p-3 p-lg-5 border bg-white">


		            <div class="form-group">
		              <label for="c_nim" class="text-black">NIM <span class="text-danger">*</span></label>
		              <input type="text" class="form-control" id="c_nim" name="c_nim">
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
                            <option value="4">Auditorium dr. Wahidin</option>    
                            <option value="5">Auditorium BEJ</option>
                            <option value="6">Auditorium MERCe</option>    
                            <option value="7">Laboratorium Diplomasi</option>    
                            <option value="8">Auditorium Tanah Airku</option>    
                            <option value="9">Auditorium Bhinneka Tunggal Ika</option>
                            <option value="10">Plaza Wardiman</option>
                            <option value="11">Plaza Internet</option>
                            <option value="12">Lapangan Olahraga</option>
                            <option value="13">Aula Serbaguna</option>
                            <option value="14">Ruang Sidang FH</option>
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
					<div class="form-group row">
		              <div class="col-md-6">
		                <label for="c_jamMulai" class="text-black">Jam Mulai <span class="text-danger">*</span></label>
		                <input type="time" class="form-control" id="c_jamMulai" name="c_jamMulai">
		              </div>
		              <div class="col-md-6">
		                <label for="c_jamSelesai" class="text-black">Jam Selesai <span class="text-danger">*</span></label>
		                <input type="time" class="form-control" id="c_jamSelesai" name="c_jamSelesai">
		              </div>
		            </div>
					<br>
		            <div class="form-group">
		                <label for="c_kak" class="text-black">Kerangka Acuan Kerja (KAK) <span class="text-danger">*</span></label>
		                <input type="file" class="form-control" id="c_kak" name="c_kak" accept=".doc, .docx, .pdf">
						<table width="100%">
							<tr>
								<td><span class="text-danger" style="margin-left:1rem;">*</span><i>(.doc, .docx, .pdf)</i></td>
								<td style="float:right">Belum memiliki <i>template</i> KAK? <a class="unduhKAK" href="KAK/Template-KAK.docx" download="Template-KAK.docx"><b>Unduh Disini</b></a></td>
							</tr>
						</table>
					</div>
				<br>
                    <div>
                        <input id="submit" type="submit" name="submit" value="Submit" class="btn">
                    </div>
                </form>
		    </div>
	    </div>

        <br><br><br>
		<?php include "footer.php" ?>
	</body>
</html>