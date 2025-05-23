@extends('layouts.nav')

@section('title', 'Dashboard')

@section('page-title', 'Dashboard')

@section('additional-styles')
    <style>
        .dashboard-content {
            padding: 0 !important;
            /* Menghilangkan padding tambahan */
        }

        /* Stats Cards Styling */
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-bottom: 20px;
            width: 100%;
        }

        .stat-card {
            background-color: white;
            border-radius: 8px;
            padding: 12px;
            box-shadow: 0 1px 5px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
        }

        .stat-icon {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            margin-right: 12px;
            flex-shrink: 0;
        }

        .purple {
            background-color: rgba(187, 143, 206, 0.7);
        }

        .green {
            background-color: rgba(163, 203, 163, 0.7);
        }

        .yellow {
            background-color: rgba(241, 196, 15, 0.3);
        }

        .stat-info {
            flex-grow: 1;
            min-width: 0;
            /* Penting untuk responsif */
        }

        .stat-label {
            font-size: 0.85rem;
            color: #666;
            margin-bottom: 4px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .stat-value {
            font-size: 1.3rem;
            font-weight: bold;
            color: #333;
        }

        .stat-subtext {
            font-size: 0.75rem;
            color: #888;
            margin-top: 4px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* Graph Container */
        .graph-container {
            background-color: white;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 1px 5px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
            width: 100%;
        }

        .graph-container h2 {
            margin-top: 0;
            margin-bottom: 12px;
            font-size: 1rem;
            color: #388e3c;
            display: flex;
            align-items: center;
        }

        .graph-container h2::before {
            content: "📊";
            margin-right: 8px;
        }

        .performance-graph {
            height: 180px;
            background-color: #f9f9f9;
            border-radius: 4px;
        }

        /* Recent Activity Table */
        .recent-activity {
            background-color: white;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 1px 5px rgba(0, 0, 0, 0.05);
            width: 100%;
            overflow-x: auto;
            /* Untuk tabel responsif */
        }

        .recent-activity h2 {
            margin-top: 0;
            margin-bottom: 12px;
            font-size: 1rem;
            color: #388e3c;
            display: flex;
            align-items: center;
        }

        .recent-activity h2::before {
            content: "🕒";
            margin-right: 8px;
        }

        .activity-table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        .activity-table th,
        .activity-table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .activity-table th {
            background-color: #f1fdf2;
            color: #2e7d32;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .activity-table tbody tr:hover {
            background-color: #f9f9f9;
        }

        /* Dashboard section container untuk aliran yang lebih baik */
        .dashboard-section {
            width: 100%;
            box-sizing: border-box;
        }

        /* Media queries untuk responsivitas pada viewport yang berbeda */
        @media (max-width: 992px) {
            .stats-container {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .stats-container {
                grid-template-columns: 1fr;
            }
        }

        /* Pastikan content tidak melebihi sidebar */
        .main-content {
            max-width: calc(100vw - 200px);
            overflow-x: hidden;
        }

        .sidebar-collapsed+.main-content {
            max-width: calc(100vw - 60px);
        }

        @media (max-width: 768px) {
            .main-content {
                max-width: 100vw;
            }
        }
    </style>
@endsection

@section('content')
    <div class="dashboard-section">
        <!-- Stats Cards -->
        <div class="stats-container">
            <div class="stat-card">
                <div class="stat-icon purple"></div>
                <div class="stat-info">
                    <div class="stat-label">Total Pengguna</div>
                    <div class="stat-value">{{ $totalPengguna }}</div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon green"></div>
                <div class="stat-info">
                    <div class="stat-label">Total Soal</div>
                    <div class="stat-value">{{ $totalSoal }}</div>
                    <div class="stat-subtext">Added a few hours ago</div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon yellow"></div>
                <div class="stat-info">
                    <div class="stat-label">Performa Rata-rata</div>
                    <div class="stat-value">{{ round($rataRataSkor) }}</div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-info">
                    @foreach ($aktivitasTerbaru as $aktivitas)
                        <div class="stat-label">Aktivitas Terbaru</div>
                        <div class="stat-subtext">{{ $aktivitas->nama_anak }} menyelesaikan Tugas hari ini</div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Performance Graph -->
        <div class="performance-graph" style="position: relative;">
            <!-- Detail angka dinamis -->
            <div id="latestScore"
                style="position: absolute; top: 10px; right: 20px; font-size: 1.2rem; font-weight: bold; color: #4CAF50;">
                Loading...
            </div>
            <div id="highestScore"
                style="position: absolute; margin-top: 25px; top: 10px; right: 20px; font-size: 1.2rem; font-weight: bold; color: #4CAF50;">
                Loading...
            </div>

            <!-- Graph area -->
            <canvas id="performanceChart" width="100%" height="18"></canvas>
        </div>

        <!-- Recent Activity Table -->
        <div class="recent-activity">
            <h2>Aktivitas Terbaru Anak</h2>
            <div class="table-responsive">
                <table class="activity-table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Permainan</th>
                            <th>Skor</th>
                            <th>Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($aktivitasTerbaru as $aktivitas)
                            <tr>
                                <td>{{ $aktivitas->nama_anak }}</td>
                                <td>{{ $aktivitas->permainan ?? '-' }}</td>
                                <td>{{ $aktivitas->skor }}</td>
                                <td>{{ $aktivitas->waktu }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Script untuk memastikan responsivitas
        function adjustContentWidth() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('main-content');

            if (sidebar && mainContent) {
                const sidebarWidth = sidebar.offsetWidth;
                mainContent.style.maxWidth = `calc(100vw - ${sidebarWidth}px)`;
            }
        }

        // Jalankan saat halaman dimuat dan saat ukuran window berubah
        window.addEventListener('load', adjustContentWidth);
        window.addEventListener('resize', adjustContentWidth);

        // Tambahan: jalankan juga ketika sidebar toggle
        document.getElementById('navbar').addEventListener('click', function() {
            // Beri waktu untuk animasi sidebar selesai
            setTimeout(adjustContentWidth, 300);
        });

        const labels = {!! json_encode($performaMingguan->pluck('tanggal')) !!};
        const dataPoints = {!! json_encode($performaMingguan->pluck('rata_rata')) !!};
        const sumAct = {!! json_encode($performaMingguan->pluck('total_aktivitas')) !!};

        // Tampilkan skor terakhir
        const latestScoreElement = document.getElementById('latestScore');
        const latestScore = dataPoints[dataPoints.length - 1];
        latestScoreElement.innerText = `Skor Terbaru: ${latestScore} %`;
        const highestScoreElement = document.getElementById('highestScore');
        const highestScore = Math.max(...dataPoints); // Ambil nilai maksimum dari array
        highestScoreElement.innerText = `Skor Tertinggi: ${highestScore} %`;

        const ctx = document.getElementById('performanceChart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total Aktivitas',
                    data: sumAct,
                    borderColor: '#4CAF50',
                    backgroundColor: 'rgba(76, 175, 80, 0.2)',
                    fill: true,
                    tension: 0.3,
                    pointBackgroundColor: '#4CAF50'
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1 // Karena aktivitas biasanya dalam angka bulat
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return 'Rata-rata Skor: ' + context.formattedValue + ' %';
                            }
                        }
                    }
                }
            }
        });
    </script>


@endsection
