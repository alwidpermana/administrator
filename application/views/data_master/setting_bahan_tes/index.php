<!DOCTYPE html>
<html lang="en" data-footer="true" data-override='{"attributes": {"placement": "horizontal","navcolor": "light","layout": "fluid","radius": "rounded", "color": "light-red"}}' data-scrollspy="true">
  <head>
    <?php $this->load->view("_partial/style.php");?>
    <style type="text/css">
      .judul{
        -webkit-text-stroke-width: 1px;
        -webkit-text-stroke-color: white;
      }
    </style>
  </head>

  <body>
    <div id="root">
      <?php $this->load->view("_partial/sidebar");?>

      <main>
        <div class="container">
          <div class="row">
            <div class="col">
              <!-- Title Start -->
              <div class="page-title-container">
                <div class="row">
                  <!-- Title Start -->
                  <?php $this->load->view("_partial/content-header");?>
                  <!-- Title End -->
                </div>
              </div>
              <!-- Title End -->

              <!-- Content Start -->
              <section class="scroll-section" id="imagesStandard">
                  <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12 col-12 mb-5">
                      <div class="card w-100 sw-sm-40 sh-25 hover-img-scale-up">
                        <img src="<?=base_url()?>assets/arsip/setting_bahan_tes/produksi.jpg" class="card-img h-100 scale" alt="card image" />
                        <div class="card-img-overlay d-flex flex-column justify-content-between bg-transparent">
                          <div class="d-flex flex-column h-100 justify-content-between align-items-start">
                            <div class="cta-3 mb-5 text-black">
                              
                            </div>
                            <a href="<?=base_url()?>data_master/isi_setting/Operator" class="btn btn-icon btn-icon-start btn-primary mt-3 stretched-link">
                              <i data-acorn-icon="chevron-right"></i>
                              <span>Operator</span>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 col-12 mb-5">
                      <div class="card w-100 sw-sm-40 sh-25 hover-img-scale-up">
                        <img src="<?=base_url()?>assets/arsip/setting_bahan_tes/admin.png" class="card-img h-100 scale" alt="card image" />
                        <div class="card-img-overlay d-flex flex-column justify-content-between bg-transparent">
                          <div class="d-flex flex-column h-100 justify-content-between align-items-start">
                            <div class="cta-3 mb-5 text-black">
                              
                            </div>
                            <a href="<?=base_url()?>data_master/isi_setting/Admin" class="btn btn-icon btn-icon-start btn-primary mt-3 stretched-link">
                              <i data-acorn-icon="chevron-right"></i>
                              <span>Admin</span>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 col-12 mb-5">
                      <div class="card w-100 sw-sm-40 sh-25 hover-img-scale-up">
                        <img src="<?=base_url()?>assets/arsip/setting_bahan_tes/staff.jpg" class="card-img h-100 scale" alt="card image" />
                        <div class="card-img-overlay d-flex flex-column justify-content-between bg-transparent">
                          <div class="d-flex flex-column h-100 justify-content-between align-items-start">
                            <div class="cta-3 mb-5 text-black">
                              
                            </div>
                            <a href="<?=base_url()?>data_master/isi_setting/Staff" class="btn btn-icon btn-icon-start btn-primary mt-3 stretched-link">
                              <i data-acorn-icon="chevron-right"></i>
                              <span>Staff</span>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 col-12 mb-5">
                      <div class="card w-100 sw-sm-40 sh-25 hover-img-scale-up">
                        <img src="<?=base_url()?>assets/arsip/setting_bahan_tes/karu.jpeg" class="card-img h-100 scale" alt="card image" />
                        <div class="card-img-overlay d-flex flex-column justify-content-between bg-transparent">
                          <div class="d-flex flex-column h-100 justify-content-between align-items-start">
                            <div class="cta-3 mb-5 text-black">
                              
                            </div>
                            <a href="<?=base_url()?>data_master/isi_setting/Karu" class="btn btn-icon btn-icon-start btn-primary mt-3 stretched-link">
                              <i data-acorn-icon="chevron-right"></i>
                              <span>Karu</span>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 col-12 mb-5">
                      <div class="card w-100 sw-sm-40 sh-25 hover-img-scale-up">
                        <img src="<?=base_url()?>assets/arsip/setting_bahan_tes/kasie.png" class="card-img h-100 scale" alt="card image" />
                        <div class="card-img-overlay d-flex flex-column justify-content-between bg-transparent">
                          <div class="d-flex flex-column h-100 justify-content-between align-items-start">
                            <div class="cta-3 mb-5 text-black">
                              
                            </div>
                            <a href="<?=base_url()?>data_master/isi_setting/Kasie" class="btn btn-icon btn-icon-start btn-primary mt-3 stretched-link">
                              <i data-acorn-icon="chevron-right"></i>
                              <span>Kasie</span>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 col-12 mb-5">
                      <div class="card w-100 sw-sm-40 sh-25 hover-img-scale-up">
                        <img src="<?=base_url()?>assets/arsip/setting_bahan_tes/kabag.png" class="card-img h-100 scale" alt="card image" />
                        <div class="card-img-overlay d-flex flex-column justify-content-between bg-transparent">
                          <div class="d-flex flex-column h-100 justify-content-between align-items-start">
                            <div class="cta-3 mb-5 text-black">
                              
                            </div>
                            <a href="<?=base_url()?>data_master/isi_setting/Kabag" class="btn btn-icon btn-icon-start btn-primary mt-3 stretched-link">
                              <i data-acorn-icon="chevron-right"></i>
                              <span>Kabag</span>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 col-12 mb-5">
                      <div class="card w-100 sw-sm-40 sh-25 hover-img-scale-up">
                        <img src="<?=base_url()?>assets/arsip/setting_bahan_tes/manager.jpg" class="card-img h-100 scale" alt="card image" />
                        <div class="card-img-overlay d-flex flex-column justify-content-between bg-transparent">
                          <div class="d-flex flex-column h-100 justify-content-between align-items-start">
                            <div class="cta-3 mb-5 text-black">
                              
                            </div>
                            <a href="<?=base_url()?>data_master/isi_setting/Manager" class="btn btn-icon btn-icon-start btn-primary mt-3 stretched-link">
                              <i data-acorn-icon="chevron-right"></i>
                              <span>Manager</span>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
              <!-- Content End -->
            </div>

            
          </div>
        </div>
      </main>
      <!-- Layout Footer Start -->
      <?php $this->load->view("_partial/footer");?>
      <!-- Layout Footer End -->
    </div>

    <?php $this->load->view("_partial/script");?>
  </body>
</html>
