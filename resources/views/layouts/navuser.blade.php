<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard') | EDUSENSE</title>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;600&display=swap" rel="stylesheet">
    <!-- jQuery (duluan dari Bootstrap JS) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Bootstrap JS (wajib untuk modal) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @livewireStyles
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
            background-color: #12B886;
            color: white;
            display: flex;
            flex-direction: column;
            padding-top: 20px;
            transition: all 0.3s ease;
            width: 200px;
            position: relative;
            overflow-x: hidden;
            z-index: 100;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Class untuk sidebar tertutup */
        .sidebar-collapsed {
            width: 60px !important;
        }

        /* Pastikan sidebar tertutup pada layar kecil */
        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                height: 100%;
                z-index: 1000;
                box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            }

            .sidebar-collapsed {
                transform: translateX(-100%);
                width: 200px !important;
            }
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
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            white-space: nowrap;
            overflow: hidden;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: #08986d;
        }

        .sidebar a .menu-icon {
            margin-right: 15px;
            font-size: 18px;
            width: 20px;
            text-align: center;
        }

        .sidebar-collapsed a .menu-text {
            display: none;
        }

        .sidebar-collapsed a {
            padding: 15px;
            justify-content: center;
        }

        .sidebar-collapsed a .menu-icon {
            margin-right: 0;
        }

        .main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            transition: margin-left 0.3s ease;
        }

        .navbar-container {
            padding: 15px 20px;
            background-color: white;
        }

        .navbar {
            background-color: #12B886;
            padding: 15px 20px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            position: relative;
        }

        .navbar:before {
            content: "☰";
            margin-right: 10px;
            font-size: 20px;
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
            color: #12B886;
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
            background-color: #12B886;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .search-print button:hover {
            background-color: #12B886;
        }

        .logo-area {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 15px 10px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .sidebar-collapsed .logo-area {
            padding: 15px 5px;
        }

        .logo-area span {
            font-size: 16px;
            font-weight: bold;
            color: white;
            white-space: nowrap;
        }

        .sidebar-collapsed .logo-area span {
            display: none;
        }

        .logo-icon {
            display: none;
            font-weight: bold;
            color: white;
            font-size: 20px;
        }

        .sidebar-collapsed .logo-icon {
            display: block;
        }

        @yield('additional-styles')
    </style>


</head>

<body>

    <div class="sidebar" id="sidebar">
        <div class="logo-area" id="logo-area">
            <span>EDUSENSE</span>
            <div class="logo-icon">E</div>
        </div>
        <a href="{{ route('user.dashboard') }}" class="{{ request()->routeIs('user.dashboard') ? 'active' : '' }}">
            <span class="menu-icon">📊</span>
            <span class="menu-text">Dashboard</span>
        </a>
        <a href="{{ route('user.profil-anak') }}" class="{{ request()->routeIs('user.profil-anak') ? 'active' : '' }}">
            <span class="menu-icon">👶</span>
            <span class="menu-text">Profil Anak</span>
        </a>
        <a href="{{ route('user.data-user') }}" class="{{ request()->routeIs('user.data-user') ? 'active' : '' }}">
            <span class="menu-icon">👤</span>
            <span class="menu-text">Data User</span>
        </a>
        <a href="{{ route('user.rekap-nilai') }}" class="{{ request()->routeIs('user.rekap-nilai') ? 'active' : '' }}">
            <span class="menu-icon">📝</span>
            <span class="menu-text">Rekap Nilai</span>
        </a>
        <a href="{{ route('user.leaderboard') }}" class="{{ request()->routeIs('user.leaderboard') ? 'active' : '' }}">
            <span class="menu-icon">🏆</span>
            <span class="menu-text">Leaderboard</span>
        </a>
        <a href="{{ route('logout') }}">
            <span class="menu-icon">🚪</span>
            <span class="menu-text">Logout</span>
        </a>
    </div>


    <div class="main-content" id="main-content">
        <div class="navbar-container">
            <div class="navbar" id="navbar">
                <h1>@yield('page-title', 'Dashboard')</h1>
                <div class="user-info">
                    <span>Good morning, <strong>{{ $username ?? 'User Edusense' }}</strong></span>
                </div>
            </div>
        </div>

        <div class="dashboard-content">
            @yield('content')
        </div>
    </div>

    @yield('scripts')

    <script>
        // Status sidebar (default: terbuka)
        let sidebarOpen = true;

        // Toggle sidebar saat navbar diklik
        document.getElementById('navbar').addEventListener('click', function() {
            toggleSidebar();
        });

        // Toggle sidebar juga saat logo area diklik
        document.getElementById('logo-area').addEventListener('click', function(e) {
            e.stopPropagation(); // Mencegah event bubbling
            toggleSidebar();
        });

        // Fungsi untuk toggle sidebar
        function toggleSidebar() {
            sidebarOpen = !sidebarOpen;
            const sidebar = document.getElementById('sidebar');

            if (sidebarOpen) {
                sidebar.classList.remove('sidebar-collapsed');
            } else {
                sidebar.classList.add('sidebar-collapsed');
            }

            // Simpan status sidebar di localStorage
            localStorage.setItem('sidebarOpen', sidebarOpen);
        }

        // Memuat status sidebar dari localStorage
        window.addEventListener('load', function() {
            const savedSidebarState = localStorage.getItem('sidebarOpen');

            if (savedSidebarState === 'false') {
                document.getElementById('sidebar').classList.add('sidebar-collapsed');
                sidebarOpen = false;
            }
        });

        // Handle logout
        document.querySelector('a[href="{{ route('logout') }}"]').addEventListener('click', function(e) {
            e.preventDefault();
            if (confirm('Apakah Anda yakin ingin logout?')) {
                window.location.href = this.getAttribute('href');
            }
        });
    </script>
    @livewireScripts
</body>
@yield('scripts')

</html>
