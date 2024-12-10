<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="d-flex justify-content-between w-100">
            <h4 class="card-title"><?= $judul; ?></h4>
            <a href="#" class="btn btn-success" id="tambahBtn" data-toggle="modal" data-target="#addJsurat">Tambah</a>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="myTable" class="table">
              <thead class="text-primary">
                <tr>
                  <th>No</th>
                  <th>Jenis Surat</th>
                  <th colspan="2">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; ?>
                <?php foreach ($tbjenissurat as $value): ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $value['jenis_surat']; ?></td>
                    <td>
                      <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#updateJsurat<?= $value['id_jenissurat']; ?>">Ubah</a>
                      <a href="<?= base_url('jsurat/delete/'.$value['id_jenissurat']); ?>" class="btn btn-danger btn-sm" 
                         onclick="return confirm('Apakah Anda yakin ingin menghapus jenis surat ini?');">Hapus</a>
                    </td>
                  </tr>
                  
                  <!-- Modal Update -->
                  <div class="modal fade" id="updateJsurat<?= $value['id_jenissurat']; ?>" tabindex="-1" role="dialog" aria-labelledby="updateJsuratLabel<?= $value['id_jenissurat']; ?>" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="updateJsuratLabel<?= $value['id_jenissurat']; ?>">Update Jenis Surat</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="<?= base_url('jsurat/update/'.$value['id_jenissurat']); ?>" method="POST">
                          <div class="modal-body">
                            <div class="form-group">
                              <label for="jenis_surat">Jenis Surat</label>
                              <input type="text" class="form-control" id="jenis_surat" name="jenis_surat" 
                                     value="<?= old('jenis_surat', $value['jenis_surat']); ?>" required>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>  

<!-- Modal Tambah -->
<div class="modal fade" id="addJsurat" tabindex="-1" role="dialog" aria-labelledby="addJsuratLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addJsuratLabel">Tambah Jenis Surat Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('jsurat/create'); ?>" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label for="jenis_surat">Jenis Surat</label>
            <input type="text" class="form-control" id="jenis_surat" name="jenis_surat" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>
