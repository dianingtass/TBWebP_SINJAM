<?php
include("config.php");

if (isset($_POST['submit_status'])) {
    $id_pinjam = $_POST['id_pinjam'];
    $new_status = $_POST['status'];
    $deskripsi = $_POST['deskripsi'];
    $notes = $_POST['notes'];
    $uploadOk = 1;

    if (isset($_FILES['fupload']) && $_FILES['fupload']['error'] == 0) {
        $target_dir = "uploads/";
        $file_name = basename($_FILES["fupload"]["name"]);
        $target_file = $target_dir . $file_name;
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if ($_FILES["fupload"]["size"] > 5000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        if ($file_type != "pdf" && $file_type != "doc" && $file_type != "docx") {
            echo "Sorry, only PDF, DOC, & DOCX files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["fupload"]["tmp_name"], $target_file)) {
                $tgl_publish = date("Y-m-d");
                $insert_query = "INSERT INTO disposisi (id_pinjam, file, tgl_publish) VALUES ('$id_pinjam', '$file_name', '$tgl_publish')";
                if (!mysqli_query($conn, $insert_query)) {
                    echo "Error: " . mysqli_error($conn);
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
                $uploadOk = 0;
            }
        }
    }

    if ($uploadOk == 1) {
        $update_query = "UPDATE peminjaman SET status='$new_status', notes='$notes' WHERE id_pinjam='$id_pinjam'";
        if (mysqli_query($conn, $update_query)) {
            header("Location: detailPeminjaman.php?id_pinjam=" . $id_pinjam);
            exit;
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}

$id_pinjam = '';
if (isset($_GET['id_pinjam'])) {
    $id_pinjam = $_GET['id_pinjam'];
} elseif (isset($_POST['id_pinjam'])) {
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
        $deskripsi = $data['deskripsi'];
        $notes = $data['notes'];
    } else {
        echo "Data tidak ditemukan.";
        exit;
    }

    $disposisi_query = "SELECT file FROM disposisi WHERE id_pinjam = '$id_pinjam' ORDER BY tgl_publish DESC LIMIT 1";
    $disposisi_result = mysqli_query($conn, $disposisi_query);
    if ($disposisi_result && mysqli_num_rows($disposisi_result) > 0) {
        $disposisi_data = mysqli_fetch_assoc($disposisi_result);
        $disposisi_file = $disposisi_data['file'];
    } else {
        $disposisi_file = null;
    }

    mysqli_free_result($result);
    if ($disposisi_result) {
        mysqli_free_result($disposisi_result);
    }
} else {
    echo "ID Peminjaman tidak tersedia.";
    exit;
}

mysqli_close($conn);
?>

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
  <link href="css/detailPeminjaman_style.css" rel="stylesheet">
</head>
<body>
<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">
    <div class="container">
      <a class="navbar-brand" href="managePeminjaman.php">SINJAM<span>UPNVJ</span></a>
    </div>  
</nav>
<br><br><br>
<div class="container">
    <br><br><br>
    <h2>Detail Peminjaman Fasilitas Universitas Pembangunan Nasional "Veteran" Jakarta</h2>
    <form method="post" action="detailPeminjaman.php" enctype="multipart/form-data">
        <div class="mb-3">
            <a href="download.php?id_pinjam=<?php echo htmlspecialchars($id_pinjam); ?>">Download KAK</a>
        </div>
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
        <div class="mb-3">
            <label for="tgl_pinjam" class="form-label">Tanggal Peminjaman</label>
            <input class="form-control" type="text" id="tgl_pinjam" value="<?php echo htmlspecialchars($tgl_pinjam); ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="tgl_pengajuan" class="form-label">Tanggal Pengajuan</label>
            <input class="form-control" type="text" id="tgl_pengajuan" value="<?php echo htmlspecialchars($tgl_pengajuan); ?>" readonly>
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
            <select class="form-select" id="status" name="status">
                <?php
                $pilstatus = ["Diproses", "Diterima", "Tidak Diterima"];
                foreach($pilstatus as $optstatus) {
                    if (isset($status) && $status === $optstatus) {
                        echo "<option value=\"$optstatus\" selected>$optstatus</option>";
                    } else {
                        echo "<option value=\"$optstatus\">$optstatus</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">File Disposisi</label>
            <input class="form-control" type="file" id="fupload" name="fupload">
            <?php if ($disposisi_file): ?>
                <p>Current file: <a href="uploads/<?php echo htmlspecialchars($disposisi_file); ?>" target="_blank"><?php echo htmlspecialchars($disposisi_file); ?></a></p>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label for="notes" class="form-label">Notes</label>
            <textarea class="form-control" id="notes" name="notes" rows="3"><?php echo htmlspecialchars($notes); ?></textarea>
        </div>
        <button type="submit" name="submit_status" class="btn btn-primary">Update Status</button>
    </form>
    <br>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

<footer class="footer-section">
    <div class="container relative">
    <div class="row">
      <div class="col-4 mt-5">
        <a href="managePeminjaman.php" style="font-weight: 650; font-size: 32px; color:#208aae">SINJAM<span style="font-weight:100; color: black;">UPNVJ</span></a>
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
