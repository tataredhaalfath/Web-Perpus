<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('page.pengguna.index', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:password_confirmation|min:8',
            'password_confirmation' => 'required|same:password|min:8'
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        User::create($data);

        return redirect()->route('pengguna.index')->with('message', 'Pengguna Baru Berhasil di Tambahkan');
    }

    public function update(Request $request)
    {
        $user = User::find($request['id']);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);

        $user->update($data);
        return redirect()->route('pengguna.index')->with('message', 'Data pengguna berhasil diubah');
    }

    public function changeToAdmin(Request $request)
    {
        $user = User::find($request['id']);
        $user['role'] = 'admin';

        $user->update();
        return redirect()->route('pengguna.index')->with('message', 'Hak Akses Pengguna Berhasil di Ubah');
    }

    public function drop($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('pengguna.index')->with('message', 'Pengguna Berhasil di Hapus');
    }
}
