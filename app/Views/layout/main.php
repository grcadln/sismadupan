<!--
=========================================================
* Paper Dashboard 2 - v2.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/paper-dashboard-2
* Copyright 2020 Creative Tim (https://www.creative-tim.com)

Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->

 <?= $this->include('layout/header'); ?>     
 <?= $this->include('layout/sidebar'); ?>     
<div class="main-panel">
      <!-- Navbar -->
 <?= $this->include('layout/navbar'); ?>     
      <!-- End Navbar -->
<?= $this->renderSection('content'); ?>
<?= $this->include('layout/footer'); ?>    