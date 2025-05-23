@extends('layouts.nav')

@section('title', 'Manajemen Soal')

@section('page-title', 'Manajemen Soal')

@section('content')
    <div class="container">
        <div class="content-box">

            <div class="filters">
                <select class="category-select">
                    <option selected disabled>Pilihan Kategori</option>
                    <option value="all">Semua Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>

                <button class="add-button" id="tambahSoalBtn">
                    <span class="add-icon">+</span> Tambah Soal Baru
                </button>
            </div>

            <table class="data-table" id="soalTable">
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
                    @forelse($soal as $index => $s)
                        <tr data-category-id="{{ $s->category_id }}">
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $s->category->name }}</td>
                            <td>{{ $s->judul_soal }}</td>
                            <td>
                                @if ($s->gambar)
                                    <img src="{{ asset('assets/' . $s->gambar) }}" alt="gambar" width="100">
                                @else
                                    Tidak ada gambar
                                @endif
                            </td>
                            <td>{{ $s->pertanyaan }}</td>
                            <td>
                                @if ($s->jawaban && Str::endsWith($s->jawaban, ['.jpg', '.jpeg', '.png', '.gif', '.webp']))
                                    <img src="{{ asset('assets/' . $s->jawaban) }}" alt="jawaban" width="100">
                                @else
                                    {{ $s->jawaban }}
                                @endif
                            </td>
                            <td class="action-buttons">
                                <button class="edit-btn" data-id="{{ $s->id }}">Edit</button>
                                <form id="form-delete-{{ $s->id }}" method="POST"
                                    action="{{ route('soal.destroy', $s->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn delete-btn btn-danger btn-sm"
                                        onclick="confirmDelete({{ $s->id }})">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data soal</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div>
                {{ $soal->links() }}
            </div>
        </div>
    </div>

    <div class="modal-overlay" id="soalModalOverlay">
        <div class="modal-dialog">
            <h3 class="modal-title">Tambah/Edit Soal</h3>

            <div class="modal-form">
                <form id="soalForm" enctype="multipart/form-data" method="POST" action="{{ route('soal.store') }}">
                    @csrf
                    <input type="hidden" id="soalId" name="id">

                    <div class="form-group">
                        <label>Jenis Soal</label>
                        <select class="form-control" id="jenisSoal" name="category_id" required>
                            <option value="">-- Pilih Jenis Soal --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Judul Soal</label>
                        <input type="text" class="form-control" id="judulSoal" name="judul_soal" placeholder="Judul Soal"
                            required>
                    </div>

                    <div class="form-group">
                        <label>Gambar (opsional)</label>
                        <input type="file" id="gambarSoalInput" name="gambar" accept="image/*" style="display: none;">
                        <div class="upload-area" id="uploadGambarArea"
                            onclick="document.getElementById('gambarSoalInput').click()">
                            <div class="upload-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19 3H5C3.9 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3ZM19 19H5V5H19V19ZM13.96 12.29L11.21 15.83L9.25 13.47L6.5 17H17.5L13.96 12.29Z"
                                        fill="#555555" />
                                </svg>
                            </div>
                            <div class="upload-text" id="uploadGambarText">Upload Gambar</div>
                            <div id="gambarPreviewContainer" class="image-preview-container" style="display: none;">
                                <img id="gambarPreview" src="" alt="Preview" class="image-preview">
                                <button type="button" id="removeGambar" class="remove-image">×</button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Pertanyaan</label>
                        <input type="text" class="form-control" id="pertanyaan" name="pertanyaan"
                            placeholder="Pertanyaan" required>
                    </div>

                    <div class="form-group">
                        <label>Jawaban (Upload Gambar) <span style="color:red">*</span></label>
                        <input type="file" id="jawabanGambarInput" name="jawaban" accept="image/*" style="display: none;"
                            required>
                        <div class="upload-area" id="uploadJawabanArea"
                            onclick="document.getElementById('jawabanGambarInput').click()">
                            <div class="upload-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19 3H5C3.9 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3ZM19 19H5V5H19V19ZM13.96 12.29L11.21 15.83L9.25 13.47L6.5 17H17.5L13.96 12.29Z"
                                        fill="#555555" />
                                </svg>
                            </div>
                            <div class="upload-text" id="uploadJawabanText">Upload Gambar Jawaban</div>
                            <div id="jawabanPreviewContainer" class="image-preview-container" style="display: none;">
                                <img id="jawabanPreview" src="" alt="Preview" class="image-preview">
                                <button type="button" id="removeJawaban" class="remove-image">×</button>
                            </div>
                        </div>
                    </div>

                    <div class="modal-actions">
                        <button type="button" class="btn-cancel" id="batalBtn">Batal</button>
                        <button type="submit" class="btn-submit" id="simpanBtn">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: '{{ session('success') }}',
                timer: 3000,
                showConfirmButton: false
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: '{{ session('error') }}',
                timer: 3000,
                showConfirmButton: false
            });
        </script>
    @endif

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

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            padding-left: 0;
            list-style: none;
            gap: 4px;
            margin-top: 1rem;
        }

        /* Style untuk tombol */
        .page-item .page-link {
            padding: 6px 12px;
            color: #4CAF50;
            border: 1px solid #dee2e6;
            background-color: #fff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.2s, color 0.2s;
        }

        /* Hover effect */
        .page-item .page-link:hover {
            background-color: #e9ecef;
            color: #1565c0;
        }

        /* Aktif */
        .page-item.active .page-link {
            z-index: 1;
            color: #fff;
            background-color: #4CAF50;
            border-color: #4CAF50;
        }

        /* Disabled (misal prev/next di halaman pertama/terakhir) */
        .page-item.disabled .page-link {
            color: #6c757d;
            pointer-events: none;
            background-color: #fff;
            border-color: #dee2e6;
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
            max-height: 90vh;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            overflow-y: auto;
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
            position: relative;
            min-height: 120px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
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

        .image-preview-container {
            position: relative;
            width: 100%;
            max-width: 200px;
            margin: 0 auto;
        }

        .image-preview {
            width: 100%;
            max-height: 150px;
            object-fit: contain;
            border-radius: 4px;
        }

        .remove-image {
            position: absolute;
            top: -10px;
            right: -10px;
            background-color: #f44336;
            color: white;
            border: none;
            width: 22px;
            height: 22px;
            border-radius: 50%;
            font-size: 16px;
            line-height: 1;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
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
        const soalForm = document.getElementById('soalForm');

        // Gambar Soal elements
        const uploadGambarArea = document.getElementById('uploadGambarArea');
        const gambarSoalInput = document.getElementById('gambarSoalInput');
        const gambarPreview = document.getElementById('gambarPreview');
        const gambarPreviewContainer = document.getElementById('gambarPreviewContainer');
        const uploadGambarText = document.getElementById('uploadGambarText');
        const removeGambar = document.getElementById('removeGambar');

        // Gambar Jawaban elements
        const uploadJawabanArea = document.getElementById('uploadJawabanArea');
        const jawabanGambarInput = document.getElementById('jawabanGambarInput');
        const jawabanPreview = document.getElementById('jawabanPreview');
        const jawabanPreviewContainer = document.getElementById('jawabanPreviewContainer');
        const uploadJawabanText = document.getElementById('uploadJawabanText');
        const removeJawaban = document.getElementById('removeJawaban');

        document.getElementById('batalBtn').addEventListener('click', () => {
            document.getElementById('jenisSoal').value = '';
        });

        // Reset form function
        function resetForm() {
            soalForm.reset();
            document.getElementById('soalId').value = '';
            hideImagePreview(gambarPreviewContainer, uploadGambarText);
            hideImagePreview(jawabanPreviewContainer, uploadJawabanText);
        }

        // Generic show image preview function
        function showImagePreview(file, previewImg, previewContainer, uploadText) {
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    previewContainer.style.display = 'block';
                    uploadText.style.display = 'none';
                };
                reader.readAsDataURL(file);
            }
        }

        // Generic hide image preview function
        function hideImagePreview(previewContainer, uploadText) {
            previewContainer.style.display = 'none';
            uploadText.style.display = 'block';
        }

        // Open modal when "Tambah Soal Baru" button is clicked
        tambahSoalBtn.addEventListener('click', function() {
            resetForm();
            modalOverlay.classList.add('active');
        });

        // Close modal when "Batal" button is clicked
        batalBtn.addEventListener('click', function() {
            modalOverlay.classList.remove('active');
            resetForm();
        });

        // Fixed event handler for Simpan button
        simpanBtn.addEventListener('click', function() {
            // Get form values
            const jenisSoal = document.getElementById('jenisSoal').value.trim();
            const judulSoal = document.getElementById('judulSoal').value.trim();
            const pertanyaan = document.getElementById('pertanyaan').value.trim();
            const soalId = document.getElementById('soalId').value;
            const isEditing = !!soalId;

            // Basic validation
            if (!jenisSoal || !judulSoal || !pertanyaan) {
                Swal.fire({
                    icon: 'error',
                    title: 'Validasi Gagal',
                    text: 'Silakan isi semua field yang diperlukan (Jenis Soal, Judul Soal, dan Pertanyaan)'
                });
                return;
            }

            // Validate gambar/jawaban requirements for new entries
            if (!isEditing) {
                // Jika tambah baru, harus ada jawaban
                if (!jawabanGambarInput.files || jawabanGambarInput.files.length === 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Validasi Gagal',
                        text: 'Silakan upload gambar jawaban'
                    });
                    return;
                }
            }

            // Create FormData object to handle file uploads
            const formData = new FormData(soalForm);

            // Add extra form field for edit mode
            if (isEditing) {
                formData.append('_method', 'PUT'); // For Laravel method spoofing
            }

            // Get CSRF token from the hidden input in the form (more reliable)
            const csrfToken = document.querySelector('input[name="_token"]').value;

            // Show loading indicator
            simpanBtn.textContent = 'Menyimpan...';
            simpanBtn.disabled = true;

            // URL sesuai dengan route yang telah didefinisikan
            const url = isEditing ?
                `/admin/manajemen-soal/${soalId}` :
                '/admin/manajemen-soal';

            // Send data to server
            fetch(url, {
                    method: 'POST', // Even for PUT/PATCH requests we use POST with _method field
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': csrfToken, // Include CSRF token
                        // Don't set Content-Type header when sending FormData
                    },
                    // IMPORTANT: Don't follow redirects automatically
                    redirect: 'manual'
                })
                .then(response => {
                    // Reset button state
                    simpanBtn.textContent = 'Simpan';
                    simpanBtn.disabled = false;

                    // Handle possible redirect (success scenario in Laravel)
                    if (response.type === 'opaqueredirect' || response.redirected || response.status === 302) {
                        // Success - redirect happened (which is common in Laravel form submissions)
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: isEditing ? 'Soal berhasil diperbarui' : 'Soal berhasil ditambahkan',
                            timer: 1500,
                            showConfirmButton: false
                        }).then(() => {
                            window.location.reload();
                        });
                        return;
                    }

                    // If not redirected, try to parse as JSON
                    if (response.ok) {
                        try {
                            return response.json().then(data => {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: isEditing ? 'Soal berhasil diperbarui' :
                                        'Soal berhasil ditambahkan',
                                    timer: 1500,
                                    showConfirmButton: false
                                }).then(() => {
                                    window.location.reload();
                                });
                            });
                        } catch (e) {
                            // If not JSON but still OK, consider it a success
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: isEditing ? 'Soal berhasil diperbarui' :
                                    'Soal berhasil ditambahkan',
                                timer: 1500,
                                showConfirmButton: false
                            }).then(() => {
                                window.location.reload();
                            });
                        }
                    } else {
                        // If server returns an error
                        return response.text().then(text => {
                            try {
                                const err = JSON.parse(text);
                                throw new Error(err.message ||
                                    `Error ${response.status}: ${response.statusText}`);
                            } catch (e) {
                                // If response is not JSON
                                throw new Error(`Error ${response.status}: ${response.statusText}`);
                            }
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);

                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Terjadi kesalahan saat menyimpan data: ' + error.message
                    });

                    // Reset button state
                    simpanBtn.textContent = 'Simpan';
                    simpanBtn.disabled = false;
                });
        });


        // Handle file selection for Gambar Soal
        gambarSoalInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                showImagePreview(file, gambarPreview, gambarPreviewContainer, uploadGambarText);
            }
        });

        // Handle remove image button click for Gambar Soal
        removeGambar.addEventListener('click', function(e) {
            e.stopPropagation(); // Prevent triggering uploadArea click
            hideImagePreview(gambarPreviewContainer, uploadGambarText);
            gambarSoalInput.value = '';
        });


        // Handle file selection for Gambar Jawaban
        jawabanGambarInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                showImagePreview(file, jawabanPreview, jawabanPreviewContainer, uploadJawabanText);
            }
        });

        // Handle remove image button click for Gambar Jawaban
        removeJawaban.addEventListener('click', function(e) {
            e.stopPropagation(); // Prevent triggering uploadArea click
            hideImagePreview(jawabanPreviewContainer, uploadJawabanText);
            jawabanGambarInput.value = '';
        });

        // Close modal if user clicks outside the dialog
        modalOverlay.addEventListener('click', function(e) {
            if (e.target === modalOverlay) {
                modalOverlay.classList.remove('active');
                resetForm();
            }
        });

        // Existing functionality for edit buttons
        const editButtons = document.querySelectorAll('.edit-btn');
        editButtons.forEach(button => {
            button.addEventListener('click', function() {
                const row = this.closest('tr');
                const id = this.getAttribute('data-id');
                const jenisSoal = row.querySelector('td:nth-child(2)').textContent.trim();
                const judulSoal = row.querySelector('td:nth-child(3)').textContent.trim();
                const pertanyaan = row.querySelector('td:nth-child(5)').textContent.trim();

                // Fill the form with existing data
                document.getElementById('soalId').value = id;
                document.getElementById('jenisSoal').value = jenisSoal;
                document.getElementById('judulSoal').value = judulSoal;
                document.getElementById('pertanyaan').value = pertanyaan;

                // Check if there's a soal image
                const soalImgElement = row.querySelector('td:nth-child(4) img');
                if (soalImgElement) {
                    gambarPreview.src = soalImgElement.src;
                    gambarPreviewContainer.style.display = 'block';
                    uploadGambarText.style.display = 'none';
                } else {
                    hideImagePreview(gambarPreviewContainer, uploadGambarText);
                }

                // Check if there's a jawaban image
                const jawabanImgElement = row.querySelector('td:nth-child(6) img');
                if (jawabanImgElement) {
                    jawabanPreview.src = jawabanImgElement.src;
                    jawabanPreviewContainer.style.display = 'block';
                    uploadJawabanText.style.display = 'none';
                } else {
                    hideImagePreview(jawabanPreviewContainer, uploadJawabanText);
                }

                // Show the modal
                modalOverlay.classList.add('active');
            });
        });

        // Improved delete confirmation
        function confirmDelete(id) {
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: 'Data tidak dapat dikembalikan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.getElementById('form-delete-' + id);
                    const formData = new FormData(form);
                    const csrfToken = form.querySelector('input[name="_token"]').value;
                    const url = form.getAttribute('action');

                    fetch(url, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'X-CSRF-TOKEN': csrfToken
                            },
                            redirect: 'manual'
                        })
                        .then(response => {
                            // Handle possible redirect (success scenario in Laravel)
                            if (response.type === 'opaqueredirect' || response.redirected || response.status ===
                                302) {
                                // Success - redirect happened
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: 'Data berhasil dihapus',
                                    timer: 1500,
                                    showConfirmButton: false
                                }).then(() => {
                                    window.location.reload();
                                });
                                return;
                            }

                            if (response.ok) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: 'Data berhasil dihapus',
                                    timer: 1500,
                                    showConfirmButton: false
                                }).then(() => {
                                    window.location.reload();
                                });
                            } else {
                                throw new Error(`Error ${response.status}: ${response.statusText}`);
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: 'Terjadi kesalahan saat menghapus data: ' + error.message
                            });
                        });
                }
            });
        }
        document.querySelector('.category-select').addEventListener('change', function() {
            const selected = this.value;
            const rows = document.querySelectorAll('#soalTable tbody tr');

            rows.forEach(row => {
                const rowCategory = row.getAttribute('data-category-id');
                if (selected === 'all') {
                    row.style.display = '';
                } else {
                    row.style.display = (rowCategory === selected) ? '' : 'none';
                }
            });
        });
    </script>
@endsection
