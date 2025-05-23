@extends('layouts.nav')

@section('title', 'Rekap Nilai')

@section('page-title', 'Rekap Nilai')

@section('additional-styles')
    <style>
        .rekap-header {
            background-color: #4CAF50;
            color: white;
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .search-filter-container {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .search-box {
            flex: 1;
            position: relative;
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

        .filter-box {
            display: flex;
            gap: 10px;
        }

        .filter-dropdown {
            padding: 8px 15px;
            border: 1px solid #ddd;
            border-radius: 20px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .date-picker {
            padding: 8px 15px;
            border: 1px solid #ddd;
            border-radius: 20px;
            display: flex;
            align-items: center;
        }

        .table-container {
            margin-bottom: 20px;
        }

        .status-lulus {
            color: #4CAF50;
            font-weight: bold;
        }

        .status-latihan {
            color: #FFC107;
            font-weight: bold;
        }

        .empty-data {
            padding: 13px;
            font-style: italic;
            color: #777;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .btn-import {
            background-color: #FF85E4;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 20px;
            cursor: pointer;
        }

        .btn-export {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 20px;
            cursor: pointer;
        }

        .pagination {
            display: flex;
            justify-content: center;
            padding-left: 0;
            list-style: none;
            gap: 4px;
            margin-top: 1rem;
        }

        .page-item .page-link {
            padding: 6px 12px;
            color: #4CAF50;
            border: 1px solid #dee2e6;
            background-color: #fff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.2s, color 0.2s;
        }

        .page-item .page-link:hover {
            background-color: #e9ecef;
            color: #1565c0;
        }

        .page-item.active .page-link {
            z-index: 1;
            color: #fff;
            background-color: #4CAF50;
            border-color: #4CAF50;
        }

        .page-item.disabled .page-link {
            color: #6c757d;
            pointer-events: none;
            background-color: #fff;
            border-color: #dee2e6;
        }
    </style>

@endsection

@section('content')

    <div class="search-filter-container">
        <div class="search-box mb-3">
            <form method="GET" action="{{ route('rekap-nilai') }}">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari Nama User">
                <button type="submit">🔍</button>
            </form>
        </div>
        <div class="filter-box">
            <div class="filter-dropdown">
                <span>Filter Jenis Permainan</span>
                <span>▼</span>
            </div>
            <div class="date-picker">
                <input type="text" placeholder="dd/mm/yy" readonly>
                <span>📅</span>
            </div>
        </div>
    </div>

    <div class="table-container">
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Nama Anak</th>
                    <th>Jenis Permainan</th>
                    <th>Skor</th>
                    <th>Waktu Bermain</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($rekapNilais as $nilai)
                    <tr>
                        <td>{{ $nilai->nama_anak }}</td>
                        <td>{{ $nilai->jenis_permainan }}</td>
                        <td>{{ $nilai->skor }}</td>
                        <td>{{ $nilai->waktu_bermain }} menit</td>
                        <td>
                            @if ($nilai->skor >= 70)
                                <span class="text-success">LULUS</span>
                            @else
                                <span class="text-warning">PERLU LATIHAN</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center empty-data">Tidak ada data pengguna</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div>
            {{ $rekapNilais->links() }}
        </div>
    </div>

    <div class="action-buttons">
        <button class="btn-import">Import CSV</button>
        <button class="btn-export">Export CSV</button>
    </div>
@endsection

@section('scripts')
    <script>
        // Add any JavaScript functionality here
        document.addEventListener('DOMContentLoaded', function() {
            // Filter dropdown functionality
            const filterDropdown = document.querySelector('.filter-dropdown');
            if (filterDropdown) {
                filterDropdown.addEventListener('click', function() {
                    // Implement dropdown functionality here
                    alert('Filter dropdown clicked');
                });
            }

            // Date picker functionality
            const datePicker = document.querySelector('.date-picker');
            if (datePicker) {
                datePicker.addEventListener('click', function() {
                    // Implement date picker functionality here
                    alert('Date picker clicked');
                });
            }

            // Import CSV button
            const importBtn = document.querySelector('.btn-import');
            if (importBtn) {
                importBtn.addEventListener('click', function() {
                    // Implement import functionality
                    alert('Import CSV clicked');
                });
            }

            // Export CSV button
            const exportBtn = document.querySelector('.btn-export');
            if (exportBtn) {
                exportBtn.addEventListener('click', functionS() {
                    // Implement export functionality
                    alert('Export CSV clicked');
                });
            }
        });
    </script>
@endsection
