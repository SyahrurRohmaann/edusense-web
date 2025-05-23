@extends('layouts.nav')

@section('title', 'Kelola Pengguna')

@section('page-title', 'Kelola Pengguna')

@section('content')
    <div class="content-container">
        <!-- Notifikasi -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!-- Header & Tombol Tambah -->
        <div class="content-header">
            <h3 class="content-title">Daftar Pengguna</h3>
            <div class="search-box mb-3">
                <form method="GET" action="{{ route('pengguna.index') }}">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari Nama User">
                    <button type="submit">🔍</button>
                </form>
            </div>
            <button class="btn btn-primary add-button" id="tambahUserBtn">
                <i class="fas fa-plus add-icon"></i> Tambah User Baru
            </button>
        </div>

        <!-- Tabel Pengguna -->
        <div class="content-box">
            <div class="table-responsive">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="25%">Username</th>
                            <th width="35%">Email</th>
                            <th width="15%">Role</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <span class="role-badge {{ $user->role == 'admin' ? 'admin' : 'user' }}">
                                        {{ ucfirst($user->role) }}
                                    </span>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn edit-btn" data-id="{{ $user->user_id }}"
                                            data-username="{{ $user->username }}" data-email="{{ $user->email }}"
                                            data-role="{{ $user->role }}">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>

                                        <form id="form-delete-{{ $user->user_id }}" method="POST"
                                            action="{{ route('pengguna.destroy', $user->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn delete-btn btn-danger btn-sm"
                                                onclick="confirmDelete({{ $user->id }})">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center empty-data">Tidak ada data pengguna</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="pagination-container">
                {{ $users->links() }}
            </div>
        </div>
    </div>

    <!-- Modal untuk Tambah/Edit User -->
    <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userModalLabel">Tambah User Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="userForm" method="POST" action="{{ route('pengguna.store') }}">
                    @csrf
                    <input type="hidden" id="method" name="_method" value="POST">
                    <input type="hidden" id="userId" name="user_id">

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="form-control" id="role" name="role" required>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                            <small id="passwordHelp" class="form-text text-muted">
                                Minimal 8 karakter. Kosongkan jika tidak ingin mengubah (untuk edit).
                            </small>
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- alert untuk Hapus User -->
    {{-- <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin menghapus user ini?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}


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
        /* Styling untuk Kelola Pengguna */
        .content-container {
            background-color: #f8f9fc;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .content-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .content-title {
            font-size: 18px;
            font-weight: 600;
            color: #333;
            margin: 0;
        }

        .search-box {
            flex: 1;
            position: relative;
            margin-left: 43%;
            max-width: 350px;
        }

        .search-box input {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 20px;
        }

        .search-box button {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #666;
        }

        .add-button {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 8px 16px;
            font-size: 14px;
            display: flex;
            align-items: center;
            transition: background-color 0.3s;
        }

        .add-button:hover {
            background-color: #388E3C;
            color: white;
        }

        .add-icon {
            margin-right: 8px;
        }

        .content-box {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            padding: 0;
            overflow: hidden;
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

        /* Alert styling */
        .alert {
            border-radius: 4px;
            padding: 12px 15px;
            margin-bottom: 20px;
            position: relative;
        }

        .alert-success {
            background-color: #e8f5e9;
            border-left: 4px solid #4CAF50;
            color: #2e7d32;
        }

        .alert-danger {
            background-color: #ffebee;
            border-left: 4px solid #f44336;
            color: #c62828;
        }

        /* Table styling */
        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table thead {
            background-color: #f5f5f5;
        }

        .data-table th {
            padding: 14px 16px;
            text-align: left;
            font-weight: 600;
            color: #4CAF50;
            border-bottom: 1px solid #e0e0e0;
            font-size: 14px;
        }

        .data-table td {
            padding: 14px 16px;
            border-bottom: 1px solid #e0e0e0;
            font-size: 14px;
            color: #444;
        }

        .data-table tr:hover {
            background-color: #f9f9f9;
        }

        .empty-data {
            padding: 30px;
            font-style: italic;
            color: #777;
        }

        /* Badge styling */
        .role-badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 500;
        }

        .role-badge.admin {
            background-color: rgba(76, 175, 80, 0.15);
            color: #2e7d32;
            border: 1px solid rgba(76, 175, 80, 0.4);
        }

        .role-badge.user {
            background-color: rgba(33, 150, 243, 0.15);
            color: #1565c0;
            border: 1px solid rgba(33, 150, 243, 0.4);
        }

        /* Action buttons */
        .action-buttons {
            display: flex;
            gap: 8px;
        }

        .edit-btn {
            background-color: #ff9800;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 6px 12px;
            font-size: 13px;
            display: flex;
            align-items: center;
            gap: 5px;
            transition: background-color 0.3s;
        }

        .edit-btn:hover {
            background-color: #f57c00;
            color: white;
        }

        .delete-btn {
            background-color: #f44336;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 6px 12px;
            font-size: 13px;
            display: flex;
            align-items: center;
            gap: 5px;
            transition: background-color 0.3s;
        }

        .delete-btn:hover {
            background-color: #d32f2f;
            color: white;
        }

        /* Pagination styling */
        .pagination-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            padding: 10px 0;
        }

        /* Modal styling */
        .modal {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            align-items: center;
            z-index: 1000;
            background-color: rgba(0, 0, 0, 0.5);
            display: none;
            justify-content: center;
            visibility: none;
            opacity: 0;
            transition: visibility 0s, opacity 0.3s;
        }

        .modal.fade {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            align-items: center;
            z-index: 1000;
            background-color: rgba(0, 0, 0, 0.5);
            display: none;
            justify-content: center;
            visibility: visible;
            opacity: 100;
            transition: visibility 0s, opacity 0.3s;
        }

        .modal-dialog {
            background-color: #f5f5f5;
            border-radius: 8px;
            margin-top: 8%;
            margin-left: 35%;
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

        .form-control:focus {
            border-color: #4CAF50;
            box-shadow: 0 0 0 0.2rem rgba(76, 175, 80, 0.25);
        }

        .text-muted {
            font-size: 12px;
            margin-top: 5px;
        }

        .btn-secondary {
            background-color: #e0e0e0;
            color: #333;
            border: none;
            border-radius: 4px;
            padding: 8px 16px;
            transition: background-color 0.3s;
        }

        .btn-secondary:hover {
            background-color: #bdbdbd;
        }

        .btn-primary {
            background-color: #4CAF50;
            border: none;
            border-radius: 4px;
            padding: 8px 16px;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #388E3C;
        }

        .btn-danger {
            background-color: #f44336;
            border: none;
            border-radius: 4px;
            padding: 8px 16px;
            transition: background-color 0.3s;
        }

        .btn-danger:hover {
            background-color: #d32f2f;
        }

        /* Styling untuk animasi pop-up */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .modal.fade .modal-dialog {
            transition: transform 0.3s ease-out;
        }

        .modal.show .modal-dialog {
            animation: fadeIn 0.3s ease-out forwards;
        }
    </style>

    <script>
        $(document).ready(function() {
            // Modal Tambah User
            $('#tambahUserBtn').click(function() {
                // Reset form terlebih dahulu
                $('#userForm').trigger('reset');

                // Set judul modal dan nilai default
                $('#userModalLabel').text('Tambah User Baru');
                $('#userForm').attr('action', '/admin/pengguna'); // Sesuaikan dengan route yang benar
                $('#method').val('POST');
                $('#userId').val('');
                $('#username').val('');
                $('#email').val('');
                $('#role').val('user'); // Default ke user
                $('#password').val('').prop('required', true);
                $('#password_confirmation').val('').prop('required', true);
                $('#passwordHelp').show();

                // Tampilkan modal
                $('#userModal').modal('show');
            });

            // Modal Edit User
            $(document).on('click', '.edit-btn', function() {
                const userId = $(this).data('id');
                const username = $(this).data('username');
                const email = $(this).data('email');
                const role = $(this).data('role');

                // Reset form terlebih dahulu
                $('#userForm').trigger('reset');

                // Set judul modal dan nilai form
                $('#userModalLabel').text('Edit User');
                $('#userForm').attr('action', '/admin/pengguna/' + userId);
                $('#method').val('PUT');
                $('#userId').val(userId);
                $('#username').val(username);
                $('#email').val(email);
                $('#role').val(role);
                $('#password').val('').prop('required', false);
                $('#password_confirmation').val('').prop('required', false);
                $('#passwordHelp').show();

                // Tampilkan modal
                $('#userModal').modal('show');
            });

            // Modal Hapus User
            $(document).on('click', '.delete-btn', function() {
                const userId = $(this).data('id');
                $('#deleteForm').attr('action', '/admin/pengguna/' + userId);

                // Tampilkan modal hapus
                $('#deleteModal').modal('show');
            });

            // Reset form saat modal ditutup
            $('#userModal').on('hidden.bs.modal', function() {
                $('#userForm').trigger('reset');
                $('.is-invalid').removeClass('is-invalid');
                $('.invalid-feedback').remove();
            });

            // Validasi form sebelum submit
            $('#userForm').submit(function(e) {
                let isValid = true;

                // Validasi username
                if ($('#username').val().trim() === '') {
                    $('#username').addClass('is-invalid');
                    isValid = false;
                } else {
                    $('#username').removeClass('is-invalid');
                }

                // Validasi email
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test($('#email').val().trim())) {
                    $('#email').addClass('is-invalid');
                    isValid = false;
                } else {
                    $('#email').removeClass('is-invalid');
                }

                // Validasi password jika diisi atau diperlukan
                if ($('#method').val() === 'POST' || $('#password').val() !== '') {
                    if ($('#password').val().length < 8) {
                        $('#password').addClass('is-invalid');
                        isValid = false;
                    } else {
                        $('#password').removeClass('is-invalid');
                    }

                    // Validasi konfirmasi password
                    if ($('#password').val() !== $('#password_confirmation').val()) {
                        $('#password_confirmation').addClass('is-invalid');
                        isValid = false;
                    } else {
                        $('#password_confirmation').removeClass('is-invalid');
                    }
                }

                if (!isValid) {
                    e.preventDefault();
                }
            });
        });

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
                    document.getElementById('form-delete-' + id).submit();
                }
            });
        }
    </script>
@endsection
