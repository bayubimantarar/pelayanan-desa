<?php

namespace App\Http\Requests\Profil;

use Illuminate\Foundation\Http\FormRequest;

class PemerintahanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'desa' => 'required',
            'nama_kepala_desa' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'logo' => 'dimensions:max_width=500,max_height=500'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'kabupaten.required' => 'Kabupaten perlu diisi.',
            'kecamatan.required' => 'Kecamatan perlu diisi.',
            'desa.required' => 'Desa perlu diisi.',
            'nama_kepala_desa.required' => 'Nama Kepala Desa perlu diisi.',
            'email.required' => 'Email perlu diisi.',
            'alamat.required' => 'Alamat perlu diisi.',
            'logo.dimensions' => 'Lebar dan tinggi maksimal logo 500 piksel'
        ];
    }
}
