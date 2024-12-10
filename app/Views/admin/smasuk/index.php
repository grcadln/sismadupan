<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="d-flex justify-content-between w-100">
            <h4 class="card-title"><?= $judul; ?></h4>
            <a href="#" class="btn btn-success" id="tambahBtn" data-toggle="modal" data-target="#addSmasuk">Tambah</a>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="myTable" class="table">
              <thead class="text-primary">
                <tr>
                  <th>No</th>
                  <th>No Surat</th>
                  <th>Tanggal Terima</th>
                  <th>Pengirim</th>
                  <th>Isi Surat</th>
                  <th>Jenis Surat</th>
                  <th colspan="3">Aksi</th> <!-- Tiga kolom untuk aksi -->
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; ?>
                <?php foreach ($tbsmasuk as $value): ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $value['no_surat']; ?></td>
                    <td><?= $value['tgl_terima']; ?></td>
                    <td><?= $value['pengirim']; ?></td>
                    <td><?= $value['isi_surat']; ?></td>
                    <td><?= $value['jenis_surat']; ?></td>
                    <td>
                      <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#updateSmasuk<?= $value['id_suratmasuk']; ?>">Ubah</a>
                      <a href="<?= base_url('smasuk/delete/' . $value['id_suratmasuk']); ?>" class="btn btn-danger btn-sm"
                        onclick="return confirm('Apakah Anda yakin ingin menghapus surat ini?');">Hapus</a>
                      <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#disposisiSmasuk<?= $value['id_suratmasuk']; ?>">Disposisi</a>

                    </td>
                    <!-- Tombol disposisi -->

                  </tr>

                  <!-- Modal Update -->
                  <div class="modal fade" id="updateSmasuk<?= $value['id_suratmasuk']; ?>" tabindex="-1" role="dialog" aria-labelledby="updateSmasukLabel<?= $value['id_suratmasuk']; ?>" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="updateSmasukLabel<?= $value['id_suratmasuk']; ?>">Update Surat Masuk</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="<?= base_url('smasuk/update/' . $value['id_suratmasuk']); ?>" method="POST">
                          <div class="modal-body">
                            <div class="form-group">
                              <label for="no_surat">No Surat</label>
                              <input type="text" class="form-control" id="no_surat" name="no_surat"
                                value="<?= old('no_surat', $value['no_surat']); ?>" required>
                            </div>
                            <div class="form-group">
                              <label for="tgl_terima">Tanggal Terima</label>
                              <input type="date" class="form-control" id="tgl_terima" name="tgl_terima"
                                value="<?= old('tgl_terima', $value['tgl_terima']); ?>" required>
                            </div>
                            <div class="form-group">
                              <label for="pengirim">Pengirim</label>
                              <input type="text" class="form-control" id="pengirim" name="pengirim"
                                value="<?= old('pengirim', $value['pengirim']); ?>" required>
                            </div>
                            <div class="form-group">
                              <label for="isi_surat">Isi Surat</label>
                              <textarea class="form-control" id="isi_surat" name="isi_surat" rows="3" required><?= old('isi_surat', $value['isi_surat']); ?></textarea>
                            </div>
                            <div class="form-group">
                              <label for="id_jenissurat">Jenis Surat</label>
                              <select class="form-control" id="id_jenissurat" name="id_jenissurat" required>
                                <option value="">Pilih</option>
                                <?php foreach ($tbjsurat as $jsurat): ?>
                                  <option value="<?= $jsurat['id_jenissurat']; ?>" <?= $jsurat['id_jenissurat'] == $value['id_jenissurat'] ? 'selected' : ''; ?>>
                                    <?= $jsurat['jenis_surat']; ?>
                                  </option>
                                <?php endforeach; ?>
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
                  <div class="modal fade" id="disposisiSmasuk<?= $value['id_suratmasuk']; ?>" tabindex="-1" role="dialog" aria-labelledby="disposisiSmasukLabel<?= $value['id_suratmasuk']; ?>" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="disposisiSmasukLabel<?= $value['id_suratmasuk']; ?>">Disposisi Surat Masuk</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="<?= base_url('disposisi/create'); ?>" method="POST">
                          <div class="modal-body">
                            <!-- Input Hidden untuk id_suratmasuk -->
                            <input type="hidden" name="id_suratmasuk" value="<?= $value['id_suratmasuk']; ?>">

                            <div class="form-group">
                              <label for="no_surat">No Surat</label>
                              <input type="text" class="form-control" id="no_surat" value="<?= $value['no_surat']; ?>" readonly>
                            </div>

                            <div class="form-group">
                              <label for="tgl_disposisi">Tanggal Disposisi</label>
                              <input type="date" class="form-control" id="tgl_disposisi" name="tgl_disposisi" required>
                            </div>

                            <div class="form-group">
                              <label for="instruksi">Isi Disposisi</label>
                              <textarea class="form-control" id="instruksi" name="instruksi" rows="3" required></textarea>
                            </div>

                            <div class="form-group">
                              <label for="id_departemen">Penerima Disposisi</label>
                              <select class="form-control" id="id_departemen" name="id_departemen" required>
                                <option value="">Pilih</option>
                                <?php foreach ($tbdepartemen as $pegawai_item): ?>
                                  <option value="<?= $pegawai_item['id_departemen']; ?>"><?= $pegawai_item['nama_departemen']; ?></option>
                                <?php endforeach; ?>
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
<div class="modal fade" id="addSmasuk" tabindex="-1" role="dialog" aria-labelledby="addSmasukLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addSmasukLabel">Tambah Surat Masuk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('smasuk/create'); ?>" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label for="no_surat">No Surat</label>
            <input type="text" class="form-control" id="no_surat" name="no_surat" required>
          </div>
          <div class="form-group">
            <label for="tgl_terima">Tanggal Terima</label>
            <input type="date" class="form-control" id="tgl_terima" name="tgl_terima" required>
          </div>
          <div class="form-group">
            <label for="pengirim">Pengirim</label>
            <input type="text" class="form-control" id="pengirim" name="pengirim" required>
          </div>
          <div class="form-group">
            <label for="isi_surat">Isi Surat</label>
            <textarea class="form-control" id="isi_surat" name="isi_surat" rows="3" required></textarea>
          </div>
          <div class="form-group">
            <label for="id_jenissurat">Jenis Surat</label>
            <select class="form-control" id="id_jenissurat" name="id_jenissurat" required>
              <option value="">Pilih</option>
              <?php foreach ($tbjsurat as $jsurat): ?>
                <option value="<?= $jsurat['id_jenissurat']; ?>"><?= $jsurat['jenis_surat']; ?></option>
              <?php endforeach; ?>
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
<!-- Modal Disposisi -->

<script>
  // JavaScript untuk mengubah tombol Disposisi menjadi Selesai
  function changeButtonText(id_suratmasuk) {
    var disposisiBtn = document.getElementById('disposisiBtn' + id_suratmasuk);
    disposisiBtn.textContent = 'Selesai'; // Ganti teks tombol menjadi "Selesai"
    disposisiBtn.classList.remove('btn-info');
    disposisiBtn.classList.add('btn-success'); // Ganti warna tombol menjadi hijau
  }
</script>
<?= $this->endSection(); ?>