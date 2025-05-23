@extends('layouts.navuser')

@section('title', 'Profil Anak')

@section('page-title', 'Profil Anak')

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

    /* Profil Anak Styles */
    .profile-container {
        background-color: white;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        padding: 20px;
        margin: 20px 0;
        width: 100%;
    }

    .profile-header {
        background-color: #4cd137;
        color: white;
        padding: 12px 20px;
        border-radius: 8px;
        margin-bottom: 20px;
        font-weight: bold;
        font-size: 1.2rem;
    }

    .profile-content {
        display: grid;
        grid-template-columns: 180px 1fr;
        gap: 30px;
    }

    .profile-avatar {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .avatar-container {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        overflow: hidden;
        background-color: #f0f0f0;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 15px;
    }

    .avatar-container img {
        width: 100%;
        height: auto;
    }

    .upload-btn {
        background-color: #4cd137;
        color: white;
        border: none;
        padding: 8px 15px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 0.9rem;
        transition: background-color 0.3s;
    }

    .upload-btn:hover {
        background-color: #44bd32;
    }

    .profile-form {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

    .form-group label {
        font-weight: 600;
        color: #2e7d32;
        margin-bottom: 5px;
        font-size: 1rem;
    }

    .form-control {
        padding: 10px 15px;
        border: 1px solid #e0e0e0;
        border-radius: 6px;
        font-size: 1rem;
        color: #333;
        background-color: #f9f9f9;
    }

    .form-control:focus {
        outline: none;
        border-color: #4cd137;
        box-shadow: 0 0 0 2px rgba(76, 209, 55, 0.2);
    }

    .form-action {
        display: flex;
        justify-content: flex-end;
        margin-top: 20px;
    }

    .btn-save {
        background-color: #4cd137;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 6px;
        cursor: pointer;
        font-weight: bold;
        transition: background-color 0.3s;
    }

    .btn-save:hover {
        background-color: #44bd32;
    }

    .dropdown-select {
        position: relative;
    }

    .dropdown-select select {
        appearance: none;
        padding-right: 30px;
        width: 100%;
    }

    .dropdown-select::after {
        content: '';
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        width: 0;
        height: 0;
        border-left: 6px solid transparent;
        border-right: 6px solid transparent;
        border-top: 6px solid #888;
        pointer-events: none;
    }

    /* Responsivitas untuk profil */
    @media (max-width: 768px) {
        .profile-content {
            grid-template-columns: 1fr;
        }

        .profile-avatar {
            margin-bottom: 20px;
        }
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="profile-container">
        
        <div class="profile-content">
            <div class="profile-avatar">
                <div class="avatar-container">
                    <img src="{{ asset('assets/profile.png') }}" alt="Foto Anak">
                </div>
                <button class="upload-btn">Ganti Foto</button>
            </div>
            
            <div class="profile-form">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="nama" class="form-control" value="Ahmad Asahi">
                </div>
                
                <div class="form-group">
                    <label for="usia">Usia</label>
                    <input type="text" id="usia" name="usia" class="form-control" value="5 Tahun">
                </div>
                
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <div class="dropdown-select">
                        <select id="jenis_kelamin" name="jenis_kelamin" class="form-control">
                            <option value="laki-laki" selected>Laki-Laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="tanggal_mulai">Tanggal Mulai Bermain</label>
                    <input type="text" id="tanggal_mulai" name="tanggal_mulai" class="form-control" value="17 Agustus 1945">
                </div>
                
                <div class="form-group">
                    <label for="hobi">Hobi</label>
                    <input type="text" id="hobi" name="hobi" class="form-control" placeholder="Masukkan hobi anak">
                </div>
                
                <div class="form-group">
                    <label for="makanan_favorit">Makanan Favorit</label>
                    <input type="text" id="makanan_favorit" name="makanan_favorit" class="form-control" placeholder="Masukkan makanan favorit">
                </div>
                
                <div class="form-action">
                    <button type="submit" class="btn-save">Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </div>
    
    
</div>
@endsection