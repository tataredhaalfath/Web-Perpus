<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogPinjam extends Model
{
    use HasFactory;

    protected $fillable = ['id_buku','id_anggota','tanggal_pinjam'];
    protected $table = 'log_pinjam';

    public function Buku(){
        return $this->belongsTo(Buku::class,'id_buku');
    }

    public function Anggota(){
        return $this->belongsTo(Anggota::class,'id_anggota');
    }
}
