
@extends('layouts.app')

@section('title', 'Si Udin - Petualangan Belajar yang Seru!')

@section('content')
<div class="container-fluid p-0">
    <!-- Hero Section dengan Design Baru yang Lebih Modern -->
    <div class="hero-section position-relative overflow-hidden">
        <!-- Background Decoration yang Lebih Modern -->
        <div class="hero-background" style="background: linear-gradient(135deg, #37e22b, #41e16c); position: absolute; width: 100%; height: 100%; z-index: -1;"></div>
        
        <!-- Pola Geometris untuk Background -->
        <div class="geometric-pattern"></div>
        
        <!-- Judul dan Info Si Udin dengan Font Baru -->
        <div class="container position-relative z-3">
            <div class="row align-items-center" style="min-height: 600px;">
                <div class="col-lg-5 py-5">
                    <h1 class="hero-title mb-4">Si Udin - <span class="highlight-text">Petualangan</span> Belajar yang Seru!</h1>
                    <p class="hero-subtitle mb-4">Si Udin, sebuah permainan interaktif yang membantu anak-anak belajar dengan cara menyenangkan dan kreatif.</p>
                    <div class="d-flex gap-3">
                        <a href="#" class="btn btn-hero-primary btn-lg px-4 rounded-pill">Mulai Bermain</a>
                        <a href="#" class="btn btn-hero-secondary btn-lg px-4 rounded-pill">Pelajari Lebih</a>
                    </div>
                </div>
                <div class="col-lg-7">
                    <!-- Carousel Gambar Si Udin dengan Animasi Slide dan Efek 3D -->
                    <div class="position-relative hero-carousel-container">
                        <div class="floating-shapes"></div>
                        <div id="siUdinCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ asset('images/si-udin-slide1.png') }}" class="img-fluid rounded-4 shadow-lg hero-image" alt="Si Udin Petualangan">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('images/si-udin-slide5.png') }}" class="img-fluid rounded-4 shadow-lg hero-image" alt="Si Udin Matematika">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('images/si-udin-slide6.png') }}" class="img-fluid rounded-4 shadow-lg hero-image" alt="Si Udin Sains">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('images/si-udin-slide4.png') }}" class="img-fluid rounded-4 shadow-lg hero-image" alt="Si Udin Membaca">
                                </div>
                            </div>
                            <!-- Tombol Navigasi Kustom -->
                            <div class="carousel-controls">
                                <button class="carousel-control-prev custom-control" type="button" data-bs-target="#siUdinCarousel" data-bs-slide="prev">
                                    <span class="carousel-control-icon" aria-hidden="true">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <polyline points="15 18 9 12 15 6"></polyline>
                                        </svg>
                                    </span>
                                </button>
                                <button class="carousel-control-next custom-control" type="button" data-bs-target="#siUdinCarousel" data-bs-slide="next">
                                    <span class="carousel-control-icon" aria-hidden="true">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <polyline points="9 18 15 12 9 6"></polyline>
                                        </svg>
                                    </span>
                                </button>
                            </div>
                        </div>
                        <!-- Indikator Custom dengan Thumbnail -->
                        <div class="carousel-indicators-custom d-flex justify-content-center mt-4 gap-2">
                            <button type="button" data-bs-target="#siUdinCarousel" data-bs-slide-to="0" class="active" aria-current="true"></button>
                            <button type="button" data-bs-target="#siUdinCarousel" data-bs-slide-to="1"></button>
                            <button type="button" data-bs-target="#siUdinCarousel" data-bs-slide-to="2"></button>
                            <button type="button" data-bs-target="#siUdinCarousel" data-bs-slide-to="3"></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Elemen Dekoratif Modern -->
        <div class="floating-circle circle-1"></div>
        <div class="floating-circle circle-2"></div>
        <div class="floating-circle circle-3"></div>
        <div class="floating-square square-1"></div>
        <div class="floating-square square-2"></div>
    </div>

    <!-- Tambahan Style untuk Hero Section yang Diperbarui -->
    <style>
        /* Google Fonts Import */
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Quicksand:wght@400;500;600;700&display=swap');
        
        /* Global Style Resets */
        .hero-section * {
            font-family: 'Quicksand', sans-serif;
        }
        
        /* Hero Section Base */
        .hero-section {
            padding: 60px 0;
            position: relative;
            overflow: hidden;
            min-height: 700px;
        }
        
        /* Typography Styles */
        .hero-title {
            font-family: 'Nunito', sans-serif;
            font-weight: 800;
            font-size: 3.5rem;
            color: #ffffff;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.15);
            line-height: 1.2;
            letter-spacing: -0.5px;
        }
        
        .highlight-text {
            color: #FFD700;
            position: relative;
            display: inline-block;
        }
        
        .highlight-text::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 6px;
            bottom: 5px;
            left: 0;
            background-color: rgba(255, 215, 0, 0.3);
            z-index: -1;
            border-radius: 10px;
        }
        
        .hero-subtitle {
            font-size: 1.25rem;
            color: rgba(255, 255, 255, 0.9);
            font-weight: 500;
            max-width: 90%;
            line-height: 1.6;
        }
        
        /* Button Styles */
        .btn-hero-primary {
            background: linear-gradient(45deg, #FF6B6B, #FF8E53);
            border: none;
            font-weight: 600;
            padding: 12px 28px;
            box-shadow: 0 10px 20px rgba(255, 107, 107, 0.3);
            transition: all 0.3s ease;
        }
        
        .btn-hero-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 25px rgba(255, 107, 107, 0.4);
            background: linear-gradient(45deg, #FF5252, #FF7043);
        }
        
        .btn-hero-secondary {
            background-color: transparent;
            border: 2px solid #ffffff;
            color: #ffffff;
            font-weight: 600;
            padding: 12px 28px;
            transition: all 0.3s ease;
        }
        
        .btn-hero-secondary:hover {
            background-color: rgba(255, 255, 255, 0.15);
            transform: translateY(-3px);
            color: #ffffff;
        }
        
        /* Carousel & Image Styles */
        .hero-carousel-container {
            padding: 20px;
            position: relative;
        }
        
        .carousel-item img.hero-image {
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            transition: transform 0.8s ease, box-shadow 0.8s ease;
            transform-style: preserve-3d;
            max-height: 500px;
            object-fit: cover;
        }
        
        .carousel-item.active img.hero-image {
            transform: rotateY(0deg) translateZ(0);
            animation: floatImage 6s ease-in-out infinite;
        }
        
        @keyframes floatImage {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
            100% { transform: translateY(0px); }
        }
        
        /* Custom Carousel Controls */
        .carousel-controls {
            position: absolute;
            width: 100%;
            top: 50%;
            transform: translateY(-50%);
            z-index: 5;
            display: flex;
            justify-content: space-between;
            padding: 0 20px;
        }
        
        .custom-control {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.9);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
            opacity: 0.8;
        }
        
        .custom-control:hover {
            background-color: #ffffff;
            opacity: 1;
            transform: scale(1.1);
        }
        
        .carousel-control-icon {
            color: #4169E1;
            width: 24px;
            height: 24px;
        }
        
        /* Custom Indicators */
        .carousel-indicators-custom button {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.5);
            border: none;
            margin: 0 5px;
            transition: all 0.3s ease;
        }
        
        .carousel-indicators-custom button.active {
            background-color: #ffffff;
            transform: scale(1.3);
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.7);
        }
        
        /* Background Effects */
        .geometric-pattern {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23ffffff' fill-opacity='0.05' fill-rule='evenodd'/%3E%3C/svg%3E");
            opacity: 0.5;
        }
        
        /* Floating Elements Animation */
        .floating-circle {
            position: absolute;
            border-radius: 50%;
            opacity: 0.2;
            z-index: 0;
        }
        
        .circle-1 {
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(255,255,255,0.3) 0%, rgba(255,255,255,0) 70%);
            top: -100px;
            right: 10%;
            animation: float 15s ease-in-out infinite;
        }
        
        .circle-2 {
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, rgba(255,215,0,0.4) 0%, rgba(255,215,0,0) 70%);
            bottom: 5%;
            left: 5%;
            animation: float 20s ease-in-out infinite reverse;
        }
        
        .circle-3 {
            width: 150px;
            height: 150px;
            background: radial-gradient(circle, rgba(255,105,180,0.3) 0%, rgba(255,105,180,0) 70%);
            top: 20%;
            left: 15%;
            animation: float 18s ease-in-out infinite 2s;
        }
        
        .floating-square {
            position: absolute;
            transform: rotate(45deg);
            opacity: 0.15;
            z-index: 0;
        }
        
        .square-1 {
            width: 100px;
            height: 100px;
            background-color: #ff3700;
            bottom: 10%;
            right: 15%;
            animation: float 12s ease-in-out infinite 1s;
        }
        
        .square-2 {
            width: 70px;
            height: 70px;
            background-color: #ff0000;
            top: 30%;
            right: 25%;
            animation: float 14s ease-in-out infinite 3s;
        }
        
        @keyframes float {
            0% { transform: translate(0, 0) rotate(0deg); }
            25% { transform: translate(10px, -15px) rotate(5deg); }
            50% { transform: translate(0, 0) rotate(0deg); }
            75% { transform: translate(-10px, 15px) rotate(-5deg); }
            100% { transform: translate(0, 0) rotate(0deg); }
        }
        
        /* Floating Shapes in Carousel Container */
        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            overflow: hidden;
            z-index: -1;
        }
        
        .floating-shapes::before,
        .floating-shapes::after {
            content: '';
            position: absolute;
            width: 40px;
            height: 40px;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.05);
            animation: shapeFloat 20s linear infinite;
        }
        
        .floating-shapes::before {
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }
        
        .floating-shapes::after {
            bottom: 30%;
            right: 15%;
            width: 60px;
            height: 60px;
            animation-delay: 5s;
            animation-duration: 15s;
        }
        
        @keyframes shapeFloat {
            0% { transform: translate(0, 0) rotate(0deg); opacity: 0.1; }
            25% { transform: translate(100px, 50px) rotate(90deg); opacity: 0.2; }
            50% { transform: translate(200px, 0) rotate(180deg); opacity: 0.1; }
            75% { transform: translate(100px, -50px) rotate(270deg); opacity: 0.2; }
            100% { transform: translate(0, 0) rotate(360deg); opacity: 0.1; }
        }
        
        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-subtitle {
                font-size: 1.1rem;
            }
            
            .carousel-item img.hero-image {
                max-height: 400px;
            }
        }
        
        @media (max-width: 768px) {
            .hero-section {
                min-height: auto;
                padding: 40px 0;
            }
            
            
            .hero-title {
                font-size: 2rem;
            }
            
            .hero-subtitle {
                font-size: 1rem;
            }
            
            .btn-hero-primary, .btn-hero-secondary {
                padding: 10px 20px;
                font-size: 0.9rem;
            }
            
            .custom-control {
                width: 40px;
                height: 40px;
            }
        }
    </style>
    
    <!-- Script khusus untuk carousel dan efek -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inisialisasi carousel dengan efek fade
            var mainCarousel = new bootstrap.Carousel(document.getElementById('siUdinCarousel'), {
                interval: 5000,
                wrap: true,
                touch: true
            });
            
            // Tambahkan efek 3D pada hover gambar carousel
            const carouselImages = document.querySelectorAll('.hero-image');
            carouselImages.forEach(img => {
                img.addEventListener('mousemove', function(e) {
                    const rect = this.getBoundingClientRect();
                    const x = ((e.clientX - rect.left) / rect.width - 0.5) * 10;
                    const y = ((e.clientY - rect.top) / rect.height - 0.5) * 10;
                    
                    this.style.transform = `perspective(1000px) rotateY(${x}deg) rotateX(${-y}deg) scale3d(1.02, 1.02, 1.02)`;
                });
                
                img.addEventListener('mouseleave', function() {
                    this.style.transform = 'perspective(1000px) rotateY(0) rotateX(0) scale3d(1, 1, 1)';
                    // Kembali ke animasi mengambang setelah mouse leave jika carousel item aktif
                    if (this.closest('.carousel-item').classList.contains('active')) {
                        setTimeout(() => {
                            this.style.animation = 'floatImage 6s ease-in-out infinite';
                        }, 300);
                    }
                });
            });
            
            // Perbarui efek active pada tombol indikator carousel
            const siUdinCarousel = document.getElementById('siUdinCarousel');
            siUdinCarousel.addEventListener('slide.bs.carousel', function(event) {
                const indicators = document.querySelectorAll('.carousel-indicators-custom button');
                indicators.forEach(indicator => indicator.classList.remove('active'));
                indicators[event.to].classList.add('active');
            });
            
            // Tambahkan efek parallax saat scroll
            window.addEventListener('scroll', function() {
                const heroSection = document.querySelector('.hero-section');
                const scrollPosition = window.scrollY;
                
                if (scrollPosition <= heroSection.offsetHeight) {
                    const translateY = scrollPosition * 0.3;
                    document.querySelector('.hero-background').style.transform = `translateY(${translateY}px)`;
                    document.querySelector('.geometric-pattern').style.transform = `translateY(${translateY * 0.5}px)`;
                }
            });
        });
    </script>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="M12 8v4l3 3"></path>
                            </svg>
                        </div>
                        <h3>Belajar Sambil Bermain</h3>
                        <p>Nikmati petualangan seru bersama Si Udin sambil memahami konsep-konsep pembelajaran dasar.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M12 2 L2 7 L12 12 L22 7 L12 2"></path>
                                <path d="M2 17 L12 22 L22 17"></path>
                                <path d="M2 12 L12 17 L22 12"></path>
                            </svg>
                        </div>
                        <h3>Berbagai Level</h3>
                        <p>Tersedia berbagai level permainan yang akan menantang kemampuan anak secara bertahap.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                            </svg>
                        </div>
                        <h3>Aman untuk Anak</h3>
                        <p>Dirancang khusus untuk anak-anak dengan konten edukatif yang aman dan informatif.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Keunggulan dengan Gambar Slideshow -->
    <div class="bg-light py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h2>Keunggulan Si Udin</h2>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item bg-transparent">✓ Meningkatkan kemampuan berpikir kritis</li>
                        <li class="list-group-item bg-transparent">✓ Mengembangkan kemampuan memecahkan masalah</li>
                        <li class="list-group-item bg-transparent">✓ Memperkuat pengetahuan dasar akademik</li>
                        <li class="list-group-item bg-transparent">✓ Bermain sambil belajar</li>
                        <li class="list-group-item bg-transparent">✓ Dikembangkan oleh ahli pendidikan</li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <div id="keunggulanCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('images/si-udin-slide7.png') }}" class="d-block w-100 rounded" alt="Fitur Si Udin 1">
                                <div class="carousel-caption d-none d-md-block">

                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('images/si-udin-slide5.png') }}" class="d-block w-100 rounded" alt="Fitur Si Udin 2">
                                <div class="carousel-caption d-none d-md-block">
                                    
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('images/si-udin-slide8.png') }}" class="d-block w-100 rounded" alt="Fitur Si Udin 3">
                                <div class="carousel-caption d-none d-md-block">
                                    
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#keunggulanCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#keunggulanCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Galeri Petualangan Si Udin -->
    <div class="container my-5">
        <div class="text-center mb-5">
            <h2>Galeri Petualangan Si Udin</h2>
            <p>Jelajahi berbagai petualangan seru bersama Si Udin</p>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="gallery-slider">
                    <div id="galleryCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="{{ asset('images/gallery1.jpg') }}" class="img-fluid rounded mb-4" alt="Gallery 1">
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{ asset('images/gallery2.jpg') }}" class="img-fluid rounded mb-4" alt="Gallery 2">
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{ asset('images/gallery3.jpg') }}" class="img-fluid rounded mb-4" alt="Gallery 3">
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="{{ asset('images/gallery4.jpg') }}" class="img-fluid rounded mb-4" alt="Gallery 4">
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{ asset('images/gallery5.jpg') }}" class="img-fluid rounded mb-4" alt="Gallery 5">
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{ asset('images/gallery6.jpg') }}" class="img-fluid rounded mb-4" alt="Gallery 6">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#galleryCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#galleryCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="text-center mb-5">
            <h2>Testimoni Orang Tua</h2>
            <p>Apa kata mereka tentang Si Udin?</p>
        </div>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex mb-3">
                            <div class="text-warning">
                                ★★★★★
                            </div>
                        </div>
                        <p>"Anak saya sangat menyukai Si Udin. Dia belajar banyak hal sambil bersenang-senang."</p>
                        <div class="d-flex align-items-center mt-3">
                            <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">R</div>
                            <div class="ms-3">
                                <h6 class="mb-0">Rina</h6>
                                <small class="text-muted">Ibu dari Alex</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex mb-3">
                            <div class="text-warning">
                                ★★★★★
                            </div>
                        </div>
                        <p>"Si Udin membuat anak saya lebih tertarik untuk belajar. Sangat direkomendasikan!"</p>
                        <div class="d-flex align-items-center mt-3">
                            <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">B</div>
                            <div class="ms-3">
                                <h6 class="mb-0">Budi</h6>
                                <small class="text-muted">Ayah dari Maya</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex mb-3">
                            <div class="text-warning">
                                ★★★★★
                            </div>
                        </div>
                        <p>"Permainan yang edukatif dan menghibur. Nilai akademik anak saya meningkat sejak bermain Si Udin."</p>
                        <div class="d-flex align-items-center mt-3">
                            <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">S</div>
                            <div class="ms-3">
                                <h6 class="mb-0">Siti</h6>
                                <small class="text-muted">Ibu dari Dimas</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="text-white py-5" style="background-color: #12B886;">
        <div class="container text-center">
            <h2 class="mb-4">Mulai Petualangan Belajar Bersama Si Udin Sekarang!</h2>
            <p class="mb-4">Tersedia di berbagai platform untuk kemudahan akses belajar anak Anda.</p>
            <div class="d-flex justify-content-center gap-3">
                <a href="#" class="btn btn-light btn-lg">Download Sekarang</a>
                <a href="#" class="btn btn-outline-light btn-lg">Pelajari Lebih</a>
            </div>
        </div>
    </div>
</div>

<!-- Script untuk animasi carousel -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Inisialisasi semua carousel
        var carousels = document.querySelectorAll('.carousel');
        carousels.forEach(function(carousel) {
            new bootstrap.Carousel(carousel, {
                interval: 5000,
                wrap: true
            });
        });
    });
</script>
@endsection