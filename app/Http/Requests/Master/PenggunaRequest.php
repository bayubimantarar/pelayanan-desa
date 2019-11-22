<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;

class PenggunaRequest extends FormRequest
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
            'nama' => 'required',
            'email' => 'required|unique:master_pengguna,email,'.$this->id,
            'password' => 'required',
            'nomor_telepon' => 'required',
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
            'nama.required' => 'Nama perlu diisi',
            'email.required' => 'Email perlu diisi',
            'email.unique' => 'Email sudah digunakan',
            'password.required' => 'Kata sandi perlu diisi',
            'nomor_telepon.required' => 'Nomor telepon perlu diisi',
            'alamat.required' => 'Alamat perlu diisi'
        ];
    }
}
