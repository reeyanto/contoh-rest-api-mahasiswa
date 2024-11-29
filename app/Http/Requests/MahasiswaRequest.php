<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MahasiswaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'nama'      => 'required|string|min:3',
            'alamat'    => 'required|string|min:3',
            'prodi'     => 'required|string|in:Manajemen Informatika,Teknik Listrik'
        ];

        if(request()->method() == 'POST') {
            $rules['nim'] = 'required|string|digits:10|unique:mahasiswa,nim';
        } else {
            $rules['nim'] = 'required|string|digits:10|unique:mahasiswa,nim,'. $this->route('mahasiswa')->id;
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'nim.required'      => 'Nomor Induk Mahasiswa wajib diisi',
            'nama.required'     => 'Nama wajib diisi',
            'alamat.required'   => 'Alamat wajib diisi',
            'prodi.required'    => 'Pilih salah satu program studi'
        ];
    }
}
