<html>
<head>
  <meta
    http-equiv="Content-Type"
    content="text/html; charset=utf-8"
  />
  <style>
    @page{
      size: 21.0 x 33.0;
    }
    @font-face{
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
  <title>Surat Keterangan Izin Rame-Rame - {{ $keteranganIzinRame->penduduk->nama }}</title>
</head>
<body>
  <div class="header">
    <img
      src="<?php echo $_SERVER["DOCUMENT_ROOT"].'/assets/frontend/img/'.$profil->logo ?>"
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
       surat keterangan izin rame-rame
    </h4>
    <p style="margin: 0; padding: 0;">
      <b>
        Nomor : 200/{{ $total }}/Ds./{{ $romawi }}/2019
      </b>
    </p>
  </div>
  <div class="redaksi-awal">
    <p class="text-redaksi-awal" style="">
      Kepala Desa Cilame Kecamatan Ngamprah Kabupaten Bandung Barat dengan berdasarkan atas :
    </p>
    <ol>
      <li>Surat pengantar dari ketua RT {{ $keteranganIzinRame->rt }} tertanggal {{ $tertanggalRT }}</li>
      <li>Surat pengantar dari ketua RW {{ $keteranganIzinRame->rw }} tertanggal {{ $tertanggalRW }}</li>
    </ol>
  </div>
  <div class="muatan-data">
    <p style="text-indent: 2.5%; margin: 0; padding: 0;">
      Dalam rangka memenuhi permohonan izin rame-rame dari :
    </p>
    <table style="padding-left: 5%;">
      <tr>
        <td>Nama</td>
        <td>:</td>
        <td style="text-transform: uppercase;">
          <b>{{ $keteranganIzinRame->penduduk->nama }}</b>
        </td>
      </tr>
      <tr>
        <td>Tempat / Tanggal Lahir</td>
        <td>:</td>
        <td>{{ $keteranganIzinRame->penduduk->tempat_lahir }}, {{ $keteranganIzinRame->penduduk->tanggal_lahir }}</td>
      </tr>
      <tr>
        <td>Jenis Kelamin</td>
        <td>:</td>
        <td>{{ $keteranganIzinRame->penduduk->jenis_kelamin }}</td>
      </tr>
      <tr>
        <td>Pekerjaan</td>
        <td>:</td>
        <td>{{ $keteranganIzinRame->penduduk->pekerjaan }}</td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td>:</td>
        <td>{{ $keteranganIzinRame->penduduk->alamat }}</td>
      </tr>
      <tr>
        <td>Acara</td>
        <td>:</td>
        <td>{{ $keteranganIzinRame->acara }}</td>
      </tr>
      <tr>
        <td>Jenis Kegiatan / Hiburan</td>
        <td>:</td>
        <td>{{ $keteranganIzinRame->kegiatan }}</td>
      </tr>
      <tr>
        <td>Tanggal Pelaksanaan</td>
        <td>:</td>
        <td>{{ $keteranganIzinRame->tanggal_pelaksanaan }}</td>
      </tr>
      <tr>
        <td>Waktu Pelaksanaan</td>
        <td>:</td>
        <td>{{ $keteranganIzinRame->waktu_pelaksanaan }}</td>
      </tr>
    </table>
  </div>
  <div class="keterangan">
    <p style="text-indent: 2.5%;">
      Dengan ini menerangkan bahwa pada prinsipnya kami tidak keberatan atas permohonan yang bersangkutan dengan ketentuan sebagai berikut :<br />
      <ol>
        <li>Pada waktu dilaksanakan rame – rame harus menjaga ketenteraman dan ketertiban di lingkungan baik dengan tetangga, menghargai waktu – waktu ibadat dalam menciptakan kerukunan umat beragama maupun lingkungan setelah selesai rame – rame.</li>
        <li>Pada waktu dilaksanakan rame – rame tidak dibenarkan / dilarang melakukan hal – hal yang bertentangan dengan <b>ketentuan yang berlaku dan adat istiadat baik lingkungan maupun bangsa</b>.</li>
      </ol>
    </p>
    <p style="text-indent: 2.5%;">
      Demikian keterangan izin rame – rame ini diberikan untuk digunakan sebagaimana mestinya.
    </p>
  </div>
  <div class="tanda-tangan">
    <table align="right">
      <tr>
        <td><center>Cilame, {{ $date }}</center></td>
      </tr>
      <tr>
        <td>
          @if($keteranganIzinRame->perangkat_id != 0)
            <center>
              <b style="text-transform: uppercase;">
                {{ $keteranganIzinRame->profil_perangkat->jabatan }}
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
        <td></td>
      </tr>
      <tr>
        <td></td>
      </tr>
      <tr>
        <td style="text-transform: uppercase;" width="200">
          <center>
            <b>
              @if($keteranganIzinRame->perangkat_id != 0)
                <u>
                  {{ $keteranganIzinRame->profil_perangkat->nama }}
                </u>
              @else
                -
              @endif
            </b>
          </center>
        </td>
      </tr>
    </table>
  </div>
</body>
</html>
