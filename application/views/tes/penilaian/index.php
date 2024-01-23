<!DOCTYPE html>
<html lang="en" data-footer="true" data-override='{"attributes": {"placement": "vertical","navcolor": "light","layout": "fluid","radius": "rounded", "color": "light-red"}}' data-scrollspy="true">
  <head>
    <?php $this->load->view("_partial/style.php");?>
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
              <div class="row">
                <div class="col-md-4">
                  <div class="card mb-5">
                    <div class="card-body">
                      <div class="row mb-2">
                        <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Tahap</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control form-control-sm" id="inputTahap" value="<?=$tes->tahap?>" readonly />
                        </div>
                      </div>
                      <div class="row mb-2">
                        <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Tanggal Tes</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control form-control-sm" id="inputTanggal" value="<?=$tes->tahap == '1' ? $tes->tgl_tes:$tes->tgl_tes.', '.$tes->tgl_tes2.', '.$tes->tgl_tes3?>" readonly />
                        </div>
                      </div>
                      <div class="row mb-2">
                        <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">No Rekaman Tes</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control form-control-sm" id="inputNoRekaman" value="<?=$tes->no_rek?>" readonly />
                        </div>
                      </div>
                      <div class="row mb-2">
                        <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Jenis</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control form-control-sm" id="inputJenis" value="<?=$tes->jenis?>" readonly />
                        </div>
                      </div>
                      <div class="row">
                        <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Tempat</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control form-control-sm" id="inputTempat" value="<?=$tes->tempat?>" readonly />
                        </div>
                      </div>
                      <input type="hidden" id="inputId">
                    </div>
                  </div>  
                </div>
                <div class="col-md-8">
                  <div class="card mb-5">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6 mb-3 mb-md-0">
                          <div class="row mb-2">
                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">NIP</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control form-control-sm" id="inputTahap" value="<?=$pelamar->nip?>" readonly />
                            </div>
                          </div>
                          <div class="row mb-2">
                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Nama</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control form-control-sm" id="inputTanggal" value="<?=$pelamar->nama?>" readonly />
                            </div>
                          </div>
                          <div class="row mb-2">
                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">No KTP</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control form-control-sm" id="inputNoRekaman" value="<?=$pelamar->no_ktp?>" readonly />
                            </div>
                          </div>
                          <div class="row mb-2">
                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Sub</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control form-control-sm" id="inputJenis" value="<?=$pelamar->sub?>" readonly />
                            </div>
                          </div>
                          <div class="row">
                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Type</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control form-control-sm" id="inputTempat" value="<?=$pelamar->type?>" readonly />
                            </div>
                          </div>
                          <input type="hidden" id="inputId">
                        </div>
                        <div class="col-md-6">
                          <div class="sw-23 sh-23">
                            <img src="http://localhost/recruitment/<?=$pelamar->foto?>" class="img-fluid img-fluid-height rounded-md rounded mx-auto d-block" alt="thumb" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>  
                </div>
                <!-- Help Text End -->
              </div>
              <?php if ($tes->tahap == 1): ?>
                <form id="submitTahap1">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <div class="col-md-12">
                          <h2 class="small-title">Tertulis</h2>
                          <div class="card mb-2 sh-19 sh-md-8">
                            <div class="card-body pt-0 pb-0 h-100">
                              <div class="row g-0 h-100 align-content-center">
                                <!-- <div class="col-2 col-md-1 d-flex flex-column justify-content-center mb-1 mb-md-0">
                                  <a href="#" class="text-truncate">1 </a>
                                </div> -->
                                <div class="col-10 col-md-3 d-flex flex-column justify-content-center mb-1 mb-md-0">
                                  <a href="#" class="text-truncate">Kemampuan Dasar</a>
                                </div>
                                <div class="col-12 col-md-3 d-flex flex-column justify-content-center align-items-md-start mb-1 mb-md-0 align-middle">
                                  <div class="form-floating w-100">
                                    <select class="select2FloatingLabel" id="inputTertulisKemampuanDasarStandar" name="inputTertulisKemampuanDasarStandar">
                                      <option value="X">Tidak Diperlukan</option>
                                      <option value="Lulus">Lulus</option>
                                      <option value="Tidak Lulus">Tidak Lulus</option>
                                    </select>
                                    <label>Standar</label>
                                  </div>
                                </div>
                                <div class="col-6 col-md-3 d-flex flex-column justify-content-center align-items-md-end mb-1 mb-md-0 align-middle">
                                  <div class="form-floating">
                                    <input type="text" class="form-control" id="inputTertulisKemampuanDasarNilai" name="inputTertulisKemampuanDasarNilai" />
                                    <label>Nilai</label>
                                  </div>
                                </div>
                                <!-- <div class="col-md-1"></div> -->
                                <div class="col-6 col-md-3 d-flex flex-column justify-content-center align-items-md-end mb-1 mb-md-0 align-middle">
                                  <div class="form-floating">
                                    <input type="text" class="form-control" id="inputTertulisKemampuanDasarCT" name="inputTertulisKemampuanDasarCT" />
                                    <label>C/T</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="card mb-2 sh-19 sh-md-8">
                            <div class="card-body pt-0 pb-0 h-100">
                              <div class="row g-0 h-100 align-content-center">
                                <!-- <div class="col-2 col-md-1 d-flex flex-column justify-content-center mb-1 mb-md-0">
                                  <a href="#" class="text-truncate">1 </a>
                                </div> -->
                                <div class="col-10 col-md-3 d-flex flex-column justify-content-center mb-1 mb-md-0">
                                  <a href="#" class="text-truncate">Logika</a>
                                </div>
                                <div class="col-12 col-md-3 d-flex flex-column justify-content-center align-items-md-start mb-1 mb-md-0 align-middle">
                                  <div class="form-floating w-100">
                                    <select class="select2FloatingLabel" id="inputTertulisLogikaStandar2" name="inputTertulisLogikaStandar2">
                                      <option value="X">Tidak Diperlukan</option>
                                      <option value="Lulus">Lulus</option>
                                      <option value="Tidak Lulus">Tidak Lulus</option>
                                    </select>
                                    <label>Standar</label>
                                  </div>
                                </div>
                                <div class="col-6 col-md-3 d-flex flex-column justify-content-center align-items-md-end mb-1 mb-md-0 align-middle">
                                  <div class="form-floating">
                                    <input type="text" class="form-control" id="inputTertulisLogikaNilai" name="inputTertulisLogikaNilai" />
                                    <label>Nilai</label>
                                  </div>
                                </div>
                                <!-- <div class="col-md-1"></div> -->
                                <div class="col-6 col-md-3 d-flex flex-column justify-content-center align-items-md-end mb-1 mb-md-0 align-middle">
                                  <div class="form-floating">
                                    <input type="text" class="form-control" id="inputTertulisLogikaCT" name="inputTertulisLogikaCT" />
                                    <label>C/T</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="card mb-2 sh-19 sh-md-8">
                            <div class="card-body pt-0 pb-0 h-100">
                              <div class="row g-0 h-100 align-content-center">
                                <!-- <div class="col-2 col-md-1 d-flex flex-column justify-content-center mb-1 mb-md-0">
                                  <a href="#" class="text-truncate">1 </a>
                                </div> -->
                                <div class="col-10 col-md-3 d-flex flex-column justify-content-center mb-1 mb-md-0">
                                  <a href="#" class="text-truncate">Ketelitian</a>
                                </div>
                                <div class="col-12 col-md-3 d-flex flex-column justify-content-center align-items-md-start mb-1 mb-md-0 align-middle">
                                  <div class="form-floating w-100">
                                    <select class="select2FloatingLabel" id="inputTertulisKetelitianStandar" name="inputTertulisKetelitianStandar">
                                      <option value="X">Tidak Diperlukan</option>
                                      <option value="Lulus">Lulus</option>
                                      <option value="Tidak Lulus">Tidak Lulus</option>
                                    </select>
                                    <label>Standar</label>
                                  </div>
                                </div>
                                <div class="col-6 col-md-3 d-flex flex-column justify-content-center align-items-md-end mb-1 mb-md-0 align-middle">
                                  <div class="form-floating">
                                    <input type="text" class="form-control" id="inputTertulisKetelitianNilai" name="inputTertulisKetelitianNilai" />
                                    <label>Nilai</label>
                                  </div>
                                </div>
                                <!-- <div class="col-md-1"></div> -->
                                <div class="col-6 col-md-3 d-flex flex-column justify-content-center align-items-md-end mb-1 mb-md-0 align-middle">
                                  <div class="form-floating">
                                    <input type="text" class="form-control" id="inputTertulisKetelitianCT" name="inputTertulisKetelitianCT" />
                                    <label>C/T</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row mt-5">
                        <div class="col-md-12">
                          <h2 class="small-title">Keterampilan</h2>
                          <div class="card mb-2 sh-19 sh-md-8">
                            <div class="card-body pt-0 pb-0 h-100">
                              <div class="row g-0 h-100 align-content-center">
                                <!-- <div class="col-2 col-md-1 d-flex flex-column justify-content-center mb-1 mb-md-0">
                                  <a href="#" class="text-truncate">1 </a>
                                </div> -->
                                <div class="col-10 col-md-3 d-flex flex-column justify-content-center mb-1 mb-md-0">
                                  <a href="#" class="text-truncate">Motorik</a>
                                </div>
                                <div class="col-12 col-md-3 d-flex flex-column justify-content-center align-items-md-start mb-1 mb-md-0 align-middle">
                                  <div class="form-floating w-100">
                                    <select class="select2FloatingLabel" id="inputKeterampilanMotorikStandar" name="inputKeterampilanMotorikStandar">
                                      <option value="X">Tidak Diperlukan</option>
                                      <option value="Lulus">Lulus</option>
                                      <option value="Tidak Lulus">Tidak Lulus</option>
                                    </select>
                                    <label>Standar</label>
                                  </div>
                                </div>
                                <div class="col-6 col-md-3 d-flex flex-column justify-content-center align-items-md-end mb-1 mb-md-0 align-middle">
                                  <div class="form-floating">
                                    <input type="text" class="form-control" id="inputKeterampilanMotorikNilai"  name="inputKeterampilanMotorikNilai" />
                                    <label>Nilai</label>
                                  </div>
                                </div>
                                <!-- <div class="col-md-1"></div> -->
                                <div class="col-6 col-md-3 d-flex flex-column justify-content-center align-items-md-end mb-1 mb-md-0 align-middle">
                                  <div class="form-floating">
                                    <input type="text" class="form-control" id="inputKeterampilanMotorikCT" name="inputKeterampilanMotorikCT" />
                                    <label>C/T</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row mt-5">
                        <div class="col-md-12">
                          <h2 class="small-title">Interview</h2>
                          <div class="card mb-2 sh-19 sh-md-8">
                            <div class="card-body pt-0 pb-0 h-100">
                              <div class="row g-0 h-100 align-content-center">
                                <!-- <div class="col-2 col-md-1 d-flex flex-column justify-content-center mb-1 mb-md-0">
                                  <a href="#" class="text-truncate">1 </a>
                                </div> -->
                                <div class="col-10 col-md-3 d-flex flex-column justify-content-center mb-1 mb-md-0">
                                  <a href="#" class="text-truncate">HRD</a>
                                </div>
                                <div class="col-12 col-md-3 d-flex flex-column justify-content-center align-items-md-start mb-1 mb-md-0 align-middle">
                                  <div class="form-floating w-100">
                                    <select class="select2FloatingLabel" id="inputInterviewHRDStandar" name="inputInterviewHRDStandar">
                                      <option value="X">Tidak Diperlukan</option>
                                      <option value="Lulus">Lulus</option>
                                      <option value="Tidak Lulus">Tidak Lulus</option>
                                    </select>
                                    <label>Standar</label>
                                  </div>
                                </div>
                                <div class="col-6 col-md-3 d-flex flex-column justify-content-center align-items-md-end mb-1 mb-md-0 align-middle">
                                  <div class="form-floating">
                                    <input type="text" class="form-control" id="inputInterviewHRDNilai" name="inputInterviewHRDNilai" />
                                    <label>Nilai</label>
                                  </div>
                                </div>
                                <!-- <div class="col-md-1"></div> -->
                                <div class="col-6 col-md-3 d-flex flex-column justify-content-center align-items-md-end mb-1 mb-md-0 align-middle">
                                  <div class="form-floating">
                                    <input type="text" class="form-control" id="inputInterviewHRDCT" name="inputInterviewHRDCT" />
                                    <label>C/T</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="card mb-2 sh-19 sh-md-8">
                            <div class="card-body pt-0 pb-0 h-100">
                              <div class="row g-0 h-100 align-content-center">
                                <!-- <div class="col-2 col-md-1 d-flex flex-column justify-content-center mb-1 mb-md-0">
                                  <a href="#" class="text-truncate">1 </a>
                                </div> -->
                                <div class="col-10 col-md-3 d-flex flex-column justify-content-center mb-1 mb-md-0">
                                  <a href="#" class="text-truncate">User</a>
                                </div>
                                <div class="col-12 col-md-3 d-flex flex-column justify-content-center align-items-md-start mb-1 mb-md-0 align-middle">
                                  <div class="form-floating w-100">
                                    <select class="select2FloatingLabel" id="inputInterviewUserStandar" name="inputInterviewUserStandar">
                                      <option value="X">Tidak Diperlukan</option>
                                      <option value="Lulus">Lulus</option>
                                      <option value="Tidak Lulus">Tidak Lulus</option>
                                    </select>
                                    <label>Standar</label>
                                  </div>
                                </div>
                                <div class="col-6 col-md-3 d-flex flex-column justify-content-center align-items-md-end mb-1 mb-md-0 align-middle">
                                  <div class="form-floating">
                                    <input type="text" class="form-control" id="inputInterviewUserNilai" name="inputInterviewUserNilai" />
                                    <label>Nilai</label>
                                  </div>
                                </div>
                                <!-- <div class="col-md-1"></div> -->
                                <div class="col-6 col-md-3 d-flex flex-column justify-content-center align-items-md-end mb-1 mb-md-0 align-middle">
                                  <div class="form-floating">
                                    <input type="text" class="form-control" id="inputInterviewUserCT" name="inputInterviewUserCT" />
                                    <label>C/T</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <div class="col-md-12">
                          <h2 class="small-title">Fisik</h2>
                          <div class="card mb-2 sh-19 sh-md-8">
                            <div class="card-body pt-0 pb-0 h-100">
                              <div class="row g-0 h-100 align-content-center">
                                <!-- <div class="col-2 col-md-1 d-flex flex-column justify-content-center mb-1 mb-md-0">
                                  <a href="#" class="text-truncate">1 </a>
                                </div> -->
                                <div class="col-10 col-md-3 d-flex flex-column justify-content-center mb-1 mb-md-0">
                                  <a href="#" class="text-truncate">Tinggi Badan</a>
                                </div>
                                <div class="col-12 col-md-3 d-flex flex-column justify-content-center align-items-md-start mb-1 mb-md-0 align-middle">
                                  <div class="form-floating w-100">
                                    <select class="select2FloatingLabel" id="inputFisikTinggiBadanStandar" name="inputFisikTinggiBadanStandar">
                                      <option value="X">Tidak Diperlukan</option>
                                      <option value="Lulus">Lulus</option>
                                      <option value="Tidak Lulus">Tidak Lulus</option>
                                    </select>
                                    <label>Standar</label>
                                  </div>
                                </div>
                                <div class="col-6 col-md-3 d-flex flex-column justify-content-center align-items-md-end mb-1 mb-md-0 align-middle">
                                  <div class="form-floating">
                                    <input type="text" class="form-control" id="inputFisikTinggiBadanNilai" name="inputFisikTinggiBadanNilai" />
                                    <label>Nilai</label>
                                  </div>
                                </div>
                                <!-- <div class="col-md-1"></div> -->
                                <div class="col-6 col-md-3 d-flex flex-column justify-content-center align-items-md-end mb-1 mb-md-0 align-middle">
                                  <div class="form-floating">
                                    <input type="text" class="form-control" id="inputFisikTinggiBadanCT" name="inputFisikTinggiBadanCT" />
                                    <label>C/T</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="card mb-2 sh-19 sh-md-8">
                            <div class="card-body pt-0 pb-0 h-100">
                              <div class="row g-0 h-100 align-content-center">
                                <!-- <div class="col-2 col-md-1 d-flex flex-column justify-content-center mb-1 mb-md-0">
                                  <a href="#" class="text-truncate">1 </a>
                                </div> -->
                                <div class="col-10 col-md-3 d-flex flex-column justify-content-center mb-1 mb-md-0">
                                  <a href="#" class="text-truncate">Mata</a>
                                </div>
                                <div class="col-12 col-md-3 d-flex flex-column justify-content-center align-items-md-start mb-1 mb-md-0 align-middle">
                                  <div class="form-floating w-100">
                                    <select class="select2FloatingLabel" id="inputFisikMataStandar2" name="inputFisikMataStandar2">
                                      <option value="X">Tidak Diperlukan</option>
                                      <option value="Lulus">Lulus</option>
                                      <option value="Tidak Lulus">Tidak Lulus</option>
                                    </select>
                                    <label>Standar</label>
                                  </div>
                                </div>
                                <div class="col-6 col-md-3 d-flex flex-column justify-content-center align-items-md-end mb-1 mb-md-0 align-middle">
                                  <div class="form-floating">
                                    <input type="text" class="form-control" id="inputFisikMataNilai"  name="inputFisikMataNilai" />
                                    <label>Nilai</label>
                                  </div>
                                </div>
                                <!-- <div class="col-md-1"></div> -->
                                <div class="col-6 col-md-3 d-flex flex-column justify-content-center align-items-md-end mb-1 mb-md-0 align-middle">
                                  <div class="form-floating">
                                    <input type="text" class="form-control" id="inputFisikMataCT" name="inputFisikMataCT" />
                                    <label>C/T</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="card mb-2 sh-19 sh-md-8">
                            <div class="card-body pt-0 pb-0 h-100">
                              <div class="row g-0 h-100 align-content-center">
                                <!-- <div class="col-2 col-md-1 d-flex flex-column justify-content-center mb-1 mb-md-0">
                                  <a href="#" class="text-truncate">1 </a>
                                </div> -->
                                <div class="col-10 col-md-3 d-flex flex-column justify-content-center mb-1 mb-md-0">
                                  <a href="#" class="text-truncate">Tensi</a>
                                </div>
                                <div class="col-12 col-md-3 d-flex flex-column justify-content-center align-items-md-start mb-1 mb-md-0 align-middle">
                                  <div class="form-floating w-100">
                                    <select class="select2FloatingLabel" id="inputFisikTensiStandar" name="inputFisikTensiStandar">
                                      <option value="X">Tidak Diperlukan</option>
                                      <option value="Lulus">Lulus</option>
                                      <option value="Tidak Lulus">Tidak Lulus</option>
                                    </select>
                                    <label>Standar</label>
                                  </div>
                                </div>
                                <div class="col-6 col-md-3 d-flex flex-column justify-content-center align-items-md-end mb-1 mb-md-0 align-middle">
                                  <div class="form-floating">
                                    <input type="text" class="form-control" id="inputFisikTensiNilai" name="inputFisikTensiNilai" />
                                    <label>Nilai</label>
                                  </div>
                                </div>
                                <!-- <div class="col-md-1"></div> -->
                                <div class="col-6 col-md-3 d-flex flex-column justify-content-center align-items-md-end mb-1 mb-md-0 align-middle">
                                  <div class="form-floating">
                                    <input type="text" class="form-control" id="inputFisikTensiCT" name="inputFisikTensiCT" />
                                    <label>C/T</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="card mb-2 sh-19 sh-md-8">
                            <div class="card-body pt-0 pb-0 h-100">
                              <div class="row g-0 h-100 align-content-center">
                                <!-- <div class="col-2 col-md-1 d-flex flex-column justify-content-center mb-1 mb-md-0">
                                  <a href="#" class="text-truncate">1 </a>
                                </div> -->
                                <div class="col-10 col-md-3 d-flex flex-column justify-content-center mb-1 mb-md-0">
                                  <a href="#" class="text-truncate">Tato</a>
                                </div>
                                <div class="col-12 col-md-3 d-flex flex-column justify-content-center align-items-md-start mb-1 mb-md-0 align-middle">
                                  <div class="form-floating w-100">
                                    <select class="select2FloatingLabel" id="inputFisikTatoStandar" name="inputFisikTatoStandar">
                                      <option value="X">Tidak Diperlukan</option>
                                      <option value="Lulus">Lulus</option>
                                      <option value="Tidak Lulus">Tidak Lulus</option>
                                    </select>
                                    <label>Standar</label>
                                  </div>
                                </div>
                                <div class="col-6 col-md-3 d-flex flex-column justify-content-center align-items-md-end mb-1 mb-md-0 align-middle">
                                  <div class="form-floating">
                                    <input type="text" class="form-control" id="inputFisikTatoNilai" name="inputFisikTatoNilai" />
                                    <label>Nilai</label>
                                  </div>
                                </div>
                                <!-- <div class="col-md-1"></div> -->
                                <div class="col-6 col-md-3 d-flex flex-column justify-content-center align-items-md-end mb-1 mb-md-0 align-middle">
                                  <div class="form-floating">
                                    <input type="text" class="form-control" id="inputFisikTatoCT" name="inputFisikTatoCT" />
                                    <label>C/T</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="card mb-2 sh-19 sh-md-8">
                            <div class="card-body pt-0 pb-0 h-100">
                              <div class="row g-0 h-100 align-content-center">
                                <!-- <div class="col-2 col-md-1 d-flex flex-column justify-content-center mb-1 mb-md-0">
                                  <a href="#" class="text-truncate">1 </a>
                                </div> -->
                                <div class="col-10 col-md-3 d-flex flex-column justify-content-center mb-1 mb-md-0">
                                  <a href="#" class="text-truncate">Berat Badan</a>
                                </div>
                                <div class="col-12 col-md-3 d-flex flex-column justify-content-center align-items-md-start mb-1 mb-md-0 align-middle">
                                  <div class="form-floating w-100">
                                    <select class="select2FloatingLabel" id="inputFisikBeratBadanStandar" name="inputFisikBeratBadanStandar">
                                      <option value="X">Tidak Diperlukan</option>
                                      <option value="Lulus">Lulus</option>
                                      <option value="Tidak Lulus">Tidak Lulus</option>
                                    </select>
                                    <label>Standar</label>
                                  </div>
                                </div>
                                <div class="col-6 col-md-3 d-flex flex-column justify-content-center align-items-md-end mb-1 mb-md-0 align-middle">
                                  <div class="form-floating">
                                    <input type="text" class="form-control" id="inputFisikBeratBadanNilai" name="inputFisikBeratBadanNilai" />
                                    <label>Nilai</label>
                                  </div>
                                </div>
                                <!-- <div class="col-md-1"></div> -->
                                <div class="col-6 col-md-3 d-flex flex-column justify-content-center align-items-md-end mb-1 mb-md-0 align-middle">
                                  <div class="form-floating">
                                    <input type="text" class="form-control" id="inputFisikBeratBadanCT" name="inputFisikBeratBadanCT" />
                                    <label>C/T</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row mt-4">
                        <div class="col-md-12">
                          <h2 class="small-title">Komitmen</h2>
                          <div class="card mb-2 sh-19 sh-md-8">
                            <div class="card-body pt-0 pb-0 h-100">
                              <div class="row g-0 h-100 align-content-center">
                                <!-- <div class="col-2 col-md-1 d-flex flex-column justify-content-center mb-1 mb-md-0">
                                  <a href="#" class="text-truncate">1 </a>
                                </div> -->
                                <div class="col-10 col-md-3 d-flex flex-column justify-content-center mb-1 mb-md-0">
                                  <a href="#" class="text-truncate">TTD Pernyataan</a>
                                </div>
                                <div class="col-12 col-md-3 d-flex flex-column justify-content-center align-items-md-start mb-1 mb-md-0 align-middle">
                                  <div class="form-floating w-100">
                                    <select class="select2FloatingLabel" id="inputKomitmenStandar" name="inputKomitmenStandar">
                                      <option value="X">Tidak Diperlukan</option>
                                      <option value="Lulus">Lulus</option>
                                      <option value="Tidak Lulus">Tidak Lulus</option>
                                    </select>
                                    <label>Standar</label>
                                  </div>
                                </div>
                                <div class="col-6 col-md-3 d-flex flex-column justify-content-center align-items-md-end mb-1 mb-md-0 align-middle">
                                  <div class="form-floating">
                                    <input type="text" class="form-control" id="inputKomitmenNilai" name="inputKomitmenNilai" />
                                    <label>Nilai</label>
                                  </div>
                                </div>
                                <!-- <div class="col-md-1"></div> -->
                                <div class="col-6 col-md-3 d-flex flex-column justify-content-center align-items-md-end mb-1 mb-md-0 align-middle">
                                  <div class="form-floating">
                                    <input type="text" class="form-control" id="inputKomitmenCT" name="inputKomitmenCT" />
                                    <label>C/T</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row mt-5">
                    <div class="d-grid gap-2 col-6 mx-auto mb-3">
                      <button class="btn btn-primary active-scale-down" type="submit">Simpan Penilaian</button>
                    </div>
                  </div>
                </form> 
              <?php elseif($tes->tahap == '2'):?>
                <form>
                  <div class="row">
                    <div class="col-md-6">
                      <h2 class="small-title">Lapangan (User)</h2>
                      <div class="card mb-2 sh-19 sh-md-8">
                        <div class="card-body pt-0 pb-0 h-100">
                          <div class="row g-0 h-100 align-content-center">
                            <!-- <div class="col-2 col-md-1 d-flex flex-column justify-content-center mb-1 mb-md-0">
                              <a href="#" class="text-truncate">1 </a>
                            </div> -->
                            <div class="col-10 col-md-3 d-flex flex-column justify-content-center mb-1 mb-md-0">
                              <a href="#" class="text-truncate">Training/Orientasi</a>
                            </div>
                            <div class="col-12 col-md-3 d-flex flex-column justify-content-center align-items-md-start mb-1 mb-md-0 align-middle">
                              <div class="form-floating w-100">
                                <select class="select2FloatingLabel" id="inputTrainingStandar" name="inputTrainingStandar">
                                  <option value="X">Tidak Diperlukan</option>
                                  <option value="Lulus">Lulus</option>
                                  <option value="Tidak Lulus">Tidak Lulus</option>
                                </select>
                                <label>Standar</label>
                              </div>
                            </div>
                            <div class="col-6 col-md-3 d-flex flex-column justify-content-center align-items-md-end mb-1 mb-md-0 align-middle">
                              <div class="form-floating">
                                <input type="text" class="form-control" id="inputTrainingNilai" name="inputTrainingNilai" />
                                <label>Nilai</label>
                              </div>
                            </div>
                            <!-- <div class="col-md-1"></div> -->
                            <div class="col-6 col-md-3 d-flex flex-column justify-content-center align-items-md-end mb-1 mb-md-0 align-middle">
                              <div class="form-floating">
                                <input type="text" class="form-control" id="inputTrainingCT" name="inputTrainingCT" />
                                <label>C/T</label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <h2 class="small-title">Materi Kelas</h2>
                      <div class="card mb-2 sh-19 sh-md-8">
                        <div class="card-body pt-0 pb-0 h-100">
                          <div class="row g-0 h-100 align-content-center">
                            <!-- <div class="col-2 col-md-1 d-flex flex-column justify-content-center mb-1 mb-md-0">
                              <a href="#" class="text-truncate">1 </a>
                            </div> -->
                            <div class="col-10 col-md-3 d-flex flex-column justify-content-center mb-1 mb-md-0">
                              <a href="#" class="text-truncate">Compro Perusahaan</a>
                            </div>
                            <div class="col-12 col-md-3 d-flex flex-column justify-content-center align-items-md-start mb-1 mb-md-0 align-middle">
                              <div class="form-floating w-100">
                                <select class="select2FloatingLabel" id="inputComproStandar" name="inputComproStandar">
                                  <option value="X">Tidak Diperlukan</option>
                                  <option value="Lulus">Lulus</option>
                                  <option value="Tidak Lulus">Tidak Lulus</option>
                                </select>
                                <label>Standar</label>
                              </div>
                            </div>
                            <div class="col-6 col-md-3 d-flex flex-column justify-content-center align-items-md-end mb-1 mb-md-0 align-middle">
                              <div class="form-floating">
                                <input type="text" class="form-control" id="inputComproNilai" name="inputComproNilai" />
                                <label>Nilai</label>
                              </div>
                            </div>
                            <!-- <div class="col-md-1"></div> -->
                            <div class="col-6 col-md-3 d-flex flex-column justify-content-center align-items-md-end mb-1 mb-md-0 align-middle">
                              <div class="form-floating">
                                <input type="text" class="form-control" id="inputComproCT" name="inputComproCT" />
                                <label>C/T</label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card mb-2 sh-19 sh-md-8">
                        <div class="card-body pt-0 pb-0 h-100">
                          <div class="row g-0 h-100 align-content-center">
                            <!-- <div class="col-2 col-md-1 d-flex flex-column justify-content-center mb-1 mb-md-0">
                              <a href="#" class="text-truncate">1 </a>
                            </div> -->
                            <div class="col-10 col-md-3 d-flex flex-column justify-content-center mb-1 mb-md-0">
                              <a href="#" class="text-truncate">PKB</a>
                            </div>
                            <div class="col-12 col-md-3 d-flex flex-column justify-content-center align-items-md-start mb-1 mb-md-0 align-middle">
                              <div class="form-floating w-100">
                                <select class="select2FloatingLabel" id="inputPKBStandar" name="inputPKBStandar">
                                  <option value="X">Tidak Diperlukan</option>
                                  <option value="Lulus">Lulus</option>
                                  <option value="Tidak Lulus">Tidak Lulus</option>
                                </select>
                                <label>Standar</label>
                              </div>
                            </div>
                            <div class="col-6 col-md-3 d-flex flex-column justify-content-center align-items-md-end mb-1 mb-md-0 align-middle">
                              <div class="form-floating">
                                <input type="text" class="form-control" id="inputPKBNilai" name="inputPKBNilai" />
                                <label>Nilai</label>
                              </div>
                            </div>
                            <!-- <div class="col-md-1"></div> -->
                            <div class="col-6 col-md-3 d-flex flex-column justify-content-center align-items-md-end mb-1 mb-md-0 align-middle">
                              <div class="form-floating">
                                <input type="text" class="form-control" id="inputPKBCT" name="inputPKBCT" />
                                <label>C/T</label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card mb-2 sh-19 sh-md-8">
                        <div class="card-body pt-0 pb-0 h-100">
                          <div class="row g-0 h-100 align-content-center">
                            <!-- <div class="col-2 col-md-1 d-flex flex-column justify-content-center mb-1 mb-md-0">
                              <a href="#" class="text-truncate">1 </a>
                            </div> -->
                            <div class="col-10 col-md-3 d-flex flex-column justify-content-center mb-1 mb-md-0">
                              <a href="#" class="text-truncate">ISO 9001</a>
                            </div>
                            <div class="col-12 col-md-3 d-flex flex-column justify-content-center align-items-md-start mb-1 mb-md-0 align-middle">
                              <div class="form-floating w-100">
                                <select class="select2FloatingLabel" id="inputISO9001Standar" name="inputISO9001Standar">
                                  <option value="X">Tidak Diperlukan</option>
                                  <option value="Lulus">Lulus</option>
                                  <option value="Tidak Lulus">Tidak Lulus</option>
                                </select>
                                <label>Standar</label>
                              </div>
                            </div>
                            <div class="col-6 col-md-3 d-flex flex-column justify-content-center align-items-md-end mb-1 mb-md-0 align-middle">
                              <div class="form-floating">
                                <input type="text" class="form-control" id="inputISO9001Nilai" name="inputISO9001Nilai" />
                                <label>Nilai</label>
                              </div>
                            </div>
                            <!-- <div class="col-md-1"></div> -->
                            <div class="col-6 col-md-3 d-flex flex-column justify-content-center align-items-md-end mb-1 mb-md-0 align-middle">
                              <div class="form-floating">
                                <input type="text" class="form-control" id="inputISO9001CT" name="inputISO9001CT" />
                                <label>C/T</label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card mb-2 sh-19 sh-md-8">
                        <div class="card-body pt-0 pb-0 h-100">
                          <div class="row g-0 h-100 align-content-center">
                            <!-- <div class="col-2 col-md-1 d-flex flex-column justify-content-center mb-1 mb-md-0">
                              <a href="#" class="text-truncate">1 </a>
                            </div> -->
                            <div class="col-10 col-md-3 d-flex flex-column justify-content-center mb-1 mb-md-0">
                              <a href="#" class="text-truncate">ISO 14001</a>
                            </div>
                            <div class="col-12 col-md-3 d-flex flex-column justify-content-center align-items-md-start mb-1 mb-md-0 align-middle">
                              <div class="form-floating w-100">
                                <select class="select2FloatingLabel" id="inputISO14001Standar" name="inputISO14001Standar">
                                  <option value="X">Tidak Diperlukan</option>
                                  <option value="Lulus">Lulus</option>
                                  <option value="Tidak Lulus">Tidak Lulus</option>
                                </select>
                                <label>Standar</label>
                              </div>
                            </div>
                            <div class="col-6 col-md-3 d-flex flex-column justify-content-center align-items-md-end mb-1 mb-md-0 align-middle">
                              <div class="form-floating">
                                <input type="text" class="form-control" id="inputISO14001Nilai" name="inputISO14001Nilai" />
                                <label>Nilai</label>
                              </div>
                            </div>
                            <!-- <div class="col-md-1"></div> -->
                            <div class="col-6 col-md-3 d-flex flex-column justify-content-center align-items-md-end mb-1 mb-md-0 align-middle">
                              <div class="form-floating">
                                <input type="text" class="form-control" id="inputISO14001CT" name="inputISO14001CT" />
                                <label>C/T</label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card mb-2 sh-19 sh-md-8">
                        <div class="card-body pt-0 pb-0 h-100">
                          <div class="row g-0 h-100 align-content-center">
                            <!-- <div class="col-2 col-md-1 d-flex flex-column justify-content-center mb-1 mb-md-0">
                              <a href="#" class="text-truncate">1 </a>
                            </div> -->
                            <div class="col-10 col-md-3 d-flex flex-column justify-content-center mb-1 mb-md-0">
                              <a href="#" class="text-truncate">5S</a>
                            </div>
                            <div class="col-12 col-md-3 d-flex flex-column justify-content-center align-items-md-start mb-1 mb-md-0 align-middle">
                              <div class="form-floating w-100">
                                <select class="select2FloatingLabel" id="input5SStandar" name="input5SStandar">
                                  <option value="X">Tidak Diperlukan</option>
                                  <option value="Lulus">Lulus</option>
                                  <option value="Tidak Lulus">Tidak Lulus</option>
                                </select>
                                <label>Standar</label>
                              </div>
                            </div>
                            <div class="col-6 col-md-3 d-flex flex-column justify-content-center align-items-md-end mb-1 mb-md-0 align-middle">
                              <div class="form-floating">
                                <input type="text" class="form-control" id="input5SNilai" name="input5SNilai" />
                                <label>Nilai</label>
                              </div>
                            </div>
                            <!-- <div class="col-md-1"></div> -->
                            <div class="col-6 col-md-3 d-flex flex-column justify-content-center align-items-md-end mb-1 mb-md-0 align-middle">
                              <div class="form-floating">
                                <input type="text" class="form-control" id="input5SCT" name="input5SCT" />
                                <label>C/T</label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card mb-2 sh-19 sh-md-8">
                        <div class="card-body pt-0 pb-0 h-100">
                          <div class="row g-0 h-100 align-content-center">
                            <!-- <div class="col-2 col-md-1 d-flex flex-column justify-content-center mb-1 mb-md-0">
                              <a href="#" class="text-truncate">1 </a>
                            </div> -->
                            <div class="col-10 col-md-3 d-flex flex-column justify-content-center mb-1 mb-md-0">
                              <a href="#" class="text-truncate">K3</a>
                            </div>
                            <div class="col-12 col-md-3 d-flex flex-column justify-content-center align-items-md-start mb-1 mb-md-0 align-middle">
                              <div class="form-floating w-100">
                                <select class="select2FloatingLabel" id="inputK3Standar" name="inputK3Standar">
                                  <option value="X">Tidak Diperlukan</option>
                                  <option value="Lulus">Lulus</option>
                                  <option value="Tidak Lulus">Tidak Lulus</option>
                                </select>
                                <label>Standar</label>
                              </div>
                            </div>
                            <div class="col-6 col-md-3 d-flex flex-column justify-content-center align-items-md-end mb-1 mb-md-0 align-middle">
                              <div class="form-floating">
                                <input type="text" class="form-control" id="inputK3Nilai" name="inputK3Nilai" />
                                <label>Nilai</label>
                              </div>
                            </div>
                            <!-- <div class="col-md-1"></div> -->
                            <div class="col-6 col-md-3 d-flex flex-column justify-content-center align-items-md-end mb-1 mb-md-0 align-middle">
                              <div class="form-floating">
                                <input type="text" class="form-control" id="inputK3CT" name="inputK3CT" />
                                <label>C/T</label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card mb-2 sh-19 sh-md-8">
                        <div class="card-body pt-0 pb-0 h-100">
                          <div class="row g-0 h-100 align-content-center">
                            <!-- <div class="col-2 col-md-1 d-flex flex-column justify-content-center mb-1 mb-md-0">
                              <a href="#" class="text-truncate">1 </a>
                            </div> -->
                            <div class="col-10 col-md-3 d-flex flex-column justify-content-center mb-1 mb-md-0">
                              <a href="#" class="text-truncate">IK</a>
                            </div>
                            <div class="col-12 col-md-3 d-flex flex-column justify-content-center align-items-md-start mb-1 mb-md-0 align-middle">
                              <div class="form-floating w-100">
                                <select class="select2FloatingLabel" id="inputIKStandar" name="inputIKStandar">
                                  <option value="X">Tidak Diperlukan</option>
                                  <option value="Lulus">Lulus</option>
                                  <option value="Tidak Lulus">Tidak Lulus</option>
                                </select>
                                <label>Standar</label>
                              </div>
                            </div>
                            <div class="col-6 col-md-3 d-flex flex-column justify-content-center align-items-md-end mb-1 mb-md-0 align-middle">
                              <div class="form-floating">
                                <input type="text" class="form-control" id="inputIKNilai" name="inputIKNilai" />
                                <label>Nilai</label>
                              </div>
                            </div>
                            <!-- <div class="col-md-1"></div> -->
                            <div class="col-6 col-md-3 d-flex flex-column justify-content-center align-items-md-end mb-1 mb-md-0 align-middle">
                              <div class="form-floating">
                                <input type="text" class="form-control" id="inputIKCT" name="inputIKCT" />
                                <label>C/T</label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="card mb-2 sh-19 sh-md-8">
                        <div class="card-body pt-0 pb-0 h-100">
                          <div class="row g-0 h-100 align-content-center">
                            <!-- <div class="col-2 col-md-1 d-flex flex-column justify-content-center mb-1 mb-md-0">
                              <a href="#" class="text-truncate">1 </a>
                            </div> -->
                            <div class="col-10 col-md-3 d-flex flex-column justify-content-center mb-1 mb-md-0">
                              <a href="#" class="text-truncate">IPK</a>
                            </div>
                            <div class="col-12 col-md-3 d-flex flex-column justify-content-center align-items-md-start mb-1 mb-md-0 align-middle">
                              <div class="form-floating w-100">
                                <select class="select2FloatingLabel" id="inputIPKStandar" name="inputIPKStandar">
                                  <option value="X">Tidak Diperlukan</option>
                                  <option value="Lulus">Lulus</option>
                                  <option value="Tidak Lulus">Tidak Lulus</option>
                                </select>
                                <label>Standar</label>
                              </div>
                            </div>
                            <div class="col-6 col-md-3 d-flex flex-column justify-content-center align-items-md-end mb-1 mb-md-0 align-middle">
                              <div class="form-floating">
                                <input type="text" class="form-control" id="inputIPKNilai" name="inputIPKNilai" />
                                <label>Nilai</label>
                              </div>
                            </div>
                            <!-- <div class="col-md-1"></div> -->
                            <div class="col-6 col-md-3 d-flex flex-column justify-content-center align-items-md-end mb-1 mb-md-0 align-middle">
                              <div class="form-floating">
                                <input type="text" class="form-control" id="inputIPKCT" name="inputIPKCT" />
                                <label>C/T</label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row mt-5">
                    <div class="d-grid gap-2 col-6 mx-auto mb-3">
                      <button class="btn btn-primary active-scale-down" type="submit">Simpan Penilaian</button>
                    </div>
                  </div>
                </form>
              <?php endif ?>
              
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
