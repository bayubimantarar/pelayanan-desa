<?php

namespace App\Http\Requests\KAUR\Kesra;

use Illuminate\Foundation\Http\FormRequest;

class SKTMRequest extends FormRequest
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
            'jenis_sktm' => 'required',
            'nama' => 'required_if:jenis_sktm,==,Pendidikan',
            'tempat_lahir' => 'required_if:jenis_sktm,==,Pendidikan',
            'tanggal_lahir' => 'required_if:jenis_sktm,==,Pendidikan',
            'jenis_kelamin' => 'required_if:jenis_sktm,==,Pendidikan',
            'nama_sekolah' => 'required_if:jenis_sktm,==,Pendidikan',
            'alamat_sekolah' => 'required_if:jenis_sktm,==,Pendidikan',
            'redaksi' => 'required',
            'keperluan' => 'required',
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
            'jenis_sktm.required' => 'Jenis SKTM perlu dipilih.',
            'nama.required_if' => 'Nama perlu diisi.',
            'tempat_lahir.required_if' => 'Nama perlu diisi.',
            'tanggal_lahir.required_if' => 'Tanggal lahir perlu diisi.',
            'jenis_kelamin.required_if' => 'Jenis kelamin perlu dipilih.',
            'nama_sekolah.required_if' => 'Nama sekolah / institusi perlu diisi.',
            'alamat_sekolah.required_if' => 'Alamat sekolah / institusi perlu diisi.',
            'keperluan.required' => 'Keperluan perlu diisi.'
        ];
    }
}
