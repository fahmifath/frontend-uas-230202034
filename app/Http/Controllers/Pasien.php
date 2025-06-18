<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Pasien extends Controller
{
    public function index()
    {
        $response = Http::get('http://localhost:8080/pasien');
        $pasien = $response->json();
        return view('pasien.index', compact('pasien'));
    }

    public function create()
    {
        return view('pasien.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:50',
            'alamat' => 'required|string|max:15',
            'tanggal_lahir' => 'required|string',
            'jenis_kelamin' => 'required|string'
        ]);

        $response = Http::asJson()->post('http://localhost:8080/pasien', [
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin
        ]);

        if ($response->successful()) {
            return redirect()->route('pasien.index')->with('success', 'Berhasil menambahkan pasien.');
        }

        return back()->withErrors(['error' => 'Gagal menambahkan data'])->withInput();
    }

    public function edit($id)
    {
        $response = Http::get("http://localhost:8080/pasien/$id");

        if ($response->successful()) {
            $pasien = $response->json()[0];
            return view('pasien.edit', compact('pasien'));
        }

        return back()->with('error', 'Data tidak ditemukan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:50',
            'alamat' => 'required|string|max:15',
            'tanggal_lahir' => 'required|string',
            'jenis_kelamin' => 'required|string'
        ]);

        $response = Http::put("http://localhost:8080/pasien/$id", $request->all());

        if ($response->successful()) {
            return redirect()->route('pasien.index')->with('success', 'Berhasil mengupdate data.');
        }

        return back()->withErrors(['error' => 'Gagal mengupdate data'])->withInput();
    }

    public function destroy($id)
    {
        $response = Http::delete("http://localhost:8080/pasien/$id");

        if ($response->successful()) {
            return redirect()->route('pasien.index')->with('success', 'Berhasil menghapus data.');
        }

        return back()->with('error', 'Gagal menghapus data.');
    }
}