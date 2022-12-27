<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $fillable = ['nis','nama','jenis_kelamin','alamat'];
    protected $table = 'anggota';

    public function Peminjaman(){
        return $this->hasMany(Peminjaman::class,'id_anggota');
    }

    public function LogPinjam(){
        return $this->hasMany(LogPinjam::class,'id_anggota');
    }
}
