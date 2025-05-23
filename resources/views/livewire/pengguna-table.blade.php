<div>
    <div class="content-header">
        <h3 class="content-title">Daftar Pengguna</h3>
        <div class="search-box mb-3">
            <input type="text" wire:model.debounce.300ms="search" placeholder="Cari Nama User">
        </div>
        <button class="btn btn-primary add-button" id="tambahUserBtn">
            <i class="fas fa-plus add-icon"></i> Tambah User Baru
        </button>
    </div>

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
                                    <button class="btn edit-btn" data-id="{{ $user->id }}"
                                        data-username="{{ $user->username }}" data-email="{{ $user->email }}"
                                        data-role="{{ $user->role }}">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>

                                    <button class="btn delete-btn" data-id="{{ $user->id }}">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
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
