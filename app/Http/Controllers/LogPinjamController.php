<?php

namespace App\Http\Controllers;

use App\Models\LogPinjam;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class LogPinjamController extends Controller
{
    public function peminjaman()
    {
        $peminjaman = LogPinjam::with('buku')->with('anggota')->orderByRaw('created_at DESC')->get();

        return view('page.logdata.peminjaman.index', compact('peminjaman'));
    }

    public function pengembalian()
    {
        $pengembalian = Peminjaman::with('buku')->with('anggota')->where('status', 'KEM')->orderByRaw('created_at DESC')->get();

        return view('page.logdata.pengembalian.index', compact('pengembalian'));
    }
}
