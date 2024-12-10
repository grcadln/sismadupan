<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="d-flex justify-content-between w-100">
            <h4 class="card-title"><?= $judul; ?></h4>
            <a href="#" class="btn btn-success" id="tambahBtn" data-toggle="modal" data-target="#addUserModal">Tambah</a>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="myTable" class="table">
              <thead class=" text-primary">
                <th>No</th>
                <th>Nama Pengguna</th>
                <th>Kata Sandi</th>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>Peran</th>
              </thead>
              <tbody>
                <?php $no = 1; ?>
                <?php foreach ($tbpengguna as $key => $value): ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $value['nama_pengguna']; ?></td>
                  <td><?= $value['kata_sandi']; ?></td>
                  <td><?= $value['nama_lengkap']; ?></td>
                  <td><?= $value['email']; ?></td>
                  <td><?= $value['peran']; ?></td>
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

<!-- Modal for Add User -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addUserModalLabel">Tambah Pengguna Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="pengguna/store" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label for="nama_pengguna">Nama Pengguna</label>
            <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" required>
          </div>
          <div class="form-group">
            <label for="kata_sandi">Kata Sandi</label>
            <input type="password" class="form-control" id="kata_sandi" name="kata_sandi" required>
          </div>
          <div class="form-group">
            <label for="nama_lengkap">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="form-group">
            <label for="peran">Peran</label>
            <select class="form-control" id="peran" name="peran" required>
              <option value="admin">Admin</option>
              <option value="user">User</option>
            </select>
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
