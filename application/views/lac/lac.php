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

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a href="lac.php" class="nav-link active">LAC</a>
                </li>
                <a href="modal/tambahlac.php" rel="modal:open" class="nav-link btn btn-success btn-sm">Tambah LAC</a>
                </ul>
            </div>
            <div class="card-body">
                <div class="table-responsive" style="max-width: 600px">
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
</script>

