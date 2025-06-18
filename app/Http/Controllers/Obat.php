<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Obat extends Controller
{
    public function index()
    {
        $response = Http::get('http://localhost:8080/obat');
        $obat = $response->json();
        return view('obat.index', compact('obat'));
    }

    public function create()
    {
        return view('obat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_obat' => 'required|string|max:50',
            'kategori' => 'required|string|max:15',
            'stok' => 'required|integer',
            'harga' => 'required|integer'
        ]);

        $response = Http::asJson()->post('http://localhost:8080/obat', [
            'nama_obat' => $request->nama_obat,
            'kategori' => $request->kategori,
            'stok' => $request->stok,
            'harga' => $request->harga
        ]);

        if ($response->successful()) {
            return redirect()->route('obat.index')->with('success', 'Berhasil menambahkan obat.');
        }

        return back()->withErrors(['error' => 'Gagal menambahkan data'])->withInput();
    }

    public function edit($id)
    {
        $response = Http::get("http://localhost:8080/obat/$id");

        if ($response->successful()) {
            $obat = $response->json()[0];
            return view('obat.edit', compact('obat'));
        }

        return back()->with('error', 'Data tidak ditemukan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_obat' => 'required|string|max:50',
            'kategori' => 'required|string|max:15',
            'stok' => 'required|integer',
            'harga' => 'required|integer'
        ]);

        $response = Http::put("http://localhost:8080/obat/$id", $request->all());

        if ($response->successful()) {
            return redirect()->route('obat.index')->with('success', 'Berhasil mengupdate data.');
        }

        return back()->withErrors(['error' => 'Gagal mengupdate data'])->withInput();
    }

    public function destroy($id)
    {
        $response = Http::delete("http://localhost:8080/obat/$id");

        if ($response->successful()) {
            return redirect()->route('obat.index')->with('success', 'Berhasil menghapus data.');
        }

        return back()->with('error', 'Gagal menghapus data.');
    }
}