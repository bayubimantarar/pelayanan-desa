<?php

namespace App\Http\Requests\KAUR\TantribUmum;

use Illuminate\Foundation\Http\FormRequest;

class KeteranganIzinRameRequest extends FormRequest
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
            'acara' => 'required',
            'tanggal_pelaksanaan' => 'required',
            'kegiatan' => 'required',
            'waktu_pelaksanaan' => 'required',
            'alamat_pelaksanaan' => 'required'
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
            'redaksi.required' => 'Redaksi perlu diisi.',
            'keperluan.required' => 'Keperluan perlu diisi.',
            'acara.required' => 'Acara perlu diisi',
            'tanggal_pelaksanaan.required' => 'Tanggal pelaksanaan perlu diisi',
            'kegiatan.required' => 'Kegiatan / Hiburan perlu perlu diisi',
            'waktu_pelaksanaan.required' => 'Waktu pelaksanaan perlu diisi',
            'alamat_pelaksanaan.required' => 'Alamat pelaksanaan perlu diisi',
        ];
    }
}
