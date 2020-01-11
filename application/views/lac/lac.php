<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800 mt-3"><?= $header?></h1>
            </div>
          <div class="row">
            <div class="col-7">
              <?php if( $this->session->flashdata('lac') ) : ?>
                  <div class="row">
                      <div class="col-12">
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                              Data LAC <strong>berhasil</strong> <?= $this->session->flashdata('lac');?>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                      </div>
                  </div>
              <?php endif; ?>
              <?php if( $this->session->flashdata('marketing') ) : ?>
                  <div class="row">
                      <div class="col-12">
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                              <?= $this->session->flashdata('marketing');?>
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
            <div class="card shadow mb-4" style="max-width: 700px">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a href="lac.php" class="nav-link active">LAC</a>
                    </li>
                        <a href="modal/tambahlac.php" rel="modal:open" class="nav-link btn btn-success btn-sm">Tambah LAC</a>
                    </ul>
                </div>
                <div class="card-body">
                    <table id="dataTable" class="table table-sm fo-13">
                        <thead>
                            <tr>
                                <th rowspan=2>No</th>
                                <th rowspan=2>Status</th>
                                <th rowspan=2>Nama LAC</th>
                                <th colspan=3><center>Marketing</center></th>
                                <th rowspan=2><center>Detail</center></th>
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
                                foreach ($lac as $lac) :?>
                                <tr>
                                    <td><center><?=++$no?></center></td>
                                    <td><?= $lac['status']?></td>
                                    <td><?= $lac['nama_lac']?></td>
                                    <td><center><?= $lac['aktif']?>
                                    <td><center><?= $lac['nonaktif']?></center></td>
                                    <td><center><span class="badge badge-info"><?= $lac['marketing']?></span></center></center></td>
                                    <td><center><a href="#" class="badge badge-warning modalLac" data-toggle="modal" data-target="#modalLac" data-id="<?= $lac['id_lac']?>">detail</a></center></td>
                                </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
</div>
<!-- End of Content Wrapper -->

<script>
    $("#sidebarLac").addClass("active");
    
    $("#btn-form-1").addClass("active")
    $("#form-2").hide();
    $("#form-3").hide();
    $("#form-4").hide();

    $(".modalLac").click(function(){
        const id = $(this).data('id');
        // console.log(id)
        $.ajax({
            url : "<?=base_url()?>lac/getlacbyid",
            method : "POST",
            data : {id_lac : id},
            async : true,
            dataType : 'json',
            success : function(data){
                $("#link_input").val("<?=base_url()?>marketing/input/" + data.id_lac + "/" + encodeURIComponent(data.nama_lac));
                $("#status").val(data.status);
                $("#nama_lac").val(data.nama_lac)
                $("#id_lac").val(data.id_lac)
            }
        })

        $.ajax({
            url : "<?=base_url()?>lac/getmarketingaktifsi",
            method : "POST",
            data : {id_lac : id},
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
                    html += '<li class="list-group-item"><input type="checkbox" name="id_marketing[]" class="mr-1" value="' + data[i].kd_marketing + '" id="' + i + '"><label for="' + i + '">' + data[i].nama_marketing + '</label></li>';
                }
                $('#list-marketing-aktif').html(html);
            }
        })

        $.ajax({
            url : "<?=base_url()?>lac/getmarketingnonaktifsi",
            method : "POST",
            data : {id_lac : id},
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

    $("#updateModal").click(function(){
        var c = confirm("Apakah Anda yakin akan mengupdate data LAC?");
        return c;
    })

    $("#pindahLac").click(function(){
        
        var check =  $('input[name="id_marketing[]"]:checked').length;

        if(check > 0){
            var c = confirm("Apakah Anda yakin akan memindahkan marketing?")
            return c;
        } else {
            Swal.fire({
                icon: 'error',
                text: 'Harap memilih data terlebih dahulu'
            })
            return false;
        }
    })
</script>

