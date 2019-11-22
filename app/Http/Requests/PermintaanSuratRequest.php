<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermintaanSuratRequest extends FormRequest
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
            'nik' => 'required',
            // 'nama' => 'required',
            'nomor_telepon' => 'required',
            'alamat' => 'required',
            'surat' => 'required',
            'jenis_usaha' => 'required_if:surat,==,Keterangan Usaha',
            'lokasi_usaha' => 'required_if:surat,==,Keterangan Usaha',
            'keperluan_usaha' => 'required_if:surat,==,Keterangan Usaha',
            'rt_skck' => 'required_if:surat,==,Keterangan Catatan Kepolisian (SKCK)',
            'tertanggal_rt_skck' => 'required_if:surat,==,Keterangan Catatan Kepolisian (SKCK)',
            'rw_skck' => 'required_if:surat,==,Keterangan Catatan Kepolisian (SKCK)',
            'tertanggal_rw_skck' => 'required_if:surat,==,Keterangan Catatan Kepolisian (SKCK)',
            'keperluan_skck' => 'required_if:surat,==,Keterangan Catatan Kepolisian (SKCK)',
            'nama_ghoib' => 'required_if:surat,==,Keterangan Ghoib',
            'tempat_lahir_ghoib' => 'required_if:surat,==,Keterangan Ghoib',
            'tanggal_lahir_ghoib' => 'required_if:surat,==,Keterangan Ghoib',
            'alamat_ghoib' => 'required_if:surat,==,Keterangan Ghoib',
            'alasan_ghoib' => 'required_if:surat,==,Keterangan Ghoib',
            'keperluan_bersih_diri' => 'required_if:surat,==,Keterangan Bersih Diri',
            'rt_kehilangan' => 'required_if:surat,==,Keterangan Kehilangan',
            'tertanggal_rt_kehilangan' => 'required_if:surat,==,Keterangan Kehilangan',
            'rw_kehilangan' => 'required_if:surat,==,Keterangan Kehilangan',
            'tertanggal_rw_kehilangan' => 'required_if:surat,==,Keterangan Kehilangan',
            'alasan_kehilangan' => 'required_if:surat,==,Keterangan Kehilangan',
            'rt_izin_rame' => 'required_if:surat,==,Keterangan Izin Rame-Rame',
            'tertanggal_rt_izin_rame' => 'required_if:surat,==,Keterangan Izin Rame-Rame',
            'rw_izin_rame' => 'required_if:surat,==,Keterangan Izin Rame-Rame',
            'tertanggal_rw_izin_rame' => 'required_if:surat,==,Keterangan Izin Rame-Rame',
            'acara' => 'required_if:surat,==,Keterangan Izin Rame-Rame',
            'tanggal_pelaksanaan' => 'required_if:surat,==,Keterangan Izin Rame-Rame',
            'kegiatan' => 'required_if:surat,==,Keterangan Izin Rame-Rame',
            'waktu_pelaksanaan' => 'required_if:surat,==,Keterangan Izin Rame-Rame',
            'alamat_pelaksanaan' => 'required_if:surat,==,Keterangan Izin Rame-Rame',
            'keperluan_domisili' => 'required_if:surat,==,Keterangan Domisili',
            'nama_sktm' => 'required_if:jenis_sktm,==,Pendidikan',
            'tempat_lahir_sktm' => 'required_if:jenis_sktm,==,Pendidikan',
            'tanggal_lahir_sktm' => 'required_if:jenis_sktm,==,Pendidikan',
            'alamat_sekolah' => 'required_if:jenis_sktm,==,Pendidikan',
            'keperluan_sktm' => 'required_if:surat,==,Keterangan Tidak Mampu',
            'nama_anak' => 'sometimes|required_if:surat,==,Keterangan Kelahiran',
            'tanggal_lahir_anak' => 'required_if:surat,==,Keterangan Kelahiran',
            'anak_ke' => 'required_if:surat,==,Keterangan Kelahiran',
            'nama_ayah' => 'required_if:surat,==,Keterangan Kelahiran',
            'nama_ibu' => 'required_if:surat,==,Keterangan Kelahiran',
            'nama_almarhum' => 'required_if:surat,==,Keterangan Kematian',
            'tempat_lahir_almarhum' => 'required_if:surat,==,Keterangan Kematian',
            'tanggal_lahir_almarhum' => 'required_if:surat,==,Keterangan Kematian',
            'tanggal_meninggal' => 'required_if:surat,==,Keterangan Kematian',
            'alamat_meninggal' => 'required_if:surat,==,Keterangan Kematian',
            'penyebab' => 'required_if:surat,==,Keterangan Kematian',
            'hubungan_pelapor' => 'required_if:surat,==,Keterangan Kematian',
            'nama_pensiun' => 'required_if:surat,==,Keterangan Janda atau Duda',
            'tanggal_meninggal_pensiun' => 'required_if:surat,==,Keterangan Janda atau Duda',
            'penghasilan' => 'required_if:surat,==,Keterangan Penghasilan',
            'keperluan_tidak_bekerja' => 'required_if:surat,==,Keterangan Tidak Bekerja',
            'keperluan_belum_menikah' => 'required_if:surat,==,Keterangan Belum Menikah',
            'keperluan_belum_memiliki_rumah' => 'required_if:surat,==,Keterangan Belum Memiliki Rumah'
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
            'nik.required' => 'No. KTP perlu diisi.',
            // 'nama.required' => 'Nama perlu diisi.',
            'nomor_telepon.required' => 'Nomor telepon perlu diisi.',
            'alamat.required' => 'Alamat perlu diisi.',
            'surat.required' => 'Surat perlu dipilih.',
            'jenis_usaha.required_if' => 'Jenis usaha perlu diisi',
            'lokasi_usaha.required_if' => 'Lokasi perlu diisi.',
            'keperluan_usaha.required_if' => 'Keperluan perlu diisi.',
            'rt_skck.required_if' => 'Pengantar RT perlu diisi.',
            'tertanggal_rt_skck.required_if' => 'Tanggal pengantar RT perlu diisi.',
            'rw_skck.required_if' => 'Pengantar RW perlu diisi.',
            'tertanggal_rw_skck.required_if' => 'Tanggal pengantar RW perlu diisi.',
            'keperluan_skck.required_if' => 'Keperluan perlu diisi.',
            'nama_ghoib.required_if' => 'Nama perlu diisi.',
            'tempat_lahir_ghoib.required_if' => 'Tempat lahir perlu diisi.',
            'tanggal_lahir_ghoib.required_if' => 'Tanggal lahir perlu diisi.',
            'alamat_ghoib.required_if' => 'Alamat perlu diisi.',
            'alasan_ghoib.required_if' => 'Alasan perlu diisi.',
            'keperluan_bersih_diri.required_if' => 'Keperluan perlu diisi.',
            'rt_kehilangan.required_if' => 'Pengantar RT perlu diisi.',
            'tertanggal_rt_kehilangan.required_if' => 'Tanggal pengantar RT perlu diisi.',
            'rw_kehilangan.required_if' => 'Pengantar RW perlu diisi.',
            'tertanggal_rw_kehilangan.required_if' => 'Tanggal pengantar RW perlu diisi.',
            'alasan_kehilangan.required_if' => 'Alasan perlu diisi.',
            'rt_izin_rame.required_if' => 'Pengantar RT perlu diisi.',
            'tertanggal_rt_izin_rame.required_if' => 'Tanggal pengantar RT perlu diisi.',
            'rw_izin_rame.required_if' => 'Pengantar RW perlu diisi.',
            'tertanggal_rw_izin_rame.required_if' => 'Tanggal pengantar RW perlu diisi.',
            'acara.required_if' => 'Acara perlu diisi',
            'tanggal_pelaksanaan.required_if' => 'Tanggal pelaksanaan perlu diisi.',
            'kegiatan.required_if' => 'Kegiatan perlu diisi.',
            'waktu_pelaksanaan.required_if' => 'Waktu pelaksanaan perlu diisi.',
            'alamat_pelaksanaan.required_if' => 'Alamat pelaksanaan perlu diisi.',
            'keperluan_domisili.required_if' => 'Keperluan perlu diisi.',
            'nama_sktm.required_if' => 'Nama SKTM perlu diisi.',
            'tempat_lahir_sktm.required_if' => 'Tempat lahir perlu diisi.',
            'tanggal_lahir_sktm.required_if' => 'Tanggal lahir perlu diisi.',
            'alamat_sekolah.required_if' => 'Alamat sekolah perlu diisi.',
            'keperluan_sktm.required_if' => 'Keperluan perlu diisi.',
            'nama_anak.required_if' => 'Nama perlu diisi.',
            'tanggal_lahir_anak.required_if' => 'Tanggal lahir perlu diisi.',
            'anak_ke.required_if' => 'Anak ke perlu diisi.',
            'nama_ayah.required_if' => 'Nama ayah perlu diisi.',
            'nama_ibu.required_if' => 'Nama ibu perlu diisi.',
            'nama_almarhum.required_if' => 'Nama perlu diisi.',
            'tempat_lahir_almarhum.required_if' => 'Tempat lahir perlu diisi.',
            'tanggal_lahir_almarhum.required_if' => 'Tanggal lahir perlu diisi.',
            'tanggal_meninggal.required_if' => 'Tanggal meninggal perlu diisi.',
            'alamat_meninggal.required_if' => 'Meninggal di perlu diisi.',
            'penyebab.required_if' => 'Penyebab perlu diisi.',
            'hubungan_pelapor.required_if' => 'Hubungan pelapor perlu diisi.',
            'nama_pensiun.required_if' => 'Nama perlu diisi.',
            'tanggal_meninggal_pensiun.required_if' => 'Tanggal meninggal perlu diisi.',
            'penghasilan.required_if' => 'Penghasilan perlu diisi.',
            'keperluan_tidak_bekerja.required_if' => 'Keperluan perlu diisi.',
            'keperluan_belum_menikah.required_if' => 'Keperluan perlu diisi.',
            'keperluan_belum_memiliki_rumah.required_if' => 'Keperluan perlu diisi.'
        ];
    }
}
