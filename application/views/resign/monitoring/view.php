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
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="mb-2">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" placeholder="Nama Lengkap" name="inputNama" value="<?=$data->nama?>" readonly />
                          </div>
                          <div class="mb-2">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" placeholder="Email" name="inputEmail" value="<?=$data->email?>" readonly />
                          </div>
                          <div class="mb-2">
                            <label class="form-label">No HP</label>
                            <input type="text" class="form-control" placeholder="No HP" name="inputNoHP" value="<?=$data->no_hp?>" readonly />
                            
                          </div>
                          <div class="mb-2">
                            <label class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" placeholder="Tempat Lahir" name="inputTempatLahir" value="<?=$data->tempat_lahir?>" readonly />
                            
                          </div>
                          <div class="mb-2">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="text" class="form-control" placeholder="Date" name="inputTglLahir" value="<?=$data->tgl_lahir?>" readonly />
                            
                          </div>
                          <div class="mb-2">
                            <label class="form-label">No KTP</label>
                            <input type="text" class="form-control" placeholder="No KTP" name="inputNoKTP" id="inputNoKTP"  value="<?=$data->no_ktp?>" readonly />
                            
                          </div> 
                          <div class="mb-2">
                            <label class="form-label">Alamat KTP</label>
                            <textarea class="form-control" placeholder="Alamat KTP" id="inputAlamatKTP" name="inputAlamatKTP" rows="3" readonly><?=$data->alamat_ktp?></textarea>
                            
                          </div>
                        </div>
                        <div class="col-md-6">
                           <div class="mb-2 w-100">
                              <label class="form-label">Jenis Kelamin</label>
                              <input type="text" name="inputJenisKelamin" class="form-control" value="<?=$data->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan'?>" readonly>
                            </div>
                            <div class="mb-2 w-100">
                              <label class="form-label">Status Menikah</label>
                              <input type="text" name="inputJenisKelamin" class="form-control" value="<?=$data->status_pernikahan == 'Y' ? 'Menikah' : 'Belum Menikah'?>" readonly>
                            </div>
                            <div class="mb-2">
                              <label class="form-label">Jumlah Anak</label>
                              <input type="number" class="form-control" placeholder="Jumlah Anak" name="inputJumlahAnak" id="inputJumlahAnak" value="<?=$data->jml_anak?>" readonly />
                              
                            </div>
                            <div class="mb-2 w-100">
                              <label class="form-label">Golongan Darah</label>
                              <input type="text" name="inputJenisKelamin" class="form-control" value="<?=$data->golongan_darah?>" readonly>
                            </div>
                            <div class="mb-2 w-100">
                              <label class="form-label">Agama</label>
                              <input type="text" name="inputJenisKelamin" class="form-control" value="<?=$data->agama?>" readonly>
                            </div>
                            <div class="mb-2">
                              <label class="form-label">Alamat Domisili</label>
                              <textarea class="form-control" placeholder="Alamat Domisili" id="inputAlamatDomisili" name="inputAlamatDomisili" rows="3" readonly><?=$data->alamat_domisili?></textarea>
                            </div>
                            <div class="mb-2">
                              <label class="form-label">Kode POS</label>
                              <input type="text" class="form-control" placeholder="Kode POS" name="inputKodePOS" id="inputKodePOS" value="<?=$data->kode_pos?>" readonly />
                            </div> 
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Help Text End -->
              </div>
              <div class="row mt-3">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                          <?php 
                          $noUrut = 0;
                          foreach ($masa_kerja as $key): ?>

                            <?=$noUrut>0 ? '<hr>':''?>
                            <table border="0" width="100%">
                              <tr>
                                <td class="form-label" style="width: 40%;">Join Date</td>
                                <td colspan="2">: <?=$key->join_date?></td>
                              </tr>
                              <tr>
                                <td class="form-label" style="width: 40%;">Masa Training</td>
                                <td>: <?=$key->mulai_training?> - <?=$key->selesai_training?></td>
                              </tr> 
                              <tr>
                                <td class="form-label" style="width: 40%;">Kontrak 1</td>
                                <td>: <?=$key->mulai_kontrak_1?> - <?=$key->selesai_kontrak_1?></td>
                              </tr>  
                              <tr>
                                <td class="form-label" style="width: 40%;">Kontrak 2</td>
                                <td>: <?=$key->mulai_kontrak_2?> - <?=$key->selesai_kontrak_2?></td>
                              </tr>  
                              <tr>
                                <td class="form-label" style="width: 40%;">Kontrak 3</td>
                                <td>: <?=$key->mulai_kontrak_3?> - <?=$key->selesai_kontrak_3?></td>
                              </tr>  
                            </table>
                          <?php $noUrut++; endforeach ?>
                        </div>
                      </div>
                      <div class="row mt-5">
                        <div class="col-md-12 table-responsive">
                          <table border="0" width="100%">
                            <tr>
                              <td class="form-label" style="width:102.1px">Tanggal Berakhir Hubungan Kerja</td>
                              <td colspan="2">: <?=$data->tgl_berakhir?></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td class="form-label">Alasan Keluar</td>
                              <td colspan="2">: <?=$data->alasan_keluar?></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td class="form-label">Point Pertimbangan</td>
                              <td style="width: 10px !important;">1</td>
                              <td style="width: 140px !important;">Absensi Tidak Bagus</td>
                              <th style="border:solid black thin !important; width:width: 25px" class="text-center">S</th>
                              <td style="border:solid black thin !important; width:width: 25px" class="text-center"><?=$data->sakit?></td>
                              <th style="border:solid black thin !important; width:width: 25px" class="text-center">I</th>
                              <td style="border:solid black thin !important; width:width: 25px" class="text-center"><?=$data->ijin?></td>
                              <th style="border:solid black thin !important; width:width: 25px" class="text-center">A</th>
                              <td style="border:solid black thin !important; width:width: 25px" class="text-center"><?=$data->alpa?></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td class="form-label"></td>
                              <td>2</td>
                              <td>Pelanggaran Peraturan Perusahaan</td>
                              <th style="border:solid black thin !important; width: 25px" class="text-center">ST</th>
                              <td style="border:solid black thin !important;width: 25px" class="text-center"><?=$data->pembinaan?></td>
                              <th style="border:solid black thin !important;width: 25px" class="text-center">SP1</th>
                              <td style="border:solid black thin !important;width: 25px" class="text-center"><?=$data->sp1?></td>
                              <th style="border:solid black thin !important;width: 25px" class="text-center">SP2</th>
                              <td style="border:solid black thin !important;width: 25px" class="text-center"><?=$data->sp2?></td>
                              <th style="border:solid black thin !important;width: 25px" class="text-center">SP3</th>
                              <td style="border:solid black thin !important;width: 25px" class="text-center"><?=$data->sp3?></td>
                              <th style="border:solid black thin !important;width: 25px" class="text-center">PB</th>
                              <td style="border:solid black thin !important;width: 25px" class="text-center"><?=$data->pelanggaran_berat?></td>
                            </tr>
                            <tr>
                              <td></td>
                              <td>3</td>
                              <td>Attitude</td>
                              <td colspan="10"><?=$data->attitude?></td>
                            </tr>
                            <tr>
                              <td></td>
                              <td>4</td>
                              <td>Produktivitas</td>
                              <td colspan="10"><?=$data->produktivitas?></td>
                            </tr>
                            <tr>
                              <td></td>
                              <td>5</td>
                              <td>Lainnya</td>
                              <td colspan="10"><?=$data->lainnya?></td>
                            </tr>
                          </table>
                        </div>
                      </div>
                      <div class="row mt-5">
                        <div class="col-md-6">
                          <table border="0" width="100%">
                            <tr>
                              <td class="form-label" style="width: 40%;">Kategori</td>
                              <td colspan="2">: <?=$data->kategori?></td>
                            </tr>
                            <tr>
                              <td class="form-label" style="width: 40%;">Keterangan</td>
                              <td>: <?=$data->keterangan?></td>
                            </tr>   
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
