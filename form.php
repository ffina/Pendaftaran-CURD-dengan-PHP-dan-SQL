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

// form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $umur = $_POST['umur'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $no_telepon = $_POST['no_telepon'];

    $sql = "INSERT INTO siswa (nama, email, umur, jenis_kelamin, alamat, no_telepon) 
            VALUES ('$nama', '$email', '$umur', '$jenis_kelamin', '$alamat', '$no_telepon')";

    if ($conn->query($sql) === TRUE) {
        $pesan = "Pendaftaran berhasil!";
    } else {
        $pesan = "Kesalahan: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Siswa Baru</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ff94b852;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin-top: 80px;
        }
        .main {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            padding: 20px;
            width: 400px;
        }
        h2 {
            color: rgba(219, 105, 122, 0.819);
            margin-bottom: 20px;
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: bold;
        }
        input, textarea, select {
            width: 100%;
            margin-bottom: 15px;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        input[type="submit"] {
            padding: 10px;
            border-radius: 10px;
            border: none;
            background-color: rgba(219, 105, 122, 0.819);
            color: white;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }
        .back-link {
            display: block;
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
        }
        .back-link a {
            text-decoration: none;
            color:rgba(219, 105, 122, 0.819);
        }
        ::placeholder {
            font-family: Arial, sans-serif;
            color: #aaa;
        }
    </style>
</head>
<body>

    <div class="main">
        <h2>Pendaftaran Siswa Baru</h2>
        <?php if (isset($pesan)) { echo "<p style='color: green;'>$pesan</p>"; } ?>
        <form action="" method="POST">
            <label for="nama">Nama Lengkap:</label>
            <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Masukkan email" required>

            <label for="umur">Umur:</label>
            <input type="number" id="umur" name="umur" placeholder="Masukkan umur" required>

            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select name="jenis_kelamin" id="jenis_kelamin" required>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>

            <label for="alamat">Alamat:</label>
            <textarea id="alamat" name="alamat" placeholder="Masukkan alamat lengkap" rows="3" required></textarea>

            <label for="no_telepon">No. Telepon:</label>
            <input type="text" id="no_telepon" name="no_telepon" placeholder="Masukkan nomor telepon" required>

            <input type="submit" value="Daftar">
        </form>

        <div class="back-link">
            <a href="index.php">Kembali ke Beranda</a>
        </div>
    </div>

</body>
</html>
