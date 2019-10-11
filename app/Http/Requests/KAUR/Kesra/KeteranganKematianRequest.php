<?php

namespace App\Http\Requests\KAUR\Kesra;

use Illuminate\Foundation\Http\FormRequest;

class KeteranganKematianRequest extends FormRequest
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
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'tanggal_meninggal' => 'required',
            'alamat_meninggal' => 'required',
            'penyebab_meninggal' => 'required',
            'hubungan_pelapor' => 'required'
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
            'nama.required' => 'Nama lengkap perlu diisi.',
            'tempat_lahir.required' => 'Tempat lahir perlu diisi.',
            'tanggal_lahir.required' => 'Tanggal lahir perlu diisi.',
            'tanggal_meninggal.required' => 'Tanggal meninggal perlu diisi.',
            'alamat_meninggal.required' => 'Meninggal di perlu diisi.',
            'penyebab_meninggal.required' => 'Penyebab meninggal perlu diisi.',
            'hubungan_pelapor.required' => 'Hubungan pelapor perlu diisi.'
        ];
    }
}
