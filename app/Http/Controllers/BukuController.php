<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::orderByRaw('created_at DESC')->get();

        return view('page.keloladata.buku.index', compact('buku'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $buku = new Buku();
        $buku->create($data);

        return redirect()->route('buku.index')->with('message', 'Data Buku Berhasil Ditambahkan');
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $buku = Buku::find($data['id']);
        $buku->update($data);

        return redirect()->route('buku.index')->with('message', 'Data Buku Berhasil Diperbarui');
    }

    public function drop($id)
    {
        $buku = Buku::find($id);
        $buku->delete();

        return redirect()->route('buku.index')->with('message', 'Data Buku Berhasil Diperbarui');
    }
}
