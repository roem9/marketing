<div class="modal fade" id="modalMarketing" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
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
                                <a href="#" class='nav-link' id="btn-form-1" data-id=""><i class="fas fa-user"></i></a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class='nav-link' id="btn-form-2" data-id=""><i class="fas fa-dollar-sign"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body fo-14">
                        <input type="hidden" name="kd_marketing" id="kd_marketing">
                        <div class="form-detail" id="form-1">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <input type="text" name="status" id="status" class="form-control form-control-sm" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nama_marketing">Nama Marketing</label>
                                <input class='form-control form-control-sm' type="text" name="nama_marketing" id="nama_marketing" autocomplete="off" autocorrect="off" autocapitalize="off" readonly required>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" class="form-control form-control-sm" rows="3" readonly></textarea>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class='form-control form-control-sm' type="text" name="email" id="email" autocomplete="off" autocorrect="off" autocapitalize="off" readonly>
                            </div>
                            <div class="form-group">
                                <label for="no_wa">No. WA</label>
                                <input class='form-control form-control-sm' type="text" name="no_wa" id="no_wa" autocomplete="off" autocorrect="off" autocapitalize="off" readonly>
                            </div>
                            <div class="form-group">
                                <label for="no_hp">No. HP</label>
                                <input class='form-control form-control-sm' type="text" name="no_hp" id="no_hp" autocomplete="off" autocorrect="off" autocapitalize="off" readonly>
                            </div>
                            <div class="form-group">
                                <label for="tgl_masuk">Tgl Masuk</label>
                                <input class='form-control form-control-sm' type="date" name="tgl_masuk" id="tgl_masuk" readonly>
                            </div>
                        </div>
                        <div class="form-detail" id="form-2">
                            <div class="form-group">
                                <label for="nama_bank">Nama Bank</label>
                                <input class='form-control form-control-sm' type="text" name="nama_bank" id="nama_bank" autocomplete="off" autocorrect="off" autocapitalize="off" readonly>
                            </div>
                            <div class="form-group">
                                <label for="cabang_bank">Cabang Bank</label>
                                <input class='form-control form-control-sm' type="text" name="cabang_bank" id="cabang_bank" autocomplete="off" autocorrect="off" autocapitalize="off" readonly>
                            </div>
                            <div class="form-group">
                                <label for="no_rek">Nomor Rekening</label>
                                <input class='form-control form-control-sm' type="text" name="no_rek" id="no_rek" autocomplete="off" autocorrect="off" autocapitalize="off" readonly>
                            </div>
                            <div class="form-group">
                                <label for="an_rek">Atas Nama Rekening</label>
                                <input class='form-control form-control-sm' type="text" name="an_rek" id="an_rek" autocomplete="off" autocorrect="off" autocapitalize="off" readonly>
                            </div>
                            <div class="form-group">
                                <label for="npwp">No. NPWP</label>
                                <input class='form-control form-control-sm' type="text" name="npwp" id="npwp" autocomplete="off" autocorrect="off" autocapitalize="off" readonly>
                            </div>
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