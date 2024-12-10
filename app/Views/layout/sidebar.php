<div class="sidebar-wrapper">
<ul class="nav">
  <!-- Dashboard -->
  <li class="<?= (uri_string() == 'dashboard') ? 'active' : ''; ?>">
    <a href="<?= base_url('/') ?>">
      <i class="nc-icon nc-bank"></i>
      <p>Dashboard</p>
    </a>
  </li>
  
  <!-- Pengguna -->
  <li class="<?= (uri_string() == 'pengguna') ? 'active' : ''; ?>">
    <a href="<?= base_url('pengguna') ?>">
      <i class="nc-icon nc-single-02"></i>
      <p>Pengguna</p>
    </a>
  </li>
  
  <!-- Departemen -->
  <li class="<?= (uri_string() == 'departemen') ? 'active' : ''; ?>">
    <a href="<?= base_url('departemen') ?>">
      <i class="nc-icon nc-globe"></i> <!-- Ikon untuk Departemen -->
      <p>Departemen</p>
    </a>
  </li>
  
  <!-- Jenis Surat -->
  <li class="<?= (uri_string() == 'jsurat') ? 'active' : ''; ?>">
    <a href="<?= base_url('jsurat') ?>">
      <i class="nc-icon nc-paper"></i>
      <p>Jenis Surat</p>
    </a>
  </li>
  
  <!-- Surat Masuk -->
  <li class="<?= (uri_string() == 'smasuk') ? 'active' : ''; ?>">
    <a href="<?= base_url('smasuk') ?>">
      <i class="nc-icon nc-email-85"></i>
      <p>Surat Masuk</p>
    </a>
  </li>
  
  <!-- Disposisi -->
  <li class="<?= (uri_string() == 'disposisi') ? 'active' : ''; ?>">
    <a href="<?= base_url('disposisi') ?>">
      <i class="nc-icon nc-tap-01"></i>
      <p>Disposisi</p>
    </a>
  </li>
  
  <!-- Surat Keluar -->
  <li class="<?= (uri_string() == 'skeluar') ? 'active' : ''; ?>">
    <a href="<?= base_url('skeluar') ?>">
      <i class="nc-icon nc-send"></i>
      <p>Surat Keluar</p>
    </a>
  </li>
  
  <!-- Lampiran -->
  <li class="<?= (uri_string() == 'lampiran') ? 'active' : ''; ?>">
    <a href="<?= base_url('lampiran') ?>">
      <i class="nc-icon nc-single-copy-04"></i> <!-- Ikon untuk Lampiran -->
      <p>Lampiran</p>
    </a>
  </li>
</ul>


      </div>
    </div>