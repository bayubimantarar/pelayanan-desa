<?php

namespace App\Http\Requests\KAUR\Umum;

use Illuminate\Foundation\Http\FormRequest;

class KeteranganGhoibRequest extends FormRequest
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
            'alamat' => 'required',
            'alasan' => 'required'
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
            'nama.required' => 'Nama perlu diisi',
            'tempat_lahir.required' => 'Tempat lahir perlu diisi.',
            'tanggal_lahir.required' => 'Tanggal lahir perlu diisi.',
            'alamat.required' => 'Alamat perlu diisi.',
            'alasan.required' => 'Alasan perlu diisi.'
        ];
    }
}
