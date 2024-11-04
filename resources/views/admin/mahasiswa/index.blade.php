@extends('admin.app')

@section('content')
    <div class="container-fluid p-0">

        <div class="d-flex justify-content-between">
            <div>
                <h1 class="h3 mb-3">Mahasiswa</h1>
            </div>
            <div>
                <a href="{{ route('mahasiswa.create') }}" class="btn btn-sm btn-primary">Tambah</a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped table-sm table-hover">
                            <thead>
                                <th style="width: 10px">No.</th>
                                <th>NIM</th>
                                <th>Nama Mahasiswa</th>
                                <th>Alamat</th>
                                <th>Program Studi</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @foreach($mahasiswa as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nim }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>{{ $item->prodi }}</td>
                                        <td>
                                            <form action="{{ route('mahasiswa.destroy', $item->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')

                                                <a href="{{ route('mahasiswa.edit', $item->id) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin ingin hapus data ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection