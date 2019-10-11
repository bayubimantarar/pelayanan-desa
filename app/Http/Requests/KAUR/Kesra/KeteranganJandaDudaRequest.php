<?php

namespace App\Http\Requests\KAUR\Kesra;

use Illuminate\Foundation\Http\FormRequest;

class KeteranganJandaDudaRequest extends FormRequest
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
            'tanggal_meninggal' => 'required'
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
            'nama.required' => 'Nama lengkap perlu diisi',
            'tanggal_meninggal.required' => 'Tanggal meninggal perlu diisi.'
        ];
    }
}
