@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Pasien</h1>
    <form method="POST" action="{{ route('pasien.update', $pasien['id']) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nama Pasien</label>
            <input type="text" name="nama" class="form-control" value="{{ $pasien['nama'] }}" required>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" value="{{ $pasien['alamat'] }}" required>
        </div>
        <div class="mb-3">
            <label>Tanggal lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control" value="{{ $pasien['tanggal_lahir'] }}" required>
        </div>
        <div class="mb-3">
            <label>Jenis kelamin</label>
                <option value='{{ $pasien['jenis_kelamin'] }}' selected>{{ $pasien['jenis_kelamin'] }}</option>
                <option value='L'>L</option>
                <option value='P'>P</option>
            </select>
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection