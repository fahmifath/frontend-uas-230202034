 @extends('layouts.app') 

 @section('content') 
<div class="container">
    <h1>Data pasien</h1>
    <a href="{{ route('pasien.create') }}" class="btn btn-primary mb-3">Tambah Pasien</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama pasien</th>
                <th>Alamat</th>
                <th>Tanggal lahir</th>
                <th>Jenis kelamin</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pasien as $temp)
            <tr>
                <td>{{ $temp['nama'] }}</td>
                <td>{{ $temp['alamat'] }}</td>
                <td>{{ $temp['tanggal_lahir'] }}</td>
                <td>{{ $temp['jenis_kelamin'] }}</td>
                <td>
                    <a href="{{ route('pasien.edit', $temp['id']) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form method="POST" action="{{ route('pasien.destroy', $temp['id']) }}" style="display:inline;">
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