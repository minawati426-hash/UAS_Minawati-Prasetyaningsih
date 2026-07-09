<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $fillable = [
        'nis',
        'nama',
        'kelas',
        'alamat',
        'no_hp',
        'email'
    ];

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }
}