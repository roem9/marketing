<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="nama-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a href="#" class='nav-link' id="btn-form-1" data-id=""><i class="fas fa-link"></i></a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class='nav-link' id="btn-form-2" data-id=""><i class="fas fa-user"></i></a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class='nav-link' id="btn-form-3" data-id=""><i class="fas fa-user-check"></i></a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class='nav-link' id="btn-form-4" data-id=""><i class="fas fa-user-slash"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body fo-14">
                        <div class="form-detail" id="form-1">
                            <div class="form-group">
                                <label for="link_akad">Link Akad</label>
                                <input class='form-control form-control-sm' type="text" name="link_akad" id="link_akad" autocomplete="off" autocorrect="off" autocapitalize="off" readonly>
                            </div>
                            <div class="form-group">
                                <label for="link_marketing">Link Marketing</label>
                                <input class='form-control form-control-sm' type="text" name="link_marketing" id="link_marketing" autocomplete="off" autocorrect="off" autocapitalize="off" readonly>
                            </div>
                        </div>
                        <div class="form-detail" id="form-2">
                            <form action="<?= base_url()?>agency/editagency" method="post">
                                <div class="form-group" id="statusAgency">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control form-control-sm" required>
                                        <option value="">Pilih Status</option>
                                        <option value="aktif">Aktif</option>
                                        <option value="nonaktif">Nonaktif</option>
                                        <option value="konfirm">Konfirmasi</option>
                                    </select>
                                </div>
                                <input type="hidden" name="id_agency" id="id_agency">
                                <div class="form-group">
                                    <label for="nama_agency">Nama Agency</label>
                                    <input class='form-control form-control-sm' type="text" name="nama_agency" id="nama_agency" autocomplete="off" autocorrect="off" autocapitalize="off" required>
                                </div>
                                <div class="form-group">
                                    <label for="nama_pemilik">Nama Pemilik</label>
                                    <input class='form-control form-control-sm' type="text" name="nama_pemilik" id="nama_pemilik" autocomplete="off" autocorrect="off" autocapitalize="off">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input class='form-control form-control-sm' type="email" name="email" id="email" autocomplete="off" autocorrect="off" autocapitalize="off">
                                </div>
                                <div class="form-group">
                                    <label for="no_wa">No. WA</label>
                                    <input class='form-control form-control-sm' type="text" name="no_wa" id="no_wa" autocomplete="off" autocorrect="off" autocapitalize="off">
                                </div>
                                <div class="form-group">
                                    <label for="no_hp">No. HP</label>
                                    <input class='form-control form-control-sm' type="text" name="no_hp" id="no_hp" autocomplete="off" autocorrect="off" autocapitalize="off">
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea name="alamat" id="alamat" class="form-control form-control-sm" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="tgl_masuk">Tgl Akad</label>
                                    <input class='form-control form-control-sm' type="date" name="tgl_masuk" id="tgl_masuk" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="no_rek">No. Rekening</label>
                                    <input class='form-control form-control-sm' type="text" name="no_rek" id="no_rek" autocomplete="off" autocorrect="off" autocapitalize="off">
                                </div>
                                <div class="form-group">
                                    <label for="nama_bank">Nama Bank</label>
                                    <input class='form-control form-control-sm' type="text" name="nama_bank" id="nama_bank" autocomplete="off" autocorrect="off" autocapitalize="off">
                                </div>
                                <div class="form-group">
                                    <label for="an_rek">A.N Rekening</label>
                                    <input class='form-control form-control-sm' type="text" name="an_rek" id="an_rek" autocomplete="off" autocorrect="off" autocapitalize="off">
                                </div>
                                <div class="form-group">
                                    <label for="npwp">No. NPWP</label>
                                    <input class='form-control form-control-sm' type="text" name="npwp" id="npwp" autocomplete="off" autocorrect="off" autocapitalize="off">
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm btn-block" id="simpanAgency">Update</button>
                            </form>
                        </div>
                        <div class="form-detail fo-14" id="form-3">
                            <ul class="list-group">
                                <li class="list-group-item list-group-item-primary">Marketing Aktif <span class="badge badge-warning" id="jumlah-marketing-aktif"></span></li>
                                <li class="list-group-item" id="pesan-aktif"><i class="fa fa-exclamation-circle text-warning"></i> Tidak ada marketing</li>
                                <div id="list-marketing-aktif"></div>
                            </ul>
                        </div>
                        <div class="form-detail fo-14" id="form-4">
                            <ul class="list-group">
                                <li class="list-group-item list-group-item-danger">Marketing Nonaktif <span class="badge badge-warning" id="jumlah-marketing-nonaktif"></span></li>
                                <li class="list-group-item" id="pesan-nonaktif"><i class="fa fa-exclamation-circle text-warning"></i> Tidak ada marketing</li>
                                <div id="list-marketing-nonaktif"></div>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>  
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>