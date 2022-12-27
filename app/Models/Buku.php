<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $fillable = ['kode_buku', 'judul', 'pengarang', 'penerbit', 'tahun_terbit'];
    protected $table = 'buku';

    public function Peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'id_buku');
    }

    public function LogPinjam()
    {
        return $this->hasMany(LogPinjam::class, 'id_buku');
    }
}
