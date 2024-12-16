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

// ambil data
$sql = "SELECT * FROM siswa";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pendaftar</title>
    <style>
        body {
            background-color: #ff94b852;
            font-family: Arial, sans-serif;
            margin: 30px;
            padding: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #fff;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color:rgba(219, 105, 122, 0.819);
        }
        a {
            text-decoration: none;
            color: white;
            padding: 5px 10px;
            background-color: #4CAF50;
            border-radius: 5px;
        }
        .delete-btn {
            background-color:rgb(247, 83, 71);
        }
        .edit-btn {
            background-color:rgb(87, 170, 238);
        }
        .back-link {
            display: block;
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
        }
        .back-link a {
            background-color:rgba(219, 105, 122, 0);
            text-decoration: none;
            color:rgba(219, 105, 122, 0.819);
        }
        .back-link a:hover {
            color:rgba(219, 105, 122, 0.91);
        }
    </style>
</head>
<body>
    <h2>Daftar Pendaftar</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Umur</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>No. Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                $no = 1;
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$no}</td>
                            <td>{$row['nama']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['umur']}</td>
                            <td>{$row['jenis_kelamin']}</td>
                            <td>{$row['alamat']}</td>
                            <td>{$row['no_telepon']}</td>
                            <td>
                                <a href='edit.php?id={$row['id']}' class='edit-btn'>Edit</a>
                                <a href='delete.php?id={$row['id']}' class='delete-btn'>Hapus</a>
                            </td>
                        </tr>";
                    $no++;
                }
            } else {
                echo "<tr><td colspan='8'>Tidak ada pendaftar.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <div class="back-link">
        <a href="index.php">Kembali ke Beranda</a>
    </div>
</body>
</html>
