<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::latest()->get();
        return view('admin.mahasiswa.index', compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nim'       => 'required|string|digits:10|unique:mahasiswa,nim',
            'nama'      => 'required|string|min:3',
            'alamat'    => 'required|string|min:3',
            'prodi'     => 'required|string|in:Manajemen Informatika,Teknik Listrik'
        ], [
            'nim.required'      => 'Nomor Induk Mahasiswa wajib diisi',
            'nama.required'     => 'Nama wajib diisi',
            'alamat.required'   => 'Alamat wajib diisi',
            'prodi.required'    => 'Pilih salah satu program studi'
        ]);

        Mahasiswa::create($validated);
        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        return view('admin.mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $validated = $request->validate([
            'nama'      => 'required|string|min:3',
            'alamat'    => 'required|string|min:3',
            'prodi'     => 'required|string|in:Manajemen Informatika,Teknik Listrik'
        ], [
            'nama.required'     => 'Nama wajib diisi',
            'alamat.required'   => 'Alamat wajib diisi',
            'prodi.required'    => 'Pilih salah satu program studi'
        ]);

        $mahasiswa->update($validated);
        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil dihapus');
    }
}
