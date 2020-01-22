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
            <div class="col-6">
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
              <?php if( $this->session->flashdata('konfirm') ) : ?>
                  <div class="row">
                      <div class="col-12">
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                              <?= $this->session->flashdata('konfirm');?>
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
              <form action="<?= base_url()?>agency/konfirm" method="POST" enctype="multipart/form-data" id="formInputMarketing">
                <div class="table-responsive">
                  <table id="dataTable" class="table table-sm fo-14">
                    <thead>
                        <th></th>
                        <th>Nama Agency</th>
                        <th>Nama Pemilik</th>
                        <th>Email</th>
                        <th>No. Handphone</th>
                        <!-- <th>Detail</th> -->
                    </thead>
                    <tbody>
                      <?php 
                          $no = 0;
                          foreach ($agency as $agency) :?>
                              <tr>
                                <td><input type="checkbox" name="id_agency[]" id="id_agency[]" value="<?=$agency['id_agency']?>"></td>
                                <td><?= $agency['nama_agency']?></td>
                                <td><?=$agency['nama_pemilik']?></td>
                                <td><?=$agency['email']?></td>
                                <td><?=$agency['no_wa']?></td>
                                <!-- <td><center><a href="#" class="badge badge-warning modalAgency" data-toggle="modal" data-target="#exampleModalScrollable" data-id="<?= $agency['id_agency']?>">detail</a></center></td> -->
                              </tr>
                      <?php endforeach;?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <td colspan=5>
                          <input type="checkbox" name="checkAll" id="checkAll"> <label for="checkAll">Pilih Semua</label>
                        </td>
                      </tr>
                      <tr>
                        <td colspan=5>
                          <div class="d-flex justify-content-start mt-2">
                            <input class="btn btn-sm btn-danger mr-3" type="submit" value="Hapus (0)" name="hapus" id="hapus">
                            <input class="btn btn-sm btn-primary" type="submit" value="Konfirmasi (0)" name="konfirm" id="konfirm">
                          </div>
                        </td>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </form>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

    <script>
      // $("#statusAgency").hide();
      $("#status option[value='aktif']").remove();
      $("#status option[value='nonaktif']").remove();

      $("#sidebarAgency").addClass("active");

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
              console.log(data)
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
      })

      $("#checkAll").click(function(){
        var cek = $('[name="id_agency[]"]:checked').length;

        $("input[type=checkbox]").prop('checked', $(this).prop('checked'));

      });

      $("input[type=checkbox]").click(function() {
        var cek = $('[name="id_agency[]"]:checked').length;

        if (!$(this).prop("checked")) {
            $("#checkAll").prop("checked", false);
        }

        $("#konfirm").val("Konfirmasi (" + cek + ")");
        $("#hapus").val("Hapus (" + cek + ")");
      });

      $("#hapus").click(function(){
        var cek = $('[name="id_agency[]"]:checked').length;

        if(cek == 0){  
        Swal.fire({
                icon: 'error',
                text: 'Harap memilih data terlebih dahulu'
            })
            return false;
        } else {
            var c = confirm('Yakin akan menghapus agency?');
            return c;
        }
      })

      $("#konfirm").click(function(){
        var cek = $('[name="id_agency[]"]:checked').length;

        if(cek == 0){  
          Swal.fire({
                icon: 'error',
                text: 'Harap memilih data terlebih dahulu'
            })
            return false;
        } else {
            var c = confirm('Yakin akan mengkonfirmasi agency?');
            return c;
        }
      })

    </script>