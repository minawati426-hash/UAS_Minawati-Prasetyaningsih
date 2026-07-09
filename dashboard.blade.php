@extends('layout.app')

@section('content')

<h2 class="mb-4">Dashboard Admin</h2>

@if($stokMenipis->count() > 0)
<div class="alert alert-warning shadow-sm">
    <strong>⚠️ Perhatian!</strong> Ada {{ $stokMenipis->count() }} buku dengan stok menipis atau habis:
    <ul class="mb-0 mt-2">
        @foreach($stokMenipis as $buku)
            <li>
                {{ $buku->judul }}
                @if($buku->stok == 0)
                    <span class="badge bg-danger">Habis</span>
                @else
                    <span class="badge bg-warning text-dark">Sisa {{ $buku->stok }}</span>
                @endif
            </li>
        @endforeach
    </ul>
</div>
@endif

<div class="row">

    <!-- Total Buku -->
    <div class="col-md-6 mb-4">
        <div class="card text-bg-primary shadow h-100">
            <div class="card-body">
                <h5>Total Buku</h5>
                <h2>{{ $totalBuku }}</h2>
            </div>
        </div>
    </div>

    <!-- Total Anggota -->
    <div class="col-md-6 mb-4">
        <div class="card text-bg-success shadow h-100">
            <div class="card-body">
                <h5>Total Anggota</h5>
                <h2>{{ $totalAnggota }}</h2>
            </div>
        </div>
    </div>

    <!-- Total Peminjaman -->
    <div class="col-md-6 mb-4">
        <div class="card text-bg-warning shadow h-100">
            <div class="card-body">
                <h5>Total Peminjaman</h5>
                <h2>{{ $totalPeminjaman }}</h2>
            </div>
        </div>
    </div>

    <!-- Total Pengembalian -->
    <div class="col-md-6 mb-4">
        <div class="card text-bg-danger shadow h-100">
            <div class="card-body">
                <h5>Total Pengembalian</h5>
                <h2>{{ $totalPengembalian }}</h2>
            </div>
        </div>
    </div>

</div>

<!-- Tabel Buku Terbaru -->

<div class="card shadow">

    <div class="card-header bg-secondary text-white">
        Buku Terbaru
    </div>

    <div class="card-body">

        <table class="table table-bordered table-striped">

            <thead class="table-light">

                <tr>

                    <th>No</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Stok</th>

                </tr>

            </thead>

            <tbody>

                @forelse($bukuTerbaru as $buku)

                <tr>

                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $buku->judul }}</td>
                    <td>{{ $buku->penulis }}</td>
                    <td>
                        @if($buku->stok == 0)
                            <span class="badge bg-danger">Habis</span>
                        @elseif($buku->stok == 1)
                            <span class="badge bg-warning text-dark">{{ $buku->stok }} (Sisa Terakhir)</span>
                        @else
                            <span class="badge bg-success">{{ $buku->stok }}</span>
                        @endif
                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="4" class="text-center">
                        Belum ada data buku.
                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection