<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = Anggota::OrderByRaw('created_at DESC')->get();

        return view('page.keloladata.anggota.index', compact('anggota'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $anggota = new Anggota();
        $anggota->create($data);

        return redirect()->route('anggota.index')->with('message', 'Data Anggota Berhasil Ditambahkan');
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $anggota = Anggota::find($data['id']);
        $anggota->update($data);

        return redirect()->route('anggota.index')->with('message', 'Data Anggota Berhasil Diperbarui');
    }

    public function drop($id)
    {
        $anggota = Anggota::find($id);
        $anggota->delete();

        return redirect()->route('anggota.index')->with('message', 'Data Anggota Berhasil Diperbarui');
    }
}
