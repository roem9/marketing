<?php
    function tgl_indo($tanggal){
        $bulan = array (1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        $pecahkan = explode('-', $tanggal);
        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }
?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 mt-3">
                <!-- messsage -->
                <?php if( $this->session->flashdata('berhasil') ) : ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= $this->session->flashdata('berhasil');?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="card shadow mb-4">
                    <div class="card-header py-3 bg-primary">
                    <div class="row">
                        <div class="col">
                            <h6 class="m-0 font-weight-bold text-light"><center>FORM AKAD SYIRKAH ABDAN</center></h6>
                        </div>
                    </div>
                    </div>
                    <?php if($agency['akad'] == 'tidak tersedia') :?>
                        <div class="card-body">
                            <form action="<?= base_url()?>agency/buatakad" method="POST" enctype="multipart/form-data">
                                <div id="form-1">
                                    <input type="hidden" name="id_agency" value="<?= $agency['id_agency']?>">
                                    <div class="form-group mb-3">
                                        <label for="nama">Nama Agency <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm" name="nama_agency" id="nama_agency" value="<?=$agency['nama_agency']?>" readonly>
                                    </div>
                                    <div class="col-md-4 col-5 bg-info mb-3" style="margin-left: -20px">
                                        <h6 class="text-light font-weigth-bold pl-2">Identitas Pribadi</h6>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama Pemilik (Sesuai KTP) <span class="text-danger">*</span></label>
                                        <input type="text" maxlength=100 name="nama" id="nama" value="<?=$agency['nama_pemilik']?>" class="form-control form-control-sm" autocomplete="off" autocorrect="off" autocapitalize="off" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_hp">No. HP <span class="text-danger">*</span></label>
                                        <input type="text" maxlength=13 name="no_hp" id="no_hp" value="<?=$agency['no_hp']?>" class="form-control form-control-sm" autocomplete="off" autocorrect="off" autocapitalize="off" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_bergabung">Tanggal Bergabung <span class="text-danger">*</span></label>
                                        <input type="text"name="tgl_bergabung" id="tgl_bergabung" class="form-control form-control-sm" readonly value="<?= date("d-M-Y", strtotime($agency['tgl_akad']))?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="no_ktp">Nomor KTP <span class="text-danger">*</span></label>
                                        <input data-form="Nomor KTP" type="text" maxlength=16 name="no_ktp" id="no_ktp" value="" class="form-control form-control-sm form-1" autocomplete="off" autocorrect="off" autocapitalize="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat (Sesuai KTP) <span class="text-danger">*</span></label>
                                        <textarea data-form="Alamat" name="alamat" id="alamat" class="form-control form-control-sm form-1" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="rt">RT <span class="text-danger">*</span></label>
                                        <input data-form="RT" class='form-control form-control-sm form-1' type="text" name="rt" id="rt" autocomplete="off" autocorrect="off" autocapitalize="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="rw">RW <span class="text-danger">*</span></label>
                                        <input data-form="RW" class='form-control form-control-sm form-1' type="text" name="rw" id="rw" autocomplete="off" autocorrect="off" autocapitalize="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="kel">Kelurahan / Desa <span class="text-danger">*</span></label>
                                        <div class="form-gro">
                                            <label class="radio-inline mr-3"><input type="radio" id="kel_desa" name="kel_desa" value="Kel." checked> &nbsp; Kelurahan</label>
                                            <label class="radio-inline"><input type="radio" id="kel_desa" name="kel_desa" value="Desa"> &nbsp; Desa</label>
                                        </div>
                                        <input data-form="Kelurahan / Desa" class='form-control form-control-sm form-1' type="text" name="kel" id="kel" autocomplete="off" autocorrect="off" autocapitalize="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="kec">Kecamatan <span class="text-danger">*</span></label>
                                        <input data-form="Kecamatan" class='form-control form-control-sm form-1' type="text" name="kec" id="kec" autocomplete="off" autocorrect="off" autocapitalize="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="kab_kota">Kab / Kota <span class="text-danger">*</span></label>
                                        <input data-form="Kabupaten / Kota" class='form-control form-control-sm form-1' type="text" name="kab_kota" id="kab_kota" autocomplete="off" autocorrect="off" autocapitalize="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="prov">Provinsi <span class="text-danger">*</span></label>
                                        <input data-form="Provinsi" class='form-control form-control-sm form-1' type="text" name="prov" id="prov" autocomplete="off" autocorrect="off" autocapitalize="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="foto">KTP <span class="text-danger">*</span></label>
                                        <input data-form="Foto KTP" type="file" name="foto" class="form-1">
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn btn-sm btn-success" id="next-1"><i class="fa fa-arrow-right"></i> Data Rekening</button>
                                    </div>
                                </div>
                                <div id="form-2">
                                    <div class="col-md-4 col-5 bg-info mb-3" style="margin-left: -20px">
                                        <h6 class="text-light font-weigth-bold pl-2">Data Rekening</h6>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_bank">Nama Bank <span class="text-danger">*</span></label>
                                        <input data-form="Nama Bank" class='form-control form-control-sm form-2' type="text" name="nama_bank" id="nama_bank" autocomplete="off" autocorrect="off" autocapitalize="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="cabang_bank">Cabang Bank <span class="text-danger">*</span></label>
                                        <input data-form="Cabang Bank" class='form-control form-control-sm form-2' type="text" name="cabang_bank" id="cabang_bank" autocomplete="off" autocorrect="off" autocapitalize="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="no_rek">Nomor Rekening <span class="text-danger">*</span></label>
                                        <input data-form="Nomor Rekening" class='form-control form-control-sm form-2' type="text" name="no_rek" id="no_rek" autocomplete="off" autocorrect="off" autocapitalize="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="an_rek">Nama Pemilik Rekening <span class="text-danger">*</span></label>
                                        <input data-form="Nama Pemilik Rekening" class='form-control form-control-sm form-2' type="text" name="an_rek" id="an_rek" autocomplete="off" autocorrect="off" autocapitalize="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="npwp">NPWP <span class="text-danger">*</span></label>
                                        <input data-form="NPWP" maxlength=16 class='form-control form-control-sm form-2' type="text" name="npwp" id="npwp" autocomplete="off" autocorrect="off" autocapitalize="off">
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <button type="button" class="btn btn-sm btn-success" id="prev-2"><i class="fa fa-arrow-left"></i> Identitas Pribadi</button>
                                        <button type="button" class="btn btn-sm btn-success" id="next-2"><i class="fa fa-arrow-right"></i> Akad</button>
                                    </div>
                                </div>
                                <div id="form-3">
                                    <p style="text-align: center; font-weight: bold"><span class="fo-16">PERJANJIAN KERJASAMA (AKAD SYIRKAH ABDAN)</span><br>ANTARA<br><span class="fo-16">PT SHARIA GRUP INDONESIA</span><br>DENGAN<br><span class="fo-16">AGENCY PROPERTY MEMBER OF SHARIA GRUP INDONESIA</span></p>
                                    <p><i><center>Bismillahirrahmanirrahim</center></i></p>
                                    <p>Pada hari ini, Jumat tanggal <?php echo tgl_indo($agency['tgl_akad'])?>, dibuat dan ditandatangani perjanjian kerjasama berupa <b>SYIRKAH ABDAN</b>, oleh dan antara :</p>
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
                                            <td><b> <?= $agency['nama_pemilik']?></b><td>
                                        </tr>
                                        <tr>
                                            <td style="width: 125px">Nomor KTP</td>
                                            <td style="width: 10px">:</td>
                                            <td id="nomorKtp"></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 125px" valign="top">Alamat Kantor</td>
                                            <td style="width: 10px" valign="top">:</td>
                                            <td id="alamatAkad"></td>
                                        </tr>
                                    </table>
                                    <p>Dalam hal ini bertindak untuk diri sendiri, selanjutnya disebut "<b>Pihak Kedua</b>".</p>
                                    <p>Pihak Pertama dan Pihak Kedua (untuk selanjutnya secara bersama-sama disebut "<b>Para Pihak</b>"), terlebih dahulu menerangkan hal-hal sebagai berikut :</p>
                                    <ol type="1">
                                        <li>Perjanjian kerjasama ini dituangkan mengikuti format Akad Syirkah Abdan dan dijalankan mengikuti kaidah hukum-hukum syariah Islam.</li>
                                        <li>Objek kerjasama ini adalah usaha Agency Pemasaran Properti Syariah pada badan usaha <b><?=$agency['nama_agency']?></b>.</li>
                                        <li>Ketentuan pokok hukum syara' tentang Syirkah Abdan termaktub dalam Mukadimah Akad Syirkah Abdan pada Pasal 1 merupakan satu kesatuan yang tak terpisahkan dan dimaksudkan untuk dijadikan rujukan.</li>
                                    </ol>
                                    <p style="text-align: center; font-weight: bold">Pasal 1<br>Mukadimah Akad Syirkah Abdan<br>(KETENTUAN POKOK HUKUM SYARA' TENTANG SYIRKAH ABDAN)</p>
                                    <ol type="1" style="padding-left: 15px">
                                        <li>Syirkah adalah <i>partnership</i> (kerjasama) antara dua orang atau lebih untuk melakukan aktivitas finansial dalam rangka mendapatkan keuntungan.</li><br>
                                        <li>Syirkah Abdan merupakan syirkah antara dua Pihak atau lebih yang masing-masing hanya memberikan konstribusi kerja (‘amal tanpa konstribusi modal (maal). Konstribusi kerja itu dapat berupa kerja pikiran (seperti pekerjaan arsitek atau penulis) ataupun kerja fisik (seperti pekerjaan tukang kayu, tukang batu, sopir, pemburu, nelayan, dan sebagainya). (An-Nabhani, 1990: 150). Syirkah ini disebut juga syirkah 'amal (Al-Jaziri, 1996: 67; Al-Khayyath, 1982: 35).</li><br>
                                        <li>Akad Syirkah Abdan harus dilakukan melalui ijab dan qabul antara pihak-pihak yang berakad dan di dalamnya harus jelas aktifitas finansial atau usaha yang disepakati.
                                        </li><br>
                                        <li>Legalitas syar'iy Syirkah Abdan diantaranya disandarkan kepada sabda Rasul Shalallahu Alaihi Wassalam : <br><br>
                                        <i>Allah 'Azza wa Jalla telah berfirman: Aku adalah Pihak ketiga dari dua Pihak yang ber-syirkah selama salah satunya tidak mengkhianati yang lainnya. Kalau salah satunya berkhianat, Aku keluar dari keduanya.</i> (<b>HR. Abu Dawud, al-Baihaqi,</b> dan <b>ad-Daruquthni</b>).
                                        </li><br>
                                        <li>Dalam Syirkah Abdan, kewenangan melakukan tasharruf menjadi hak seluruh anggota syirkah.</li><br>
                                        <li>Syirkah dibangun di atas asas <i>profit and loss sharing</i> yakni pembagian keuntungan dan kerugian. Sharing keuntungan dan kerugian itu dilakukan mengikuti kaedah seperti yang diriwayatkan oleh Abdurrazaq bahwa Ali bin Abi Thalib berkata : <br><br>
                                        <i>Kerugian itu berdasarkan harta (modal) sedangkan keuntungan berdasarkan apa yang mereka (para syarik yang bersyirkah) sepakati</i> (lihat, Abdurrazaq, Mushannaf 'Abd ar-Razâq, hadits no 15087, viii/248, al-Maktab al-Islami, Beirut, 1403)<br><br>Kaedah ini diketahui oleh para sahabat dan tidak ada yang mengingkari sehingga hal itu menjadi kesepakatan bahwa kaedah ini adalah benar menurut syariah. Kaedah (hukum) ini juga dipegangi oleh asy-Sya'bi, al-Hasan, Ibn Sirin, Qatadah, al-Hakam, Hamad, Thawus, Ibrahim, Abu Qilabah dan lainnya (lihat, Abdurrazaq, <i>Mushannaf 'Abd ar-Razâq</i>, viii/248 dst, al-Maktab al-Islami, Beirut. 1403; Ibn Abiy Syaibah, <i>Mushannaf Ibn Abiy Syaybah</i>, iv/477-478, Maktabah ar-Rusyd, Riyadh. 1409).</li><br>
                                        <li>Keuntungan yang diperoleh dibagi berdasarkan kesepakatan; nisbahnya boleh sama dan boleh juga tidak sama di antara mitra-mitra usaha (syarîk).</li><br>
                                        <li>Tanggungjawab dalam pengelolaan syirkah adalah tanggungjawab para pengelola secara bersama-sama tanpa ada perbedaan. Dalam praktek menjalankan syirkahdimungkinkan adanya pembagian tugas diantara para pengelola, meski secara tanggungjawab mereka tetap sama.</li><br>
                                        <li>Dalam syirkah terkandung asas amanah dan wakalah dimana diantara para syarik saling mengamanahkan dan mewakilkan. Karena itu keputusan yang dibuat oleh salah seorang pengelola tidak boleh dianggap sebagai keputusan personal tetapi secara syar'iy merupakan keputusan syirkah atau para pengelola.</li><br>
                                        <li>Jangka waktu syirkah adalah jangka waktu yang disepakati oleh para syarik ketika akad untuk berlangsungnya kerjasama usaha tersebut dimana pada akhir jangka waktu itu bisa dilakukan peninjauan uang secara total atau sebagian terhadap akad syirkah untuk kemudian bisa dilanjutkan kembali baik tanpa atau disertai perubahan isi akad, atau akad syirkah tersebut dibubarkan. Dalam semua itu disertai dengan penghtungan rugi laba dan pembagian keuntungan.</li><br>
                                        <li>Selama jangka waktu syirkah itu dimungkinkan untuk disepakati untuk dibagi dalam periode yang lebih pendek untuk penghitungan rugi laba dan pembagian keuntungan, dan syirkah terus berjalan tanpa perlu diperbarui akadnya.</li><br>
                                        <li>Akad syirkah merupakan 'aqdun mustamirrun yaitu akad yang berlangsung selama jangka waktu tertentu dan seolah-olah akad tersebut terus diperbarui seiring bergulirnya waktu.</li><br>
                                        <li>Akad syirkah termasuk 'aqdun jâ'izun yaitu akan yang tidak mengikat kedua Pihak dalam arti masing-masing Pihak boleh membatalkan akad sesuai keinginan Abdannya tanpa bergantung kepada persetujuan Pihak lain. Namun jika pembatalan itu minimal diduga kuat akan mendatangkan dharar kepada Pihak lainnya, maka pembatalan itu sesuai kaidah dharar tidak boleh dilakukan.</li><br>
                                        <li>Jika salah seorang syarik mundur, maka harus dilakukan penghitungan rugi laba dan pembagian keuntungan. Selanjutnya syirkah bisa dilanjutkan untuk para syarik yang tidak mengundurkan diri tanpa harus dilakukan akad baru, hanya saja perlu dilakukan penyesuaian yang diperlukan misalnya dalam hal komposisi modal dan besaran sharing keuntungan dikarenakan berkurangnya syarik dari jumlah semula sehingga berkonsekuensi terjadi perubahan pada jumlah dan komposisi modal dan besaran sharing keuntungan.</li><br>
                                        <li>Dalam akad syirkah semua syarik dimungkinkan menetapkan syarat terhadap mereka dengan ketentuan syarat tersebut tidak bertentangan dengan syariah.</li><br>
                                        <li>Modal syirkah bisa berupa uang atau harta selain uang. Jika berupa harta selain uang maka pada saat akad harus ditentukan nilai nominalnya sehingga bisa dilebur dengan modal keseluruhan menjadi satu kesatuan. Modal tersebut harus diserahkan pada saat akad, tidak boleh diutang. </li><br>
                                        <li>Selama berlangsungnya syirkah dimungkinkan dilakukan perubahan klausul akad, perubahan modal, besaran sharing keuntungan, dan masuknya syarik baru, tentu dengan disertai perubahan dan penyesuaian yang diperlukan.</li>
                                    </ol>

                                    <p style="text-align: center; font-weight: bold">Pasal 2<br>RUANG LINGKUP USAHA</p>
                                    <ol type="1" style="padding-left: 15px">
                                        <li>Usaha Syirkah Abdan ini adalah usaha Agency Pemasaran Properti Syariah pada badan usaha <b><?=$agency['nama_agency']?></b>.</li><br>
                                        <li>Pengembangan jenis usaha baru atau perluasan ruang lingkup usaha akan ditentukan melalui keputusan bersama Para Pihak.</li>
                                    </ol>
                                    
                                    <p style="text-align: center; font-weight: bold">Pasal 3<br>PENGELOLAAN USAHA</p>
                                    <p>Dalam syirkah ini, kewenangan melakukan tasharruf (pengelolaan) menjadi hak bersama Para Pihak.</p>
                                    
                                    <p style="text-align: center; font-weight: bold">Pasal 4<br>KEWAJIBAN</p>
                                    <p>Para Pihak menyepakati pembagian tanggung jawab sebagai berikut :</p>
                                    <ul style="padding-left: 15px">
                                        <li>Kewajiban Pihak Pertama :</li><br>
                                        <ol type="1" style="padding-left: 20px">
                                            <li>Pihak Pertama berkewajiban melakukan komunikasi, kesepakatan & perjanjian untuk menjualkan proyek Sharia Land (ataupun proyek Developer Properti Syariah lainnya).</li><br>
                                            <li>Pihak Pertama berkewajiban menentukan besaran <i>Marketing Fee</i> bersama Sharia Land (ataupun proyek Developer Properti Syariah lainnya).</li><br>
                                            <li>Pihak Pertama berkewajiban memberikan informasi kepada Pihak Kedua mengenai proyek Sharia Land (ataupun proyek Developer Properti Syariah lainnya) yang akan dijualkan.</li><br>
                                            <li>Pihak Pertama berkewajiban menyiapkan Marketing Tools (dalam bentuk digital) yang diperoleh dari Sharia Land (ataupun proyek Developer Properti Syariah lainnya) yang akan dipergunakan oleh Pihak Kedua untuk melakukan penjualan.</li><br>
                                        </ol>
                                        <li>Kewajiban Pihak Kedua :</li><br>
                                        <ol type="1" style="padding-left: 20px">
                                            <li>Pihak Kedua berkewajiban melakukan aktifitas promosi baik secara <i>Online</i> dan/atau <i>Offline</i>.</li><br>
                                            <li>Pihak Kedua berkewajiban mendampingi calon konsumen dalam melakukan survei lokasi.</li><br>
                                            <li>Pihak Kedua berkewajiban menjelaskan skema penjualan dengan baik kepada calon konsumen.</li><br>
                                            <li>Pihak Kedua berkewajiban menjembatani keinginan calon konsumen yang perlu disampaikan kepada Developer Properti Syariah melalui Pihak Pertama.</li><br>
                                            <li>Pihak Kedua berkewajiban memberikan data calon konsumen yang akan survei ke proyek Sharia Land (ataupun proyek Developer Properti Syariah lainnya).</li><br>
                                            <li>Pihak Kedua bersedia dievaluasi oleh Pihak Pertama pada bulan ke 3 (tiga).</li><br>
                                            <li>Para Pihak berkewajiban menjualkan proyek Sharia Land secara bersama-sama dalam kurun waktu 1 (satu) tahun.</li><br>
                                        </ol>
                                    </ul>
                                    
                                    <p style="text-align: center; font-weight: bold">Pasal 5<br>HAK</p>
                                    <p>Para Pihak menyepakati pembagian tanggung jawab sebagai berikut :</p>
                                    <ul style="padding-left: 15px">
                                        <li>Hak Pihak Pertama :</li><br>
                                        <ol type="1" style="padding-left: 20px">
                                            <li>Pihak Pertama berhak mendapatkan data calon konsumen yang akan survei ke proyek Sharia Land (ataupun proyek Developer Properti Syariah lainnya).</li><br>
                                        </ol>
                                        <li>Hak Pihak Kedua :</li><br>
                                        <ol type="1" style="padding-left: 20px">
                                            <li>Pihak Kedua berhak menerima informasi data proyek Sharia Land (ataupun proyek Developer Properti Syariah lainnya).</li><br>
                                            <li>Pihak Kedua berhak mendapatkan <i>Marketing Tools</i> (dalam bentuk digital) dari Pihak Pertama yang berasal dari proyek Sharia Land (ataupun proyek Developer Properti Syariah lainnya).</li><br>
                                        </ol>
                                    </ul>

                                    <p style="text-align: center; font-weight: bold">Pasal 6<br>PENGAMBILAN KEPUTUSAN</p>
                                    <ol type="1" style="padding-left: 15px">
                                        <li>Keputusan strategis dalam pengelolaan syirkah diputuskan bersama-sama oleh Para Pihak.</li><br>
                                        <li>Keputusan yang bersifat operasional dalam hal operasional jalannya syirkah selain ditetapkan secara bersama-sama oleh Para Pihak juga bisa diambil atau ditetapkan oleh masing-masing Pihak sesuai dengan lingkup tugas yang menjadi tanggungjawabnya.</li><br>
                                        <li>Keputusan yang dibuat oleh masing-masing Pihak dalam konteks pengelolaan syirkah berkedudukan sebagai keputusan Para Pihak atau keputusan syirkah.</li>
                                    </ol>

                                    <p style="text-align: center; font-weight: bold">Pasal 7<br>PENYERTAAN MODAL</p>
                                    <p>Tidak ada penyertaan modal dalam syirkah ini karena bentuk syirkahnya adalah Syirkah Abdan.</p>

                                    <p style="text-align: center; font-weight: bold">Pasal 8<br>PEMBAGIAN KEUNTUNGAN</p>
                                    <ol type="1" style="padding-left: 15px">
                                        <li>Pembagian keuntungan/profit hasil usaha Syirkah Abdan ini dibagikan kepada Para Pihak berdasarkan kesepakatan Para Pihak.</li><br>
                                        <li>Keuntungan bersih dihitung dari pendapatan kotor (<i>Marketing Fee</i> dari Developer) dikurangi <i>Fee Marketing Freelance</i> (sebesar 50%).<br><br>Keuntungan Bersih = <i>Marketing Fee</i> – (<i>Marketing Fee</i> x 50%)</li><br>
                                        <li>Para Pihak telah menyepakati bahwa persentase/porsi bagi hasil Syirkah Abdan ini adalah sebagai berikut :</li><br>
                                        <ol type="a" style="padding-left: 20px">
                                            <li>Jika penjualan dilakukan oleh Pihak Kedua secara pribadi maka</li><br>
                                            <ul style="padding-left: 20px">
                                                <li>Pihak Pertama mendapatkan <b>10%</b> dari Keuntungan Bersih</li>
                                                <li>Pihak Kedua mendapatkaan <b>90%</b> dari Keuntungan Bersih</li><br>
                                            </ul>
                                            <li>Jika penjualan dilakukan oleh <i>Marketing Freelance</i> maka</li><br>
                                            <ul style="padding-left: 20px">
                                                <li>Pihak Pertama mendapatkan <b>20%</b> dari Keuntungan Bersih</li>
                                                <li>Pihak Kedua mendapatkaan <b>80%</b> dari Keuntungan Bersih</li><br>
                                            </ul>
                                        </ol>
                                        <li>Pembagian keuntungan dilakukan setelah Pihak Pertama mendapatkan <i>Marketing Fee</i> dari Developer Sharia Land (ataupun proyek Developer Properti Syariah lainnya) sesuai dengan jumlah penjualan yang berhasil dijualkan oleh Pihak Kedua.</li>
                                    </ol>

                                    <p style="text-align: center; font-weight: bold">Pasal 9<br>PEMBAGIAN KERUGIAN</p>
                                    <p>Kerugian yang mungkin terjadi dalam syirkah hanyalah kerugian non-finansial. Kerugian non finansial, seperti tenaga, waktu dan pikiran ditanggung oleh Para Pihak selaku Pengelola.</p>

                                    <p style="text-align: center; font-weight: bold">Pasal 10<br>REKENING PEMBAYARAN</p>
                                    <ol type="1" style="padding-left: 15px">
                                        <li>Rekening Pihak Kedua untuk kebutuhan pembayaran pembagian keuntungan dari Pihak Pertama adalah sebagai berikut :<br><br>
                                            <table style="margin-left: 50px" width=100%>
                                                <tr>
                                                    <td style="width: 200px">Nama Bank</td>
                                                    <td>: <span id="namaBank"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Cabang Bank</td>
                                                    <td>: <span id="cabangBank"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Nomor Rekening</td>
                                                    <td>: <span id="noRek"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Nama Pemilik Rekening</td>
                                                    <td>: <span id="anRek"></span></td>
                                                </tr>
                                            </table>
                                        </li><br>
                                        <li>Apabila terdapat perubahan data rekening pembayaran di kemudian hari, maka Pihak Kedua diharuskan menyampaikannya secara tertulis kepada Pihak Pertama.</li>
                                    </ol>
                                    
                                    <p style="text-align: center; font-weight: bold">Pasal 11<br>JANGKA WAKTU DAN PERIODE SYIRKAH</p>
                                    <ol type="1" style="padding-left: 15px">
                                        <li>Para Pihak telah menyepakati jangka waktu Syirkah Abdan berlaku selama 1 (satu)tahun sejak ditandatanganinya akad Syirkah Abdan ini, dan dapat diperpanjang sesuai kesepakatan Para Pihak.</li><br>
                                        <li>Kerjasama ini dianggap selesai apabila salah satu Pihak mengundurkan diri atau karena telah selesai jangka waktu syirkah dan tidak diperpanjang lagi.</li><br>
                                        <li>Pada masa berlaku jangka waktu akad Syirkah ini dimungkinkan untuk dilakukan peninjauan ulang terhadap klausul-klausul akad Syirkah Abdan ini baik secara total atau sebagian untuk kemudian Syirkah Abdan ini bisa dilanjutkan kembali baik tanpa atau disertai perubahan isi akad dengan tetap mengacu kepada ketentuan hukum syara'.</li><br>
                                    </ol>
                                    
                                    <p style="text-align: center; font-weight: bold">Pasal 12<br>KERAHASIAN DAN PENCEMARAN NAMA BAIK</p>
                                    <ol type="1" style="padding-left: 15px">
                                        <li>Para Pihak dalam melaksanakan setiap hak dan kewajibannya sebagaimana diatur dalam Akad Syirkah Abdan ini akan senantiasa memelihara semua data dan informasi yang diterima atau terungkapkan dari Pihak lainnya atau yang terungkap dan disepakati dalam Akad Syirkah Abdan ini sebagai informasi-informasi yang bersifat rahasia, dan menjaga serta bertanggung jawab kepada Pihak lainnya mengenai kerahasiaan tersebut terhadap pihak-pihak ketiga lain ("<b>Informasi Rahasia</b>"). Untuk itu Para Pihak menjamin akan bertanggung jawab kepada Pihak lainnya, bahwa setiap personil Para Pihak tidak akan membocorkan atau menggunakan Informasi Rahasia tersebut dengan cara apapun baik untuk kepentingan sendiri, kepentingan salah satu Pihak maupun pihak ketiga lainnya.</li><br>
                                        <li>Dalam melaksanakan hak dan kewajiban berdasarkan Akad Syirkah Abdan ini, Para Pihak sepakat untuk menjaga nama baik Para Pihak. Bilamana terjadi suatu perbedaan pendapat/perselisihan sehubungan dengan pelaksanaan Akad Syirkah Abdan ini, maka Para Pihak akan menyelesaikannya sebagaimana diatur dalam Akad Syirkah Abdan ini dan Para Pihak tidak akan melakukan pencemaran nama baik Pihak lainnya yang dapat menimbulkan kerugian dalam bentuk materiil maupun imateriil.</li>
                                    </ol>
                                    
                                    <p style="text-align: center; font-weight: bold">Pasal 13<br>PERSELISIHAN</p>
                                    <ol type="1" style="padding-left: 15px">
                                        <li>Jika terjadi perselisihan, Para Pihak sepakat untuk menyelesaikannya secara musyawarah.</li><br>
                                        <li>Jika perselisihan antara Para Pihak tidak dapat diselesaikan dengan musyawarah maka Para Pihak sepakat untuk menunjuk Pengadilan Agama sebagai yang dipercaya untuk memberikan jalan keluar.</li>
                                    </ol>
                                    
                                    <p style="text-align: center; font-weight: bold">Pasal 14<br>PENUTUP</p>
                                    <ol type="1" style="padding-left: 15px">
                                        <li>Apabila ada hal-hal yang belum ada atau belum cukup diatur dalam Akad Syirkah Abdan ini, maka akan diatur kemudian dalam Addendum/Amendment oleh Para Pihak secara bersama dan merupakan bagian yang tidak terpisahkan dari Akad Syirkah Abdan ini.</li><br>
                                        <li>Akad Syirkah Abdan ini tidak akan dan tidak dimungkinkan untuk dapat dialihkan, didelegasikan, dipindahkan dan atau dihilangkan tanpa persetujuan tertulis dari Para Pihak.</li><br>
                                        <li>Para Pihak sepakat dari waktu ke waktu melaksanakan tindakan lebih lanjut dan melaksanakan, menyerahkan dan mengkomunikasikan dokumen lainnya yangdiperlukan, guna memastikan keberlanjutan pelaksanaan Akad Syirkah Abdan ini secara efektif sesuai dengan tujuan Akad Syirkah Abdan ini.</li><br>
                                        <li>Akad Syirkah Abdan ini beserta lampiran-lampiran atau dokumen lainnya yang diatur/disebut dalam Akad Syirkah Abdan ini seluruhnya menjadi satu kesatuan pada Akad Syirkah Abdan ini, dan Akad Syirkah Abdan ini merupakan perjanjian yang menyeluruh dan merupakan persetujuan antara Para Pihak.</li>
                                    </ol>

                                    <input type="checkbox" name="setuju" id="setuju" class="mr-1"><label for="setuju">Dengan ini setuju</label>

                                    <div class="d-flex justify-content-between">
                                        <button type="button" class="btn btn-sm btn-success" id="prev-3"><i class="fa fa-arrow-left"></i> Data Rekening</button>
                                        <input type="submit" value="Buat Akad" class="btn btn-sm btn-primary float-right" id="simpan">
                                    </div>
                                </div>
                            </form>
                        </div>
                    <?php else : ?>
                        <div class="card-body">
                            <a href="<?= base_url()?>agency/suratakad/<?=$agency['id_agency'] . '/' . rawurlencode($agency['nama_agency'])?>" class="btn btn-sm btn-success"><i class="fa fa-download"></i> Unduh Akad</a>
                        </div>
                    <?php endif;?>
                </div>
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

</div>
    
    <script src="<?= base_url()?>assets/js/script.js"></script>
    <script src="<?= base_url()?>assets/js/date-format.js"></script>
    <script>
        // $("#form-1").hide()
        $("#form-2").hide()
        $("#form-3").hide()

        $('#alamatAkad').css('textTransform', 'capitalize')
        $('#alamat_lengkap').css('textTransform', 'capitalize')
        $('#nama_pemilik').css('textTransform', 'capitalize')
        $('#alamat').css('textTransform', 'capitalize')
        $('#kel').css('textTransform', 'capitalize')
        $('#kec').css('textTransform', 'capitalize')
        $('#kab_kota').css('textTransform', 'capitalize')
        $('#prov').css('textTransform', 'capitalize')
        
        setInputFilter(document.getElementById("rt"), function(value) {
            return /^[0-9]*$/i.test(value);
        });
        setInputFilter(document.getElementById("rw"), function(value) {
            return /^[0-9]*$/i.test(value);
        });
        setInputFilter(document.getElementById("no_ktp"), function(value) {
            return /^[0-9]*$/i.test(value);
        });
        setInputFilter(document.getElementById("npwp"), function(value) {
            return /^[0-9]*$/i.test(value);
        });
        setInputFilter(document.getElementById("no_rek"), function(value) {
            return /^[0-9]*$/i.test(value);
        });

        $("#form-2").hide();

        $("#no_ktp").keyup(function(){
            $("#nomorKtp").html(this.value)
        })
        
        $("#nama_bank").keyup(function(){
            $("#namaBank").html(this.value)
        })
        
        $("#cabang_bank").keyup(function(){
            $("#cabangBank").html(this.value)
        })
        
        $("#no_rek").keyup(function(){
            $("#noRek").html(this.value)
        })
        
        $("#an_rek").keyup(function(){
            $("#anRek").html(this.value)
        })

        $("#alamat").keyup(function(){
            var alamat = $("#alamat").val();
            var rt = $("#rt").val();
            var rw = $("#rw").val();
            var kel_desa = $("input[name='kel_desa']:checked").val();
            var kel = $("#kel").val();
            var kec = $("#kec").val();
            var kab_kota = $("#kab_kota").val();
            var prov = $("#prov").val();

            var alamatLengkap = alamat + ' RT. ' + rt + ' / RW. ' + rw + ', ' + kel_desa + ' ' + kel + ', Kec. ' + kec + ', ' + kab_kota + ' Provinsi ' + prov;

            $("#alamatAkad").html(alamatLengkap);
        })

        $("#rt").keyup(function(){
            var alamat = $("#alamat").val();
            var rt = $("#rt").val();
            var rw = $("#rw").val();
            var kel_desa = $("input[name='kel_desa']:checked").val();
            var kel = $("#kel").val();
            var kec = $("#kec").val();
            var kab_kota = $("#kab_kota").val();
            var prov = $("#prov").val();
            var alamatLengkap = alamat + ' RT. ' + rt + ' / RW. ' + rw + ', ' + kel_desa + ' ' + kel + ', Kec. ' + kec + ', ' + kab_kota + ' Provinsi ' + prov;
            $("#alamatAkad").html(alamatLengkap);
        })

        $("#rw").keyup(function(){
            var alamat = $("#alamat").val();
            var rt = $("#rt").val();
            var rw = $("#rw").val();
            var kel_desa = $("input[name='kel_desa']:checked").val();
            var kel = $("#kel").val();
            var kec = $("#kec").val();
            var kab_kota = $("#kab_kota").val();
            var prov = $("#prov").val();
            var alamatLengkap = alamat + ' RT. ' + rt + ' / RW. ' + rw + ', ' + kel_desa + ' ' + kel + ', Kec. ' + kec + ', ' + kab_kota + ' Provinsi ' + prov;
            $("#alamatAkad").html(alamatLengkap);
        })

        $("#kel").keyup(function(){
            var alamat = $("#alamat").val();
            var rt = $("#rt").val();
            var rw = $("#rw").val();
            var kel_desa = $("input[name='kel_desa']:checked").val();
            var kel = $("#kel").val();
            var kec = $("#kec").val();
            var kab_kota = $("#kab_kota").val();
            var prov = $("#prov").val();
            var alamatLengkap = alamat + ' RT. ' + rt + ' / RW. ' + rw + ', ' + kel_desa + ' ' + kel + ', Kec. ' + kec + ', ' + kab_kota + ' Provinsi ' + prov;
            $("#alamatAkad").html(alamatLengkap);
        })
        
        $("input[type=radio][name=kel_desa]").change(function(){
            var alamat = $("#alamat").val();
            var rt = $("#rt").val();
            var rw = $("#rw").val();
            var kel_desa = $("input[name='kel_desa']:checked").val();
            var kel = $("#kel").val();
            var kec = $("#kec").val();
            var kab_kota = $("#kab_kota").val();
            var prov = $("#prov").val();
            var alamatLengkap = alamat + ' RT. ' + rt + ' / RW. ' + rw + ', ' + kel_desa + ' ' + kel + ', Kec. ' + kec + ', ' + kab_kota + ' Provinsi ' + prov;
            $("#alamatAkad").html(alamatLengkap);
        })

        $("#kec").keyup(function(){
            var alamat = $("#alamat").val();
            var rt = $("#rt").val();
            var rw = $("#rw").val();
            var kel_desa = $("input[name='kel_desa']:checked").val();
            var kel = $("#kel").val();
            var kec = $("#kec").val();
            var kab_kota = $("#kab_kota").val();
            var prov = $("#prov").val();
            var alamatLengkap = alamat + ' RT. ' + rt + ' / RW. ' + rw + ', ' + kel_desa + ' ' + kel + ', Kec. ' + kec + ', ' + kab_kota + ' Provinsi ' + prov;
            $("#alamatAkad").html(alamatLengkap);
        })

        $("#kab_kota").keyup(function(){
            var alamat = $("#alamat").val();
            var rt = $("#rt").val();
            var rw = $("#rw").val();
            var kel_desa = $("input[name='kel_desa']:checked").val();
            var kel = $("#kel").val();
            var kec = $("#kec").val();
            var kab_kota = $("#kab_kota").val();
            var prov = $("#prov").val();
            var alamatLengkap = alamat + ' RT. ' + rt + ' / RW. ' + rw + ', ' + kel_desa + ' ' + kel + ', Kec. ' + kec + ', ' + kab_kota + ' Provinsi ' + prov;
            $("#alamatAkad").html(alamatLengkap);
        })

        $("#prov").keyup(function(){
            var alamat = $("#alamat").val();
            var rt = $("#rt").val();
            var rw = $("#rw").val();
            var kel_desa = $("input[name='kel_desa']:checked").val();
            var kel = $("#kel").val();
            var kec = $("#kec").val();
            var kab_kota = $("#kab_kota").val();
            var prov = $("#prov").val();
            var alamatLengkap = alamat + ' RT. ' + rt + ' / RW. ' + rw + ', ' + kel_desa + ' ' + kel + ', Kec. ' + kec + ', ' + kab_kota + ' Provinsi ' + prov;
            $("#alamatAkad").html(alamatLengkap);
        })

        $("#next-1").click(function(){
            let empty = false;
            let html = "";
            $.each($('.form-1'),function() {
                if ($(this).val().length == 0) {
                    html += "<br>" + $(this).data('form');
                    empty = true;
                }
            })
            
            if(empty == true){
                Swal.fire({
                    icon: 'error',
                    html: 'Harap melengkapi data berikut ini : ' + html
                })
                return false;
            } else {
                $("#form-1").hide();
                $("#form-2").show();
                $("#form-3").hide();
            }
        })
        
        $("#next-2").click(function(){
            let empty = false;
            let html = "";
            $.each($('.form-2'),function() {
                if ($(this).val().length == 0) {
                    html += "<br>" + $(this).data('form');
                    empty = true;
                }
            })
            
            if(empty == true){
                Swal.fire({
                    icon: 'error',
                    html: 'Harap melengkapi data berikut ini : ' + html
                })
                return false;
            } else {
                $("#form-1").hide();
                $("#form-2").hide();
                $("#form-3").show();
            }
        })
        
        $("#prev-2").click(function(){
            $("#form-1").show();
            $("#form-2").hide();
            $("#form-3").hide();
        })
        
        $("#prev-3").click(function(){
            $("#form-1").hide();
            $("#form-2").show();
            $("#form-3").hide();
        })

        $("#simpan").click(function(){
            var check =  $('input[name="setuju"]:checked').length;

            if(check > 0){
                var c = confirm("Apakah Anda yakin akan membuat akad?")
                return c;
            } else {
                Swal.fire({
                    icon: 'error',
                    text: 'Harap menyetujui terlebih dahulu dengan menceklist'
                })
                return false;
            }
        })
    </script>