<?php
include "config.php";
session_start(); // Mulai sesi

$nim = $_SESSION['nim'];
$query = "SELECT * FROM mahasiswa WHERE nim='$nim'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $nama = $row['nama'];
    $email = $row['email'];
    $fakultas = $row['fakultas'];
    $program_studi = $row['program_studi'];
} else {
    echo "Informasi pengguna tidak ditemukan.";
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
		<link href="css/profile_style.css" rel="stylesheet">
		<title>SINJAM UPNVJ</title>
	</head>

	<body>
		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/tiny-slider.js"></script>
		<script src="js/custom.js"></script>
		<!-- Navbar -->
		<?php include "navbar.php" ?>
        <br><br><br>
		
		<!-- Content -->
        <content>
            <div class="container mb-5">
               
                <h1 class="h3 mb-3 text-black">Profile</h1><br>
                
                <div style="display: flex; justify-content: center;">
                    <div class="card mb-3 shadow-lg p-3 mb-5 bg-body-tertiary rounded" style="max-width: 1000px; padding: 50px; display: flex; justify-content: center; align-items: center ;">
                        <div class="row" style="min-width: 480px; max-width: 2000px;">
                            <div class="col-md-4 m-auto text-center" >
                                <img src="assets/person.svg" style="width: 120px">
                            </div>
                            <div class="col-md-8" style="justify-content: center">
                                <div class="card-body">
                                    <h4 class="card-title"><?php echo htmlspecialchars($nama);?></h4>
                                    <p class="card-text"><?php echo htmlspecialchars($nim); ?></p>
                                    
                                    <p class="card-text"><small class="text-body-secondary"><?php echo htmlspecialchars($email); ?><br> <?php echo htmlspecialchars($fakultas); ?><br><?php echo htmlspecialchars($program_studi); ?></small><br><br><a href="index.php"><button type="button" class="btn btn-outline-danger">Log Out</button></a>&emsp;<a href="historyPeminjaman.php"><button class="btn btn-primary" type="submit">Lacak Peminjaman</button></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </content>

        <!-- Footer -->
		<?php include "footer.php" ?>
	</body>
</html>