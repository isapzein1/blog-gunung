<?php
include "config/koneksi.php";

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$query = mysqli_query($conn, "SELECT * FROM artikel WHERE id = $id");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    die("Artikel tidak ditemukan!");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($data['judul']); ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<nav class="navbar navbar-dark bg-success">
    <div class="container">
        <a href="index.php" class="navbar-brand">
            🏔 Mountain Blog
        </a>
    </div>
</nav>

<div class="container my-5">

    <h1><?= htmlspecialchars($data['judul']); ?></h1>

    <p class="text-muted">
        Penulis : <?= htmlspecialchars($data['penulis']); ?>
        |
        <?= $data['tanggal']; ?>
    </p>
    
    <img src="<?= htmlspecialchars($data['gambar']); ?>"
     class="img-fluid rounded mb-4"
     alt="<?= htmlspecialchars($data['judul']); ?>">

    <p style="text-align:justify;">
        <?= nl2br(htmlspecialchars($data['isi'])); ?>
    </p>

    <a href="index.php" class="btn btn-success">
        ← Kembali
    </a>

</div>

</body>
</html>