@extends('layouts.nav')

@section('title', 'Dashboard')

@section('page-title', 'Dashboard')

@section('content')
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
      @forelse($diagnoses ?? [] as $index => $diagnosis)
      <tr>
      <td>{{ $index + 1 }}</td>
      <td>{{ $diagnosis->tanggal }}</td>
      <td>{{ $diagnosis->nama_peserta }}</td>
      <td>{{ $diagnosis->jurusan_rekomendasi }}</td>
      <td>{{ $diagnosis->presentase }}%</td>
      </tr>
    @empty
      <tr>
      <td>1</td>
      <td>08-02-2025</td>
      <td>adi</td>
      <td>Sistem Informasi</td>
      <td>100%</td>
      </tr>
      <tr>
      <td>2</td>
      <td>09-02-2025</td>
      <td>aya</td>
      <td>Pertanian</td>
      <td>90%</td>
      </tr>
      <tr>
      <td>3</td>
      <td>23-02-2025</td>
      <td>lala</td>
      <td>Perikanan</td>
      <td>97%</td>
      </tr>
      <tr>
      <td>4</td>
      <td>01-02-2025</td>
      <td>dila</td>
      <td>Teknik Informatika</td>
      <td>100%</td>
      </tr>
      <tr>
      <td>5</td>
      <td>03-02-2025</td>
      <td>ghasti</td>
      <td>Teknik Komputer</td>
      <td>100%</td>
      </tr>
      <tr>
      <td>6</td>
      <td>25-02-2025</td>
      <td>ghania</td>
      <td>Hukum</td>
      <td>89%</td>
      </tr>
      <tr>
      <td>7</td>
      <td>09-02-2025</td>
      <td>maylyn</td>
      <td>Sospol</td>
      <td>99%</td>
      </tr>
      <tr>
      <td>8</td>
      <td>11-02-2025</td>
      <td>amanda</td>
      <td>Keperawatan</td>
      <td>100%</td>
      </tr>
    @endforelse
    </tbody>
    </table>
  </div>
@endsection

@section('scripts')
  <script>
    // Handle search
    const searchInput = document.querySelector('.search-print input');
    searchInput.addEventListener('keyup', function () {
    const searchText = this.value.toLowerCase();
    const rows = document.querySelectorAll('tbody tr');

    rows.forEach(row => {
      const namaPeserta = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
      if (namaPeserta.includes(searchText)) {
      row.style.display = '';
      } else {
      row.style.display = 'none';
      }
    });
    });

    // Handle print
    document.querySelector('.search-print button').addEventListener('click', function () {
    window.print();
    });
  </script>
@endsection