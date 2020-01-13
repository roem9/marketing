    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 mt-3"><?=$header?></h1>
          </div>
          <div class="row">
            <div class="col-5">
              <?php if( $this->session->flashdata('agency') ) : ?>
                  <div class="row">
                      <div class="col-12">
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                              Data agency <strong>berhasil</strong> <?= $this->session->flashdata('agency');?>
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
          <div class="card shadow mb-4" style="width: 800px">
            <div class="card-header">
              <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                  <a href="<?= base_url()?>agency/batch/3" class="nav-link <?php if($batch == '3') echo 'active'?>">Batch 3</a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url()?>agency/batch/4" class="nav-link <?php if($batch == '4') echo 'active'?>">Batch 4</a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url()?>agency/batch/5" class="nav-link <?php if($batch == '5') echo 'active'?>">Batch 5</a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url()?>agency/konfirmasi" class="nav-link <?php if($batch == '6')echo 'active'?>">Konfirmasi</a>
                </li>
                <!-- <a href="#" data-toggle="modal" data-target="#modal_add_agency" class="nav-link btn btn-success btn-sm">Tambah Agency</a> -->
              </ul>
            </div>
            <div class="card-body">
              <table id="dataTable" class="table table-sm fo-13">
                  <thead>
                    <tr>
                      <th rowspan=2>No</th>
                      <th rowspan=2>Status</th>
                      <th rowspan=2>Nama Agency</th>
                      <th rowspan=2><center>Akad</center></th>
                      <th colspan=3><center>Marketing</center></th>
                      <th rowspan=2>Detail</th>
                    </tr>
                    <tr>
                        <th>Aktif</th>
                        <th>Nonaktif</th>
                        <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php 
                          $no = 0;
                          foreach ($agency as $agency) :?>
                              <tr>
                                <td><?= ++$no?></td>
                                <td><?= $agency['status']?></td>
                                <td><?= $agency['nama_agency']?></td>
                                <td style="text-align:center">
                                  <?php if($agency['akad'] == 'tersedia'):?>
                                    <a href="<?= base_url()?>agency/suratakad/<?=$agency['id_agency'] . '/' . rawurlencode($agency['nama_agency'])?>" target="_blank"><i class="fa fa-file-download text-primary"></i></a>
                                  <?php else : ?>
                                    -
                                  <?php endif;?>
                                </td>
                                <td><center><?= $agency['aktif']?></center></td>
                                <td><center><?= $agency['nonaktif']?></center></td>
                                <td><center><?= $agency['marketing']?></center></td>
                                <td><center><a href="#" class="badge badge-warning modalAgency" data-toggle="modal" data-target="#exampleModalScrollable" data-id="<?= $agency['id_agency']?>">detail</a></center></td>
                              </tr>
                      <?php endforeach;?>
                  </tbody>
              </table>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

    <script>
      $("#status option[value='konfirm']").remove();
      $("#sidebarAgency").addClass("active");
      $("#btn-form-1").addClass("active")
      $("#form-2").hide();
      $("#form-3").hide();
      $("#form-4").hide();


      $(".modalAgency").click(function(){
        const id = $(this).data('id');
        // console.log(id)
        $.ajax({
            url : "<?=base_url()?>agency/getagencybyid",
            method : "POST",
            data : {id_agency : id},
            async : true,
            dataType : 'json',
            success : function(data){
              $("#link_akad").val('<?= base_url()?>agency/akad/' + data.id_agency + '/' + encodeURIComponent(data.nama_agency));
              $("#link_marketing").val('<?= base_url()?>marketing/inputmarketingagency/' + data.id_agency + '/' + encodeURIComponent(data.nama_agency));
              $("#status").val(data.status);
              $("#nama_agency").val(data.nama_agency);
              $("#nama_pemilik").val(data.nama_pemilik);
              $("#email").val(data.email);
              $("#no_wa").val(data.no_wa);
              $("#no_hp").val(data.no_hp);
              $("#alamat").val(data.alamat);
              $("#tgl_masuk").val(data.tgl_masuk);
              $("#no_rek").val(data.no_rek);
              $("#nama_bank").val(data.bank);
              $("#an_rek").val(data.an_rek);
              $("#npwp").val(data.npwp);
              $("#id_agency").val(data.id_agency);
            }
        })
        
        $.ajax({
            url : "<?=base_url()?>agency/getmarketingaktif",
            method : "POST",
            data : {id_agency : id},
            async : true,
            dataType : 'json',
            success : function(data){
                $("#pesan-aktif").show();
                $("#form-aktif").show();

                if(data.length > 0){
                    $("#pesan-aktif").hide();
                } else {
                    $("#form-aktif").hide();
                }

                $('#jumlah-marketing-aktif').html(data.length);
                var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    html += '<li class="list-group-item">' + data[i].nama_marketing + '</li>';
                }
                $('#list-marketing-aktif').html(html);
            }
        })

        $.ajax({
            url : "<?=base_url()?>agency/getmarketingnonaktif",
            method : "POST",
            data : {id_agency : id},
            async : true,
            dataType : 'json',
            success : function(data){
                $("#pesan-nonaktif").show();

                if(data.length > 0){
                    $("#pesan-nonaktif").hide();
                }

                $('#jumlah-marketing-nonaktif').html(data.length);
                var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    html += '<li class="list-group-item"> ' + data[i].nama_marketing + '</li>';
                }
                $('#list-marketing-nonaktif').html(html);
            }
        })

      })

      $(".modalLink").click(function(){
        const id = $(this).data('id');
        // console.log(id)
        $.ajax({
            url : "<?=base_url()?>agency/getagencybyid",
            method : "POST",
            data : {id_agency : id},
            async : true,
            dataType : 'json',
            success : function(data){
              $("#link_akad").val('<?= base_url()?>agency/akad/' + data.id_agency + '/' + encodeURIComponent(data.nama_agency));
              $("#namaAgency").html(data.nama_agency);
            }
        })
      })

      $("#btn-form-1").click(function(){
        $("#btn-form-1").addClass("active")
        $("#btn-form-2").removeClass("active")
        $("#btn-form-3").removeClass("active")
        $("#btn-form-4").removeClass("active")

        $("#form-1").show();
        $("#form-2").hide();
        $("#form-3").hide();
        $("#form-4").hide();
    })
    
    $("#btn-form-2").click(function(){
        $("#btn-form-1").removeClass("active")
        $("#btn-form-2").addClass("active")
        $("#btn-form-3").removeClass("active")
        $("#btn-form-4").removeClass("active")

        $("#form-1").hide();
        $("#form-2").show();
        $("#form-3").hide();
        $("#form-4").hide();
    })
    
    $("#btn-form-3").click(function(){
        $("#btn-form-1").removeClass("active")
        $("#btn-form-2").removeClass("active")
        $("#btn-form-3").addClass("active")
        $("#btn-form-4").removeClass("active")

        $("#form-1").hide();
        $("#form-2").hide();
        $("#form-3").show();
        $("#form-4").hide();
    })
    
    $("#btn-form-4").click(function(){
        $("#btn-form-1").removeClass("active")
        $("#btn-form-2").removeClass("active")
        $("#btn-form-3").removeClass("active")
        $("#btn-form-4").addClass("active")

        $("#form-1").hide();
        $("#form-2").hide();
        $("#form-3").hide();
        $("#form-4").show();
    })  

    $("#simpanAgency").click(function(){
      var c = confirm("Yakin akan mengubah data agency?")
      return c;
    })

    </script>