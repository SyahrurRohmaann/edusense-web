    @extends('layouts.nav')

    @section('title', 'Manajemen Soal')

    @section('page-title', 'Manajemen Soal')

    @section('content')
        <div class="container">
            <div class="content-box">

                <div class="filters">
                    <select class="category-select" id="categoryFilter">
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
                            <th>Id</th>
                            <th>Jenis Soal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $index => $category)
                            <tr data-category-id="{{ $category->id }}">
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td class="action-buttons">
                                    <button class="edit-btn"
                                        onclick="editSoal({{ $category->id }}, '{{ $category->name }}')">Edit</button>
                                    <form action="{{ route('soal.destroy', $category->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete-btn"
                                            onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Tidak ada data soal</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                {{-- Notifikasi SweetAlert --}}
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

            </div>
        </div>

        {{-- Modal Tambah/Edit Soal --}}
        <div id="soalModalOverlay" class="modal-overlay" style="display:none;">
            <div class="modal-dialog">
                <h3 class="modal-title" id="modalTitle">Tambah Soal Baru</h3>
                <form id="soalForm" action="{{ route('soal.store') }}" method="POST">
                    @csrf
                    <input type="hidden" id="soalId" name="id" value="">

                    <div class="form-group">
                        <label for="jenisSoal">Jenis Soal</label>
                        <input type="text" id="jenisSoal" name="jenis_soal" class="form-control" required>

                    </div>

                    <div class="modal-actions">
                        <button type="button" id="batalBtn" class="btn-cancel">Batal</button>
                        <button type="submit" id="simpanBtn" class="btn-submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        <style>
            /* Styles from your original code */
            /* ... (copy your styles here) ... */
            .container {
                background-color: #f0f8f0;
                border-radius: 0;
                padding: 20px;
                box-shadow: none;
                max-width: 100%;
                margin: 0;
            }

            .content-box {
                background-color: #fff;
                border-radius: 5px;
                padding: 20px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
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

            /* Modal */
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
            // Tampilkan form kosong untuk tambah soal
            document.getElementById('tambahSoalBtn').addEventListener('click', function() {
                document.getElementById('soalId').value = '';
                document.getElementById('jenisSoal').value = '';
                document.getElementById('modalTitle').innerText = 'Tambah Soal Baru';
                document.getElementById('soalForm').action = "{{ route('kelolasoal.store') }}";
                document.getElementById('soalModalOverlay').style.display = 'flex';
            });

            // Isi form untuk mode edit
            function editSoal(id, jenisSoal) {
                document.getElementById('soalId').value = id;
                document.getElementById('jenisSoal').value = jenisSoal;
                document.getElementById('modalTitle').innerText = 'Edit Soal';
                document.getElementById('soalForm').action = `/soal/${id}`; // Pastikan route update sesuai (RESTful)

                // Tambahkan method PUT menggunakan hidden input jika perlu
                let methodInput = document.querySelector('input[name="_method"]');
                if (!methodInput) {
                    methodInput = document.createElement('input');
                    methodInput.setAttribute('type', 'hidden');
                    methodInput.setAttribute('name', '_method');
                    document.getElementById('soalForm').appendChild(methodInput);
                }
                methodInput.value = 'PUT';

                document.getElementById('soalModalOverlay').style.display = 'flex';
            }

            // Batal menutup modal
            document.getElementById('batalBtn').addEventListener('click', function() {
                document.getElementById('soalModalOverlay').style.display = 'none';
                resetFormMethod();
            });

            // Reset form method ketika modal ditutup
            function resetFormMethod() {
                let methodInput = document.querySelector('input[name="_method"]');
                if (methodInput) {
                    methodInput.remove();
                }
            }

            // Filter kategori (opsional, jika ingin filter data di frontend)
            document.getElementById('categoryFilter').addEventListener('change', function() {
                const selected = this.value;
                const rows = document.querySelectorAll('#soalTable tbody tr');
                rows.forEach(row => {
                    if (selected === 'all') {
                        row.style.display = '';
                    } else {
                        row.style.display = (row.dataset.categoryId === selected) ? '' : 'none';
                    }
                });
            });
        </script>
    @endsection
