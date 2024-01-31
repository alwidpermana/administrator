<div id="nav" class="nav-container d-flex">
  <div class="nav-content d-flex">
    <!-- Logo Start -->
    <div class="logo position-relative">
      <a href="<?=base_url()?>dashboard">
        <!-- Logo can be added directly -->
        <img src="<?=base_url()?>assets/img/logo/logo-KPS.png" alt="logo" style="width: 30px;" />

        <!-- Or added via css to provide different ones for different color themes -->
        <!-- <div class="img"></div> -->
      </a>
    </div>
    <!-- Logo End -->

    <!-- User Menu Start -->
    <div class="user-container d-flex">
      <a href="#" class="d-flex user position-relative" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img class="profile" alt="profile" src="<?=base_url()?>assets/img/profile/profile-11.webp" />
        <div class="name"><?=$this->session->userdata("nama")?></div>
      </a>
      <div class="dropdown-menu dropdown-menu-end user-menu wide">
        <div class="row mb-1 ms-0 me-0">
          <div class="col-6 ps-1 pe-1">
            <ul class="list-unstyled">
              <li>
                <a href="javascript:;" class="btnSetting">
                  <i data-acorn-icon="gear" class="me-2" data-acorn-size="17"></i>
                  <span class="align-middle">Settings</span>
                </a>
              </li>
              
            </ul>
          </div>
          <div class="col-6 pe-1 ps-1">
            <ul class="list-unstyled">
              <li>
                <a href="<?=base_url()?>auth/logout">
                  <i data-acorn-icon="logout" class="me-2" data-acorn-size="17"></i>
                  <span class="align-middle">Logout</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- User Menu End -->

    <!-- Icons Menu Start -->
    <ul class="list-unstyled list-inline text-center menu-icons">
      <li class="list-inline-item">
        <a href="#" id="pinButton" class="pin-button">
          <i data-acorn-icon="lock-on" class="unpin" data-acorn-size="18"></i>
          <i data-acorn-icon="lock-off" class="pin" data-acorn-size="18"></i>
        </a>
      </li>
      <li class="list-inline-item">
        <a href="#" id="colorButton">
          <i data-acorn-icon="light-on" class="light" data-acorn-size="18"></i>
          <i data-acorn-icon="light-off" class="dark" data-acorn-size="18"></i>
        </a>
      </li>
    </ul>
    <!-- Icons Menu End -->

    <!-- Menu Start -->
    <div class="menu-container flex-grow-1">
      <ul id="menu" class="menu">
        <li>
          <a href="<?=base_url()?>dashboard" class="<?=$side == 'dashboard'?'active':''?>">
            <i data-acorn-icon="home" class="icon" data-acorn-size="18"></i>
            <span class="label">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="#dataMaster" class="<?=substr($side, 0, 11)=='data_master' ? 'active':''?>">
            <i data-acorn-icon="folder" class="icon" data-acorn-size="18"></i>
            <span class="label">Data Master</span>
          </a>
          <ul id="dataMaster">
            <li>
              <a href="<?=base_url()?>data_master/pengajuan" class="<?=$side=='data_master-pengajuan' ? 'active':''?>">
                <span class="label">Pengajuan</span>
              </a>
            </li>
            <li>
              <a href="<?=base_url()?>data_master/setting_bahan_tes" class="<?=$side=='data_master-setting_bahan_tes' ? 'active':''?>">
                <span class="label">Setting Bahan Tes</span>
              </a>
            </li>
            <li>
              <a href="<?=base_url()?>data_master/user" class="<?=$side=='data_master-user' ? 'active':''?>">
                <span class="label">Akun Pengguna</span>
              </a>
            </li>
            <li>
              <a href="<?=base_url()?>data_master/lamaran_masuk" class="<?=$side=='data_master-lamaran_masuk' ? 'active':''?>">
                <span class="label">Lamaran Masuk Tanpa Recruitmen</span>
              </a>
            </li>
            <li>
              <a href="<?=base_url()?>data_master/referensi" class="<?=$side=='data_master-referensi' ? 'active':''?>">
                <span class="label">Referensi</span>
              </a>
            </li>
          </ul>
        </li> 
        <li>
          <a href="#monitoring" class="<?=substr($side, 0, 10)=='monitoring' ? 'active':''?>">
            <i data-acorn-icon="screen" class="icon" data-acorn-size="18"></i>
            <span class="label">Monitoring</span>
          </a>
          <ul id="monitoring">
            <li>
              <a href="<?=base_url()?>monitoring/recruitment" class="<?=$side=='monitoring-recruitment' ? 'active':''?>">
                <span class="label">Recruitment</span>
              </a>
            </li>
            <li>
              <a href="<?=base_url()?>monitoring/lamaran_masuk" class="<?=$side=='monitoring-lamaran_masuk' ? 'active':''?>">
                <span class="label">Lamaran Masuk</span>
              </a>
            </li>
            <li>
              <a href="<?=base_url()?>monitoring/jadwal_peserta_tes" class="<?=$side=='monitoring-jadwal_peserta_tes' ? 'active':''?>">
                <span class="label">Jadwal Peserta Tes</span>
              </a>
            </li>
            <li>
              <a href="<?=base_url()?>monitoring/schedule" class="<?=$side=='monitoring-schedule' ? 'active':''?>">
                <span class="label">Schedule</span>
              </a>
            </li>
            <li>
              <a href="<?=base_url()?>monitoring/detail" class="<?=$side=='monitoring-detail' ? 'active':''?>">
                <span class="label">Detail Schedule</span>
              </a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#tes" class="<?=substr($side, 0, 3)=='tes' ? 'active':''?>">
            <i data-acorn-icon="quiz" class="icon" data-acorn-size="18"></i>
            <span class="label">Tes</span>
          </a>
          <ul id="tes">
            <li>
              <a href="<?=base_url()?>tes/jadwal" class="<?=$side=='tes-jadwal' ? 'active':''?>">
                <span class="label">Jadwal</span>
              </a>
            </li>
            <li>
              <a href="<?=base_url()?>tes/peserta_tes" class="<?=$side=='tes-peserta_tes' ? 'active':''?>">
                <span class="label">List Peserta Tes</span>
              </a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#resign" class="<?=substr($side, 0, 6)=='resign' ? 'active':''?>">
            <i data-acorn-icon="shield-warning" class="icon" data-acorn-size="18"></i>
            <span class="label">Resign</span>
          </a>
          <ul id="resign">
            <li>
              <a href="<?=base_url()?>resign/add" class="<?=$side=='resign-add' ? 'active':''?>">
                <span class="label">Tambah Karyawan Resign</span>
              </a>
            </li>
            <li>
              <a href="<?=base_url()?>resign/monitoring" class="<?=$side=='resign-monitoring' ? 'active':''?>">
                <span class="label">Monitoring</span>
              </a>
            </li>
          </ul>
        </li> 
        <li>
          <a href="<?=base_url()?>bank_data" class="<?=$side == 'bank_data'?'active':''?>">
            <i data-acorn-icon="user" class="icon" data-acorn-size="18"></i>
            <span class="label">Bank Data Pelamar</span>
          </a>
        </li>
      </ul>
    </div>
    <!-- Menu End -->

    <!-- Mobile Buttons Start -->
    <?php $this->load->view("_partial/tag-menu-mobile");?>
    <!-- Mobile Buttons End -->
  </div>
  <div class="nav-shadow"></div>
</div>