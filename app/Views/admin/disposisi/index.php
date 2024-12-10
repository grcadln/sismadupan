<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="d-flex justify-content-between w-100">
            <h4 class="card-title"><?= $judul; ?></h4>
            <a href="#" class="btn btn-success" id="tambahBtn" data-toggle="modal" data-target="#addDisposisi">Tambah</a>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="myTable" class="table">
              <thead class="text-primary">
                <th>No</th>
                <th>Tanggal Disposisi</th>
                <th>Nama Penerima</th>
                <th>Jenis Surat</th>
                <th>Pengirim</th>
                <th>Nama Departemen</th>
                <th>Instruksi</th>
              </thead>
              <tbody>
              <tbody>
                <?php $no = 1; ?>
                <?php foreach ($tbdisposisi as $key => $value): ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $value['tgl_disposisi']; ?></td>
                    <td><?= $value['nama_lengkap']; ?></td>
                    <td><?= $value['jenis_surat']; ?></td>
                    <td><?= $value['pengirim']; ?></td>
                    <td><?= $value['nama_departemen']; ?></td>
                    <td><?= $value['instruksi']; ?></td>

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



<?= $this->endSection(); ?>