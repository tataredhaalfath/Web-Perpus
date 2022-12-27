<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\LogPinjam;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::with('buku')->with('anggota')->where('status', 'PIN')->orderByRaw('created_at DESC')->get();
        $buku = Buku::all();
        $anggota = Anggota::all();
        return view('page.sirkulasi.index', compact(['peminjaman', 'buku', 'anggota']));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if ($data['tanggal_pinjam'] == null) {
            $data['tanggal_pinjam'] = Date('Y-m-d');
        }

        $data['tanggal_kembali'] = Date('Y-m-d', strtotime('+1 week', strtotime($data['tanggal_pinjam'])));
        $data['status'] = "PIN";

        $peminjaman = new Peminjaman();
        $peminjaman->create($data);

        $logpinjam['id_buku'] = $data['id_buku'];
        $logpinjam['id_anggota'] = $data['id_anggota'];
        $logpinjam['tanggal_pinjam'] = $data['tanggal_pinjam'];

        LogPinjam::create($logpinjam);

        return redirect()->route('peminjaman.index')->with('message', 'Data Peminjaman Behasil di Tambahkan');
    }

    public function perpanjang($id)
    {
        $peminjaman = Peminjaman::find($id);

        $peminjaman['tanggal_pinjam'] = Date('Y-m-d');
        //pengembalian 7 hari
        $peminjaman['tanggal_kembali'] = Date('Y-m-d', strtotime('+1 week', strtotime($peminjaman['tanggal_pinjam'])));
        $peminjaman->update();
        return redirect()->route('peminjaman.index')->with('message', 'Peminjaman Behasil di Perpanjang');
    }

    public function pengembalian($id)
    {
        $peminjaman = Peminjaman::find($id);
        $peminjaman['status'] = "KEM";

        $peminjaman->update();

        return redirect()->route('peminjaman.index')->with('message', 'Buku Behasil di Kembalikan');
    }
}
