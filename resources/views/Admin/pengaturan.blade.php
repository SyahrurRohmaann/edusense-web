@extends('layouts.nav')

@section('title', 'Pengaturan')

@section('page-title', 'Pengaturan')

@section('additional-styles')
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
@endsection

@section('content')

    <div>
        <h1>Ini Pengaturan</h1>
    </div>
@endsection

@section('scripts')
    <script>

    </script>
@endsection