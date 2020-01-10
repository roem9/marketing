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
                    <div class="card-header py-3 bg-primary">
                    <div class="row">
                        <div class="col">
                            <h6 class="m-0 font-weight-bold text-light">Form Data Agency</h6>
                        </div>
                    </div>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url()?>agency/tambahagency" method="POST" enctype="multipart/form-data" id="formInputMarketing">
                            <div class="form-group">
                                <label for="nama">Nama Agency <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm" name="nama_agency" id="nama_agency">
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Pemilik (Sesuai KTP) <span class="text-danger">*</span></label>
                                <input type="text" maxlength=100 name="nama" id="nama" class="form-control form-control-sm" autocomplete="off" autocorrect="off" autocapitalize="off">
                            </div>
                            <div class="form-group">
                                <label for="email">Email <span class="text-danger">*</span></label>
                                <input type="text" maxlength=100 name="email" id="email" class="form-control form-control-sm" autocomplete="off" autocorrect="off" autocapitalize="off">
                            </div>
                            <div class="form-group">
                                <label for="no_wa">No Whatsapp <span class="text-danger">*</span></label>
                                <input type="text" maxlength=13 name="no_wa" id="no_wa" class="form-control form-control-sm" autocomplete="off" autocorrect="off" autocapitalize="off">
                            </div>
                            <div class="form-group">
                                <label for="no_hp">No Hp <span class="text-danger">*</span></label>
                                <input type="text" maxlength=13 name="no_hp" id="no_hp" class="form-control form-control-sm" autocomplete="off" autocorrect="off" autocapitalize="off">
                            </div>
                            <div class="form-group">
                                <label for="no_rek">No Rekening <span class="text-danger">*</span></label>
                                <input type="text" maxlength=20 name="no_rek" id="no_rek" class="form-control form-control-sm" autocomplete="off" autocorrect="off" autocapitalize="off">
                            </div>
                            <div class="form-group">
                                <label for="bank">Nama Bank <span class="text-danger">*</span></label>
                                <input type="text" maxlength=100 name="bank" id="bank" class="form-control form-control-sm" autocomplete="off" autocorrect="off" autocapitalize="off">
                            </div>
                            <div class="form-group">
                                <label for="an_rek">A.N Rekening <span class="text-danger">*</span></label>
                                <input type="text" maxlength=100 name="an_rek" id="an_rek" class="form-control form-control-sm" autocomplete="off" autocorrect="off" autocapitalize="off">
                            </div>
                            <div class="form-group">
                                <label for="npwp">No NPWP <span class="text-danger">*</span></label>
                                <input type="text" maxlength=15 name="npwp" id="npwp" class="form-control form-control-sm" autocomplete="off" autocorrect="off" autocapitalize="off">
                            </div>
                            <div class="d-flex justify-content-end">
                                <input type="submit" value="Simpan Data Agency" class="btn btn-sm btn-primary float-right" id="simpan">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

</div>
    
    <script src="<?= base_url()?>assets/js/script.js"></script>
  <script>
    $("#simpan").click(function(){
        if($("#nama_agency").val() == '' || $("#nama").val() == '' || $("#no_wa").val() == '' || $("#no_hp").val() == '' || $("#now_wa").val() == '' || $("#no_rek").val() == '' || $("#bank").val() == '' || $("#an_rek").val() == '' || $("#npwp").val() == ''){
            Swal.fire({
                icon: 'error',
                text: 'Harap mengisi yang bertanda *'
            })
            return false;
        } else {
            var c = confirm('Yakin akan menyimpan data agency anda?');
            return c;
        }
    })

    setInputFilter(document.getElementById("nama"), function(value) {
        return /^[a-z \s \-]*$/i.test(value);
    });

    setInputFilter(document.getElementById("no_wa"), function(value) {
        return /^[0-9]*$/i.test(value);
    });

    setInputFilter(document.getElementById("no_rek"), function(value) {
        return /^[0-9]*$/i.test(value);
    });

    setInputFilter(document.getElementById("bank"), function(value) {
        return /^[a-z \s \-]*$/i.test(value);
    });

    setInputFilter(document.getElementById("an_rek"), function(value) {
        return /^[a-z \s \-]*$/i.test(value);
    });

    setInputFilter(document.getElementById("npwp"), function(value) {
        return /^[0-9]*$/i.test(value);
    });
  </script>