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
          <form action="/departemen/update/<?= $tbjsurat['id_departemen']; ?>" method="post">
            <?= csrf_field(); ?>
            <div class="form-group">
              <label for="nama_departemen">Nama Departemen</label>
              <input 
                type="text" 
                id="nama_departemen" 
                name="nama_departemen" 
                class="form-control <?= isset($errors['nama_departemen']) ? 'is-invalid' : ''; ?>" 
                value="<?= old('nama_departemen', $tbjsurat['nama_departemen']); ?>">
              <?php if (isset($errors['nama_departemen'])): ?>
                <div class="invalid-feedback">
                  <?= $errors['nama_departemen']; ?>
                </div>
              <?php endif; ?>
            </div>
            <!-- <div class="form-group">
              <label for="id_departemen">id Departemen</label>
              <input 
                type="text" 
                id="id_departemen" 
                name="id_departemen" 
                class="form-control <?= isset($errors['id_departemen']) ? 'is-invalid' : ''; ?>" 
                value="<?= old('id_departemen', $tbjsurat['id_departemen']); ?>">
              <?php if (isset($errors['id_departemen'])): ?>
                <div class="invalid-feedback">
                  <?= $errors['id_departemen']; ?>
                </div>
              <?php endif; ?>
            </div> -->
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="/departemen" class="btn btn-secondary">Batal</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>
