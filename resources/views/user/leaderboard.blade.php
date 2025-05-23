@extends('layouts.navuser')

@section('title', 'Leaderboard')

@section('page-title', 'Leaderboard')

@section('additional-styles')
<style>
    .dashboard-content {
        padding: 0 !important;
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
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: bold;
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

    .blue {
        background-color: rgba(52, 152, 219, 0.7);
    }

    .stat-info {
        flex-grow: 1;
        min-width: 0;
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

    /* Leaderboard Styling */
    .leaderboard-container {
        background-color: white;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 1px 5px rgba(0, 0, 0, 0.05);
        margin-bottom: 20px;
        width: 100%;
    }

    .leaderboard-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .leaderboard-title {
        margin: 0;
        color: #388e3c;
        font-size: 1.2rem;
        display: flex;
        align-items: center;
    }

    .leaderboard-title::before {
        content: "🏆";
        margin-right: 8px;
    }

    .filter-container {
        display: flex;
        gap: 10px;
    }

    .filter-select {
        padding: 6px 12px;
        border-radius: 4px;
        border: 1px solid #ddd;
        background-color: #f9f9f9;
        font-size: 0.9rem;
    }

    .leaderboard-table {
        width: 100%;
        border-collapse: collapse;
        table-layout: fixed;
    }

    .leaderboard-table th,
    .leaderboard-table td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #e0e0e0;
    }

    .leaderboard-table th {
        background-color: #f1fdf2;
        color: #2e7d32;
        font-weight: 600;
        font-size: 0.9rem;
        position: sticky;
        top: 0;
    }

    .leaderboard-table tbody tr:hover {
        background-color: #f9f9f9;
    }

    .rank-cell {
        width: 60px;
        text-align: center;
    }

    .top-rank {
        font-weight: bold;
    }

    .rank-1 {
        color: gold;
    }

    .rank-2 {
        color: silver;
    }

    .rank-3 {
        color: #cd7f32; /* bronze */
    }

    .student-info {
        display: flex;
        align-items: center;
    }

    .student-avatar {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        margin-right: 10px;
        background-color: #e0e0e0;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        color: #555;
    }

    .student-name {
        font-weight: 500;
    }

    .student-class {
        font-size: 0.8rem;
        color: #777;
    }
    
    /* Badge for Your Child indicator */
    .your-child {
        background-color: #e8f5e9;
        border-radius: 12px;
        padding: 2px 8px;
        font-size: 0.75rem;
        color: #2e7d32;
        margin-left: 10px;
        font-weight: bold;
    }
    
    /* Pagination styling */
    .pagination-container {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }
    
    .pagination {
        display: flex;
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .page-item {
        margin: 0 2px;
    }
    
    .page-link {
        display: block;
        padding: 6px 12px;
        border-radius: 4px;
        text-decoration: none;
        color: #388e3c;
        background-color: #f1fdf2;
        border: 1px solid #ddd;
        transition: all 0.2s;
    }
    
    .page-link:hover {
        background-color: #e8f5e9;
    }
    
    .page-item.active .page-link {
        background-color: #388e3c;
        color: white;
        border-color: #388e3c;
    }
    
    .page-item.disabled .page-link {
        color: #aaa;
        pointer-events: none;
        background-color: #f9f9f9;
    }

    /* Media queries */
    @media (max-width: 992px) {
        .stats-container {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 768px) {
        .stats-container {
            grid-template-columns: 1fr;
        }
        
        .leaderboard-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }
        
        .filter-container {
            width: 100%;
            overflow-x: auto;
        }
        
        .rank-cell {
            width: 40px;
        }
        
        .student-avatar {
            width: 24px;
            height: 24px;
            font-size: 0.8rem;
        }
    }

    /* Make sure content doesn't overflow */
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
</style>
@endsection

@section('content')
<div class="container">
    <!-- Summary Stats -->
    <div class="stats-container">
        <div class="stat-card">
            <div class="stat-icon purple">
                <i class="fas fa-trophy"></i>
            </div>
            <div class="stat-info">
                <div class="stat-label">Ranking Anak Anda</div>
                <div class="stat-value">7</div>
                <div class="stat-subtext">Dari 120 siswa</div>
            </div>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon green">
                <i class="fas fa-chart-line"></i>
            </div>
            <div class="stat-info">
                <div class="stat-label">Total Poin</div>
                <div class="stat-value">820</div>
                <div class="stat-subtext">+25 minggu ini</div>
            </div>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon yellow">
                <i class="fas fa-star"></i>
            </div>
            <div class="stat-info">
                <div class="stat-label">Pencapaian</div>
                <div class="stat-value">12</div>
                <div class="stat-subtext">Dari 20 total</div>
            </div>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon blue">
                <i class="fas fa-tasks"></i>
            </div>
            <div class="stat-info">
                <div class="stat-label">Tugas Selesai</div>
                <div class="stat-value">85%</div>
                <div class="stat-subtext">15 dari 18 tugas</div>
            </div>
        </div>
    </div>
    
    <!-- Leaderboard -->
    <div class="leaderboard-container">
        <div class="leaderboard-header">
            <h2 class="leaderboard-title">Peringkat Siswa</h2>
            <div class="filter-container">
                <select class="filter-select">
                    <option value="all">Semua Kelas</option>
                    <option value="7a">Kelas 7A</option>
                    <option value="7b">Kelas 7B</option>
                    <option value="8a">Kelas 8A</option>
                    <option value="8b">Kelas 8B</option>
                </select>
                <select class="filter-select">
                    <option value="weekly">Minggu Ini</option>
                    <option value="monthly">Bulan Ini</option>
                    <option value="quarterly">Triwulan</option>
                    <option value="yearly">Tahunan</option>
                </select>
            </div>
        </div>
        
        <div style="overflow-x: auto;">
            <table class="leaderboard-table">
                <thead>
                    <tr>
                        <th class="rank-cell">Rank</th>
                        <th>Siswa</th>
                        <th>Poin</th>
                        <th>Tugas Selesai</th>
                        <th>Pencapaian</th>
                        <th>Performa</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="rank-cell top-rank rank-1">1</td>
                        <td>
                            <div class="student-info">
                                <div class="student-avatar">RS</div>
                                <div>
                                    <div class="student-name">Raya Safitri</div>
                                    <div class="student-class">Kelas 7A</div>
                                </div>
                            </div>
                        </td>
                        <td>975</td>
                        <td>95%</td>
                        <td>18</td>
                        <td>Sangat Baik</td>
                    </tr>
                    <tr>
                        <td class="rank-cell top-rank rank-2">2</td>
                        <td>
                            <div class="student-info">
                                <div class="student-avatar">BP</div>
                                <div>
                                    <div class="student-name">Bima Putra</div>
                                    <div class="student-class">Kelas 7B</div>
                                </div>
                            </div>
                        </td>
                        <td>945</td>
                        <td>92%</td>
                        <td>17</td>
                        <td>Sangat Baik</td>
                    </tr>
                    <tr>
                        <td class="rank-cell top-rank rank-3">3</td>
                        <td>
                            <div class="student-info">
                                <div class="student-avatar">AD</div>
                                <div>
                                    <div class="student-name">Anisa Dewi</div>
                                    <div class="student-class">Kelas 7A</div>
                                </div>
                            </div>
                        </td>
                        <td>920</td>
                        <td>90%</td>
                        <td>16</td>
                        <td>Sangat Baik</td>
                    </tr>
                    <tr>
                        <td class="rank-cell">4</td>
                        <td>
                            <div class="student-info">
                                <div class="student-avatar">DP</div>
                                <div>
                                    <div class="student-name">Dimas Pratama</div>
                                    <div class="student-class">Kelas 8A</div>
                                </div>
                            </div>
                        </td>
                        <td>890</td>
                        <td>88%</td>
                        <td>15</td>
                        <td>Baik</td>
                    </tr>
                    <tr>
                        <td class="rank-cell">5</td>
                        <td>
                            <div class="student-info">
                                <div class="student-avatar">SK</div>
                                <div>
                                    <div class="student-name">Siti Kamila</div>
                                    <div class="student-class">Kelas 8B</div>
                                </div>
                            </div>
                        </td>
                        <td>875</td>
                        <td>87%</td>
                        <td>14</td>
                        <td>Baik</td>
                    </tr>
                    <tr>
                        <td class="rank-cell">6</td>
                        <td>
                            <div class="student-info">
                                <div class="student-avatar">FA</div>
                                <div>
                                    <div class="student-name">Fajar Aditya</div>
                                    <div class="student-class">Kelas 7B</div>
                                </div>
                            </div>
                        </td>
                        <td>850</td>
                        <td>86%</td>
                        <td>13</td>
                        <td>Baik</td>
                    </tr>
                    <tr style="background-color: #f1fdf2;">
                        <td class="rank-cell">7</td>
                        <td>
                            <div class="student-info">
                                <div class="student-avatar" style="background-color: #388e3c; color: white;">AR</div>
                                <div>
                                    <div class="student-name">Aditya Rizky</div>
                                    <div class="student-class">Kelas 7A</div>
                                </div>
                                <span class="your-child">Anak Anda</span>
                            </div>
                        </td>
                        <td><strong>820</strong></td>
                        <td><strong>85%</strong></td>
                        <td><strong>12</strong></td>
                        <td><strong>Baik</strong></td>
                    </tr>
                    <tr>
                        <td class="rank-cell">8</td>
                        <td>
                            <div class="student-info">
                                <div class="student-avatar">NS</div>
                                <div>
                                    <div class="student-name">Nina Salsabila</div>
                                    <div class="student-class">Kelas 8A</div>
                                </div>
                            </div>
                        </td>
                        <td>810</td>
                        <td>84%</td>
                        <td>12</td>
                        <td>Baik</td>
                    </tr>
                    <tr>
                        <td class="rank-cell">9</td>
                        <td>
                            <div class="student-info">
                                <div class="student-avatar">RP</div>
                                <div>
                                    <div class="student-name">Rama Pratama</div>
                                    <div class="student-class">Kelas 8B</div>
                                </div>
                            </div>
                        </td>
                        <td>795</td>
                        <td>82%</td>
                        <td>11</td>
                        <td>Baik</td>
                    </tr>
                    <tr>
                        <td class="rank-cell">10</td>
                        <td>
                            <div class="student-info">
                                <div class="student-avatar">LM</div>
                                <div>
                                    <div class="student-name">Lina Maharani</div>
                                    <div class="student-class">Kelas 7A</div>
                                </div>
                            </div>
                        </td>
                        <td>780</td>
                        <td>80%</td>
                        <td>10</td>
                        <td>Baik</td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="pagination-container">
            <ul class="pagination">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
                <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">3</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- Make sure to include Font Awesome for icons -->
<script>
    // You can add JavaScript for filtering functionality here
    document.addEventListener('DOMContentLoaded', function() {
        // Example: Highlight your child's row
        const yourChildRow = document.querySelector('.your-child').closest('tr');
        
        // Filters functionality
        const classFilter = document.querySelector('.filter-select:nth-child(1)');
        const timeFilter = document.querySelector('.filter-select:nth-child(2)');
        
        // Add event listeners for the filters
        classFilter.addEventListener('change', filterLeaderboard);
        timeFilter.addEventListener('change', filterLeaderboard);
        
        function filterLeaderboard() {
            // This is a placeholder for actual filter functionality
            // In a real application, you would make an AJAX request or update the table based on selected filters
            console.log('Class Filter:', classFilter.value);
            console.log('Time Filter:', timeFilter.value);
            
            // Example of showing a loading state
            const leaderboardTable = document.querySelector('.leaderboard-table tbody');
            
            // In a real application, you would fetch data here and update the table
        }
    });
</script>
@endsection