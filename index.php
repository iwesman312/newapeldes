<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cerdas Ceria - Desa Sukamaju</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-image: url('assets/img/images.png');
            background-size: cover;
            background-attachment: fixed;
            color: #fff;
            font-family: 'Arial', sans-serif;
        }

        .navbar {
            background-color: rgba(0, 0, 0, 0.7);
        }

        .hero-section {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            min-height: 80vh;
            padding: 20px;
        }

        .hero-section img {
            max-width: 150px;
            margin-bottom: 20px;
        }

        .btn-custom {
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            color: white;
            font-size: 16px;
            margin: 10px;
            border-radius: 25px;
        }

        .btn-custom:hover {
            background-color: #000000;
        }

        footer {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 20px;
            text-align: center;
            color: #ddd;
        }

        footer a {
            color: #fff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Cerdas Ceria</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Profil Desa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Kontak</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="btn btn-custom" href="login/"><i class="fas fa-sign-in-alt"></i> Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero-section">
        <img src="assets/img/logobogor.png" alt="Logo Bogor">
        <h1 class="display-4">Cerdas Ceria</h1>
        <p class="lead">Selamat Datang di Desa Sukamaju</p>
        <div>
            <a href="surat/" class="btn btn-custom">Buat Surat</a>
            <!-- <a href="penduduk/" class="btn btn-custom">Penduduk Baru</a> -->
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Desa Sukamaju. Dibangun dengan <i class="fas fa-heart text-danger"></i> untuk masyarakat.</p>
        <p><a href="#">Kebijakan Privasi</a> | <a href="#">Syarat dan Ketentuan</a></p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
