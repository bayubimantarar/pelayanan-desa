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
      margin-left: 45px;
      margin-right: 45px;
    }
    .header {
      text-align: center;
      position: relative;
    }
    .header img {
      position: absolute;
      margin-top: 3px;
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
  <title>Surat Keterangan Beda Identitas - {{ $keteranganBedaIdentitas->penduduk->nama }}</title>
</head>
<body>
  <div class="header">
    <img
      src="<?php echo $_SERVER["DOCUMENT_ROOT"].'/uploads/img/'.$profil->logo ?>"
      height="75"
      style=""
    />
    <h3 style="margin: 0; padding: 0; text-transform: uppercase;">
      Pemerintahan Kabupaten {{ $profil->kabupaten }} <br />
      Kecamatan {{ $profil->kecamatan }}<br />
      Desa {{ $profil->desa }}
    </h3>
    <small style="margin: 0; padding: 0;">
      <b>
        {{ $profil->alamat }}
      </b>
    </small>
  </div>
  <hr size="4" style="margin: 0; padding: 0;"/>
  <div class="title">
    <h4 class="underline" style="margin: 0; padding: 10;">
       surat keterangan beda identitas
    </h4>
    <p style="margin: 0; padding: 0;">
      <b>
        Nomor : 474/{{ $total }}/Ds./{{ $romawi }}/2019
      </b>
    </p>
  </div>
  <div class="redaksi-awal">
    <p class="text-redaksi-awal" style="">
      Kepala Desa {{ $profil->desa }} Kecamatan {{ $profil->kecamatan }} Kabupaten {{ $profil->kabupaten }} dengan ini menerangkan bahwa :
    </p>
  </div>
  <div class="muatan-data">
    <table style="padding-left: 5%;">
      <tr>
        <td>Nama</td>
        <td>:</td>
        <td style="text-transform: uppercase;">
          <b>{{ $keteranganBedaIdentitas->penduduk->nama }}</b>
        </td>
      </tr>
      <tr>
        <td>Tempat / Tanggal Lahir</td>
        <td>:</td>
        <td>{{ $keteranganBedaIdentitas->penduduk->tempat_lahir }}, {{ $keteranganBedaIdentitas->penduduk->tanggal_lahir }}</td>
      </tr>
      <tr>
        <td>Jenis Kelamin</td>
        <td>:</td>
        <td>{{ $keteranganBedaIdentitas->penduduk->jenis_kelamin }}</td>
      </tr>
      <tr>
        <td>Status Perkawinan</td>
        <td>:</td>
        <td>{{ $keteranganBedaIdentitas->penduduk->status_perkawinan }}</td>
      </tr>
      <tr>
        <td>Agama</td>
        <td>:</td>
        <td>{{ $keteranganBedaIdentitas->penduduk->agama }}</td>
      </tr>
      <tr>
        <td>Pekerjaan</td>
        <td>:</td>
        <td>{{ $keteranganBedaIdentitas->penduduk->pekerjaan }}</td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td>:</td>
        <td>{{ $keteranganBedaIdentitas->penduduk->alamat }}</td>
      </tr>
    </table>
    <p style="text-indent: 2.5%;">
      {{ $keteranganBedaIdentitas->redaksi_tercantum_awal }}
    </p>
  </div>
  <div class="anggota-keluarga">
    <table style="padding-left: 5%;">
      @foreach($jumlahKesalahan as $item)
        <tr>
          <td>{{ $item->data }}</td>
          <td>:</td>
          <td>{{ $item->keterangan }}</td>
        </tr>
      @endforeach
    </table>
    <p style="text-indent: 2.5%;">
      {{ $keteranganBedaIdentitas->redaksi_tercantum_akhir }}
    </p>
  </div>
  <div class="keterangan">
    <p style="text-indent: 2.5%;">
      {{ $keteranganBedaIdentitas->redaksi }}
    </p>
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
          @if($keteranganBedaIdentitas->perangkat_id != 0)
            <center>
              <b style="text-transform: uppercase;">
                {{ $keteranganBedaIdentitas->profil_perangkat->jabatan }}
              </b>
            </center>
          @else
            <center>
              <b>
                an. KEPALA DESA
              </b>
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
        <td></td>
      </tr>
      <tr>
        <td></td>
      </tr>
      <tr>
        <td style="text-transform: uppercase;" width="200">
          <center>
            <b>
              @if($keteranganBedaIdentitas->perangkat_id != 0)
                <u>
                  {{ $keteranganBedaIdentitas->profil_perangkat->nama }}
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
