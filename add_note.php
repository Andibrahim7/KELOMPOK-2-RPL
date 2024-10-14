<?php
include 'config.php';

// Ambil semua kategori dari database untuk dropdown
$sql = "SELECT * FROM categories";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Catatan</title>
    <link rel="stylesheet" href="style.css"> <!-- CSS umum -->
    <link rel="stylesheet" href="sidebar.css"> <!-- CSS untuk sidebar -->
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <h2>Menu</h2>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="add_note.php">Tambah Catatan</a></li>
                <!-- Tambahkan link lain sesuai kebutuhan -->
            </ul>
        </div>
        <div class="main-content">
            <h2>Tambah Catatan</h2>
            <form action="simpan_catatan.php" method="POST">
                <div class="form-group">
                    <label for="judul">Judul Catatan:</label>
                    <input type="text" id="judul" name="judul" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori:</label>
                    <select id="kategori" name="kategori_id" class="form-control" required>
                        <option value="">Pilih Kategori</option>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['nama_kategori']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="catatan">Isi Catatan:</label>
                    <textarea id="catatan" name="catatan" class="form-control" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Catatan</button>
                <a href="dashboard.php" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</body>
</html>
