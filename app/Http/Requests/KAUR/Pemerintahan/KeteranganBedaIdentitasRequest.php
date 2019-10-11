<?php

namespace App\Http\Requests\KAUR\Pemerintahan;

use Illuminate\Foundation\Http\FormRequest;

class KeteranganBedaIdentitasRequest extends FormRequest
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
            'jumlah_kesalahan' => 'required',
            'data.*' => 'required',
            'keterangan.*' => 'required'
        ];
    }
}
