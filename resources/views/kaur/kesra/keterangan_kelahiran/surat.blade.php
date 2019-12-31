<html>
<head>
  <meta
    http-equiv="Content-Type"
    content="text/html; charset=utf-8"
  />
  <style>
    @font-face {
      font-family: 'Times New Roman';
      src: url({{ storage_path('fonts/times-new-roman.ttf') }}) format("truetype");
    }
    body{
      font-family: 'Times New Roman';
      font-size: 13px;
      margin-right: 50%;
    }
    .header {
      text-align: center;
      position: relative;
    }
    .header img {
      position: absolute;
      padding-left: 50px;
      /*padding-bottom: 25px;*/
      /*margin-top: 3px;*/
    }
    .title {
      text-align: center;
    }
    .underline {
      text-decoration: underline;
      text-transform: uppercase;
    }
    .redaksi-awal {
      /*text-indent: 2.5%;*/
    }
    .text-redaksi-awal{
      text-indent: 2.5%;
    }
    .muatan-data {

    }
    .redaksi-akhir{

    }
  </style>
  <title>Surat Keterangan Kelahiran - {{ $keteranganKelahiran->penduduk->nama }}</title>
</head>
<body>
  <div class="header">
    <img
      src="<?php echo $_SERVER["DOCUMENT_ROOT"].'/uploads/img/'.$profil->logo ?>"
      height="75"
      style=""
    />
    <h3 style="padding-left:50px; margin: 0; text-transform: uppercase;">
      Pemerintahan Kabupaten {{ $profil->kabupaten }} <br />
      Kecamatan {{ $profil->kecamatan }}<br />
      Desa {{ $profil->desa }}
    </h3>
    <small style="margin: 0; padding-left:50px;">
      <b>
        {{ $profil->alamat }}
      </b>
    </small>
  </div>
  <hr size="4" style="margin-top: 5px"/>
  <div class="title">
    <h4 class="underline" style="margin: 0; padding: 10;">
       surat keterangan kelahiran
    </h4>
    <p style="margin: 0; padding: 0;">
      <b>
        Nomor : 474/{{ $total }}/Ds./{{ $romawi }}/2019
      </b>
    </p>
  </div>
  <div class="muatan-data">
    <p style="text-indent: 2.5%; margin: 0; padding: 0;">
      Kepala Desa Cilame Kecamatan Ngamprah Kabupaten Bandung Barat dengan ini menerangkan bahwa :
    </p>
    <table style="padding-left: 5%;">
      <tr>
        <td>Nama</td>
        <td>:</td>
        <td style="text-transform: uppercase;">
          <b>{{ $keteranganKelahiran->penduduk->nama }}</b>
        </td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>Tempat/Tanggal Lahir</td>
        <td>:</td>
        <td>{{ $keteranganKelahiran->penduduk->tempat_lahir }}, {{ $keteranganKelahiran->penduduk->tanggal_lahir }}</td>
        <td>Jenis Kelamin</td>
        <td>:</td>
        <td>{{ $keteranganKelahiran->jenis_kelamin_anak === 'Laki-laki' ? 'L' : 'P' }}</td>
      </tr>
      <tr>
        <td>Hari/Waktu</td>
        <td>:</td>
        <td>{{ $keteranganKelahiran->hari_lahir_anak }} / {{ $keteranganKelahiran->jam_lahir_anak }}</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>Anak Ke</td>
        <td>:</td>
        <td>{{ $keteranganKelahiran->anak_ke }}</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td>:</td>
        <td>{{ $keteranganKelahiran->penduduk->alamat }}</td><td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    </table>
    <p style="text-indent: 2.5%;">
      Adalah anak dari pasangan suami / istri :
    </p>
    <table style="padding-left: 5%;">
      <tr>
        <td>Nama</td>
        <td>:</td>
        <td style="text-transform: uppercase;" width="150">
          <b>{{ $keteranganKelahiran->nama_ayah }}</b>
        </td>
        <td>Umur</td>
        <td>:</td>
        <td>{{ $keteranganKelahiran->umur_ayah }} Tahun</td>
      </tr>
      <tr>
        <td>Agama</td>
        <td>:</td>
        <td>{{ $keteranganKelahiran->agama_ayah }}</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>Pekerjaan</td>
        <td>:</td>
        <td>{{ $keteranganKelahiran->pekerjaan_ayah }}</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td>:</td>
        <td>{{ $keteranganKelahiran->alamat_ayah }}</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    </table>
    <table style="padding-left: 5%; padding-top: 10px;">
      <tr>
        <td>Nama</td>
        <td>:</td>
        <td style="text-transform: uppercase;" width="150">
          <b>{{ $keteranganKelahiran->nama_ibu }}</b>
        </td>
        <td>Umur</td>
        <td>:</td>
        <td>{{ $keteranganKelahiran->umur_ibu }} Tahun</td>
      </tr>
      <tr>
        <td>Agama</td>
        <td>:</td>
        <td>{{ $keteranganKelahiran->agama_ibu }}</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>Pekerjaan</td>
        <td>:</td>
        <td>{{ $keteranganKelahiran->pekerjaan_ibu }}</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td>:</td>
        <td>{{ $keteranganKelahiran->alamat_ibu }}</td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    </table>
  </div>
  <div class="keterangan">
    <p style="text-indent: 2.5%;">
      Demikian surat keterangan ini dibuat untuk dipergunakan sebagaimana mestinya dan akan diadakan perubahan atau pembatalan jika terdapat kekeliruan.
    </p>
  </div>
  <div class="tanda-tangan">
    <table align="right">
      <tr>
        <td><center>Cilame, {{ $date }}</center></td>
      </tr>
      <tr>
        <td>
          @if($keteranganKelahiran->perangkat_id != 0)
            <center>
              <b style="text-transform: uppercase;">
                {{ $keteranganKelahiran->profil_perangkat->jabatan }}
              </b>
            </center>
          @else
            <center>
              <b style="text-transform: uppercase;">
                {{ $profil->nama_kepala_desa }}
              </b>
            </center>
          @endif
        </td>
      </tr>
      <tr>
        <td></td>
      </tr>
      <tr>
        <td></td>
      </tr>
      <tr>
        <td></td>
      </tr>
      <tr>
        <td></td>
      </tr>
      <tr>
        <td></td>
      </tr>
      <tr>
        <td></td>
      </tr>
      <tr>
        <td></td>
      </tr>
      <tr>
        <td></td>
      </tr>
      <tr>
        <td></td>
      </tr>
      <tr>
        <td></td>
      </tr>
      <tr>
        <td></td>
      </tr>
      <tr>
        <td></td>
      </tr>
      <tr>
        <td></td>
      </tr>
      <tr>
        <td></td>
      </tr>
      <tr>
        <td></td>
      </tr>
      <tr>
        <td></td>
      </tr>
      <tr>
        <td></td>
      </tr>
      <tr>
        <td></td>
      </tr>
      <tr>
        <td></td>
      </tr>
      <tr>
        <td></td>
      </tr>
      <tr>
        <td></td>
      </tr>
      <tr>
        <td></td>
      </tr>
      <tr>
        <td style="text-transform: uppercase;" width="200">
          <center>
            <b>
              @if($keteranganKelahiran->perangkat_id != 0)
                <u>
                  {{ $keteranganKelahiran->profil_perangkat->nama }}
                </u>
              @else
                <hr style="width: 200px;" />
              @endif
            </b>
          </center>
        </td>
      </tr>
    </table>
  </div>
</body>
</html>
