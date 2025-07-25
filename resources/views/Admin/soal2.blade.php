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

                <button class="add-button"id="tambahSoalBtn">
                        <span class="add-icon">+</span> Tambah Soal Baru
                    </button>
                </div>

                <table class="data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenis Soal</th>
                            <th>Judul Soal</th>
                            <th>Gambar</th>
                            <th>Pertanyaan</th>
                            <th>Jawaban</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Tebak Gambar</td>
                            <td>gajah</td>
                            <td>gajah.png</td>
                            <td>temukan hewan gajah?</td>
                            <td>gajah.png</td>
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
                            <td>gajah</td>
                            <td>gajah.png</td>
                            <td>temukan hewan gajah?</td>
                            <td>gajah.png</td>
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
                            <td>pisang</td>
                            <td>pisang.png</td>
                            <td>temukan buah pisang?</td>
                            <td>pisang.png</td>
                            <td>
                                <div class="action-buttons">
                                    <button class="edit-btn">Edit</button>
                                    <button class="delete-btn">Hapus</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Tebak Bentuk</td>
                            <td>segitiga</td>
                            <td>segitiga.png</td>
                            <td>temukan bentuk segitiga?</td>
                            <td>segitiga.png</td>
                            <td>
                                <div class="action-buttons">
                                    <button class="edit-btn">Edit</button>
                                    <button class="delete-btn">Hapus</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Tebak Huruf</td>
                            <td>A</td>
                            <td>A.png</td>
                            <td>temukan Hurif A?</td>
                            <td>A.png</td>
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

        <!-- Floating Dialog for Tambah/Edit Soal -->
        <div class="modal-overlay" id="soalModalOverlay">
            <div class="modal-dialog">
                <h3 class="modal-title">Tambah/Edit Soal</h3>

                <div class="modal-form">
                    <div class="form-group">
                        <label>Jenis Soal</label>
                        <input type="text" class="form-control" id="jenisSoal" placeholder="Jenis Soal">
                    </div>

                    <div class="form-group">
                        <label>Judul Soal</label>
                        <input type="text" class="form-control" id="judulSoal" placeholder="Judul Soal">
                    </div>

                    <div class="form-group">
                        <label>Gambar</label>
                        <div class="upload-area" id="uploadArea">
                            <div class="upload-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19 3H5C3.9 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3ZM19 19H5V5H19V19ZM13.96 12.29L11.21 15.83L9.25 13.47L6.5 17H17.5L13.96 12.29Z" fill="#555555"/>
                                </svg>
                            </div>
                            <div class="upload-text">Upload Gambar</div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Pertanyaan</label>
                        <input type="text" class="form-control" id="jawabanBenar" placeholder="Jawaban Benar">
                    </div>
                    <div class="form-group">
                        <label>Jawaban</label>
                        <input type="text" class="form-control" id="jawabanBenar" placeholder="Jawaban Benar">
                    </div>
                </div>

                <div class="modal-actions">
                    <button class="btn-cancel" id="batalBtn">Batal</button>
                    <button class="btn-submit" id="simpanBtn">Simpan</button>
                </div>
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

            /* Modal/Dialog styling */
            .modal-overlay {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: rgba(0, 0, 0, 0.5);
                display: flex;
                justify-content: center;
                align-items: center;
                z-index: 1000;
                visibility: hidden;
                opacity: 0;
                transition: visibility 0s, opacity 0.3s;
            }

            .modal-overlay.active {
                visibility: visible;
                opacity: 1;
            }

            .modal-dialog {
                background-color: #f5f5f5;
                border-radius: 8px;
                width: 500px;
                max-width: 90%;
                padding: 20px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            }

            .modal-title {
                text-align: center;
                color: #333;
                margin-bottom: 20px;
                font-size: 18px;
                font-weight: 600;
            }

            .modal-form {
                margin-bottom: 20px;
            }

            .form-group {
                margin-bottom: 15px;
            }

            .form-group label {
                display: block;
                margin-bottom: 5px;
                font-size: 14px;
                color: #555;
            }

            .form-control {
                width: 100%;
                padding: 10px;
                border: 1px solid #ddd;
                border-radius: 4px;
                font-size: 14px;
            }

            .upload-area {
                border: 1px dashed #ccc;
                border-radius: 4px;
                padding: 20px;
                text-align: center;
                cursor: pointer;
                transition: background-color 0.3s;
            }

            .upload-area:hover {
                background-color: #f0f0f0;
            }

            .upload-icon {
                margin-bottom: 10px;
            }

            .upload-text {
                font-size: 14px;
                color: #555;
            }

            .modal-actions {
                display: flex;
                justify-content: center;
                gap: 10px;
            }

            .btn-cancel {
                background-color: #f5f5f5;
                border: 1px solid #ddd;
                color: #555;
                padding: 8px 20px;
                border-radius: 20px;
                cursor: pointer;
                font-size: 14px;
            }

            .btn-submit {
                background-color: #4CAF50;
                border: none;
                color: white;
                padding: 8px 20px;
                border-radius: 20px;
                cursor: pointer;
                font-size: 14px;
            }
        </style>

        <script>
            // Get modal elements
            const modalOverlay = document.getElementById('soalModalOverlay');
            const tambahSoalBtn = document.getElementById('tambahSoalBtn');
            const batalBtn = document.getElementById('batalBtn');
            const simpanBtn = document.getElementById('simpanBtn');
            const uploadArea = document.getElementById('uploadArea');

            // Open modal when "Tambah Soal Baru" button is clicked
            tambahSoalBtn.addEventListener('click', function() {
                modalOverlay.classList.add('active');
            });

            // Close modal when "Batal" button is clicked
            batalBtn.addEventListener('click', function() {
                modalOverlay.classList.remove('active');
            });

            // Handle "Simpan" button click
            simpanBtn.addEventListener('click', function() {
                // Get form values
                const jenisSoal = document.getElementById('jenisSoal').value;
                const judulSoal = document.getElementById('judulSoal').value;
                const jawabanBenar = document.getElementById('jawabanBenar').value;

                // Basic validation
                if (!jenisSoal || !judulSoal || !jawabanBenar) {
                    alert('Silakan isi semua field yang diperlukan');
                    return;
                }

                // Here you would normally send data to your server
                alert('Soal berhasil disimpan');

                // Close the modal
                modalOverlay.classList.remove('active');
            });

            // Handle upload area click
            uploadArea.addEventListener('click', function() {
                // Simulate file input click
                alert('Fitur upload gambar akan ditampilkan');
            });

            // Close modal if user clicks outside the dialog
            modalOverlay.addEventListener('click', function(e) {
                if (e.target === modalOverlay) {
                    modalOverlay.classList.remove('active');
                }
            });

            // Existing functionality for edit buttons
            const editButtons = document.querySelectorAll('.edit-btn');
            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const row = this.closest('tr');
                    const no = row.querySelector('td:first-child').textContent;
                    const jenisSoal = row.querySelector('td:nth-child(2)').textContent;
                    const judulSoal = row.querySelector('td:nth-child(3)').textContent;

                    // Fill the form with existing data
                    document.getElementById('jenisSoal').value = jenisSoal;
                    document.getElementById('judulSoal').value = judulSoal;

                    // Show the modal
                    modalOverlay.classList.add('active');
                });
            });

            // Existing functionality for delete buttons
            const deleteButtons = document.querySelectorAll('.delete-btn');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const row = this.closest('tr');
                    const no = row.querySelector('td:first-child').textContent;
                    if (confirm('Yakin ingin menghapus soal nomor ' + no + '?')) {
                        alert('Soal nomor ' + no + ' telah dihapus');
                    }
                });
            });
        </script>
@endsection