<?php
include("config.php");

if (isset($_GET['id_pinjam']) && isset($_GET['type'])) {
    $id_pinjam = $_GET['id_pinjam'];
    $type = $_GET['type'];

    if ($type == 'kak') {
        $query = "SELECT file FROM kak WHERE id_pinjam='$id_pinjam'";
        $folder = 'KAK/';
    } 
    elseif ($type == 'disposisi') {
        $query = "SELECT file FROM disposisi WHERE id_pinjam='$id_pinjam' ORDER BY tgl_publish DESC LIMIT 1";
        $folder = 'disposisi/';
    }
    
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        $file_name = $data['file'];
        $file_path = $folder . $file_name;

        if (file_exists($file_path)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($file_path) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file_path));
            readfile($file_path);
            exit;
        } else {
            echo "File not found.";
        }
    } else {
        echo "No file found for the given ID.";
    }

    mysqli_free_result($result);
} else {
    echo "No ID specified.";
}

mysqli_close($conn);
?>
