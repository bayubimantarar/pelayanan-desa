<?php

namespace App\Http\Requests\KAUR\TantribUmum;

use Illuminate\Foundation\Http\FormRequest;

class KeteranganKehilanganRequest extends FormRequest
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
            'rt' => 'required',
            'rw' => 'required',
            'tertanggal_rt' => 'required',
            'tertanggal_rw' => 'required',
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
            'rt.required' => 'Pengantar RT perlu diisi.',
            'rw.required' => 'Pengantar RW perlu diisi.',
            'tertanggal_rt.required' => 'Tanggal pengantar RT perlu diisi.',
            'tertanggal_rw.required' => 'Tanggal pengantar RW perlu diisi.',
            'alasan.required' => 'Alasan perlu diisi.',
        ];
    }
}
