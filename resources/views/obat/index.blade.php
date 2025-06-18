 @extends('layouts.app') 

 @section('content') 
<div class="container">
    <h1>Tambah obat</h1>
    <a href="{{ route('obat.create') }}" class="btn btn-primary mb-3">Tambah Obat</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($obat as $temp)
            <tr>
                <td>{{ $temp['nama_obat'] }}</td>
                <td>{{ $temp['kategori'] }}</td>
                <td>{{ $temp['stok'] }}</td>
                <td>{{ $temp['harga'] }}</td>
                <td>
                    <a href="{{ route('obat.edit', $temp['id']) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form method="POST" action="{{ route('obat.destroy', $temp['id']) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin ingin hapus?')" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
 @endsection 