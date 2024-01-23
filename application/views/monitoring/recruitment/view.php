<!DOCTYPE html>
<html lang="en" data-footer="true" data-override='{"attributes": {"placement": "horizontal","navcolor": "light","layout": "fluid","radius": "rounded", "color": "light-red"}}' data-scrollspy="true">
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
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                  <div class="card mb-5">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                          <label>No Recruitment</label>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-6 col-6">: <?=$recruitment->no_recruitment?></div>
                      </div>
                      <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                          <label>Jenis</label>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-6 col-6">: <?=$recruitment->jenis?></div>
                      </div>
                      <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                          <label>Tahun</label>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-6 col-6">: <?=$recruitment->tahun?></div>
                      </div>
                      <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                          <label>Bulan</label>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-6 col-6">:
                          <?php
                            switch ($recruitment->bulan) {
                              case '1':
                                echo 'Januari';
                                break;
                              case '2':
                                echo 'Februari';
                                break;
                              case '3':
                                echo 'Maret';
                                break;
                              case '4':
                                echo 'April';
                                break;
                              case '5':
                                echo 'Mei';
                                break;
                              case '6':
                                echo 'Juni';
                                break;
                              case '7':
                                echo 'Juli';
                                break;
                              case '8':
                                echo 'Agustus';
                                break;
                              case '9':
                                echo 'September';
                                break;
                              case '10':
                                echo 'Oktober';
                                break;
                              case '11':
                                echo 'November';
                                break;
                              case '12':
                                echo 'Desember';
                                break;
                              
                              default:
                                echo 'Tidak diketahui';
                                break;
                            }
                          ?>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                          <label>Departemen</label>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-6 col-6">: <?=$recruitment->departemen?></div>
                      </div>
                      <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                          <label>Jabatan</label>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-6 col-6">: <?=$recruitment->jabatan?></div>
                      </div>
                      <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                          <label>Tempat</label>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-6 col-6">: <?=$recruitment->tempat?></div>
                      </div>
                      <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                          <label>Shift</label>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-6 col-6">: <?=$recruitment->shift?></div>
                      </div>
                      <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                          <label>Deskripsi</label>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-6 col-6">: <?=$recruitment->deskripsi?></div>
                      </div>
                      <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                          <label>Requirement</label>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-6 col-6">
                          <ol>
                            <?php foreach ($requirement as $req): ?>
                              <li><?=$req->requirement?></li>
                            <?php endforeach ?>
                          </ol>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                          <a href="<?=base_url()?>data_master/setup/<?=$recruitment->id?>?jenis=<?=$recruitment->jenis?>" class="btn btn-outline-primary mb-1 active-scale-down"><i data-acorn-icon="edit" class="icon" data-acorn-size="15"></i> &nbsp;Edit</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Help Text End -->
              </div>
              <div class="row">
                <div class="col-12 table-responsive">
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-12">
                          <table class="table w-100 text-center">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>Pria</th>
                                <th>Wanita</th>
                                <th>Jumlah</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>1</td>
                                <td class="text-start">Stok Pelamar Umum</td>
                                <td class="text-start"></td>
                                <td>:</td>
                                <td class="text-start"></td>
                                <td><?=$stok->jml_total_pria?></td>
                                <td><?=$stok->jml_total_wanita?></td>
                                <td><?=$stok->jml_total_pria+$stok->jml_total_wanita?></td>
                              </tr>
                              <tr>
                                <td>2</td>
                                <td class="text-start">Kebutuhan</td>
                                <td class="text-start"></td>
                                <td>:</td>
                                <td class="text-start"></td>
                                <td>
                                  <?php
                                    $kebutuhan_setup_pria = $setup->kebutuhan_pria;
                                    $kebutuhan_setup_wanita = $setup->kebutuhan_wanita;
                                    $kebutuhan_setup_total = $kebutuhan_setup_pria + $kebutuhan_setup_wanita;
                                    echo $kebutuhan_setup_pria;
                                  ?>
                                 </td>
                                <td><?=$kebutuhan_setup_wanita?></td>
                                <td><?=$kebutuhan_setup_total?></td>
                              </tr>
                              <tr>
                                <td>3</td>
                                <td class="text-start">Alokasi</td>
                                <td class="text-start">1. Referensi</td>
                                <td>:</td>
                                <td class="text-start">+Internal</td>
                                <td><?=$setup->referensi_pria?></td>
                                <td><?=$setup->referensi_wanita?></td>
                                <td><?=$setup->referensi_pria+$setup->referensi_wanita?></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td class="text-start"></td>
                                <td class="text-start"></td>
                                <td></td>
                                <td class="text-start">+NG</td>
                                <td><?=$referensi->jml_ng_pria?></td>
                                <td><?=$referensi->jml_ng_wanita?></td>
                                <td><?=$referensi->jml_ng_pria + $referensi->jml_ng_wanita?></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td class="text-start"></td>
                                <td class="text-start"></td>
                                <td></td>
                                <td class="text-start">+Testing</td>
                                <td><?=$referensi->jml_testing_pria?></td>
                                <td><?=$referensi->jml_testing_wanita?></td>
                                <td><?=$referensi->jml_testing_pria + $referensi->jml_testing_wanita?></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td class="text-start"></td>
                                <td class="text-start"></td>
                                <td></td>
                                <td class="text-start">+Tidak Lulus</td>
                                <td><?=$referensi->jml_tidak_lulus_pria?></td>
                                <td><?=$referensi->jml_tidak_lulus_wanita?></td>
                                <td><?=$referensi->jml_tidak_lulus_pria + $referensi->jml_tidak_lulus_wanita?></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td class="text-start"></td>
                                <td class="text-start"></td>
                                <td></td>
                                <td class="text-start">+Non Aktif</td>
                                <td><?=$referensi->jml_non_aktif_pria?></td>
                                <td><?=$referensi->jml_non_aktif_wanita?></td>
                                <td><?=$referensi->jml_non_aktif_pria + $referensi->jml_non_aktif_wanita?></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td class="text-start"></td>
                                <td class="text-start"></td>
                                <td></td>
                                <td class="text-start">+Lulus</td>
                                <td><?=$referensi->jml_lulus_pria?></td>
                                <td><?=$referensi->jml_lulus_wanita?></td>
                                <td><?=$referensi->jml_lulus_pria + $referensi->jml_lulus_wanita?></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td class="text-start"></td>
                                <td class="text-start"></td>
                                <td></td>
                                <td class="text-end">Jumlah</td>
                                <td>
                                  <?php
                                    $referensi_total_pria = $referensi->jml_ng_pria + $referensi->jml_testing_pria + $referensi->jml_tidak_lulus_pria + $referensi->jml_lulus_pria+ $referensi->jml_non_aktif_pria;
                                    $referensi_total_wanita = $referensi->jml_ng_wanita + $referensi->jml_testing_wanita + $referensi->jml_tidak_lulus_wanita + $referensi->jml_lulus_wanita + $referensi->jml_non_aktif_wanita; 
                                    $referensi_total = $referensi_total_pria + $referensi_total_wanita;
                                    $referensi_sisa_pria = $setup->referensi_pria - $referensi_total_pria;
                                    $referensi_sisa_wanita = $setup->referensi_wanita - $referensi_total_wanita;
                                    $referensi_sisa_total = $referensi_sisa_pria + $referensi_sisa_wanita;
                                    echo $referensi_total_pria;
                                  ?>
                                </td>
                                <td><?=$referensi_total_wanita;?></td>
                                <td><?=$referensi_total?></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td class="text-start"></td>
                                <td class="text-start"></td>
                                <td></td>
                                <td class="text-end text-danger">Sisa</td>
                                <td class="text-danger"><?=$referensi_sisa_pria?></td>
                                <td class="text-danger"><?=$referensi_sisa_wanita?></td>
                                <td class="text-danger"><?=$referensi_sisa_total?></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td class="text-start"></td>
                                <td class="text-start">2. Reguler</td>
                                <td>:</td>
                                <td class="text-start">+Eksternal</td>
                                <td><?=$setup->eksternal_pria?></td>
                                <td><?=$setup->eksternal_wanita?></td>
                                <td><?=$setup->eksternal_pria+$setup->eksternal_wanita?></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td class="text-start"></td>
                                <td class="text-start"></td>
                                <td></td>
                                <td class="text-start">+NG</td>
                                <td><?=$eksternal->jml_ng_pria?></td>
                                <td><?=$eksternal->jml_ng_wanita?></td>
                                <td><?=$eksternal->jml_ng_pria + $eksternal->jml_ng_wanita?></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td class="text-start"></td>
                                <td class="text-start"></td>
                                <td></td>
                                <td class="text-start">+Testing</td>
                                <td><?=$eksternal->jml_testing_pria?></td>
                                <td><?=$eksternal->jml_testing_wanita?></td>
                                <td><?=$eksternal->jml_testing_pria + $eksternal->jml_testing_wanita?></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td class="text-start"></td>
                                <td class="text-start"></td>
                                <td></td>
                                <td class="text-start">+Tidak Lulus</td>
                                <td><?=$eksternal->jml_tidak_lulus_pria?></td>
                                <td><?=$eksternal->jml_tidak_lulus_wanita?></td>
                                <td><?=$eksternal->jml_tidak_lulus_pria + $eksternal->jml_tidak_lulus_wanita?></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td class="text-start"></td>
                                <td class="text-start"></td>
                                <td></td>
                                <td class="text-start">+Non Aktif</td>
                                <td><?=$eksternal->jml_non_aktif_pria?></td>
                                <td><?=$eksternal->jml_non_aktif_wanita?></td>
                                <td><?=$eksternal->jml_non_aktif_pria + $eksternal->jml_non_aktif_wanita?></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td class="text-start"></td>
                                <td class="text-start"></td>
                                <td></td>
                                <td class="text-start">+Lulus</td>
                                <td><?=$eksternal->jml_lulus_pria?></td>
                                <td><?=$eksternal->jml_lulus_wanita?></td>
                                <td><?=$eksternal->jml_lulus_pria + $eksternal->jml_lulus_wanita?></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td class="text-start"></td>
                                <td class="text-start"></td>
                                <td></td>
                                <td class="text-end">Jumlah</td>
                                <td>
                                  <?php
                                    $eksternal_total_pria = $eksternal->jml_ng_pria + $eksternal->jml_testing_pria + $eksternal->jml_tidak_lulus_pria + $eksternal->jml_lulus_pria+ $eksternal->jml_non_aktif_pria;
                                    $eksternal_total_wanita = $eksternal->jml_ng_wanita + $eksternal->jml_testing_wanita + $eksternal->jml_tidak_lulus_wanita + $eksternal->jml_lulus_wanita + $eksternal->jml_non_aktif_wanita;  
                                    $eksternal_total = $eksternal_total_pria + $eksternal_total_wanita;
                                    $eksternal_sisa_pria = $setup->eksternal_pria - $eksternal_total_pria;
                                    $eksternal_sisa_wanita = $setup->eksternal_wanita - $eksternal_total_wanita;
                                    $eksternal_sisa_total = $eksternal_sisa_pria + $eksternal_sisa_wanita;
                                    echo $eksternal_total_pria;
                                  ?>
                                </td>
                                <td><?=$eksternal_total_wanita;?></td>
                                <td><?=$eksternal_total?></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td class="text-start"></td>
                                <td class="text-start"></td>
                                <td></td>
                                <td class="text-end text-danger">Sisa</td>
                                <td class="text-danger"><?=$eksternal_sisa_pria?></td>
                                <td class="text-danger"><?=$eksternal_sisa_wanita?></td>
                                <td class="text-danger"><?=$eksternal_sisa_total?></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td class="text-start"></td>
                                <td class="text-start"></td>
                                <td>:</td>
                                <td class="text-start">+Umum</td>
                                <td><?=$setup->umum_pria?></td>
                                <td><?=$setup->umum_wanita?></td>
                                <td><?=$setup->umum_pria+$setup->umum_wanita?></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td class="text-start"></td>
                                <td class="text-start"></td>
                                <td></td>
                                <td class="text-start">+NG</td>
                                <td><?=$umum->jml_ng_pria?></td>
                                <td><?=$umum->jml_ng_wanita?></td>
                                <td><?=$umum->jml_ng_pria + $umum->jml_ng_wanita?></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td class="text-start"></td>
                                <td class="text-start"></td>
                                <td></td>
                                <td class="text-start">+Testing</td>
                                <td><?=$umum->jml_testing_pria?></td>
                                <td><?=$umum->jml_testing_wanita?></td>
                                <td><?=$umum->jml_testing_pria + $umum->jml_testing_wanita?></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td class="text-start"></td>
                                <td class="text-start"></td>
                                <td></td>
                                <td class="text-start">+Tidak Lulus</td>
                                <td><?=$umum->jml_tidak_lulus_pria?></td>
                                <td><?=$umum->jml_tidak_lulus_wanita?></td>
                                <td><?=$umum->jml_tidak_lulus_pria + $umum->jml_tidak_lulus_wanita?></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td class="text-start"></td>
                                <td class="text-start"></td>
                                <td></td>
                                <td class="text-start">+Non Aktif</td>
                                <td><?=$umum->jml_non_aktif_pria?></td>
                                <td><?=$umum->jml_non_aktif_wanita?></td>
                                <td><?=$umum->jml_non_aktif_pria + $umum->jml_non_aktif_wanita?></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td class="text-start"></td>
                                <td class="text-start"></td>
                                <td></td>
                                <td class="text-start">+Lulus</td>
                                <td><?=$umum->jml_lulus_pria?></td>
                                <td><?=$umum->jml_lulus_wanita?></td>
                                <td><?=$umum->jml_lulus_pria + $umum->jml_lulus_wanita?></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td class="text-start"></td>
                                <td class="text-start"></td>
                                <td></td>
                                <td class="text-end">Jumlah</td>
                                <td>
                                  <?php
                                    $umum_total_pria = $umum->jml_ng_pria + $umum->jml_testing_pria + $umum->jml_tidak_lulus_pria + $umum->jml_lulus_pria+ $umum->jml_non_aktif_pria;
                                    $umum_total_wanita = $umum->jml_ng_wanita + $umum->jml_testing_wanita + $umum->jml_tidak_lulus_wanita + $umum->jml_lulus_wanita + $umum->jml_non_aktif_wanita; 
                                    $umum_total = $umum_total_pria + $umum_total_wanita;
                                    $umum_sisa_pria = $setup->umum_pria - $umum_total_pria;
                                    $umum_sisa_wanita = $setup->umum_wanita - $umum_total_wanita;
                                    $umum_sisa_total = $umum_sisa_pria + $umum_sisa_wanita;
                                    echo $umum_total_pria;
                                  ?>
                                </td>
                                <td><?=$umum_total_wanita;?></td>
                                <td><?=$umum_total?></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td class="text-start"></td>
                                <td class="text-start"></td>
                                <td></td>
                                <td class="text-end text-danger">Sisa</td>
                                <td class="text-danger"><?=$umum_sisa_pria?></td>
                                <td class="text-danger"><?=$umum_sisa_wanita?></td>
                                <td class="text-danger"><?=$umum_sisa_total?></td>
                              </tr>
                              <tr class="bg-dark">
                                <td></td>
                                <td class="text-start"></td>
                                <td class="text-start"></td>
                                <td></td>
                                <td class="text-end text-danger"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td class="text-start"></td>
                                <td class="text-end" colspan="3">Jumlah NG</td>
                                <td><?=$referensi->jml_ng_pria+$eksternal->jml_ng_pria+$umum->jml_ng_pria?></td>
                                <td><?=$referensi->jml_ng_wanita+$eksternal->jml_ng_wanita+$umum->jml_ng_wanita?></td>
                                <td><?=$referensi->jml_ng_pria+$eksternal->jml_ng_pria+$umum->jml_ng_pria+$referensi->jml_ng_wanita+$eksternal->jml_ng_wanita+$umum->jml_ng_wanita?></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td class="text-start"></td>
                                <td class="text-end" colspan="3">Jumlah Testing</td>
                                <td><?=$referensi->jml_testing_pria+$eksternal->jml_testing_pria+$umum->jml_testing_pria?></td>
                                <td><?=$referensi->jml_testing_wanita+$eksternal->jml_testing_wanita+$umum->jml_testing_wanita?></td>
                                <td><?=$referensi->jml_testing_pria+$eksternal->jml_testing_pria+$umum->jml_testing_pria+$referensi->jml_testing_wanita+$eksternal->jml_testing_wanita+$umum->jml_testing_wanita?></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td class="text-start"></td>
                                <td class="text-end" colspan="3">Jumlah Tidak Lulus</td>
                                <td><?=$referensi->jml_tidak_lulus_pria+$eksternal->jml_tidak_lulus_pria+$umum->jml_tidak_lulus_pria?></td>
                                <td><?=$referensi->jml_tidak_lulus_wanita+$eksternal->jml_tidak_lulus_wanita+$umum->jml_tidak_lulus_wanita?></td>
                                <td><?=$referensi->jml_tidak_lulus_pria+$eksternal->jml_tidak_lulus_pria+$umum->jml_tidak_lulus_pria+$referensi->jml_tidak_lulus_wanita+$eksternal->jml_tidak_lulus_wanita+$umum->jml_tidak_lulus_wanita?></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td class="text-start"></td>
                                <td class="text-end" colspan="3">Jumlah Non Aktif</td>
                                <td><?=$referensi->jml_non_aktif_pria+$eksternal->jml_non_aktif_pria+$umum->jml_non_aktif_pria?></td>
                                <td><?=$referensi->jml_non_aktif_wanita+$eksternal->jml_non_aktif_wanita+$umum->jml_non_aktif_wanita?></td>
                                <td><?=$referensi->jml_non_aktif_pria+$eksternal->jml_non_aktif_pria+$umum->jml_non_aktif_pria+$referensi->jml_non_aktif_wanita+$eksternal->jml_non_aktif_wanita+$umum->jml_non_aktif_wanita?></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td class="text-start"></td>
                                <td class="text-end" colspan="3">Jumlah Lamaran Masuk</td>
                                <td><?=$referensi_total_pria+$eksternal_total_pria+$umum_total_pria?></td>
                                <td><?=$referensi_total_wanita+$eksternal_total_wanita+$umum_total_wanita?></td>
                                <td><?=$referensi_total+$eksternal_total+$umum_total?></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td class="text-start"></td>
                                <td class="text-start"></td>
                                <td></td>
                                <td class="text-end">Lulus</td>
                                <td><?=$referensi->jml_lulus_pria+$eksternal->jml_lulus_pria+$umum->jml_lulus_pria?></td>
                                <td><?=$referensi->jml_lulus_wanita+$eksternal->jml_lulus_wanita+$umum->jml_lulus_wanita?></td>
                                <td><?=$referensi->jml_lulus_pria+$eksternal->jml_lulus_pria+$umum->jml_lulus_pria+$referensi->jml_lulus_wanita+$eksternal->jml_lulus_wanita+$umum->jml_lulus_wanita?></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td class="text-start"></td>
                                <td class="text-start"></td>
                                <td></td>
                                <td class="text-end text-danger">Outstanding</td>
                                <td class="text-danger"><?=$kebutuhan_setup_pria-($referensi_total_pria+$eksternal_total_pria+$umum_total_pria)?></td>
                                <td class="text-danger"><?=$kebutuhan_setup_wanita-($referensi_total_wanita+$eksternal_total_wanita+$umum_total_wanita)?></td>
                                <td class="text-danger"><?=$kebutuhan_setup_total-($referensi_total_pria+$eksternal_total_pria+$umum_total_pria+$referensi_total_wanita+$eksternal_total_wanita+$umum_total_wanita)?></td>
                              </tr>
                              <tr class="bg-dark">
                                <td></td>
                                <td class="text-start"></td>
                                <td class="text-start"></td>
                                <td></td>
                                <td class="text-end text-danger"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td class="text-start"></td>
                                <td class="text-end">Set up lokasi</td>
                                <td class="text-end" colspan="2">Internal</td>
                                <td><?=$setup->referensi_pria?></td>
                                <td><?=$setup->referensi_wanita?></td>
                                <td><?=$setup->referensi_pria+$setup->referensi_wanita?></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td class="text-start"></td>
                                <td class="text-end"></td>
                                <td class="text-end" colspan="2">Eksternal</td>
                                <td><?=$setup->eksternal_pria?></td>
                                <td><?=$setup->eksternal_wanita?></td>
                                <td><?=$setup->eksternal_pria+$setup->eksternal_wanita?></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td class="text-start"></td>
                                <td class="text-end"></td>
                                <td class="text-end" colspan="2">Umum</td>
                                <td><?=$setup->umum_pria?></td>
                                <td><?=$setup->umum_wanita?></td>
                                <td><?=$setup->umum_pria+$setup->umum_wanita?></td>
                              </tr><tr>
                                <td></td>
                                <td class="text-start"></td>
                                <td class="text-end"></td>
                                <td class="text-end" colspan="2">Total</td>
                                <td><?=$setup->umum_pria+$setup->referensi_pria+$setup->eksternal_pria?></td>
                                <td><?=$setup->umum_wanita+$setup->referensi_wanita+$setup->eksternal_wanita?></td>
                                <td><?=$setup->umum_pria+$setup->referensi_pria+$setup->eksternal_pria+$setup->umum_wanita+$setup->referensi_wanita+$setup->eksternal_wanita?></td>
                              </tr><tr>
                                <td></td>
                                <td class="text-start"></td>
                                <td class="text-end"></td>
                                <td class="text-end text-danger" colspan="2">Sisa Belum Teralokasi</td>
                                <td class="text-danger"><?=$kebutuhan_setup_pria-($setup->umum_pria+$setup->referensi_pria+$setup->eksternal_pria)?></td>
                                <td class="text-danger"><?=$kebutuhan_setup_wanita-($setup->umum_wanita+$setup->referensi_wanita+$setup->eksternal_wanita)?></td>
                                <td class="text-danger"><?=$kebutuhan_setup_total-($setup->umum_pria+$setup->referensi_pria+$setup->eksternal_pria+$setup->umum_wanita+$setup->referensi_wanita+$setup->eksternal_wanita)?></td>
                              </tr>
                              <tr class="bg-dark">
                                <td></td>
                                <td class="text-start"></td>
                                <td class="text-start"></td>
                                <td></td>
                                <td class="text-end text-danger"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td></td>
                                <td class="text-start"></td>
                                <td class="text-end">% Set up lokasi</td>
                                <td class="text-end" colspan="2">Internal</td>
                                <td><?=round(($setup->referensi_pria/$kebutuhan_setup_total)*100, 2)?>%</td>
                                <td><?=round(($setup->referensi_wanita/$kebutuhan_setup_total)*100, 2)?>%</td>
                                <td><?=round((($setup->referensi_pria+$setup->referensi_wanita)/$kebutuhan_setup_total)*100, 2)?>%</td>
                              </tr>
                              <tr>
                                <td></td>
                                <td class="text-start"></td>
                                <td class="text-end"></td>
                                <td class="text-end" colspan="2">Eksternal</td>
                                <td><?=round(($setup->eksternal_pria/$kebutuhan_setup_total)*100, 2)?>%</td>
                                <td><?=round(($setup->eksternal_wanita/$kebutuhan_setup_total)*100, 2)?>%</td>
                                <td><?=round((($setup->eksternal_pria+$setup->eksternal_wanita)/$kebutuhan_setup_total)*100, 2)?>%</td>
                              </tr>
                              <tr>
                                <td></td>
                                <td class="text-start"></td>
                                <td class="text-end"></td>
                                <td class="text-end" colspan="2">Umum</td>
                                <td><?=round(($setup->umum_pria/$kebutuhan_setup_total)*100, 2)?>%</td>
                                <td><?=round(($setup->umum_wanita/$kebutuhan_setup_total)*100, 2)?>%</td>
                                <td><?=round((($setup->umum_pria+$setup->umum_wanita)/$kebutuhan_setup_total)*100, 2)?>%</td>
                              </tr><tr>
                                <td></td>
                                <td class="text-start"></td>
                                <td class="text-end"></td>
                                <td class="text-end" colspan="2">Total</td>
                                <td><?=round((($setup->umum_pria+$setup->referensi_pria+$setup->eksternal_pria)/$kebutuhan_setup_pria)*100, 2)?>%</td>
                                <td><?=round((($setup->umum_wanita+$setup->referensi_wanita+$setup->eksternal_wanita)/$kebutuhan_setup_wanita)*100, 2)?>%</td>
                                <td><?=round((($setup->umum_pria+$setup->referensi_pria+$setup->eksternal_pria+$setup->umum_wanita+$setup->referensi_wanita+$setup->eksternal_wanita)/$kebutuhan_setup_total)*100, 2)?>%</td>
                              </tr><tr>
                                <td></td>
                                <td class="text-start"></td>
                                <td class="text-end"></td>
                                <td class="text-end text-danger" colspan="2">Sisa Belum Teralokasi</td>
                                <td class="text-danger"><?=round((($kebutuhan_setup_pria-($setup->umum_pria+$setup->referensi_pria+$setup->eksternal_pria))/$kebutuhan_setup_pria)*100, 2)?>%</td>
                                <td class="text-danger"><?=round((($kebutuhan_setup_wanita-($setup->umum_wanita+$setup->referensi_wanita+$setup->eksternal_wanita))/$kebutuhan_setup_wanita)*100, 2)?>%</td>
                                <td class="text-danger"><?=round((($kebutuhan_setup_total-($setup->umum_pria+$setup->referensi_pria+$setup->eksternal_pria+$setup->umum_wanita+$setup->referensi_wanita+$setup->eksternal_wanita))/$kebutuhan_setup_total)*100, 2)?>%</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
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
