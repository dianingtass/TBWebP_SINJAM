<?php
    include("config.php");

    $id_pinjam = '';
    if (isset($_GET['id_pinjam'])) {
        $id_pinjam = $_GET['id_pinjam'];
    } 
    elseif (isset($_POST['id_pinjam'])) {
        $id_pinjam = $_POST['id_pinjam'];
    }

    if (!empty($id_pinjam)) {
        $query = "SELECT p.*, f.nama_fasilitas 
                FROM peminjaman p 
                JOIN fasilitas f ON p.id_fasilitas = f.id_fasilitas 
                WHERE p.id_pinjam = '$id_pinjam'";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $data = mysqli_fetch_assoc($result);
            $nim = $data['nim'];
            $id_fasilitas = $data['id_fasilitas'];
            $nama_fasilitas = $data['nama_fasilitas'];
            $tgl_pinjam = date("d - m - Y", strtotime($data['tgl_pinjam']));
            $tgl_pengajuan = date("d - m - Y", strtotime($data['tgl_pengajuan']));
            $jam_mulai = $data['jam_mulai'];
            $jam_selesai = $data['jam_selesai'];
            $status = $data['status'];
            $notes = $data['notes'];
        } 
    }
    else {
        die("Query Error:".mysqli_errno($conn)." -".mysqli_error($conn));
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['confirm_batal'])) {
        $alasanPembatalan = $_POST['alasan'];

        $queryBatal = "INSERT INTO pembatalan (id_pinjam, nim, id_fasilitas, tgl_pinjam, tgl_pengajuan, jam_mulai, jam_selesai, status, notes) 
                VALUES ('$id_pinjam', '$nim', '$id_fasilitas', '{$data['tgl_pinjam']}', '{$data['tgl_pengajuan']}', '{$data['jam_mulai']}', '{$data['jam_selesai']}', 'Dibatalkan', '$alasanPembatalan')";
        mysqli_query($conn, $queryBatal);

        $queryDeletePeminjaman = "DELETE FROM peminjaman WHERE id_pinjam = '$id_pinjam'";
        mysqli_query($conn, $queryDeletePeminjaman);

        $queryDeleteKak = "DELETE FROM kak WHERE id_pinjam = '$id_pinjam'";
        mysqli_query($conn, $queryDeleteKak);

        header('Location: trackingPeminjaman.php');
        exit;
    }

    mysqli_close($conn);
    
?>

<!DOCTYPE html>
<html lang="en">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />
    <link rel="shortcut icon" href="favicon.png">
    <link href="css\detailPeminjamanMhs_style.css" rel="stylesheet">

    <!-- ICON DAN FONT -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    
    <!-- BOOTSTRAP CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="css/tiny-slider.css" rel="stylesheet">
</head>
<body>
    <script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/tiny-slider.js"></script>
	<script src="js/custom.js"></script>

    <!-- NAVBAR -->
	<?php include "navbar.php" ?>
    <br><br><br>

    <!-- DETAIL PEMINJAMAN -->
    <div class="container">
        <h2>Detail Peminjaman Fasilitas</h2>
        <br>
        <form method="post" action="detailPeminjamanMhs.php" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="id_pinjam" class="form-label">ID Peminjaman</label>
                <input class="form-control" type="text" id="id_pinjam" name="id_pinjam" value="<?php echo htmlspecialchars($id_pinjam); ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input class="form-control" type="text" id="nim" value="<?php echo htmlspecialchars($nim); ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="nama_fasilitas" class="form-label">Nama Fasilitas</label>
                <input class="form-control" type="text" id="nama_fasilitas" value="<?php echo htmlspecialchars($nama_fasilitas); ?>" readonly>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="tgl_pinjam" class="form-label">Tanggal Peminjaman</label>
                        <input class="form-control" type="text" id="tgl_pinjam" value="<?php echo htmlspecialchars($tgl_pinjam); ?>" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="tgl_pengajuan" class="form-label">Tanggal Pengajuan</label>
                        <input class="form-control" type="text" id="tgl_pengajuan" value="<?php echo htmlspecialchars($tgl_pengajuan); ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="jam_mulai" class="form-label">Jam Mulai</label>
                        <input class="form-control" type="text" id="jam_mulai" value="<?php echo htmlspecialchars($jam_mulai); ?>" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="jam_selesai" class="form-label">Jam Selesai</label>
                        <input class="form-control" type="text" id="jam_selesai" value="<?php echo htmlspecialchars($jam_selesai); ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <input class="form-control" type="text" id="status" value="<?php echo htmlspecialchars($status); ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="fileKAK" class="form-label">File KAK</label><br>
                <a href="download.php?id_pinjam=<?php echo htmlspecialchars($id_pinjam); ?>&type=kak"><b>Lihat KAK</b></a>
            </div>

            <!-- DETAIL JIKA SUDAH DI ACC -->
            <?php if ($status == 'Diterima') : ?>
                <div class="mb-3">
                    <label for="fileDisposisi" class="form-label">File Disposisi</label><br>
                    <a href="download.php?id_pinjam=<?php echo htmlspecialchars($id_pinjam); ?>&type=disposisi"><b>Unduh Disposisi</b></a>
                </div>
            <?php endif; ?>
            <?php if ($status == 'Tidak Diterima' || $status == 'Diterima') : ?>
                <div class="mb-3">
                    <label for="notes" class="form-label">Notes</label>
                    <input class="form-control" type="text" id="notes" value="<?php echo htmlspecialchars($notes); ?>" readonly>
                </div>
            <?php endif; ?>
            
            <br>
            <a href="trackingPeminjaman.php" class="btn btn-primary" id="btn">Kembali</a>
            <button type="button" name="batal" class="btn btn-secondary" onclick="showBatalNotes()">Batalkan Pengajuan</button>
        
            <!-- PEMBATALAN PENGAJUAN -->
            <div class="mb-3" id="batal-notes" style="display: none;">
                <br>
                <label for="alasan" class="form-label">Alasan Pembatalan<span class="text-danger">*</span></label>
                <textarea class="form-control" id="alasan" name="alasan" rows="3" required></textarea>
                <button type="submit" name="confirm_batal" class="btn btn-danger mt-3" onclick="return confirmBatal()">Konfirmasi Pembatalan</button>
            </div>
        </form>
        <br>
    </div>

    <!-- FOOTER -->
    <br><br>
    <?php include "footer.php" ?>

    <script>
        function showBatalNotes() {
            document.getElementById('batal-notes').style.display = 'block';
        }
        function confirmBatal() {
                return confirm('Yakin ingin membatalkan pengajuan?');
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
    crossorigin="anonymous"></script>

</body>
</html>
