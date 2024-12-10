<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"><?= $judul; ?></h4>
        </div>
        <div class="card-body">
          <form action="/disposisi/update/<?= $tbdisposisi['id_disposisi']; ?>" method="post">
            <?= csrf_field(); ?>
            <div class="form-group">
              <label for="tgl_disposisi">Tanggal Disposisi</label>
              <input 
                type="text" 
                id="tgl_disposisi" 
                name="tgl_disposisi" 
                class="form-control <?= isset($errors['tgl_disposisi']) ? 'is-invalid' : ''; ?>" 
                value="<?= old('tgl_disposisi', $tbdisposisi['tgl_disposisi']); ?>">
              <?php if (isset($errors['tgl_disposisi'])): ?>
                <div class="invalid-feedback">
                  <?= $errors['tgl_disposisi']; ?>
                </div>
                <?php endif; ?>
            </div>
                <div class="form-group">
              <label for="instruksi">Instruksi</label>
              <input 
                type="text" 
                id="instruksi" 
                name="instruksi" 
                class="form-control <?= isset($errors['instruksi']) ? 'is-invalid' : ''; ?>" 
                value="<?= old('instruksi', $tbdisposisi['instruksi']); ?>">
              <?php if (isset($errors['instruksi'])): ?>
                <div class="invalid-feedback">
                  <?= $errors['instruksi']; ?>
                </div>
              <?php endif; ?>
            </div>
           
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="/disposisi" class="btn btn-secondary">Batal</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>
