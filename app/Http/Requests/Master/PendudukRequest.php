<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;

class PendudukRequest extends FormRequest
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
            'nik' => 'required|unique:master_penduduk,nik,'.$this->id,
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required'
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
            'nik.required' => 'NIK perlu diisi.',
            'nik.unique' => 'NIK sudah ada.',
            'nama.required' => 'Nama perlu diisi.',
            'tempat_lahir.required' => 'Tempat Lahir perlu diisi.',
            'tanggal_lahir.required' => 'Tanggal Lahir perlu diisi.',
            'pekerjaan.required' => 'Pekerjaan perlu diisi.',
            'alamat.required' => 'Alamat perlu diisi.'
        ];
    }
}
