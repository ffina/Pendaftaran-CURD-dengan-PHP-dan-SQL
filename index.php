<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
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
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            width: 70%;
            padding: 30px;
        }

        .left {
            flex: 1;
            padding: 20px;
        }

        .right {
            flex: 1;
            padding: 20px;
            text-align: center;
        }

        .right h2 {
            color: rgba(219, 105, 122, 0.819);
            margin-bottom: 50px;
        }

        .right a {
            display: block;
            padding: 15px;
            background-color: rgba(219, 105, 122, 0.819);
            color: white;
            text-decoration: none;
            margin-bottom: 10px;
            font-size: 18px;
            border-radius: 5px;
        }

        .right a:hover {
            background-color:rgba(245, 177, 200, 0.86);
        }

        img {
            width: 100%;
            max-width: 350px;
            border-radius: 10px;
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- left -->
        <div class="left">
            <img src="https://animasistudio.com/wp-content/uploads/2023/12/Cara-Belajar-Lebih-Mudah-dengan-Media-Pembelajaran-Berbasis-Animasi-1024x683.jpg" alt="Pendaftaran Siswa"> <!-- Ganti dengan path gambar Anda -->
        </div>

        <!-- right -->
        <div class="right">
            <h2>Selamat Datang</h2>
            <a href="form.php">Pendaftaran</a>
            <a href="list.php">Daftar Siswa</a>
        </div>
    </div>

</body>
</html>
