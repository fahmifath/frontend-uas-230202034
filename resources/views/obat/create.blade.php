@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Obat</h1>
    <form method="POST" action="{{ route('obat.store') }}">
        @csrf
        <div class="mb-3">
            <label>Nama obat</label>
            <input type="text" name="nama_obat" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Kategori</label>
            <input type="text" name="kategori" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stok" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="Harga" class="form-control" required>
        </div>
        <button class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection