<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CekPermintaanSuratRequest extends FormRequest
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
            'kode_permintaan_surat' => 'required'
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
            'kode_permintaan_surat.required' => 'Kode permintaan surat perlu diisi'
        ];
    }
}
