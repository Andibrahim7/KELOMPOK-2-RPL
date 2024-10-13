<?php
include 'koneksi.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CatatanKu</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            display: flex; /* Mengatur body untuk flexbox */
            height: 100vh; /* Tinggi penuh untuk menampilkan navbar */
            margin: 0;
            background-color: #f1f1f1; /* Warna latar belakang yang lembut */
        }
        .sidebar {
            min-width: 250px; /* Lebar minimum sidebar */
            background-color: #007bff; /* Warna sidebar */
            padding: 20px; /* Padding untuk sidebar */
            color: white; /* Warna teks sidebar */
        }
        .sidebar a {
            color: white; /* Warna teks link */
            padding: 10px; /* Padding untuk link */
            text-decoration: none; /* Menghilangkan garis bawah */
            display: block; /* Membuat link menjadi blok */
            transition: background-color 0.3s; /* Efek transisi saat hover */
        }
        .sidebar a:hover {
            background-color: #0056b3; /* Warna saat hover */
        }
        .content {
            flex: 1; /* Mengisi sisa ruang di halaman */
            padding: 20px; /* Padding untuk konten */
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2>catatanKu</h2>
        <a href="#">Home</a>
        <a href="catatan.php">Catatan</a>
        <a href="#">Tentang</a>
        <a href="#">Kontak</a>
    </div>

    <!-- Konten Utama -->
    <div class="content">
        <h1>Selamat Datang Di CatatanKu</h1>
        <div class="card" style="width: 18rem;">
            <img src="download.jpeg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">CatatanKu</h5>
              <p class="card-text">Ini merupakan catatan berbasis web</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>

    
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.11/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

