<?php

namespace App\Mail\Penduduk;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PermintaanSurat extends Mailable
{
    use Queueable, SerializesModels;
    public $tempNama, $tempSurat, $tempKodePermintaanSurat;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nama, $surat, $kodePermintaanSurat)
    {
        $this->tempNama = $nama;
        $this->tempSurat = $surat;
        $this->tempKodePermintaanSurat = $kodePermintaanSurat;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('penduduk_mail_permintaan_surat')
            ->with([
                'nama' => $this->tempNama,
                'surat' => $this->tempSurat,
                'kodePermintaanSurat' => $this->tempKodePermintaanSurat
            ]);
    }
}
