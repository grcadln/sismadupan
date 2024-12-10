<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="d-flex justify-content-between w-100">
            <h4 class="card-title"><?= $judul; ?></h4>
            <a href="#" class="btn btn-success" id="tambahBtn" data-toggle="modal" data-target="#addSkeluar">Tambah</a>
          </div>

        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="myTable" class="table">
              <thead class=" text-primary">
                <th>No</th>
                <th>No Surat</th>
                <th>Tanggal Keluar</th>
                <th>Penerima</th>
                <th>Perihal</th>
                <th>Isi Surat</th>
                <th colspan="2">Aksi</th>
              </thead>
              <tbody>
                <?php $no = 1; ?>
                <?php foreach ($tbskeluar as $key => $value): ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $value['no_surat']; ?></td>
                    <td><?= $value['tgl_keluar']; ?></td>
                    <td><?= $value['penerima']; ?></td>
                    <td><?= $value['perihal']; ?></td>
                    <td><?= $value['isi_surat']; ?></td>
                    <td>
                      <a href="" class="btn btn-warning btn-sm">Ubah</a>
                      <a href="<?= base_url('skeluar/delete/' . $value['id_suratkeluar']); ?>" class="btn btn-danger btn-sm"
                        onclick="return confirm('Are you sure you want to delete this user?');">Hapus</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<div class="modal fade" id="addSkeluar" tabindex="-1" role="dialog" aria-labelledby="addSkeluarLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addSkeluarLabel">Tambah Pengguna Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="skeluar/create" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label for="no_surat">No Surat</label>
            <input type="text" class="form-control" id="no_surat" name="no_surat" required>
          </div>
          <div class="form-group">
            <label for="tgl_keluar">Tanggal Keluar</label>
            <input type="password" class="form-control" id="tgl_keluar" name="tgl_keluar" required>
          </div>
          <div class="form-group">
            <label for="penerima">Penerima</label>
            <input type="text" class="form-control" id="penerima" name="penerima" required>
          </div>
          <div class="form-group">
            <label for="perihal">Perihal</label>
            <input type="perihal" class="form-control" id="perihal" name="perihal" required>
          </div>
          <div class="form-group">
            <label for="Isi Surat">Isi Surat</label>
            <input type="Isi Surat" class="form-control" id="Isi Surat" name="Isi Surat" required>
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