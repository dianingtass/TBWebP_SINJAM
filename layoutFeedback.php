<?php
include "authAdmin.php";
include "config.php"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />
  <link rel="shortcut icon" href="favicon.png">

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link href="css/tiny-slider.css" rel="stylesheet">
</head>
<body>
<?php
$currentPage = "layoutFeedback.php";
include "navbarAdmin.php"; 
?><br><br>

    <div class="container">
        <h1 style="font-size: 32px; font-family: 'Gotham';">Feedback Mahasiswa</h1><br>
        <?php 
        $query = "SELECT id_user, nama, feedback FROM feedback ORDER BY id_feedback DESC";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            // Tambahkan CSS untuk tampilan bubble feedback
            echo '<style>
                .feedback-container {
                    max-width: 600px;
                    margin: 20px auto;
                    font-family: Open Sans;
                }
                .feedback-item {
                    background-color: #208aae !important;
                    border-radius: 10px;
                    padding: 10px;
                    margin-bottom: 20px;
                    box-shadow: 0 0 10px rgba(0,0,0,0.1);
                }
                .feedback-item h4 {
                    margin: 0;
                    padding: 0;
                    font-size: 15px;
                    color: #FFFFFF;
                }
                .feedback-item p {
                    margin: 10px 0 0 0;
                    padding: 0;
                    color: #FFFFFF;
                    font-size: 20px;
                }
            </style>';
        
            echo '<div>';
            while ($row = $result->fetch_assoc()) {
                echo '<div class="feedback-item">';
                echo '<h4>' . htmlspecialchars($row['nama']) . ' - ' . htmlspecialchars($row['id_user']) . '</h4>';
                echo '<p>' . nl2br(htmlspecialchars($row['feedback'])) . '</p>';
                echo '</div>';
            }
            echo '</div>';
        } else {
            echo "Belum ada Umpan Balik.";
        }
        
        $conn->close();
        ?>
    </div>
    <br>
    <?php include "footerAdmin.php"?>
</body>
</html>