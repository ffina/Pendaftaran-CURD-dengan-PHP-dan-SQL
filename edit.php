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

// ambil data by ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM siswa WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
} else {
    header("Location: list.php");
    exit;
}

// upadte data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $umur = $_POST['umur'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $no_telepon = $_POST['no_telepon'];

    $updateSql = "UPDATE siswa SET nama='$nama', email='$email', umur='$umur', jenis_kelamin='$jenis_kelamin', alamat='$alamat', no_telepon='$no_telepon' WHERE id=$id";

    if ($conn->query($updateSql) === TRUE) {
        header("Location: list.php");
        exit;
    } else {
        $error = "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pendaftar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            padding: 0;
            width: 500px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: bold;
        }
        input, select, textarea {
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
        }
    </style>
</head>
<body>
    <h2>Edit Data Pendaftar</h2>
    <?php if (isset($error)) { echo "<p style='color: red;'>$error</p>"; } ?>
    <form action="" method="POST">
        <label for="nama">Nama Lengkap:</label>
        <input type="text" id="nama" name="nama" value="<?php echo $row['nama']; ?>" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required>

        <label for="umur">Umur:</label>
        <input type="number" id="umur" name="umur" value="<?php echo $row['umur']; ?>" required>

        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <select id="jenis_kelamin" name="jenis_kelamin" required>
            <option value="Laki-laki" <?php echo ($row['jenis_kelamin'] == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
            <option value="Perempuan" <?php echo ($row['jenis_kelamin'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
        </select>

        <label for="registerPhone">Phone:</label>
        <input type="text" value="+62" style="width: 50px;" disabled>
        <input type="tel" name="no_telepon" value="<?php echo $row['no_telepon']; ?>" required style="width: calc(100% - 55px);"><br>

        <label for="alamat">Alamat:</label>
        <textarea id="alamat" name="alamat" required><?php echo $row['alamat']; ?></textarea>

        <input type="submit" value="Simpan Perubahan">
    </form>
</body>
</html>
