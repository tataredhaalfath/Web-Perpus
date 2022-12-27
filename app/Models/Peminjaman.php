<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $fillable = ['kode_peminjaman','id_buku','id_anggota','tanggal_pinjam','tanggal_kembali','status'];
    protected $table = 'peminjaman';

    public function Buku(){
        return $this->belongsTo(Buku::class,'id_buku');
    }

    public function Anggota(){
        return $this->belongsTo(Anggota::class,'id_anggota');
    }
}
