<?php
// Koneksi ke Database
$host = "localhost";
$username = "root";
$password = "";
$database = "pendaftaran_siswa";
$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// delete by ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM siswa WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: list.php");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
