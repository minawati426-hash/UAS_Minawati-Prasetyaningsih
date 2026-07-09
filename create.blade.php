@extends('layout.app')

@section('content')

<div class="container mt-4">

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Tambah Pengembalian</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('pengembalian.store') }}" method="POST">

                @csrf

                <div class="mb-3">
                    <label class="form-label">Pilih Peminjaman</label>
                    <select name="peminjaman_id" class="form-select">
                        @foreach($peminjamans as $pinjam)
                            <option value="{{ $pinjam->id }}">
                                {{ $pinjam->anggota->nama }} - {{ $pinjam->buku->judul }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Dikembalikan</label>
                    <input type="date"
                           name="tanggal_dikembalikan"
                           class="form-control">
                </div>

                <button type="submit" class="btn btn-success">
                    Simpan
                </button>

                <a href="{{ route('pengembalian.index') }}" class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>
    </div>

</div>

@endsection