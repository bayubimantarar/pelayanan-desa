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
      margin-top: 7px;
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
  <title>Surat SKCK</title>
</head>
<body>
  <div class="header">
    <img
      src="<?php echo $_SERVER["DOCUMENT_ROOT"].'/assets/img/logo-bandung-barat@grayscale.jpg' ?>"
      height="75"
      style=""
    />
    <h3 style="margin: 0; padding: 0; text-transform: uppercase;">
      Pemerintahan Kabupaten Bandung Barat <br />
      Kecamatan Ngamprah <br />
      Desa Cilame
    </h3>
    <small style="margin: 0; padding: 0;">
      <b>
        Jalan Galudra No. 37 Desa Cilame Kec. Ngamprah 40552
      </b>
    </small>
  </div>
  <hr size="4" style="margin: 0; padding: 0;"/>
  <hr style="margin: 1.5; padding: 0;"/>
  <div class="title">
    <h4 class="underline" style="margin: 0; padding: 10;">
        Pengantar keterangan catatan kepolisian
    </h4>
    <p style="margin: 0; padding: 0;">
      <b>
        Nomor: 200/.../Ds. Cilame/I/2019
      </b>
    </p>
  </div>
  <div class="redaksi-awal">
    <p class="text-redaksi-awal" style="">
      Kepala Desa Cilame Kecamatan Ngamprah Kabupaten Bandung Barat dengan berdasarkan atas
    </p>
    <ol style="">
      <li>Surat pengantar dari ketua RT {{ $skck->rt }} tertanggal 29 Agustus 2019</li>
      <li>Surat pengantar dari ketua RW {{ $skck->rw }} tertanggal 29 Agustus 2019</li>
    </ol>
  </div>
  <div class="muatan-data">
    <p style="text-indent: 2.5%; margin: 0; padding: 0;">
      Dengan ini menerangkan bahwa :
    </p>
    <table style="padding-left: 5%;">
      <tr>
        <td>Nama</td>
        <td>:</td>
        <td><b>{{ $skck->penduduk->nama }}</b></td>
      </tr>
      <tr>
        <td>Tempat / Tanggal Lahir</td>
        <td>:</td>
        <td>{{ $skck->penduduk->tempat_lahir }}, {{ $skck->penduduk->tanggal_lahir }}</td>
      </tr>
      <tr>
        <td>Jenis Kelamin</td>
        <td>:</td>
        <td>{{ $skck->penduduk->jenis_kelamin }}</td>
      </tr>
      <tr>
        <td>Status Perkawinan</td>
        <td>:</td>
        <td>{{ $skck->penduduk->status_perkawinan }}</td>
      </tr>
      <tr>
        <td>Agama</td>
        <td>:</td>
        <td>{{ $skck->penduduk->agama }}</td>
      </tr>
      <tr>
        <td>Pendidikan</td>
        <td>:</td>
        <td>{{ $skck->penduduk->pendidikan }}</td>
      </tr>
      <tr>
        <td>Pekerjaan</td>
        <td>:</td>
        <td>{{ $skck->penduduk->pekerjaan }}</td>
      </tr>
      <tr>
        <td>NIK KTP</td>
        <td>:</td>
        <td>{{ $skck->penduduk->nik }}</td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td>:</td>
        <td>{{ $skck->penduduk->alamat }}</td>
      </tr>
    </table>
  </div>
  <div class="keterangan">
    <p style="text-indent: 2.5%;">
      {{ $skck->redaksi }}<br />
      Surat keterangan ini dibuat untuk keperluan : <b><i>{{ $skck->keperluan }}</i></b>
    </p>
    <p style="text-indent: 2.5%;">
      Demikian surat keterangan ini dibuat untuk dipergunakan sebagaimana mestinya dan akan diadakan perubahan atau pembatalan jika terdapat kekeliruan.
    </p>
  </div>
  <div class="tanda-tangan">
    <table align="right">
      <tr>
        <td><center>Cilame, 29 Agustus 2019</center></td>
      </tr>
      <tr>
        <td><center><b>Kepala Desa Cilame</b></center></td>
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
        <td><center><b><u>AAS MOHAMAD ASOR, SH.</u></b></center></td>
      </tr>
    </table>
  </div>
</body>
</html>