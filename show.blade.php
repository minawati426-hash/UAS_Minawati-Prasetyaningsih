@extends('layout.app')

@section('content')
<div class="container-fluid">
    <h3 class="mb-3">Detail Peminjaman</h3>

    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="mb-3">Data Anggota</h5>
                    <table class="table table-borderless mb-0">
                        <tr>
                            <th style="width: 130px;">NIS</th>
                            <td>: {{ $peminjaman->anggota->nis ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td>: {{ $peminjaman->anggota->nama ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Kelas</th>
                            <td>: {{ $peminjaman->anggota->kelas ?? '-' }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <h5 class="mb-3">Data Buku</h5>
                    <table class="table table-borderless mb-0">
                        <tr>
                            <th style="width: 130px;">Kode Buku</th>
                            <td>: {{ $peminjaman->buku->kode_buku ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Judul</th>
                            <td>: {{ $peminjaman->buku->judul ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Kategori</th>
                            <td>: {{ $peminjaman->buku->kategori ?? '-' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-md-4">
                    <strong>Tanggal Pinjam:</strong><br>
                    {{ $peminjaman->tanggal_pinjam->format('d-m-Y') }}
                </div>
                <div class="col-md-4">
                    <strong>Tanggal Kembali:</strong><br>
                    {{ $peminjaman->tanggal_kembali->format('d-m-Y') }}
                </div>
                <div class="col-md-4">
                    <strong>Status:</strong><br>
                    @if($peminjaman->status == 'dipinjam')
                        <span class="badge bg-warning text-dark">Dipinjam</span>
                    @else
                        <span class="badge bg-success">Dikembalikan</span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection