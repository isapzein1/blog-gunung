<?php
include "config/koneksi.php";

// Ambil semua artikel
$query = mysqli_query($conn, "SELECT * FROM artikel ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mountain Blog</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">🏔 Mountain Blog</a>

        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Artikel</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Galeri</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Tentang</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Kontak</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero -->
<section class="bg-success text-white text-center py-5">
    <div class="container">
        <h1>Jelajahi Keindahan Gunung Indonesia</h1>
        <p>Temukan cerita pendakian, tips, dan galeri alam.</p>
        <a href="#" class="btn btn-warning">Mulai Membaca</a>
    </div>
</section>

<!-- Artikel -->
<div class="container my-5">
    <h2 class="mb-4">Artikel Terbaru</h2>

    <div class="row">

        <?php while($data = mysqli_fetch_assoc($query)){ ?>

        <div class="col-md-6 col-lg-4 mb-4">

            <div class="card h-100 shadow-sm">
                     
                     <img src="<?php echo htmlspecialchars($data['gambar']); ?>"
     class="card-img-top"
     alt="<?php echo htmlspecialchars($data['judul']); ?>">
                     
                <div class="card-body">

                    <h5><?php echo htmlspecialchars($data['judul']); ?></h5>

                    <p>
                        <?php
                        echo substr(strip_tags($data['isi']),0,100);
                        ?>...
                    </p>

                    <small class="text-muted">
                        <?php echo htmlspecialchars($data['penulis']); ?>
                        |
                        <?php echo $data['tanggal']; ?>
                    </small>

                </div>

            </div>

        </div>

        <?php } ?>

    </div>

</div>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-3">
    © 2026 Mountain Blog
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>