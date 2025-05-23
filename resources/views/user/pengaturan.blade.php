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
</style>
@endsection