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
  <title>Surat SKCK</title>
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
       surat keterangan tidak mampu
    </h4>
    <p style="margin: 0; padding: 0;">
      <b>
        Nomor : 400/{{ $total }}/Ds./{{ $romawi }}/2019
      </b>
    </p>
  </div>
  <div class="muatan-data">
    <p style="text-indent: 2.5%; margin: 0; padding: 0;">
      Kepala Desa Cilame Kecamatan Ngamprah Kabupaten Bandung Barat dengan ini menerangkan bahwa :
    </p>
    <table style="padding-left: 5%;">
      @if($sktm->jenis_sktm == "Pendidikan")
        <tr>
          <td>Nama</td>
          <td>:</td>
          <td style="text-transform: uppercase;">
            <b>{{ $sktm->nama }}</b>
          </td>
        </tr>
        <tr>
          <td>Tempat / Tanggal Lahir</td>
          <td>:</td>
          <td>{{ $sktm->tempat_lahir }}, {{ $sktm->tanggal_lahir }}</td>
        </tr>
        <tr>
          <td>Nama Sekolah</td>
          <td>:</td>
          <td>{{ $sktm->nama_sekolah }}</td>
        </tr>
        <tr>
          <td>Alamat Sekolah</td>
          <td>:</td>
          <td>{{ $sktm->alamat_sekolah }}</td>
        </tr>
      @endif
        <tr>
          <td>Nama {{ $sktm->diwakili_oleh }}</td>
          <td>:</td>
          <td style="text-transform: uppercase;"><b>{{ $sktm->penduduk->nama }}</b></td>
        </tr>
        <tr>
          <td>Tempat / Tanggal Lahir</td>
          <td>:</td>
          <td>{{ $sktm->penduduk->tempat_lahir }}, {{ $sktm->penduduk->tanggal_lahir }}</td>
        </tr>
        <tr>
          <td>Agama</td>
          <td>:</td>
          <td>{{ $sktm->penduduk->agama }}</td>
        </tr>
        <tr>
          <td>Pekerjaan</td>
          <td>:</td>
          <td>{{ $sktm->penduduk->pekerjaan }}</td>
        </tr>
        <tr>
          <td>No. KK/KTP</td>
          <td>:</td>
          <td>- / {{ $sktm->penduduk->nik }}</td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td>:</td>
          <td>{{ $sktm->penduduk->alamat }}</td>
        </tr>
    </table>
  </div>
  <div class="keterangan">
    <p style="text-indent: 2.5%;">
      {{ $sktm->redaksi }}<br />
      Surat keterangan ini dibuat untuk keperluan : <b><i>{{ $sktm->keperluan }}</i></b>
    </p>
    <p style="text-indent: 2.5%;">
      Demikian surat keterangan ini dibuat untuk dipergunakan sebagaimana mestinya dan akan diadakan perubahan atau pembatalan jika terdapat kekeliruan.
    </p>
  </div>
  <div class="tanda-tangan">
    @if($sktm->jenis_sktm == "Kesehatan")
      <table align="left">
        <tr>
          <td><center>Mengetahui,</center></td>
        </tr>
        <tr>
          <td>
            <center>
              <b style="text-transform: uppercase;">
                camat ngamprah
              </b>
            </center>
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
                {{-- <hr style="margin-top: 15px" /> --}}
                <hr style="width: 200px;" />
              </b>
            </center>
          </td>
        </tr>
      </table>
    @endif
    @if($sktm->perangkat_id != 0)
      <table align="right">
      <tr>
        <td><center>Cilame, {{ $date }}</center></td>
      </tr>
      <tr>
        <td>
          @if($sktm->perangkat_id != 0)
            <center>
              <b style="text-transform: uppercase;">
                {{ $sktm->profil_perangkat->jabatan }}
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
        <td style="text-transform: uppercase;" width="200">
          <center>
            <b>
              @if($sktm->perangkat_id != 0)
                <u>
                  {{ $sktm->profil_perangkat->nama }}
                </u>
              @else
                <hr style="width: 200px;" />
              @endif
            </b>
          </center>
        </td>
      </tr>
    </table>
    @else
      <table align="right">
      <tr>
        <td><center>Cilame, {{ $date }}</center></td>
      </tr>
      <tr>
        <td>
          @if($sktm->perangkat_id != 0)
            <center>
              <b style="text-transform: uppercase;">
                {{ $sktm->profil_perangkat->jabatan }}
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
              @if($sktm->perangkat_id != 0)
                <u>
                  {{ $sktm->profil_perangkat->nama }}
                </u>
              @else
                <hr style="width: 200px;" />
              @endif
            </b>
          </center>
        </td>
      </tr>
    </table>
    @endif
  </div>
</body>
</html>
