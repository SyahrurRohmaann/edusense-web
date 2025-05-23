@extends('layouts.navuser')

@section('title', 'Dashboard')

@section('page-title', 'Dashboard')

@section('additional-styles')
<style>
    .dashboard-content {
        padding: 0 !important; /* Menghilangkan padding tambahan */
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
        min-width: 0; /* Penting untuk responsif */
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
        overflow-x: auto; /* Untuk tabel responsif */
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

    .sidebar-collapsed + .main-content {
        max-width: calc(100vw - 60px);
    }

    @media (max-width: 768px) {
        .main-content {
            max-width: 100vw;
        }
    }

    /* Additional styles for dashboard based on image */
    .welcome-container {
        margin-bottom: 20px;
        padding: 0 15px;
    }

    .welcome-heading {
        color: #1a472a;
        font-size: 1.5rem;
        margin-bottom: 5px;
    }

    .user-info {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .user-name {
        color: #2e7d32;
        font-size: 1.75rem;
        font-weight: bold;
        margin-top: 0;
    }

    .user-level {
        color: #888;
        font-size: 0.9rem;
        margin-left: 5px;
    }

    .avatar-container {
        width: 80px;
        height: 80px;
        overflow: hidden;
        border-radius: 50%;
    }

    .avatar-img {
        width: 100%;
        height: auto;
    }

    .recent-game {
        background-color: white;
        border-radius: 8px;
        padding: 12px;
        box-shadow: 0 1px 5px rgba(0, 0, 0, 0.05);
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .game-info {
        display: flex;
        align-items: center;
    }

    .game-icon {
        width: 40px;
        height: 40px;
        margin-right: 15px;
        background-color: #f0f0f0;
        border-radius: 4px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .game-details h3 {
        margin: 0;
        font-size: 1rem;
        color: #333;
    }

    .game-details p {
        margin: 3px 0 0;
        font-size: 0.8rem;
        color: #666;
    }

    .stat-cards-row {
        display: flex;
        gap: 15px;
        margin-bottom: 20px;
    }

    .stat-box {
        flex: 1;
        background-color: white;
        border-radius: 8px;
        padding: 15px;
        box-shadow: 0 1px 5px rgba(0, 0, 0, 0.05);
        text-align: center;
    }

    .stat-box h3 {
        margin: 0 0 5px;
        font-size: 0.9rem;
        color: #666;
    }

    .stat-box .value {
        font-size: 1.8rem;
        font-weight: bold;
        color: #333;
    }

    .tips-card {
        background-color: #e8f5e9;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
    }

    .tips-icon {
        width: 50px;
        height: 50px;
        margin-right: 15px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .tips-content h3 {
        margin: 0 0 5px;
        font-size: 1rem;
        color: #2e7d32;
    }

    .tips-content p {
        margin: 0;
        font-size: 0.9rem;
        color: #333;
    }

    .notification-card {
        background-color: white;
        border-radius: 8px;
        padding: 15px;
        box-shadow: 0 1px 5px rgba(0, 0, 0, 0.05);
        margin-bottom: 20px;
    }

    .notification-card h3 {
        margin: 0 0 10px;
        font-size: 1rem;
        color: #333;
    }

    .notification-item {
        padding: 8px 0;
        border-bottom: 1px solid #f0f0f0;
    }

    .notification-item:last-child {
        border-bottom: none;
    }

    .notification-content {
        margin: 0;
        font-size: 0.9rem;
    }

    .notification-time {
        font-size: 0.75rem;
        color: #888;
        margin-top: 3px;
    }

    .dashboard-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 20px;
    }

    @media (max-width: 992px) {
        .dashboard-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection

@section('content')
<div class="container-fluid dashboard-content">
    <div class="welcome-container">
        <h1 class="welcome-heading">Selamat Datang, Pak Udin!</h1>
        <div class="user-info">
            <div>
                <h2 class="user-name">Ahmad <span class="user-level">Usia 5</span></h2>
            </div>
            <div class="avatar-container">
                <img src="{{ asset('assets/profile.png') }}" alt="User Avatar" class="avatar-img" onerror="this.src='https://via.placeholder.com/80'">
            </div>
        </div>
    </div>

    <div class="recent-game">
        <div class="game-info">
            <div class="game-icon">
                <img src="{{ asset('assets/tebak_gambar.png') }}" alt="User Avatar" class="avatar-img" onerror="this.src='https://via.placeholder.com/80'">
            </div>
            <div class="game-details">
                <h3>Tebak Gambar</h3>
                <p>2 Jam yang lalu</p>
            </div>
        </div>
        <div>
            <a href="#" class="btn btn-sm btn-light">
                <i class="fas fa-chevron-right"></i>
            </a>
        </div>
    </div>

    <div class="dashboard-grid">
        <div class="main-dashboard">
            <div class="stat-cards-row">
                <div class="stat-box">
                    <h3>Statistik Mingguan</h3>
                    <div class="performance-graph" id="weeklyStatsChart">
                        <!-- Weekly stats chart will be rendered here -->
                    </div>
                </div>
                <div class="stat-box">
                    <h3>Total Waktu Belajar</h3>
                    <div class="value">3 j 25 m</div>
                </div>
                <div class="stat-box">
                    <h3>Soal Terjawab Benar</h3>
                    <div class="value">80</div>
                </div>
            </div>

            <div class="tips-card">
                <div class="tips-icon">
                    <img src="{{ asset('assets/lightbulb.png') }}" alt="Tips" onerror="this.src='data:image/svg+xml;utf8,<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"50\" height=\"50\" viewBox=\"0 0 24 24\"><path fill=\"%23FFC107\" d=\"M12 2a7 7 0 0 0-7 7c0 2.38 1.19 4.47 3 5.74V17a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-2.26c1.81-1.27 3-3.36 3-5.74a7 7 0 0 0-7-7z\"/><path fill=\"%23FFA000\" d=\"M10 20v1h4v-1h-4z\"/></svg>'">
                </div>
                <div class="tips-content">
                    <h3>Tips Hari Ini</h3>
                    <p>Dorong anak anda untuk mengesplorasi permainan yang berbeda di edusense</p>
                </div>
            </div>

            <div class="recent-activity">
                <h2>Aktivitas Terbaru</h2>
                <table class="activity-table">
                    <thead>
                        <tr>
                            <th>Aktivitas</th>
                            <th>Waktu</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Bermain Tebak Bentuk</td>
                            <td>2 jam yang lalu</td>
                            <td><span class="badge bg-success">Selesai</span></td>
                        </tr>
                        <tr>
                            <td>Bermain Tebak Gambar</td>
                            <td>3 jam yang lalu</td>
                            <td><span class="badge bg-success">Selesai</span></td>
                        </tr>
                        <tr>
                            <td>Bermain Hitung Angka</td>
                            <td>Kemarin, 15:30</td>
                            <td><span class="badge bg-warning">Belum Selesai</span></td>
                        </tr>
                        <tr>
                            <td>Bermain Tebak Warna</td>
                            <td>Kemarin, 14:20</td>
                            <td><span class="badge bg-success">Selesai</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="sidebar-content">
            <div class="notification-card">
                <h3>Notifikasi</h3>
                <div class="notification-item">
                    <p class="notification-content">Ahmad telah mendapatkan skor 80 di tebak gambar</p>
                    <p class="notification-time">2 jam yang lalu</p>
                </div>
                <div class="notification-item">
                    <p class="notification-content">Batas bermain telah tercapai</p>
                    <p class="notification-time">2 hari yang lalu</p>
                </div>
                <div class="notification-item">
                    <p class="notification-content">Ahmad telah bermain tebak bentuk selama 15 menit</p>
                    <p class="notification-time">2 hari yang lalu</p>
                </div>
            </div>

            <div class="graph-container">
                <h2>Performa Bulanan</h2>
                <div class="performance-graph" id="monthlyPerformanceChart">
                    <!-- Monthly performance chart will be rendered here -->
                </div>
            </div>

            <div class="graph-container">
                <h2>Kategori Permainan Favorit</h2>
                <div class="performance-graph" id="favoriteGamesChart">
                    <!-- Favorite games chart will be rendered here -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('additional-scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Weekly stats chart
        const weeklyStatsCtx = document.getElementById('weeklyStatsChart').getContext('2d');
        const weeklyStatsChart = new Chart(weeklyStatsCtx, {
            type: 'bar',
            data: {
                labels: ['S', 'M', 'T', 'W', 'T', 'F', 'S'],
                datasets: [{
                    label: 'Aktivitas Harian',
                    data: [30, 45, 25, 35, 50, 40, 35],
                    backgroundColor: '#81c784',
                    borderColor: '#4caf50',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            display: false
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });

        // Monthly performance chart
        const monthlyPerformanceCtx = document.getElementById('monthlyPerformanceChart').getContext('2d');
        const monthlyPerformanceChart = new Chart(monthlyPerformanceCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
                datasets: [{
                    label: 'Performa',
                    data: [65, 72, 68, 75, 82],
                    backgroundColor: 'rgba(33, 150, 243, 0.2)',
                    borderColor: '#2196f3',
                    borderWidth: 2,
                    tension: 0.3
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            display: true,
                            color: 'rgba(0,0,0,0.05)'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });

        // Favorite games chart
        const favoriteGamesCtx = document.getElementById('favoriteGamesChart').getContext('2d');
        const favoriteGamesChart = new Chart(favoriteGamesCtx, {
            type: 'doughnut',
            data: {
                labels: ['Tebak Gambar', 'Tebak Bentuk', 'Hitung Angka', 'Tebak Warna'],
                datasets: [{
                    label: 'Permainan Favorit',
                    data: [40, 25, 20, 15],
                    backgroundColor: [
                        '#4caf50',
                        '#2196f3',
                        '#ff9800',
                        '#9c27b0'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            boxWidth: 12,
                            padding: 10,
                            font: {
                                size: 10
                            }
                        }
                    }
                }
            }
        });
    });
</script>
@endsection