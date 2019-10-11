<?php

namespace App\Http\Requests\KAUR\Ekbang;

use Illuminate\Foundation\Http\FormRequest;

class KeteranganUsahaRequest extends FormRequest
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
            'jenis_usaha' => 'required',
            'redaksi' => 'required',
            'lokasi' => 'required',
            'keperluan' => 'required'
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
            'jenis_usaha.required' => 'Jenis usaha perlu diisi.',
            'redaksi.required' => 'Redaksi perlu diisi.',
            'lokasi.required' => 'Lokasi perlu diisi.',
            'keperluan.required' => 'Keperluan perlu diisi.'
        ];
    }
}
