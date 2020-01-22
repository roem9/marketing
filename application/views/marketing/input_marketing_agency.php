<div id="content-wrapper" class="d-flex flex-column">

    <div id="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
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
                    <?php if( $this->session->flashdata('gagal') ) : ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <?= $this->session->flashdata('gagal');?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <div class="row">
                            <div class="col">
                                <h6 class="m-0 font-weight-bold text-primary">Input Marketing Agency <?= $agency['nama_agency']?></h6>
                            </div>
                        </div>
                        </div>
                        <div class="card-body">
                            <?php if($agency) :?>
                                <div class="progress mb-3">
                                    <div id="progressBar" class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <form action="<?= base_url()?>marketing/insertmarketingagency" method="POST" enctype="multipart/form-data" id="formInputMarketing">
                                    <input type="hidden" name="id_agency" value="<?= $agency['id_agency']?>">
                                    <input type="hidden" name="nama_agency" value="<?= $agency['nama_agency']?>">
                                    <div class="form-detail" id="form-1">
                                        <div class="form-group">
                                            <label for="nama">Nama Lengkap <span class="text-danger">*</span></label>
                                            <input type="text" maxlength=100 name="nama" id="nama" class="form-control form-control-sm form-1" autocomplete="off" autocorrect="off" autocapitalize="off">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email <span class="text-danger">*</span></label>
                                            <input type="text" maxlength=100 name="email" id="email" class="form-control form-control-sm form-1" autocomplete="off" autocorrect="off" autocapitalize="off">
                                        </div>
                                        <div class="form-group">
                                            <label for="no_wa">No Whatsapp <span class="text-danger">*</span></label>
                                            <input type="text" maxlength=13 name="no_wa" id="no_wa" class="form-control form-control-sm form-1" autocomplete="off" autocorrect="off" autocapitalize="off">
                                        </div>
                                        <div class="form-group">
                                            <label for="no_hp">No Hp <span class="text-danger">*</span></label>
                                            <input type="text" maxlength=13 name="no_hp" id="no_hp" class="form-control form-control-sm form-1" autocomplete="off" autocorrect="off" autocapitalize="off">
                                        </div>
                                        <div class="form-group">
                                            <label for="t4_lahir">Tempat Lahir <span class="text-danger">*</span></label>
                                            <input type="text" maxlength=100 name="t4_lahir" id="t4_lahir" class="form-control form-control-sm form-1" autocomplete="off" autocorrect="off" autocapitalize="off">
                                        </div>
                                        <div class="form-group">
                                            <label for="tgl_lahir">Tgl Lahir <span class="text-danger">*</span></label>
                                            <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control form-control-sm form-1">
                                        </div>
                                        <div class="form-group">
                                            <label for="tgl_masuk">Tgl Masuk <span class="text-danger">*</span></label>
                                            <input type="date" name="tgl_masuk" id="tgl_masuk" class="form-control form-control-sm form-1">
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button type="button" class="btn btn-sm btn-success" id="next-form-1"><i class="fa fa-arrow-right"></i> Next</button>
                                        </div>
                                    </div>
                                    <div class="form-detail" id="form-2">
                                        <div class="form-group">
                                            <label for="alamat">Alamat <span class="text-danger">*</span></label>
                                            <textarea name="alamat" maxlength=300 id="alamat" class="form-control form-control-sm form-2"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="rt">RT <span class="text-danger">*</span></label>
                                            <input type="text" maxlenght=3 name="rt" id="rt" class="form-control form-control-sm form-2" autocomplete="off" autocorrect="off" autocapitalize="off">
                                        </div>
                                        <div class="form-group">
                                            <label for="rw">RW <span class="text-danger">*</span></label>
                                            <input type="text" maxlength=3 name="rw" id="rw" class="form-control form-control-sm form-2" autocomplete="off" autocorrect="off" autocapitalize="off">
                                        </div>
                                        <div class="form-group">
                                            <label for="kel">Kelurahan / Desa <span class="text-danger">*</span></label>
                                            <div class="form-gro">
                                                <label class="radio-inline mr-3"><input type="radio" id="kel_desa" name="kel_desa" value="Kel." checked> &nbsp; Kelurahan</label>
                                                <label class="radio-inline"><input type="radio" id="kel_desa" name="kel_desa" value="Desa"> &nbsp; Desa</label>
                                            </div>
                                            <input data-form="Kelurahan / Desa" class='form-control form-control-sm form-2' type="text" name="kel" id="kel" autocomplete="off" autocorrect="off" autocapitalize="off">
                                        </div>
                                        <div class="form-group">
                                            <label for="keckel">Kecamatan <span class="text-danger">*</span></label>
                                            <input type="text" maxlength=100 name="kec" id="kec" class="form-control form-control-sm form-2" autocomplete="off" autocorrect="off" autocapitalize="off">
                                        </div>
                                        <div class="form-group">
                                            <label for="kab_kota">Kab/Kota <span class="text-danger">*</span></label>
                                            <input type="text" maxlength=100 name="kab_kota" id="kab_kota" class="form-control form-control-sm form-2" autocomplete="off" autocorrect="off" autocapitalize="off">
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <button type="button" class="btn btn-sm btn-success" id="back-form-2"><i class="fa fa-arrow-left"></i> Back</button>
                                            <button type="button" class="btn btn-sm btn-success" id="next-form-2"><i class="fa fa-arrow-right"></i> Next</button>
                                        </div>
                                    </div>
                                    <div class="form-detail" id="form-3">
                                        <div class="form-group">
                                            <label for="bank">Nama Bank <span class="text-danger">*</span></label>
                                            <input type="text" maxlength=100 name="bank" id="bank" class="form-control form-control-sm form-3" autocomplete="off" autocorrect="off" autocapitalize="off">
                                        </div>
                                        <div class="form-group">
                                            <label for="cabang_bank">Cabang Bank <span class="text-danger">*</span></label>
                                            <input type="text" maxlength=100 name="cabang_bank" id="cabang_bank" class="form-control form-control-sm form-3" autocomplete="off" autocorrect="off" autocapitalize="off">
                                        </div>
                                        <div class="form-group">
                                            <label for="no_rek">No Rekening <span class="text-danger">*</span></label>
                                            <input type="text" maxlength=20 name="no_rek" id="no_rek" class="form-control form-control-sm form-3" autocomplete="off" autocorrect="off" autocapitalize="off">
                                        </div>
                                        <div class="form-group">
                                            <label for="an_rek">Nama Pemilik Rekening <span class="text-danger">*</span></label>
                                            <input type="text" maxlength=100 name="an_rek" id="an_rek" class="form-control form-control-sm form-3" autocomplete="off" autocorrect="off" autocapitalize="off">
                                        </div>
                                        <div class="form-group">
                                            <label for="npwp">NPWP <span class="text-danger">*</span></label>
                                            <input type="text" maxlength=15 name="npwp" id="npwp" class="form-control form-control-sm form-3" autocomplete="off" autocorrect="off" autocapitalize="off">
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <button type="button" class="btn btn-sm btn-success" id="back-form-3"><i class="fa fa-arrow-left"></i> Back</button>
                                            <button type="submit" class="btn btn-sm btn-primary" id="simpan">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            <?php else : ?>
                                <span class="text-danger">Kesalahan link. Silahkan hubungi admin untuk meminta link</span>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<script src="<?=base_url()?>assets/js/script.js"></script>
<script>
    $("#form-2").hide();
    $("#form-3").hide();

    $("#next-form-1").click(function(){
        let empty = false;

        $.each($('.form-1'),function() {
            if ($(this).val().length == 0) {
                empty = true;
            }
        })
        
        if(empty == true){
            Swal.fire({
                icon: 'error',
                text: 'Harap mengisi yang bertanda * terlebih dahulu'
            })
            return false;
        } else {
            $("#progressBar").css("width", "50%");
            $("#form-1").hide()
            $("#form-2").show();
            $("#form-3").hide();
        }
    })
    
    $("#next-form-2").click(function(){
        let empty = false;

        $.each($('.form-2'),function() {
            if ($(this).val().length == 0) {
                empty = true;
            }
        })
        
        if(empty == true){
            Swal.fire({
                icon: 'error',
                text: 'Harap mengisi yang bertanda * terlebih dahulu'
            })
            return false;
        } else {
            $("#progressBar").css("width", "100%");
            $("#form-1").hide()
            $("#form-2").hide();
            $("#form-3").show();
        }
    })

    $("#simpan").click(function(){
        let cek = 0;
        $.each($('.form-3'),function() {
            if ($(this).val().length == 0) {
                cek++;
            } 
        })
        
        if(cek == 0){
            var c = confirm("Yakin akan menyimpan data marketing Anda?");
            return c;
        } else {
            Swal.fire({
                icon: 'error',
                text: 'Harap mengisi yang bertanda * terlebih dahulu'
            })  
            return false;
        }
    })

    $("#back-form-2").click(function(){
        $("#progressBar").css("width", "0%");
        $("#form-1").show()
        $("#form-2").hide();
        $("#form-3").hide();
    })

    $("#back-form-3").click(function(){
        
        $("#progressBar").css("width", "50%");
        $("#form-1").hide()
        $("#form-2").show();
        $("#form-3").hide();
    })

    setInputFilter(document.getElementById("nama"), function(value) {
        return /^[a-z \s \- ']*$/i.test(value);
    });

    setInputFilter(document.getElementById("no_wa"), function(value) {
        return /^[0-9]*$/i.test(value);
    });

    setInputFilter(document.getElementById("no_hp"), function(value) {
        return /^[0-9]*$/i.test(value);
    });

    setInputFilter(document.getElementById("t4_lahir"), function(value) {
        return /^[a-z \s \- ']*$/i.test(value);
    });

    setInputFilter(document.getElementById("alamat"), function(value) {
        return /^[a-z \s 0-9 , ( ) . / \- ' "]*$/i.test(value);
    });

    setInputFilter(document.getElementById("rt"), function(value) {
        return /^[0-9]*$/i.test(value);
    });

    setInputFilter(document.getElementById("rw"), function(value) {
        return /^[0-9]*$/i.test(value);
    });

    setInputFilter(document.getElementById("kel"), function(value) {
        return /^[a-z \s \- ']*$/i.test(value);
    });

    setInputFilter(document.getElementById("kec"), function(value) {
        return /^[a-z \s \- ']*$/i.test(value);
    });

    setInputFilter(document.getElementById("kab_kota"), function(value) {
        return /^[a-z \s \- ']*$/i.test(value);
    });

    setInputFilter(document.getElementById("no_rek"), function(value) {
        return /^[0-9]*$/i.test(value);
    });

    setInputFilter(document.getElementById("bank"), function(value) {
        return /^[a-z \s \-]*$/i.test(value);
    });

    setInputFilter(document.getElementById("an_rek"), function(value) {
        return /^[a-z \s \- ']*$/i.test(value);
    });

    setInputFilter(document.getElementById("npwp"), function(value) {
        return /^[0-9]*$/i.test(value);
    });
</script>