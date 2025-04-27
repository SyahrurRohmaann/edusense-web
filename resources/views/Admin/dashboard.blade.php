<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard | EDUSENSE</title>
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
      width: 200px; /* Sidebar diperlebar dari 120px */
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
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
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
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
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
  </style>
</head>
<body>

  <div class="sidebar">
    <div class="logo-area">
      <span>Your Logo</span>
    </div>
    <a href="#" class="active">📊 Dashboard</a>
    <a href="#">👤 Kelola Pengguna</a>
    <a href="#">🧠 Manajemen Soal</a>
    <a href="#">👤 Data User</a>
    <a href="#">👤 Rekap Nilai</a>
    <a href="#">⚙️ Pengaturan</a>
    <a href="#">🚪 Logout</a>
  </div>

  <div class="main-content">
    <div class="navbar-container">
      <div class="navbar">
        <h1>Dashboard</h1>
        <div class="user-info">
          <span>Good morning, <strong>Admin Edusense</strong></span>
        </div>
      </div>
    </div>

    <div class="dashboard-content">
      <div class="title">Hasil Diagnosis</div>
      <div class="search-print">
        <input type="text" placeholder="🔍 Cari Nama Peserta">
        <button>🖨️ Print</button>
      </div>

      <div class="table-container">
        <table>
          <thead>
            <tr>
              <th>No</th>
              <th>Tanggal</th>
              <th>Nama Peserta</th>
              <th>Jurusan Rekomendasi</th>
              <th>Presentase</th>
            </tr>
          </thead>
          <tbody>
            <tr><td>1</td><td>08-02-2025</td><td>adi</td><td>Sistem Informasi</td><td>100%</td></tr>
            <tr><td>2</td><td>09-02-2025</td><td>aya</td><td>Pertanian</td><td>90%</td></tr>
            <tr><td>3</td><td>23-02-2025</td><td>lala</td><td>Perikanan</td><td>97%</td></tr>
            <tr><td>4</td><td>01-02-2025</td><td>dila</td><td>Teknik Informatika</td><td>100%</td></tr>
            <tr><td>5</td><td>03-02-2025</td><td>ghasti</td><td>Teknik Komputer</td><td>100%</td></tr>
            <tr><td>6</td><td>25-02-2025</td><td>ghania</td><td>Hukum</td><td>89%</td></tr>
            <tr><td>7</td><td>09-02-2025</td><td>maylyn</td><td>Sospol</td><td>99%</td></tr>
            <tr><td>8</td><td>11-02-2025</td><td>amanda</td><td>Keperawatan</td><td>100%</td></tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</body>
</html>