<?php
session_start(); // Mulai sesi

// Cek apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    // Jika belum login, arahkan ke halaman login
    header("Location: login.php");
    exit();
}

// Jika sudah login, tampilkan dashboard
?>

<?php
include 'config.php';

// Ambil semua kategori dari database untuk dropdown
$sql = "SELECT * FROM categories";
$result = $conn->query($sql);

// Cek apakah ada kategori yang dipilih
$selectedCategory = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : '';
$query = "SELECT notes.*, categories.nama_kategori FROM notes 
          LEFT JOIN categories ON notes.kategori_id = categories.id";

if ($selectedCategory) {
    $query .= " WHERE notes.kategori_id = " . intval($selectedCategory);
}

$notesResult = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Catatan</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="sidebar.css">
    <style>
        .card {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 16px;
            margin-bottom: 20px;
            transition: transform 0.2s;
        }

        .card:hover {
            transform: scale(1.02);
        }

        .card h3 {
            margin: 0;
        }

        .card .card-footer {
            margin-top: 10px;
        }

        .button {
            padding: 5px 10px;
            border: none;
            background-color: #007bff;
            color: white;
            border-radius: 3px;
            text-decoration: none;
        }

        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <h2>Menu</h2>
            <ul>
                <li><a href="dashboard.php" class="active">Dashboard</a></li>
                <li><a href="add_note.php">Tambah Catatan</a></li>
                <li><a href="login.php">Keluar</a></li>
            </ul>
        </div>
        <div class="main-content">
            <h2>Dashboard Catatan</h2>
            <form method="GET" action="dashboard.php">
                <div class="form-group">
                    <label for="kategori">Pilih Kategori:</label>
                    <select id="kategori" name="kategori_id" class="form-control">
                        <option value="">Semua Kategori</option>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <option value="<?php echo $row['id']; ?>" <?php echo ($row['id'] == $selectedCategory) ? 'selected' : ''; ?>>
                                <?php echo $row['nama_kategori']; ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>
            <h4 class="mt-4">Catatan Tersimpan:</h4>
            <div id="savedNotes">
                <?php if ($notesResult->num_rows > 0): ?>
                    <div class="notes-container">
                        <?php while ($note = $notesResult->fetch_assoc()): ?>
                            <div class="card">
                                <h3><?php echo $note['judul']; ?></h3>
                                <p><?php echo $note['catatan']; ?></p>
                                <p><strong>Kategori:</strong> <?php echo $note['nama_kategori']; ?></p>
                                <p><strong>Tanggal:</strong> <?php echo $note['tanggal']; ?></p>
                                <div class="card-footer">
                                    <a href="edit_note.php?id=<?php echo $note['id']; ?>" class="button">Edit</a>
                                    <a href="hapus_note.php?id=<?php echo $note['id']; ?>" class="button" style="background-color: red;">Hapus</a>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php else: ?>
                    <p>Tidak ada catatan ditemukan.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
