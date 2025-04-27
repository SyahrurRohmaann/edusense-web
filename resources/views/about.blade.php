@extends('layouts.app')

@section('title', 'Tentang Kami - Si Udin')

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-lg-7">
            <h1 class="mb-4">Tentang Kami - Si Udin</h1>

            <p class="mb-4">
                Si Udin adalah permainan edukasi interaktif yang dirancang khusus untuk 
                membantu anak-anak belajar sambil bermain. Dengan pendekatan yang 
                menyenangkan dan penuh warna, kami menghadirkan pengalaman belajar 
                yang tidak membosankan, sehingga anak-anak bisa mengembangkan 
                keterampilan kognitif, sensorik, dan motorik dengan cara yang lebih alami.
            </p>

            <h2 class="mt-5 mb-4">Misi Kami</h2>
            <p class="mb-3">
                Kami percaya bahwa setiap anak memiliki cara unik dalam belajar. Melalui 
                permainan yang interaktif dan penuh petualangan, Si Udin hadir untuk:
            </p>

            <ul class="list-unstyled mb-5">
                <li class="mb-2">
                    <div class="d-flex align-items-start">
                        <div class="me-2 mt-1">
                            <div class="bg-success text-white" style="width: 20px; height: 20px; display: flex; align-items: center; justify-content: center;">✓</div>
                        </div>
                        <div>Membantu anak-anak mengenal bentuk, warna, huruf, dan suara dengan cara yang lebih menarik.</div>
                    </div>
                </li>
                <li class="mb-2">
                    <div class="d-flex align-items-start">
                        <div class="me-2 mt-1">
                            <div class="bg-success text-white" style="width: 20px; height: 20px; display: flex; align-items: center; justify-content: center;">✓</div>
                        </div>
                        <div>Mengembangkan rasa ingin tahu dan kreativitas mereka sejak dini.</div>
                    </div>
                </li>
                <li class="mb-2">
                    <div class="d-flex align-items-start">
                        <div class="me-2 mt-1">
                            <div class="bg-success text-white" style="width: 20px; height: 20px; display: flex; align-items: center; justify-content: center;">✓</div>
                        </div>
                        <div>Memberikan pengalaman belajar yang aman dan ramah anak, tanpa gangguan iklan berlebihan.</div>
                    </div>
                </li>
            </ul>

            <h2 class="mb-4">Kenapa Memilih Si Udin?</h2>
            <ul class="list-unstyled">
                <li class="mb-3">
                    <div class="d-flex align-items-start">
                        <div class="me-2 mt-1">
                            <div class="text-primary" style="width: 20px; height: 20px; display: flex; align-items: center; justify-content: center;">◆</div>
                        </div>
                        <div><strong>Belajar Sambil Bermain</strong> – Tidak ada lagi belajar yang membosankan! Dengan tantangan seru dan animasi interaktif, anak-anak bisa belajar dengan cara yang menyenangkan.</div>
                    </div>
                </li>
                <li class="mb-3">
                    <div class="d-flex align-items-start">
                        <div class="me-2 mt-1">
                            <div class="text-primary" style="width: 20px; height: 20px; display: flex; align-items: center; justify-content: center;">◆</div>
                        </div>
                        <div><strong>Didesain oleh Ahli & Orang Tua</strong> – Kami bekerja sama dengan pendidik dan orang tua untuk menciptakan konten yang sesuai dengan perkembangan anak.</div>
                    </div>
                </li>
                <li class="mb-3">
                    <div class="d-flex align-items-start">
                        <div class="me-2 mt-1">
                            <div class="text-primary" style="width: 20px; height: 20px; display: flex; align-items: center; justify-content: center;">◆</div>
                        </div>
                        <div><strong>Fitur Interaktif</strong> – Dari tebak gambar hingga scan flashcard, Si Udin menawarkan berbagai aktivitas yang melibatkan indera anak secara maksimal.</div>
                    </div>
                </li>
                <li class="mb-3">
                    <div class="d-flex align-items-start">
                        <div class="me-2 mt-1">
                            <div class="text-primary" style="width: 20px; height: 20px; display: flex; align-items: center; justify-content: center;">◆</div>
                        </div>
                        <div><strong>Mudah Digunakan</strong> – UI yang sederhana dan ramah anak, sehingga mereka bisa langsung bermain tanpa kebingungan.</div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="col-lg-5 d-flex align-items-center justify-content-center">
            <div class="border rounded p-3 bg-light">
                <img src="{{ asset('images/si-udin-running.png') }}" class="img-fluid" alt="Si Udin character running">
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        </svg>
                    </div>
                    <h3>Keamanan Pertama</h3>
                    <p>Aplikasi kami dirancang dengan mempertimbangkan keamanan anak-anak. Tidak ada konten berbahaya atau iklan tidak pantas.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path>
                            <polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon>
                        </svg>
                    </div>
                    <h3>Konten Edukatif</h3>
                    <p>Semua materi dalam aplikasi didesain untuk membantu perkembangan kognitif, sensorik, dan motorik anak.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                    </div>
                    <h3>Tim Kami</h3>
                    <p>Dibuat oleh tim pengembang yang berdedikasi, bekerja sama dengan pendidik dan ahli perkembangan anak.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <div class="card bg-light">
                <div class="card-body p-5">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <h2 class="mb-3">Bergabunglah dengan Komunitas Si Udin</h2>
                            <p class="mb-4">Dapatkan update terbaru, tips belajar, dan akses eksklusif ke fitur baru dengan bergabung ke newsletter kami.</p>
                            <div class="d-flex">
                                <input type="email" class="form-control" placeholder="Alamat Email Anda">
                                <button class="btn btn-primary ms-2">Berlangganan</button>
                            </div>
                        </div>
                        <div class="col-lg-4 text-center mt-4 mt-lg-0">
                            <svg width="120" height="120" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                            </svg>
                            <svg class="mx-3" width="120" height="120" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                            </svg>
                            <svg width="120" height="120" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                                <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection