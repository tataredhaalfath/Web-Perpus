<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\LogPinjam;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $buku = Buku::count();
        $anggota = Anggota::count();
        $pengguna = User::count();
        $sirkulasi = Peminjaman::where('status', 'PIN')->count();
        $pengembalian = Peminjaman::where('status', 'PIN')->count();
        return view('page.dashboard',compact(['buku','anggota','pengguna','sirkulasi','pengembalian']));
    }
}
