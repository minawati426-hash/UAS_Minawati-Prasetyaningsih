<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Anggota;
use App\Models\Buku;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjamans = Peminjaman::with('anggota', 'buku')->latest()->get();
        return view('peminjaman.index', compact('peminjamans'));
    }

    public function create()
    {
        $anggotas = Anggota::orderBy('nama')->get();
        $bukus = Buku::where('stok', '>', 0)->orderBy('judul')->get();
        return view('peminjaman.create', compact('anggotas', 'bukus'));
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'anggota_id' => 'required|exists:anggotas,id',
        'buku_id' => 'required|exists:bukus,id',
        'tanggal_pinjam' => 'required|date',
        'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
    ]);

    $buku = Buku::findOrFail($validated['buku_id']);

    if ($buku->stok < 1) {
        return back()->withErrors(['buku_id' => 'Stok buku habis, tidak bisa dipinjam.'])->withInput();
    }

    Peminjaman::create([
        'anggota_id' => $validated['anggota_id'],
        'buku_id' => $validated['buku_id'],
        'tanggal_pinjam' => $validated['tanggal_pinjam'],
        'tanggal_kembali' => $validated['tanggal_kembali'],
        'status' => 'dipinjam',
    ]);

    $buku->decrement('stok');

    $pesan = 'Data peminjaman berhasil disimpan.';
    if ($buku->stok == 0) {
        $pesan .= ' Perhatian: stok buku ini sekarang sudah habis.';
    }

    return redirect()->route('peminjaman.index')->with('success', $pesan);
}

    public function show(Peminjaman $peminjaman)
    {
        $peminjaman->load('anggota', 'buku');
        return view('peminjaman.show', compact('peminjaman'));
    }

    public function edit(Peminjaman $peminjaman)
    {
        $anggotas = Anggota::orderBy('nama')->get();
        $bukus = Buku::orderBy('judul')->get();
        return view('peminjaman.edit', compact('peminjaman', 'anggotas', 'bukus'));
    }

    public function update(Request $request, Peminjaman $peminjaman)
    {
        $validated = $request->validate([
            'anggota_id' => 'required|exists:anggotas,id',
            'buku_id' => 'required|exists:bukus,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
            'status' => 'required|in:dipinjam,dikembalikan',
        ]);

        $peminjaman->update($validated);

        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil diupdate.');
    }

    public function destroy(Peminjaman $peminjaman)
    {
        if ($peminjaman->status == 'dipinjam') {
            return redirect()->route('peminjaman.index')
                ->with('error', 'Tidak bisa menghapus data yang masih berstatus dipinjam.');
        }

        $peminjaman->delete();

        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil dihapus.');
    }
}