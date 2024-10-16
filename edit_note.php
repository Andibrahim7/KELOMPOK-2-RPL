<?php
include 'config.php';

if (isset($_GET['id'])) {
    // Ambil id dari URL
    $id = $_GET['id'];

    // Ambil catatan dari database berdasarkan id
    $sql = "SELECT * FROM notes WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Periksa apakah catatan ditemukan
    if ($result->num_rows == 1) {
        $note = $result->fetch_assoc();
    } else {
        die("Catatan tidak ditemukan.");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Catatan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Edit Catatan</h2>

    <form action="update_note.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $note['id']; ?>">
        <input type="text" name="judul" value="<?php echo $note['judul']; ?>" required placeholder="Judul" class="form-control">
        <textarea name="catatan" required placeholder="Tulis catatan di sini..." class="form-control"><?php echo $note['catatan']; ?></textarea>
        <select name="kategori_id" class="form-control">
            <option value="1" <?php echo $note['kategori_id'] == 1 ? 'selected' : ''; ?>>Kuliah</option>
            <option value="2" <?php echo $note['kategori_id'] == 2 ? 'selected' : ''; ?>>Kantor</option>
            <option value="3" <?php echo $note['kategori_id'] == 3 ? 'selected' : ''; ?>>Pribadi</option>
            <option value="4" <?php echo $note['kategori_id'] == 4 ? 'selected' : ''; ?>>Sekolah</option>
            <!-- Tambah kategori lain sesuai kebutuhan -->
        </select>
        <button type="submit" class="btn btn-primary">Perbarui Catatan</button>
    </form>

</body>
</html>
