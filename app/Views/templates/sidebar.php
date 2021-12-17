<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #0B6623 !important;">

<!-- Sidebar - Brand -->
<a class="mt-4 sidebar-brand d-flex align-items-center justify-content-center" href="/">
  <img src="<?= base_url('image/logo_tniad.png') ?>"  class="img-fluid" alt="Logo" width="75px" height="75px">
  <div class="mt-4 sidebar-brand-text mx-auto">Aplikasi Koramil 0827/18 Kangean</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0 mt-4">


<?php if(in_groups('member')) : ?>
<li class="nav-item">
  <a class="nav-link" href="<?= base_url('member') ?>">
    <i class="fas fa-user"></i>
    <span class="color-white">Profil</span>
  </a>
</li>
<?php endif ?>

<div class="sidebar-heading color-white">
   Manajemen
</div>

<?php if(in_groups('admin') || in_groups('leader')) : ?>
<li class="nav-item">
  <a class="nav-link" href="<?= base_url('babinsa') ?>">
    <i class="fas fa-server"></i>
    <span class="color-white">Babinsa</span>
  </a>
</li>
<?php endif ?>

<li class="nav-item">
  <a class="nav-link" href="<?= base_url('piket') ?>">
    <i class="fas fa-clock"></i>
    <span class="color-white">Jadwal Piket</span>
  </a>
</li>

<?php if(in_groups('admin')) : ?>
<li class="nav-item">
  <a class="nav-link" href="<?= base_url('user') ?>">
    <i class="fas fa-users"></i>
    <span class="color-white">Pengguna</span>
  </a>
</li>
<?php endif ?>


<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<li class="nav-item">
  <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
    <i class="fas fa-sign-out-alt"></i>
    <span class="color-white">Keluar</span>
  </a>
</li>

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->


<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->