<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="d-flex justify-content-between w-100">
            <h4 class="card-title"><?= $judul; ?></h4>
            <a href="#" class="btn btn-success" id="tambahBtn" data-toggle="modal" data-target="#addPengguna">Tambah</a>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="myTable" class="table">
              <thead class="text-primary">
                <th>No</th>
                <th>Nama Pengguna</th>
                <th>Kata Sandi</th>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>Peran</th>
                <th colspan="2">Aksi</th> <!-- New column for actions -->
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
                  <td>
                    <a href="" class="btn btn-warning btn-sm">Ubah</a>
                    <a href="<?= base_url('pengguna/delete/'.$value['id_pengguna']); ?>" class="btn btn-danger btn-sm" 
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

<div class="modal fade" id="addPengguna" tabindex="-1" role="dialog" aria-labelledby="addPenggunaLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addPenggunaLabel">Tambah Pengguna Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="pengguna/create" method="POST">
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
              <option value="staf">User</option>
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
