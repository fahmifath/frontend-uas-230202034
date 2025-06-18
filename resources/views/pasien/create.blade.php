@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Pasien</h1>
    <form method="POST" action="{{ route('pasien.store') }}">
        @csrf
        <div class="mb-3">
            <label>Nama pasien</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tanggal lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Jenis kelamin</label>
            <select name='jenis_kelamin' class='form-control'>
                <option value='L'>L</option>
                <option value='P'>P</option>
            </select>
        </div>
        <button class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection