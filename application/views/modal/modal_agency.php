<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white" id="exampleModalScrollableTitle">Detail Agency</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
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
                    <label for="tgl_masuk">Tgl Masuk</label>
                    <input class='form-control form-control-sm' type="date" name="tgl_masuk" id="tgl_masuk">
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
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                </div>
            </form>
    </div>
  </div>
</div>