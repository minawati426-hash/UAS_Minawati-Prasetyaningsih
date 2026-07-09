<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Anggota;
use App\Models\Peminjaman;
use App\Models\Pengembalian;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBuku = Buku::count();

        $totalAnggota = Anggota::count();

        $totalPeminjaman = Peminjaman::count();

        $totalPengembalian = Pengembalian::count();

        $bukuTerbaru = Buku::latest()->take(5)->get();

        $stokMenipis = Buku::where('stok', '<=', 1)->orderBy('stok')->get();

        return view('dashboard', compact(
            'totalBuku',
            'totalAnggota',
            'totalPeminjaman',
            'totalPengembalian',
            'bukuTerbaru',
            'stokMenipis'
        ));
    }
}