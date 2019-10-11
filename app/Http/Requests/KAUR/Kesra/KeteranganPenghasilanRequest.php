<?php

namespace App\Http\Requests\KAUR\Kesra;

use Illuminate\Foundation\Http\FormRequest;

class KeteranganPenghasilanRequest extends FormRequest
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
            'penghasilan' => 'required',
            'redaksi' => 'required'
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
            'penghasilan.required' => 'Penghasilan perlu diisi.',
            'redaksi.required' => 'Redaksi perlu diisi.',
        ];
    }
}
