<?php

namespace App\Http\Requests\KAUR\Pemerintahan;

use Illuminate\Foundation\Http\FormRequest;

class KeteranganKKSementaraRequest extends FormRequest
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
            'penduduk_id' => 'required'
        ];
    }
}
