@extends('layouts.nav')

@section('title', 'Pengaturan')
@section('page-title', 'Pengaturan')

@section('additional-styles')
    <style>
        .settings-wrapper {
            padding: 20px;
            max-width: 100%;
        }
        
        .settings-container {
            background: #fff;
            border-radius: 8px;
            width: 100%;
            margin: 0 auto;
            position: relative;
        }
        
        .profile-section {
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 20px;
            border-bottom: 1px solid #f0f0f0;
            flex-wrap: wrap;
        }
        
        .profile-img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
        }
        
        .profile-info {
            flex: 1;
            min-width: 200px;
        }
        
        .profile-info h3 {
            margin: 0 0 5px 0;
            font-size: 18px;
            color: #333;
        }
        
        .profile-info span {
            color: #777;
            font-size: 14px;
        }
        
        .upload-btn {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 8px 16px;
            background-color: #4CAF50;
            color: white;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
            border: none;
            transition: background-color 0.3s;
        }
        
        .upload-btn:hover {
            background-color: #3d8b40;
        }
        
        .settings-form {
            padding: 20px;
        }
        
        .form-row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -10px;
        }
        
        .form-col {
            flex: 1;
            padding: 0 10px;
            min-width: 250px;
            margin-bottom: 20px;
        }
        
        .form-group {
            margin-bottom: 10px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 6px;
            font-weight: 500;
            color: #333;
            font-size: 14px;
        }
        
        .form-control {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ddd;
            font-size: 14px;
            transition: border-color 0.3s;
        }
        
        .form-control:focus {
            border-color: #4CAF50;
            outline: none;
        }
        
        .toggle-container {
            background: #f9f9f9;
            border-radius: 6px;
            padding: 10px;
            margin-bottom: 20px;
            border-left: 3px solid #4CAF50;
        }
        
        .toggle-header {
            font-size: 15px;
            font-weight: 500;
            color: #333;
            margin-bottom: 15px;
        }
        
        .toggle-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .toggle-label {
            font-size: 14px;
            color: #555;
        }
        
        /* Toggle Switch */
        .switch-wrapper {
            position: relative;
            display: inline-block;
            width: 46px;
            height: 22px;
        }
        
        .switch-input {
            opacity: 0;
            width: 0;
            height: 0;
        }
        
        .switch-slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .3s;
            border-radius: 22px;
        }
        
        .switch-slider:before {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            transition: .3s;
            border-radius: 50%;
        }
        
        .switch-input:checked + .switch-slider {
            background-color: #4CAF50;
        }
        
        .switch-input:checked + .switch-slider:before {
            transform: translateX(24px);
        }
        
        .form-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        
        .btn {
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s;
        }
        
        .btn-cancel {
            background-color: transparent;
            border: 1px solid #ddd;
            color: #777;
        }
        
        .btn-cancel:hover {
            background-color: #f5f5f5;
        }
        
        .btn-save {
            background-color: #4CAF50;
            border: none;
            color: white;
        }
        
        .btn-save:hover {
            background-color: #3d8b40;
        }
        
        /* Responsive adjustments */
        @media screen and (max-width: 768px) {
            .form-col {
                flex: 100%;
            }
            
            .profile-section {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .profile-img {
                margin: 0 auto;
            }
            
            .profile-info {
                text-align: center;
                width: 100%;
            }
            
            .upload-btn {
                margin-top: 10px;
                width: 100%;
                justify-content: center;
            }
        }
    </style>
@endsection

@section('content')
<div class="settings-wrapper">
    <div class="settings-container">
        <form enctype="multipart/form-data">
            <div class="profile-section">
                <img src="{{ asset('assets/profile.png') }}" id="profile-preview" class="profile-img" alt="Foto Profil">
                
                <div class="profile-info">
                    <h3>Admin Game Edukasi</h3>
                    <span>admin@example.com</span>
                </div>
                
                <label for="profile-pic" class="upload-btn">
                    <i class="fas fa-camera"></i> Ganti Foto
                </label>
                <input type="file" id="profile-pic" name="profile_pic" accept="image/*" style="display: none;">
            </div>

            <div class="settings-form">
                <div class="form-row">
                    <div class="form-col">
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" id="nama" class="form-control" value="Admin Game Edukasi">
                        </div>
                    </div>
                    
                    <div class="form-col">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" class="form-control" value="admin@example.com">
                        </div>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-col">
                        <div class="form-group">
                            <label for="telepon">Nomor Telepon</label>
                            <input type="tel" id="telepon" class="form-control" placeholder="+62...">
                        </div>
                    </div>
                    
                    <div class="form-col">
                        <div class="form-group">
                            <label for="bahasa">Bahasa</label>
                            <select id="bahasa" class="form-control">
                                <option value="id" selected>Bahasa Indonesia</option>
                                <option value="en">English</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="toggle-container">
                    <div class="toggle-header">Notifikasi</div>
                    <div class="toggle-row">
                        <span class="toggle-label">Terima notifikasi email</span>
                        <label class="switch-wrapper">
                            <input type="checkbox" class="switch-input" checked>
                            <span class="switch-slider"></span>
                        </label>
                    </div>
                </div>
                
                <div class="toggle-container">
                    <div class="toggle-header">Keamanan</div>
                    <div class="toggle-row">
                        <span class="toggle-label">Aktifkan autentikasi dua faktor</span>
                        <label class="switch-wrapper">
                            <input type="checkbox" class="switch-input">
                            <span class="switch-slider"></span>
                        </label>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-col">
                        <div class="form-group">
                            <label for="pass-current">Password Saat Ini</label>
                            <input type="password" id="pass-current" class="form-control" placeholder="Masukkan password saat ini">
                        </div>
                    </div>
                    
                    <div class="form-col">
                        <div class="form-group">
                            <label for="pass-new">Password Baru</label>
                            <input type="password" id="pass-new" class="form-control" placeholder="Masukkan password baru">
                        </div>
                    </div>
                </div>
                
                <div class="form-buttons">
                    <button type="button" class="btn btn-cancel">Batal</button>
                    <button type="submit" class="btn btn-save">Simpan Perubahan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    const fileInput = document.getElementById('profile-pic');
    const preview = document.getElementById('profile-preview');

    fileInput.addEventListener('change', function(){
        const file = this.files[0];
        if (file){
            const reader = new FileReader();
            reader.onload = function(e){
                preview.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });

    document.querySelector('form').addEventListener('submit', function(e){
        e.preventDefault();
        
        // Animasi sukses
        const btn = document.querySelector('.btn-save');
        const originalText = btn.innerHTML;
        btn.innerHTML = 'Berhasil Disimpan';
        btn.style.backgroundColor = '#43A047';
        
        setTimeout(() => {
            btn.innerHTML = originalText;
            btn.style.backgroundColor = '#4CAF50';
        }, 2000);
    });
</script>
@endsection