<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard') | EDUSENSE</title>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Fredoka', sans-serif;
        }

        body {
            display: flex;
            height: 100vh;
            background-color: #f1fdf2;
        }

        .sidebar {
            width: 200px;
            background-color: #4CAF50;
            color: white;
            display: flex;
            flex-direction: column;
            padding-top: 20px;
        }

        .sidebar h2 {
            text-align: center;
            font-size: 20px;
            margin-bottom: 30px;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 15px 20px;
            font-size: 15px;
            transition: background-color 0.2s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: #45a049;
        }

        .main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .navbar-container {
            padding: 15px 20px;
            background-color: white;
        }

        .navbar {
            background-color: #66bb6a;
            padding: 15px 20px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .navbar h1 {
            font-size: 20px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-info span {
            font-size: 15px;
        }

        .user-info strong {
            font-weight: 600;
        }

        .dashboard-content {
            padding: 30px;
        }

        .dashboard-content .title {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 15px;
            color: #388e3c;
        }

        .table-container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            text-align: left;
            padding: 12px 15px;
            border-bottom: 1px solid #e0e0e0;
        }

        th {
            background-color: #f1fdf2;
            color: #2e7d32;
        }

        tr:hover {
            background-color: #f9f9f9;
        }

        .search-print {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .search-print input {
            padding: 8px 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            width: 250px;
        }

        .search-print button {
            padding: 8px 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .search-print button:hover {
            background-color: #45a049;
        }

        .logo-area {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 10px;
        }

        .logo-area span {
            font-size: 16px;
            font-weight: bold;
            color: white;
        }

        @yield('additional-styles')
    </style>
</head>

<body>

    <div class="sidebar">
        <div class="logo-area">
            <span>EDUSENSE</span>
        </div>
        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">📊
            Dashboard</a>
        <a href="{{ route('kelola-pengguna') }}" class="{{ request()->routeIs('kelola-pengguna') ? 'active' : '' }}">👤
            Kelola Pengguna</a>
        <a href="{{ route('manajemen-soal') }}" class="{{ request()->routeIs('manajemen-soal') ? 'active' : '' }}">🧠
            Manajemen Soal</a>
        <a href="{{ route('data-user') }}" class="{{ request()->routeIs('data-user') ? 'active' : '' }}">👤 Data
            User</a>
        <a href="{{ route('rekap-nilai') }}" class="{{ request()->routeIs('rekap-nilai') ? 'active' : '' }}">👤 Rekap
            Nilai</a>
        <a href="{{ route('pengaturan') }}" class="{{ request()->routeIs('pengaturan') ? 'active' : '' }}">⚙️
            Pengaturan</a>
        <a href="{{ route('logout') }}">🚪 Logout</a>
    </div>

    <div class="main-content">
        <div class="navbar-container">
            <div class="navbar">
                <h1>@yield('page-title', 'Dashboard')</h1>
                <div class="user-info">
                    <span>Good morning, <strong>{{ $username ?? 'Admin Edusense' }}</strong></span>
                </div>
            </div>
        </div>

        <div class="dashboard-content">
            @yield('content')
        </div>
    </div>

    @yield('scripts')

    <script>
        // Handle logout
        document.querySelector('a[href="{{ route("logout") }}"]').addEventListener('click', function (e) {
            e.preventDefault();
            if (confirm('Apakah Anda yakin ingin logout?')) {
                window.location.href = this.getAttribute('href');
            }
        });
    </script>

</body>

</html>