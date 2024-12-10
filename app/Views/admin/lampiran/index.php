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
              <thead class=" text-primary">
                <th>No</th>
                <th>Nama File</th>
                <th>Lokasi File</th>
                <th colspan="2">Aksi</th>
              </thead>
              <tbody>
              <tbody>
                <?php $no = 1; ?>
                <?php foreach ($tblampiran as $key => $value): ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $value['nama_file']; ?></td>
                  <td><?= $value['lokasi_file']; ?></td>
                  <td>
                    <a href="" class="btn btn-warning btn-sm">Ubah</a>
                    <a href="<?= base_url('lampiran/delete/'.$value['id_lampiran']); ?>" class="btn btn-danger btn-sm" 
                       onclick="return confirm('Are you sure you want to delete this user?');">Hapus</a>
                  </td>
                </tr>
              </tbody>
              <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<div class="modal fade" id="addJsurat" tabindex="-1" role="dialog" aria-labelledby="addJsuratLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addJsuratLabel">Tambah Pengguna Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="slampiran/create" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label for="nama_file">Nama File</label>
            <input type="text" class="form-control" id="nama_file" name="nama_file" required>
          </div>
          <div class="form-group">
            <label for="lokasi_file">Lokasi File</label>
            <input type="password" class="form-control" id="lokasi_file" name="lokasi_file" required>
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