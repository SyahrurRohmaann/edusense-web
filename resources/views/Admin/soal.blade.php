@extends('layouts.nav')

@section('title', 'Manajemen Soal')

@section('page-title', 'Manajemen Soal')

@section('content')
    <div class="container">
        <div class="content-box">

            <div class="filters">
                <select class="category-select">
                    <option selected disabled>Pilihan Kategori</option>
                    <option>Semua Kategori</option>
                    <option>Tebak Gambar</option>
                    <option>Tebak Suara</option>
                    <option>Tebak Buah</option>
                    <option>Tebak Huruf</option>
                    <option>Tebak Bentuk</option>
                </select>

                <button class="add-button">
                    <span class="add-icon">+</span> Tambah Soal Baru
                </button>
            </div>

            <table class="data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis Soal</th>
                        <th>Judul Soal</th>
                        <th>Jumlah Opsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Tebak Gambar</td>
                        <td>Gajah</td>
                        <td>3</td>
                        <td>
                            <div class="action-buttons">
                                <button class="edit-btn">Edit</button>
                                <button class="delete-btn">Hapus</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Tebak Suara</td>
                        <td>Ayam</td>
                        <td>4</td>
                        <td>
                            <div class="action-buttons">
                                <button class="edit-btn">Edit</button>
                                <button class="delete-btn">Hapus</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Tebak Buah</td>
                        <td>Mangga</td>
                        <td>3</td>
                        <td>
                            <div class="action-buttons">
                                <button class="edit-btn">Edit</button>
                                <button class="delete-btn">Hapus</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Tebak Huruf</td>
                        <td>A</td>
                        <td>4</td>
                        <td>
                            <div class="action-buttons">
                                <button class="edit-btn">Edit</button>
                                <button class="delete-btn">Hapus</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Tebak Bentuk</td>
                        <td>Segitiga</td>
                        <td>3</td>
                        <td>
                            <div class="action-buttons">
                                <button class="edit-btn">Edit</button>
                                <button class="delete-btn">Hapus</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <style>
        /* Updated styles to match Dashboard UI */
        .container {
            background-color: #f0f8f0;
            border-radius: 0;
            padding: 20px;
            box-shadow: none;
            max-width: 100%;
            margin: 0;
        }

        .header {
            background-color: #66BB6A;
            padding: 15px 20px;
            border-radius: 5px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            font-weight: normal;
        }

        .header h2 {
            font-size: 18px;
            margin: 0;
        }

        .content-box {
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .sub-header {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .sub-header h3 {
            font-size: 16px;
            margin: 0;
            font-weight: normal;
        }

        .filters {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            align-items: center;
        }

        .category-select {
            padding: 8px 12px;
            border-radius: 20px;
            border: 1px solid #ddd;
            min-width: 150px;
            cursor: pointer;
            background-color: white;
        }

        .add-button {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 8px 15px;
            cursor: pointer;
            display: flex;
            align-items: center;
        }

        .add-icon {
            margin-right: 5px;
        }

        /* Table styling to match Dashboard */
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 0;
            text-align: left;
        }

        .data-table thead {
            background-color: #f5f5f5;
        }

        .data-table th {
            padding: 12px 15px;
            border-bottom: 1px solid #e0e0e0;
            color: #4CAF50;
            font-weight: 600;
        }

        .data-table td {
            padding: 12px 15px;
            border-bottom: 1px solid #e0e0e0;
        }

        .data-table tr:nth-child(even) {
            background-color: #fafafa;
        }

        .action-buttons {
            display: flex;
            gap: 5px;
        }

        .edit-btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 6px 12px;
            font-size: 0.85rem;
            cursor: pointer;
        }

        .delete-btn {
            background-color: #f44336;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 6px 12px;
            font-size: 0.85rem;
            cursor: pointer;
        }
    </style>

    <script>
        // Preserving your existing functionality
        document.querySelector('.add-button').addEventListener('click', function () {
            alert('Fitur tambah soal baru akan ditampilkan');
        });

        document.querySelector('.category-select').addEventListener('click', function () {
            // Changed to work with the select element
            console.log('Kategori dipilih');
        });

        const editButtons = document.querySelectorAll('.edit-btn');
        editButtons.forEach(button => {
            button.addEventListener('click', function () {
                const row = this.closest('tr');
                const no = row.querySelector('td:first-child').textContent;
                alert('Edit soal nomor ' + no);
            });
        });

        const deleteButtons = document.querySelectorAll('.delete-btn');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function () {
                const row = this.closest('tr');
                const no = row.querySelector('td:first-child').textContent;
                if (confirm('Yakin ingin menghapus soal nomor ' + no + '?')) {
                    alert('Soal nomor ' + no + ' telah dihapus');
                }
            });
        });
    </script>
@endsection