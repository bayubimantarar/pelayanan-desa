<?php

namespace App\Http\Requests\KAUR\Pemerintahan;

use Illuminate\Foundation\Http\FormRequest;

class KeteranganDomisiliRequest extends FormRequest
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
            'redaksi' => 'required',
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
            'redaksi.required' => 'Redaksi perlu diisi.',
            'keperluan.required' => 'Keperluan perlu diisi.'
        ];
    }
}
