@extends('layouts.app')

@section('title', 'Si Udin - Petualangan Belajar yang Seru!')

@section('content')
<div class="container-fluid p-0">
    <div class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h1 class="game-title">Si Udin - Petualangan Belajar yang Seru!</h1>
                    <p class="game-description">
                        Si Udin, sebuah permainan interaktif yang membantu anak-anak belajar dengan cara menyenangkan.
                    </p>
                    <div class="d-flex gap-3">
                        <a href="#" class="btn btn-primary btn-lg">Mulai Bermain</a>
                        <a href="#" class="btn btn-outline-primary btn-lg">Pelajari Lebih</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('images/si-udin-hero.jpg') }}" class="hero-image img-fluid" alt="Si Udin character running">
                </div>
            </div>
        </div>
    </div>

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
                    <div class="ratio ratio-16x9">
                        <div class="bg-secondary d-flex align-items-center justify-content-center text-white">
                            <div class="text-center">
                                <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polygon points="10 8 16 12 10 16 10 8"></polygon>
                                </svg>
                                <p>Video Demo Si Udin</p>
                            </div>
                        </div>
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

    <div class="bg-primary text-white py-5">
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
@endsection