<?php

namespace App\Http\Requests\KAUR\Kesra;

use Illuminate\Foundation\Http\FormRequest;

class KeteranganKelahiranRequest extends FormRequest
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
            'penduduk_id' => 'required',
            'tempat_lahir_anak' => 'required',
            'tanggal_lahir_anak' => 'required',
            'nama_anak' => 'required',
            'anak_ke' => 'required',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required'
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
            'penduduk_id.required' => 'Identitas peminta berkas perlu diisi.',
            'nama_anak.required' => 'Nama anak perlu diisi.',
            'tempat_lahir_anak.required' => 'Tempat lahir anak perlu diisi.',
            'tanggal_lahir_anak.required' => 'Tanggal lahir anak perlu diisi.',
            'anak_ke.required' => 'Anak ke perlu diisi.',
            'nama_ayah.required' => 'Nama lengkap ayah perlu diisi.',
            'nama_ibu.required' => 'Nama lengkap ibu perlu diisi.'
        ];
    }
}
