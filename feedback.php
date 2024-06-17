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
<?php include "navbar.php" ?>
    <br><br><br>

<div class="container">
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
          <button type="submit" name="submit" class="btn btn-primary">Kirim Feedback</button>
        </form>
      </div>
    </div>
  </div>
</div>
</body>

<?php include "footer.php" ?>

</html>
