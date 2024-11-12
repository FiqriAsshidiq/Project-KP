<!-- resources/views/landing.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>housekeeping</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .hero-section {
            color: white;
        }
        .hero-section h1 {
            font-size: 2.5rem;
            font-weight: bold;
        }
        .pos-img {
            max-width: 100%;
            height: auto;
        }
        .logo {
            width: 45px; /* Atur ukuran logo sesuai kebutuhan */
            margin-right: 10px; /* Spasi antara logo dan teks */
        }
        .footer{
            display: flex;
            background-color: #333;
            padding: 10px;
            color: white;
            justify-content: center;
            text-align: center;
        }
        .footer i{
            font-size: 20px;
            color: aqua;
            padding: 0px 17px;
        }        

        
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container-fluid">
        <!-- Logo di pojok kiri -->
        <a class="navbar-brand" href="#">
            <span class="font-weight-bold">housekeeping</span>
        </a>

        <!-- Tombol toggle untuk navigasi di layar kecil -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu navigasi di pojok kanan -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                <li class="nav-item"><a class="nav-link btn btn-outline-primary" href="{{ route('login') }}">Masuk</a></li>
                
            </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero-section">
            <img src="{{ asset('landing_page.jpg') }}" alt="POS System" class="pos-img">
    </div>
    br

    <!-- Footer -->
    <footer>
            <div class="footer">
                <small>Copyright &copy; 2023 - Muhammad Fiqri Asshidiq
                    <br><br>
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-blogger"></i>
                    <i class="fa-brands fa-youtube"></i>
                </small>
            </div>
        </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
