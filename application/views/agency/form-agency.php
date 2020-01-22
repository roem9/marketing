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
                            <h6 class="m-0 font-weight-bold text-light"><center>Form Data Agency</center></h6>
                        </div>
                    </div>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url()?>agency/tambahagency" method="POST" enctype="multipart/form-data" id="formInputMarketing">
                            <div class="col-md-4 col-5 bg-info mb-3" style="margin-left: -20px">
                                <h6 class="text-light font-weigth-bold pl-2">Data Diri</h6>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Agency <span class="text-danger">*</span></label>
                                <input type="text" data-form="Nama Agency" class="form-control form-control-sm form-1" name="nama_agency" id="nama_agency">
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Pemilik (Sesuai KTP) <span class="text-danger">*</span></label>
                                <input type="text" data-form="Nama Pemilik" maxlength=100 name="nama" id="nama" class="form-control form-control-sm form-1" autocomplete="off" autocorrect="off" autocapitalize="off">
                            </div>
                            <div class="form-group">
                                <label for="email">Email <span class="text-danger">*</span></label>
                                <input type="text" data-form="Email" maxlength=100 name="email" id="email" class="form-control form-control-sm form-1" autocomplete="off" autocorrect="off" autocapitalize="off">
                            </div>
                            <div class="form-group">
                                <label for="no_wa">No Whatsapp <span class="text-danger">*</span></label>
                                <input type="text" data-form="No Whatsapp" maxlength=13 name="no_wa" id="no_wa" class="form-control form-control-sm form-1" autocomplete="off" autocorrect="off" autocapitalize="off">
                            </div>
                            <div class="form-group">
                                <label for="no_hp">No Handphone <span class="text-danger">*</span></label>
                                <input type="text" data-form="No Handphone" maxlength=13 name="no_hp" id="no_hp" class="form-control form-control-sm form-1" autocomplete="off" autocorrect="off" autocapitalize="off">
                            </div>
                            <div class="form-group mb-0">
                                <label for="foto">Bukti Pembayaran <span class="text-danger">*</span></label>
                            </div>
                            <div class="form-group">
                                <input type="file" data-form="Bukti Pembayaran" name="foto" id="foto" class="form-1">
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
            var c = confirm("Anda yakin akan menyimpan data agency?")
            return c
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