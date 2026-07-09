<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;

class LaporanController extends Controller
{
    public function index()
    {
        $data = Peminjaman::with([
            'anggota',
            'buku',
            'pengembalian'
        ])->get();

        return view('laporan.index', compact('data'));
    }

    public function cetak()
    {
        $data = Peminjaman::with([
            'anggota',
            'buku',
            'pengembalian'
        ])->get();

        return view('laporan.cetak', compact('data'));
    }
}