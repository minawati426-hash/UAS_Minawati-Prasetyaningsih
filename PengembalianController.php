<?php

namespace App\Http\Controllers;

use App\Models\Pengembalian;
use App\Models\Peminjaman;
use App\Models\Buku;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PengembalianController extends Controller
{
    public function index()
{
    $pengembalians = Pengembalian::with('peminjaman.anggota','peminjaman.buku')->get();

    return view('pengembalian.index', compact('pengembalians'));
}
public function create()
{
    $peminjamans = Peminjaman::where('status','Dipinjam')->get();

    return view('pengembalian.create', compact('peminjamans'));
}
public function store(Request $request)
{
    $request->validate([
        'peminjaman_id' => 'required',
        'tanggal_dikembalikan' => 'required|date',
    ]);

    $peminjaman = Peminjaman::findOrFail($request->peminjaman_id);

    $tanggalKembali = Carbon::parse($peminjaman->tanggal_kembali);
    $tanggalDikembalikan = Carbon::parse($request->tanggal_dikembalikan);

    $terlambat = max(0, $tanggalKembali->diffInDays($tanggalDikembalikan, false));

    $denda = $terlambat > 0 ? $terlambat * 25000 : 0;

    Pengembalian::create([
        'peminjaman_id' => $request->peminjaman_id,
        'tanggal_dikembalikan' => $request->tanggal_dikembalikan,
        'denda' => $denda,
    ]);

    $peminjaman->update([
        'status' => 'Dikembalikan'
    ]);

    $buku = Buku::findOrFail($peminjaman->buku_id);
    $buku->increment('stok');

    return redirect()->route('pengembalian.index')
                     ->with('success', 'Buku berhasil dikembalikan.');
}
}
