<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="d-flex justify-content-between w-100">
            <h4 class="card-title"><?= $judul; ?></h4>
            <a href="#" class="btn btn-success" id="tambahBtn" data-toggle="modal" data-target="#addDepartemen">Tambah</a>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="myTable" class="table">
              <thead class="text-primary">
                <tr>
                  <th>No</th>
                  <th>Nama Departemen</th>
                  <th>Nama Lengkap</th>
                  <th colspan="2">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; ?>
                <?php foreach ($tbdepartemen as $value): ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $value['nama_departemen']; ?></td>
                    <td><?= $value['nama_lengkap']; ?></td>
                    <td>
                      <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#updateDepartemen<?= $value['id_departemen']; ?>">Ubah</a>
                      <a href="<?= base_url('departemen/delete/' . $value['id_departemen']); ?>" class="btn btn-danger btn-sm"
                        onclick="return confirm('Apakah Anda yakin ingin menghapus departemen ini?');">Hapus</a>
                    </td>
                  </tr>

                  <!-- Modal Update -->
                  <div class="modal fade" id="updateDepartemen<?= $value['id_departemen']; ?>" tabindex="-1" role="dialog" aria-labelledby="updateDepartemenLabel<?= $value['id_departemen']; ?>" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="updateDepartemenLabel<?= $value['id_departemen']; ?>">Update Departemen</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="<?= base_url('departemen/update/' . $value['id_departemen']); ?>" method="POST">
                          <div class="modal-body">
                            <!-- Nama Departemen -->
                            <div class="form-group">
                              <label for="nama_departemen">Nama Departemen</label>
                              <input type="text" class="form-control <?= isset($errors['nama_departemen']) ? 'is-invalid' : ''; ?>"
                                id="nama_departemen" name="nama_departemen"
                                value="<?= old('nama_departemen', $value['nama_departemen']); ?>" required>
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
<div class="modal fade" id="addDepartemen" tabindex="-1" role="dialog" aria-labelledby="addDepartemenLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addDepartemenLabel">Tambah Departemen Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('departemen/create'); ?>" method="POST">
        <div class="modal-body">

         
          <div class="form-group">
            <label for="nama_departemen">Nama Departemen</label>
            <input type="text" class="form-control" id="nama_departemen" name="nama_departemen" required>
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