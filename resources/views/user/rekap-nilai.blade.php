@extends('layouts.navuser')

@section('title', 'Rekap Nilai')

@section('page-title', 'Rekap Nilai')

@section('additional-styles')
<style>
    .dashboard-content {
        padding: 0 !important; /* Menghilangkan padding tambahan */
    }

    /* Tabs Styling */
    .tabs-container {
        margin-bottom: 20px;
        width: 100%;
    }

    .tabs-nav {
        display: flex;
        background-color: #e8f5e9;
        border-radius: 8px;
        overflow: hidden;
        margin-bottom: 20px;
    }

    .tab-button {
        flex: 1;
        padding: 12px 15px;
        text-align: center;
        background: none;
        border: none;
        font-size: 1rem;
        font-weight: 600;
        color: #388e3c;
        cursor: pointer;
        transition: background-color 0.3s, color 0.3s;
    }

    .tab-button.active {
        background-color: #4CAF50;
        color: white;
    }

    .tab-content {
        display: none;
        background-color: white;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 1px 5px rgba(0, 0, 0, 0.05);
    }

    .tab-content.active {
        display: block;
    }

    /* Data Table Styling */
    .data-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    .data-table th,
    .data-table td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #e0e0e0;
    }

    .data-table th {
        background-color: #f1fdf2;
        color: #2e7d32;
        font-weight: 600;
    }

    .data-table tbody tr:hover {
        background-color: #f9f9f9;
    }

    .score-cell {
        font-weight: bold;
    }

    .high-score {
        color: #388e3c;
    }

    .medium-score {
        color: #ffa000;
    }

    .low-score {
        color: #d32f2f;
    }

    /* Filter Styling */
    .filter-container {
        display: flex;
        gap: 15px;
        margin-bottom: 20px;
        flex-wrap: wrap;
    }

    .filter-group {
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    .filter-label {
        font-size: 0.9rem;
        font-weight: 600;
        color: #388e3c;
    }

    .filter-select {
        padding: 8px 12px;
        border-radius: 4px;
        border: 1px solid #ddd;
        min-width: 150px;
    }

    /* Progress Bar Styling */
    .progress-container {
        width: 100%;
        background-color: #e0e0e0;
        border-radius: 4px;
        margin: 5px 0;
    }

    .progress-bar {
        height: 8px;
        border-radius: 4px;
        background-color: #4CAF50;
    }

    /* Stats Cards Styling */
    .stats-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 15px;
        margin-bottom: 20px;
    }

    .stat-card {
        background-color: white;
        border-radius: 8px;
        padding: 15px;
        box-shadow: 0 1px 5px rgba(0, 0, 0, 0.05);
    }

    .stat-title {
        font-size: 0.9rem;
        color: #666;
        margin-bottom: 8px;
    }

    .stat-value {
        font-size: 1.8rem;
        font-weight: bold;
        color: #388e3c;
    }

    /* Graphs & Charts */
    .chart-container {
        width: 100%;
        height: 300px;
        margin: 20px 0;
        background-color: #f9f9f9;
        border-radius: 8px;
        padding: 15px;
    }

    /* Export & Import Button Styling */
    .action-buttons {
        display: flex;
        gap: 10px;
        margin-top: 20px;
    }

    .import-btn {
        padding: 10px 20px;
        background-color: #f48fb1;
        color: white;
        border: none;
        border-radius: 20px;
        cursor: pointer;
        font-weight: 600;
        transition: background-color 0.3s;
    }

    .export-btn {
        padding: 10px 20px;
        background-color: #81c784;
        color: white;
        border: none;
        border-radius: 20px;
        cursor: pointer;
        font-weight: 600;
        transition: background-color 0.3s;
    }

    .import-btn:hover {
        background-color: #ec407a;
    }

    .export-btn:hover {
        background-color: #66bb6a;
    }

    /* Media queries untuk responsivitas */
    @media (max-width: 768px) {
        .tabs-nav {
            flex-direction: column;
        }
        
        .filter-container {
            flex-direction: column;
        }
        
        .filter-group {
            width: 100%;
        }
    }
</style>
@endsection

@section('content')
<div class="dashboard-section">
    <!-- Tabs -->
    <div class="tabs-container">
        <div class="tabs-nav">
            <button class="tab-button active" data-tab="progres">Progres</button>
            <button class="tab-button" data-tab="skor">Skor</button>
            <button class="tab-button" data-tab="statistik">Statistik</button>
        </div>
        
        <!-- Tab Content: Progres -->
        <div id="progres" class="tab-content active">
            <div class="filter-container">
                <div class="filter-group">
                    <label class="filter-label">Jenis Permainan</label>
                    <select class="filter-select">
                        <option>Tebak Gambar Hewan</option>
                        <option>Tebak Gambar Buah</option>
                        <option>Tebak Bentuk Bidang</option>
                        <option>Tebak Huruf</option>
                        <option>Tebak Suara</option>
                    </select>
                </div>
            </div>
            
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Jenis Permainan</th>
                        <th>Progres</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tebak Gambar Hewan</td>
                        <td>
                            <div class="progress-container">
                                <div class="progress-bar" style="width: 100%"></div>
                            </div>
                            <small>100% Selesai</small>
                        </td>
                        <td><span class="high-score">Selesai</span></td>
                    </tr>
                    <tr>
                        <td>Tebak Gambar Buah</td>
                        <td>
                            <div class="progress-container">
                                <div class="progress-bar" style="width: 100%"></div>
                            </div>
                            <small>100% Selesai</small>
                        </td>
                        <td><span class="high-score">Selesai</span></td>
                    </tr>
                    <tr>
                        <td>Tebak Bentuk Bidang</td>
                        <td>
                            <div class="progress-container">
                                <div class="progress-bar" style="width: 75%"></div>
                            </div>
                            <small>75% Selesai</small>
                        </td>
                        <td><span class="medium-score">Dalam Proses</span></td>
                    </tr>
                    <tr>
                        <td>Tebak Suara</td>
                        <td>
                            <div class="progress-container">
                                <div class="progress-bar" style="width: 0%"></div>
                            </div>
                            <small>0% Belum Dimulai</small>
                        </td>
                        <td><span class="low-score">Belum Dimulai</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <!-- Tab Content: Skor -->
        <div id="skor" class="tab-content">
            <div class="filter-container">
                <div class="filter-group">
                    <label class="filter-label">Jenis Permainan</label>
                    <select class="filter-select">
                        <option>Tebak Gambar Hewan</option>
                        <option>Tebak Gambar Huruf</option>
                        <option>Tebak Bentuk Bidang</option>
                        <option>Tebak Suara</option>
                        <option>Tebak Nama Buah</option>
                    </select>
                </div>
            </div>
            
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Jenis Permainan</th>
                        <th>Nilai</th>
                        <th>Waktu Bermain</th>
                        <th>Skor</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tebak Gambar Hewan</td>
                        <td class="score-cell high-score">85</td>
                        <td>2 jam 25 menit</td>
                        <td><span class="high-score">1000</span></td>
                    </tr>
                    <tr>
                        <td>Tebak Gambar Hewan</td>
                        <td class="score-cell medium-score">76</td>
                        <td>2 jam 25 menit</td>
                        <td><span class="high-score">800</span></td>
                    </tr>
                    <tr>
                        <td>Tebak Gambar Hewan</td>
                        <td class="score-cell low-score">65</td>
                        <td>2 jam 25 menit</td>
                        <td><span class="high-score">500</span></td>
                    </tr>
                    <tr>
                        <td>Tebak Gambar Hewan</td>
                        <td class="score-cell high-score">95</td>
                        <td>2 jam 25 menit</td>
                        <td><span class="high-score">1200</span></td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
        
        <!-- Tab Content: Statistik -->
        <div id="statistik" class="tab-content">
            <div class="filter-container">
                <div class="filter-group">
                    <label class="filter-label">Periode</label>
                    <select class="filter-select">
                        <option>Harian</option>
                        <option>Bulanan</option>
                    </select>
                </div>
            </div>
            
            <div class="stats-container">
                <div class="stat-card">
                    <div class="stat-title">Rata-rata Nilai</div>
                    <div class="stat-value">80.25</div>
                </div>
                <div class="stat-card">
                    <div class="stat-title">Nilai Tertinggi</div>
                    <div class="stat-value">92</div>
                </div>
                <div class="stat-card">
                    <div class="stat-title">Nilai Terendah</div>
                    <div class="stat-value">68</div>
                </div>
                <div class="stat-card">
                    <div class="stat-title">Jumlah Game Dimainkan</div>
                    <div class="stat-value">4</div>
                </div>
            </div>
            
            <div class="chart-container">
                <!-- Placeholder untuk grafik -->
                <div id="nilai-chart" style="width: 100%; height: 100%;"></div>
            </div>
        </div>
    </div>
    
    <!-- Action Buttons -->
    <div class="action-buttons">
        <button class="import-btn">Import CSV</button>
        <button class="export-btn">Export CSV</button>
    </div>
</div>

<script>
    // Tab switching functionality
    document.addEventListener('DOMContentLoaded', function() {
        const tabButtons = document.querySelectorAll('.tab-button');
        const tabContents = document.querySelectorAll('.tab-content');
        
        tabButtons.forEach(button => {
            button.addEventListener('click', function() {
                const tabId = this.getAttribute('data-tab');
                
                // Deactivate all tabs
                tabButtons.forEach(btn => btn.classList.remove('active'));
                tabContents.forEach(content => content.classList.remove('active'));
                
                // Activate clicked tab
                this.classList.add('active');
                document.getElementById(tabId).classList.add('active');
            });
        });
        
        // Simple chart initialization placeholder
        // Assuming you'll use a library like Chart.js
        // This is just a placeholder - you'll need to include your chart library
        if (document.getElementById('nilai-chart')) {
            // Example placeholder for chart initialization
            console.log('Chart would be initialized here with actual data');
            // Actual chart initialization would go here
        }
    });
</script>
@endsection