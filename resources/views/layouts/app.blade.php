<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'Si Udin - Petualangan Belajar yang Seru!')</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    
   x <!-- Styles -->
   @vite(['resources/sass/app.scss', 'resources/js/app.js'])

   <style>
       .hero-section {
           background-color: #12B886; /* Warna hijau muda */
           padding: 80px 0;
           margin-bottom: 2rem;
           border-radius: 0 0 15px 15px;
       }
   </style>
   @livewireStyles
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <svg width="30" height="30" viewBox="0 0 30 30" class="me-2">
                        <polygon points="15,0 30,15 15,30 0,15" fill="#000" />
                    </svg>
                    Edusense
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/about') }}">About Us</a>
                        </li>
                    </ul>
                    <div class="d-flex">
                        <a href="{{ url('/login') }}" class="btn btn-success me-2">Sign in</a>
                        <a href="{{ url('/download') }}" class="btn btn-outline-primary">Download</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="bg-light mt-5 py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Si Udin</h5>
                    <p>Permainan interaktif untuk belajar dengan cara menyenangkan.</p>
                </div>
                <div class="col-md-4">
                    <h5>Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Features</a></li>
                        <li><a href="#">Store</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Contact</h5>
                    <p>Email: info@siudin.com</p>
                    <p>Phone: +62 123 456 789</p>
                </div>
            </div>
            <hr>
            <p class="text-center">&copy; {{ date('Y') }} Si Udin. All rights reserved.</p>
        </div>
    </footer>
    @livewireScripts
</body>
</html>