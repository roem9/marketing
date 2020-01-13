<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800 mt-3"><?= $header?></h1>
            </div>
            <div class="row">
                <div class="col-5">
                <?php if( $this->session->flashdata('marketing') ) : ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                Data marketing <strong>berhasil</strong> <?= $this->session->flashdata('marketing');?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                </div>
            </div>
            <!-- DataTales Example -->
            <div class="card shadow mb-4" style="max-width: 850px">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a href="<?=base_url()?>marketing/si" class="nav-link <?php if($tab == 'si')echo 'active'?>" id="aktif">SI</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=base_url()?>marketing/agency" class="nav-link <?php if($tab == 'agency')echo 'active'?>" id="konfirm">Agency</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <table id="dataTable" class="table table-sm fo-13">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Status</th>
                                <th>Kd Marketing</th>
                                <th>Nama Marketing</th>
                                <th>Nama LAC</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 0;
                            foreach ($marketing as $marketing) :?>
                                <tr>
                                    <td><?= ++$no?></td>
                                    <td><?= $marketing['status']?></td>
                                    <td><?= $marketing['kd_marketing']?></td>
                                    <td><?= $marketing['nama_marketing']?></td>
                                    <td><?= $marketing['nama_lac']?></td>
                                    <td><center><a href="#" class="badge badge-warning modalMarketing" data-toggle="modal" data-target="#modalMarketing" data-id="<?= $marketing['kd_marketing']?>">detail</a></center></td>
                                </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $("#sidebarMarketing").addClass("active");
    
    $(".modalMarketing").click(function(){
        const id = $(this).data('id');
        $.ajax({
            url : "<?=base_url()?>marketing/getmarketingbyid",
            method : "POST",
            data : {kd_marketing : id, tabel : "marketing_si"},
            async : true,
            dataType : 'json',
            success : function(data){
                $("#status").val(data.status);
                $("#nama_marketing").val(data.nama_marketing);
                $("#email").val(data.email);
                $("#no_hp").val(data.no_hp);
                $("#no_wa").val(data.no_wa);
                $("#tgl_masuk").val(data.tgl_masuk);
                $("#alamat").val(data.alamat);
                $("#rt").val(data.rt);
                $("#rw").val(data.rw);
                $("#kel").val(data.kel);
                $("#kec").val(data.kec);
                $("#kab_kota").val(data.kab_kota);
                $("#no_rek").val(data.no_rek);
                $("#nama_bank").val(data.nama_bank);
                $("#an_rek").val(data.an_rek);
                $("#npwp").val(data.no_npwp);
                $("#kd_marketing").val(data.kd_marketing);
            }
        })
    })
    
    $("#btn-form-1").addClass("active")
    $("#form-2").hide();
    $("#form-3").hide();

    $("#btn-form-1").click(function(){
        $("#btn-form-1").addClass("active")
        $("#btn-form-2").removeClass("active")
        $("#btn-form-3").removeClass("active")

        $("#form-1").show();
        $("#form-2").hide();
        $("#form-3").hide();
    })
    
    $("#btn-form-2").click(function(){
        $("#btn-form-1").removeClass("active")
        $("#btn-form-2").addClass("active")
        $("#btn-form-3").removeClass("active")

        $("#form-1").hide();
        $("#form-2").show();
        $("#form-3").hide();
    })
    
    $("#btn-form-3").click(function(){
        $("#btn-form-1").removeClass("active")
        $("#btn-form-2").removeClass("active")
        $("#btn-form-3").addClass("active")

        $("#form-1").hide();
        $("#form-2").hide();
        $("#form-3").show();
    })

    $("#updateModal").click(function(){
        var c = confirm("Yakin akan mengupdate data marketing?");
        return c;
    })
</script>