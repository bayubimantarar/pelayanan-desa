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
  <title>Surat Keterangan Tanggungan Keluarga - {{ $keteranganTanggunganKeluarga->penduduk->nama }}</title>
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
       surat keterangan tanggungan keluarga
    </h4>
    <p style="margin: 0; padding: 0;">
      <b>
        Nomor : 400/{{ $total }}/Ds./{{ $romawi }}/2019
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
          <b>{{ $keteranganTanggunganKeluarga->penduduk->nama }}</b>
        </td>
      </tr>
      <tr>
        <td>Tempat / Tanggal Lahir</td>
        <td>:</td>
        <td>{{ $keteranganTanggunganKeluarga->penduduk->tempat_lahir }}, {{ $keteranganTanggunganKeluarga->penduduk->tanggal_lahir }}</td>
      </tr>
      <tr>
        <td>Jenis Kelamin</td>
        <td>:</td>
        <td>{{ $keteranganTanggunganKeluarga->penduduk->jenis_kelamin }}</td>
      </tr>
      <tr>
        <td>Status Perkawinan</td>
        <td>:</td>
        <td>{{ $keteranganTanggunganKeluarga->penduduk->status_perkawinan }}</td>
      </tr>
      <tr>
        <td>Agama</td>
        <td>:</td>
        <td>{{ $keteranganTanggunganKeluarga->penduduk->agama }}</td>
      </tr>
      <tr>
        <td>Pekerjaan</td>
        <td>:</td>
        <td>{{ $keteranganTanggunganKeluarga->penduduk->pekerjaan }}</td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td>:</td>
        <td>{{ $keteranganTanggunganKeluarga->penduduk->alamat }}</td>
      </tr>
    </table>
  </div>
  <br />
  <div class="anggota-keluarga">
    <table align="center" border="0.1" style="border-collapse: collapse;">
      <tr>
        <td align="center"><b>No.</b></td>
        <td width="100" align="center"><b>NAMA</b></td>
        <td width="170" align="center"><b>Tempat, Tanggal lahir</b></td>
        <td align="center"><b>Hub. Keluarga</b></td>
        <td align="center"><b>Jenis Kelamin</b></td>
        <td align="center"><b>Pekerjaan</b></td>
      </tr>
      @foreach($anggotaKeluarga as $item)
        <tr>
          <td align="center">{{ $nomor++ }}.</td>
          <td align="center">{{ $item->nama }}</td>
          <td align="center">{{ $item->tempat_lahir }}, {{ $item->tanggal_lahir }}</td>
          <td align="center">{{ $item->hubungan_keluarga }}</td>
          <td align="center">{{ $item->jenis_kelamin }}</td>
          <td align="center">{{ $item->pekerjaan }}</td>
        </tr>
      @endforeach
    </table>
  </div>
  <div class="keterangan">
    <p style="text-indent: 2.5%;">
      {{ $keteranganTanggunganKeluarga->redaksi }}
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
          @if($keteranganTanggunganKeluarga->perangkat_id != 0)
            <center>
              <b style="text-transform: uppercase;">
                {{ $keteranganTanggunganKeluarga->profil_perangkat->jabatan }}
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
              @if($keteranganTanggunganKeluarga->perangkat_id != 0)
                <u>
                  {{ $keteranganTanggunganKeluarga->profil_perangkat->nama }}
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
