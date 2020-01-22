<?php
    function tgl_indo($tanggal){
        $bulan = array (1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        $pecahkan = explode('-', $tanggal);
        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }
?>
<!DOCTYPE html>
<html lang="en"><head>
    <style>
        .center {
            text-align: center;
        }
        .bold {
            font-weight: bold;
        }
        .fo-16{
            font-size: 16px;
        }
        ol li {
            /* letter-spacing: 10px; */
        }
    </style>
</head><body style="text-align: justify;">
    <p class="center bold"><span class="fo-16">PERJANJIAN KERJASAMA (AKAD SYIRKAH ABDAN)</span><br>ANTARA<br><span class="fo-16">PT SHARIA GRUP INDONESIA</span><br>DENGAN<br><span class="fo-16">AGENCY PROPERTY MEMBER OF SHARIA GRUP INDONESIA</span></p>
    <p class="center"><i>Bismillahirrahmanirrahim</i></p>
    <p>Pada hari ini, Jumat tanggal <?php echo tgl_indo($akad['tgl_akad'])?>, dibuat dan ditandatangani perjanjian kerjasama berupa <b>SYIRKAH ABDAN</b>, oleh dan antara :</p>
    <table style="width:100%; padding: 0px; border-collapse:collapse; margin-bottom: 15px">
        <tr>
            <td style="width: 125px">Nama</td>
            <td style="width: 10px">:</td>
            <td><b> Nasuha Alhuda Syahputra, SE</b><td>
        </tr>
        <tr>
            <td style="width: 125px">Jabatan</td>
            <td style="width: 10px">:</td>
            <td>President Director</td>
        </tr>
        <tr>
            <td style="width: 125px" valign="top">Alamat Kantor</td>
            <td style="width: 10px" valign="top">:</td>
            <td>Jalan Darul Quran Ruko III C9-C10 Kelurahan Loji Kacamatan Bogor Barat – Bogor, Provinsi Jawa Barat</td>
        </tr>
    </table>
    <p>Dalam hal ini mewakili dan bertindak untuk dan atas nama PT Sharia Grup Indonesia selanjutnya sebagai "<b>Pihak Pertama</b>".</p>
    <table style="width:100%; padding: 0px; border-collapse:collapse; margin-bottom: 15px">
        <tr>
            <td style="width: 125px">Nama</td>
            <td style="width: 10px">:</td>
            <td><b> <?= $akad['nama_pemilik']?></b><td>
        </tr>
        <tr>
            <td style="width: 125px">Nomor KTP</td>
            <td style="width: 10px">:</td>
            <td> <?= $akad['no_ktp']?></td>
        </tr>
        <tr>
            <td style="width: 125px" valign="top">Alamat Kantor</td>
            <td style="width: 10px" valign="top">:</td>
            <td><?= $akad['alamat']?></td>
        </tr>
    </table>
    <p>Dalam hal ini bertindak untuk diri sendiri, selanjutnya disebut "<b>Pihak Kedua</b>".</p>
    <p>Pihak Pertama dan Pihak Kedua (untuk selanjutnya secara bersama-sama disebut "<b>Para Pihak</b>"), terlebih dahulu menerangkan hal-hal sebagai berikut :</p>
    <ol type="1">
        <li>Perjanjian kerjasama ini dituangkan mengikuti format Akad Syirkah Abdan dan dijalankan mengikuti kaidah hukum-hukum syariah Islam.</li>
        <li>Objek kerjasama ini adalah usaha Agency Pemasaran Properti Syariah pada badan usaha <b><?=$akad['nama_agency']?></b>.</li>
        <li>Ketentuan pokok hukum syara' tentang Syirkah Abdan termaktub dalam Mukadimah Akad Syirkah Abdan pada Pasal 1 merupakan satu kesatuan yang tak terpisahkan dan dimaksudkan untuk dijadikan rujukan.</li>
    </ol>
</body></html>
