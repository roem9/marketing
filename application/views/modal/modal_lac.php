<div class="modal fade" id="modalLac" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white" id="exampleModalScrollableTitle">Detail LAC <span id="namaAgency"></span></h5>
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
          <div class="card-body fo-13">
              <input type="hidden" name="id_peserta" id="id_peserta">
              <div class="form-detail" id="form-1">
                <div class="form-group">
                    <label for="link_input">Link Input Marketing</label>
                    <input class='form-control form-control-sm' type="text" name="link_input" id="link_input" autocomplete="off" autocorrect="off" autocapitalize="off" readonly>
                </div>
              </div>
              <div class="form-detail" id="form-2">
                <form action="<?= base_url()?>lac/edit" method="post">
                  <input type="hidden" name="id_lac" id="id_lac">
                  <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control form-control-sm" required>
                      <option value="">Pilih Status</option>
                      <option value="aktif">Aktif</option>
                      <option value="nonaktif">Nonaktif</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="nama_lac">Nama LAC</label>
                    <input type="text" name="nama_lac" id="nama_lac" class="form-control form-control-sm" autocomplete="off" autocorrect="off" required>
                  </div>
                  <div class="row">
                    <input type="submit" value="Update" class="btn btn-sm btn-primary btn-block" id="updateModal">
                  </div>
                </form>
              </div>
              <div class="form-detail" id="form-3">
                <ul class="list-group">
                  <li class="list-group-item list-group-item-primary">Marketing Aktif <span class="badge badge-warning" id="jumlah-marketing-aktif"></span></li>
                  <li class="list-group-item" id="pesan-aktif"><i class="fa fa-exclamation-circle text-warning"></i> Tidak ada marketing</li>
                  <li class="list-group-item" id="form-aktif">
                    <form action="<?= base_url()?>lac/pindahlac" method="post">
                      <div id="list-marketing-aktif"></div>
                      <div class="form-group">
                        <label for="id_lac">Pindah LAC <span class="text-danger">*</span></label>
                        <select name="id_lac" id="id_lac" class="form-control form-control-sm" required>
                          <option value="">Pilih LAC</option>
                          <?php foreach ($lac as $lac) :?>
                            <option value="<?= $lac['id_lac']?>"><?= $lac['nama_lac']?></option>
                          <?php endforeach;?>
                        </select>
                      </div>
                      <input type="submit" value="Pindahkan" id="pindahLac" class="btn btn-primary btn-block">
                    </form>
                  </li>
                </ul>
              </div>
              <div class="form-detail" id="form-4">
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