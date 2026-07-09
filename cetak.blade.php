@extends('layout.app')

@section('content')

<script>
window.onload = function(){
    window.print();
}
</script>

<style>
@media print{

    .sidebar{
        display:none !important;
    }

    .content{
        margin-left:0 !important;
        width:100%;
    }

}
</style>

<h3 class="text-center mb-4">
    LAPORAN TRANSAKSI PERPUSTAKAAN
</h3>

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Nama Anggota</th>
            <th>Judul Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Status</th>
            <th>Denda</th>
        </tr>
    </thead>

    <tbody>

    @foreach($data as $item)

    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item->anggota->nama }}</td>
        <td>{{ $item->buku->judul }}</td>
        <td>{{ $item->tanggal_pinjam }}</td>
        <td>{{ optional($item->pengembalian)->tanggal_dikembalikan?->format('d-m-Y') ?? '-' }}</td>
        <td>{{ $item->status }}</td>
        <td>
            Rp {{ number_format(optional($item->pengembalian)->denda ?? 0,0,',','.') }}
        </td>
    </tr>

    @endforeach

    </tbody>

</table>

@endsection