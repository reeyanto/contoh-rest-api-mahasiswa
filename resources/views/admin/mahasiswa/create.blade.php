@extends('admin.app')

@section('content')
    <div class="container-fluid p-0">

        <div class="d-flex justify-content-between">
            <div>
                <h1 class="h3 mb-3">Mahasiswa</h1>
            </div>
            <div>
                <a href="{{ route('mahasiswa.index') }}" class="btn btn-sm btn-outline-primary">Kembali</a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('mahasiswa.store') }}" method="post">
                            @csrf
                            
                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <div class="mb-3">
                                        <label for="nim">Nomor Induk Mahasiswa <span class="text-danger">*</span></label>
                                        <input type="text" name="nim" value="{{ old('nim') }}" autocomplete="off" class="form-control @error('nim') is-invalid @enderror" placeholder="Nomor Induk Mahasiswa">
                                        @error('nim')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="mb-3">
                                        <label for="nama">Nama Mahasiswa <span class="text-danger">*</span></label>
                                        <input type="text" name="nama" value="{{ old('nama') }}" autocomplete="off" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Mahasiswa">
                                        @error('nama')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="alamat">Alamat <span class="text-danger">*</span></label>
                                        <textarea name="alamat" id="alamat" rows="3" autocomplete="off" class="form-control" style="resize: none" placeholder="Alamat">{{ old('alamat') }}</textarea>
                                        @error('alamat')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <div class="mb-3">
                                        <label for="prodi">Program Studi <span class="text-danger">*</span></label>
                                        <select name="prodi" id="prodi" class="form-control">
                                            <option value="">Pilih Program Studi</option>
                                            <option value="Manajemen Informatika" {{ old('prodi') == 'Manajemen Informatika' ? 'selected' : '' }}>Manajemen Informatika</option>
                                            <option value="Teknik Listrik" {{ old('prodi') == 'Teknik Listrik' ? 'selected' : '' }}>Teknik Listrik</option>
                                        </select>
                                        @error('prodi')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection