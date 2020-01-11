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
                            <h6 class="m-0 font-weight-bold text-light">Form Akad Agency <?= $agency['nama_agency']?></h6>
                        </div>
                    </div>
                    </div>
                    <?php if($agency['akad'] == 'tidak tersedia') :?>
                        <div class="card-body">
                            <form action="<?= base_url()?>agency/buatakad" method="POST" enctype="multipart/form-data">
                                <div id="form-1">
                                    <input type="hidden" name="id_agency" value="<?= $agency['id_agency']?>">
                                    <div class="form-group">
                                        <label for="nama">Nama Agency <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm" name="nama_agency" id="nama_agency" value="<?=$agency['nama_agency']?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama Pemilik (Sesuai KTP) <span class="text-danger">*</span></label>
                                        <input type="text" maxlength=100 name="nama" id="nama" value="<?=$agency['nama_pemilik']?>" class="form-control form-control-sm" autocomplete="off" autocorrect="off" autocapitalize="off" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_hp">No. HP <span class="text-danger">*</span></label>
                                        <input type="text" maxlength=100 name="no_hp" id="no_hp" value="<?=$agency['no_hp']?>" class="form-control form-control-sm" autocomplete="off" autocorrect="off" autocapitalize="off" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_bergabung">Tanggal Bergabung <span class="text-danger">*</span></label>
                                        <input type="date"name="tgl_bergabung" id="tgl_bergabung" class="form-control form-control-sm">
                                    </div>
                                    <div class="form-group">
                                        <label for="no_ktp">Nomor KTP <span class="text-danger">*</span></label>
                                        <input type="text" maxlength=100 name="no_ktp" id="no_ktp" value="" class="form-control form-control-sm" autocomplete="off" autocorrect="off" autocapitalize="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat (Sesuai KTP) <span class="text-danger">*</span></label>
                                        <textarea name="alamat" id="alamat" class="form-control form-control-sm" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="rt">RT <span class="text-danger">*</span></label>
                                        <input class='form-control form-control-sm' type="text" name="rt" id="rt" autocomplete="off" autocorrect="off" autocapitalize="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="rw">RW <span class="text-danger">*</span></label>
                                        <input class='form-control form-control-sm' type="text" name="rw" id="rw" autocomplete="off" autocorrect="off" autocapitalize="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="kel">Kelurahan / Desa <span class="text-danger">*</span></label>
                                        <div class="form-gro">
                                            <label class="radio-inline mr-3"><input type="radio" id="kel_desa" name="kel_desa" value="Kel." checked> &nbsp; Kelurahan</label>
                                            <label class="radio-inline"><input type="radio" id="kel_desa" name="kel_desa" value="Desa"> &nbsp; Desa</label>
                                        </div>
                                        <input class='form-control form-control-sm' type="text" name="kel" id="kel" autocomplete="off" autocorrect="off" autocapitalize="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="kec">Kecamatan <span class="text-danger">*</span></label>
                                        <input class='form-control form-control-sm' type="text" name="kec" id="kec" autocomplete="off" autocorrect="off" autocapitalize="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="kab_kota">Kab / Kota <span class="text-danger">*</span></label>
                                        <input class='form-control form-control-sm' type="text" name="kab_kota" id="kab_kota" autocomplete="off" autocorrect="off" autocapitalize="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="prov">Provinsi <span class="text-danger">*</span></label>
                                        <input class='form-control form-control-sm' type="text" name="prov" id="prov" autocomplete="off" autocorrect="off" autocapitalize="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="foto">KTP <span class="text-danger">*</span></label>
                                        <input type="file" name="foto">
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn btn-sm btn-success" id="next-1"><i class="fa fa-arrow-right"></i> Surat Akad</button>
                                    </div>
                                </div>
                                <div id="form-2">
                                    <div class="div" style="text-align: center"><i>bismillahirrahmanirrahim</i></div>
                                    <div class="judul" style="text-align: center"><b>SURAT AQAD SYIRKAH INAN<br>MUKADIMAH</b></b></div>
                                    <div style="text-align: center"><i>Allah SWT berfirman (dalam hadits qudsi), "Aku adalah pihak ke tiga (Yang Maha Melindungi) bagi dua orang yang melakukan syirkah, selama salah seorang diantara mereka tidak berkhianat kepada kawan syarikatnya. Apabila di antara mereka ada yang berkhianat,maka Aku akan keluar dari mereka (tidak melindungi)."<br>(HR. Imam Daruquthni dari Abu Hurairoh r.a.)</i></div>
                                    <p>Dengan menyebut Asma Alloh Yang Maha Pengasih lagi Maha Penyayang, pada hari ini <span class="tgl_gabung"></span>, yang bertandatangan di bawah ini:</p>
                                    <table style="width:100%; padding: 0px; border-collapse:collapse; margin-bottom: 15px">
                                        <tr>
                                            <td style="width: 125px">Nama</td>
                                            <td style="width: 10px">:</td>
                                            <td><b>Anggi Sugih Jatnika</b><td>
                                        </tr>
                                        <tr>
                                            <td style="width: 125px">Nomor KTP</td>
                                            <td style="width: 10px">:</td>
                                            <td>3203041107940007</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 125px" valign="top">Alamat</td>
                                            <td style="width: 10px" valign="top">:</td>
                                            <td>Perumahan Graha Pratama, RT.01 / RW.16, Kel. Sirnagalih, Kec.Cilaku, Kab. Cianjur, Provinsi Jawa Barat.</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 125px">No HP</td>
                                            <td style="width: 10px">:</td>
                                            <td>+62 82-2772-8840</td>
                                        </tr>
                                    </table>
                                    
                                    <p>Yang selanjutnya disebut sebagai <b>PIHAK PERTAMA</b>.</p>

                                    <table style="width:100%; padding: 0px; border-collapse:collapse; margin-bottom: 15px">
                                        <tr>
                                            <td style="width: 125px">Nama</td>
                                            <td style="width: 10px">:</td>
                                            <td class="text-capitalize"><b><?=$agency['nama_pemilik']?></b><td>
                                        </tr>
                                        <tr>
                                            <td style="width: 125px">Nomor KTP</td>
                                            <td style="width: 10px">:</td>
                                            <td id="nomorKtp"></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 125px" valign="top">Alamat</td>
                                            <td style="width: 10px" valign="top">:</td>
                                            <td id="alamatAkad"></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 125px">No HP</td>
                                            <td style="width: 10px">:</td>
                                            <td><?= $agency['no_hp']?></td>
                                        </tr>
                                    </table>
                                    
                                    <p>Yang selanjutnya disebut sebagai <b>PIHAK KEDUA</b>.</p>

                                    <p>Pihak Pertama dan Pihak Kedua disebut <b>PARA PIHAK</b> atau <b>PARA SYARIK</b>.</p>
                                    <div>Secara bersama-sama PARA PIHAK telah sepakat mengenai hal-hal sebagai berikut :</div>
                                    <ol style="padding-left: 20px; margin-top: 0px">
                                        <li>Perjanjian Kerjasama ini dituangkan mengikuti format Akad Syirkah Inan dan dijalankan mengikuti kaidah hukum-hukum syariat Islam.</li>
                                        <li>Ketentuan pokok hukum syara' tentang Syirkah Inan termaktub dalam Mukadimah Akad Syirkah Inan pada Pasal 1 surat ini merupakan satu kesatuan yang tak terpisahkan dan dimaksudkan untuk dijadikan rujukan.</li>
                                        <li>Objek Kerjasama ini adalah usaha <b>Agency Pemasaran Property Syariah</b> pada perusahaan <b><?= $agency['nama_agency']?></b> dengan ketentuan-ketentuan yang diatur dalam pasal-pasal sebagai berikut:</li>
                                    </ol>
                                    <div class="judul"><center><b>Pasal 1<br>MUKADIMAH AKAD SYIRKAH INAN<br>(KETENTUAN POKOK HUKUM SYARA' TENTANG SYIRKAH INAN)</b></center></div>
                                    <ol style="padding-left: 20px;">
                                        <li>Syirkah adalah <i>partnership</i> (kerjasama) antara dua orang atau lebih untuk melakukan aktifitas finansial dalam rangka mendapatkan keuntungan. </li>
                                        <li><b>Syirkah Inan adalah</b> syirkah antara dua pihak atau lebih dengan ketentuan <b>masing-masing syarik (partner)</b> memberikan <b>andil modal</b> dan sekaligus <b>mengelola syirkah yang dibentuk</b>.</li>
                                        <li>Akad syirkah Inan harus dilakukan melalui ijab dan qabul antara pihak-pihak yang berakad, dan di dalamnya harus jelas aktifitas finansial atau usaha yang disepakati.</li>
                                        <li>Legalitas syar'i syirkah Inan diantaranya disandarkan kepada sabda Rasulullah Shalallahu 'Alaihi Wassalam:</li>
                                    </ol>
                                    <p style="padding-left: 20px"><i>Allah 'Azza wa Jalla telah berfirman: Aku adalah pihak ketiga dari dua pihak yang ber-syirkah selama salah satunya tidak mengkhianati yang lainnya. Kalau salah satunya berkhianat, Aku keluar dari keduanya.</i> <b>(HR. Abu Dawud, al-Baihaqi, dan ad-Daruquthni).</b></p>
                                    <ol style="padding-left: 20px;" start="5">
                                        <li>Syirkah dibangun di atas asas <i><b>profit and loss sharing</b></i> yakni pembagian keuntungan dan kerugian. Sharing keuntungan dan kerugian itu dilakukan mengikuti kaedah seperti yang diriwayatkan oleh Abdurrazaq bahwa Ali bin Abi Thalib berkata:</li>
                                    </ol>
                                    <p style="padding-left: 20px"><i>Kerugian itu berdasarkan harta (modal) sedangkan keuntungan berdasarkan apa yang mereka (para syarik yang bersyirkah) sepakati</i> (lihat, Abdurrazaq, <i>Mushannaf 'Abd ar-Razaaq,</i> hadits no 15087, viii/248, al-Maktab al-Islami, Beirut, 1403)</p>
                                    <p style="padding-left: 20px">Kaedah ini diketahui oleh para sahabat dan tidak ada yang mengingkari sehingga hal itu menjadi kesepakatan bahwa kaedah ini adalah benar menurut syariah. Kaedah (hukum) ini juga dipegangi oleh asy-Sya'bi, al-Hasan, Ibn Sirin, Qatadah, al-Hakam, Hamad, Thawus, Ibrahim, Abu Qilabah dan lainnya (lihat, Abdurrazaq, <i>Mushannaf 'Abd ar-Razaaq</i>, viii/248 dst, al-Maktab al-Islami, Beirut. 1403; Ibn Abiy Syaibah, <i>Mushannaf Ibn Abiy Syaybah</i>, iv/477-478, Maktabah ar-Rusyd, Riyadh. 1409).</p>
                                    <ol style="padding-left: 20px;" start="6">
                                        <li>Tanggungjawab dalam pengelolaan syirkah adalah tanggungjawab para pengelola secara bersama-sama tanpa ada perbedaan. Dalam praktek menjalankan syirkah dimungkinkan adanya pembagian tugas diantara para pengelola, meski secara tanggung jawab mereka tetap sama.</li>
                                        <li>Dalam syirkah terkandung asas amanah dan wakalah dimana diantara para syarik saling mengamanahkan dan mewakilkan. Karena itu keputusan yang dibuat oleh salah seorang pengelola tidak boleh dianggap sebagai keputusan personal tetapi secara syar’i merupakan keputusan syirkah atau para pengelola.</li>
                                        <li>Jangka waktu syirkah adalah jangka waktu yang disepakati oleh para syarik ketika akad untuk berlangsungnya kerjasama usaha tersebut dimana pada akhir jangka waktu itu bisa dilakukan peninjauan ulang secara total atau sebagian terhadap akad syirkah untuk kemudian bisa dilanjutkan kembali baik tanpa atau disertai perubahan isi akad, atau akad syirkah tersebut dibubarkan. Dalam semua itu disertai dengan penghitungan rugi laba dan pembagian keuntungan.</li>
                                        <li>Selama jangka waktu syirkah itu dimungkinkan untuk disepakati untuk dibagi dalam periode yang lebih pendek untuk penghitungan rugi laba dan pembagian keuntungan, dan syirkah terus berjalan tanpa perlu diperbarui akadnya.</li>
                                        <li>Akad syirkah merupakan <i>'aqdun mustamirrun</i> yaitu akad yang berlangsung selama jangka waktu tertentu dan seolah-olah akad tersebut terus diperbarui seiring bergulirnya waktu.</li>
                                        <li>Akad syirkah termasuk <i>'aqdun jaa'izun</i> yaitu akad yang tidak mengikat kedua pihak dalam arti masing-masing pihak boleh membatalkan akad sesuai keinginannya tanpa bergantung kepada persetujuan pihak lain. Namun jika pembatalan itu minimal diduga kuat akan mendatangkan dharar kepada pihak lainnya, maka pembatalan itu sesuai kaedah dharar tidak boleh dilakukan.</li>
                                        <li>Jika salah seorang syarik mundur, maka harus dilakukan penghitungan rugi laba dan pembagian keuntungan. Selanjutnya syirkah bisa dilanjutkan untuk para syarik yang tidak mengundurkan diri tanpa harus dilakukan akad baru, hanya saja perlu dilakukan penyesuaian yang diperlukan misalnya dalam hal komposisi modal dan besaran sharing keuntungan dikarenakan berkurangnya syarik dari jumlah semula sehingga berkonsekuensi terjadi perubahan pada jumlah dan komposisi modal dan besaran sharing keuntungan.</li>
                                        <li>Dalam akad syirkah semua syarik dimungkinkan menetapkan syarat terhadap mereka dengan ketentuan syarat tersebut tidak bertentangan dengan syariah.</li>
                                        <li>Modal syirkah bisa berupa uang atau harta selain uang. Jika berupa harta selain uang maka pada saat akad harus ditentukan nilai nominalnya sehingga bisa dilebur dengan modal keseluruhan menjadi satu kesatuan. Modal tersebut harus diserahkan pada saat akad, tidak boleh diutang.</li>
                                        <li>Selama berlangsungnya syirkah dimungkinkan dilakukan perubahan klausul akad, perubahan modal, besaran sharing keuntungan, dan masuknya syarik baru, tentu dengan disertai perubahan dan penyesuaian yang diperlukan. Berupa pembatalan akad sebelumnya yang disetujui oleh semua syarik dan melakukan akad baru.</li>
                                    </ol>

                                    <div class="judul"><center><b>Pasal 2<br>RUANG LINGKUP USAHA</b></center></div>
                                    <ol style="padding: 0px; padding-left: 20px;">
                                        <li>Usaha Syirkah Inan ini adalah usaha <b>Agency Pemasaran Property Syariah</b> pada perusahaan <b><?= $agency['nama_agency']?></b>.</li>
                                        <li>Pengembangan jenis usaha baru atau perluasan ruang lingkup usaha akan ditentukan melalui keputusan bersama para syarik.</li>
                                    </ol>
                                    
                                    <div class="judul"><center><b>Pasal 3<br>PENGELOLA DAN PENGELOLAAN SYIRKAH</b></center></div>
                                    <ol style="padding: 0px; padding-left: 20px;">
                                        <li>Para syarik sebagai satu kesatuan dan secara bersama mengelola syirkah.</li>
                                        <li>Para syarik memiliki tanggung jawab yang sama dalam pengelolaan syirkah.</li>
                                        <li>Pengelola Syirkah menyepakati pembagian tugas, sesuai dengan tugas dan fungsi yang telah diamanahkan kepada masing-masing pengelola pada lampiran dengan judul <b>PEMBAGIAN URAIAN KERJA AGENCY</b>.</li>
                                        <li>Dalam mengelola <b><?= $agency['nama_agency']?></b>, pengelola dalam operasional harian diperbolehkan mendapatkan biaya operasional yang nilai didasarkan kesepakatan semua pihak-pihak yang ber-syirkah dan apabila diperlukan pengelola operasional harian dapat dibantu oleh tenaga tetap (full timer) yang berstatus sebagai karyawan (ajir).</li>
                                    </ol>
                                    
                                    <div class="judul"><center><b>Pasal 4<br>PENGAMBILAN KEPUTUSAN</b></center></div>
                                    <ol style="padding: 0px; padding-left: 20px;">
                                        <li>Keputusan strategis dalam pengelolaan syirkah diputuskan secara kolegial atau bersama-sama oleh PARA PIHAK.</li>
                                        <li>Keputusan yang bersifat operasional dalam hal operasional jalannya syirkah selain ditetapkan secara bersama-sama oleh PARA PIHAK juga bisa diambil atau ditetapkan oleh masing-masing PIHAK sesuai dengan lingkup tugas yang menjadi tanggung jawabnya.</li>
                                        <li>Keputusan yang dibuat oleh masing-masing syarik dalam konteks pengelolaan syirkah berkedudukan sebagai keputusan PARA PIHAK atau keputusan syirkah.</li>
                                    </ol>

                                    
                                    <div class="judul"><center><b>Pasal 5<br>PENYERTAAN MODAL</b></center></div>
                                    <ol style="padding: 0px; padding-left: 20px;">
                                        <li>Modal <i>Syirkah Inan</i> ini adalah berupa uang senilai <b>Rp 4.900.000</b>,- (Terbilang: <i>Empat Juta Sembilan Ratus Ribu Rupiah</i>) yang berasal dari PIHAK KEDUA dan <b>Rp 50.000.000</b>,- (Terbilang: <i>Lima Puluh Juta Rupiah</i>) dari PIHAK PERTAMA berupa biaya kantor, rekrutmen, sistem dan karyawan yang membantu proses kerjasama syirkah ini.</li>
                                        <li>Modal yang akan dikelola dalam usaha ini harus diserahkan (jika berupa uang) pada saat akad Syirkah Inan ini ditandatangani. </li>
                                    </ol>

                                    <div class="judul"><center><b>Pasal 6<br>PEMBAGIAN KEUNTUNGAN</b></center></div>
                                    <ol style="padding: 0px; padding-left: 20px;">
                                        <li>Pembagian keuntungan / profit hasil usaha Syirkah Inan ini dibagikan kepada para syarik berdasarkan kesepakatan PARA PIHAK,</li>
                                        <li>PARA PIHAK telah menyepakati bahwa persentasi/porsi pembagian keuntungan usaha Syirkah Inan ini adalah sebagai berikut:</li>
                                        <ol type="a" style="padding: 0px; padding-left: 20px;">
                                            <li>Jika Closing dari Marketing Freelance yang disediakan maka :</li>
                                            <ul style="padding: 0px; padding-left: 20px;">
                                                <li>Pihak Pertama mendapatkan porsi <b>20%</b> (Terbilang: Dua Puluh Persen)</li>
                                                <li>Pihak Kedua mendapatkan porsi <b>80%</b> (Terbilang: Delapan Puluh Persen)</li>
                                            </ul>
                                        </ol>
                                    </ol>
                                    <ol style="padding: 0px; padding-left: 20px;">
                                        <ol type="a" start="2" style="padding: 0px; padding-left: 20px;">
                                            <li>Jika Closing pribadi maka :</li>
                                            <ul style="padding: 0px; padding-left: 20px;">
                                                <li>Pihak Pertama mendapatkan porsi <b>10%</b> (Terbilang: Sepuluh Persen)</li>
                                                <li>Pihak Kedua mendapatkan porsi <b>90%</b> (Terbilang: Sembilan Puluh Persen)</li>
                                            </ul>
                                        </ol>
                                    </ol>
                                    <ol style="padding: 0px; padding-left: 20px;" start="3">
                                        <li>Keuntungan bersih dihitung dari pendapatan kotor dikurangi biaya-biaya operasional syirkah.</li>
                                        <li>Pembagian keuntungan dilakukan setiap bulan setelah usaha mengalami keuntungan.</li>
                                    </ol>

                                    <div class="judul"><center><b>Pasal 7<br>PEMBAGIAN KERUGIAN</b></center></div>
                                    <ol style="padding: 0px; padding-left: 20px;">
                                        <li>Kerugian usaha adalah hasil usaha dikurangi pengeluaran usaha bernilai negatif atau besar modal usaha menjadi berkurang atau musnah dalam suatu kegiatan usaha.</li>
                                        <li>Pembagian kerugian dalam Syirkah Inan ini dilakukan berdasarkan ketentuan Syariah Islam, yaitu sebagai berikut:</li>
                                        <ol type="a" style="padding: 0px; padding-left: 20px;">
                                            <li>Kerugian finansial ditanggung oleh PARA PIHAK sebesar modal yang disetorkannya.</li>
                                            <li>Kerugian non finansial, seperti tenaga, waktu dan pikiran, ditanggung oleh PARA PIHAK Selaku Pengelola.</li>
                                        </ol>
                                    </ol>
                                    
                                    <div class="judul"><center><b>Pasal 8<br>JANGKA WAKTU SYIRKAH</b></center></div>
                                    <ol style="padding: 0px; padding-left: 20px;">
                                        <li>PARA PIHAK telah menyepakati jangka waktu Syirkah Inan berlaku sejak ditandatanganinya akad syirkah yaitu tanggal <b><span class="tgl_gabung"></span></b> sampai dengan memutuskan semua syarik untuk berakhir.</li>
                                        <li>Pada saat berakhirnya jangka waktu akad syirkah ini dimungkinkan untuk:</li>
                                        <ol type="a" style="padding: 0px; padding-left: 20px;">
                                            <li>Dilakukan peninjauan ulang terhadap klausul-klausul akad Syirkah ’Inan ini baik secara total atau sebagian untuk kemudian Syirkah 'Inan ini bisa dilanjutkan kembali baik tanpa atau disertai perubahan isi akad. </li>
                                            <li>Dilakukan pembubaran Syirkah.</li>
                                            <li>Pada masing-masing kondisi yang disebutkan pada pasal 8, disertai dengan penghitungan rugi laba dan pembagian keuntungan.</li>
                                            <li>Penyerahan kembali seluruh sarana/prasarana milik pihak <i>musyarikh</i> serta pembagian kekayaan perusahaan dilakukan pada saat berakhirnya syarikat dan/atau setelah disetujui semua pihak.</li>
                                        </ol>
                                    </ol>
                                    
                                    <ol style="padding: 0px; padding-left: 20px;" start="3">
                                        <li>Jangka waktu evaluasi syirkah dibagi dalam beberapa periode dengan ketentuan:</li>
                                        <ol type="a" style="padding: 0px; padding-left: 20px;">
                                            <li>Setiap periode memiliki selang waktu 1 bulan.</li>
                                            <li>Dilakukan pembubaran Syirkah.</li>
                                            <li>Pada setiap akhir periode dilakukan penghitungan rugi laba dan pembagian keuntungan.</li>
                                        </ol>
                                    </ol>

                                    <div class="judul"><center><b>Pasal 9<br>HAK DAN KEWAJIBAN</b></center></div>
                                    <p>Selama jangka waktu syarikat, hak dan kewajiban semua pihak Syirkah Inan adalah sebagai berikut:</p>
                                    <ol type="1" style="padding: 0px; padding-left: 20px;">
                                        <li>Berkewajiban untuk tidak mengambil atau menambah sejumlah modal usaha, kecuali dalam keadaan istimewa (menyelamatkan usaha dan/atau memanfaatkan situasi) dan merupakan kesepakatan PARA PIHAK.</li>
                                        <li>Berkewajiban mengelola modal usaha yang telah dikumpulkan bersama untuk suatu kegiatan usaha yang telah ditetapkan, segera setelah akad syirkah ini disepakati dan ditandatangani.</li>
                                        <li>Bersama-sama dengan penuh tanggung jawab mengelola modal usaha sesuai dengan kaidah-kaidah organisasi yang baik seperti membuat laporan rutin, membuat perencanaan dengan baik, melakukan inovasi, pengembangan kegiatan usaha dan melakukan kegiatan-kegiatan lainnya sehingga mengarah kepada tercapainya visi dan misi bersama.</li>
                                        <li>Bersama-sama melakukan kontrol terhadap kegiatan usaha dengan diketahui oleh semua pihak.</li>
                                    </ol>

                                    <div class="judul"><center><b>Pasal 10<br>PERUBAHAN AKAD</b></center></div>
                                    
                                    <ol type="1" style="padding: 0px; padding-left: 20px;">
                                        <li>Selama berlangsungnya Syirkah dimungkinkan untuk dilakukan perubahan klausul akad Syirkah Inan ini sesuai kesepakatan PARA PIHAK dengan tetap mengacu kepada ketentuan hukum syara' .</li>
                                    </ol>

                                    <div class="judul"><center><b>Pasal 11<br>PENGUNDURAN DIRI SYARIK ATAU PENAMBAHAN SYARIK BARU</b></center></div>
                                    <ol style="padding: 0px; padding-left: 20px;">
                                        <li>Selama berlangsungnya akad Syirkah Inan ini, setiap Syarik boleh mengundurkan diri dengan menunggu persetujuan PARA PIHAK.</li>
                                        <li>Dalam hal ada sebagian Syarik mengundurkan diri maka:</li>
                                        <ol type="a" style="padding: 0px; padding-left: 20px;">
                                            <li>Penghitungan rugi laba, pembagian keuntungan dan pengembalian modal dilakukan pada akhir periode dimana Syarik mengundurkan diri. Hal itu untuk kemudahan manajemen syirkah khususnya dari sisi keuangan.</li>
                                            <li>Syirkah Inan ini akan terus dilanjutkan untuk para Syarik yang tidak mengundurkan diri disertai penyesuaian yang diperlukan terutama dalam hal komposisi modal dan porsi pembagian keuntungan, kecuali jika para Syarik memutuskan lain (pembubaran syirkah).</li>
                                        </ol>
                                    </ol>

                                    <div class="judul"><center><b>Pasal 12<br>PERSELISIHAN</b></center></div>
                                    <ol style="padding: 0px; padding-left: 20px;">
                                        <li>Jika terjadi perselisihan, PARA PIHAK sepakat untuk menyelesaikannya secara musyawarah.</li>
                                        <li>Jika perselisihan antara PARA PIHAK tidak dapat diselesaikan dengan musyawarah maka PARA PIHAK sepakat untuk menunjuk pihak ketiga yang disepakati oleh PARA PIHAK sebagai yang dipercaya untuk memberikan jalan keluar.</li>
                                        <li>Segala sesuatu yang merupakan hasil penyelesaian perselisihan dituangkan dalam suatu berita acara.</li>
                                    </ol>

                                    <div class="judul"><center><b>Pasal 13<br>LAIN-LAIN</b></center></div>
                                    <ol style="padding: 0px; padding-left: 20px;">
                                        <li>Akad ini dibuat PARA PIHAK dalam keadaan sadar tanpa tekanan pihak manapun.</li>
                                        <li>Hal-hal lain yang mungkin kelak akan muncul dikemudian hari dan belum diatur dalam surat akad ini akan dimusyawarahkan kedua pihak yang akan dituangkan dalam bentuk <i>addendum</i>.</li>
                                        <li>Dokumen ini dibuat dalam 2 (dua) rangkap yang memiliki kekuatan hukum yang sama. Masing-masing salinan dipegang oleh PARA PIHAK.</li>
                                    </ol>

                                    <div class="judul"><center><b>Pasal 14<br>Khatimah</b></center></div>
                                    <p class="judul"><i>"Dan janganlah sebagian kamu memakan harta sebagian yang lain di antara kamu dengan cara yang bathil dan janganlah kamu membawa urusan harta kepada hakim supaya kamu dapat memakan sebagian harta benda orang lain dengan jalan berbuat dosa, padahal kamu mengetahui"<br>
                                    </i>(Al-Baqoroh 2 : 188)</p>

                                    <input type="checkbox" name="setuju" id="setuju" class="mr-1"><label for="setuju">Dengan ini setuju</label>

                                    <div class="d-flex justify-content-between">
                                        <button type="button" class="btn btn-sm btn-success" id="prev-1"><i class="fa fa-arrow-left"></i> Data Akad</button>
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

        $("#form-2").hide();

        $("#tgl_bergabung").change(function(){
            
            var d = new Date(this.value);
            var month = d.getMonth()+1;
            var day = d.getDate();
            var year = d.getFullYear();
            var bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

            $(".tgl_gabung").html(day + ' ' + bulan[month] + ' ' + year);
        })
        
        $("#no_ktp").keyup(function(){
            $("#nomorKtp").html(this.value)
        })

        
        $("#prev-1").click(function(){
            $("#form-1").show();
            $("#form-2").hide();
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
            if($("#tgl_bergabung").val() == '' || $("#no_ktp").val() == '' || $("#alamat").val() == '' || $("#rt").val() == '' || $("#rw").val() == '' || $("#kel_desa").val() == '' || $("#kel").val() == '' || $("#kec").val() == '' || $("#kab_kota").val() == '' || $("#prov").val() == '' || $("#ktp").val() == ''){
                Swal.fire({
                    icon: 'error',
                    text: 'Harap mengisi yang bertanda *'
                })
                return false;
            } else {
                $("#form-1").hide();
                $("#form-2").show();
            }
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